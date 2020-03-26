<?php
/**
 *
 * Dmitry Hvorostyuk
 * Date: 02.03.2020
 */

namespace App\Service\GatewayFactory\AviaCenter\DTO\GetCard;


use App\Service\GatewayFactory\AviaCenter\DTO\Balance;
use App\Service\GatewayFactory\AviaCenter\DTO\Transaction;

class GetCardData
{
    /** @var Transaction */
    public $transaction;

    /** @var Card */
    public $card;

    /** @var Balance */
    public $balance;

    /**
     * GetCardData constructor.
     * @param Transaction $transaction
     * @param Card $card
     * @param Balance $balance
     */
    public function __construct(Transaction $transaction, Card $card, Balance $balance)
    {
        $this->transaction = $transaction;
        $this->card = $card;
        $this->balance = $balance;
    }
}