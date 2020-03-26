<?php
/**
 * Created by PhpStorm.
 * User: Drummer1
 * Date: 11.04.18
 * Time: 17:11.
 */

namespace App\Service\GatewayFactory\Acquiring\Service;

use App\Exception\GatewayErrorException;
use App\Request\DepositRequest;
use App\Request\GetStatusRequest;
use App\Service\Billing\BillingEntityProcessing;
use App\Service\GatewayFactory\Acquiring\Api\DepositApi;
use App\Service\GatewayFactory\Acquiring\DTO\Request\DepositRequestDTO;
use App\Service\GatewayFactory\Acquiring\DTO\Response\DepositResponseDTO;
use App\Service\GatewayFactory\GatewayServiceAbstract;
use App\Traits\TransactionSaverTrait;
use InvalidArgumentException;
use Symfony\Component\Serializer\Exception\ExceptionInterface;

class DepositService extends GatewayServiceAbstract
{
    use TransactionSaverTrait;

    /**
     * @var DepositApi
     */
    protected $api;

    /**
     * @var BillingEntityProcessing
     */
    protected $billingService;

    /**
     * DepositService constructor.
     *
     * @param DepositApi $api
     * @param BillingEntityProcessing $billingService
     */
    public function __construct(
        DepositApi $api,
        BillingEntityProcessing $billingService
    )
    {
        $this->api = $api;
        $this->billingService = $billingService;
    }

    /**
     * @param DepositRequest $request
     *
     * @throws GatewayErrorException
     * @throws ExceptionInterface
     */
    public function execute(DepositRequest $request): void
    {
        $billing = $this->billingService->getBilling();

        if ($billing->getAmount() <= 0) {
            throw new InvalidArgumentException('Amount must be greater than 0');
        }

        /** @var GetStatusRequest $statusRequest */
        $statusRequest = $this->gateway->execute(new GetStatusRequest([]));

        if (!$statusRequest->isHold()) {
            $billing->setStatus($statusRequest->getValue());
            $this->billingService->save();

            throw new GatewayErrorException("Billings has wrong status for Deposit [{$statusRequest->getValue()}]");
        }

        $requestModel = new DepositRequestDTO();
        $requestModel->setOrderId($billing->getExternalId());
        $requestModel->setAmount($billing->getAmount());

        /** @var DepositResponseDTO $responseDTO */
        $responseDTO = $this->api->request($requestModel);

        $request->setModel($responseDTO);

        $request->markDone();
    }
}
