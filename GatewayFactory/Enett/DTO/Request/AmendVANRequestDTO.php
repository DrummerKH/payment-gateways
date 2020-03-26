<?php

namespace App\Service\GatewayFactory\Enett\DTO\Request;


use App\Service\GatewayFactory\Enett\DTO\Type\UserReferenceCollection;
use Phpro\SoapClient\Type\RequestInterface;

class AmendVANRequestDTO implements RequestInterface
{
    /**
     * @var string
     */
    private $IntegratorCode;

    /**
     * @var string
     */
    private $IntegratorAccessKey;

    /**
     * @var int
     */
    private $RequesterEcn;

    /**
     * @var string
     */
    private $MessageDigest;

    /**
     * @var string
     */
    private $ActivationDate;

    /**
     * @var string
     */
    private $ExpiryDate;

    /**
     * @var string
     */
    private $IntegratorReference;

    /**
     * @var bool
     */
    private $IsInstantAuthRequired;

    /**
     * @var bool
     */
    private $IsMultiUse;

    /**
     * @var int
     */
    private $IssuedToEcn;

    /**
     * @var int
     */
    private $MaximumAuthorisationAmount;

    /**
     * @var string
     */
    private $MerchantCategoryCode;

    /**
     * @var string
     */
    private $MerchantCategoryName;

    /**
     * @var bool
     */
    private $Allow3ds;

    /**
     * @var int
     */
    private $MinimumAuthorisationAmount;

    /**
     * @var int
     */
    private $MultiUseClosePercentage;

    /**
     * @var string
     */
    private $Notes;

    /**
     * @var string
     */
    private $Username;

    /**
     * @var string
     */
    private $FundingCurrencyCode;

    /**
     * @var UserReferenceCollection
     */
    private $UserReferences;

    /**
     * @return string
     */
    public function getIntegratorCode(): ?string
    {
        return $this->IntegratorCode;
    }

    /**
     * @param string $IntegratorCode
     *
     * @return $this
     */
    public function setIntegratorCode(string $IntegratorCode): ?self
    {
        $this->IntegratorCode = $IntegratorCode;

        return $this;
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
     *
     * @return $this
     */
    public function setIntegratorAccessKey(string $IntegratorAccessKey): ?self
    {
        $this->IntegratorAccessKey = $IntegratorAccessKey;

        return $this;
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
     *
     * @return $this
     */
    public function setRequesterEcn(int $RequesterEcn): ?self
    {
        $this->RequesterEcn = $RequesterEcn;

        return $this;
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
     *
     * @return $this
     */
    public function setMessageDigest(string $MessageDigest): ?self
    {
        $this->MessageDigest = $MessageDigest;

        return $this;
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
     *
     * @return $this
     */
    public function setActivationDate(string $ActivationDate): ?self
    {
        $this->ActivationDate = $ActivationDate;

        return $this;
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
     *
     * @return $this
     */
    public function setExpiryDate(string $ExpiryDate): ?self
    {
        $this->ExpiryDate = $ExpiryDate;

        return $this;
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
     *
     * @return $this
     */
    public function setIntegratorReference(string $IntegratorReference): ?self
    {
        $this->IntegratorReference = $IntegratorReference;

        return $this;
    }

    /**
     * @return bool
     */
    public function isIsInstantAuthRequired(): ?bool
    {
        return $this->IsInstantAuthRequired;
    }

    /**
     * @param bool $IsInstantAuthRequired
     *
     * @return $this
     */
    public function setIsInstantAuthRequired(bool $IsInstantAuthRequired): ?self
    {
        $this->IsInstantAuthRequired = $IsInstantAuthRequired;

        return $this;
    }

    /**
     * @return bool
     */
    public function isIsMultiUse(): ?bool
    {
        return $this->IsMultiUse;
    }

    /**
     * @param bool $IsMultiUse
     *
     * @return $this
     */
    public function setIsMultiUse(bool $IsMultiUse): ?self
    {
        $this->IsMultiUse = $IsMultiUse;

        return $this;
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
     *
     * @return $this
     */
    public function setIssuedToEcn(int $IssuedToEcn): ?self
    {
        $this->IssuedToEcn = $IssuedToEcn;

        return $this;
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
     *
     * @return $this
     */
    public function setMaximumAuthorisationAmount(int $MaximumAuthorisationAmount): ?self
    {
        $this->MaximumAuthorisationAmount = $MaximumAuthorisationAmount;

        return $this;
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
     *
     * @return $this
     */
    public function setMerchantCategoryCode(string $MerchantCategoryCode): ?self
    {
        $this->MerchantCategoryCode = $MerchantCategoryCode;

        return $this;
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
     *
     * @return $this
     */
    public function setMerchantCategoryName(string $MerchantCategoryName): ?self
    {
        $this->MerchantCategoryName = $MerchantCategoryName;

        return $this;
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
     *
     * @return $this
     */
    public function setAllow3ds(bool $Allow3ds): ?self
    {
        $this->Allow3ds = $Allow3ds;

        return $this;
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
     *
     * @return $this
     */
    public function setMinimumAuthorisationAmount(int $MinimumAuthorisationAmount): ?self
    {
        $this->MinimumAuthorisationAmount = $MinimumAuthorisationAmount;

        return $this;
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
     *
     * @return $this
     */
    public function setMultiUseClosePercentage(int $MultiUseClosePercentage): ?self
    {
        $this->MultiUseClosePercentage = $MultiUseClosePercentage;

        return $this;
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
     *
     * @return $this
     */
    public function setNotes(string $Notes): ?self
    {
        $this->Notes = $Notes;

        return $this;
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
     *
     * @return $this
     */
    public function setUsername(string $Username): ?self
    {
        $this->Username = $Username;

        return $this;
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
     *
     * @return $this
     */
    public function setFundingCurrencyCode(string $FundingCurrencyCode): ?self
    {
        $this->FundingCurrencyCode = $FundingCurrencyCode;

        return $this;
    }

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
}
