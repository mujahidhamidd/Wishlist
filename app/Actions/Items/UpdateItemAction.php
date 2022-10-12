<?php

namespace App\Actions\Items;

use App\Models\Item;
use App\DataTransferObjects\ItemData;
use App\Repositories\Interfaces\ItemRepositoryInterface;

class UpdateItemAction
{

    public function __construct(public ItemRepositoryInterface  $itemRepository)
    {
    }
    public function __invoke(ItemData $itemData): Item
    {

        $item = $this->itemRepository->find($itemData->id);
        $item->update([
            'name' => $itemData->name,
            'price' => $itemData->price,
            'url' =>  $itemData->url,
            'description' => $itemData->description,
        ]);
        return  $item->fresh();
    }
}
