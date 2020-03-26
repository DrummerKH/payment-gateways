<?php

namespace App\Service\GatewayFactory\Enett\DTO\Request;

use Phpro\SoapClient\Type\RequestInterface;

class CloseVANRequestDTO implements RequestInterface
{
    /**
     * @var string
     */
    private $IntegratorCode;

    /**
     * @var string
     */
    private $IntegratorAccessKey;

    /**
     * @var int
     */
    private $RequesterEcn;

    /**
     * @var string
     */
    private $MessageDigest;

    /**
     * @var string
     */
    private $IntegratorReference;

    /**
     * @var int
     */
    private $IssuedToEcn;

    /**
     * @var string
     */
    private $Username;

    /**
     * @return string
     */
    public function getIntegratorCode(): ?string
    {
        return $this->IntegratorCode;
    }

    /**
     * @param string $IntegratorCode
     *
     * @return $this
     */
    public function setIntegratorCode(string $IntegratorCode): ?self
    {
        $this->IntegratorCode = $IntegratorCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getIntegratorAccessKey(): ?string
    {
        return $this->IntegratorAccessKey;
    }

    /**
     * @param string $IntegratorAccessKey
     *
     * @return $this
     */
    public function setIntegratorAccessKey(string $IntegratorAccessKey): ?self
    {
        $this->IntegratorAccessKey = $IntegratorAccessKey;

        return $this;
    }

    /**
     * @return int
     */
    public function getRequesterEcn(): ?int
    {
        return $this->RequesterEcn;
    }

    /**
     * @param int $RequesterEcn
     *
     * @return $this
     */
    public function setRequesterEcn(int $RequesterEcn): ?self
    {
        $this->RequesterEcn = $RequesterEcn;

        return $this;
    }

    /**
     * @return string
     */
    public function getMessageDigest(): ?string
    {
        return $this->MessageDigest;
    }

    /**
     * @param string $MessageDigest
     *
     * @return $this
     */
    public function setMessageDigest(string $MessageDigest): ?self
    {
        $this->MessageDigest = $MessageDigest;

        return $this;
    }

    /**
     * @return string
     */
    public function getIntegratorReference(): ?string
    {
        return $this->IntegratorReference;
    }

    /**
     * @param string $IntegratorReference
     *
     * @return $this
     */
    public function setIntegratorReference(string $IntegratorReference): ?self
    {
        $this->IntegratorReference = $IntegratorReference;

        return $this;
    }

    /**
     * @return int
     */
    public function getIssuedToEcn(): ?int
    {
        return $this->IssuedToEcn;
    }

    /**
     * @param int $IssuedToEcn
     *
     * @return $this
     */
    public function setIssuedToEcn(int $IssuedToEcn): ?self
    {
        $this->IssuedToEcn = $IssuedToEcn;

        return $this;
    }

    /**
     * @return string
     */
    public function getUsername(): ?string
    {
        return $this->Username;
    }

    /**
     * @param string $Username
     *
     * @return $this
     */
    public function setUsername(string $Username): ?self
    {
        $this->Username = $Username;

        return $this;
    }
}
