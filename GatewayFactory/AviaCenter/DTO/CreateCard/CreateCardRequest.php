<?php
/**
 *
 * Dmitry Hvorostyuk
 * Date: 27.02.2020
 */

namespace App\Service\GatewayFactory\AviaCenter\DTO\CreateCard;


use App\Service\GatewayFactory\AviaCenter\DTO\BaseRequestWithAuth;
use DateTime;

class CreateCardRequest extends BaseRequestWithAuth
{
    /**
     * локатор заказа
     * @var string
     */
    public $locator;

    /**
     * сумма заказа
     * @var float
     */
    public $amount;

    /**
     * Валюта заказа
     * @var string
     */
    public $currency;

    /**
     * Код партнера
     *
     * @var string
     */
    public $partner;

    /**
     * Категория для карты
     * @var string|null
     */
    public $category;

    /**
     * тип транзакции или сервиса генерации карты
     * @var string|null
     */
    public $type;

    /**
     * тип пл. карты
     * @var string|null
     */
    public $card_type;

    /**
     * @var DateTime
     */
    public $activation;

    /**
     * @var DateTime
     */
    public $expiration;

    /**
     * CreateCardRequest constructor.
     * @param string $session
     * @param string $locator
     * @param float $amount
     * @param string $currency
     * @param string $partner
     * @param DateTime $activation
     * @param DateTime $expiration
     * @param string|null $category
     * @param string|null $type
     * @param string|null $card_type
     */
    public function __construct(
        string $session,
        string $locator,
        float $amount,
        string $currency,
        string $partner,
        DateTime $activation,
        DateTime $expiration,
        ?string $category = null,
        ?string $type = null,
        ?string $card_type = null
    )
    {
        parent::__construct($session);

        $this->locator = $locator;
        $this->amount = $amount;
        $this->currency = $currency;
        $this->partner = $partner;
        $this->category = $category;
        $this->type = $type;
        $this->card_type = $card_type;
        $this->session = $session;
        $this->activation = $activation;
        $this->expiration = $expiration;
    }


}