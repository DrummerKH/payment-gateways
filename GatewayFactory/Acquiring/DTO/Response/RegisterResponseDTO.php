<?php
/**
 * Created by PhpStorm.
 * User: Drummer1
 * Date: 10.04.18
 * Time: 11:21.
 */

namespace App\Service\GatewayFactory\Acquiring\DTO\Response;

class RegisterResponseDTO extends BaseResponseDTO
{
    /**
     * @var string
     */
    protected $formUrl;

    /**
     * @var string
     */
    protected $orderId;

    /**
     * @return string
     */
    public function getFormUrl(): ?string
    {
        return $this->formUrl;
    }

    /**
     * @param string $formUrl
     */
    public function setFormUrl(string $formUrl): void
    {
        $this->formUrl = $formUrl;
    }

    /**
     * @return string
     */
    public function getOrderId(): ?string
    {
        return $this->orderId;
    }

    /**
     * @param string $orderId
     */
    public function setOrderId(string $orderId): void
    {
        $this->orderId = $orderId;
    }
}
