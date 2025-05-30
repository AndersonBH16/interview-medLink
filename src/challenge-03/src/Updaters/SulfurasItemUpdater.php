<?php

namespace App\Updaters;

use App\Contracts\ItemUpdater;

class SulfurasItemUpdater extends ItemUpdater
{
    public function tick(): void
    {
        // Assumed it does not deteriorate over time
    }
}
