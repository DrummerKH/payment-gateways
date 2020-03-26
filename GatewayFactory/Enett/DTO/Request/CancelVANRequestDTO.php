<?php

namespace App\Service\GatewayFactory\Enett\DTO\Request;

use App\Annotation\Sign;
use App\Annotation\StoreInTransaction;
use Phpro\SoapClient\Type\RequestInterface;

class CancelVANRequestDTO implements RequestInterface
{
    /**
     * @StoreInTransaction(store=false)
     *
     * @var string
     */
    protected $IntegratorCode;

    /**
     * @StoreInTransaction(store=false)
     *
     * @var string
     */
    protected $IntegratorAccessKey;

    /**
     * @StoreInTransaction(store=false)
     *
     * @var int
     */
    protected $RequesterEcn;

    /**
     * @StoreInTransaction(store=false)
     *
     * @var string
     */
    protected $MessageDigest;

    /**
     * @var string
     */
    protected $CancelReason;

    /**
     * @Sign(order=1)
     *
     * @var string
     */
    protected $IntegratorReference;

    /**
     * @StoreInTransaction(store=false)
     * @Sign(order=2)
     *
     * @var int
     */
    protected $IssuedToEcn;

    /**
     * @Sign(order=3)
     *
     * @var string
     */
    protected $Username;

    /**
     * @return string
     */
    public function getIntegratorCode(): ?string
    {
        return $this->IntegratorCode;
    }

    /**
     * @param string $IntegratorCode
     */
    public function setIntegratorCode(string $IntegratorCode): void
    {
        $this->IntegratorCode = $IntegratorCode;
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
     */
    public function setUsername(string $Username): void
    {
        $this->Username = $Username;
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
     */
    public function setIntegratorAccessKey(string $IntegratorAccessKey): void
    {
        $this->IntegratorAccessKey = $IntegratorAccessKey;
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
     */
    public function setRequesterEcn(int $RequesterEcn): void
    {
        $this->RequesterEcn = $RequesterEcn;
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
     */
    public function setMessageDigest(string $MessageDigest): void
    {
        $this->MessageDigest = $MessageDigest;
    }

    /**
     * @return string
     */
    public function getCancelReason(): ?string
    {
        return $this->CancelReason;
    }

    /**
     * @param string $CancelReason
     */
    public function setCancelReason(string $CancelReason): void
    {
        $this->CancelReason = $CancelReason;
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
     */
    public function setIntegratorReference(string $IntegratorReference): void
    {
        $this->IntegratorReference = $IntegratorReference;
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
     */
    public function setIssuedToEcn(int $IssuedToEcn): void
    {
        $this->IssuedToEcn = $IssuedToEcn;
    }
}
