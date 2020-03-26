<?php

namespace App\Service\GatewayFactory\Enett\DTO\Type;


class FxHistoryCollection
{
    /**
     * @var FxHistory
     */
    private $FxHistory;

    /**
     * @return FxHistory
     */
    public function getFxHistory(): ?FxHistory
    {
        return $this->FxHistory;
    }

    /**
     * @param FxHistory $FxHistory
     *
     * @return FxHistoryCollection
     */
    public function setFxHistory(FxHistory $FxHistory): self
    {
        $this->FxHistory = $FxHistory;

        return $this;
    }
}
