<?php
/**
 *
 * Dmitry Hvorostyuk
 * Date: 17.09.2018.
 */

namespace App\Service\GatewayFactory\Rsb\DTO\Response;

class RefundResponseDTO extends BaseResponseDTO
{
    /**
     * @var string
     */
    private $REFUND_TRANS_ID;

    /**
     * @return string
     */
    public function getREFUNDTRANSID(): string
    {
        return $this->REFUND_TRANS_ID;
    }

    /**
     * @param string $REFUND_TRANS_ID
     */
    public function setREFUNDTRANSID(string $REFUND_TRANS_ID): void
    {
        $this->REFUND_TRANS_ID = $REFUND_TRANS_ID;
    }
}
