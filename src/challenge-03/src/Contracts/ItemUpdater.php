<?php

namespace App\Contracts;

use App\Item;

abstract class ItemUpdater
{
    public function __construct(protected Item $item) {}

    abstract public function tick(): void;

    protected function decreaseSellIn(): void
    {
        $this->item->sellIn--;
    }

    protected function increaseQuality(int $amount = 1): void
    {
        $this->item->quality = min(50, $this->item->quality + $amount);
    }

    protected function decreaseQuality(int $amount = 1): void
    {
        $this->item->quality = max(0, $this->item->quality - $amount);
    }
}
