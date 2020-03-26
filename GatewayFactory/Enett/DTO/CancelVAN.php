<?php

namespace App\Service\GatewayFactory\Enett\DTO;

use App\Service\GatewayFactory\Enett\DTO\Request\CancelVANRequestDTO;
use Phpro\SoapClient\Type\RequestInterface;

class CancelVAN implements RequestInterface
{
    /**
     * @var CancelVANRequestDTO
     */
    private $cancelVANRequest;

    /**
     * @return CancelVANRequestDTO
     */
    public function getCancelVANRequest(): ?CancelVANRequestDTO
    {
        return $this->cancelVANRequest;
    }

    /**
     * @param CancelVANRequestDTO $cancelVANRequest
     *
     * @return CancelVAN
     */
    public function setCancelVANRequest(CancelVANRequestDTO $cancelVANRequest): self
    {
        $this->cancelVANRequest = $cancelVANRequest;

        return $this;
    }
}
