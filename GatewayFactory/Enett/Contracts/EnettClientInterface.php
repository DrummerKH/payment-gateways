<?php
/**
 * Created by PhpStorm.
 * User: Drummer1
 * Date: 11.05.18
 * Time: 11:02.
 */

namespace App\Service\GatewayFactory\Enett\Contracts;

use App\Service\GatewayFactory\Enett\DTO\AmendVAN;
use App\Service\GatewayFactory\Enett\DTO\CancelVAN;
use App\Service\GatewayFactory\Enett\DTO\CloseVAN;
use App\Service\GatewayFactory\Enett\DTO\GetFxQuote;
use App\Service\GatewayFactory\Enett\DTO\GetVANDetails;
use App\Service\GatewayFactory\Enett\DTO\IssueVAN;
use App\Service\GatewayFactory\Enett\DTO\Response\AmendVANResponseDTO;
use App\Service\GatewayFactory\Enett\DTO\Response\CancelVANResponseDTO;
use App\Service\GatewayFactory\Enett\DTO\Response\CloseVANResponseDTO;
use App\Service\GatewayFactory\Enett\DTO\Response\GetFxQuoteResponseDTO;
use App\Service\GatewayFactory\Enett\DTO\Response\GetVANDetailsResponseDTO;
use App\Service\GatewayFactory\Enett\DTO\Response\IssueVANResponseDTO;

interface EnettClientInterface
{
    /**
     * @param IssueVAN $IssueVAN
     *
     * @return IssueVANResponseDTO
     */
    public function issueVAN(IssueVAN $IssueVAN): IssueVANResponseDTO;

    /**
     * @param AmendVAN $AmendVAN
     *
     * @return AmendVANResponseDTO
     */
    public function amendVAN(AmendVAN $AmendVAN): AmendVANResponseDTO;

    /**
     * @param CancelVAN $CancelVAN
     *
     * @return CancelVANResponseDTO
     */
    public function cancelVAN(CancelVAN $CancelVAN): CancelVANResponseDTO;

    /**
     * @param CloseVAN $CloseVAN
     *
     * @return CloseVANResponseDTO
     */
    public function closeVAN(CloseVAN $CloseVAN): CloseVANResponseDTO;

    /**
     * @param GetVANDetails $GetVANDetails
     *
     * @return GetVANDetailsResponseDTO
     */
    public function getVANDetails(GetVANDetails $GetVANDetails): GetVANDetailsResponseDTO;

    /**
     * @param GetFxQuote $GetFxQuote
     *
     * @return GetFxQuoteResponseDTO
     */
    public function getFxQuote(GetFxQuote $GetFxQuote): GetFxQuoteResponseDTO;
}
