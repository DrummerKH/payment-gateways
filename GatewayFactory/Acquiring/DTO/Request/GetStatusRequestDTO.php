<?php
/**
 * Created by PhpStorm.
 * User: Drummer1
 * Date: 18.04.18
 * Time: 13:33.
 */

namespace App\Service\GatewayFactory\Acquiring\DTO\Request;

class GetStatusRequestDTO extends BaseRequestDTO
{
    /**
     * Номер заказа в платежной системе. Уникален в пределах системы.
     *
     * @var string
     */
    protected $orderId;

    /**
     * Язык в кодировке ISO 639-1. Если не указан, считается, что язык – русский. Сообщение ошибке будет возвращено именно на этом языке.
     *
     * @var string
     */
    protected $language;

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
}
