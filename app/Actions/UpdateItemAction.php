<?php

namespace App\Actions;

use App\Models\Item;
use App\DataTransferObjects\ItemData;

class UpdateItemAction
{
    public function __invoke(ItemData $itemData): Item
    {

        $item = Item::findOrFail($itemData->id);
        $item->update([
            'name' => $itemData->name,
            'price' => $itemData->price,
            'url' =>  $itemData->url,
            'description' => $itemData->description,
        ]);
        return  $item->fresh();
    }
}
