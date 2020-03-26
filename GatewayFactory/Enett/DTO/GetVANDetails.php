<?php

namespace App\Service\GatewayFactory\Enett\DTO;

use App\Service\GatewayFactory\Enett\DTO\Request\GetVANDetailsRequestDTO;
use Phpro\SoapClient\Type\RequestInterface;

class GetVANDetails implements RequestInterface
{
    /**
     * @var GetVANDetailsRequestDTO
     */
    private $getVANRequest;

    /**
     * @return GetVANDetailsRequestDTO
     */
    public function getGetVANRequest(): ?GetVANDetailsRequestDTO
    {
        return $this->getVANRequest;
    }

    /**
     * @param GetVANDetailsRequestDTO $getVANRequest
     *
     * @return GetVANDetails
     */
    public function setGetVANRequest(GetVANDetailsRequestDTO $getVANRequest): self
    {
        $this->getVANRequest = $getVANRequest;

        return $this;
    }
}
