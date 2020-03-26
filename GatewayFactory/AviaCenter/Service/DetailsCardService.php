<?php
/**
 *
 * Dmitry Hvorostyuk
 * Date: 03.03.2020
 */

namespace App\Service\GatewayFactory\AviaCenter\Service;


use App\Entity\CreditCard;
use App\Exception\GatewayErrorException;
use App\Request\GetCardDetailsRequest;
use App\Service\GatewayFactory\AviaCenter\Api\DetailsCardApi;
use App\Service\GatewayFactory\AviaCenter\DTO\DetailsCard\DetailsRequest;
use App\Service\GatewayFactory\AviaCenter\DTO\EntityCardDetails;
use App\Service\GatewayFactory\GatewayServiceInterface;
use App\Traits\GatewayAwareTrait;
use App\Traits\Helpers\ProjectObjectManager;
use App\Traits\Helpers\ProjectSerializer;
use App\Traits\TransactionSaverTrait;
use Payum\Core\GatewayAwareInterface;
use Psr\Cache\InvalidArgumentException;
use Symfony\Component\Serializer\Exception\ExceptionInterface;

class DetailsCardService implements GatewayServiceInterface, GatewayAwareInterface
{
    use TransactionSaverTrait;
    use ProjectSerializer;
    use ProjectObjectManager;
    use GatewayAwareTrait;

    /**
     * @var AuthService
     */
    private $authService;

    public function __construct(DetailsCardApi $api, AuthService $authService)
    {
        $this->api = $api;
        $this->authService = $authService;
    }

    /**
     * @param GetCardDetailsRequest $request
     * @throws GatewayErrorException
     * @throws InvalidArgumentException
     * @throws ExceptionInterface
     */
    public function execute(GetCardDetailsRequest $request)
    {
        /** @var CreditCard $creditCard */
        $creditCard = $request->getFirstModel()->creditCard;
        $arrayDetails = $creditCard->getGatewayDetails();

        if (empty($arrayDetails)) {
            throw new \InvalidArgumentException(sprintf('Credit card does not have necessary data. Exists data: %s', \GuzzleHttp\json_encode($arrayDetails)));
        }

        /** @var EntityCardDetails $details */
        $details = $this->serializer->denormalize(
            $arrayDetails,
            EntityCardDetails::class
        );

        $this->api->request(new DetailsRequest($this->authService->getSession(), $details->transaction));

        $request->markAccepted();
    }
}