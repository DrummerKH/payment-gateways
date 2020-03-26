<?php
/**
 *
 * Dmitry Hvorostyuk
 * Date: 27.02.2020
 */

namespace App\Service\GatewayFactory\AviaCenter\DTO;


class BaseRequestWithAuth
{
    /** @var string */
    public $session;

    /**
     * BaseRequestWithAuth constructor.
     * @param string $session
     */
    public function __construct(string $session)
    {
        $this->session = $session;
    }
}