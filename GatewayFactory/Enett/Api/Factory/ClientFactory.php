<?php
/**
 *
 * Dmitry Hvorostyuk
 * Date: 04.07.18.
 */

namespace App\Service\GatewayFactory\Enett\Api\Factory;

use Phpro\SoapClient\ClientFactoryInterface;
use ReflectionClass;
use SoapClient;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class ClientFactory implements ClientFactoryInterface
{
    /**
     * @var string
     */
    private $className;

    private $arguments;

    /**
     * @param string $className
     * @param null|array $arguments
     */
    public function __construct(string $className, ?array $arguments = null)
    {
        $this->className = $className;
        $this->arguments = $arguments;
    }

    /**
     * @param SoapClient $soapClient
     * @param EventDispatcherInterface $dispatcher
     *
     * @throws \ReflectionException
     *
     * @return object
     */
    public function factory(SoapClient $soapClient, EventDispatcherInterface $dispatcher)
    {
        $rc = new ReflectionClass($this->className);

        return $rc->newInstance($soapClient, $dispatcher, ...$this->arguments);
    }
}
