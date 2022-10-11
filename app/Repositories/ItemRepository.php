<?php

namespace App\Repositories;

use App\Models\Item;
use App\Repositories\Interfaces\ItemRepositoryInterface;
use Illuminate\Support\Collection;
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
}
