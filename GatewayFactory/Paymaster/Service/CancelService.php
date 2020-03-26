<?php
/**
 * Created by PhpStorm.
 * User: Drummer1
 * Date: 16.05.18
 * Time: 11:45.
 */

namespace App\Service\GatewayFactory\Paymaster\Service;

use App\Exception\GatewayErrorException;
use App\Request\CancelRequest;
use App\Request\GetStatusRequest;
use App\Service\Billing\BillingEntityProcessing;
use App\Service\GatewayFactory\GatewayServiceAbstract;
use App\Service\GatewayFactory\Paymaster\Api\CancelApi;
use App\Service\GatewayFactory\Paymaster\Api\DepositApi;
use App\Service\GatewayFactory\Paymaster\DTO\Request\CancelRequestDTO;
use App\Traits\TransactionSaverTrait;
use ReflectionException;
use Symfony\Component\Serializer\Exception\ExceptionInterface;

class CancelService extends GatewayServiceAbstract
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
     * @param CancelApi $api
     * @param BillingEntityProcessing $billingService
     */
    public function __construct(CancelApi $api, BillingEntityProcessing $billingService)
    {
        $this->api = $api;
        $this->billingService = $billingService;
    }

    /**
     * @param CancelRequest $request
     *
     * @throws GatewayErrorException
     * @throws ReflectionException
     * @throws ExceptionInterface
     */
    public function execute(CancelRequest $request)
    {
        $billing = $this->billingService->getBilling();

        /** @var GetStatusRequest $statusRequest */
        $statusRequest = $this->gateway->execute(new GetStatusRequest([]));

        if (!$statusRequest->isHold()) {
            $billing->setStatus($statusRequest->getValue());
            $this->billingService->save();

            throw new GatewayErrorException("Billing has wrong status for Cancel [{$statusRequest->getValue()}]");
        }

        $cancelRequestDTO = new CancelRequestDTO();
        $cancelRequestDTO->setPaymentId($billing->getExternalId());

        $this->api->request($cancelRequestDTO);

        $request->markCanceled();
    }
}
