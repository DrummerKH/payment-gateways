<?php
/**
 * Created by PhpStorm.
 * User: Drummer1
 * Date: 26.04.18
 * Time: 12:10.
 */

namespace App\Service\GatewayFactory\Paymaster\Service;

use App\Exception\GatewayErrorException;
use App\Request\GetStatusRequest;
use App\Request\NotifyCallbackRequest;
use App\Service\Billing\BillingEntityProcessing;
use App\Service\GatewayFactory\GatewayServiceAbstract;
use InvalidArgumentException;
use Symfony\Component\HttpFoundation\RedirectResponse;

class NotifyCallbackService extends GatewayServiceAbstract
{
    /**
     * @var BillingEntityProcessing
     */
    protected $billingService;

    /**
     * NotifyCallbackService constructor.
     *
     * @param BillingEntityProcessing $billingService
     */
    public function __construct(BillingEntityProcessing $billingService)
    {
        $this->billingService = $billingService;
    }

    /**
     * @param NotifyCallbackRequest $request
     *
     * @throws GatewayErrorException
     */
    public function execute(NotifyCallbackRequest $request)
    {
        // Получаем статус платежа
        /** @var GetStatusRequest $statusRequest */
        $statusRequest = $this->gateway->execute(new GetStatusRequest([]));

        $queryParameters = [
            'status' => $statusRequest->getValue(),
            'orderId' => $this->billingService->getBilling()->getOrderId(),
            'billingId' => $this->billingService->getBilling()->getId(),
        ];

        if (!$returnUrl = $this->billingService->getBilling()->getReturnUrl()) {
            throw new InvalidArgumentException('Return url is not set');
        }

        $request->setModel(
            new RedirectResponse($returnUrl . '?' . http_build_query($queryParameters))
        );
    }
}
