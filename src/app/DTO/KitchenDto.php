<?php


namespace App\DTO;


use Illuminate\Http\Request;

readonly class KitchenDto
{
    public function __construct(
        public ?KitchenStyle $style = null,
        public ?int $price = null,
        public ?int $priceMin = null,
        public ?int $priceMax = null,
        public ?string $categoryId = null,
        public ?string $orderBy = null,
        public ?string $sort = null,
    ) {}

    public static function fromRequest(Request $request): self {
        return new self (
            style: $request->filled('style') ? KitchenStyle::from($request->input('style')) : null,
            price: $request->integer('price'),
            priceMin: $request->integer('price_min'),
            priceMax: $request->integer('price_max'),
            categoryId: $request->input('categoryId'),
            orderBy: $request->input('orderBy'),
            sort: $request->input('sort'),
        );
    }
}
