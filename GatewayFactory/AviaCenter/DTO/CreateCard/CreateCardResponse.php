<?php
/**
 *
 * Dmitry Hvorostyuk
 * Date: 27.02.2020
 */

namespace App\Service\GatewayFactory\AviaCenter\DTO\CreateCard;


use App\Service\GatewayFactory\AviaCenter\DTO\BaseResponseDTO;

class CreateCardResponse extends BaseResponseDTO
{
    /** @var CreateCardDataResponse */
    public $data;
}