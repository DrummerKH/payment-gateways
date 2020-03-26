<?php
/**
 * Created by PhpStorm.
 * User: Drummer1
 * Date: 25.04.18
 * Time: 22:19.
 */

namespace App\Service\GatewayFactory\Paymaster\Service;

use App\Contracts\FiscalServiceInterface;
use App\DBAL\Types\BillingTokenType;
use App\DTO\CallbackDTO;
use App\Exception\GatewayErrorException;
use App\Request\GetStatusRequest;
use App\Request\RegisterCallbackRequest;
use App\Service\Billing\BillingEntityProcessing;
use App\Service\GatewayFactory\GatewayServiceAbstract;
use App\Service\GatewayFactory\Paymaster\DTO\Response\PaymentCallbackDTO;
use App\Traits\Helpers\ProjectSerializer;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Exception\ExceptionInterface;

class PaymentCallbackService extends GatewayServiceAbstract
{
    use ProjectSerializer;

    /**
     * @var FiscalServiceInterface
     */
    protected $fiscal;

    /**
     * @var BillingEntityProcessing
     */
    protected $billingService;

    /**
     * PaymentCallbackService constructor.
     *
     * @param FiscalServiceInterface $fiscal
     * @param BillingEntityProcessing $billingService
     */
    public function __construct(
        FiscalServiceInterface $fiscal,
        BillingEntityProcessing $billingService
    )
    {
        $this->fiscal = $fiscal;
        $this->billingService = $billingService;
    }

    /**
     * @param RegisterCallbackRequest $request
     *
     * @throws GatewayErrorException
     * @throws ExceptionInterface
     */
    public function execute(RegisterCallbackRequest $request)
    {
        $billing = $this->billingService->getBilling();

        /** @var GetStatusRequest $statusRequest */
        $statusRequest = $this->gateway->execute(new GetStatusRequest([]));

        if ($statusRequest->isAccepted()) {
            /** @var null|Request $httpRequest */
            $httpRequest = $request->getModel()->getRequest();

            if (null !== $httpRequest) {
                /** @var PaymentCallbackDTO $depositDTO */
                $depositDTO = $this->serializer->denormalize($httpRequest->query->all(), PaymentCallbackDTO::class);

                // If request contains LMI_SYS_PAYMENT_ID (means request comes from Paymaster)
                if (null !== $depositDTO->getLMISYSPAYMENTID()) {
                    $details = $billing->getDetails();
                    $billing->setDetails(array_merge($details, $this->serializer->normalize($depositDTO)));
                    $billing->setExternalId($depositDTO->getLMISYSPAYMENTID());

                    $this->billingService->getRepository()->save($billing);

                    $statusRequest->markHold();

                    // Random 200 OK response to paymaster
                    $request->setModel(new Response('OK'));
                }
            }
        }

        $request->syncStatus($statusRequest);
    }

    /**
     * @param RegisterCallbackRequest $request
     *
     * @return bool
     */
    public function supports(RegisterCallbackRequest $request): bool
    {
        /** @var CallbackDTO $callbackDTO */
        $callbackDTO = $request->getModel();

        return BillingTokenType::HOLD === $callbackDTO->getToken()->getType();
    }
}
