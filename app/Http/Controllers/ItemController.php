<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemStoreRequest;
use App\Http\Resources\ItemCollection;
use App\Http\Resources\ItemResource;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new ItemCollection(Item::all());
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(ItemStoreRequest $request)
    {
        $item = new Item();
        $item->name = $request->post('name');
        $item->save();

        return response()->json([
            'message' => "Item created !",

        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        return new ItemResource($item);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {

        if ($request->completed) {
            $request->merge([
                'completed_at' => now()
            ]);
        }
        $item->update($request->all());

        return response()->json([
            'all' => $request->all()
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item->delete();
    }
}