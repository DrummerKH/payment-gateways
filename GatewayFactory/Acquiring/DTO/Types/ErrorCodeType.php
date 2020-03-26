<?php
/**
 * Created by PhpStorm.
 * User: Drummer1
 * Date: 03.05.18
 * Time: 12:01.
 */

namespace App\Service\GatewayFactory\Acquiring\DTO\Types;


class ErrorCodeType
{
    /**
     * Обработка запроса прошла без системных ошибок.
     */
    const SUCCESS = 0;

    /**
     * Ошибка значение параметра запроса.
     */
    const ARGUMENT_ERROR = 5;

    /**
     * Системная ошибка.
     */
    const SYSTEM_ERROR = 7;
}
