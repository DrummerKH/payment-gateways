<?php
/**
 * Created by PhpStorm.
 * User: Drummer1
 * Date: 07.05.18
 * Time: 14:47.
 */

namespace App\Service\GatewayFactory\Enett\DTO\Type;


class CancelReasonType
{
    const BOOKING_CANCELLED = 'BookingCancelled';

    const BOOKING_AMENDED = 'BookingAmended';

    const DUPLICATE_REQUEST = 'DuplicateRequest';

    const ERROR_IN_ORIGINAL_REQUEST = 'ErrorInOriginalRequest';

    const CREDIT_LIMIT_UPDATE_FAILED = 'CreditLimitUpdateFailed';

    const MAXIMUM_TOLERANCE_EXCEEDED = 'MaximumToleranceExceeded';

    const FUNDING_FAILED = 'FundingFailed';

    const FRAUDULENT_USE = 'FraudulentUse';

    const POSSIBLE_FRAUDULENT_USE = 'PossibleFraudulentUse';
}
