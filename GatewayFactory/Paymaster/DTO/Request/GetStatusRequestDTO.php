<?php
/**
 * Created by PhpStorm.
 * User: Drummer1
 * Date: 26.04.18
 * Time: 14:23.
 */

namespace App\Service\GatewayFactory\Paymaster\DTO\Request;

use App\Annotation\Sign;

class GetStatusRequestDTO extends RestRequestDTO
{
    /**
     * номер счета (поле LMI_PAYMENT_NO).
     *
     * @var int
     * @Sign(order=4)
     */
    protected $invoiceID;

    /**
     * идентификатор сайта (поле LMI_MERCHANT_ID).
     *
     * @var string
     * @Sign(order=5)
     */
    protected $siteAlias;

    /**
     * @return int
     */
    public function getInvoiceID(): int
    {
        return $this->invoiceID;
    }

    /**
     * @param int $invoiceID
     */
    public function setInvoiceID(int $invoiceID): void
    {
        $this->invoiceID = $invoiceID;
    }

    /**
     * @return string
     */
    public function getSiteAlias(): string
    {
        return $this->siteAlias;
    }

    /**
     * @param string $siteAlias
     */
    public function setSiteAlias(string $siteAlias): void
    {
        $this->siteAlias = $siteAlias;
    }
}
