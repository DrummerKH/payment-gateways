<?php
/**
 *
 * Dmitry Hvorostyuk
 * Date: 27.02.2020
 */

namespace App\Service\GatewayFactory\AviaCenter\Api;


use App\Contracts\GatewayInterface;
use App\Exception\GatewayErrorException;
use App\Service\GatewayFactory\ApiHttpPaymentInterface;
use App\Service\GatewayFactory\AviaCenter\AviaCenterFactory;
use App\Service\GatewayFactory\AviaCenter\DTO\CreateCard\CreateCardRequest;
use App\Service\GatewayFactory\AviaCenter\DTO\CreateCard\CreateCardResponse;
use App\Traits\Helpers\ProjectSerializer;
use InvalidArgumentException;
use Psr\Container\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Exception\ExceptionInterface;

class CreateCardApi implements ApiHttpPaymentInterface
{
    use ProjectSerializer;

    /**
     * @var AviaCenterApi
     */
    private $aviaCenterApi;
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * @var GatewayInterface
     */
    private $gateway;

    /**
     * CreateCardApi constructor.
     * @param AviaCenterApi $aviaCenterApi
     * @param AviaCenterFactory $factory
     */
    public function __construct(AviaCenterApi $aviaCenterApi, AviaCenterFactory $factory)
    {
        $this->aviaCenterApi = $aviaCenterApi;
        $this->gateway = $factory->getGateway();
    }


    /**
     * @param CreateCardRequest $DTO
     * @return CreateCardResponse
     * @throws GatewayErrorException
     * @throws ExceptionInterface
     */
    public function request($DTO = null): CreateCardResponse
    {
        if (!($DTO instanceof CreateCardRequest)) {
            throw new InvalidArgumentException(
                sprintf('Invalid argument passed to CreateCardApi. Expected %s, given %s', CreateCardRequest::class, get_class($DTO))
            );
        }

        $response = $this->aviaCenterApi->request($DTO, Request::METHOD_POST, $this->gateway->getSettings()['apiHost'] . 'v1/create');

        return $this->serializer->denormalize($response, CreateCardResponse::class);
    }
}