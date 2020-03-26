<?php
/**
 * Created by PhpStorm.
 * User: Drummer1
 * Date: 18.04.18
 * Time: 13:31.
 */

namespace App\Service\GatewayFactory\Acquiring\Service;

use App\Exception\GatewayErrorException;
use App\Request\GetStatusRequest;
use App\Service\Billing\BillingEntityProcessing;
use App\Service\GatewayFactory\Acquiring\Api\GetStatusApi;
use App\Service\GatewayFactory\Acquiring\DTO\Request\GetStatusRequestDTO;
use App\Service\GatewayFactory\Acquiring\DTO\Response\GetStatusResponseDTO;
use App\Service\GatewayFactory\Acquiring\DTO\Types\GetStatusErrorType;
use App\Service\GatewayFactory\Acquiring\DTO\Types\OrderStatusType;
use App\Service\GatewayFactory\GatewayServiceAbstract;
use App\Traits\TransactionSaverTrait;
use ReflectionException;
use Symfony\Component\Serializer\Exception\ExceptionInterface;

class GetStatusService extends GatewayServiceAbstract
{
    use TransactionSaverTrait;

    /**
     * @var GetStatusApi
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
    public function __construct(GetStatusApi $api, BillingEntityProcessing $billingService)
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
     */
    public function execute(GetStatusRequest $request): GetStatusRequest
    {
        // If external id is empty means billing wasn't started properly
        if (null === ($externalId = $this->billingService->getBilling()->getExternalId())) {
            $request->markFailed();

            return $request;
        }

        $statusDTO = new GetStatusRequestDTO();
        $statusDTO->setOrderId($externalId);

        try {
            /** @var GetStatusResponseDTO $responseDTO */
            $responseDTO = $this->api->request($statusDTO);
        } /* @noinspection PhpRedundantCatchClauseInspection */
        catch (GatewayErrorException $exception) {
            /** @var GetStatusResponseDTO $responseDTO */
            $responseDTO = $exception->getResponseDTO();

            if (GetStatusErrorType::DECLINED === $responseDTO->getErrorCode()) {
                $request->markFailed();

                return $request;
            }

            throw new GatewayErrorException($exception->getMessage(), null, $responseDTO, $exception);
        } catch (ExceptionInterface $e) {
        }

        // In case of successful response
        switch ($responseDTO->getOrderStatus()) {
            case OrderStatusType::ORDER_HOLD:
                $request->markHold();

                break;
            case OrderStatusType::ORDER_REGISTERED:
                $request->markAccepted();

                break;
            case OrderStatusType::ORDER_REFUNDED:
                $request->markRefunded();

                break;
            case OrderStatusType::ORDER_AUTHORIZED:
                $request->markDone();

                break;
            case OrderStatusType::AUTHORIZATION_DECLINED:
                $request->markFailed();

                break;
            case OrderStatusType::AUTHORIZED_CANCELLED:
                $request->markCanceled();

                break;
        }

        $request->setModel($responseDTO);

        return $request;
    }
}
