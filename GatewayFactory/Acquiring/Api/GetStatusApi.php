<?php
/**
 * Created by PhpStorm.
 * User: Drummer1
 * Date: 18.04.18
 * Time: 13:32.
 */

namespace App\Service\GatewayFactory\Acquiring\Api;

use App\Exception\GatewayErrorException;
use App\Service\GatewayFactory\Acquiring\DTO\Request\GetStatusRequestDTO;
use App\Service\GatewayFactory\Acquiring\DTO\Response\GetStatusResponseDTO;
use InvalidArgumentException;
use Symfony\Component\Serializer\Exception\ExceptionInterface;

class GetStatusApi extends AcquiringApi
{
    /**
     * @param $DTO
     *
     * @return GetStatusResponseDTO
     * @throws ExceptionInterface
     * @throws GatewayErrorException
     */
    public function request($DTO = null)
    {
        if (!($DTO instanceof GetStatusRequestDTO)) {
            throw new InvalidArgumentException('Argument must be instance of GetStatusRequestDTO');
        }

        return $this->serializer->denormalize(parent::request($DTO), GetStatusResponseDTO::class);
    }

    /**
     * @return string
     */
    public function getEndpoint(): string
    {
        $settings = $this->gatewayFactory->factory()->getSettings();

        return $settings['apiUrl'] . $settings['getStatusMethod'];
    }
}
