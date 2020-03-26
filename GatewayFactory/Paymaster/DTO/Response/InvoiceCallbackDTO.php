<?php
/**
 * Created by PhpStorm.
 * User: Drummer1
 * Date: 24.04.18
 * Time: 16:47.
 */

namespace App\Service\GatewayFactory\Paymaster\DTO\Response;


use App\Service\GatewayFactory\Paymaster\DTO\Types\PaymentMethod;
use App\Service\GatewayFactory\Paymaster\DTO\Types\SimModeType;

class InvoiceCallbackDTO
{
    /**
     * Флаг предзапроса.
     */
    protected $LMI_PREREQUEST;

    /**
     * Идентификатор продавца.
     */
    protected $LMI_MERCHANT_ID;

    /**
     * Внутренний номер счета продавца.
     */
    protected $LMI_PAYMENT_NO;

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
     *
     * @var PaymentMethod
     */
    protected $LMI_PAYMENT_METHOD;

    /**
     * Тестовый режим
     *
     * @var SimModeType
     */
    protected $LMI_SIM_MODE;

    /**
     * Назначение платежа.
     */
    protected $LMI_PAYMENT_DESC;

    /**
     * Внешний идентификатор магазина в платежной системе.
     */
    protected $LMI_SHOP_ID;

    /**
     * Дополнительные параметры продавца.
     */
    protected $JSON_PARAMS;

    /**
     * @return mixed
     */
    public function getLMIPREREQUEST()
    {
        return $this->LMI_PREREQUEST;
    }

    /**
     * @param mixed $LMI_PREREQUEST
     */
    public function setLMIPREREQUEST($LMI_PREREQUEST): void
    {
        $this->LMI_PREREQUEST = $LMI_PREREQUEST;
    }

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
     * @return PaymentMethod
     */
    public function getLMIPAYMENTMETHOD(): PaymentMethod
    {
        return $this->LMI_PAYMENT_METHOD;
    }

    /**
     * @param PaymentMethod $LMI_PAYMENT_METHOD
     */
    public function setLMIPAYMENTMETHOD(PaymentMethod $LMI_PAYMENT_METHOD): void
    {
        $this->LMI_PAYMENT_METHOD = $LMI_PAYMENT_METHOD;
    }

    /**
     * @return SimModeType
     */
    public function getLMISIMMODE(): SimModeType
    {
        return $this->LMI_SIM_MODE;
    }

    /**
     * @param SimModeType $LMI_SIM_MODE
     */
    public function setLMISIMMODE(SimModeType $LMI_SIM_MODE): void
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
