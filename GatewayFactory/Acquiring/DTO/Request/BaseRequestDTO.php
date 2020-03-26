<?php
/**
 * Created by PhpStorm.
 * User: Drummer1
 * Date: 11.04.18
 * Time: 22:15.
 */

namespace App\Service\GatewayFactory\Acquiring\DTO\Request;


class BaseRequestDTO
{
    /**
     * Логин магазина, полученный при подключении.
     *
     * @var string
     */
    protected $userName;

    /**
     * Пароль магазина, полученный при подключении.
     *
     * @var string
     */
    protected $password;

    /**
     * @return string
     */
    public function getUserName(): ?string
    {
        return $this->userName;
    }

    /**
     * @param string $userName
     */
    public function setUserName(string $userName): void
    {
        $this->userName = $userName;
    }

    /**
     * @return string
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }
}
