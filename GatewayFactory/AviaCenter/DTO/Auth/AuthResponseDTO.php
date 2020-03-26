<?php
/**
 *
 * Dmitry Hvorostyuk
 * Date: 27.02.2020
 */

namespace App\Service\GatewayFactory\AviaCenter\DTO\Auth;


use App\Service\GatewayFactory\AviaCenter\DTO\BaseResponseDTO;

class AuthResponseDTO extends BaseResponseDTO
{
    /** @var AuthDataResponseDTO */
    public $data;
}