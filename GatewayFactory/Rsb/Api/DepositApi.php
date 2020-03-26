<?php
/**
 *
 * Dmitry Hvorostyuk
 * Date: 09.06.18.
 */

namespace App\Service\GatewayFactory\Rsb\Api;


use App\Exception\GatewayErrorException;
use App\Service\GatewayFactory\ApiPaymentInterface;
use App\Service\GatewayFactory\Rsb\DTO\Request\DepositRequestDTO;
use App\Service\GatewayFactory\Rsb\DTO\Response\DepositResponseDTO;
use App\Service\GatewayFactory\Rsb\DTO\Type\ApiCommand;
use App\Traits\Helpers\ProjectSerializer;
use InvalidArgumentException;
use Symfony\Component\Serializer\Exception\ExceptionInterface;

class DepositApi implements ApiPaymentInterface
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
     * @return DepositResponseDTO
     * @throws GatewayErrorException
     * @throws ExceptionInterface
     */
    public function request($DTO = null): DepositResponseDTO
    {
        if (!($DTO instanceof DepositRequestDTO)) {
            throw new InvalidArgumentException('Argument must be instance of DepositRequestDTO');
        }

        $DTO->setCommand(ApiCommand::DEPOSIT);

        return $this->serializer->denormalize($this->rsbApi->request($DTO), DepositResponseDTO::class);
    }
}
