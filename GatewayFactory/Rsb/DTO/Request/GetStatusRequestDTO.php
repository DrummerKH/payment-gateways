<?php
/**
 *
 * Dmitry Hvorostyuk
 * Date: 09.06.18.
 */

namespace App\Service\GatewayFactory\Rsb\DTO\Request;

class GetStatusRequestDTO extends BaseRequestDTO
{
    /**
     * Идентификатор транзакции.
     *
     * @var string
     */
    protected $trans_id;

    /**
     * @return string
     */
    public function getTransId(): string
    {
        return $this->trans_id;
    }

    /**
     * @param string $trans_id
     */
    public function setTransId(string $trans_id): void
    {
        $this->trans_id = $trans_id;
    }
}
