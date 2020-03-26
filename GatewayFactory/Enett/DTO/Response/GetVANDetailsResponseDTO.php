<?php

namespace App\Service\GatewayFactory\Enett\DTO\Response;

use App\Service\GatewayFactory\Enett\DTO\Type\FxHistoryCollection;
use App\Service\GatewayFactory\Enett\DTO\Type\UserReferenceCollection;
use App\Service\GatewayFactory\Enett\DTO\Type\VanHistoryCollection;
use Phpro\SoapClient\Type\ResultInterface;
use Phpro\SoapClient\Type\ResultProviderInterface;

class GetVANDetailsResponseDTO extends BaseResponseDTO implements ResultInterface, ResultProviderInterface
{
    /**
     * @var string
     */
    private $SupportLogId;

    /**
     * @var string
     */
    private $ActivationDate;

    /**
     * @var string
     */
    private $CardHolderName;

    /**
     * @var string
     */
    private $CardSecurityCode;

    /**
     * @var string
     */
    private $CardType;

    /**
     * @var string
     */
    private $Country;

    /**
     * @var string
     */
    private $Currency;

    /**
     * @var string
     */
    private $FullExpiryDate;

    /**
     * @var string
     */
    private $IntegratorReference;

    /**
     * @var bool
     */
    private $IsMultiUse;

    /**
     * @var int
     */
    private $IssuedToECN;

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
     * @var int
     */
    private $MinimumAuthorisationAmount;

    /**
     * @var string
     */
    private $Notes;

    /**
     * @var int
     */
    private $RequesterECN;

    /**
     * @var int
     */
    private $TotalAuthorisedAmount;

    /**
     * @var int
     */
    private $TotalRefundedAmount;

    /**
     * @var int
     */
    private $TotalSettledAmount;

    /**
     * @var int
     */
    private $VNettTransactionID;

    /**
     * @var VanHistoryCollection
     */
    private $VanHistoryCollection;

    /**
     * @var string
     */
    private $VirtualAccountNumber;

    /**
     * @var float
     */
    private $MultiClosePercentage;

    /**
     * @var bool
     */
    private $IsFunded;

    /**
     * @var string
     */
    private $FundedCurrencyCode;

    /**
     * @var float
     */
    private $FxRate;

    /**
     * @var int
     */
    private $FundedAmount;

    /**
     * @var FxHistoryCollection
     */
    private $FxHistoryCollection;

    /**
     * @var float
     */
    private $AvailableBalance;

    /**
     * @var UserReferenceCollection
     */
    private $UserReferences;

    /**
     * @var float
     */
    private $NetSettledAmount;

    /**
     * @var float
     */
    private $OutstandingAuthorisations;

    /**
     * @var string
     */
    private $RcnAlias;

    /**
     * @var string
     */
    private $RCNDescription;

    /**
     * @var float
     */
    private $FxFee;

    /**
     * @var string
     */
    private $CardExpiryDate;

    /**
     * @var float
     */
    private $SafetyMargin;

    /**
     * @var string
     */
    private $Channel;

    /**
     * @var self
     */
    private $GetVANDetailsResult;

    /**
     * @return string
     */
    public function getSupportLogId(): ?string
    {
        return $this->SupportLogId;
    }

    /**
     * @return string
     */
    public function getActivationDate(): ?string
    {
        return $this->ActivationDate;
    }

    /**
     * @return string
     */
    public function getCardHolderName(): ?string
    {
        return $this->CardHolderName;
    }

    /**
     * @return string
     */
    public function getCardSecurityCode(): ?string
    {
        return $this->CardSecurityCode;
    }

    /**
     * @return string
     */
    public function getCardType(): ?string
    {
        return $this->CardType;
    }

    /**
     * @return string
     */
    public function getCountry(): ?string
    {
        return $this->Country;
    }

    /**
     * @return string
     */
    public function getCurrency(): ?string
    {
        return $this->Currency;
    }

    /**
     * @return string
     */
    public function getFullExpiryDate(): ?string
    {
        return $this->FullExpiryDate;
    }

    /**
     * @return string
     */
    public function getIntegratorReference(): ?string
    {
        return $this->IntegratorReference;
    }

    /**
     * @return bool
     */
    public function isIsMultiUse(): ?bool
    {
        return $this->IsMultiUse;
    }

    /**
     * @return int
     */
    public function getIssuedToECN(): ?int
    {
        return $this->IssuedToECN;
    }

    /**
     * @return int
     */
    public function getMaximumAuthorisationAmount(): ?int
    {
        return $this->MaximumAuthorisationAmount;
    }

    /**
     * @return string
     */
    public function getMerchantCategoryCode(): ?string
    {
        return $this->MerchantCategoryCode;
    }

    /**
     * @return string
     */
    public function getMerchantCategoryName(): ?string
    {
        return $this->MerchantCategoryName;
    }

    /**
     * @return int
     */
    public function getMinimumAuthorisationAmount(): ?int
    {
        return $this->MinimumAuthorisationAmount;
    }

    /**
     * @return string
     */
    public function getNotes(): ?string
    {
        return $this->Notes;
    }

    /**
     * @return int
     */
    public function getRequesterECN(): ?int
    {
        return $this->RequesterECN;
    }

    /**
     * @return int
     */
    public function getTotalAuthorisedAmount(): ?int
    {
        return $this->TotalAuthorisedAmount;
    }

    /**
     * @return int
     */
    public function getTotalRefundedAmount(): ?int
    {
        return $this->TotalRefundedAmount;
    }

    /**
     * @return int
     */
    public function getTotalSettledAmount(): ?int
    {
        return $this->TotalSettledAmount;
    }

    /**
     * @return int
     */
    public function getVNettTransactionID(): ?int
    {
        return $this->VNettTransactionID;
    }

    /**
     * @return VanHistoryCollection
     */
    public function getVanHistoryCollection(): ?VanHistoryCollection
    {
        return $this->VanHistoryCollection;
    }

    /**
     * @return string
     */
    public function getVirtualAccountNumber(): ?string
    {
        return $this->VirtualAccountNumber;
    }

    /**
     * @return float
     */
    public function getMultiClosePercentage(): ?float
    {
        return $this->MultiClosePercentage;
    }

    /**
     * @return bool
     */
    public function isIsFunded(): ?bool
    {
        return $this->IsFunded;
    }

    /**
     * @return string
     */
    public function getFundedCurrencyCode(): ?string
    {
        return $this->FundedCurrencyCode;
    }

    /**
     * @return float
     */
    public function getFxRate(): ?float
    {
        return $this->FxRate;
    }

    /**
     * @return int
     */
    public function getFundedAmount(): ?int
    {
        return $this->FundedAmount;
    }

    /**
     * @return FxHistoryCollection
     */
    public function getFxHistoryCollection(): ?FxHistoryCollection
    {
        return $this->FxHistoryCollection;
    }

    /**
     * @return float
     */
    public function getAvailableBalance(): ?float
    {
        return $this->AvailableBalance;
    }

    /**
     * @return UserReferenceCollection
     */
    public function getUserReferences(): ?UserReferenceCollection
    {
        return $this->UserReferences;
    }

    /**
     * @return float
     */
    public function getNetSettledAmount(): ?float
    {
        return $this->NetSettledAmount;
    }

    /**
     * @return float
     */
    public function getOutstandingAuthorisations(): ?float
    {
        return $this->OutstandingAuthorisations;
    }

    /**
     * @return string
     */
    public function getRcnAlias(): ?string
    {
        return $this->RcnAlias;
    }

    /**
     * @return string
     */
    public function getRCNDescription(): ?string
    {
        return $this->RCNDescription;
    }

    /**
     * @return float
     */
    public function getFxFee(): ?float
    {
        return $this->FxFee;
    }

    /**
     * @return string
     */
    public function getCardExpiryDate(): ?string
    {
        return $this->CardExpiryDate;
    }

    /**
     * @return float
     */
    public function getSafetyMargin(): ?float
    {
        return $this->SafetyMargin;
    }

    /**
     * @return string
     */
    public function getChannel(): ?string
    {
        return $this->Channel;
    }

    /**
     * @return self
     */
    public function getResult(): ResultInterface
    {
        return $this->GetVANDetailsResult;
    }
}
