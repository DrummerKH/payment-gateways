<?php
/**
 * Created by PhpStorm.
 * User: Drummer1
 * Date: 16.05.18
 * Time: 12:02.
 */

namespace App\Service\GatewayFactory\Paymaster\DTO\Response;


class DepositResponseDTO
{
    protected $PaymentID;
    protected $SiteInvoiceID;
    protected $SiteID;
    protected $CurrencyCode;
    protected $Amount;
    protected $PaymentMethod;
    protected $PaymentSystemID;
    protected $PaymentCurrencyCode;
    protected $PaymentAmount;
    protected $State;
    protected $ErrorCode;
    protected $Purpose;
    protected $IsTestPayment;
    protected $UserPhoneNumber;
    protected $UserIdentifier;
    protected $LastUpdate;
    protected $LastUpdateTime;

    /**
     * @return mixed
     */
    public function getPaymentID()
    {
        return $this->PaymentID;
    }

    /**
     * @param mixed $PaymentID
     */
    public function setPaymentID($PaymentID): void
    {
        $this->PaymentID = $PaymentID;
    }

    /**
     * @return mixed
     */
    public function getSiteInvoiceID()
    {
        return $this->SiteInvoiceID;
    }

    /**
     * @param mixed $SiteInvoiceID
     */
    public function setSiteInvoiceID($SiteInvoiceID): void
    {
        $this->SiteInvoiceID = $SiteInvoiceID;
    }

    /**
     * @return mixed
     */
    public function getSiteID()
    {
        return $this->SiteID;
    }

    /**
     * @param mixed $SiteID
     */
    public function setSiteID($SiteID): void
    {
        $this->SiteID = $SiteID;
    }

    /**
     * @return mixed
     */
    public function getCurrencyCode()
    {
        return $this->CurrencyCode;
    }

    /**
     * @param mixed $CurrencyCode
     */
    public function setCurrencyCode($CurrencyCode): void
    {
        $this->CurrencyCode = $CurrencyCode;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->Amount;
    }

    /**
     * @param mixed $Amount
     */
    public function setAmount($Amount): void
    {
        $this->Amount = $Amount;
    }

    /**
     * @return mixed
     */
    public function getPaymentMethod()
    {
        return $this->PaymentMethod;
    }

    /**
     * @param mixed $PaymentMethod
     */
    public function setPaymentMethod($PaymentMethod): void
    {
        $this->PaymentMethod = $PaymentMethod;
    }

    /**
     * @return mixed
     */
    public function getPaymentSystemID()
    {
        return $this->PaymentSystemID;
    }

    /**
     * @param mixed $PaymentSystemID
     */
    public function setPaymentSystemID($PaymentSystemID): void
    {
        $this->PaymentSystemID = $PaymentSystemID;
    }

    /**
     * @return mixed
     */
    public function getPaymentCurrencyCode()
    {
        return $this->PaymentCurrencyCode;
    }

    /**
     * @param mixed $PaymentCurrencyCode
     */
    public function setPaymentCurrencyCode($PaymentCurrencyCode): void
    {
        $this->PaymentCurrencyCode = $PaymentCurrencyCode;
    }

    /**
     * @return mixed
     */
    public function getPaymentAmount()
    {
        return $this->PaymentAmount;
    }

    /**
     * @param mixed $PaymentAmount
     */
    public function setPaymentAmount($PaymentAmount): void
    {
        $this->PaymentAmount = $PaymentAmount;
    }

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
     * @return mixed
     */
    public function getErrorCode()
    {
        return $this->ErrorCode;
    }

    /**
     * @param mixed $ErrorCode
     */
    public function setErrorCode($ErrorCode): void
    {
        $this->ErrorCode = $ErrorCode;
    }

    /**
     * @return mixed
     */
    public function getPurpose()
    {
        return $this->Purpose;
    }

    /**
     * @param mixed $Purpose
     */
    public function setPurpose($Purpose): void
    {
        $this->Purpose = $Purpose;
    }

    /**
     * @return mixed
     */
    public function getIsTestPayment()
    {
        return $this->IsTestPayment;
    }

    /**
     * @param mixed $IsTestPayment
     */
    public function setIsTestPayment($IsTestPayment): void
    {
        $this->IsTestPayment = $IsTestPayment;
    }

    /**
     * @return mixed
     */
    public function getUserPhoneNumber()
    {
        return $this->UserPhoneNumber;
    }

    /**
     * @param mixed $UserPhoneNumber
     */
    public function setUserPhoneNumber($UserPhoneNumber): void
    {
        $this->UserPhoneNumber = $UserPhoneNumber;
    }

    /**
     * @return mixed
     */
    public function getUserIdentifier()
    {
        return $this->UserIdentifier;
    }

    /**
     * @param mixed $UserIdentifier
     */
    public function setUserIdentifier($UserIdentifier): void
    {
        $this->UserIdentifier = $UserIdentifier;
    }

    /**
     * @return mixed
     */
    public function getLastUpdate()
    {
        return $this->LastUpdate;
    }

    /**
     * @param mixed $LastUpdate
     */
    public function setLastUpdate($LastUpdate): void
    {
        $this->LastUpdate = $LastUpdate;
    }

    /**
     * @return mixed
     */
    public function getLastUpdateTime()
    {
        return $this->LastUpdateTime;
    }

    /**
     * @param mixed $LastUpdateTime
     */
    public function setLastUpdateTime($LastUpdateTime): void
    {
        $this->LastUpdateTime = $LastUpdateTime;
    }
}
