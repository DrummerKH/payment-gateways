<?php

namespace App\Service\GatewayFactory\Enett\Api\Factory;

use App\Service\GatewayFactory;
use App\Service\GatewayFactory\Enett\Api\DigestCalculator;
use App\Service\GatewayFactory\Enett\Api\EnettApi;
use Phpro\SoapClient\ClientBuilder;

class EnettApiFactory
{
    /**
     * @var GatewayFactory
     */
    protected $gatewayFactory;

    /**
     * @var DigestCalculator
     */
    protected $digestCalculator;

    /**
     * EnettApiFactory constructor.
     *
     * @param GatewayFactory $gatewayFactory
     * @param DigestCalculator $digestCalculator
     */
    public function __construct(GatewayFactory $gatewayFactory, DigestCalculator $digestCalculator)
    {
        $this->gatewayFactory = $gatewayFactory;
        $this->digestCalculator = $digestCalculator;
    }

    /**
     * @param string $wsdl
     *
     * @return EnettApi
     */
    public function factory(string $wsdl): EnettApi
    {
        $clientFactory = new ClientFactory(EnettApi::class, [$this->gatewayFactory, $this->digestCalculator]);
        $clientBuilder = new ClientBuilder($clientFactory, $wsdl);
        $clientBuilder->withClassMaps(EnettApiClassmap::getCollection());

        /** @var EnettApi $return */
        $return = $clientBuilder->build();

        return $return;
    }
}
