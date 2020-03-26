<?php
/**
 * Created by PhpStorm.
 * User: Drummer1
 * Date: 08.05.18
 * Time: 13:00.
 */

namespace App\Service\GatewayFactory\Enett\Service;

use App\DTO\Response\RegisterResponseDTO;
use App\Entity\Billing;
use App\Entity\CreditCard;
use App\Exception\GatewayErrorException;
use App\Repository\CreditCardRepository;
use App\Request\RegisterRequest;
use App\Service\Billing\BillingEntityProcessing;
use App\Service\GatewayFactory\Enett\Api\IssueVANApi;
use App\Service\GatewayFactory\Enett\DTO\Request\IssueVANRequestDTO;
use App\Service\GatewayFactory\Enett\DTO\Response\IssueVANResponseDTO;
use App\Service\GatewayFactory\Enett\DTO\Type\UserReference;
use App\Service\GatewayFactory\Enett\DTO\Type\UserReferenceCollection;
use App\Service\GatewayFactory\GatewayServiceAbstract;
use App\Traits\TransactionSaverTrait;
use DateTime;
use Exception;
use InvalidArgumentException;
use ReflectionException;
use Symfony\Component\Serializer\Exception\ExceptionInterface;

class IssueVANService extends GatewayServiceAbstract
{
    use TransactionSaverTrait;


    /**
     * @var CreditCardRepository
     */
    protected $cardRepo;

    /**
     * @var BillingEntityProcessing
     */
    protected $billingService;

    /**
     * IssueVANService constructor.
     *
     * @param IssueVANApi $api
     * @param CreditCardRepository $cardRepository
     * @param BillingEntityProcessing $billingService
     */
    public function __construct(
        IssueVANApi $api,
        CreditCardRepository $cardRepository,
        BillingEntityProcessing $billingService
    )
    {
        $this->api = $api;
        $this->cardRepo = $cardRepository;
        $this->billingService = $billingService;
    }

    /**
     * @param RegisterRequest $request
     *
     * @throws GatewayErrorException
     * @throws ReflectionException
     * @throws Exception
     * @throws ExceptionInterface
     */
    public function execute(RegisterRequest $request)
    {
        $billing = $this->billingService->getBilling();

        if ($billing->getAmount() <= 0) {
            throw new InvalidArgumentException('Amount must be greater than 0');
        }

        $requestDTO = $this->getRequestDTO($billing);

        /** @var IssueVANResponseDTO $response */
        $response = $this->api->request($requestDTO);

        $this->billingService->getBilling()->setExternalId($response->getVNettTransactionID());
        $this->updateCreditCard($billing->getCreditCard(), $response);

        $request->setModel(new RegisterResponseDTO($billing));
        $request->markAccepted();
    }

    /**
     * @param Billing $billing
     *
     * @return IssueVANRequestDTO
     */
    protected function getRequestDTO(Billing $billing): IssueVANRequestDTO
    {
        $creditCard = $billing->getCreditCard();

        $requestDTO = new IssueVANRequestDTO();
        $requestDTO->setMaximumAuthorisationAmount($billing->getAmount());
        $requestDTO->setMinimumAuthorisationAmount(0);
        $requestDTO->setCurrencyCode($billing->getCurrency()->getAlpha3());
        $requestDTO->setNotes($billing->getDescription());
        $requestDTO->setIntegratorReference($billing->getOrderId());
        $requestDTO->setExpiryDate($creditCard->getExpireAt()->format('Ymd'));
        $requestDTO->setActivationDate($creditCard->getActivateAt()->format('Ymd'));
        $requestDTO->setIsInstantAuthRequired(false);
        $requestDTO->setIsMultiUse(true);
        $requestDTO->setMerchantCategoryCode('');
        $requestDTO->setCountryCode($creditCard->getCountryCode());
        $requestDTO->setCardTypeName($this->gateway->getSettings()['cardTypeName']);
        $requestDTO->setMerchantCategoryName($this->gateway->getSettings()['merchantName']);
        $requestDTO->setMultiUseClosePercentage(100);
        $requestDTO->setUsername($this->gateway->getSettings()['username']);

        $userReference = new UserReferenceCollection();

        if ($billing->getDetails()) {
            foreach ($billing->getDetails() as $item => $value) {
                $userReference->setUserReferences(new UserReference($item, $value));
            }
            $requestDTO->setUserReferences($userReference);
        }

        return $requestDTO;
    }

    /**
     * @param CreditCard $creditCard
     * @param IssueVANResponseDTO $responseDTO
     *
     * @return CreditCard
     * @throws Exception
     */
    protected function updateCreditCard(CreditCard $creditCard, IssueVANResponseDTO $responseDTO): CreditCard
    {
        $creditCard->setCardTypeName($this->gateway->getSettings()['cardTypeName']);
        $creditCard->setExpireAt(new DateTime($responseDTO->getFullExpiryDate()));
        $creditCard->setHolder($responseDTO->getCardHolderName());
        $creditCard->setPan($responseDTO->getVirtualAccountNumber());
        $creditCard->setSecurityCode($responseDTO->getCardSecurityCode());
        $creditCard->setBilling($this->billingService->getBilling());
        $this->cardRepo->save($creditCard);

        return $creditCard;
    }
}
