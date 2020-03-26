<?php

namespace App\Service\GatewayFactory\Enett\DTO;

use App\Service\GatewayFactory\Enett\DTO\Request\GetFxQuoteRequestDTO;
use Phpro\SoapClient\Type\RequestInterface;

class GetFxQuote implements RequestInterface
{
    /**
     * @var GetFxQuoteRequestDTO
     */
    private $getVNettFxQuoteRequest;

    /**
     * @return GetFxQuoteRequestDTO
     */
    public function getGetVNettFxQuoteRequest(): ?GetFxQuoteRequestDTO
    {
        return $this->getVNettFxQuoteRequest;
    }

    /**
     * @param GetFxQuoteRequestDTO $getVNettFxQuoteRequest
     *
     * @return GetFxQuote
     */
    public function setGetVNettFxQuoteRequest(GetFxQuoteRequestDTO $getVNettFxQuoteRequest): self
    {
        $this->getVNettFxQuoteRequest = $getVNettFxQuoteRequest;

        return $this;
    }
}
