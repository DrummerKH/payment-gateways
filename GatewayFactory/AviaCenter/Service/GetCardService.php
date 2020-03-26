<?php
/**
 *
 * Dmitry Hvorostyuk
 * Date: 02.03.2020
 */

namespace App\Service\GatewayFactory\AviaCenter\Service;


use App\Entity\CreditCard;
use App\Exception\GatewayErrorException;
use App\Request\GetCardRequest;
use App\Service\GatewayFactory\AviaCenter\Api\GetCardApi;
use App\Service\GatewayFactory\AviaCenter\DTO\EntityCardDetails;
use App\Service\GatewayFactory\AviaCenter\DTO\GetCard\GetCardRequest as GatewayCardRequest;
use App\Service\GatewayFactory\GatewayServiceInterface;
use App\Traits\GatewayAwareTrait;
use App\Traits\Helpers\ProjectObjectManager;
use App\Traits\Helpers\ProjectSerializer;
use App\Traits\TransactionSaverTrait;
use Payum\Core\GatewayAwareInterface;
use Psr\Cache\InvalidArgumentException;
use Symfony\Component\Serializer\Exception\ExceptionInterface;


class GetCardService implements GatewayServiceInterface, GatewayAwareInterface
{
    use TransactionSaverTrait;
    use ProjectSerializer;
    use ProjectObjectManager;
    use GatewayAwareTrait;

    /**
     * @var AuthService
     */
    private $authService;

    /**
     * GetCardService constructor.
     * @param GetCardApi $api
     * @param AuthService $authService
     */
    public function __construct(GetCardApi $api, AuthService $authService)
    {
        $this->api = $api;
        $this->authService = $authService;
    }

    /**
     * @param GetCardRequest $request
     * @throws ExceptionInterface
     * @throws GatewayErrorException
     * @throws InvalidArgumentException
     */
    public function execute(GetCardRequest $request)
    {
        /** @var CreditCard $creditCard */
        $creditCard = $request->getFirstModel()->creditCard;
        $billing = $creditCard->getBilling();

        /** @var EntityCardDetails $details */
        $details = $this->serializer->denormalize(
            $creditCard->getGatewayDetails(),
            EntityCardDetails::class
        );

        $cardData = $this->api->request(new GatewayCardRequest($this->authService->getSession(), $details->transaction))->data;

        $creditCard
            ->setCardTypeName('MASTERCARD')
            ->setHolder($cardData->card->getHolder()->get())
            ->setSecurityCode($cardData->card->getCvv()->get())
            ->setPan($cardData->card->getNumber()->get());

        $billing->setAmount($cardData->balance->amount);
    }
}