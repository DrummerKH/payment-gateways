<?php
/**
 *
 * Dmitry Hvorostyuk
 * Date: 27.02.2020
 */

namespace App\Service\GatewayFactory\AviaCenter\DTO;


class BaseResponseDTO
{
    /** @var bool */
    public $success;

    /** @var string */
    public $pid;

    /** @var float */
    public $execution_time;

    /** @var array */
    public $data;
}