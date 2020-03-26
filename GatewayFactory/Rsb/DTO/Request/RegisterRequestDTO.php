<?php
/**
 *
 * Dmitry Hvorostyuk
 * Date: 08.06.18.
 */

namespace App\Service\GatewayFactory\Rsb\DTO\Request;

class RegisterRequestDTO extends BaseRequestDTO
{
    /**
     * Сумма транзакции в целых единицах, последние два символа копейки.
     *
     * @var int
     */
    protected $amount;

    /**
     * Код валюты транзакции (ISO 4217). Натерритории РФ - 643 код.
     *
     * @var string
     */
    protected $currency;

    /**
     * Описание платежа.
     *
     * @var string
     */
    protected $description;

    /**
     * Дополнительные сведения.
     *
     * @var string
     */
    protected $mrch_transaction_id;

    /**
     * Идентификатор языка платежной страницы.
     *
     * @var string
     */
    protected $language;

    /**
     * @var string
     */
    protected $msg_type = 'DMS';

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
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     */
    public function setCurrency(string $currency): void
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
    public function getMrchTransactionId(): ?string
    {
        return $this->mrch_transaction_id;
    }

    /**
     * @param string $mrch_transaction_id
     */
    public function setMrchTransactionId(string $mrch_transaction_id): void
    {
        $this->mrch_transaction_id = $mrch_transaction_id;
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

    /**
     * @return string
     */
    public function getMsgType(): string
    {
        return $this->msg_type;
    }
}
