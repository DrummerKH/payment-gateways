<?php
/**
 *
 * Dmitry Hvorostyuk
 * Date: 09.06.18.
 */

namespace App\Service\GatewayFactory\Rsb\Service;

use App\Contracts\FiscalServiceInterface;
use App\DBAL\Types\BillingTokenType;
use App\DTO\CallbackDTO;
use App\Exception\GatewayErrorException;
use App\Request\GetStatusRequest;
use App\Request\RegisterCallbackRequest;
use App\Service\Billing\BillingEntityProcessing;
use App\Service\GatewayFactory\GatewayServiceAbstract;
use App\Service\GatewayFactory\Rsb\DTO\Request\GetStatusRequestDTO;

class RegisterCallbackService extends GatewayServiceAbstract
{
    /**
     * @var BillingEntityProcessing
     */
    protected $billingProcessing;

    /**
     * @var FiscalServiceInterface
     */
    protected $fiscalService;

    /**
     * RegisterCallbackService constructor.
     *
     * @param BillingEntityProcessing $billingProcessing
     * @param FiscalServiceInterface $fiscalService
     */
    public function __construct(BillingEntityProcessing $billingProcessing, FiscalServiceInterface $fiscalService)
    {
        $this->billingProcessing = $billingProcessing;
        $this->fiscalService = $fiscalService;
    }

    /**
     * @param RegisterCallbackRequest $request
     *
     * @throws GatewayErrorException
     */
    public function execute(RegisterCallbackRequest $request)
    {
        $billing = $this->billingProcessing->getBilling();

        $statusDTO = new GetStatusRequestDTO();
        $statusDTO->setTransId($billing->getExternalId());

        /** @var GetStatusRequest $status */
        $status = $this->gateway->execute(new GetStatusRequest($statusDTO));

        if (!$status->isHold()) {
            $billing->setStatus($status->getValue());
            $this->billingProcessing->save();

            throw new GatewayErrorException("Billing status wrong ({$status->getValue()})");
        }

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
