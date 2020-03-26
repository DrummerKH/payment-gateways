<?php
/**
 * Created by PhpStorm.
 * User: Drummer1
 * Date: 15.04.18
 * Time: 21:51.
 */

namespace App\Service\GatewayFactory\Acquiring\DTO\Request;

class DepositRequestDTO extends BaseRequestDTO
{
    /**
     * @var int
     */
    protected $orderId;

    /**
     * @var int
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
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     */
    public function setAmount(int $amount): void
    {
        $this->amount = $amount;
    }
}
