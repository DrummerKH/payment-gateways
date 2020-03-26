<?php
/**
 * Created by PhpStorm.
 * User: Drummer1
 * Date: 15.05.18
 * Time: 11:53.
 */

namespace App\Service\GatewayFactory\Acquiring\Api;


use App\Exception\GatewayErrorException;
use App\Service\GatewayFactory\Acquiring\DTO\Request\ReverseRequestDTO;
use App\Service\GatewayFactory\Acquiring\DTO\Response\ReverseResponseDTO;
use InvalidArgumentException;
use Symfony\Component\Serializer\Exception\ExceptionInterface;

class ReverseApi extends AcquiringApi
{
    /**
     * @param $DTO
     *
     * @return ReverseResponseDTO
     * @throws GatewayErrorException
     * @throws ExceptionInterface
     */
    public function request($DTO = null)
    {
        if (!($DTO instanceof ReverseRequestDTO)) {
            throw new InvalidArgumentException('Argument must be instance of ReverseRequestDTO');
        }

        return $this->serializer->denormalize(parent::request($DTO), ReverseResponseDTO::class);
    }

    /**
     * @return string
     */
    public function getEndpoint(): string
    {
        $settings = $this->gatewayFactory->factory()->getSettings();

        return $settings['apiUrl'] . $settings['reverseMethod'];
    }
}
