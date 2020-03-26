<?php
/**
 * Created by PhpStorm.
 * User: Drummer1
 * Date: 23.04.18
 * Time: 16:50.
 */

namespace App\Service\GatewayFactory\Acquiring\Service;

use App\Exception\GatewayErrorException;
use App\Request\GetStatusRequest;
use App\Request\Model\RefundModel;
use App\Request\RefundRequest;
use App\Service\Billing\BillingEntityProcessing;
use App\Service\GatewayFactory\Acquiring\Api\RefundApi;
use App\Service\GatewayFactory\Acquiring\DTO\Request\RefundRequestDTO;
use App\Service\GatewayFactory\Acquiring\DTO\Response\RefundResponseDTO;
use App\Service\GatewayFactory\GatewayServiceAbstract;
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
     * RefundService constructor.
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
     * @return RefundRequest
     * @throws GatewayErrorException
     * @throws ExceptionInterface
     */
    public function execute(RefundRequest $request): RefundRequest
    {
        /** @var RefundModel $refundModel */
        $refundModel = $request->getModel();

        /** @var GetStatusRequest $statusRequest */
        $statusRequest = $this->gateway->execute(new GetStatusRequest([]));

        $billing = $this->billingService->getBilling();

        if (!$statusRequest->isDone()) {
            $request->syncStatus($statusRequest);
            throw new GatewayErrorException("Billings has wrong status for Refund [{$statusRequest->getValue()}]");
        }

        $acquiringRegisterDTO = new RefundRequestDTO();
        $acquiringRegisterDTO->setOrderId($billing->getExternalId());
        $acquiringRegisterDTO->setAmount($refundModel->getAmount());

        /** @var RefundResponseDTO $responseDTO */
        $responseDTO = $this->api->request($acquiringRegisterDTO);

        $request->markRefunded();
        $request->setModel($responseDTO);

        return $request;
    }
}
