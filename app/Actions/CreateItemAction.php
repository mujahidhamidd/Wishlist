<?php

namespace App\Actions;

use App\Models\Item;
use App\DataTransferObjects\ItemData;

class CreateItemAction
{
    public function __invoke(ItemData $itemData): Item
    {
        return Item::create([
            'name' => $itemData->name,
            'price' => $itemData->price,
            'url' =>  $itemData->url,
            'description' => $itemData->description,
        ]);
    }
}
