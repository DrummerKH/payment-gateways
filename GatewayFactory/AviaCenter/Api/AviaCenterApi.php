<?php
/**
 *
 * Dmitry Hvorostyuk
 * Date: 27.02.2020
 */

namespace App\Service\GatewayFactory\AviaCenter\Api;


use App\Contracts\ApiHttpServiceInterface;
use App\Contracts\GatewayInterface;
use App\Exception\GatewayErrorException;
use App\Service\GatewayFactory\AviaCenter\AviaCenterFactory;
use App\Service\GatewayFactory\AviaCenter\DTO\BaseRequestWithAuth;
use App\Service\GatewayFactory\AviaCenter\DTO\BaseResponseDTO;
use App\Traits\Helpers\ProjectSerializer;
use GuzzleHttp\Exception\BadResponseException;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Exception\ExceptionInterface;

class AviaCenterApi
{
    use ProjectSerializer;
    /**
     * @var ApiHttpServiceInterface
     */
    private $httpService;
    /**
     * @var GatewayInterface
     */
    private $gateway;

    public function __construct(ApiHttpServiceInterface $httpService, AviaCenterFactory $factory)
    {
        $this->httpService = $httpService;
        $this->gateway = $factory->getGateway();
    }

    /**
     * @param object $DTO
     * @param string $httpMethod
     * @param string $endpoint
     * @return array
     * @throws ExceptionInterface
     * @throws GatewayErrorException
     */
    public function request($DTO, string $httpMethod, string $endpoint): array
    {
        $headers = [
            'Content-type' => 'application/json'
        ];
        if ($DTO instanceof BaseRequestWithAuth) {
            $headers['Authorization'] = "Bearer $DTO->session";
        }

        try {
            $data = $this->serializer->normalize($DTO);
            $response = $this->httpService->call(
                $httpMethod,
                $endpoint,
                $httpMethod == Request::METHOD_GET ? $data : [],
                $httpMethod === Request::METHOD_POST ? $data : [],
                $headers,
                []//['proxy' => ['https' => 'socks5://docker.for.mac.localhost:8082']] //@todo remove before commit
            );
        } catch (BadResponseException $exception) {
            $response = $exception->getResponse();
        }

        return $this->handleResponse($response);
    }

    /**
     * @param ResponseInterface $response
     * @return array|mixed
     * @throws ExceptionInterface
     * @throws GatewayErrorException
     */
    private function handleResponse(ResponseInterface $response)
    {
        $rawResponse = $response->getBody()->getContents();
        $arrayResponse = [];

        $headerValue = $response->getHeader('Content-type')[0] ?? null;

        if ($headerValue === 'application/json') {
            $arrayResponse = \GuzzleHttp\json_decode($rawResponse, true);
            $response = $this->serializer->denormalize($arrayResponse, BaseResponseDTO::class);

            if (true !== $response->success) {
                $errorResponse = \GuzzleHttp\json_encode($response->data);
            }
        } else {
            $errorResponse = $rawResponse;
        }

        if (isset($errorResponse)) {
            throw new GatewayErrorException(
                "{$this->gateway->getName()} API error: " . $errorResponse,
                isset($exception) ? $exception->getCode() : null,
                $response
            );
        }

        return $arrayResponse;
    }
}