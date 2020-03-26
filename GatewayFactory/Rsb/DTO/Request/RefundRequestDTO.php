<?php
/**
 *
 * Dmitry Hvorostyuk
 * Date: 17.09.2018.
 */

namespace App\Service\GatewayFactory\Rsb\DTO\Request;

class RefundRequestDTO extends BaseRequestDTO
{
    /**
     * Идентификатор транзакции.
     *
     * @var string
     */
    private $transId;

    /**
     * Сумма транзакции в целых единицах.
     * Если необходимо возместить сумму меньше суммы оригинальной операции, параметр обязателен.
     * Если параметр не указан, возвращается вся сумма.
     *
     * @var int
     */
    private $amount;

    /**
     * @return string
     */
    public function getTransId(): string
    {
        return $this->transId;
    }

    /**
     * @param string $transId
     */
    public function setTransId(string $transId): void
    {
        $this->transId = $transId;
    }

    /**
     * @return int
     */
    public function getAmount(): ?int
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
