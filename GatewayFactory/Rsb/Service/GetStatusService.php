<?php
/**
 *
 * Dmitry Hvorostyuk
 * Date: 09.06.18.
 */

namespace App\Service\GatewayFactory\Rsb\Service;

use App\Exception\GatewayErrorException;
use App\Request\GetStatusRequest;
use App\Service\Billing\BillingEntityProcessing;
use App\Service\GatewayFactory\GatewayServiceAbstract;
use App\Service\GatewayFactory\Rsb\Api\GetStatusApi;
use App\Service\GatewayFactory\Rsb\DTO\Request\GetStatusRequestDTO;
use App\Service\GatewayFactory\Rsb\DTO\Response\GetStatusResponseDTO;
use App\Service\GatewayFactory\Rsb\DTO\Type\TransactionResult;
use App\Traits\TransactionSaverTrait;
use Symfony\Component\Serializer\Exception\ExceptionInterface;

class GetStatusService extends GatewayServiceAbstract
{
    use TransactionSaverTrait;

    /**
     * @var GetStatusApi
     */
    protected $api;

    protected $billingProcessing;

    public function __construct(GetStatusApi $api, BillingEntityProcessing $billingProcessing)
    {
        $this->api = $api;
        $this->billingProcessing = $billingProcessing;
    }

    /**
     * @param GetStatusRequest $request
     *
     * @return GetStatusRequest
     * @throws GatewayErrorException
     * @throws ExceptionInterface
     */
    public function execute(GetStatusRequest $request): GetStatusRequest
    {
        // If external id is empty means billing wasn't started properly
        if (null === ($externalId = $this->billingProcessing->getBilling()->getExternalId())) {
            $request->markFailed();

            return $request;
        }

        $DTO = new GetStatusRequestDTO();
        $DTO->setTransId($externalId);

        /** @var GetStatusResponseDTO $response */
        $response = $this->api->request($DTO);

        switch ($response->getRESULT()) {
            case TransactionResult::OK:
                $request->markDone();

                break;
            case TransactionResult::CREATED:
                $request->markAccepted();

                break;
            case TransactionResult::PENDING:
                $request->markHold();

                break;
            case TransactionResult::AUTOREVERSED:
            case TransactionResult::DECLINED:
            case TransactionResult::REVERSED:
                $request->markCanceled();

                break;
            case TransactionResult::FAILED:
            case TransactionResult::TIMEOUT:
                $request->markFailed();

                break;
        }

        $request->setModel($response);

        return $request;
    }
}
