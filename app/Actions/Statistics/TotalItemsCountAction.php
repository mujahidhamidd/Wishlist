<?php

namespace App\Actions\Statistics;

use App\Repositories\Interfaces\ItemRepositoryInterface;


class TotalItemsCountAction
{

    public function __construct(public ItemRepositoryInterface  $itemRepository)
    {
    }

    public function __invoke(): int
    {

        return $this->itemRepository->count();
    }
}
