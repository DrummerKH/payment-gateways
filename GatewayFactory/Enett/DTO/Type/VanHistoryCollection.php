<?php

namespace App\Service\GatewayFactory\Enett\DTO\Type;


class VanHistoryCollection
{
    /**
     * @var VanHistory
     */
    private $VanHistory;

    /**
     * @return VanHistory
     */
    public function getVanHistory(): ?VanHistory
    {
        return $this->VanHistory;
    }

    /**
     * @param VanHistory $VanHistory
     *
     * @return VanHistoryCollection
     */
    public function setVanHistory(VanHistory $VanHistory): self
    {
        $this->VanHistory = $VanHistory;

        return $this;
    }
}
