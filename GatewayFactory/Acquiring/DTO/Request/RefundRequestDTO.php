<?php
/**
 * Created by PhpStorm.
 * User: Drummer1
 * Date: 23.04.18
 * Time: 16:10.
 */

namespace App\Service\GatewayFactory\Acquiring\DTO\Request;

class RefundRequestDTO extends BaseRequestDTO
{
    /**
     * @var string
     */
    protected $orderId;

    /**
     * @var string
     */
    protected $amount;

    /**
     * @return string
     */
    public function getOrderId(): string
    {
        return $this->orderId;
    }

    /**
     * @param string $orderId
     */
    public function setOrderId(string $orderId): void
    {
        $this->orderId = $orderId;
    }

    /**
     * @return string
     */
    public function getAmount(): string
    {
        return $this->amount;
    }

    /**
     * @param string $amount
     */
    public function setAmount(string $amount): void
    {
        $this->amount = $amount;
    }
}
