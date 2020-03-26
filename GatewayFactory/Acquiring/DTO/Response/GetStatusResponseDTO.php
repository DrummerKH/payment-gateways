<?php
/**
 * Created by PhpStorm.
 * User: Drummer1
 * Date: 18.04.18
 * Time: 13:33.
 */

namespace App\Service\GatewayFactory\Acquiring\DTO\Response;

use App\Annotation\StoreInTransaction;

class GetStatusResponseDTO
{
    /**
     * По значению этого параметра определяется состояние заказа в платежной системе
     * Отсутствует, если заказ не был найден.
     *
     * @var int
     */
    protected $OrderStatus;

    /**
     * Код ошибки.
     *
     * @var int
     */
    protected $ErrorCode;

    /**
     * Описание ошибки на языке, переданном в параметре Language в запросе.
     *
     * @var string
     */
    protected $ErrorMessage;

    /**
     * Номер (идентификатор) заказа в системе магазина.
     *
     * @var string
     */
    protected $OrderNumber;

    /**
     * Маскированный номер карты, которая использовалась для оплаты. Указан только после оплаты заказа.
     *
     * @StoreInTransaction(store=false)
     *
     * @var string
     */
    protected $Pan;

    /**
     * Срок истечения действия карты в формате YYYYMM. Указан только после оплаты заказа.
     *
     * @StoreInTransaction(store=false)
     *
     * @var string
     */
    protected $expiration;

    /**
     * Имя держателя карты. Указан только после оплаты заказа.
     *
     * @StoreInTransaction(store=false)
     *
     * @var string
     */
    protected $cardholderName;

    /**
     * Сумма платежа в копейках (или центах).
     *
     * @var int
     */
    protected $Amount;

    /**
     * Код валюты платежа ISO 4217. Если не указан, считается равным 810 (российские рубли).
     *
     * @var int
     */
    protected $currency;

    /**
     * Код авторизации МПС. Поле фиксированной длины (6 символов), может содержать цифры и латинские буквы.
     *
     * @var string
     */
    protected $approvalCode;

    /**
     * IP адрес пользователя, который оплачивал заказ.
     *
     * @var string
     */
    protected $Ip;

    /**
     * @var int
     */
    protected $depositAmount;

    /**
     * @return int
     */
    public function getOrderStatus(): ?int
    {
        return $this->OrderStatus;
    }

    /**
     * @param int $OrderStatus
     */
    public function setOrderStatus(int $OrderStatus): void
    {
        $this->OrderStatus = $OrderStatus;
    }

    /**
     * @return int
     */
    public function getErrorCode(): int
    {
        return $this->ErrorCode;
    }

    /**
     * @param int $ErrorCode
     */
    public function setErrorCode(int $ErrorCode): void
    {
        $this->ErrorCode = $ErrorCode;
    }

    /**
     * @return string
     */
    public function getErrorMessage(): string
    {
        return $this->ErrorMessage;
    }

    /**
     * @param string $ErrorMessage
     */
    public function setErrorMessage(string $ErrorMessage): void
    {
        $this->ErrorMessage = $ErrorMessage;
    }

    /**
     * @return string
     */
    public function getOrderNumber(): ?string
    {
        return $this->OrderNumber;
    }

    /**
     * @param string $OrderNumber
     */
    public function setOrderNumber(string $OrderNumber): void
    {
        $this->OrderNumber = $OrderNumber;
    }

    /**
     * @return string
     */
    public function getPan(): ?string
    {
        return $this->Pan;
    }

    /**
     * @param string $Pan
     */
    public function setPan(string $Pan): void
    {
        $this->Pan = $Pan;
    }

    /**
     * @return string
     */
    public function getExpiration(): ?string
    {
        return $this->expiration;
    }

    /**
     * @param string $expiration
     */
    public function setExpiration(string $expiration): void
    {
        $this->expiration = $expiration;
    }

    /**
     * @return string
     */
    public function getCardholderName(): ?string
    {
        return $this->cardholderName;
    }

    /**
     * @param string $cardholderName
     */
    public function setCardholderName(string $cardholderName): void
    {
        $this->cardholderName = $cardholderName;
    }

    /**
     * @return int
     */
    public function getAmount(): ?int
    {
        return $this->Amount;
    }

    /**
     * @param int $Amount
     */
    public function setAmount(int $Amount): void
    {
        $this->Amount = $Amount;
    }

    /**
     * @return int
     */
    public function getCurrency(): ?int
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
    public function getApprovalCode(): ?string
    {
        return $this->approvalCode;
    }

    /**
     * @param string $approvalCode
     */
    public function setApprovalCode(string $approvalCode): void
    {
        $this->approvalCode = $approvalCode;
    }

    /**
     * @return string
     */
    public function getIp(): ?string
    {
        return $this->Ip;
    }

    /**
     * @param string $Ip
     */
    public function setIp(string $Ip): void
    {
        $this->Ip = $Ip;
    }

    /**
     * @return int
     */
    public function getDepositAmount(): ?int
    {
        return $this->depositAmount;
    }

    /**
     * @param int $depositAmount
     */
    public function setDepositAmount(int $depositAmount): void
    {
        $this->depositAmount = $depositAmount;
    }
}
