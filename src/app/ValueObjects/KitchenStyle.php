<?php


namespace App\ValueObjects;


class KitchenStyle
{
    public function __construct(
        public ?KitchenStyle $style = null,
        public ?int $priceMin = null,
        public ?int $priceMax = null,
        public ?string $sort = null,
    ) {}
}
