<?php
/**
 *
 * Dmitry Hvorostyuk
 * Date: 09.06.18.
 */

namespace App\Service\GatewayFactory\Rsb\DTO\Response;

class DepositResponseDTO extends BaseResponseDTO
{
    /**
     * @var string
     */
    protected $RESULT;

    /**
     * @var string
     */
    protected $RRN;

    /**
     * @var string
     */
    protected $APPROVAL_CODE;

    /**
     * @var
     */
    protected $CARD_NUMBER;

    /**
     * @return string
     */
    public function getRESULT(): string
    {
        return $this->RESULT;
    }

    /**
     * @param string $RESULT
     */
    public function setRESULT(string $RESULT): void
    {
        $this->RESULT = $RESULT;
    }

    /**
     * @return string
     */
    public function getRRN(): string
    {
        return $this->RRN;
    }

    /**
     * @param string $RRN
     */
    public function setRRN(string $RRN): void
    {
        $this->RRN = $RRN;
    }

    /**
     * @return string
     */
    public function getAPPROVALCODE(): string
    {
        return $this->APPROVAL_CODE;
    }

    /**
     * @param string $APPROVAL_CODE
     */
    public function setAPPROVALCODE(string $APPROVAL_CODE): void
    {
        $this->APPROVAL_CODE = $APPROVAL_CODE;
    }

    /**
     * @return mixed
     */
    public function getCARDNUMBER()
    {
        return $this->CARD_NUMBER;
    }

    /**
     * @param mixed $CARD_NUMBER
     */
    public function setCARDNUMBER($CARD_NUMBER): void
    {
        $this->CARD_NUMBER = $CARD_NUMBER;
    }
}
