<?php
/**
 *
 * Dmitry Hvorostyuk
 * Date: 03.03.2020
 */

namespace App\Service\GatewayFactory\AviaCenter\DTO;


class EntityCardDetails
{
    /** @var string */
    public $transaction;

    /**
     * EntityCardDetails constructor.
     * @param string $transaction
     */
    public function __construct(string $transaction)
    {
        $this->transaction = $transaction;
    }
}