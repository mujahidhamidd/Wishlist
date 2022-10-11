<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Actions\CreateItemAction;
use App\Actions\UpdateItemAction;
use Illuminate\Http\JsonResponse;
use App\Serializers\ItemSerializer;
use App\Http\Resources\ItemResource;
use App\Serializers\ItemsSerializer;
use App\DataTransferObjects\ItemData;
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
        $serializer = new ItemSerializer($item);
        return new JsonResponse(['item' => $serializer->getData()]);
    }

    public function show($id)
    {
        return new JsonResponse(['item' => new  ItemResource($this->itemRepository->find((int)$id))]);
    }

    public function update(CreateItemRequest $request, UpdateItemAction $updateItemAction, int $id): JsonResponse
    {
        $item  =  $this->itemRepository->find((int)$id);
        $itemData = new ItemData(
            id: $item->id,
            name: $request->name,
            price: $request->price,
            url: $request->url,
            description: parseMarkdown($request->description)
        );
        $item = ($updateItemAction)($itemData);

        return  new JsonResponse(['item' => new  ItemResource($item)]);
    }
}
