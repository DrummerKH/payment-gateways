<?php
/**
 * Created by PhpStorm.
 * User: Drummer1
 * Date: 24.04.18
 * Time: 12:10.
 */

namespace App\Service\GatewayFactory\Paymaster\Service;

use App\DBAL\Types\BillingTokenType;
use App\DTO\Response\RegisterResponseDTO;
use App\Helper\FloatFormatHelper;
use App\Request\RegisterRequest;
use App\Service\Billing\BillingEntityProcessing;
use App\Service\GatewayFactory\GatewayServiceAbstract;
use App\Service\GatewayFactory\Paymaster\DTO\Request\RegisterRequestDTO;
use App\Service\GatewayFactory\Paymaster\DTO\Types\BillingDetails;
use App\Traits\Helpers\ProjectSerializer;
use App\Traits\TokenFactoryAware;
use InvalidArgumentException;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Serializer\Exception\ExceptionInterface;

class RegisterService extends GatewayServiceAbstract
{
    use TokenFactoryAware;
    use ProjectSerializer;

    /**
     * @var ContainerInterface
     */
    protected $container;

    /**
     * @var BillingEntityProcessing
     */
    protected $billingService;

    /**
     * RegisterService constructor.
     *
     * @param ContainerInterface $container
     * @param BillingEntityProcessing $billingService
     */
    public function __construct(
        ContainerInterface $container,
        BillingEntityProcessing $billingService
    )
    {
        $this->container = $container;
        $this->billingService = $billingService;
    }

    /**
     * @param RegisterRequest $request
     * @throws ExceptionInterface
     */
    public function execute(RegisterRequest $request)
    {
        $billing = $this->billingService->getBilling();

        if ($billing->getAmount() <= 0) {
            throw new InvalidArgumentException('Amount must be greater than 0');
        }

        $details = $this->serializer->denormalize($billing->getDetails(), BillingDetails::class);

        $defSettings = $this->gateway->getSettings();
        $details->setMerchantId($details->getMerchantId() ?? $defSettings['merchantId']);
        $details->setPaymentMethod($details->getPaymentMethod() ?? $defSettings['paymentMethod']);

        $this->awareTokenFactory($this->container->get('payum'));

        $paymasterRegisterDTO = new RegisterRequestDTO();
        $paymasterRegisterDTO->setLmiCurrency($billing->getCurrency()->getAlpha3());
        $paymasterRegisterDTO->setLmiPaymentAmount(FloatFormatHelper::format($billing->getAmount() / 100));
        $paymasterRegisterDTO->setLmiPaymentNo($billing->getId());
        $paymasterRegisterDTO->setLmiPaymentDescBase64(base64_encode(substr($billing->getDescription(), 0, 255)));
        $paymasterRegisterDTO->setLmiMerchantId($details->getMerchantId());
        $paymasterRegisterDTO->setLmiPaymentMethod($details->getPaymentMethod());
        $paymasterRegisterDTO->setLmiSimMode($this->gateway->getSettings()['simMode']);

        $paymasterRegisterDTO->setLmiInvoiceConfirmationUrl($this->createToken(
            BillingTokenType::ACCEPT,
            $billing,
            'callback.register'
        )->getTargetUrl());

        $paymasterRegisterDTO->setLmiPaymentNotificationUrl($this->createToken(
            BillingTokenType::HOLD,
            $billing,
            'callback.register'
        )->getTargetUrl());

        $targetUrl = $this->createToken(BillingTokenType::NOTIFY, $billing, 'callback.notify')->getTargetUrl();
        $paymasterRegisterDTO->setLmiFailureUrl($targetUrl);
        $paymasterRegisterDTO->setLmiSuccessUrl($targetUrl);

        $request->markNew();

        $request->setModel(
            new RegisterResponseDTO(
                $billing,
                $this->gateway->getSettings()['paymentInitPath'] . '?' . http_build_query($this->snakeCaseConverter(true)->normalize($paymasterRegisterDTO)
                )
            )
        );
    }
}
