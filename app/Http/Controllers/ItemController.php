<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Item;
use App\Http\Resources\ItemResource;

class ItemController extends Controller
{
    public function index()
    {
      return ItemResource::collection(Item::orderBy('created_at', 'desc')->get()); //Item::where('amount', 0)->get() // Item::where('amount', '>', 5)->get()
    } 

    public function search(Request $request)
    {
      $column = $request->column;
      $sign = $request->sign;
      $value = $request->value;
      return ItemResource::collection(Item::where($column, $sign, $value)->get());
    }

    public function store(Request $request)
    {
      $item = Item::create([
        'name' => $request->name,
        'amount' => $request->amount,
      ]);

      return new ItemResource($item);
    }

    public function show(Item $item)
    {
      return new ItemResource($item);
    }

    public function update(Request $request, Item $item)
    {
      $item->update($request->only(['name', 'amount']));
      return new ItemResource($item);
    }

    public function destroy(Item $item)
    {
      $item->delete();
      return response()->json(null, 204);
    }
}
