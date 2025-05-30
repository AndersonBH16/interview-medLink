<?php

namespace App;

use App\Updaters\BrieItemUpdater;
use App\Updaters\ConjuredItemUpdater;
use App\Updaters\NormalItemUpdater;
use App\Updaters\SulfurasItemUpdater;
use App\Updaters\BackstageItemUpdater;

class GildedRose
{
    public static function of(string $name, int $quality, int $sellIn): Item
    {
        return new class($name, $quality, $sellIn) extends Item {
            public function tick(): void
            {
                $updater = match ($this->name) {
                    'Aged Brie' => new BrieItemUpdater($this),
                    'Sulfuras, Hand of Ragnaros' => new SulfurasItemUpdater($this),
                    'Backstage passes to a TAFKAL80ETC concert' => new BackstageItemUpdater($this),
                    default => str_contains(strtolower($this->name), 'conjured')
                        ? new ConjuredItemUpdater($this)
                        : new NormalItemUpdater($this),
                };

                $updater->tick();
            }
        };
    }
}
