<?php
/**
 * Created by PhpStorm.
 * User: Drummer1
 * Date: 16.05.18
 * Time: 12:00.
 */

namespace App\Service\GatewayFactory\Paymaster\DTO\Request;

use App\Annotation\Sign;

class DepositRequestDTO extends RestRequestDTO
{
    /**
     * идентификатор платежа в системе PayMaster (поле LMI_SYS_PAYMENT_ID).
     *
     * @var string
     * @Sign(order=4)
     */
    protected $paymentId;

    /**
     * реальная сумма списания.
     *
     * @var float
     * @Sign(order=5)
     */
    protected $amount;

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
}
