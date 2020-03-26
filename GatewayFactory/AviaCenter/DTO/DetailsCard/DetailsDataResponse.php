<?php
/**
 *
 * Dmitry Hvorostyuk
 * Date: 03.03.2020
 */

namespace App\Service\GatewayFactory\AviaCenter\DTO\DetailsCard;


use App\Service\GatewayFactory\AviaCenter\DTO\Transaction;

class DetailsDataResponse
{
    /** @var Transaction */
    public $transaction;

    /** @var Details */
    public $details;
}