<?php
/**
 *
 * Dmitry Hvorostyuk
 * Date: 09.06.18.
 */

namespace App\Service\GatewayFactory\Rsb\Service;

use App\Exception\GatewayErrorException;
use App\Request\DepositRequest;
use App\Request\GetStatusRequest;
use App\Service\Api\ApiDecorator;
use App\Service\Billing\BillingEntityProcessing;
use App\Service\GatewayFactory\GatewayServiceAbstract;
use App\Service\GatewayFactory\Rsb\Api\DepositApi;
use App\Service\GatewayFactory\Rsb\DTO\Request\DepositRequestDTO;
use App\Service\GatewayFactory\Rsb\DTO\Response\DepositResponseDTO;
use App\Traits\TransactionSaverTrait;
use InvalidArgumentException;
use ReflectionException;
use Symfony\Component\Serializer\Exception\ExceptionInterface;

class DepositService extends GatewayServiceAbstract
{
    use TransactionSaverTrait;

    /**
     * @var ApiDecorator
     */
    protected $api;

    /**
     * @var
     */
    protected $saver;

    /**
     * @var BillingEntityProcessing
     */
    protected $billingProcessing;

    /**
     * DepositService constructor.
     *
     * @param DepositApi $api
     * @param BillingEntityProcessing $billingProcessing
     */
    public function __construct(DepositApi $api, BillingEntityProcessing $billingProcessing)
    {
        $this->api = $api;
        $this->billingProcessing = $billingProcessing;
    }

    /**
     * @param DepositRequest $request
     *
     * @throws GatewayErrorException
     * @throws ReflectionException
     * @throws ExceptionInterface
     */
    public function execute(DepositRequest $request)
    {
        $billing = $this->billingProcessing->getBilling();

        if ($billing->getAmount() <= 0) {
            throw new InvalidArgumentException('Amount must be greater than 0');
        }

        /** @var GetStatusRequest $status */
        $status = $this->gateway->execute(new GetStatusRequest([]));

        if (!$status->isHold()) {
            $billing->setStatus($status->getValue());
            $this->billingProcessing->save();

            throw new GatewayErrorException("Billing has wrong status for Deposit ({$status->getValue()})");
        }

        $DTO = new DepositRequestDTO();
        $DTO->setTransId($billing->getExternalId());
        $DTO->setCurrency($billing->getCurrency()->getNumeric());
        $DTO->setAmount($billing->getAmount());
        $DTO->setDescription($billing->getDescription());

        /** @var DepositResponseDTO $response */
        $response = $this->api->request($DTO);

        $request->markDone();
        $request->setModel($response);
    }
}
