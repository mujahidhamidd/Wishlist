<?php

namespace App\Repositories\Interfaces;

use App\Models\Item;
use Illuminate\Support\Collection;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

interface ItemRepositoryInterface
{

    public function all(): Collection;

    public function find(int $id): Item | NotFoundHttpException;
}
