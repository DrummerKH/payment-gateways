<?php
/**
 * Created by PhpStorm.
 * User: Drummer1
 * Date: 11.05.18
 * Time: 16:04.
 */

namespace App\Service\GatewayFactory\Enett\Service;

use App\DBAL\Types\BillingStatusType;
use App\Exception\GatewayErrorException;
use App\Request\CancelRequest;
use App\Service\Billing\BillingEntityProcessing;
use App\Service\GatewayFactory\Enett\Api\CancelVANApi;
use App\Service\GatewayFactory\Enett\DTO\Request\CancelVANRequestDTO;
use App\Service\GatewayFactory\Enett\DTO\Response\CancelVANResponseDTO;
use App\Service\GatewayFactory\Enett\DTO\Type\CancelReasonType;
use App\Service\GatewayFactory\GatewayServiceAbstract;
use App\Traits\TransactionSaverTrait;
use Payum\Core\Exception\LogicException;
use ReflectionException;
use Symfony\Component\Serializer\Exception\ExceptionInterface;

class CancelVANService extends GatewayServiceAbstract
{
    use TransactionSaverTrait;

    /**
     * @var CancelVANApi
     */
    protected $api;

    /**
     * @var BillingEntityProcessing
     */
    protected $billingService;

    /**
     * CancelVANService constructor.
     *
     * @param CancelVANApi $api
     * @param BillingEntityProcessing $billingService
     */
    public function __construct(CancelVANApi $api, BillingEntityProcessing $billingService)
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

        if (BillingStatusType::ACCEPTED !== $billing->getStatus()) {
            throw new LogicException('Billing has wrong status');
        }

        $dto = new CancelVANRequestDTO();
        $dto->setIntegratorReference($billing->getOrderId());
        $dto->setCancelReason(CancelReasonType::BOOKING_CANCELLED);

        /** @var CancelVANResponseDTO $response */
        $response = $this->api->request($dto);

        $request->markCanceled();

        $request->setModel($response);
    }
}
