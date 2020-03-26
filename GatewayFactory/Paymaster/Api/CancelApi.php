<?php
/**
 * Created by PhpStorm.
 * User: Drummer1
 * Date: 16.05.18
 * Time: 11:59.
 */

namespace App\Service\GatewayFactory\Paymaster\Api;


use App\Exception\GatewayErrorException;
use App\Service\GatewayFactory;
use App\Service\GatewayFactory\ApiPaymentInterface;
use App\Service\GatewayFactory\Paymaster\DTO\Request\CancelRequestDTO;
use App\Service\GatewayFactory\Paymaster\DTO\Response\CancelResponseDTO;
use App\Traits\Helpers\ProjectSerializer;
use InvalidArgumentException;
use ReflectionException;
use Symfony\Component\Serializer\Exception\ExceptionInterface;

class CancelApi implements ApiPaymentInterface
{
    use ProjectSerializer;

    /**
     * @var PaymasterApi
     */
    protected $paymasterApi;

    /**
     * @var GatewayFactory
     */
    protected $gatewayFactory;

    /**
     * GetStatusApi constructor.
     *
     * @param PaymasterApi $paymasterApi
     * @param GatewayFactory $gatewayFactory
     */
    public function __construct(PaymasterApi $paymasterApi, GatewayFactory $gatewayFactory)
    {
        $this->paymasterApi = $paymasterApi;
        $this->gatewayFactory = $gatewayFactory;
    }

    /**
     * @param $DTO
     *
     * @return CancelResponseDTO
     * @throws ReflectionException
     * @throws ExceptionInterface
     * @throws GatewayErrorException
     */
    public function request($DTO = null): CancelResponseDTO
    {
        if (!($DTO instanceof CancelRequestDTO)) {
            throw new InvalidArgumentException('Argument must be instance of CancelRequestDTO');
        }

        $response = $this->paymasterApi->request(
            $DTO,
            $this->gatewayFactory->factory()->getSettings()['apiUrl'] . '/CancelPayment'
        );

        return $this->serializer->denormalize($response, CancelResponseDTO::class);
    }
}
