<?php
/**
 * Created by PhpStorm.
 * User: Drummer1
 * Date: 26.04.18
 * Time: 14:41.
 */

namespace App\Service\GatewayFactory\Paymaster\Api;

use App\Contracts\ApiHttpServiceInterface;
use App\Exception\GatewayErrorException;
use App\Service\GatewayFactory;
use App\Service\GatewayFactory\Paymaster\DTO\Request\RestRequestDTO;
use App\Service\GatewayFactory\Paymaster\DTO\Response\ResponseDTO;
use App\Service\GatewayFactory\Paymaster\DTO\Types\ErrorCodeType;
use App\Traits\Helpers\ProjectSerializer;
use ReflectionException;
use stdClass;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Exception\ExceptionInterface;

class PaymasterApi
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
     * @var HashCalculator
     */
    protected $calculator;

    /**
     * PaymasterApi constructor.
     *
     * @param ApiHttpServiceInterface $client
     * @param GatewayFactory $gatewayFactory
     * @param HashCalculator $calculator
     */
    public function __construct(
        ApiHttpServiceInterface $client,
        GatewayFactory $gatewayFactory,
        HashCalculator $calculator
    )
    {
        $this->client = $client;
        $this->gatewayFactory = $gatewayFactory;
        $this->calculator = $calculator;
    }

    /**
     * @param RestRequestDTO $DTO $DTO
     * @param string $endPoint
     *
     * @return stdClass|null
     * @throws GatewayErrorException
     * @throws ReflectionException
     * @throws ExceptionInterface
     */
    public function request(RestRequestDTO $DTO, string $endPoint)
    {
        $settings = $this->gatewayFactory->factory()->getSettings();

        $DTO->setLogin($settings['apiLogin']);
        $DTO->setNonce(uniqid(time(), true));
        $DTO->setHash($this->calculator->calculateHash($DTO, $settings['apiPassword']));
        $DTO->setJson(1);

        /** @var ResponseDTO $responseDTO */
        $responseDTO = $this->serializer->deserialize(
            $this->client->call(Request::METHOD_POST, $endPoint, $this->serializer->normalize($DTO))
                ->getBody()
                ->getContents(),
            ResponseDTO::class,
            'json'
        );

        if (ErrorCodeType::SUCCESS !== $responseDTO->getErrorCode()) {
            throw new GatewayErrorException('Paymaster API error', $responseDTO->getErrorCode(), $responseDTO);
        }

        return $responseDTO->getPayment();
    }
}
