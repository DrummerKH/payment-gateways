<?php
/**
 *
 * Dmitry Hvorostyuk
 * Date: 03.03.2020
 */

namespace App\Service\GatewayFactory\AviaCenter\DTO\DetailsCard;


use App\Service\GatewayFactory\AviaCenter\DTO\BaseRequestWithAuth;

class DetailsRequest extends BaseRequestWithAuth
{
    /** @var string */
    public $transaction;

    /**
     * DetailsRequest constructor.
     * @param string $session
     * @param string $transaction
     */
    public function __construct(string $session, string $transaction)
    {
        parent::__construct($session);
        $this->transaction = $transaction;
    }
}