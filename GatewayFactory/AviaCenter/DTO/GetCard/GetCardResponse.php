<?php
/**
 *
 * Dmitry Hvorostyuk
 * Date: 02.03.2020
 */

namespace App\Service\GatewayFactory\AviaCenter\DTO\GetCard;


use App\Service\GatewayFactory\AviaCenter\DTO\BaseResponseDTO;

class GetCardResponse extends BaseResponseDTO
{
    /** @var GetCardData */
    public $data;

    /**
     * GetCardResponse constructor.
     * @param GetCardData $data
     */
    public function __construct(GetCardData $data)
    {
        $this->data = $data;
    }
}