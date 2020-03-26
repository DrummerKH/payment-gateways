<?php
/**
 * Created by PhpStorm.
 * User: Drummer1
 * Date: 15.05.18
 * Time: 12:02.
 */

namespace App\Service\GatewayFactory\Acquiring\DTO\Types;

class ReverseErrorType
{
    /**
     * Обработка запроса прошла без системных ошибок.
     */
    const SUCCESS = 0;

    /**
     * Ошибка значение параметра запроса.
     */
    const VALUE_ERROR = 5;

    /**
     * Незарегистрированный OrderId.
     */
    const UNKNOWN_ORDER_ID = 6;

    /**
     * Системная ошибка.
     */
    const SYSTEM_ERROR = 7;
}
