<?php
/**
 *
 * Dmitry Hvorostyuk
 * Date: 02.03.2020
 */

namespace App\Service\GatewayFactory\AviaCenter\DTO;


class Transaction
{
    /** @var string */
    public $id;

    /** @var string */
    public $type;

    /** @var string */
    public $partner;

    /**
     * Transaction constructor.
     * @param string $id
     * @param string $type
     * @param string $partner
     */
    public function __construct(string $id, string $type, string $partner)
    {
        $this->id = $id;
        $this->type = $type;
        $this->partner = $partner;
    }
}