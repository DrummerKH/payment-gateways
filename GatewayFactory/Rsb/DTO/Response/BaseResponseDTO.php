<?php
/**
 *
 * Dmitry Hvorostyuk
 * Date: 08.06.18.
 */

namespace App\Service\GatewayFactory\Rsb\DTO\Response;


class BaseResponseDTO
{
    /**
     * @var string
     */
    protected $error;

    /**
     * @var string
     */
    protected $RESULT_CODE;

    /**
     * @return null|string
     */
    public function getError(): ?string
    {
        return $this->error;
    }

    /**
     * @param mixed $error
     */
    public function setError($error): void
    {
        $this->error = $error;
    }

    /**
     * @return null|string
     */
    public function getRESULTCODE(): ?string
    {
        return $this->RESULT_CODE;
    }

    /**
     * @param mixed $RESULT_CODE
     */
    public function setRESULTCODE($RESULT_CODE): void
    {
        $this->RESULT_CODE = $RESULT_CODE;
    }
}
