<?php
/**
 *
 * Dmitry Hvorostyuk
 * Date: 27.02.2020
 */

namespace App\Service\GatewayFactory\AviaCenter\DTO\Auth;


class AuthRequestDTO
{
    /** @var string */
    public $login;

    /** @var string */
    public $password;

    /**
     * AuthRequestDTO constructor.
     * @param string $login
     * @param string $password
     */
    public function __construct(string $login, string $password)
    {
        $this->login = $login;
        $this->password = $password;
    }
}