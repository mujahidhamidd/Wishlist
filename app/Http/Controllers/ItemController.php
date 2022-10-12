<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Serializers\ItemSerializer;
use App\Http\Resources\ItemResource;
use App\Serializers\ItemsSerializer;
use App\DataTransferObjects\ItemData;
use App\Actions\Items\CreateItemAction;
use App\Actions\Items\UpdateItemAction;
use App\Http\Requests\CreateItemRequest;
use League\CommonMark\CommonMarkConverter;
use App\Repositories\Interfaces\ItemRepositoryInterface;

class ItemController extends Controller
{


    public function __construct(public ItemRepositoryInterface  $itemRepository)
    {
    }

    public function index()
    {
        return JsonResponse::create(['items' => ItemResource::collection($this->itemRepository->all())]);
    }

    public function store(CreateItemRequest $request, CreateItemAction $createItemAction)
    {
        $itemData = new ItemData(
            id: null,
            name: $request->name,
            price: $request->price,
            url: $request->url,
            description: parseMarkdown($request->description)
        );
        $item = ($createItemAction)($itemData);
        return  new JsonResponse(['item' => new  ItemResource($item)]);
    }

    public function show($id)
    {
        return new JsonResponse(['item' => new  ItemResource($this->itemRepository->find((int)$id))]);
    }

    public function update(CreateItemRequest $request, UpdateItemAction $updateItemAction, int $id): JsonResponse
    {
        $itemData = new ItemData(
            id: (int) $id,
            name: $request->name,
            price: $request->price,
            url: $request->url,
            description: parseMarkdown($request->description)
        );
        $item = ($updateItemAction)($itemData);

        //TODO create common trait to unify responses
        return  new JsonResponse(['item' => new  ItemResource($item)]);
    }
}
