<?php
/**
 * Created by PhpStorm.
 * User: Drummer1
 * Date: 11.04.18
 * Time: 21:58.
 */

namespace App\Service\GatewayFactory\Acquiring\Api;

use App\Contracts\ApiHttpServiceInterface;
use App\Exception\GatewayErrorException;
use App\Service\GatewayFactory;
use App\Service\GatewayFactory\Acquiring\DTO\Request\BaseRequestDTO;
use App\Service\GatewayFactory\Acquiring\DTO\Response\BaseResponseDTO;
use App\Service\GatewayFactory\Acquiring\DTO\Types\ErrorCodeType;
use App\Service\GatewayFactory\ApiHttpPaymentInterface;
use App\Traits\Helpers\ProjectSerializer;
use InvalidArgumentException;
use Symfony\Component\Serializer\Exception\ExceptionInterface;

abstract class AcquiringApi implements ApiHttpPaymentInterface
{
    use ProjectSerializer;

    /**
     * @var ApiHttpServiceInterface
     */
    protected $client;

    /**
     * @var GatewayFactory
     */
    protected $gatewayFactory;

    /**
     * AcquiringApi constructor.
     *
     * @param ApiHttpServiceInterface $client
     * @param GatewayFactory $gatewayFactory
     */
    public function __construct(ApiHttpServiceInterface $client, GatewayFactory $gatewayFactory)
    {
        $this->client = $client;
        $this->gatewayFactory = $gatewayFactory;
    }

    /**
     * @param null $DTO
     *
     * @return array
     * @throws GatewayErrorException
     * @throws ExceptionInterface
     */
    public function request($DTO = null)
    {
        if (!($DTO instanceof BaseRequestDTO)) {
            throw new InvalidArgumentException('Argument must be instance of BaseRequestDTO');
        }

        $gateway = $this->gatewayFactory->factory();

        $DTO->setUserName($gateway->getSettings()['username']);
        $DTO->setPassword($gateway->getSettings()['password']);

        $rawResponse = \GuzzleHttp\json_decode($this->client->call(
            $this->getHttpMethod(),
            $this->getEndpoint(),
            $this->serializer->normalize($DTO)
        )->getBody()->getContents(), true);

        $baseResponseDTO = $this->serializer->denormalize($rawResponse, BaseResponseDTO::class);

        if ($baseResponseDTO->getErrorCode() && ErrorCodeType::SUCCESS !== $baseResponseDTO->getErrorCode()) {
            throw new GatewayErrorException(
                "{$gateway->getName()} API error: {$baseResponseDTO->getErrorMessage()}",
                $baseResponseDTO->getErrorCode(),
                $baseResponseDTO
            );
        }

        return $rawResponse;
    }

    /**
     * @return string
     */
    public function getHttpMethod(): string
    {
        return 'post';
    }
}
