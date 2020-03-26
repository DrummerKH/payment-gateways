<?php
/**
 * Created by PhpStorm.
 * User: Drummer1
 * Date: 26.04.18
 * Time: 15:43.
 */

namespace App\Service\GatewayFactory\Paymaster\DTO\Types;


class BillingStatusType
{
    /**
     * платеж начат
     */
    const INITIATED = 'INITIATED';

    /**
     * платеж проводится.
     */
    const PROCESSING = 'PROCESSING';

    /**
     * платеж завершен успешно.
     */
    const COMPLETE = 'COMPLETE';

    /**
     * платеж завершен неуспешно.
     */
    const CANCELLED = 'CANCELLED';

    /**
     * средства захолдированы.
     */
    const HOLD = 'HOLD';
}
