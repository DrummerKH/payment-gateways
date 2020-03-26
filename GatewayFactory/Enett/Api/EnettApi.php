<?php
/**
 * Created by PhpStorm.
 * User: Drummer1
 * Date: 07.05.18
 * Time: 16:37.
 */

namespace App\Service\GatewayFactory\Enett\Api;

use App\Exception\GatewayErrorException;
use App\Service\GatewayFactory;
use App\Service\GatewayFactory\Enett\DTO\Request\BaseDTO;
use App\Service\GatewayFactory\Enett\DTO\Response\BaseResponseDTO;
use Phpro\SoapClient\Client;
use Phpro\SoapClient\Type\RequestInterface;
use ReflectionException;
use SoapClient;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Serializer\Exception\ExceptionInterface;

class EnettApi extends Client
{
    /**
     * @var array
     */
    protected $gatewayFactory;

    /**
     * @var DigestCalculator
     */
    protected $digestCalculator;

    /**
     * @var SoapClient
     */
    protected $client;

    /**
     * BaseApi constructor.
     *
     * @param GatewayFactory $gatewayFactory
     * @param DigestCalculator $digestCalculator
     * @param SoapClient $soapClient
     * @param EventDispatcherInterface $eventDispatcher
     */
    public function __construct(
        SoapClient $soapClient,
        EventDispatcherInterface $eventDispatcher,
        GatewayFactory $gatewayFactory,
        DigestCalculator $digestCalculator
    )
    {
        parent::__construct($soapClient, $eventDispatcher);
        $this->gatewayFactory = $gatewayFactory;
        $this->digestCalculator = $digestCalculator;
    }

    /**
     * @param string $method
     * @param RequestInterface $request
     *
     * @return BaseResponseDTO
     * @throws GatewayErrorException
     *
     */
    public function request(string $method, RequestInterface $request)
    {
        /** @var BaseResponseDTO $baseResponse */
        $baseResponse = $this->call($method, $request);

        if (!$baseResponse->isSuccessful()) {
            throw new GatewayErrorException(
                $baseResponse->getErrorDescription(),
                $baseResponse->getErrorCode(),
                $baseResponse
            );
        }

        return $baseResponse;
    }

    /**
     * @param $DTO
     *
     * @return BaseDTO
     * @throws ReflectionException
     * @throws ExceptionInterface
     */
    public function prepareRequest($DTO)
    {
        $settings = $this->gatewayFactory->factory()->getSettings();

        /* @var $DTO BaseDTO */
        $DTO->setIntegratorCode($settings['integratorCode']);
        $DTO->setIntegratorAccessKey($settings['integratorAccessKey']);
        $DTO->setIssuedToEcn($settings['ecn']);
        $DTO->setRequesterEcn($settings['ecn']);
        $DTO->setMessageDigest($this->digestCalculator->calculateDigest(
            $DTO,
            $settings['clientAccessKey']
        ));

        return $DTO;
    }
}
