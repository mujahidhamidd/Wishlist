<?php

namespace App\Repositories;

use Carbon\Carbon;
use App\Models\Item;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use App\Repositories\Interfaces\ItemRepositoryInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ItemRepository implements ItemRepositoryInterface
{
    public function all(): Collection
    {
        return Item::all();
    }

    public function find(int $id): Item | NotFoundHttpException
    {
        return Item::findOrFail($id);
    }

    public function count(): int
    {
        return Item::count();
    }

    public function avg(string $column): float
    {
        return Item::avg($column);
    }

    public function getWebsiteWithTheHighestTotal(): string | null
    {
        return Item::select(DB::raw("SUBSTRING_INDEX(
            SUBSTRING_INDEX(
              SUBSTRING_INDEX(
                SUBSTRING_INDEX(SUBSTRING_INDEX(url, '/', 3), '://', -1),
                '/',
                1
              ),
              '?',
              1
            ),
            'www.',
            -1
          ) as website , SUM(price) as total_price",))->groupBy('website')->get()->first()?->website;
    }

    public function getTotalPriceofItemsAdded(Carbon $from, Carbon $to): float
    {
        return Item::whereBetween('created_at', [$from->toDateTimeString(), $to->toDateTimeString()])->sum('price');
    }
}
