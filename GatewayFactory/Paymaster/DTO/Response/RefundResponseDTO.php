<?php
/**
 *
 * Dmitry Hvorostyuk
 * Date: 17.09.2018.
 */

namespace App\Service\GatewayFactory\Paymaster\DTO\Response;


class RefundResponseDTO
{
    /**
     * сумма возврата;.
     *
     * @var float
     */
    private $Amount;

    /**
     * код ошибки, если возврат неуспешен (может отсутствовать);.
     *
     * @var int
     */
    private $ErrorCode;

    /**
     * текстовое описание ошибки, если код ошибки отсутствует.
     * В свою очередь описание также может отсутствовать, если о причинах отказа ничего не известно.
     *
     * @var string
     */
    private $ErrorDesc;

    /**
     * идентификатор операции возврата;.
     *
     * @var mixed
     */
    private $ExternalID;

    /**
     * идентификатор платежа;.
     *
     * @var int
     */
    private $PaymentID;

    /**
     * @var int
     */
    private $RefundID;

    /**
     * статус возврата.
     *
     * @var string
     */
    private $State;

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->Amount;
    }

    /**
     * @param float $Amount
     */
    public function setAmount(float $Amount): void
    {
        $this->Amount = $Amount;
    }

    /**
     * @return int
     */
    public function getErrorCode(): ?int
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
    public function getErrorDesc(): ?string
    {
        return $this->ErrorDesc;
    }

    /**
     * @param string $ErrorDesc
     */
    public function setErrorDesc(string $ErrorDesc): void
    {
        $this->ErrorDesc = $ErrorDesc;
    }

    /**
     * @return mixed
     */
    public function getExternalID()
    {
        return $this->ExternalID;
    }

    /**
     * @param mixed $ExternalID
     */
    public function setExternalID($ExternalID): void
    {
        $this->ExternalID = $ExternalID;
    }

    /**
     * @return int
     */
    public function getPaymentID(): int
    {
        return $this->PaymentID;
    }

    /**
     * @param int $PaymentID
     */
    public function setPaymentID(int $PaymentID): void
    {
        $this->PaymentID = $PaymentID;
    }

    /**
     * @return int
     */
    public function getRefundID(): int
    {
        return $this->RefundID;
    }

    /**
     * @param int $RefundID
     */
    public function setRefundID(int $RefundID): void
    {
        $this->RefundID = $RefundID;
    }

    /**
     * @return string
     */
    public function getState(): string
    {
        return $this->State;
    }

    /**
     * @param string $State
     */
    public function setState(string $State): void
    {
        $this->State = $State;
    }
}
