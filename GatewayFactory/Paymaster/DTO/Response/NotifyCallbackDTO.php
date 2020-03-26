<?php
/**
 * Created by PhpStorm.
 * User: Drummer1
 * Date: 26.04.18
 * Time: 14:07.
 */

namespace App\Service\GatewayFactory\Paymaster\DTO\Response;


class NotifyCallbackDTO
{
    /**
     * Идентификатор продавца.
     */
    protected $LMI_MERCHANT_ID;

    /**
     * Внутренний номер счета продавца.
     */
    protected $LMI_PAYMENT_NO;

    /**
     * Номер платежа в системе PayMaster.
     */
    protected $LMI_SYS_PAYMENT_ID;

    /**
     * Дата платежа.
     */
    protected $LMI_SYS_PAYMENT_DATE;

    /**
     * Сумма платежа, заказанная продавцом
     */
    protected $LMI_PAYMENT_AMOUNT;

    /**
     * Валюта платежа, заказанная продавцом
     */
    protected $LMI_CURRENCY;

    /**
     * Дополнительные параметры продавца.
     */
    protected $JSON_PARAMS;

    /**
     * @return mixed
     */
    public function getLMIMERCHANTID()
    {
        return $this->LMI_MERCHANT_ID;
    }

    /**
     * @param mixed $LMI_MERCHANT_ID
     */
    public function setLMIMERCHANTID($LMI_MERCHANT_ID): void
    {
        $this->LMI_MERCHANT_ID = $LMI_MERCHANT_ID;
    }

    /**
     * @return mixed
     */
    public function getLMIPAYMENTNO()
    {
        return $this->LMI_PAYMENT_NO;
    }

    /**
     * @param mixed $LMI_PAYMENT_NO
     */
    public function setLMIPAYMENTNO($LMI_PAYMENT_NO): void
    {
        $this->LMI_PAYMENT_NO = $LMI_PAYMENT_NO;
    }

    /**
     * @return mixed
     */
    public function getLMISYSPAYMENTID()
    {
        return $this->LMI_SYS_PAYMENT_ID;
    }

    /**
     * @param mixed $LMI_SYS_PAYMENT_ID
     */
    public function setLMISYSPAYMENTID($LMI_SYS_PAYMENT_ID): void
    {
        $this->LMI_SYS_PAYMENT_ID = $LMI_SYS_PAYMENT_ID;
    }

    /**
     * @return mixed
     */
    public function getLMISYSPAYMENTDATE()
    {
        return $this->LMI_SYS_PAYMENT_DATE;
    }

    /**
     * @param mixed $LMI_SYS_PAYMENT_DATE
     */
    public function setLMISYSPAYMENTDATE($LMI_SYS_PAYMENT_DATE): void
    {
        $this->LMI_SYS_PAYMENT_DATE = $LMI_SYS_PAYMENT_DATE;
    }

    /**
     * @return mixed
     */
    public function getLMIPAYMENTAMOUNT()
    {
        return $this->LMI_PAYMENT_AMOUNT;
    }

    /**
     * @param mixed $LMI_PAYMENT_AMOUNT
     */
    public function setLMIPAYMENTAMOUNT($LMI_PAYMENT_AMOUNT): void
    {
        $this->LMI_PAYMENT_AMOUNT = $LMI_PAYMENT_AMOUNT;
    }

    /**
     * @return mixed
     */
    public function getLMICURRENCY()
    {
        return $this->LMI_CURRENCY;
    }

    /**
     * @param mixed $LMI_CURRENCY
     */
    public function setLMICURRENCY($LMI_CURRENCY): void
    {
        $this->LMI_CURRENCY = $LMI_CURRENCY;
    }

    /**
     * @return mixed
     */
    public function getJSONPARAMS()
    {
        return $this->JSON_PARAMS;
    }

    /**
     * @param mixed $JSON_PARAMS
     */
    public function setJSONPARAMS($JSON_PARAMS): void
    {
        $this->JSON_PARAMS = $JSON_PARAMS;
    }
}
