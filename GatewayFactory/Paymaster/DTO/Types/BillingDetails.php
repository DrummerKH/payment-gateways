<?php
/**
 *
 * Dmitry Hvorostyuk
 * Date: 25.10.2018.
 */

namespace App\Service\GatewayFactory\Paymaster\DTO\Types;


class BillingDetails
{
    /**
     * Параметр LMI_PAYMENT_METHOD.
     *
     * @var string
     */
    private $paymentMethod;

    /**
     * Парамтре LMI_MERCHANT_ID.
     *
     * @var string
     */
    private $merchantId;

    /**
     * @return string
     */
    public function getMerchantId(): ?string
    {
        return $this->merchantId;
    }

    /**
     * @param string $merchantId
     */
    public function setMerchantId(string $merchantId): void
    {
        $this->merchantId = $merchantId;
    }

    /**
     * @return string
     */
    public function getPaymentMethod(): ?string
    {
        return $this->paymentMethod;
    }

    /**
     * @param string $paymentMethod
     */
    public function setPaymentMethod(string $paymentMethod): void
    {
        $this->paymentMethod = $paymentMethod;
    }
}
