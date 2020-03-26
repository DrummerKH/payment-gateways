<?php
/**
 * Created by PhpStorm.
 * User: Drummer1
 * Date: 26.04.18
 * Time: 14:04.
 */

namespace App\Service\GatewayFactory\Paymaster\Service;

use App\Exception\GatewayErrorException;
use App\Request\GetStatusRequest;
use App\Service\Billing\BillingEntityProcessing;
use App\Service\GatewayFactory\GatewayServiceAbstract;
use App\Service\GatewayFactory\Paymaster\Api\GetStatusApi;
use App\Service\GatewayFactory\Paymaster\DTO\Request\GetStatusRequestDTO;
use App\Service\GatewayFactory\Paymaster\DTO\Response\GetStatusResponseDTO;
use App\Service\GatewayFactory\Paymaster\DTO\Types\BillingStatusType;
use App\Traits\TransactionSaverTrait;
use ReflectionException;
use Symfony\Component\Serializer\Exception\ExceptionInterface;

class GetStatusService extends GatewayServiceAbstract
{
    use TransactionSaverTrait;

    /**
     * @var GetStatusApi;
     */
    protected $api;

    /**
     * @var BillingEntityProcessing
     */
    protected $billingService;

    /**
     * GetStatusService constructor.
     *
     * @param GetStatusApi $api
     * @param BillingEntityProcessing $billingService
     */
    public function __construct(
        GetStatusApi $api,
        BillingEntityProcessing $billingService
    )
    {
        $this->api = $api;
        $this->billingService = $billingService;
    }

    /**
     * @param GetStatusRequest $request
     *
     * @return GetStatusRequest
     * @throws ReflectionException
     *
     * @throws GatewayErrorException
     * @throws ExceptionInterface
     */
    public function execute(GetStatusRequest $request): GetStatusRequest
    {
        /** @var GetStatusRequestDTO $dto */
        $dto = new GetStatusRequestDTO();
        $dto->setSiteAlias($this->gateway->getSettings()['merchantId']);
        $dto->setInvoiceID($this->billingService->getBilling()->getId());

        /** @var GetStatusResponseDTO $responseDTO */
        $responseDTO = $this->api->request($dto);

        switch ($responseDTO->getState()) {
            case BillingStatusType::HOLD:
                $request->markHold();

                break;
            case BillingStatusType::CANCELLED:
                $request->markCanceled();

                break;
            case BillingStatusType::COMPLETE:
                $request->markDone();

                break;
            case BillingStatusType::INITIATED:
            case BillingStatusType::PROCESSING:
                $request->markAccepted();
        }

        $request->setModel($responseDTO);

        return $request;
    }
}
