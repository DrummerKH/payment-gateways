<?php

namespace App\Service\GatewayFactory\Enett\DTO;

use App\Service\GatewayFactory\Enett\DTO\Request\CloseVANRequestDTO;
use Phpro\SoapClient\Type\RequestInterface;

class CloseVAN implements RequestInterface
{
    /**
     * @var CloseVANRequestDTO
     */
    private $closeVANRequest;

    /**
     * @return CloseVANRequestDTO
     */
    public function getCloseVANRequest(): ?CloseVANRequestDTO
    {
        return $this->closeVANRequest;
    }

    /**
     * @param CloseVANRequestDTO $closeVANRequest
     *
     * @return CloseVAN
     */
    public function setCloseVANRequest(CloseVANRequestDTO $closeVANRequest): self
    {
        $this->closeVANRequest = $closeVANRequest;

        return $this;
    }
}
