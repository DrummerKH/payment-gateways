<?php
/**
 *
 * Dmitry Hvorostyuk
 * Date: 03.03.2020
 */

namespace App\Service\GatewayFactory\AviaCenter\DTO\DetailsCard;


use DateTime;

class History
{
    /** @var DateTime */
    public $DateTime;

    /** @var string */
    public $ActivityType;

    /** @var string */
    public $User;

    /** @var string */
    public $Currency;

    /** @var float */
    public $Amount;

    /** @var string */
    public $Details;

    /** @var string */
    public $SubActivityType;

    /** @var bool|null */
    public $UnderReview;

    /**
     * History constructor.
     * @param DateTime $DateTime
     * @param string $ActivityType
     * @param string $User
     * @param string $Currency
     * @param float $Amount
     * @param string $Details
     * @param string $SubActivityType
     * @param bool|null $UnderReview
     */
    public function __construct(DateTime $DateTime, string $ActivityType, string $User, string $Currency, float $Amount, string $Details, string $SubActivityType, ?bool $UnderReview)
    {
        $this->DateTime = $DateTime;
        $this->ActivityType = $ActivityType;
        $this->User = $User;
        $this->Currency = $Currency;
        $this->Amount = $Amount;
        $this->Details = $Details;
        $this->SubActivityType = $SubActivityType;
        $this->UnderReview = $UnderReview;
    }
}