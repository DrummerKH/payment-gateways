<?php

namespace App\Service\GatewayFactory\Enett\DTO\Request;

use App\Annotation\Sign;
use App\Annotation\StoreInTransaction;
use App\Service\GatewayFactory\Enett\DTO\Type\UserReferenceCollection;
use Phpro\SoapClient\Type\RequestInterface;

class IssueVANRequestDTO implements RequestInterface
{
    /**
     * @StoreInTransaction(store=false)
     *
     * @var string
     */
    protected $IntegratorCode;

    /**
     * @StoreInTransaction(store=false)
     *
     * @var string
     */
    protected $IntegratorAccessKey;

    /**
     * @StoreInTransaction(store=false)
     *
     * @var int
     */
    protected $RequesterEcn;

    /**
     * @StoreInTransaction(store=false)
     *
     * @var string
     */
    protected $MessageDigest;

    /**
     * @Sign(order=2)
     *
     * @var string
     */
    protected $ActivationDate;

    /**
     * @Sign(order=3)
     *
     * @var string
     */
    protected $CardTypeName;

    /**
     * @var string
     */
    protected $CountryCode;

    /**
     * @Sign(order=4)
     *
     * @var string
     */
    protected $CurrencyCode;

    /**
     * @StoreInTransaction(store=false)
     *
     * @var string
     */
    protected $ExpiryDate;

    /**
     * @Sign(order=1)
     *
     * @var string
     */
    protected $IntegratorReference;

    /**
     * @var bool
     */
    protected $IsInstantAuthRequired;

    /**
     * @var bool
     */
    protected $IsMultiUse;

    /**
     * @Sign(order=5)
     * @StoreInTransaction(store=false)
     *
     * @var int
     */
    protected $IssuedToEcn;

    /**
     * @Sign(order=6)
     *
     * @var int
     */
    protected $MaximumAuthorisationAmount;

    /**
     * @Sign(order=8)
     *
     * @var string
     */
    protected $MerchantCategoryCode;

    /**
     * @Sign(order=9)
     *
     * @var string
     */
    protected $MerchantCategoryName;

    /**
     * @var bool
     */
    protected $Allow3ds;

    /**
     * @Sign(order=7)
     *
     * @var int
     */
    protected $MinimumAuthorisationAmount;

    /**
     * @var int
     */
    protected $MultiUseClosePercentage;

    /**
     * @Sign(order=10)
     *
     * @var string
     */
    protected $Notes;

    /**
     * @Sign(order=11)
     *
     * @var string
     */
    protected $Username;

    /**
     * @var string
     */
    protected $FundingCurrencyCode;

    /**
     * @var float
     */
    protected $FxRate;

    /**
     * @var string
     */
    protected $QuoteKey;

    /**
     * @var UserReferenceCollection
     */
    protected $UserReferences;

    /**
     * @var string
     */
    protected $RCNAlias;

    /**
     * @var int
     */
    protected $AccountId;

    /**
     * @var string
     */
    protected $Channel;

    /**
     * @return UserReferenceCollection
     */
    public function getUserReferences(): ?UserReferenceCollection
    {
        return $this->UserReferences;
    }

    /**
     * @param UserReferenceCollection $UserReferences
     *
     * @return $this
     */
    public function setUserReferences($UserReferences): ?self
    {
        $this->UserReferences = $UserReferences;

        return $this;
    }

    /**
     * @return string
     */
    public function getIntegratorCode(): ?string
    {
        return $this->IntegratorCode;
    }

    /**
     * @param string $IntegratorCode
     */
    public function setIntegratorCode(string $IntegratorCode): void
    {
        $this->IntegratorCode = $IntegratorCode;
    }

    /**
     * @return string
     */
    public function getIntegratorAccessKey(): ?string
    {
        return $this->IntegratorAccessKey;
    }

    /**
     * @param string $IntegratorAccessKey
     */
    public function setIntegratorAccessKey(string $IntegratorAccessKey): void
    {
        $this->IntegratorAccessKey = $IntegratorAccessKey;
    }

    /**
     * @return int
     */
    public function getRequesterEcn(): ?int
    {
        return $this->RequesterEcn;
    }

    /**
     * @param int $RequesterEcn
     */
    public function setRequesterEcn(int $RequesterEcn): void
    {
        $this->RequesterEcn = $RequesterEcn;
    }

    /**
     * @return string
     */
    public function getMessageDigest(): ?string
    {
        return $this->MessageDigest;
    }

    /**
     * @param string $MessageDigest
     */
    public function setMessageDigest(string $MessageDigest): void
    {
        $this->MessageDigest = $MessageDigest;
    }

    /**
     * @return string
     */
    public function getActivationDate(): ?string
    {
        return $this->ActivationDate;
    }

    /**
     * @param string $ActivationDate
     */
    public function setActivationDate(string $ActivationDate): void
    {
        $this->ActivationDate = $ActivationDate;
    }

    /**
     * @return string
     */
    public function getCardTypeName(): ?string
    {
        return $this->CardTypeName;
    }

    /**
     * @param string $CardTypeName
     */
    public function setCardTypeName(string $CardTypeName): void
    {
        $this->CardTypeName = $CardTypeName;
    }

    /**
     * @return string
     */
    public function getCountryCode(): ?string
    {
        return $this->CountryCode;
    }

    /**
     * @param string $CountryCode
     */
    public function setCountryCode(string $CountryCode): void
    {
        $this->CountryCode = $CountryCode;
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
    public function setCurrencyCode(string $CurrencyCode): void
    {
        $this->CurrencyCode = $CurrencyCode;
    }

    /**
     * @return string
     */
    public function getExpiryDate(): ?string
    {
        return $this->ExpiryDate;
    }

    /**
     * @param string $ExpiryDate
     */
    public function setExpiryDate(string $ExpiryDate): void
    {
        $this->ExpiryDate = $ExpiryDate;
    }

    /**
     * @return string
     */
    public function getIntegratorReference(): ?string
    {
        return $this->IntegratorReference;
    }

    /**
     * @param string $IntegratorReference
     */
    public function setIntegratorReference(string $IntegratorReference): void
    {
        $this->IntegratorReference = $IntegratorReference;
    }

    /**
     * @return bool
     */
    public function isInstantAuthRequired(): ?bool
    {
        return $this->IsInstantAuthRequired;
    }

    /**
     * @param bool $IsInstantAuthRequired
     */
    public function setIsInstantAuthRequired(bool $IsInstantAuthRequired): void
    {
        $this->IsInstantAuthRequired = $IsInstantAuthRequired;
    }

    /**
     * @return bool
     */
    public function isMultiUse(): ?bool
    {
        return $this->IsMultiUse;
    }

    /**
     * @param bool $IsMultiUse
     */
    public function setIsMultiUse(bool $IsMultiUse): void
    {
        $this->IsMultiUse = $IsMultiUse;
    }

    /**
     * @return int
     */
    public function getIssuedToEcn(): ?int
    {
        return $this->IssuedToEcn;
    }

    /**
     * @param int $IssuedToEcn
     */
    public function setIssuedToEcn(int $IssuedToEcn): void
    {
        $this->IssuedToEcn = $IssuedToEcn;
    }

    /**
     * @return int
     */
    public function getMaximumAuthorisationAmount(): ?int
    {
        return $this->MaximumAuthorisationAmount;
    }

    /**
     * @param int $MaximumAuthorisationAmount
     */
    public function setMaximumAuthorisationAmount(int $MaximumAuthorisationAmount): void
    {
        $this->MaximumAuthorisationAmount = $MaximumAuthorisationAmount;
    }

    /**
     * @return string
     */
    public function getMerchantCategoryCode(): ?string
    {
        return $this->MerchantCategoryCode;
    }

    /**
     * @param string $MerchantCategoryCode
     */
    public function setMerchantCategoryCode(string $MerchantCategoryCode): void
    {
        $this->MerchantCategoryCode = $MerchantCategoryCode;
    }

    /**
     * @return string
     */
    public function getMerchantCategoryName(): ?string
    {
        return $this->MerchantCategoryName;
    }

    /**
     * @param string $MerchantCategoryName
     */
    public function setMerchantCategoryName(string $MerchantCategoryName): void
    {
        $this->MerchantCategoryName = $MerchantCategoryName;
    }

    /**
     * @return bool
     */
    public function isAllow3ds(): ?bool
    {
        return $this->Allow3ds;
    }

    /**
     * @param bool $Allow3ds
     */
    public function setAllow3ds(bool $Allow3ds): void
    {
        $this->Allow3ds = $Allow3ds;
    }

    /**
     * @return int
     */
    public function getMinimumAuthorisationAmount(): ?int
    {
        return $this->MinimumAuthorisationAmount;
    }

    /**
     * @param int $MinimumAuthorisationAmount
     */
    public function setMinimumAuthorisationAmount(int $MinimumAuthorisationAmount): void
    {
        $this->MinimumAuthorisationAmount = $MinimumAuthorisationAmount;
    }

    /**
     * @return int
     */
    public function getMultiUseClosePercentage(): ?int
    {
        return $this->MultiUseClosePercentage;
    }

    /**
     * @param int $MultiUseClosePercentage
     */
    public function setMultiUseClosePercentage(int $MultiUseClosePercentage): void
    {
        $this->MultiUseClosePercentage = $MultiUseClosePercentage;
    }

    /**
     * @return string
     */
    public function getNotes(): ?string
    {
        return $this->Notes;
    }

    /**
     * @param string $Notes
     */
    public function setNotes(string $Notes): void
    {
        $this->Notes = $Notes;
    }

    /**
     * @return string
     */
    public function getUsername(): ?string
    {
        return $this->Username;
    }

    /**
     * @param string $Username
     */
    public function setUsername(string $Username): void
    {
        $this->Username = $Username;
    }

    /**
     * @return string
     */
    public function getFundingCurrencyCode(): ?string
    {
        return $this->FundingCurrencyCode;
    }

    /**
     * @param string $FundingCurrencyCode
     */
    public function setFundingCurrencyCode(string $FundingCurrencyCode): void
    {
        $this->FundingCurrencyCode = $FundingCurrencyCode;
    }

    /**
     * @return float
     */
    public function getFxRate(): ?float
    {
        return $this->FxRate;
    }

    /**
     * @param float $FxRate
     */
    public function setFxRate(float $FxRate): void
    {
        $this->FxRate = $FxRate;
    }

    /**
     * @return string
     */
    public function getQuoteKey(): ?string
    {
        return $this->QuoteKey;
    }

    /**
     * @param string $QuoteKey
     */
    public function setQuoteKey(string $QuoteKey): void
    {
        $this->QuoteKey = $QuoteKey;
    }

    /**
     * @return string
     */
    public function getRCNAlias(): ?string
    {
        return $this->RCNAlias;
    }

    /**
     * @param string $RCNAlias
     */
    public function setRCNAlias(string $RCNAlias): void
    {
        $this->RCNAlias = $RCNAlias;
    }

    /**
     * @return int
     */
    public function getAccountId(): ?int
    {
        return $this->AccountId;
    }

    /**
     * @param int $AccountId
     */
    public function setAccountId(int $AccountId): void
    {
        $this->AccountId = $AccountId;
    }

    /**
     * @return string
     */
    public function getChannel(): ?string
    {
        return $this->Channel;
    }

    /**
     * @param string $Channel
     */
    public function setChannel(string $Channel): void
    {
        $this->Channel = $Channel;
    }
}
