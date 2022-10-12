<?php

namespace App\Actions\Statistics;

use App\Repositories\Interfaces\ItemRepositoryInterface;


class ActionTotalPriceofItemsAdded
{

    public function __construct(public ItemRepositoryInterface  $itemRepository)
    {
    }

    public function __invoke(): float
    {
        return $this->itemRepository->getTotalPriceofItemsAdded(now()->startOfMonth(), now()->endOfMonth());
    }
}
