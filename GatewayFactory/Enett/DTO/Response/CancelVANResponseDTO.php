<?php

namespace App\Service\GatewayFactory\Enett\DTO\Response;

use Phpro\SoapClient\Type\ResultInterface;
use Phpro\SoapClient\Type\ResultProviderInterface;

class CancelVANResponseDTO extends BaseResponseDTO implements ResultInterface, ResultProviderInterface
{
    /**
     * @var string
     */
    protected $SupportLogId;

    /**
     * @var int
     */
    protected $VNettTransactionID;

    /**
     * @var self
     */
    protected $CancelVANResult;

    /**
     * @return self
     */
    public function getResult(): ResultInterface
    {
        return $this->CancelVANResult ?: new DefaultEmptyResponse();
    }

    /**
     * @return string
     */
    public function getSupportLogId(): ?string
    {
        return $this->SupportLogId;
    }

    /**
     * @param string $SupportLogId
     */
    public function setSupportLogId(string $SupportLogId): void
    {
        $this->SupportLogId = $SupportLogId;
    }

    /**
     * @return int
     */
    public function getVNettTransactionID(): int
    {
        return $this->VNettTransactionID;
    }

    /**
     * @param int $VNettTransactionID
     */
    public function setVNettTransactionID(int $VNettTransactionID): void
    {
        $this->VNettTransactionID = $VNettTransactionID;
    }
}
