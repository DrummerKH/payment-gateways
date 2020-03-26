<?php
/**
 * Created by PhpStorm.
 * User: Drummer1
 * Date: 09.04.18
 * Time: 16:40.
 */

namespace App\Service\GatewayFactory\Acquiring\Api;


use App\Exception\GatewayErrorException;
use App\Service\GatewayFactory\Acquiring\DTO\Request\RegisterRequestDTO;
use App\Service\GatewayFactory\Acquiring\DTO\Response\RegisterResponseDTO;
use InvalidArgumentException;
use Symfony\Component\Serializer\Exception\ExceptionInterface;

class RegisterPreAuthRequestApi extends AcquiringApi
{
    /**
     * @param $DTO
     *
     * @return RegisterResponseDTO
     * @throws GatewayErrorException
     * @throws ExceptionInterface
     */
    public function request($DTO = null)
    {
        if (false === $DTO instanceof RegisterRequestDTO) {
            throw new InvalidArgumentException('Argument must be instance of RegisterRequestDTO');
        }

        return $this->serializer->denormalize(parent::request($DTO), RegisterResponseDTO::class);
    }

    /**
     * @return string
     */
    public function getEndpoint(): string
    {
        $settings = $this->gatewayFactory->factory()->getSettings();

        return $settings['apiUrl'] . $settings['registerMethod'];
    }
}
