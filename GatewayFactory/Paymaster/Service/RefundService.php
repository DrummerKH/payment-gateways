<?php
/**
 * Created by PhpStorm.
 * User: Drummer1
 * Date: 16.05.18
 * Time: 11:45.
 */

namespace App\Service\GatewayFactory\Paymaster\Service;

use App\Exception\GatewayErrorException;
use App\Request\GetStatusRequest;
use App\Request\Model\RefundModel;
use App\Request\RefundRequest;
use App\Service\Billing\BillingEntityProcessing;
use App\Service\GatewayFactory\GatewayServiceAbstract;
use App\Service\GatewayFactory\Paymaster\Api\RefundApi;
use App\Service\GatewayFactory\Paymaster\DTO\Request\RefundRequestDTO;
use App\Traits\TransactionSaverTrait;
use ReflectionException;
use Symfony\Component\Serializer\Exception\ExceptionInterface;

class RefundService extends GatewayServiceAbstract
{
    use TransactionSaverTrait;

    /**
     * @var RefundApi
     */
    protected $api;

    /**
     * @var BillingEntityProcessing
     */
    protected $billingService;

    /**
     * DepositService constructor.
     *
     * @param RefundApi $api
     * @param BillingEntityProcessing $billingService
     */
    public function __construct(RefundApi $api, BillingEntityProcessing $billingService)
    {
        $this->api = $api;
        $this->billingService = $billingService;
    }

    /**
     * @param RefundRequest $request
     *
     * @throws GatewayErrorException
     * @throws ReflectionException
     * @throws ExceptionInterface
     */
    public function execute(RefundRequest $request)
    {
        /** @var RefundModel $refundModel */
        $refundModel = $request->getModel();

        /** @var GetStatusRequest $statusRequest */
        $statusRequest = $this->gateway->execute(new GetStatusRequest([]));

        $billing = $this->billingService->getBilling();

        if (!$statusRequest->isDone()) {
            $billing->setStatus($statusRequest->getValue());
            $this->billingService->save();

            throw new GatewayErrorException("Billing has wrong status for Refund [{$statusRequest->getValue()}]");
        }

        $refundRequestDTO = new RefundRequestDTO();
        $refundRequestDTO->setPaymentId($billing->getExternalId());
        $refundRequestDTO->setAmount($refundModel->getAmount());

        $this->api->request($refundRequestDTO);

        $request->markCanceled();
    }
}
