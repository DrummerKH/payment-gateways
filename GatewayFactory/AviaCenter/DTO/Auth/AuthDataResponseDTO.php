<?php
/**
 *
 * Dmitry Hvorostyuk
 * Date: 27.02.2020
 */

namespace App\Service\GatewayFactory\AviaCenter\DTO\Auth;

use DateTime;

class AuthDataResponseDTO
{
    /** @var string */
    public $session;

    /** @var DateTime */
    public $expires;
}