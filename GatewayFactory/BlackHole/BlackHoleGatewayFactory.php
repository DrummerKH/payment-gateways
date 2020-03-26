<?php
/**
 * Created by PhpStorm.
 * User: Drummer1
 * Date: 03.05.18
 * Time: 13:42.
 */

namespace App\Service\GatewayFactory\BlackHole;

use App\Contracts\GatewayInterface;
use App\Service\GatewayFactory\BaseGatewayFactory;
use App\Service\GatewayFactory\BlackHole\Service\DepositService;
use App\Service\GatewayFactory\BlackHole\Service\RegisterService;

class BlackHoleGatewayFactory extends BaseGatewayFactory
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
            DepositService::class,
        ]);

        return $gateway;
    }
}
