<?php
/**
 *
 * Dmitry Hvorostyuk
 * Date: 03.03.2020
 */

namespace App\Service\GatewayFactory\AviaCenter\Api;


use App\Contracts\GatewayInterface;
use App\Exception\GatewayErrorException;
use App\Service\GatewayFactory\ApiHttpPaymentInterface;
use App\Service\GatewayFactory\AviaCenter\AviaCenterFactory;
use App\Service\GatewayFactory\AviaCenter\DTO\DetailsCard\DetailsRequest;
use App\Service\GatewayFactory\AviaCenter\DTO\DetailsCard\DetailsResponse;
use App\Service\GatewayFactory\AviaCenter\DTO\GetCard\GetCardRequest;
use App\Traits\Helpers\ProjectSerializer;
use InvalidArgumentException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Exception\ExceptionInterface;

class DetailsCardApi implements ApiHttpPaymentInterface
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
     * @return DetailsResponse
     * @throws GatewayErrorException
     * @throws ExceptionInterface
     */
    public function request($DTO = null): DetailsResponse
    {
        if (!($DTO instanceof DetailsRequest)) {
            throw new InvalidArgumentException(
                sprintf('Invalid argument passed to CreateCardApi. Expected %s, given %s', DetailsRequest::class, get_class($DTO))
            );
        }

        $response = $this->aviaCenterApi->request($DTO, Request::METHOD_GET, $this->gateway->getSettings()['apiHost'] . 'v1/details');

        return $this->serializer->denormalize($response, DetailsResponse::class);
    }
}