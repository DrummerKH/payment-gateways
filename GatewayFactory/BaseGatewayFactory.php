<?php
/**
 * Created by PhpStorm.
 * User: Drummer1
 * Date: 06.04.18
 * Time: 15:27.
 */

namespace App\Service\GatewayFactory;

use App\Contracts\GatewayInterface;
use App\Contracts\SettingStorageInterface;
use App\Service\Gateway;
use App\Service\SettingStorage\SettingStorage;
use Payum\Core\Bridge\Spl\ArrayObject;
use Payum\Core\Bridge\Symfony\Extension\EventDispatcherExtension;
use Payum\Core\CoreGatewayFactory;
use Payum\Core\Storage\StorageInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class BaseGatewayFactory extends CoreGatewayFactory
{
    /**
     * @var StorageInterface
     */
    protected $storage;

    /**
     * @var EventDispatcherInterface
     */
    protected $eventDispatcher;

    /**
     * @var ContainerInterface
     */
    protected $container;

    /**
     * @var SettingStorage
     */
    protected $settingStorage;

    /**
     * @var GatewayInterface
     */
    protected $gateway;

    /**
     * BaseGatewayFactory constructor.
     *
     * @param array $defaultConfig
     * @param EventDispatcherInterface $eventDispatcher
     * @param ContainerInterface $container
     * @param SettingStorageInterface $settingStorage
     */
    public function __construct(
        /** @noinspection PhpOptionalBeforeRequiredParametersInspection */
        array $defaultConfig = [],
        EventDispatcherInterface $eventDispatcher,
        ContainerInterface $container,
        SettingStorageInterface $settingStorage
    )
    {
        parent::__construct($defaultConfig);
        $this->eventDispatcher = $eventDispatcher;
        $this->container = $container;
        $this->settingStorage = $settingStorage;
    }

    /**
     * @param array $options
     *
     * @return GatewayInterface
     */
    public function create(array $options = []): GatewayInterface
    {
        $config = ArrayObject::ensureArrayObject($options);
        $config->defaults($this->createConfig());

        $this->gateway = $this->container->get(Gateway::class);
        $this->gateway->setName($options['gatewayName']);
        $this->gateway->setSettings($options);
        $this->gateway->setFactoryClass(static::class);
        $this->gateway->addExtension(
            new EventDispatcherExtension($this->eventDispatcher)
        );

        return $this->gateway;
    }

    /**
     * @return GatewayInterface
     */
    public function getGateway(): GatewayInterface
    {
        return $this->gateway;
    }
}
