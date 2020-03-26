<?php
/**
 * Created by PhpStorm.
 * User: Drummer1
 * Date: 04.05.18
 * Time: 14:07.
 */

namespace App\Service\GatewayFactory\Enett;

use App\Contracts\GatewayInterface;
use App\Service\GatewayFactory\BaseGatewayFactory;
use App\Service\GatewayFactory\Enett\Service\CancelVANService;
use App\Service\GatewayFactory\Enett\Service\IssueVANService;

class EnettGatewayFactory extends BaseGatewayFactory
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
            IssueVANService::class,
            CancelVANService::class,
        ]);

        return $gateway;
    }
}
