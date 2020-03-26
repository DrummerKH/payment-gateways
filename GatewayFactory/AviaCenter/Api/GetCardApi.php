<?php
/**
 *
 * Dmitry Hvorostyuk
 * Date: 02.03.2020
 */

namespace App\Service\GatewayFactory\AviaCenter\Api;


use App\Contracts\GatewayInterface;
use App\Exception\GatewayErrorException;
use App\Service\GatewayFactory\ApiHttpPaymentInterface;
use App\Service\GatewayFactory\AviaCenter\AviaCenterFactory;
use App\Service\GatewayFactory\AviaCenter\DTO\GetCard\GetCardRequest;
use App\Service\GatewayFactory\AviaCenter\DTO\GetCard\GetCardResponse;
use App\Traits\Helpers\ProjectSerializer;
use InvalidArgumentException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Exception\ExceptionInterface;

class GetCardApi implements ApiHttpPaymentInterface
{
    use ProjectSerializer;

    /**
     * @var AviaCenterApi
     */
    private $aviaCenterApi;

    /**
     * @var GatewayInterface
     */
    private $gateway;

    public function __construct(AviaCenterApi $aviaCenterApi, AviaCenterFactory $factory)
    {
        $this->aviaCenterApi = $aviaCenterApi;
        $this->gateway = $factory->getGateway();
    }

    /**
     * @param GetCardRequest $DTO
     * @return GetCardResponse
     * @throws GatewayErrorException
     * @throws ExceptionInterface
     */
    public function request($DTO = null): GetCardResponse
    {
        if (!($DTO instanceof GetCardRequest)) {
            throw new InvalidArgumentException(
                sprintf('Invalid argument passed to CreateCardApi. Expected %s, given %s', GetCardRequest::class, get_class($DTO))
            );
        }

        $response = $this->aviaCenterApi->request($DTO, Request::METHOD_GET, $this->gateway->getSettings()['apiHost'] . 'v1');
        return $this->serializer->denormalize($response, GetCardResponse::class);
    }
}