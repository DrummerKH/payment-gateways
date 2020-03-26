<?php
/**
 * Created by PhpStorm.
 * User: Drummer1
 * Date: 16.05.18
 * Time: 11:45.
 */

namespace App\Service\GatewayFactory\Paymaster\Service;

use App\Exception\GatewayErrorException;
use App\Request\DepositRequest;
use App\Request\GetStatusRequest;
use App\Service\Billing\BillingEntityProcessing;
use App\Service\GatewayFactory\GatewayServiceAbstract;
use App\Service\GatewayFactory\Paymaster\Api\DepositApi;
use App\Service\GatewayFactory\Paymaster\DTO\Request\DepositRequestDTO;
use App\Traits\TransactionSaverTrait;
use InvalidArgumentException;
use ReflectionException;
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
    public function __construct(DepositApi $api, BillingEntityProcessing $billingService)
    {
        $this->api = $api;
        $this->billingService = $billingService;
    }

    /**
     * @param DepositRequest $request
     *
     * @throws GatewayErrorException
     * @throws ReflectionException
     * @throws ExceptionInterface
     */
    public function execute(DepositRequest $request)
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

            throw new GatewayErrorException("Billing has wrong status for Deposit [{$statusRequest->getValue()}]");
        }

        $depositDTO = new DepositRequestDTO();
        $depositDTO->setPaymentId($billing->getExternalId());
        $depositDTO->setAmount($billing->getAmount());

        $this->api->request($depositDTO);

        $request->markDone();
    }
}
