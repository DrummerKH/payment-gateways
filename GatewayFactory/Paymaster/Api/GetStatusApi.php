<?php
/**
 * Created by PhpStorm.
 * User: Drummer1
 * Date: 26.04.18
 * Time: 14:35.
 */

namespace App\Service\GatewayFactory\Paymaster\Api;


use App\Exception\GatewayErrorException;
use App\Service\GatewayFactory;
use App\Service\GatewayFactory\ApiPaymentInterface;
use App\Service\GatewayFactory\Paymaster\DTO\Request\GetStatusRequestDTO;
use App\Service\GatewayFactory\Paymaster\DTO\Response\GetStatusResponseDTO;
use App\Traits\Helpers\ProjectSerializer;
use InvalidArgumentException;
use ReflectionException;
use Symfony\Component\Serializer\Exception\ExceptionInterface;

class GetStatusApi implements ApiPaymentInterface
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
     * @return GetStatusResponseDTO
     * @throws GatewayErrorException
     * @throws ReflectionException
     * @throws ExceptionInterface
     */
    public function request($DTO = null): GetStatusResponseDTO
    {
        if (!($DTO instanceof GetStatusRequestDTO)) {
            throw new InvalidArgumentException('Argument must be instance of GetStatusRequestDTO');
        }

        $response = $this->paymasterApi->request(
            $DTO,
            $this->gatewayFactory->factory()->getSettings()['apiUrl'] . '/getPaymentByInvoiceID'
        );

        return $this->serializer->denormalize($response, GetStatusResponseDTO::class);
    }
}
