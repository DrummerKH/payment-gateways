<?php
/**
 * Created by PhpStorm.
 * User: Drummer1
 * Date: 26.04.18
 * Time: 15:21.
 */

namespace App\Service\GatewayFactory\Paymaster\DTO\Response;


use stdClass;

class ResponseDTO
{
    /**
     * @var int
     */
    protected $ErrorCode;

    /**
     * @var stdClass
     */
    protected $Payment;

    /**
     * @return int
     */
    public function getErrorCode(): int
    {
        return $this->ErrorCode;
    }

    /**
     * @param int $ErrorCode
     */
    public function setErrorCode(int $ErrorCode): void
    {
        $this->ErrorCode = $ErrorCode;
    }

    /**
     * @return null|stdClass
     */
    public function getPayment(): ?stdClass
    {
        return $this->Payment;
    }

    /**
     * @param stdClass $Payment
     */
    public function setPayment(stdClass $Payment): void
    {
        $this->Payment = $Payment;
    }
}
