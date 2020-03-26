<?php
/**
 *
 * Dmitry Hvorostyuk
 * Date: 09.06.18.
 */

namespace App\Service\GatewayFactory\Rsb\DTO\Response;

class GetStatusResponseDTO extends BaseResponseDTO
{
    /**
     * @var string
     */
    protected $RESULT;

    /**
     * @var string
     */
    protected $RESULT_PS;

    /**
     * @var string
     */
    protected $_3DSECURE;

    /**
     * @var string
     */
    protected $RRN;

    /**
     * @var string
     */
    protected $APPROVAL_CODE;

    /**
     * @var string
     */
    protected $CARD_NUMBER;

    /**
     * @var string
     */
    protected $MRCH_TRANSACTION_ID;

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
    public function getRESULTPS(): string
    {
        return $this->RESULT_PS;
    }

    /**
     * @param string $RESULT_PS
     */
    public function setRESULTPS(string $RESULT_PS): void
    {
        $this->RESULT_PS = $RESULT_PS;
    }

    /**
     * @return string
     */
    public function get3DSECURE(): ?string
    {
        return $this->_3DSECURE;
    }

    /**
     * @param string $_3dSecure
     */
    public function set3DSECURE(string $_3dSecure)
    {
        $this->_3DSECURE = $_3dSecure;
    }

    /**
     * @return string
     */
    public function getRRN(): ?string
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
    public function getAPPROVALCODE(): ?string
    {
        return $this->APPROVAL_CODE;
    }

    /**
     * @param mixed $APPROVAL_CODE
     */
    public function setAPPROVALCODE($APPROVAL_CODE): void
    {
        $this->APPROVAL_CODE = $APPROVAL_CODE;
    }

    /**
     * @return string
     */
    public function getCARDNUMBER(): ?string
    {
        return $this->CARD_NUMBER;
    }

    /**
     * @param string $CARD_NUMBER
     */
    public function setCARDNUMBER(string $CARD_NUMBER): void
    {
        $this->CARD_NUMBER = $CARD_NUMBER;
    }

    /**
     * @return string
     */
    public function getMRCHTRANSACTIONID(): string
    {
        return $this->MRCH_TRANSACTION_ID;
    }

    /**
     * @param string $MRCH_TRANSACTION_ID
     */
    public function setMRCHTRANSACTIONID(string $MRCH_TRANSACTION_ID): void
    {
        $this->MRCH_TRANSACTION_ID = $MRCH_TRANSACTION_ID;
    }
}
