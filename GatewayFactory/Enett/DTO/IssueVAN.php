<?php

namespace App\Service\GatewayFactory\Enett\DTO;

use App\Service\GatewayFactory\Enett\DTO\Request\IssueVANRequestDTO;
use Phpro\SoapClient\Type\RequestInterface;

class IssueVAN implements RequestInterface
{
    /**
     * @var IssueVANRequestDTO
     */
    private $issueVANRequest;

    /**
     * @return IssueVANRequestDTO
     */
    public function getIssueVANRequest(): ?IssueVANRequestDTO
    {
        return $this->issueVANRequest;
    }

    /**
     * @param IssueVANRequestDTO $issueVANRequest
     *
     * @return IssueVAN
     */
    public function setIssueVANRequest(IssueVANRequestDTO $issueVANRequest): self
    {
        $this->issueVANRequest = $issueVANRequest;

        return $this;
    }
}
