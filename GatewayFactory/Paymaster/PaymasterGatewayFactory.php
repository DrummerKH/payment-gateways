<?php
/**
 * Created by PhpStorm.
 * User: Drummer1
 * Date: 24.04.18
 * Time: 12:08.
 */

namespace App\Service\GatewayFactory\Paymaster;

use App\Contracts\GatewayInterface;
use App\Service\GatewayFactory\BaseGatewayFactory;
use App\Service\GatewayFactory\Paymaster\Service\CancelService;
use App\Service\GatewayFactory\Paymaster\Service\DepositService;
use App\Service\GatewayFactory\Paymaster\Service\GetStatusService;
use App\Service\GatewayFactory\Paymaster\Service\InvoiceCallbackService;
use App\Service\GatewayFactory\Paymaster\Service\NotifyCallbackService;
use App\Service\GatewayFactory\Paymaster\Service\PaymentCallbackService;
use App\Service\GatewayFactory\Paymaster\Service\RefundService;
use App\Service\GatewayFactory\Paymaster\Service\RegisterService;

class PaymasterGatewayFactory extends BaseGatewayFactory
{
    /**
     * @param array $options
     *
     * @return GatewayInterface
     */
    public function create(array $options = []): GatewayInterface
    {
        $gateway = parent::create($options);

        $gateway->addServices([
            RegisterService::class,
            InvoiceCallbackService::class,
            PaymentCallbackService::class,
            NotifyCallbackService::class,
            GetStatusService::class,
            DepositService::class,
            CancelService::class,
            RefundService::class,
        ]);

        return $gateway;
    }
}
