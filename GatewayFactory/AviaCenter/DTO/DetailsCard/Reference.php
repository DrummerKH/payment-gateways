<?php
/**
 *
 * Dmitry Hvorostyuk
 * Date: 03.03.2020
 */

namespace App\Service\GatewayFactory\AviaCenter\DTO\DetailsCard;


class Reference
{
    /** @var string */
    public $Identifier;

    /** @var string|null */
    public $Value;

    /**
     * Reference constructor.
     * @param string $Identifier
     * @param string|null $Value
     */
    public function __construct(string $Identifier, ?string $Value)
    {
        $this->Identifier = $Identifier;
        $this->Value = $Value;
    }
}