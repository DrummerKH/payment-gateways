<?php

namespace App\Service\GatewayFactory\Enett\DTO\Response;

use Phpro\SoapClient\Type\ResultInterface;
use Phpro\SoapClient\Type\ResultProviderInterface;

class CloseVANResponseDTO extends BaseResponseDTO implements ResultInterface, ResultProviderInterface
{
    /**
     * @var string
     */
    private $SupportLogId;

    /**
     * @var int
     */
    private $VNettTransactionID;

    /**
     * @var self
     */
    private $CloseVANResult;

    /**
     * @return bool
     */
    public function isIsSuccessful(): ?bool
    {
        return $this->IsSuccessful;
    }

    /**
     * @return string
     */
    public function getSupportLogId(): ?string
    {
        return $this->SupportLogId;
    }

    /**
     * @return int
     */
    public function getVNettTransactionID(): ?int
    {
        return $this->VNettTransactionID;
    }

    /**
     * @return self
     */
    public function getResult(): ResultInterface
    {
        return $this->CloseVANResult;
    }
}
