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
use App\Service\GatewayFactory\AviaCenter\DTO\Auth\AuthRequestDTO;
use App\Service\GatewayFactory\AviaCenter\DTO\Auth\AuthResponseDTO;
use App\Traits\Helpers\ProjectSerializer;
use GuzzleHttp\Exception\BadResponseException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Exception\ExceptionInterface;

class AuthApi implements ApiHttpPaymentInterface
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

    /**
     * AuthApi constructor.
     * @param AviaCenterApi $aviaCenterApi
     * @param AviaCenterFactory $factory
     */
    public function __construct(AviaCenterApi $aviaCenterApi, AviaCenterFactory $factory)
    {
        $this->aviaCenterApi = $aviaCenterApi;
        $this->gateway = $factory->getGateway();
    }

    /**
     * @param $DTO
     *
     * @return AuthResponseDTO
     *
     * @throws BadResponseException
     * @throws ExceptionInterface
     * @throws GatewayErrorException
     */
    public function request($DTO = null): AuthResponseDTO
    {
        $settings = $this->gateway->getSettings();

        $requestDTO = new AuthRequestDTO($settings['login'], $settings['password']);
        $response = $this->aviaCenterApi->request($requestDTO, Request::METHOD_POST, $settings['apiHost'] . 'auth');

        return $this->serializer->denormalize($response, AuthResponseDTO::class);
    }
}