<?php

namespace App\Service\GatewayFactory\Enett\DTO\Response;

use App\Annotation\StoreInTransaction;
use Payum\Core\Security\SensitiveValue;
use Phpro\SoapClient\Type\ResultInterface;
use Phpro\SoapClient\Type\ResultProviderInterface;

class IssueVANResponseDTO extends BaseResponseDTO implements ResultInterface, ResultProviderInterface
{
    /**
     * @var string
     */
    protected $SupportLogId;

    /**
     * @var string
     */
    protected $ActivationDate;

    /**
     * @var string
     */
    protected $GenerationDate;

    /**
     * @var int
     */
    protected $VNettTransactionID;

    /**
     * @var int
     */
    protected $MinimumAuthorisationAmount;

    /**
     * @var int
     */
    protected $MaximumAuthorisationAmount;

    /**
     * @var int
     */
    protected $FundedAmount;

    /**
     * @var string
     */
    protected $CurrencyCode;

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
    protected $RCNAlias;

    /**
     * @var string
     */
    protected $RCNDescription;

    /**
     * @var float
     */
    protected $SafetyMargin;

    /**
     * @var int
     */
    protected $AccountId;

    /**
     * @var self
     */
    protected $IssueVANResult;

    /**
     * @StoreInTransaction(store=false)
     *
     * @var string
     */
    protected $CardHolderName;

    /**
     * @StoreInTransaction(store=false)
     *
     * @var string
     */
    protected $CardSecurityCode;

    /**
     * @StoreInTransaction(store=false)
     *
     * @var string
     */
    protected $ExpiryDate;

    /**
     * @StoreInTransaction(store=false)
     *
     * @var string
     */
    protected $FullExpiryDate;

    /**
     * @StoreInTransaction(store=false)
     *
     * @var string
     */
    protected $VirtualAccountNumber;

    /**
     * @return self
     */
    public function getResult(): ResultInterface
    {
        return $this->IssueVANResult ?: new DefaultEmptyResponse();
    }

    /**
     * @return SensitiveValue
     */
    public function getCardHolderName(): ?string
    {
        return SensitiveValue::ensureSensitive($this->CardHolderName)->peek();
    }

    /**
     * @return SensitiveValue
     */
    public function getCardSecurityCode(): ?string
    {
        return SensitiveValue::ensureSensitive($this->CardSecurityCode)->peek();
    }

    /**
     * @return SensitiveValue
     */
    public function getExpiryDate(): ?string
    {
        return SensitiveValue::ensureSensitive($this->ExpiryDate)->peek();
    }

    /**
     * @return SensitiveValue
     */
    public function getFullExpiryDate(): ?string
    {
        return SensitiveValue::ensureSensitive($this->FullExpiryDate)->peek();
    }

    /**
     * @return SensitiveValue
     */
    public function getVirtualAccountNumber(): ?string
    {
        return SensitiveValue::ensureSensitive($this->VirtualAccountNumber)->peek();
    }

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
    public function getGenerationDate(): ?string
    {
        return $this->GenerationDate;
    }

    /**
     * @return int
     */
    public function getVNettTransactionID(): ?int
    {
        return $this->VNettTransactionID;
    }

    /**
     * @return int
     */
    public function getMinimumAuthorisationAmount(): ?int
    {
        return $this->MinimumAuthorisationAmount;
    }

    /**
     * @return int
     */
    public function getMaximumAuthorisationAmount(): ?int
    {
        return $this->MaximumAuthorisationAmount;
    }

    /**
     * @return int
     */
    public function getFundedAmount(): ?int
    {
        return $this->FundedAmount;
    }

    /**
     * @return string
     */
    public function getCurrencyCode(): ?string
    {
        return $this->CurrencyCode;
    }

    /**
     * @return string
     */
    public function getFundingCurrencyCode(): ?string
    {
        return $this->FundingCurrencyCode;
    }

    /**
     * @return float
     */
    public function getFxRate(): ?float
    {
        return $this->FxRate;
    }

    /**
     * @return string
     */
    public function getRCNAlias(): ?string
    {
        return $this->RCNAlias;
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
    public function getSafetyMargin(): ?float
    {
        return $this->SafetyMargin;
    }

    /**
     * @return int
     */
    public function getAccountId(): ?int
    {
        return $this->AccountId;
    }
}
