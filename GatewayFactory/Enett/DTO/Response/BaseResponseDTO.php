<?php
/**
 *
 * Dmitry Hvorostyuk
 * Date: 04.07.18.
 */

namespace App\Service\GatewayFactory\Enett\DTO\Response;


class BaseResponseDTO
{
    /**
     * @var bool
     */
    protected $IsSuccessful;

    /**
     * @var int
     */
    protected $ErrorCode;

    /**
     * @var string
     */
    protected $ErrorDescription;

    /**
     * @return bool
     */
    public function isSuccessful(): ?bool
    {
        return $this->IsSuccessful;
    }

    /**
     * @return int
     */
    public function getErrorCode(): ?int
    {
        return $this->ErrorCode;
    }

    /**
     * @return string
     */
    public function getErrorDescription(): ?string
    {
        return $this->ErrorDescription;
    }
}
