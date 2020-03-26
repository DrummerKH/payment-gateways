<?php
/**
 * Created by PhpStorm.
 * User: Drummer1
 * Date: 11.04.18
 * Time: 17:16.
 */

namespace App\Service\GatewayFactory\Acquiring\DTO\Request;

class RegisterRequestDTO extends BaseRequestDTO
{
    /**
     * @var string
     */
    protected $orderNumber;

    protected $amount;

    protected $currency;

    protected $returnUrl;

    protected $failUrl;

    protected $description;

    protected $language;

    protected $pageView;

    protected $clientId;

    protected $merchantLogin;

    protected $jsonParams;

    protected $sessionTimeoutSecs;

    protected $expirationDate;

    protected $bindingId;

    /**
     * @return mixed
     */
    public function getOrderNumber()
    {
        return $this->orderNumber;
    }

    /**
     * @param mixed $orderNumber
     */
    public function setOrderNumber($orderNumber): void
    {
        $this->orderNumber = $orderNumber;
    }

    /**
     * @return mixed
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     */
    public function setAmount(int $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return mixed
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param mixed $currency
     */
    public function setCurrency($currency): void
    {
        $this->currency = $currency;
    }

    /**
     * @return mixed
     */
    public function getReturnUrl()
    {
        return $this->returnUrl;
    }

    /**
     * @param mixed $returnUrl
     */
    public function setReturnUrl($returnUrl): void
    {
        $this->returnUrl = $returnUrl;
    }

    /**
     * @return mixed
     */
    public function getFailUrl()
    {
        return $this->failUrl;
    }

    /**
     * @param mixed $failUrl
     */
    public function setFailUrl($failUrl): void
    {
        $this->failUrl = $failUrl;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param mixed $language
     */
    public function setLanguage($language): void
    {
        $this->language = $language;
    }

    /**
     * @return mixed
     */
    public function getPageView()
    {
        return $this->pageView;
    }

    /**
     * @param mixed $pageView
     */
    public function setPageView($pageView): void
    {
        $this->pageView = $pageView;
    }

    /**
     * @return mixed
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * @param mixed $clientId
     */
    public function setClientId($clientId): void
    {
        $this->clientId = $clientId;
    }

    /**
     * @return mixed
     */
    public function getMerchantLogin()
    {
        return $this->merchantLogin;
    }

    /**
     * @param mixed $merchantLogin
     */
    public function setMerchantLogin($merchantLogin): void
    {
        $this->merchantLogin = $merchantLogin;
    }

    /**
     * @return mixed
     */
    public function getJsonParams()
    {
        return $this->jsonParams;
    }

    /**
     * @param mixed $jsonParams
     */
    public function setJsonParams($jsonParams): void
    {
        $this->jsonParams = $jsonParams;
    }

    /**
     * @return mixed
     */
    public function getSessionTimeoutSecs()
    {
        return $this->sessionTimeoutSecs;
    }

    /**
     * @param mixed $sessionTimeoutSecs
     */
    public function setSessionTimeoutSecs($sessionTimeoutSecs): void
    {
        $this->sessionTimeoutSecs = $sessionTimeoutSecs;
    }

    /**
     * @return mixed
     */
    public function getExpirationDate()
    {
        return $this->expirationDate;
    }

    /**
     * @param mixed $expirationDate
     */
    public function setExpirationDate($expirationDate): void
    {
        $this->expirationDate = $expirationDate;
    }

    /**
     * @return mixed
     */
    public function getBindingId()
    {
        return $this->bindingId;
    }

    /**
     * @param mixed $bindingId
     */
    public function setBindingId($bindingId): void
    {
        $this->bindingId = $bindingId;
    }
}
