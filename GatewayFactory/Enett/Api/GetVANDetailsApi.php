<?php
/**
 *
 * Dmitry Hvorostyuk
 * Date: 03.07.18.
 */

namespace App\Service\GatewayFactory\Enett\Api;

use App\Exception\GatewayErrorException;
use App\Service\GatewayFactory\ApiPaymentInterface;
use App\Service\GatewayFactory\Enett\DTO\GetVANDetails;
use App\Service\GatewayFactory\Enett\DTO\Request\GetVANDetailsRequestDTO;
use App\Service\GatewayFactory\Enett\DTO\Response\GetVANDetailsResponseDTO;
use InvalidArgumentException;
use ReflectionException;
use Symfony\Component\Serializer\Exception\ExceptionInterface;

class GetVANDetailsApi implements ApiPaymentInterface
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
     * @return GetVANDetailsResponseDTO
     * @throws ReflectionException
     *
     * @throws GatewayErrorException
     * @throws ExceptionInterface
     */
    public function request($DTO = null): GetVANDetailsResponseDTO
    {
        if (!($DTO instanceof GetVANDetailsRequestDTO)) {
            throw new InvalidArgumentException('Argument must be instance of GetVANDetailsRequestDTO');
        }

        $this->client->prepareRequest($DTO);

        $getVAN = new GetVANDetails();
        $getVAN->setGetVANRequest($DTO);

        /** @var GetVANDetailsResponseDTO $result */
        $result = $this->client->request('GetVANDetails', $getVAN);

        return $result;
    }
}
