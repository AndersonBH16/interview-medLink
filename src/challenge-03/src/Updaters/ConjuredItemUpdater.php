<?php

namespace App\Updaters;

use App\Contracts\ItemUpdater;

class ConjuredItemUpdater extends ItemUpdater
{
    public function tick(): void
    {
        $this->decreaseQuality($this->item->sellIn <= 0 ? 4 : 2);
        $this->decreaseSellIn();
    }
}
