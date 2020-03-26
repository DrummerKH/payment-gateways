<?php

namespace App\Service\GatewayFactory\Enett\DTO\Request;


use Phpro\SoapClient\Type\RequestInterface;

class GetFxQuoteRequestDTO implements RequestInterface
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
    private $RequesterECN;

    /**
     * @var string
     */
    private $MessageDigest;

    /**
     * @var int
     */
    private $ClientEcn;

    /**
     * @var string
     */
    private $Username;

    /**
     * @var string
     */
    private $BuyCurrency;

    /**
     * @var string
     */
    private $SellCurrency;

    private $IssuedToEcn;

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
    public function getRequesterECN(): ?int
    {
        return $this->RequesterECN;
    }

    /**
     * @param int $RequesterECN
     *
     * @return $this
     */
    public function setRequesterECN(int $RequesterECN): ?self
    {
        $this->RequesterECN = $RequesterECN;

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
     * @return int
     */
    public function getClientEcn(): ?int
    {
        return $this->ClientEcn;
    }

    /**
     * @param int $ClientEcn
     *
     * @return $this
     */
    public function setClientEcn(int $ClientEcn): ?self
    {
        $this->ClientEcn = $ClientEcn;

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

    /**
     * @return string
     */
    public function getBuyCurrency(): ?string
    {
        return $this->BuyCurrency;
    }

    /**
     * @param string $BuyCurrency
     *
     * @return $this
     */
    public function setBuyCurrency(string $BuyCurrency): ?self
    {
        $this->BuyCurrency = $BuyCurrency;

        return $this;
    }

    /**
     * @return string
     */
    public function getSellCurrency(): ?string
    {
        return $this->SellCurrency;
    }

    /**
     * @param string $SellCurrency
     *
     * @return $this
     */
    public function setSellCurrency(string $SellCurrency): ?self
    {
        $this->SellCurrency = $SellCurrency;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIssuedToEcn()
    {
        return $this->IssuedToEcn;
    }

    /**
     * @param mixed $IssuedToEcn
     */
    public function setIssuedToEcn($IssuedToEcn): void
    {
        $this->IssuedToEcn = $IssuedToEcn;
    }
}
