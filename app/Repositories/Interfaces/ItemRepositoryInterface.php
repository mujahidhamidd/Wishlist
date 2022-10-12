<?php

namespace App\Repositories\Interfaces;

use App\Models\Item;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

interface ItemRepositoryInterface
{

    public function all(): Collection;

    public function find(int $id): Item | NotFoundHttpException;


    public function count(): int;

    public function avg(string $coulmn): float;

    public function getWebsiteWithTheHighestTotal(): string | null;

    public function getTotalPriceofItemsAdded(Carbon $from, Carbon $to): float;
}
