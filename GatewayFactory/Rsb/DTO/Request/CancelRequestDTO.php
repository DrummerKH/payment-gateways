<?php
/**
 *
 * Dmitry Hvorostyuk
 * Date: 17.09.2018.
 */

namespace App\Service\GatewayFactory\Rsb\DTO\Request;

class CancelRequestDTO extends BaseRequestDTO
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
     *
     * @var int
     */
    private $amount;

    /**
     * Параметр –флаг, указывающий, что отмена делается из-за подозрения в мошенничестве.
     * В таких случаях значение этого параметра должно быть установлено как "yes".
     * Если этот параметр используется, отмена только всей суммы.
     *
     * @var string
     */
    private $suspectedFraud;

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

    /**
     * @return string
     */
    public function getSuspectedFraud(): ?string
    {
        return $this->suspectedFraud;
    }

    /**
     * @param string $suspectedFraud
     */
    public function setSuspectedFraud(string $suspectedFraud): void
    {
        $this->suspectedFraud = $suspectedFraud;
    }

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
}
