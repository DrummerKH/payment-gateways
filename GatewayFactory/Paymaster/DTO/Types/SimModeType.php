<?php
/**
 * Created by PhpStorm.
 * User: Drummer1
 * Date: 24.04.18
 * Time: 16:30.
 */

namespace App\Service\GatewayFactory\Paymaster\DTO\Types;


class SimModeType
{
    /**
     * симуляция успешных платежей.
     */
    const SUCCESS = 0;

    /**
     * симуляция платежей с ошибкой.
     */
    const ERROR = 1;

    /**
     * около 80% запросов будут выполнены успешно, а 20% - нет
     */
    const RANDOM = 2;
}
