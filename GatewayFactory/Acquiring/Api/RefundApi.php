<?php
/**
 * Created by PhpStorm.
 * User: Drummer1
 * Date: 23.04.18
 * Time: 16:51.
 */

namespace App\Service\GatewayFactory\Acquiring\Api;


use App\Exception\GatewayErrorException;
use App\Service\GatewayFactory\Acquiring\DTO\Request\RefundRequestDTO;
use App\Service\GatewayFactory\Acquiring\DTO\Response\RefundResponseDTO;
use InvalidArgumentException;
use Symfony\Component\Serializer\Exception\ExceptionInterface;

class RefundApi extends AcquiringApi
{
    /**
     * @param $DTO
     *
     * @return RefundResponseDTO
     * @throws ExceptionInterface
     * @throws GatewayErrorException
     */
    public function request($DTO = null)
    {
        if (!($DTO instanceof RefundRequestDTO)) {
            throw new InvalidArgumentException('Argument must be instance of RefundRequestDTO');
        }

        return $this->serializer->denormalize(parent::request($DTO), RefundResponseDTO::class);
    }

    /**
     * @return string
     */
    public function getEndpoint(): string
    {
        $settings = $this->gatewayFactory->factory()->getSettings();

        return $settings['apiUrl'] . $settings['refundMethod'];
    }
}
