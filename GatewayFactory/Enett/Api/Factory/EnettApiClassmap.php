<?php

namespace App\Service\GatewayFactory\Enett\Api\Factory;

use App\Service\GatewayFactory\Enett\DTO;
use App\Service\GatewayFactory\Enett\DTO\Request;
use App\Service\GatewayFactory\Enett\DTO\Response;
use App\Service\GatewayFactory\Enett\DTO\Type;
use Phpro\SoapClient\Soap\ClassMap\ClassMap;
use Phpro\SoapClient\Soap\ClassMap\ClassMapCollection;

class EnettApiClassmap
{
    /**
     * @return ClassMapCollection
     */
    public static function getCollection(): ClassMapCollection
    {
        return new ClassMapCollection([
            new ClassMap('IssueVAN', DTO\IssueVAN::class),
            new ClassMap('IssueVANResponse', Response\IssueVANResponseDTO::class),
            new ClassMap('AmendVAN', DTO\AmendVAN::class),
            new ClassMap('AmendVANResponse', Response\AmendVANResponseDTO::class),
            new ClassMap('CancelVAN', DTO\CancelVAN::class),
            new ClassMap('CancelVANResponse', Response\CancelVANResponseDTO::class),
            new ClassMap('CloseVAN', DTO\CloseVAN::class),
            new ClassMap('CloseVANResponse', Response\CloseVANResponseDTO::class),
            new ClassMap('GetVANDetails', DTO\GetVANDetails::class),
            new ClassMap('GetVANDetailsResponse', Response\GetVANDetailsResponseDTO::class),
            new ClassMap('GetFxQuote', DTO\GetFxQuote::class),
            new ClassMap('GetFxQuoteResponse', Response\GetFxQuoteResponseDTO::class),
            new ClassMap('IssueVANRequest', Request\IssueVANRequestDTO::class),
            new ClassMap('UserReferenceCollection', Type\UserReferenceCollection::class),
            new ClassMap('UserReference', Type\UserReference::class),
            new ClassMap('AmendVANRequest', Request\AmendVANRequestDTO::class),
            new ClassMap('CancelVANRequest', Request\CancelVANRequestDTO::class),
            new ClassMap('CloseVANRequest', Request\CloseVANRequestDTO::class),
            new ClassMap('GetVANDetailsRequest', Request\GetVANDetailsRequestDTO::class),
            new ClassMap('GetVANResponse', Response\GetVANDetailsResponseDTO::class),
            new ClassMap('VanHistory', Type\VanHistory::class),
            new ClassMap('FxHistory', Type\FxHistory::class),
            new ClassMap('GetFxQuoteRequest', Request\GetFxQuoteRequestDTO::class),
            new ClassMap('VanHistoryCollection', Type\VanHistoryCollection::class),
            new ClassMap('FxHistoryCollection', Type\FxHistoryCollection::class),
        ]);
    }
}
