<?php
/**
 * Created by PhpStorm.
 * User: Drummer1
 * Date: 07.05.18
 * Time: 16:27.
 */

namespace App\Service\GatewayFactory\Enett\Api;


use App\Exception\GatewayErrorException;
use App\Service\GatewayFactory\ApiPaymentInterface;
use App\Service\GatewayFactory\Enett\DTO\IssueVAN;
use App\Service\GatewayFactory\Enett\DTO\Request\IssueVANRequestDTO;
use App\Service\GatewayFactory\Enett\DTO\Response\IssueVANResponseDTO;
use InvalidArgumentException;
use ReflectionException;
use Symfony\Component\Serializer\Exception\ExceptionInterface;

class IssueVANApi implements ApiPaymentInterface
{
    /**
     * @var EnettApi
     */
    protected $client;

    /**
     * AmendVANApi constructor.
     *
     * @param EnettApi $client
     */
    public function __construct(EnettApi $client)
    {
        $this->client = $client;
    }

    /**
     * @param $DTO
     *
     * @return IssueVANResponseDTO
     * @throws ReflectionException
     *
     * @throws GatewayErrorException
     * @throws ExceptionInterface
     */
    public function request($DTO = null): IssueVANResponseDTO
    {
        if (!($DTO instanceof IssueVANRequestDTO)) {
            throw new InvalidArgumentException('Argument must be instance of IssueVANRequestDTO');
        }

        $this->client->prepareRequest($DTO);

        $issueVAN = new IssueVAN();
        $issueVAN->setIssueVANRequest($DTO);

        /** @var IssueVANResponseDTO $result */
        $result = $this->client->request('IssueVAN', $issueVAN);

        return $result;
    }
}
