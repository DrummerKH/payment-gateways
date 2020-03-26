<?php
/**
 *
 * Dmitry Hvorostyuk
 * Date: 09.06.18.
 */

namespace App\Service\GatewayFactory\Rsb\DTO\Request;

class DepositRequestDTO extends BaseRequestDTO
{
    /**
     * Идентифицирует авторизацию финансовой транзакции.
     *
     * @var string
     */
    protected $trans_id;

    /**
     * Сумма транзакции в целых единицах, последние два символа копейки.
     *
     * @var int
     */
    protected $amount;

    /**
     * Код валюты транзакции (ISO 4217). Натерритории РФ - 643 код.
     *
     * @var int
     */
    protected $currency;

    /**
     * Описание платежа.
     *
     * @var string
     */
    protected $description;

    /**
     * (латиницей, в нижнемрегистре)
     * Идентификатор языка платежной страницы Банка.
     *
     * @var string
     */
    protected $language;

    /**
     * @return string
     */
    public function getTransId(): string
    {
        return $this->trans_id;
    }

    /**
     * @param string $trans_id
     */
    public function setTransId(string $trans_id): void
    {
        $this->trans_id = $trans_id;
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     */
    public function setAmount(int $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return int
     */
    public function getCurrency(): int
    {
        return $this->currency;
    }

    /**
     * @param int $currency
     */
    public function setCurrency(int $currency): void
    {
        $this->currency = $currency;
    }

    /**
     * @return string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getLanguage(): ?string
    {
        return $this->language;
    }

    /**
     * @param string $language
     */
    public function setLanguage(string $language): void
    {
        $this->language = $language;
    }
}
