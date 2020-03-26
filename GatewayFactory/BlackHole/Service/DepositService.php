<?php
/**
 * Created by PhpStorm.
 * User: Drummer1
 * Date: 03.05.18
 * Time: 15:10.
 */

namespace App\Service\GatewayFactory\BlackHole\Service;

use App\Request\DepositRequest;
use App\Service\GatewayFactory\GatewayServiceAbstract;

class DepositService extends GatewayServiceAbstract
{
    /**
     * @param DepositRequest $request
     */
    public function execute(DepositRequest $request)
    {
        $request->markDone();
    }
}
