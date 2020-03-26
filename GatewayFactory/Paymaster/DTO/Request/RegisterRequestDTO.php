<?php
/**
 * Created by PhpStorm.
 * User: Drummer1
 * Date: 24.04.18
 * Time: 16:19.
 */

namespace App\Service\GatewayFactory\Paymaster\DTO\Request;

use Symfony\Component\Validator\Constraints;

class RegisterRequestDTO
{
    /**
     * @Constraints\NotBlank()
     *
     * @var string
     */
    protected $LMI_MERCHANT_ID;

    /**
     * @Constraints\NotBlank()
     *
     * @var float
     */
    protected $LMI_PAYMENT_AMOUNT;

    /**
     * @Constraints\Length(3)
     * @Constraints\Type(string)
     *
     * @var string
     */
    protected $LMI_CURRENCY;

    /**
     * @var int
     */
    protected $LMI_PAYMENT_NO;

    /**
     * @var string
     */
    protected $LMI_PAYMENT_DESC;

    /**
     * @var string
     */
    protected $LMI_PAYMENT_DESC_BASE64;

    /**
     * @Constraints\Range(0,2)
     *
     * @var int
     */
    protected $LMI_SIM_MODE;

    /**
     * @Constraints\Url()
     *
     * @var string;
     */
    protected $LMI_INVOICE_CONFIRMATION_URL;

    /**
     * @Constraints\Url
     *
     * @var string
     */
    protected $LMI_PAYMENT_NOTIFICATION_URL;

    /**
     * @Constraints\Url
     *
     * @var string
     */
    protected $LMI_SUCCESS_URL;

    /**
     * @Constraints\Url
     *
     * @var string
     */
    protected $LMI_FAILURE_URL;

    /**
     * @var string
     */
    protected $LMI_PAYER_PHONE_NUMBER;

    /**
     * @Constraints\Email()
     *
     * @var string
     */
    protected $LMI_PAYER_EMAIL;

    /**
     * @Constraints\DateTime()
     *
     * @var string
     */
    protected $LMI_EXPIRES;

    /**
     * @var string
     */
    protected $LMI_PAYMENT_METHOD;

    /**
     * @var string
     */
    protected $LMI_SHOP_ID;

    /**
     * @var string
     */
    protected $JSON_PARAMS;

    /**
     * @return string
     */
    public function getLmiMerchantId(): string
    {
        return $this->LMI_MERCHANT_ID;
    }

    /**
     * @param string $LMI_MERCHANT_ID
     */
    public function setLmiMerchantId(string $LMI_MERCHANT_ID): void
    {
        $this->LMI_MERCHANT_ID = $LMI_MERCHANT_ID;
    }

    /**
     * @return float
     */
    public function getLmiPaymentAmount(): float
    {
        return $this->LMI_PAYMENT_AMOUNT;
    }

    /**
     * @param float $LMI_PAYMENT_AMOUNT
     */
    public function setLmiPaymentAmount(float $LMI_PAYMENT_AMOUNT): void
    {
        $this->LMI_PAYMENT_AMOUNT = $LMI_PAYMENT_AMOUNT;
    }

    /**
     * @return string
     */
    public function getLmiCurrency(): string
    {
        return $this->LMI_CURRENCY;
    }

    /**
     * @param string $LMI_CURRENCY
     */
    public function setLmiCurrency(string $LMI_CURRENCY): void
    {
        $this->LMI_CURRENCY = $LMI_CURRENCY;
    }

    /**
     * @return int
     */
    public function getLmiPaymentNo(): int
    {
        return $this->LMI_PAYMENT_NO;
    }

    /**
     * @param int $LMI_PAYMENT_NO
     */
    public function setLmiPaymentNo(int $LMI_PAYMENT_NO): void
    {
        $this->LMI_PAYMENT_NO = $LMI_PAYMENT_NO;
    }

    /**
     * @return string
     */
    public function getLmiPaymentDesc(): ?string
    {
        return $this->LMI_PAYMENT_DESC;
    }

    /**
     * @param string $LMI_PAYMENT_DESC
     */
    public function setLmiPaymentDesc(string $LMI_PAYMENT_DESC): void
    {
        $this->LMI_PAYMENT_DESC = $LMI_PAYMENT_DESC;
    }

    /**
     * @return string
     */
    public function getLmiPaymentDescBase64(): string
    {
        return $this->LMI_PAYMENT_DESC_BASE64;
    }

    /**
     * @param string $LMI_PAYMENT_DESC_BASE64
     */
    public function setLmiPaymentDescBase64(string $LMI_PAYMENT_DESC_BASE64): void
    {
        $this->LMI_PAYMENT_DESC_BASE64 = $LMI_PAYMENT_DESC_BASE64;
    }

    /**
     * @return int
     */
    public function getLmiSimMode(): int
    {
        return $this->LMI_SIM_MODE;
    }

    /**
     * @param int $LMI_SIM_MODE
     */
    public function setLmiSimMode(int $LMI_SIM_MODE): void
    {
        $this->LMI_SIM_MODE = $LMI_SIM_MODE;
    }

    /**
     * @return string
     */
    public function getLmiInvoiceConfirmationUrl(): string
    {
        return $this->LMI_INVOICE_CONFIRMATION_URL;
    }

    /**
     * @param string $LMI_INVOICE_CONFIRMATION_URL
     */
    public function setLmiInvoiceConfirmationUrl(string $LMI_INVOICE_CONFIRMATION_URL): void
    {
        $this->LMI_INVOICE_CONFIRMATION_URL = $LMI_INVOICE_CONFIRMATION_URL;
    }

    /**
     * @return string
     */
    public function getLmiPaymentNotificationUrl(): string
    {
        return $this->LMI_PAYMENT_NOTIFICATION_URL;
    }

    /**
     * @param string $LMI_PAYMENT_NOTIFICATION_URL
     */
    public function setLmiPaymentNotificationUrl(string $LMI_PAYMENT_NOTIFICATION_URL): void
    {
        $this->LMI_PAYMENT_NOTIFICATION_URL = $LMI_PAYMENT_NOTIFICATION_URL;
    }

    /**
     * @return string
     */
    public function getLmiSuccessUrl(): string
    {
        return $this->LMI_SUCCESS_URL;
    }

    /**
     * @param string $LMI_SUCCESS_URL
     */
    public function setLmiSuccessUrl(string $LMI_SUCCESS_URL): void
    {
        $this->LMI_SUCCESS_URL = $LMI_SUCCESS_URL;
    }

    /**
     * @return string
     */
    public function getLmiFailureUrl(): string
    {
        return $this->LMI_FAILURE_URL;
    }

    /**
     * @param string $LMI_FAILURE_URL
     */
    public function setLmiFailureUrl(string $LMI_FAILURE_URL): void
    {
        $this->LMI_FAILURE_URL = $LMI_FAILURE_URL;
    }

    /**
     * @return string
     */
    public function getLmiPayerPhoneNumber(): ?string
    {
        return $this->LMI_PAYER_PHONE_NUMBER;
    }

    /**
     * @param string $LMI_PAYER_PHONE_NUMBER
     */
    public function setLmiPayerPhoneNumber(string $LMI_PAYER_PHONE_NUMBER): void
    {
        $this->LMI_PAYER_PHONE_NUMBER = $LMI_PAYER_PHONE_NUMBER;
    }

    /**
     * @return string
     */
    public function getLmiPayerEmail(): ?string
    {
        return $this->LMI_PAYER_EMAIL;
    }

    /**
     * @param string $LMI_PAYER_EMAIL
     */
    public function setLmiPayerEmail(string $LMI_PAYER_EMAIL): void
    {
        $this->LMI_PAYER_EMAIL = $LMI_PAYER_EMAIL;
    }

    /**
     * @return string
     */
    public function getLmiExpires(): ?string
    {
        return $this->LMI_EXPIRES;
    }

    /**
     * @param string $LMI_EXPIRES
     */
    public function setLmiExpires(string $LMI_EXPIRES): void
    {
        $this->LMI_EXPIRES = $LMI_EXPIRES;
    }

    /**
     * @return string
     */
    public function getLmiPaymentMethod(): string
    {
        return $this->LMI_PAYMENT_METHOD;
    }

    /**
     * @param string $LMI_PAYMENT_METHOD
     */
    public function setLmiPaymentMethod(string $LMI_PAYMENT_METHOD): void
    {
        $this->LMI_PAYMENT_METHOD = $LMI_PAYMENT_METHOD;
    }

    /**
     * @return string
     */
    public function getLmiShopId(): ?string
    {
        return $this->LMI_SHOP_ID;
    }

    /**
     * @param string $LMI_SHOP_ID
     */
    public function setLmiShopId(string $LMI_SHOP_ID): void
    {
        $this->LMI_SHOP_ID = $LMI_SHOP_ID;
    }

    /**
     * @return string
     */
    public function getJsonParams(): ?string
    {
        return $this->JSON_PARAMS;
    }

    /**
     * @param string $JSON_PARAMS
     */
    public function setJsonParams(string $JSON_PARAMS): void
    {
        $this->JSON_PARAMS = $JSON_PARAMS;
    }
}
