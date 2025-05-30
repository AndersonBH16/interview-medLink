<?php

namespace App\Updaters;

use App\Contracts\ItemUpdater;

class NormalItemUpdater extends ItemUpdater
{
    public function tick(): void
    {
        $this->decreaseQuality($this->item->sellIn <= 0 ? 2 : 1);
        $this->decreaseSellIn();
    }
}
