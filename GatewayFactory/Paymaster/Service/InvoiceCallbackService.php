<?php
/**
 * Created by PhpStorm.
 * User: Drummer1
 * Date: 25.04.18
 * Time: 17:45.
 */

namespace App\Service\GatewayFactory\Paymaster\Service;

use App\DBAL\Types\BillingTokenType;
use App\DTO\CallbackDTO;
use App\Exception\GatewayErrorException;
use App\Request\GetStatusRequest;
use App\Request\RegisterCallbackRequest;
use App\Service\GatewayFactory\GatewayServiceAbstract;
use Symfony\Component\HttpFoundation\Response;

class InvoiceCallbackService extends GatewayServiceAbstract
{
    const APPROVE = 'YES';

    const DENIED = 'NO';

    /**
     * @param RegisterCallbackRequest $request
     *
     * @throws GatewayErrorException
     */
    public function execute(RegisterCallbackRequest $request)
    {
        /** @var GetStatusRequest $statusRequest */
        $statusRequest = $this->gateway->execute(new GetStatusRequest([]));

        $request->setModel(new Response(self::DENIED));

        if ($statusRequest->isAccepted()) {
            $request->setModel(new Response(self::APPROVE));
        }

        $request->syncStatus($statusRequest);
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

        return BillingTokenType::ACCEPT === $callbackDTO->getToken()->getType();
    }
}
