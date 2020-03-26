<?php

namespace App\Service\GatewayFactory\Enett\DTO\Type;

class FxHistory
{
    /**
     * @var string
     */
    private $DateTime;

    /**
     * @var string
     */
    private $User;

    /**
     * @var string
     */
    private $SellCurrencyCode;

    /**
     * @var string
     */
    private $BuyCurrencyCode;

    /**
     * @var int
     */
    private $SellAmount;

    /**
     * @var int
     */
    private $BuyAmount;

    /**
     * @var float
     */
    private $Rate;

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
    public function getUser(): ?string
    {
        return $this->User;
    }

    /**
     * @return string
     */
    public function getSellCurrencyCode(): ?string
    {
        return $this->SellCurrencyCode;
    }

    /**
     * @return string
     */
    public function getBuyCurrencyCode(): ?string
    {
        return $this->BuyCurrencyCode;
    }

    /**
     * @return int
     */
    public function getSellAmount(): ?int
    {
        return $this->SellAmount;
    }

    /**
     * @return int
     */
    public function getBuyAmount(): ?int
    {
        return $this->BuyAmount;
    }

    /**
     * @return float
     */
    public function getRate(): ?float
    {
        return $this->Rate;
    }
}
