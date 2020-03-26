<?php
/**
 * Created by PhpStorm.
 * User: Drummer1
 * Date: 26.04.18
 * Time: 14:33.
 */

namespace App\Service\GatewayFactory\Paymaster\DTO\Request;

use App\Annotation\Sign;

class RestRequestDTO
{
    /**
     * Имя пользователя.
     *
     * @var string
     * @Sign(order=1)
     */
    protected $login;

    /**
     * Случайная строка.
     *
     * @var string
     * @Sign(order=3)
     */
    protected $nonce;

    /**
     * Хеш строка аунентикации.
     *
     * @var string
     */
    protected $hash;

    /**
     * Ответ в формате джейсон.
     *
     * @var int
     */
    protected $json;

    /**
     * @return string
     */
    public function getLogin(): ?string
    {
        return $this->login;
    }

    /**
     * @param string $login
     */
    public function setLogin(string $login): void
    {
        $this->login = $login;
    }

    /**
     * @return string
     */
    public function getNonce(): ?string
    {
        return $this->nonce;
    }

    /**
     * @param string $nonce
     */
    public function setNonce(string $nonce): void
    {
        $this->nonce = $nonce;
    }

    /**
     * @return string
     */
    public function getHash(): ?string
    {
        return $this->hash;
    }

    /**
     * @param string $hash
     */
    public function setHash(string $hash): void
    {
        $this->hash = $hash;
    }

    /**
     * @return int
     */
    public function getJson(): ?int
    {
        return $this->json;
    }

    /**
     * @param int $json
     */
    public function setJson(int $json): void
    {
        $this->json = $json;
    }
}
