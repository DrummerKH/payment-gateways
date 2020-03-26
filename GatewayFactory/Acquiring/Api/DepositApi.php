<?php
/**
 * Created by PhpStorm.
 * User: Drummer1
 * Date: 09.04.18
 * Time: 16:40.
 */

namespace App\Service\GatewayFactory\Acquiring\Api;


use App\Exception\GatewayErrorException;
use App\Service\GatewayFactory\Acquiring\DTO\Request\DepositRequestDTO;
use App\Service\GatewayFactory\Acquiring\DTO\Response\DepositResponseDTO;
use InvalidArgumentException;
use Symfony\Component\Serializer\Exception\ExceptionInterface;

class DepositApi extends AcquiringApi
{
    /**
     * @param $DTO
     *
     * @return DepositResponseDTO
     * @throws ExceptionInterface
     * @throws GatewayErrorException
     */
    public function request($DTO = null)
    {
        if (!($DTO instanceof DepositRequestDTO)) {
            throw new InvalidArgumentException('Argument must be instance of DepositRequestDTO');
        }

        return $this->serializer->denormalize(parent::request($DTO), DepositResponseDTO::class);
    }

    /**
     * @return string
     */
    public function getEndpoint(): string
    {
        $settings = $this->gatewayFactory->factory()->getSettings();

        return $settings['apiUrl'] . $settings['depositMethod'];
    }
}
