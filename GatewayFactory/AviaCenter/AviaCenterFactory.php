<?php
/**
 * Created by PhpStorm.
 * User: Drummer1
 * Date: 04.05.18
 * Time: 14:07.
 */

namespace App\Service\GatewayFactory\AviaCenter;

use App\Contracts\GatewayInterface;
use App\Service\GatewayFactory\AviaCenter\Service\CreateCardService;
use App\Service\GatewayFactory\AviaCenter\Service\DetailsCardService;
use App\Service\GatewayFactory\AviaCenter\Service\GetCardService;
use App\Service\GatewayFactory\BaseGatewayFactory;

class AviaCenterFactory extends BaseGatewayFactory
{
    /**
     * @param array $options
     *
     * @return GatewayInterface
     */
    public function create(array $options = []): GatewayInterface
    {
        parent::create($options);

        $this->gateway->addServices([
            CreateCardService::class,
            GetCardService::class,
            DetailsCardService::class,
        ]);

        return $this->gateway;
    }
}
