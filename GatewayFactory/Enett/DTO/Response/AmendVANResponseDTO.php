<?php

namespace App\Service\GatewayFactory\Enett\DTO\Response;

use Phpro\SoapClient\Type\ResultInterface;
use Phpro\SoapClient\Type\ResultProviderInterface;

class AmendVANResponseDTO extends BaseResponseDTO implements ResultInterface, ResultProviderInterface
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
    private $ExpiryDate;

    /**
     * @var string
     */
    private $FullExpiryDate;

    /**
     * @var int
     */
    private $VNettTransactionID;

    /**
     * @var string
     */
    private $CardSecurityCode;

    /**
     * @var float
     */
    private $FxRate;

    /**
     * @var self
     */
    private $AmendVANResult;

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
    public function getExpiryDate(): ?string
    {
        return $this->ExpiryDate;
    }

    /**
     * @return string
     */
    public function getFullExpiryDate(): ?string
    {
        return $this->FullExpiryDate;
    }

    /**
     * @return int
     */
    public function getVNettTransactionID(): ?int
    {
        return $this->VNettTransactionID;
    }

    /**
     * @return string
     */
    public function getCardSecurityCode(): ?string
    {
        return $this->CardSecurityCode;
    }

    /**
     * @return float
     */
    public function getFxRate(): ?float
    {
        return $this->FxRate;
    }

    /**
     * @return self
     */
    public function getResult(): ResultInterface
    {
        return $this->AmendVANResult;
    }
}
