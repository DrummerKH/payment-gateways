<?php
/**
 *
 * Dmitry Hvorostyuk
 * Date: 17.09.2018.
 */

namespace App\Service\GatewayFactory\Rsb\DTO\Type;

class TransactionResultPs
{
    /**
     * Транзакция зарегистрирована, но не завершена.
     */
    const ACTIVE = 'ACTIVE';

    /**
     * Транзакция завершена успешно.
     */
    const FINISHED = 'FINISHED';

    /**
     * Транзакция отменена.
     */
    const CANCELLED = 'CANCELLED';

    /**
     * Транзакция возвращена.
     */
    const RETURNED = 'RETURNED';
}
