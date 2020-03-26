<?php
/**
 * Created by PhpStorm.
 * User: Drummer1
 * Date: 11.04.18
 * Time: 16:53.
 */

namespace App\Service\GatewayFactory\Acquiring;

use App\Contracts\GatewayInterface;
use App\Service\GatewayFactory\BaseGatewayFactory;

class AcquiringGatewayFactory extends BaseGatewayFactory
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
            Service\RegisterService::class,
            Service\RegisterCallbackService::class,
            Service\DepositService::class,
            Service\GetStatusService::class,
            Service\RefundService::class,
            Service\CancelService::class,
        ]);

        return $gateway;
    }
}
