<?php
/**
 *
 * Dmitry Hvorostyuk
 * Date: 03.03.2020
 */

namespace App\Service\GatewayFactory\AviaCenter\DTO\DetailsCard;


use App\Service\GatewayFactory\AviaCenter\DTO\BaseResponseDTO;

class DetailsResponse extends BaseResponseDTO
{
    /** @var DetailsDataResponse */
    public $data;
}