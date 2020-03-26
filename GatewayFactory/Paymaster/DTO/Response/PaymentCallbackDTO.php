<?php
/**
 * Created by PhpStorm.
 * User: Drummer1
 * Date: 26.04.18
 * Time: 13:08.
 */

namespace App\Service\GatewayFactory\Paymaster\DTO\Response;


class PaymentCallbackDTO
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
     * Сумма платежа в валюте, в которой покупатель производит платеж.
     */
    protected $LMI_PAID_AMOUNT;

    /**
     * Валюта, в которой производится платеж.
     */
    protected $LMI_PAID_CURRENCY;

    /**
     * Идентификатор платежного метода.
     */
    protected $LMI_PAYMENT_METHOD;

    /**
     * Флаг тестового режима.
     */
    protected $LMI_SIM_MODE;

    /**
     * Назначение платежа.
     */
    protected $LMI_PAYMENT_DESC;

    /**
     * Контрольная подпись запроса.
     */
    protected $LMI_HASH;

    /**
     * Идентификатор плательщика в платежной системе.
     */
    protected $LMI_PAYER_IDENTIFIER;

    /**
     * Внешний идентификатор магазина в платежной системе.
     */
    protected $LMI_SHOP_ID;

    /**
     * Страна местонахождения плательщика.
     */
    protected $LMI_PAYER_COUNTRY;

    /**
     * Страна документа плательщика.
     */
    protected $LMI_PAYER_PASSPORT_COUNTRY;

    /**
     * IP адрес плательщика.
     */
    protected $LMI_PAYER_IP_ADDRESS;

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
    public function getLMIPAIDAMOUNT()
    {
        return $this->LMI_PAID_AMOUNT;
    }

    /**
     * @param mixed $LMI_PAID_AMOUNT
     */
    public function setLMIPAIDAMOUNT($LMI_PAID_AMOUNT): void
    {
        $this->LMI_PAID_AMOUNT = $LMI_PAID_AMOUNT;
    }

    /**
     * @return mixed
     */
    public function getLMIPAIDCURRENCY()
    {
        return $this->LMI_PAID_CURRENCY;
    }

    /**
     * @param mixed $LMI_PAID_CURRENCY
     */
    public function setLMIPAIDCURRENCY($LMI_PAID_CURRENCY): void
    {
        $this->LMI_PAID_CURRENCY = $LMI_PAID_CURRENCY;
    }

    /**
     * @return mixed
     */
    public function getLMIPAYMENTMETHOD()
    {
        return $this->LMI_PAYMENT_METHOD;
    }

    /**
     * @param mixed $LMI_PAYMENT_METHOD
     */
    public function setLMIPAYMENTMETHOD($LMI_PAYMENT_METHOD): void
    {
        $this->LMI_PAYMENT_METHOD = $LMI_PAYMENT_METHOD;
    }

    /**
     * @return mixed
     */
    public function getLMISIMMODE()
    {
        return $this->LMI_SIM_MODE;
    }

    /**
     * @param mixed $LMI_SIM_MODE
     */
    public function setLMISIMMODE($LMI_SIM_MODE): void
    {
        $this->LMI_SIM_MODE = $LMI_SIM_MODE;
    }

    /**
     * @return mixed
     */
    public function getLMIPAYMENTDESC()
    {
        return $this->LMI_PAYMENT_DESC;
    }

    /**
     * @param mixed $LMI_PAYMENT_DESC
     */
    public function setLMIPAYMENTDESC($LMI_PAYMENT_DESC): void
    {
        $this->LMI_PAYMENT_DESC = $LMI_PAYMENT_DESC;
    }

    /**
     * @return mixed
     */
    public function getLMIHASH()
    {
        return $this->LMI_HASH;
    }

    /**
     * @param mixed $LMI_HASH
     */
    public function setLMIHASH($LMI_HASH): void
    {
        $this->LMI_HASH = $LMI_HASH;
    }

    /**
     * @return mixed
     */
    public function getLMIPAYERIDENTIFIER()
    {
        return $this->LMI_PAYER_IDENTIFIER;
    }

    /**
     * @param mixed $LMI_PAYER_IDENTIFIER
     */
    public function setLMIPAYERIDENTIFIER($LMI_PAYER_IDENTIFIER): void
    {
        $this->LMI_PAYER_IDENTIFIER = $LMI_PAYER_IDENTIFIER;
    }

    /**
     * @return mixed
     */
    public function getLMISHOPID()
    {
        return $this->LMI_SHOP_ID;
    }

    /**
     * @param mixed $LMI_SHOP_ID
     */
    public function setLMISHOPID($LMI_SHOP_ID): void
    {
        $this->LMI_SHOP_ID = $LMI_SHOP_ID;
    }

    /**
     * @return mixed
     */
    public function getLMIPAYERCOUNTRY()
    {
        return $this->LMI_PAYER_COUNTRY;
    }

    /**
     * @param mixed $LMI_PAYER_COUNTRY
     */
    public function setLMIPAYERCOUNTRY($LMI_PAYER_COUNTRY): void
    {
        $this->LMI_PAYER_COUNTRY = $LMI_PAYER_COUNTRY;
    }

    /**
     * @return mixed
     */
    public function getLMIPAYERPASSPORTCOUNTRY()
    {
        return $this->LMI_PAYER_PASSPORT_COUNTRY;
    }

    /**
     * @param mixed $LMI_PAYER_PASSPORT_COUNTRY
     */
    public function setLMIPAYERPASSPORTCOUNTRY($LMI_PAYER_PASSPORT_COUNTRY): void
    {
        $this->LMI_PAYER_PASSPORT_COUNTRY = $LMI_PAYER_PASSPORT_COUNTRY;
    }

    /**
     * @return mixed
     */
    public function getLMIPAYERIPADDRESS()
    {
        return $this->LMI_PAYER_IP_ADDRESS;
    }

    /**
     * @param mixed $LMI_PAYER_IP_ADDRESS
     */
    public function setLMIPAYERIPADDRESS($LMI_PAYER_IP_ADDRESS): void
    {
        $this->LMI_PAYER_IP_ADDRESS = $LMI_PAYER_IP_ADDRESS;
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
