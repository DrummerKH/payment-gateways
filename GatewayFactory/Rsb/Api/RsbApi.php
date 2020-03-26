<?php
/**
 *
 * Dmitry Hvorostyuk
 * Date: 08.06.18.
 */

namespace App\Service\GatewayFactory\Rsb\Api;

use App\Contracts\ApiHttpServiceInterface;
use App\Exception\GatewayErrorException;
use App\Service\Billing\BillingEntityProcessing;
use App\Service\GatewayFactory;
use App\Service\GatewayFactory\Rsb\DTO\Request\BaseRequestDTO;
use App\Service\GatewayFactory\Rsb\DTO\Response\BaseResponseDTO;
use App\Traits\Helpers\ProjectSerializer;
use GuzzleHttp\RequestOptions;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Exception\ExceptionInterface;

class RsbApi
{
    use ProjectSerializer;

    /**
     * @var GatewayFactory
     */
    protected $gatewayFactory;

    /**
     * @var ApiHttpServiceInterface
     */
    protected $apiHttpService;

    /**
     * @var BillingEntityProcessing
     */
    protected $billingProcessing;

    /**
     * RsbApi constructor.
     *
     * @param ApiHttpServiceInterface $apiHttpService
     * @param GatewayFactory $gatewayFactory
     * @param BillingEntityProcessing $billingProcessing
     */
    public function __construct(
        ApiHttpServiceInterface $apiHttpService,
        GatewayFactory $gatewayFactory,
        BillingEntityProcessing $billingProcessing
    )
    {
        $this->apiHttpService = $apiHttpService;
        $this->gatewayFactory = $gatewayFactory;
        $this->billingProcessing = $billingProcessing;
    }

    /**
     * @param BaseRequestDTO $DTO $DTO
     *
     * @return array
     * @throws ExceptionInterface
     * @throws GatewayErrorException
     */
    public function request(BaseRequestDTO $DTO = null): array
    {
        $gateway = $this->gatewayFactory->factory();
        $settings = $gateway->getSettings();

        $DTO->setServerVersion($settings['apiVersion']);
        $DTO->setClientIpAddr($this->billingProcessing->getBilling()->getClient()->getIpAddress());

        // Adding SSL options
        $options = [
            RequestOptions::SSL_KEY => $settings['sslKey'],
            RequestOptions::CERT => $settings['sslPem'],
            RequestOptions::VERIFY => $settings['sslCrt'],
        ];

        $response = $this->apiHttpService->call(
            Request::METHOD_POST,
            $settings['apiUrl'],
            $this->snakeCaseConverter()->normalize($DTO),
            [],
            [],
            $options
        );

        $responseArray = $this->parseResponse($response);
        $responseDTO = $this->serializer->denormalize($responseArray, BaseResponseDTO::class);

        if ($responseDTO->getError()) {
            throw new GatewayErrorException(
                "{$gateway->getName()} API error: {$responseDTO->getError()}",
                $responseDTO->getRESULTCODE(),
                $responseDTO
            );
        }

        return $responseArray;
    }

    /**
     * Parse response from Rus Standart Bank
     * It looks like "error: string \n field1: string \n".
     *
     * @param ResponseInterface $response
     *
     * @return array
     */
    protected function parseResponse(ResponseInterface $response): array
    {
        $content = explode(PHP_EOL, trim($response->getBody()->getContents()));

        $contentArray = [];

        foreach ($content as $field) {
            if (preg_match('/^(\w+): (.+)/i', $field, $match)) {
                $contentArray[$match[1]] = $match[2];
            }
        }

        return $contentArray;
    }
}
