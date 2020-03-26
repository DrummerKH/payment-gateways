<?php
/**
 * Created by PhpStorm.
 * User: Drummer1
 * Date: 25.04.18
 * Time: 17:36.
 */

namespace App\Service\GatewayFactory\Acquiring\Service;

use App\Contracts\FiscalServiceInterface;
use App\DBAL\Types\BillingTokenType;
use App\DTO\CallbackDTO;
use App\Exception\GatewayErrorException;
use App\Request\GetStatusRequest;
use App\Request\RegisterCallbackRequest;
use App\Service\Billing\BillingEntityProcessing;
use App\Service\Fiscal\Fiscal;
use App\Service\GatewayFactory\Acquiring\DTO\Request\GetStatusRequestDTO;
use App\Service\GatewayFactory\GatewayServiceAbstract;

class RegisterCallbackService extends GatewayServiceAbstract
{
    /**
     * @var Fiscal
     */
    protected $fiscalService;

    /**
     * @var BillingEntityProcessing
     */
    protected $billingService;

    /**
     * RegisterCallbackService constructor.
     *
     * @param FiscalServiceInterface $fiscalService
     * @param BillingEntityProcessing $billingService
     */
    public function __construct(FiscalServiceInterface $fiscalService, BillingEntityProcessing $billingService)
    {
        $this->fiscalService = $fiscalService;
        $this->billingService = $billingService;
    }

    /**
     * @param RegisterCallbackRequest $request
     *
     * @throws GatewayErrorException
     */
    public function execute(RegisterCallbackRequest $request)
    {
        $billing = $this->billingService->getBilling();

        $statusDTO = new GetStatusRequestDTO();
        $statusDTO->setOrderId($billing->getExternalId());

        /** @var GetStatusRequest $status */
        $status = $this->gateway->execute(new GetStatusRequest($statusDTO));

        $request->syncStatus($status);
    }

    /**
     * @param RegisterCallbackRequest $request
     *
     * @return bool
     */
    public function supports(RegisterCallbackRequest $request)
    {
        /** @var CallbackDTO $callbackDTO */
        $callbackDTO = $request->getModel();

        return BillingTokenType::HOLD === $callbackDTO->getToken()->getType();
    }
}
