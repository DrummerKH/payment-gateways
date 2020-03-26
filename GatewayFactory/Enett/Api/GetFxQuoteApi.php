<?php
/**
 *
 * Dmitry Hvorostyuk
 * Date: 03.07.18.
 */

namespace App\Service\GatewayFactory\Enett\Api;


use App\Exception\GatewayErrorException;
use App\Service\GatewayFactory\ApiPaymentInterface;
use App\Service\GatewayFactory\Enett\DTO\GetFxQuote;
use App\Service\GatewayFactory\Enett\DTO\Request\GetFxQuoteRequestDTO;
use App\Service\GatewayFactory\Enett\DTO\Response\GetFxQuoteResponseDTO;
use InvalidArgumentException;
use ReflectionException;
use Symfony\Component\Serializer\Exception\ExceptionInterface;

class GetFxQuoteApi implements ApiPaymentInterface
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
     * @return GetFxQuoteResponseDTO
     * @throws ReflectionException
     *
     * @throws GatewayErrorException
     * @throws ExceptionInterface
     */
    public function request($DTO = null): GetFxQuoteResponseDTO
    {
        if (!($DTO instanceof GetFxQuoteRequestDTO)) {
            throw new InvalidArgumentException('Argument must be instance of GetFxQuoteRequestDTO');
        }

        $this->client->prepareRequest($DTO);

        $getFX = new GetFxQuote();
        $getFX->setGetVNettFxQuoteRequest($DTO);

        /** @var GetFxQuoteResponseDTO $result */
        $result = $this->client->request('GetFxQuote', $getFX);

        return $result;
    }
}
