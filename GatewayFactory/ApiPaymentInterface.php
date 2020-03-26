<?php
/**
 * Created by PhpStorm.
 * User: Drummer1
 * Date: 28.04.18
 * Time: 16:57.
 */

namespace App\Service\GatewayFactory;


use App\Exception\GatewayErrorException;
use GuzzleHttp\Exception\BadResponseException;

/**
 * Interface ApiPaymentInterface
 * Api service for gateways.
 */
interface ApiPaymentInterface
{
    /**
     * @param $DTO
     *
     * @return mixed
     * @throws BadResponseException
     * @throws GatewayErrorException
     */
    public function request($DTO = null);
}
