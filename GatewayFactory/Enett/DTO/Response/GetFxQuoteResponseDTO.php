<?php

namespace App\Service\GatewayFactory\Enett\DTO\Response;

use Phpro\SoapClient\Type\ResultInterface;
use Phpro\SoapClient\Type\ResultProviderInterface;

class GetFxQuoteResponseDTO extends BaseResponseDTO implements ResultInterface, ResultProviderInterface
{
    /**
     * @var string
     */
    private $SupportLogId;

    /**
     * @var float
     */
    private $Rate;

    /**
     * @var string
     */
    private $QuoteKey;

    /**
     * @var self
     */
    private $GetFxQuoteResult;

    /**
     * @return string
     */
    public function getSupportLogId(): ?string
    {
        return $this->SupportLogId;
    }

    /**
     * @return float
     */
    public function getRate(): ?float
    {
        return $this->Rate;
    }

    /**
     * @return string
     */
    public function getQuoteKey(): ?string
    {
        return $this->QuoteKey;
    }

    /**
     * @return self
     */
    public function getResult(): ResultInterface
    {
        return $this->GetFxQuoteResult;
    }
}
