<?php
/**
 * Created by PhpStorm.
 * User: Drummer1
 * Date: 28.04.18
 * Time: 13:21.
 */

namespace App\Service\GatewayFactory;

use App\Traits\GatewayAwareTrait;
use Payum\Core\GatewayAwareInterface;

abstract class GatewayServiceAbstract implements GatewayServiceInterface, GatewayAwareInterface
{
    use GatewayAwareTrait;
}
