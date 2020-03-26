<?php
/**
 * Created by PhpStorm.
 * User: Drummer1
 * Date: 19.04.18
 * Time: 15:47.
 */

namespace App\Service\GatewayFactory\Acquiring\Service;

use App\DBAL\Types\BillingTokenType;
use App\DTO\Response\RegisterResponseDTO;
use App\Exception\GatewayErrorException;
use App\Request\RegisterRequest;
use App\Service\Billing\BillingEntityProcessing;
use App\Service\GatewayFactory\Acquiring\Api\RegisterPreAuthRequestApi;
use App\Service\GatewayFactory\Acquiring\DTO\Request\RegisterRequestDTO;
use App\Service\GatewayFactory\GatewayServiceAbstract;
use App\Traits\TokenFactoryAware;
use App\Traits\TransactionSaverTrait;
use InvalidArgumentException;
use Payum\Core\Payum;
use Payum\Core\Storage\StorageInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Serializer\Exception\ExceptionInterface;

class RegisterService extends GatewayServiceAbstract
{
    use TokenFactoryAware, TransactionSaverTrait;

    /**
     * @var RegisterPreAuthRequestApi
     */
    protected $api;

    /**
     * @var Payum
     */
    protected $container;

    /**
     * @var BillingEntityProcessing
     */
    protected $billingService;

    /**
     * RegisterService constructor.
     *
     * @param RegisterPreAuthRequestApi $api
     * @param ContainerInterface $container
     * @param BillingEntityProcessing $billingService
     */
    public function __construct(
        RegisterPreAuthRequestApi $api,
        ContainerInterface $container,
        BillingEntityProcessing $billingService
    )
    {
        $this->api = $api;
        $this->billingService = $billingService;
        $this->container = $container;
    }

    /**
     * @param RegisterRequest $request
     *
     * @return void
     *
     * @throws ExceptionInterface
     * @throws GatewayErrorException
     */
    public function execute(RegisterRequest $request)
    {
        $billing = $this->billingService->getBilling();

        if ($billing->getAmount() <= 0) {
            throw new InvalidArgumentException('Amount must be greater than 0');
        }

        $payum = $this->container->get('payum');
        $this->awareTokenFactory($payum);

        $details = $billing->getDetails();
        $details['billingId'] = $billing->getId();

        $requestDTO = new RegisterRequestDTO();
        $requestDTO->setJsonParams($details ? json_encode($details) : null);

        // Не отсылаем валюту так как в альфабаннке есть баг. Они ссылаются на ISO 4217
        // а сами используют устаревшее наименование рублей - RUR. Но в сбербанке нет такой валюты (и это правильно)
        // Однако есть хак - в обеих системах, если не посылать валюту то по умолчанию используются рубли
        // что мы и используем тут
        if ('RUB' !== $billing->getCurrency()->getAlpha3()) {
            $requestDTO->setCurrency($billing->getCurrency()->getNumeric());
        }

        $requestDTO->setAmount($billing->getAmount());
        $requestDTO->setOrderNumber($billing->getOrderId());
        $requestDTO->setDescription($billing->getDescription());

        // Create token for gateway callback register
        $token = $this->createToken(BillingTokenType::HOLD, $billing, 'callback.register');
        $requestDTO->setReturnUrl($token->getTargetUrl());

        try {
            $responseDTO = $this->api->request($requestDTO);
        } catch (GatewayErrorException $exception) {
            /** @var StorageInterface $tokenStorage */
            $tokenStorage = $this->payum->getTokenStorage();
            $tokenStorage->delete($token);

            $request->markFailed();

            throw GatewayErrorException::createFromInstance($exception);
        }

        $billing->setExternalId($responseDTO->getOrderId());
        $request->markAccepted();

        $request->setModel(new RegisterResponseDTO($billing, $responseDTO->getFormUrl()));
    }
}
