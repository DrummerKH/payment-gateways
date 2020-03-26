<?php
/**
 * Created by PhpStorm.
 * User: Drummer1
 * Date: 15.05.18
 * Time: 11:43.
 */

namespace App\Service\GatewayFactory\Acquiring\Service;

use App\Exception\GatewayErrorException;
use App\Request\CancelRequest;
use App\Request\GetStatusRequest;
use App\Service\Billing\BillingEntityProcessing;
use App\Service\GatewayFactory\Acquiring\Api\ReverseApi;
use App\Service\GatewayFactory\Acquiring\DTO\Request\ReverseRequestDTO;
use App\Service\GatewayFactory\Acquiring\DTO\Response\ReverseResponseDTO;
use App\Service\GatewayFactory\GatewayServiceAbstract;
use App\Traits\TransactionSaverTrait;
use Symfony\Component\Serializer\Exception\ExceptionInterface;

class CancelService extends GatewayServiceAbstract
{
    use TransactionSaverTrait;

    /**
     * @var ReverseApi
     */
    protected $api;

    /**
     * @var BillingEntityProcessing
     */
    protected $billingService;

    /**
     * CancelService constructor.
     *
     * @param ReverseApi $api
     * @param BillingEntityProcessing $billingService
     */
    public function __construct(ReverseApi $api, BillingEntityProcessing $billingService)
    {
        $this->api = $api;
        $this->billingService = $billingService;
    }

    /**
     * @param CancelRequest $request
     *
     * @throws GatewayErrorException
     * @throws ExceptionInterface
     */
    public function execute(CancelRequest $request)
    {
        $billing = $this->billingService->getBilling();
        /** @var GetStatusRequest $statusResponse */
        $statusResponse = $this->gateway->execute(new GetStatusRequest([]));

        $request->syncStatus($statusResponse);

        if (!$statusResponse->isHold()) {
            $billing->setStatus($statusResponse->getValue());
            $this->billingService->save();

            throw new GatewayErrorException("Billing has wrong status for Cancel [{$statusResponse->getValue()}]");
        }

        $reverseDTO = new ReverseRequestDTO();
        $reverseDTO->setOrderId($billing->getExternalId());

        /* @var ReverseResponseDTO $reverseResponse */
        $this->api->request($reverseDTO);

        $request->markCanceled();
    }
}
