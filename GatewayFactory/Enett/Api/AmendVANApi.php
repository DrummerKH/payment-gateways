<?php
/**
 *
 * Dmitry Hvorostyuk
 * Date: 03.07.18.
 */

namespace App\Service\GatewayFactory\Enett\Api;

use App\Exception\GatewayErrorException;
use App\Service\GatewayFactory\ApiPaymentInterface;
use App\Service\GatewayFactory\Enett\DTO\AmendVAN;
use App\Service\GatewayFactory\Enett\DTO\Request\AmendVANRequestDTO;
use App\Service\GatewayFactory\Enett\DTO\Response\AmendVANResponseDTO;
use InvalidArgumentException;
use ReflectionException;
use Symfony\Component\Serializer\Exception\ExceptionInterface;

class AmendVANApi implements ApiPaymentInterface
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
     * @return AmendVANResponseDTO
     * @throws ReflectionException
     *
     * @throws GatewayErrorException
     * @throws ExceptionInterface
     */
    public function request($DTO = null): AmendVANResponseDTO
    {
        if (!($DTO instanceof AmendVANRequestDTO)) {
            throw new InvalidArgumentException('Argument must be instance of AmendVANRequestDTO');
        }

        $this->client->prepareRequest($DTO);

        $amendVAN = new AmendVAN();
        $amendVAN->setAmendVANRequest($DTO);

        /** @var AmendVANResponseDTO $result */
        $result = $this->client->request('AmendVAN', $amendVAN);

        return $result;
    }
}
