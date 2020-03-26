<?php
/**
 *
 * Dmitry Hvorostyuk
 * Date: 17.09.2018.
 */

namespace App\Service\GatewayFactory\Rsb\Service;

use App\Exception\GatewayErrorException;
use App\Request\GetStatusRequest;
use App\Request\Model\RefundModel;
use App\Request\RefundRequest;
use App\Service\Billing\BillingEntityProcessing;
use App\Service\GatewayFactory\GatewayServiceAbstract;
use App\Service\GatewayFactory\Rsb\Api\RefundApi;
use App\Service\GatewayFactory\Rsb\DTO\Request\RefundRequestDTO;
use App\Traits\TransactionSaverTrait;
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
     * CancelService constructor.
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
     * @throws ExceptionInterface
     */
    public function execute(RefundRequest $request)
    {
        /** @var RefundModel $refundModel */
        $refundModel = $request->getModel();

        /** @var GetStatusRequest $statusResponse */
        $statusResponse = $this->gateway->execute(new GetStatusRequest([]));

        $request->syncStatus($statusResponse);

        $billing = $this->billingService->getBilling();

        if (!$statusResponse->isDone()) {
            $billing->setStatus($statusResponse->getValue());
            $this->billingService->save();

            throw new GatewayErrorException("Billing has wrong status for Refund [{$statusResponse->getValue()}]");
        }

        $refundRequestDTO = new RefundRequestDTO();
        $refundRequestDTO->setTransId($billing->getExternalId());
        $refundRequestDTO->setAmount($refundModel->getAmount());

        $this->api->request($refundRequestDTO);

        $request->markRefunded();
    }
}
