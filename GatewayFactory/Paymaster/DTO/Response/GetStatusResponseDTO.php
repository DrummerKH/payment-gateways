<?php
/**
 * Created by PhpStorm.
 * User: Drummer1
 * Date: 26.04.18
 * Time: 15:11.
 */

namespace App\Service\GatewayFactory\Paymaster\DTO\Response;

class GetStatusResponseDTO
{
    /**
     * состояние платежа.
     *
     * @var
     */
    protected $State;

    /**
     * сумма платежа.
     *
     * @var float
     */
    protected $Amount;

    /**
     * 3-буквенный ISO код валюты.
     *
     * @var string
     */
    protected $CurrencyCode;

    /**
     * признак тестового платежа (платеж совершен в тестовом режиме).
     *
     * @var bool
     */
    protected $IsTestPayment;

    /**
     * время последнего обновления статуса. Для завершенных платежей - время завершения платежа.
     *
     * @var string
     */
    protected $LastUpdateTime;

    /**
     * сумма оплаты.
     *
     * @var float
     */
    protected $PaymentAmount;

    /**
     * валюта оплаты.
     *
     * @var string
     */
    protected $PaymentCurrencyCode;

    /**
     * идентификатор платежа.
     *
     * @var int
     */
    protected $PaymentID;

    /**
     * идентификатор платежной системы.
     *
     * @var string
     */
    protected $PaymentSystemID;

    /**
     * примечание к платежу.
     *
     * @var string
     */
    protected $Purpose;

    /**
     * идентификатор сайта - получателя платежа.
     *
     * @var int
     */
    protected $SiteID;

    /**
     * номер счета (параметр LMI_PAYMENT_NO).
     *
     * @var int
     */
    protected $SiteInvoiceID;

    /**
     * идентификатор пользователя в платежной системе.
     *
     * @var string
     */
    protected $UserIdentifier;

    /**
     * номер телефона плательщика.
     *
     * @var string
     */
    protected $UserPhoneNumber;

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->State;
    }

    /**
     * @param mixed $State
     */
    public function setState($State): void
    {
        $this->State = $State;
    }

    /**
     * @return float
     */
    public function getAmount(): ?float
    {
        return $this->Amount;
    }

    /**
     * @param float $Amount
     */
    public function setAmount(?float $Amount): void
    {
        $this->Amount = $Amount;
    }

    /**
     * @return string
     */
    public function getCurrencyCode(): ?string
    {
        return $this->CurrencyCode;
    }

    /**
     * @param string $CurrencyCode
     */
    public function setCurrencyCode(?string $CurrencyCode): void
    {
        $this->CurrencyCode = $CurrencyCode;
    }

    /**
     * @return bool
     */
    public function isTestPayment(): ?bool
    {
        return $this->IsTestPayment;
    }

    /**
     * @param bool $IsTestPayment
     */
    public function setIsTestPayment(?bool $IsTestPayment): void
    {
        $this->IsTestPayment = $IsTestPayment;
    }

    /**
     * @return string
     */
    public function getLastUpdateTime(): ?string
    {
        return $this->LastUpdateTime;
    }

    /**
     * @param string $LastUpdateTime
     */
    public function setLastUpdateTime(?string $LastUpdateTime): void
    {
        $this->LastUpdateTime = $LastUpdateTime;
    }

    /**
     * @return float
     */
    public function getPaymentAmount(): ?float
    {
        return $this->PaymentAmount;
    }

    /**
     * @param float $PaymentAmount
     */
    public function setPaymentAmount(?float $PaymentAmount): void
    {
        $this->PaymentAmount = $PaymentAmount;
    }

    /**
     * @return string
     */
    public function getPaymentCurrencyCode(): ?string
    {
        return $this->PaymentCurrencyCode;
    }

    /**
     * @param string $PaymentCurrencyCode
     */
    public function setPaymentCurrencyCode(?string $PaymentCurrencyCode): void
    {
        $this->PaymentCurrencyCode = $PaymentCurrencyCode;
    }

    /**
     * @return int
     */
    public function getPaymentID(): ?int
    {
        return $this->PaymentID;
    }

    /**
     * @param int $PaymentID
     */
    public function setPaymentID(?int $PaymentID): void
    {
        $this->PaymentID = $PaymentID;
    }

    /**
     * @return string
     */
    public function getPaymentSystemID(): ?string
    {
        return $this->PaymentSystemID;
    }

    /**
     * @param string $PaymentSystemID
     */
    public function setPaymentSystemID(?string $PaymentSystemID): void
    {
        $this->PaymentSystemID = $PaymentSystemID;
    }

    /**
     * @return string
     */
    public function getPurpose(): ?string
    {
        return $this->Purpose;
    }

    /**
     * @param string $Purpose
     */
    public function setPurpose(?string $Purpose): void
    {
        $this->Purpose = $Purpose;
    }

    /**
     * @return int
     */
    public function getSiteID(): ?int
    {
        return $this->SiteID;
    }

    /**
     * @param int $SiteID
     */
    public function setSiteID(?int $SiteID): void
    {
        $this->SiteID = $SiteID;
    }

    /**
     * @return int
     */
    public function getSiteInvoiceID(): ?int
    {
        return $this->SiteInvoiceID;
    }

    /**
     * @param int $SiteInvoiceID
     */
    public function setSiteInvoiceID(?int $SiteInvoiceID): void
    {
        $this->SiteInvoiceID = $SiteInvoiceID;
    }

    /**
     * @return string
     */
    public function getUserIdentifier(): ?string
    {
        return $this->UserIdentifier;
    }

    /**
     * @param string $UserIdentifier
     */
    public function setUserIdentifier(?string $UserIdentifier): void
    {
        $this->UserIdentifier = $UserIdentifier;
    }

    /**
     * @return string
     */
    public function getUserPhoneNumber(): ?string
    {
        return $this->UserPhoneNumber;
    }

    /**
     * @param string $UserPhoneNumber
     */
    public function setUserPhoneNumber(?string $UserPhoneNumber): void
    {
        $this->UserPhoneNumber = $UserPhoneNumber;
    }
}
