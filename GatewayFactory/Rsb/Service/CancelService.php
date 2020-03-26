<?php
/**
 *
 * Dmitry Hvorostyuk
 * Date: 17.09.2018.
 */

namespace App\Service\GatewayFactory\Rsb\Service;

use App\Exception\GatewayErrorException;
use App\Request\CancelRequest;
use App\Request\GetStatusRequest;
use App\Service\Billing\BillingEntityProcessing;
use App\Service\GatewayFactory\GatewayServiceAbstract;
use App\Service\GatewayFactory\Rsb\Api\CancelApi;
use App\Service\GatewayFactory\Rsb\DTO\Request\CancelRequestDTO;
use App\Traits\TransactionSaverTrait;
use Symfony\Component\Serializer\Exception\ExceptionInterface;

class CancelService extends GatewayServiceAbstract
{
    use TransactionSaverTrait;

    /**
     * @var CancelApi
     */
    protected $api;

    /**
     * @var BillingEntityProcessing
     */
    protected $billingService;

    /**
     * CancelService constructor.
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

        $cancelRequestDTO = new CancelRequestDTO();
        $cancelRequestDTO->setTransId($billing->getExternalId());

        $this->api->request($cancelRequestDTO);

        $request->markCanceled();
    }
}
