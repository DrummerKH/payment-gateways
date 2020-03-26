<?php
/**
 * Created by PhpStorm.
 * User: Drummer1
 * Date: 11.05.18
 * Time: 11:12.
 */

namespace App\Service\GatewayFactory\Enett\DTO\Request;


class BaseDTO
{
    /**
     * @var string
     */
    protected $IntegratorCode;

    /**
     * @var string
     */
    protected $IntegratorAccessKey;

    /**
     * @var string
     */
    protected $MessageDigest;

    /**
     * @var int
     */
    protected $IssuedToEcn;

    /**
     * @var int
     */
    protected $RequesterEcn;

    /**
     * @return string
     */
    public function getIntegratorCode(): string
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
     * @return int
     */
    public function getRequesterEcn(): int
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
     * @return int
     */
    public function getIssuedToEcn(): int
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

    /**
     * @return string
     */
    public function getIntegratorAccessKey(): string
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
     * @return string
     */
    public function getMessageDigest(): string
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
}
