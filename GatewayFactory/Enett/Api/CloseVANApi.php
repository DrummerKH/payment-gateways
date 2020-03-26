<?php
/**
 *
 * Dmitry Hvorostyuk
 * Date: 03.07.18.
 */

namespace App\Service\GatewayFactory\Enett\Api;


use App\Exception\GatewayErrorException;
use App\Service\GatewayFactory\ApiPaymentInterface;
use App\Service\GatewayFactory\Enett\DTO\CloseVAN;
use App\Service\GatewayFactory\Enett\DTO\Request\CloseVANRequestDTO;
use App\Service\GatewayFactory\Enett\DTO\Response\CloseVANResponseDTO;
use InvalidArgumentException;
use ReflectionException;
use Symfony\Component\Serializer\Exception\ExceptionInterface;

class CloseVANApi implements ApiPaymentInterface
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
     * @return CloseVANResponseDTO
     * @throws ReflectionException
     *
     * @throws GatewayErrorException
     * @throws ExceptionInterface
     */
    public function request($DTO = null): CloseVANResponseDTO
    {
        if (!($DTO instanceof CloseVANRequestDTO)) {
            throw new InvalidArgumentException('Argument must be instance of CloseVANRequestDTO');
        }

        $this->client->prepareRequest($DTO);

        $closeVAN = new CloseVAN();
        $closeVAN->setCloseVANRequest($DTO);

        /** @var CloseVANResponseDTO $result */
        $result = $this->client->request('CloseVAN', $closeVAN);

        return $result;
    }
}
