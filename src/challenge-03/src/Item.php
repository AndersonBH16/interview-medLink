<?php

namespace App;

class Item
{
    public function __construct(
        public string $name,
        public int $quality,
        public int $sellIn
    ) {}
}
