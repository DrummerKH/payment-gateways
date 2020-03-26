<?php
/**
 *
 * Dmitry Hvorostyuk
 * Date: 02.03.2020
 */

namespace App\Service\GatewayFactory\AviaCenter\DTO\GetCard;


use App\Service\GatewayFactory\AviaCenter\DTO\BaseRequestWithAuth;

class GetCardRequest extends BaseRequestWithAuth
{
    /** @var string */
    public $transaction;

    /**
     * GetCardRequest constructor.
     * @param string $session
     * @param string $transaction
     */
    public function __construct(string $session, string $transaction)
    {
        parent::__construct($session);

        $this->transaction = $transaction;
    }
}