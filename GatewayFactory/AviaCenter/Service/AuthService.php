<?php
/**
 *
 * Dmitry Hvorostyuk
 * Date: 27.02.2020
 */

namespace App\Service\GatewayFactory\AviaCenter\Service;


use App\Service\ClientManager;
use App\Service\GatewayFactory;
use App\Service\GatewayFactory\AviaCenter\Api\AuthApi;
use App\Traits\TransactionSaverTrait;
use Psr\Cache\CacheItemInterface;
use Psr\Cache\InvalidArgumentException;
use Symfony\Contracts\Cache\CacheInterface;


class AuthService
{
    use TransactionSaverTrait;

    /**
     * @var CacheInterface
     */
    private $cache;
    /**
     * @var GatewayFactory
     */
    private $gatewayFactory;
    /**
     * @var ClientManager
     */
    private $clientManager;

    public function __construct(AuthApi $api, CacheInterface $cache, ClientManager $clientManager)
    {
        $this->api = $api;
        $this->cache = $cache;
        $this->clientManager = $clientManager;
    }

    /**
     * @throws InvalidArgumentException
     */
    public function getSession(): string
    {
        return $this->cache->get(
            "AVIACENTER_AUTH_SESSION_{$this->clientManager->getClientService()->getUsername()}",
            function (CacheItemInterface $item) {
                $response = $this->api->request();
                $response->data->expires->modify('-4 hours');
                $item->expiresAt($response->data->expires);
                return $response->data->session;
            }
        );
    }
}