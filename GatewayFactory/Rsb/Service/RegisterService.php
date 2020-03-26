<?php
/**
 *
 * Dmitry Hvorostyuk
 * Date: 08.06.18.
 */

namespace App\Service\GatewayFactory\Rsb\Service;

use App\DBAL\Types\BillingStatusType;
use App\DBAL\Types\BillingTokenType;
use App\DTO\Response\RegisterResponseDTO as BaseRegisterResponseDTO;
use App\Exception\GatewayErrorException;
use App\Request\RegisterRequest;
use App\Service\Billing\BillingEntityProcessing;
use App\Service\GatewayFactory\GatewayServiceAbstract;
use App\Service\GatewayFactory\Rsb\Api\RegisterApi;
use App\Service\GatewayFactory\Rsb\DTO\Request\RegisterRequestDTO;
use App\Service\GatewayFactory\Rsb\DTO\Response\RegisterResponseDTO;
use App\Traits\TokenFactoryAware;
use App\Traits\TransactionSaverTrait;
use InvalidArgumentException;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Serializer\Exception\ExceptionInterface;

class RegisterService extends GatewayServiceAbstract
{
    use TransactionSaverTrait, TokenFactoryAware;

    /**
     * @var BillingEntityProcessing
     */
    protected $billingService;

    protected $container;

    /**
     * RegisterService constructor.
     *
     * @param BillingEntityProcessing $billingService
     * @param RegisterApi $api
     * @param ContainerInterface $container
     */
    public function __construct(
        BillingEntityProcessing $billingService,
        RegisterApi $api,
        ContainerInterface $container
    )
    {
        $this->billingService = $billingService;
        $this->api = $api;
        $this->container = $container;
    }

    /**
     * @param RegisterRequest $request
     *
     * @throws GatewayErrorException
     * @throws ExceptionInterface
     */
    public function execute(RegisterRequest $request)
    {
        $billing = $this->billingService->getBilling();

        if ($billing->getAmount() <= 0) {
            throw new InvalidArgumentException('Amount must be greater than 0');
        }

        $this->awareTokenFactory($this->container->get('payum'));

        $DTO = new RegisterRequestDTO();
        $DTO->setDescription($billing->getDescription());
        $DTO->setAmount($billing->getAmount());
        $DTO->setCurrency($billing->getCurrency()->getNumeric());
        $DTO->setMrchTransactionId($billing->getId());

        try {
            /** @var RegisterResponseDTO $responseDTO */
            $responseDTO = $this->api->request($DTO);
        } catch (GatewayErrorException $exception) {
            $billing->setStatus(BillingStatusType::FAILED);
            $this->billingService->save();

            throw new GatewayErrorException($exception->getMessage(), null, $exception->getResponseDTO(), $exception);
        }

        $this->createToken(BillingTokenType::HOLD, $billing, 'callback.register.rsb');
        $billing->setExternalId($responseDTO->getTRANSACTIONID());

        $request->setModel(new BaseRegisterResponseDTO($billing, $this->gateway->getSettings()['clientUrl'] . urlencode($responseDTO->getTRANSACTIONID())));
        $request->markAccepted();
    }
}
