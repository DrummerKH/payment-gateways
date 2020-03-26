<?php
/**
 *
 * Dmitry Hvorostyuk
 * Date: 08.06.18.
 */

namespace App\Service\GatewayFactory\Rsb\DTO\Response;


class RegisterResponseDTO
{
    /**
     * @var string
     */
    protected $TRANSACTION_ID;

    /**
     * @return string
     */
    public function getTRANSACTIONID(): string
    {
        return $this->TRANSACTION_ID;
    }

    /**
     * @param string $TRANSACTION_ID
     */
    public function setTRANSACTIONID(string $TRANSACTION_ID): void
    {
        $this->TRANSACTION_ID = $TRANSACTION_ID;
    }
}
