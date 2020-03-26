<?php
/**
 * Created by PhpStorm.
 * User: Drummer1
 * Date: 06.04.18
 * Time: 14:58.
 */

namespace App\Service;

use App\Contracts\GatewayInterface;
use App\Contracts\SettingStorageInterface;
use App\Service\Adapter\GatewayServiceAdapter;
use App\Service\GatewayFactory\GatewayServiceAbstract;
use App\Service\GatewayFactory\GatewayServiceInterface;
use App\Service\SettingStorage\RuntimeSettingProvider;
use Payum\Core\Action\ActionInterface;
use Payum\Core\Gateway as BaseGateway;
use Payum\Core\Request\Generic;
use ReflectionException;
use Symfony\Component\DependencyInjection\ContainerInterface;

class Gateway extends BaseGateway implements GatewayInterface
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var ContainerInterface
     */
    protected $container;

    /**
     * @var SettingStorageInterface
     */
    protected $settingsStorage;

    /**
     * @var string
     */
    protected $factoryClass;

    /**
     * @var GatewayServiceAdapter
     */
    protected $serviceAdapter;

    /**
     * Gateway constructor.
     *
     * @param ContainerInterface $container
     * @param SettingStorageInterface $settingStorage
     * @param GatewayServiceAdapter $serviceAdapter
     */
    public function __construct(
        ContainerInterface $container,
        SettingStorageInterface $settingStorage,
        GatewayServiceAdapter $serviceAdapter
    )
    {
        parent::__construct();
        $this->container = $container;
        $this->settingsStorage = $settingStorage;
        $this->serviceAdapter = $serviceAdapter;
    }

    /**
     * @param mixed $request
     * @param bool $catchReply
     *
     * @return Generic
     */
    public function execute($request, $catchReply = false): ?Generic
    {
        parent::execute($request, $catchReply);

        return $request;
    }

    /**
     * @param ActionInterface $action
     * @param bool $forcePrepend
     *
     * @deprecated Use method addService() instead with automatic supporting by type-hinting
     */
    public function addAction(ActionInterface $action, $forcePrepend = false)
    {
        parent::addAction($action, $forcePrepend);
    }

    /**
     * Add services by class names.
     *
     * @param array $classNames
     *
     * @throws ReflectionException
     */
    public function addServices(array $classNames): void
    {
        foreach ($classNames as $className) {
            /** @var GatewayServiceAbstract $service */
            $service = $this->container->get($className);
            $this->addService($service);
        }
    }

    /**
     * @param GatewayServiceInterface $action
     * @param bool $forcePrepend
     *
     * @throws ReflectionException
     */
    public function addService(GatewayServiceInterface $action, $forcePrepend = false): void
    {
        parent::addAction(clone $this->serviceAdapter->wrap($action), $forcePrepend);
    }

    /**
     * @return string
     */
    public function getFactoryClass(): string
    {
        return $this->factoryClass;
    }

    public function setFactoryClass(string $factoryClass)
    {
        $this->factoryClass = $factoryClass;
    }

    /**
     * @param array $settings
     */
    public function setSettings(array $settings): void
    {
        $this->settingsStorage->set(RuntimeSettingProvider::class, $this->getName(), $settings);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return array
     */
    public function getSettings(): array
    {
        return $this->settingsStorage->get($this->getName());
    }

    /**
     * @return bool
     */
    public function needFiscal(): bool
    {
        // By default need fiscal
        return $this->getSettings()['fiscal'] ?? true;
    }
}
