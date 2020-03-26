<?php
/**
 *
 * Dmitry Hvorostyuk
 * Date: 08.06.18.
 */

namespace App\Service\GatewayFactory\Rsb;

use App\Contracts\GatewayInterface;
use App\Service\GatewayFactory\BaseGatewayFactory;
use App\Service\GatewayFactory\Rsb\Service\CancelService;
use App\Service\GatewayFactory\Rsb\Service\DepositService;
use App\Service\GatewayFactory\Rsb\Service\GetStatusService;
use App\Service\GatewayFactory\Rsb\Service\RefundService;
use App\Service\GatewayFactory\Rsb\Service\RegisterCallbackService;
use App\Service\GatewayFactory\Rsb\Service\RegisterService;

class RsbGatewayFactory extends BaseGatewayFactory
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
            GetStatusService::class,
            DepositService::class,
            RegisterCallbackService::class,
            CancelService::class,
            RefundService::class,
        ]);

        return $gateway;
    }
}
