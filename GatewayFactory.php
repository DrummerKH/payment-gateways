<?php
/**
 *
 * Dmitry Hvorostyuk
 * Date: 31.05.18.
 */

namespace App\Service;

use App\Contracts\GatewayInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class GatewayFactory
{
    /**
     * @var ContainerInterface
     */
    protected $container;

    /**
     * GatewayFactory constructor.
     *
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @param \App\Entity\Gateway|string $gateway
     * @return GatewayInterface
     */
    public function factory($gateway): ?GatewayInterface
    {
        if ($gateway instanceof \App\Entity\Gateway) {
            $gateway = $gateway->getName();
        }

        return $this->container->get('payum')->getGateway($gateway);
    }
}
