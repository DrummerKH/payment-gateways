<?php

namespace App\Service\GatewayFactory\Enett\DTO\Type;

class VanHistory
{
    /**
     * @var string
     */
    private $DateTime;

    /**
     * @var string
     */
    private $ActivityType;

    /**
     * @var string
     */
    private $User;

    /**
     * @var string
     */
    private $Currency;

    /**
     * @var int
     */
    private $Amount;

    /**
     * @var string
     */
    private $Details;

    /**
     * @var string
     */
    private $SubActivityType;

    /**
     * @var bool
     */
    private $UnderReview;

    /**
     * @return string
     */
    public function getDateTime(): ?string
    {
        return $this->DateTime;
    }

    /**
     * @return string
     */
    public function getActivityType(): ?string
    {
        return $this->ActivityType;
    }

    /**
     * @return string
     */
    public function getUser(): ?string
    {
        return $this->User;
    }

    /**
     * @return string
     */
    public function getCurrency(): ?string
    {
        return $this->Currency;
    }

    /**
     * @return int
     */
    public function getAmount(): ?int
    {
        return $this->Amount;
    }

    /**
     * @return string
     */
    public function getDetails(): ?string
    {
        return $this->Details;
    }

    /**
     * @return string
     */
    public function getSubActivityType(): ?string
    {
        return $this->SubActivityType;
    }

    /**
     * @return bool
     */
    public function isUnderReview(): ?bool
    {
        return $this->UnderReview;
    }
}
