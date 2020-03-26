<?php
/**
 *
 * Dmitry Hvorostyuk
 * Date: 08.06.18.
 */

namespace App\Service\GatewayFactory\Rsb\DTO\Request;


class BaseRequestDTO
{
    /**
     * Идентифицирует запрос
     *
     * @var string
     */
    protected $command;

    /**
     * Используется для возврата дополнительных деталей, должно быть указано „2.0”.
     *
     * @var string
     */
    protected $server_version;

    /**
     * IP адрес клиента.
     *
     * @var string
     */
    protected $client_ip_addr;

    /**
     * @return string
     */
    public function getCommand(): ?string
    {
        return $this->command;
    }

    /**
     * @param string $command
     */
    public function setCommand(string $command): void
    {
        $this->command = $command;
    }

    /**
     * @return string
     */
    public function getServerVersion(): ?string
    {
        return $this->server_version;
    }

    /**
     * @param string $server_version
     */
    public function setServerVersion(string $server_version): void
    {
        $this->server_version = $server_version;
    }

    /**
     * @return string
     */
    public function getClientIpAddr(): ?string
    {
        return $this->client_ip_addr;
    }

    /**
     * @param string $client_ip_addr
     */
    public function setClientIpAddr(string $client_ip_addr): void
    {
        $this->client_ip_addr = $client_ip_addr;
    }
}
