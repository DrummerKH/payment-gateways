<?php
/**
 * Created by PhpStorm.
 * User: Drummer1
 * Date: 18.04.18
 * Time: 16:53.
 */

namespace App\Service\GatewayFactory\Acquiring\DTO\Types;

class OrderStatusType
{
    /**
     * Заказ зарегистрирован, но не оплачен.
     */
    const ORDER_REGISTERED = 0;

    /**
     * Предавторизованная сумма захолдирована (для двухстадийных платежей).
     */
    const ORDER_HOLD = 1;

    /**
     * Проведена полная авторизация суммы заказа.
     */
    const ORDER_AUTHORIZED = 2;

    /**
     * Авторизация отменена.
     */
    const AUTHORIZED_CANCELLED = 3;

    /**
     * По транзакции была проведена операция возврата.
     */
    const ORDER_REFUNDED = 4;

    /**
     * Инициирована авторизация через ACS банка-эмитента.
     */
    const AUTHORIZATION_INITIATED = 5;

    /**
     * Авторизация отклонена.
     */
    const AUTHORIZATION_DECLINED = 6;
}
