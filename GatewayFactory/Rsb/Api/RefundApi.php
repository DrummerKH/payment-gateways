<?php
/**
 *
 * Dmitry Hvorostyuk
 * Date: 17.09.2018.
 */

namespace App\Service\GatewayFactory\Rsb\Api;


use App\Exception\GatewayErrorException;
use App\Service\GatewayFactory\ApiPaymentInterface;
use App\Service\GatewayFactory\Rsb\DTO\Request\RefundRequestDTO;
use App\Service\GatewayFactory\Rsb\DTO\Response\RefundResponseDTO;
use App\Service\GatewayFactory\Rsb\DTO\Type\ApiCommand;
use App\Traits\Helpers\ProjectSerializer;
use InvalidArgumentException;
use Symfony\Component\Serializer\Exception\ExceptionInterface;

class RefundApi implements ApiPaymentInterface
{
    use ProjectSerializer;

    /**
     * @var RsbApi
     */
    protected $rsbApi;

    /**
     * GetStatusApi constructor.
     *
     * @param RsbApi $rsbApi
     */
    public function __construct(RsbApi $rsbApi)
    {
        $this->rsbApi = $rsbApi;
    }

    /**
     * @param $DTO
     *
     * @return mixed
     * @throws GatewayErrorException
     * @throws ExceptionInterface
     */
    public function request($DTO = null): RefundResponseDTO
    {
        if (!($DTO instanceof RefundRequestDTO)) {
            throw new InvalidArgumentException('Argument must be instance of RefundRequestDTO');
        }

        $DTO->setCommand(ApiCommand::REFUND);

        return $this->serializer->denormalize($this->rsbApi->request($DTO), RefundResponseDTO::class);
    }
}
