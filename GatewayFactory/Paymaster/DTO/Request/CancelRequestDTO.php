<?php
/**
 *
 * Dmitry Hvorostyuk
 * Date: 17.09.2018.
 */

namespace App\Service\GatewayFactory\Paymaster\DTO\Request;

use App\Annotation\Sign;

class CancelRequestDTO extends RestRequestDTO
{
    /**
     * идентификатор платежа в системе PayMaster (поле LMI_SYS_PAYMENT_ID).
     *
     * @var string
     * @Sign(order=4)
     */
    protected $paymentId;

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
}
