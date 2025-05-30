<?php

namespace App\Updaters;

use App\Contracts\ItemUpdater;

class BrieItemUpdater extends ItemUpdater
{
    public function tick(): void
    {
        $this->increaseQuality($this->item->sellIn <= 0 ? 2 : 1);
        $this->decreaseSellIn();
    }
}
