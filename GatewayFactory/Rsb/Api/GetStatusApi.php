<?php
/**
 *
 * Dmitry Hvorostyuk
 * Date: 09.06.18.
 */

namespace App\Service\GatewayFactory\Rsb\Api;


use App\Exception\GatewayErrorException;
use App\Service\GatewayFactory\ApiPaymentInterface;
use App\Service\GatewayFactory\Rsb\DTO\Request\GetStatusRequestDTO;
use App\Service\GatewayFactory\Rsb\DTO\Response\GetStatusResponseDTO;
use App\Service\GatewayFactory\Rsb\DTO\Type\ApiCommand;
use App\Traits\Helpers\ProjectSerializer;
use InvalidArgumentException;
use Symfony\Component\Serializer\Exception\ExceptionInterface;

class GetStatusApi implements ApiPaymentInterface
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
     * @return GetStatusResponseDTO
     * @throws GatewayErrorException
     * @throws ExceptionInterface
     */
    public function request($DTO = null): GetStatusResponseDTO
    {
        if (!($DTO instanceof GetStatusRequestDTO)) {
            throw new InvalidArgumentException('Argument must be instance of GetStatusRequestDTO');
        }

        $DTO->setCommand(ApiCommand::STATUS);

        return $this->serializer->denormalize($this->rsbApi->request($DTO), GetStatusResponseDTO::class);
    }
}
