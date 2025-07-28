<?php


namespace App\Repositories;

use App\DTO\KitchenDto;
use App\Models\Kitchen;
use App\Repositories\Interfaces\KitchenInterface;
use Illuminate\Support\Collection;

class KitchenRepository implements KitchenInterface
{

    public function filter(KitchenDto $filters): Collection
    {
        $sort = $filters['sort'] ?? 'desc';
        return Kitchen::query()
            ->when(isset($filters->style), fn($q) =>
                $q->where('style', $filters->style))
            ->when(isset($filters->price), fn($q) =>
                $q->where('price', $filters->price))
            ->when(isset($filters->category), fn($q) =>
                $q->where('category_id', $filters->categoryId))
            ->orderBy(
                ...match($filters->orderBy ?? null) {
                    'price' => ['price', $sort],
                    'category'       => ['category', $sort],
                    'name'       => ['name', $sort],
                    default      => ['created_at', $sort],
                }
            )
            ->get();
    }

    public function exportCsv(array $filters): string
    {
        // TODO: Implement exportCsv() method.
    }
}
