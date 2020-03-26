<?php
/**
 * Created by PhpStorm.
 * User: Drummer1
 * Date: 03.05.18
 * Time: 13:25.
 */

namespace App\Service\GatewayFactory\BlackHole\Service;

use App\DBAL\Types\BillingTokenType;
use App\DTO\Response\RegisterResponseDTO;
use App\Request\RegisterRequest;
use App\Service\Billing\BillingEntityProcessing;
use App\Service\GatewayFactory\GatewayServiceAbstract;
use App\Traits\TokenFactoryAware;
use Symfony\Component\DependencyInjection\ContainerInterface;

class RegisterService extends GatewayServiceAbstract
{
    use TokenFactoryAware;

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
    public function __construct(ContainerInterface $container, BillingEntityProcessing $billingService)
    {
        $this->container = $container;
        $this->billingService = $billingService;
    }

    /**
     * @param RegisterRequest $request
     */
    public function execute(RegisterRequest $request)
    {
        $this->awareTokenFactory($this->container->get('payum'));
        $billing = $this->billingService->getBilling();

        $request->setModel(new RegisterResponseDTO(
            $billing,
            $this->createToken(
                BillingTokenType::HOLD,
                $billing,
                'blackhole.register'
            )->getTargetUrl()
        ));
    }
}
