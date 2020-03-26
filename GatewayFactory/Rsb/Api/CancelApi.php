<?php
/**
 *
 * Dmitry Hvorostyuk
 * Date: 17.09.2018.
 */

namespace App\Service\GatewayFactory\Rsb\Api;


use App\Exception\GatewayErrorException;
use App\Service\GatewayFactory\ApiPaymentInterface;
use App\Service\GatewayFactory\Rsb\DTO\Request\CancelRequestDTO;
use App\Service\GatewayFactory\Rsb\DTO\Response\CancelResponseDTO;
use App\Service\GatewayFactory\Rsb\DTO\Type\ApiCommand;
use App\Traits\Helpers\ProjectSerializer;
use InvalidArgumentException;
use Symfony\Component\Serializer\Exception\ExceptionInterface;

class CancelApi implements ApiPaymentInterface
{
    use ProjectSerializer;

    protected $rsbApi;

    public function __construct(RsbApi $api)
    {
        $this->rsbApi = $api;
    }

    /**
     * @param $DTO
     *
     * @return mixed
     * @throws GatewayErrorException
     * @throws ExceptionInterface
     */
    public function request($DTO = null): CancelResponseDTO
    {
        if (!($DTO instanceof CancelRequestDTO)) {
            throw new InvalidArgumentException('Argument must be instance of CancelRequestDTO');
        }

        $DTO->setCommand(ApiCommand::CANCEL);

        return $this->serializer->denormalize($this->rsbApi->request($DTO), CancelResponseDTO::class);
    }
}
