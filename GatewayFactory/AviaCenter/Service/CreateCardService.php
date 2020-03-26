<?php
/**
 *
 * Dmitry Hvorostyuk
 * Date: 27.02.2020
 */

namespace App\Service\GatewayFactory\AviaCenter\Service;


use App\DTO\Response\RegisterResponseDTO;
use App\Entity\Billing;
use App\Exception\GatewayErrorException;
use App\Request\GetCardRequest;
use App\Request\Model\CardModel;
use App\Request\RegisterRequest;
use App\Service\GatewayFactory\AviaCenter\Api\CreateCardApi;
use App\Service\GatewayFactory\AviaCenter\DTO\CreateCard\CreateCardRequest;
use App\Service\GatewayFactory\AviaCenter\DTO\EntityCardDetails;
use App\Service\GatewayFactory\AviaCenter\DTO\Type\CardCategory;
use App\Service\GatewayFactory\GatewayServiceInterface;
use App\Traits\GatewayAwareTrait;
use App\Traits\Helpers\ProjectObjectManager;
use App\Traits\Helpers\ProjectSerializer;
use App\Traits\TransactionSaverTrait;
use Payum\Core\GatewayAwareInterface;
use Psr\Cache\InvalidArgumentException;
use Psr\Log\LoggerInterface;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Throwable;


class CreateCardService implements GatewayServiceInterface, GatewayAwareInterface
{
    use TransactionSaverTrait;
    use ProjectObjectManager;
    use ProjectSerializer;
    use GatewayAwareTrait;

    /**
     * @var AuthService
     */
    private $authService;
    /**
     * @var GetCardService
     */
    private $getCardService;
    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * CreateCardService constructor.
     * @param CreateCardApi $api
     * @param AuthService $authService
     * @param GetCardService $getCardService
     * @param LoggerInterface $logger
     */
    public function __construct(
        CreateCardApi $api,
        AuthService $authService,
        GetCardService $getCardService,
        LoggerInterface $logger
    )
    {
        $this->api = $api;
        $this->authService = $authService;
        $this->getCardService = $getCardService;
        $this->logger = $logger;
    }

    /**
     * @param RegisterRequest $request
     * @throws ExceptionInterface
     * @throws InvalidArgumentException
     * @throws GatewayErrorException
     */
    public function execute(RegisterRequest $request)
    {
        /** @var Billing $billing */
        $billing = $request->getModel();
        $creditCard = $billing->getCreditCard();

        if ($billing->getAmount() <= 0) {
            throw new \InvalidArgumentException('Amount must be greater than 0');
        }

        $createCardRequest = new CreateCardRequest(
            $this->authService->getSession(),
            $billing->getOrderId(),
            $billing->getAmount() / 100,
            $billing->getCurrencyCode(),
            $this->gateway->getSettings()['partner'],
            $creditCard->getActivateAt(),
            $creditCard->getExpireAt(),
            CardCategory::HOTEL
        );

        $transaction = $this->api->request($createCardRequest)->data->transaction;

        $creditCard->setGatewayDetails($this->serializer->normalize(new EntityCardDetails($transaction)));
        $request->markAccepted();

        $model = new CardModel($creditCard);

        try {
            $this->gateway->execute(new GetCardRequest($model));
        } catch (Throwable $exception) {
            $this->logger->error($exception);
        }

        $request->setModel(new RegisterResponseDTO($billing));
    }
}