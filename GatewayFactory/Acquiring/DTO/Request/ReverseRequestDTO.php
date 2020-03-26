<?php
/**
 * Created by PhpStorm.
 * User: Drummer1
 * Date: 15.05.18
 * Time: 11:46.
 */

namespace App\Service\GatewayFactory\Acquiring\DTO\Request;

class ReverseRequestDTO extends BaseRequestDTO
{
    protected $orderId;

    /**
     * @return mixed
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * @param mixed $orderId
     */
    public function setOrderId($orderId): void
    {
        $this->orderId = $orderId;
    }
}
