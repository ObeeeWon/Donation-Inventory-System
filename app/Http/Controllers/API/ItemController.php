<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $items = Item::all();
        return response()->json($items);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'ItemName' => 'required|string|max:255',
            'Barcode' => 'required|string|unique:items,Barcode',
            'Quantity' => 'required|integer|min:0',
            'LowStockAlert' => 'required|integer|min:0',
            'Location' => 'required|string|max:255',
        ]);

        $item = Item::create($validatedData);

        return response()->json(['message' => 'Item created successfully', 'item' => $item], 201);
    }
    /**
     * Display the specified resource.
     */
    public function show($id): JsonResponse
    {
        $item = Item::find($id);
        if (!$item) {
            return response()->json(['message' => 'Item not found'], 404);
        }
        return response()->json($item);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): JsonResponse
    {
        $item = Item::find($id);
        if (!$item) {
            return response()->json(['message' => 'Item not found'], 404);
        }

        $validatedData = $request->validate([
            'ItemName' => 'sometimes|string|max:255',
            'Barcode' => 'sometimes|string|unique:items,Barcode,' . $id . ',ItemID',
            'Quantity' => 'sometimes|integer|min:0',
            'LowStockAlert' => 'sometimes|integer|min:0',
            'Location' => 'sometimes|string|max:255',
        ]);

        $item->update($validatedData);

        return response()->json(['message' => 'Item updated successfully', 'item' => $item]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): JsonResponse
    {
        $item = Item::find($id);
        if (!$item) {
            return response()->json(['message' => 'Item not found'], 404);
        }

        $item->delete();
        return response()->json(['message' => 'Item deleted successfully']);
    }
}
