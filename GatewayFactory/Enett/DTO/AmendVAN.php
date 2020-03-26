<?php

namespace App\Service\GatewayFactory\Enett\DTO;

use App\Service\GatewayFactory\Enett\DTO\Request\AmendVANRequestDTO;
use Phpro\SoapClient\Type\RequestInterface;

class AmendVAN implements RequestInterface
{
    /**
     * @var AmendVANRequestDTO
     */
    private $amendVANRequest;

    /**
     * @return AmendVANRequestDTO
     */
    public function getAmendVANRequest(): ?AmendVANRequestDTO
    {
        return $this->amendVANRequest;
    }

    /**
     * @param AmendVANRequestDTO $amendVANRequest
     *
     * @return AmendVAN
     */
    public function setAmendVANRequest(AmendVANRequestDTO $amendVANRequest): self
    {
        $this->amendVANRequest = $amendVANRequest;

        return $this;
    }
}
