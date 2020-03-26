<?php
/**
 *
 * Dmitry Hvorostyuk
 * Date: 02.03.2020
 */

namespace App\Service\GatewayFactory\AviaCenter\DTO\GetCard;


use Payum\Core\Security\SensitiveValue;

class Card
{
    /** @var string */
    public $number;

    /** @var string */
    public $holder;

    /** @var int */
    public $cvv;
    /**
     * @var string
     */
    public $month;
    /**
     * @var string
     */
    public $year;
    /**
     * @var string
     */
    public $status;

    /**
     * Card constructor.
     * @param string $number
     * @param string $holder
     * @param int $cvv
     * @param string $month
     * @param string $year
     * @param string $status
     */
    public function __construct(string $number, string $holder, int $cvv, string $month, string $year, string $status)
    {
        $this->number = $number;
        $this->holder = $holder;
        $this->cvv = $cvv;
        $this->month = $month;
        $this->year = $year;
        $this->status = $status;
    }

    /**
     * @return SensitiveValue
     */
    public function getNumber(): SensitiveValue
    {
        return SensitiveValue::ensureSensitive($this->number);
    }

    /**
     * @return SensitiveValue
     */
    public function getHolder(): SensitiveValue
    {
        return SensitiveValue::ensureSensitive($this->holder);
    }

    /**
     * @return SensitiveValue
     */
    public function getCvv(): SensitiveValue
    {
        return SensitiveValue::ensureSensitive($this->cvv);
    }
}