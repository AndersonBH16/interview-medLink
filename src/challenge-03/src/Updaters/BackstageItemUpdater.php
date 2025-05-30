<?php

namespace App\Updaters;

use App\Contracts\ItemUpdater;

class BackstageItemUpdater extends ItemUpdater
{
    public function tick(): void
    {
        if ($this->item->sellIn <= 0) {
            $this->item->quality = 0;
        } elseif ($this->item->sellIn <= 5) {
            $this->increaseQuality(3);
        } elseif ($this->item->sellIn <= 10) {
            $this->increaseQuality(2);
        } else {
            $this->increaseQuality();
        }

        $this->decreaseSellIn();
    }
}
