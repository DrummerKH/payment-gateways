<?php
/**
 *
 * Dmitry Hvorostyuk
 * Date: 10.03.2020
 */

namespace App\Service\GatewayFactory\AviaCenter\DTO;


class Balance
{
    /** @var string */
    public $id;

    /** @var float */
    public $amount;

    /** @var string */
    public $currency;

    /**
     * Balance constructor.
     * @param string $id
     * @param float $amount
     * @param string $currency
     */
    public function __construct(string $id, float $amount, string $currency)
    {
        $this->id = $id;
        $this->amount = $amount;
        $this->currency = $currency;
    }
}