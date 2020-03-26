<?php
/**
 * Created by PhpStorm.
 * User: Drummer1
 * Date: 26.04.18
 * Time: 15:35.
 */

namespace App\Service\GatewayFactory\Paymaster\DTO\Types;


class ErrorCodeType
{
    /**
     * Успешный запрос
     */
    const SUCCESS = 0;

    /**
     * Неизвестная ошибка. Сбой в системе PayMaster. Если ошибка повторяется, обратитесь в техподдержку.
     */
    const UNKNOWN_ERROR = -1;

    /**
     * Сетевая ошибка. Сбой в системе PayMaster. Если ошибка повторяется, обратитесь в техподдержку.
     */
    const NETWORK_ERROR = -2;

    /**
     * Нет доступа. Неверно указан логин, или у данного логина нет прав на запрошенную информацию.
     */
    const FORBIDDEN_ERROR = -6;

    /**
     * Неверная подпись запроса. Неверно сформирован хеш запроса.
     */
    const HASH_ERROR = -7;

    /**
     * Платеж не найден по номеру счета.
     */
    const NOT_FOUND_ERROR = -13;

    /**
     * Повторный запрос с тем же nonce.
     */
    const REPEAT_ERROR = -14;

    /**
     * Неверное значение суммы (в случае возвратов имеется в виду значение amount).
     */
    const AMOUNT_ERROR = -18;

    public static $choices = [
        self::SUCCESS => 'Запрос выполнен успешно',
        self::AMOUNT_ERROR => 'Неверное значение суммы (в случае возвратов имеется в виду значение amount)',
        self::FORBIDDEN_ERROR => 'Нет доступа. Неверно указан логин, или у данного логина нет прав на запрошенную информацию.',
        self::HASH_ERROR => 'Неверная подпись запроса. Неверно сформирован хеш запроса.',
        self::NETWORK_ERROR => 'Сетевая ошибка. Сбой в системе PayMaster. Если ошибка повторяется, обратитесь в техподдержку.',
        self::NOT_FOUND_ERROR => 'Платеж не найден по номеру счета',
        self::REPEAT_ERROR => 'Повторный запрос с тем же nonce',
        self::UNKNOWN_ERROR => 'Неизвестная ошибка. Сбой в системе PayMaster. Если ошибка повторяется, обратитесь в техподдержку.',
    ];
}
