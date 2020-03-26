<?php
/**
 * Created by PhpStorm.
 * User: Drummer1
 * Date: 07.05.18
 * Time: 16:27.
 */

namespace App\Service\GatewayFactory\Enett\Api;

use App\Exception\GatewayErrorException;
use App\Service\GatewayFactory\ApiPaymentInterface;
use App\Service\GatewayFactory\Enett\DTO\CancelVAN;
use App\Service\GatewayFactory\Enett\DTO\Request\CancelVANRequestDTO;
use App\Service\GatewayFactory\Enett\DTO\Response\CancelVANResponseDTO;
use InvalidArgumentException;
use ReflectionException;
use Symfony\Component\Serializer\Exception\ExceptionInterface;

class CancelVANApi implements ApiPaymentInterface
{
    /**
     * @var EnettApi
     */
    protected $client;

    /**
     * AmendVANApi constructor.
     *
     * @param EnettApi $client
     */
    public function __construct(EnettApi $client)
    {
        $this->client = $client;
    }

    /**
     * @param $DTO
     *
     * @return CancelVANResponseDTO
     * @throws ReflectionException
     *
     * @throws GatewayErrorException
     * @throws ExceptionInterface
     */
    public function request($DTO = null): CancelVANResponseDTO
    {
        if (!($DTO instanceof CancelVANRequestDTO)) {
            throw new InvalidArgumentException('Argument must be instance of CancelVANRequestDTO');
        }

        $this->client->prepareRequest($DTO);

        $cancelVAN = new CancelVAN();
        $cancelVAN->setCancelVANRequest($DTO);

        /** @var CancelVANResponseDTO $result */
        $result = $this->client->request('CancelVAN', $cancelVAN);

        return $result;
    }
}
