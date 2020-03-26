<?php
/**
 *
 * Dmitry Hvorostyuk
 * Date: 09.06.18.
 */

namespace App\Service\GatewayFactory\Rsb\DTO\Type;

/**
 * Статус результата транзакции.
 *
 * Class TransactionResult
 */
class TransactionResult
{
    /**
     * Транзакция завершена успешно.
     */
    public const OK = 'OK';

    /**
     * Неуспешная транзакция.
     */
    public const FAILED = 'FAILED';

    /**
     * Транзакция зарегистрирована в системе.
     */
    public const CREATED = 'CREATED';

    /**
     * Выполнение транзакции продолжается.
     */
    public const PENDING = 'PENDING';

    /**
     * Транзакция отклонена системой RSB_ECOMM, так как ECI находится в
     * списке заблокированных ECI (конфигурация серверной части RSB_ECOMM).
     */
    public const DECLINED = 'DECLINED';

    /**
     * Транзакция отменена.
     */
    public const REVERSED = 'REVERSED';

    /**
     * Транзакция автоматически отменена системой RSB_ECOMM.
     */
    public const AUTOREVERSED = 'AUTOREVERSED';

    /**
     * время отведенное на проведение транзакции истекло.
     */
    public const TIMEOUT = 'TIMEOUT';
}
