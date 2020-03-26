<?php
/**
 *
 * Dmitry Hvorostyuk
 * Date: 17.09.2018.
 */

namespace App\Service\GatewayFactory\Paymaster\DTO\Request;

use App\Annotation\Sign;

class RefundRequestDTO extends RestRequestDTO
{
    /**
     * идентификатор платежа в системе PayMaster (поле LMI_SYS_PAYMENT_ID).
     *
     * @var string
     * @Sign(order=4)
     */
    private $paymentId;

    /**
     * идентификатор возврата в системе продавца, не обязательный (допускается не уникальное значение).
     *
     * @var float
     * @Sign(order=5)
     */
    private $amount;

    /**
     * реальная сумма списания.
     *
     * @var mixed
     * @Sign(order=6)
     */
    private $externalId;

    /**
     * @return string
     */
    public function getPaymentId(): string
    {
        return $this->paymentId;
    }

    /**
     * @param string $paymentId
     */
    public function setPaymentId(string $paymentId): void
    {
        $this->paymentId = $paymentId;
    }

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     */
    public function setAmount(float $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return mixed
     */
    public function getExternalId()
    {
        return $this->externalId;
    }

    /**
     * @param mixed $externalId
     */
    public function setExternalId($externalId): void
    {
        $this->externalId = $externalId;
    }
}
