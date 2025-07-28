<?php


namespace App\Repositories\Interfaces;

use App\DTO\KitchenDto;
use Illuminate\Support\Collection;

interface KitchenInterface
{
    public function filter(array|KitchenDto $filters): Collection;

    public function exportCsv(array $filters): string;
}
