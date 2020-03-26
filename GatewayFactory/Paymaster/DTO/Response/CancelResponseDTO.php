<?php
/**
 *
 * Dmitry Hvorostyuk
 * Date: 17.09.2018.
 */

namespace App\Service\GatewayFactory\Paymaster\DTO\Response;


class CancelResponseDTO
{
    /**
     * @var int
     */
    private $PaymentID;

    /**
     * @var int
     */
    private $SiteInvoiceID;

    /**
     * @var int
     */
    private $iteID;

    /**
     * @var string
     */
    private $CurrencyCode;

    /**
     * @var int
     */
    private $Amount;

    /**
     * @var string
     */
    private $PaymentMethod;

    /**
     * @var int
     */
    private $PaymentSystemID;

    /**
     * @var string
     */
    private $PaymentCurrencyCode;

    /**
     * @var int
     */
    private $PaymentAmount;

    /**
     * @var string
     */
    private $State;

    /**
     * @var int
     */
    private $ErrorCode;

    /**
     * @var string
     */
    private $Purpose;

    /**
     * @var bool
     */
    private $IsTestPayment;

    /**
     * @var string
     */
    private $UserPhoneNumber;

    /**
     * @var string
     */
    private $UserIdentifier;

    /**
     * @var string
     */
    private $LastUpdate;

    /**
     * @return int
     */
    public function getPaymentID(): int
    {
        return $this->PaymentID;
    }

    /**
     * @param int $PaymentID
     */
    public function setPaymentID(int $PaymentID): void
    {
        $this->PaymentID = $PaymentID;
    }

    /**
     * @return int
     */
    public function getSiteInvoiceID(): int
    {
        return $this->SiteInvoiceID;
    }

    /**
     * @param int $SiteInvoiceID
     */
    public function setSiteInvoiceID(int $SiteInvoiceID): void
    {
        $this->SiteInvoiceID = $SiteInvoiceID;
    }

    /**
     * @return int
     */
    public function getIteID(): int
    {
        return $this->iteID;
    }

    /**
     * @param int $iteID
     */
    public function setIteID(int $iteID): void
    {
        $this->iteID = $iteID;
    }

    /**
     * @return string
     */
    public function getCurrencyCode(): string
    {
        return $this->CurrencyCode;
    }

    /**
     * @param string $CurrencyCode
     */
    public function setCurrencyCode(string $CurrencyCode): void
    {
        $this->CurrencyCode = $CurrencyCode;
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->Amount;
    }

    /**
     * @param int $Amount
     */
    public function setAmount(int $Amount): void
    {
        $this->Amount = $Amount;
    }

    /**
     * @return string
     */
    public function getPaymentMethod(): string
    {
        return $this->PaymentMethod;
    }

    /**
     * @param string $PaymentMethod
     */
    public function setPaymentMethod(string $PaymentMethod): void
    {
        $this->PaymentMethod = $PaymentMethod;
    }

    /**
     * @return int
     */
    public function getPaymentSystemID(): int
    {
        return $this->PaymentSystemID;
    }

    /**
     * @param int $PaymentSystemID
     */
    public function setPaymentSystemID(int $PaymentSystemID): void
    {
        $this->PaymentSystemID = $PaymentSystemID;
    }

    /**
     * @return string
     */
    public function getPaymentCurrencyCode(): string
    {
        return $this->PaymentCurrencyCode;
    }

    /**
     * @param string $PaymentCurrencyCode
     */
    public function setPaymentCurrencyCode(string $PaymentCurrencyCode): void
    {
        $this->PaymentCurrencyCode = $PaymentCurrencyCode;
    }

    /**
     * @return int
     */
    public function getPaymentAmount(): int
    {
        return $this->PaymentAmount;
    }

    /**
     * @param int $PaymentAmount
     */
    public function setPaymentAmount(int $PaymentAmount): void
    {
        $this->PaymentAmount = $PaymentAmount;
    }

    /**
     * @return string
     */
    public function getState(): string
    {
        return $this->State;
    }

    /**
     * @param string $State
     */
    public function setState(string $State): void
    {
        $this->State = $State;
    }

    /**
     * @return int
     */
    public function getErrorCode(): int
    {
        return $this->ErrorCode;
    }

    /**
     * @param int $ErrorCode
     */
    public function setErrorCode(int $ErrorCode): void
    {
        $this->ErrorCode = $ErrorCode;
    }

    /**
     * @return string
     */
    public function getPurpose(): string
    {
        return $this->Purpose;
    }

    /**
     * @param string $Purpose
     */
    public function setPurpose(string $Purpose): void
    {
        $this->Purpose = $Purpose;
    }

    /**
     * @return bool
     */
    public function isTestPayment(): bool
    {
        return $this->IsTestPayment;
    }

    /**
     * @param bool $IsTestPayment
     */
    public function setIsTestPayment(bool $IsTestPayment): void
    {
        $this->IsTestPayment = $IsTestPayment;
    }

    /**
     * @return string
     */
    public function getUserPhoneNumber(): string
    {
        return $this->UserPhoneNumber;
    }

    /**
     * @param string $UserPhoneNumber
     */
    public function setUserPhoneNumber(string $UserPhoneNumber): void
    {
        $this->UserPhoneNumber = $UserPhoneNumber;
    }

    /**
     * @return string
     */
    public function getUserIdentifier(): string
    {
        return $this->UserIdentifier;
    }

    /**
     * @param string $UserIdentifier
     */
    public function setUserIdentifier(string $UserIdentifier): void
    {
        $this->UserIdentifier = $UserIdentifier;
    }

    /**
     * @return string
     */
    public function getLastUpdate(): string
    {
        return $this->LastUpdate;
    }

    /**
     * @param string $LastUpdate
     */
    public function setLastUpdate(string $LastUpdate): void
    {
        $this->LastUpdate = $LastUpdate;
    }
}
