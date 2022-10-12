<?php

namespace App\Actions\Statistics;

use App\Repositories\Interfaces\ItemRepositoryInterface;


class ActionWebsiteWithTheHighestTotal
{

    public function __construct(public ItemRepositoryInterface  $itemRepository)
    {
    }

    public function __invoke(): string | null
    {

        return $this->itemRepository->getWebsiteWithTheHighestTotal();
    }
}
