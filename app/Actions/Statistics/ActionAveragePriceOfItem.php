<?php

namespace App\Actions\Statistics;

use App\Repositories\Interfaces\ItemRepositoryInterface;


class ActionAveragePriceOfItem
{
    public function __construct(public ItemRepositoryInterface  $itemRepository)
    {
    }

    public function __invoke(): float
    {

        return $this->itemRepository->avg('price');
    }
}
