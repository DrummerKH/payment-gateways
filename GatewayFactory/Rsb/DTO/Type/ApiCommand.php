<?php
/**
 *
 * Dmitry Hvorostyuk
 * Date: 08.06.18.
 */

namespace App\Service\GatewayFactory\Rsb\DTO\Type;

class ApiCommand
{
    /**
     * Идентифицирует запрос на регистрацию транзакции.
     */
    public const REGISTER = 'a';

    /**
     * Идентифицирует запрос результата транзакции.
     */
    public const STATUS = 'c';

    /**
     * Идентифицирует запрос на регистрацию транзакции.
     */
    public const DEPOSIT = 't';

    /**
     * Идентифицирует запрос отмены транзакции.
     */
    public const CANCEL = 'r';

    /**
     * Идентифицирует запрос  возврата суммы транзакции.
     */
    public const REFUND = 'k';
}
