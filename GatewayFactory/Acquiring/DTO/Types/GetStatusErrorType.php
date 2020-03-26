<?php
/**
 * Created by PhpStorm.
 * User: Drummer1
 * Date: 14.05.18
 * Time: 17:31.
 */

namespace App\Service\GatewayFactory\Acquiring\DTO\Types;


class GetStatusErrorType
{
    /**
     * Обработка запроса прошла без системных ошибок.
     */
    const SUCCESS = 0;

    /**
     * Заказ отклонен по причине ошибки в реквизитах платежа.
     */
    const DECLINED = 2;

    /**
     * Доступ запрещён.
     */
    const ACCESS_DENIED = 5;

    /**
     * Неверный номер заказа.
     */
    const WRONG_ORDER_NUMBER = 6;

    /**
     * Системная ошибка.
     */
    const SYSTEM_ERROR = 7;
}
