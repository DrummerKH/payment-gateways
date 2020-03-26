<?php
/**
 *
 * Dmitry Hvorostyuk
 * Date: 08.06.18.
 */

namespace App\Service\GatewayFactory\Rsb\Api;


use App\Exception\GatewayErrorException;
use App\Service\GatewayFactory\ApiPaymentInterface;
use App\Service\GatewayFactory\Rsb\DTO\Request\RegisterRequestDTO;
use App\Service\GatewayFactory\Rsb\DTO\Response\RegisterResponseDTO;
use App\Service\GatewayFactory\Rsb\DTO\Type\ApiCommand;
use App\Traits\Helpers\ProjectSerializer;
use InvalidArgumentException;
use Symfony\Component\Serializer\Exception\ExceptionInterface;

class RegisterApi implements ApiPaymentInterface
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
     * @return RegisterResponseDTO
     * @throws GatewayErrorException
     * @throws ExceptionInterface
     */
    public function request($DTO = null): RegisterResponseDTO
    {
        if (!($DTO instanceof RegisterRequestDTO)) {
            throw new InvalidArgumentException('Argument must be instance of RegisterRequestDTO');
        }

        $DTO->setCommand(ApiCommand::REGISTER);

        return $this->serializer->denormalize($this->rsbApi->request($DTO), RegisterResponseDTO::class);
    }
}
