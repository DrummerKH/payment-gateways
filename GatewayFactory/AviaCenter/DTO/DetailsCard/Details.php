<?php
/**
 *
 * Dmitry Hvorostyuk
 * Date: 03.03.2020
 */

namespace App\Service\GatewayFactory\AviaCenter\DTO\DetailsCard;


class Details
{
    /**
     * номер карты
     * @var string
     */
    public $number;

    /**
     * история транзакций
     * @var History[]
     */
    public $history;

    /**
     * данные клиента
     * @var Reference[]
     */
    public $references;

    /**
     * многократное использование
     * @var bool
     */
    public $multyuse;

    /**
     * Details constructor.
     * @param string $number
     * @param History[] $history
     * @param Reference[] $references
     * @param bool $multyuse
     */
    public function __construct(string $number, array $history, array $references, bool $multyuse)
    {
        $this->number = $number;
        $this->history = $history;
        $this->references = $references;
        $this->multyuse = $multyuse;
    }
}