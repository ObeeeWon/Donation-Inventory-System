<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItemController extends Controller
{
    use SoftDeletes;
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $items = \App\Models\Item::with(['itemDesc', 'itemLocation'])->get();

    return view('items.homepage', compact('items'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $itemDescriptions = \App\Models\ItemDesc::all();
        $itemLocations = \App\Models\ItemLocation::all();

        return view('items.create', compact('itemDescriptions', 'itemLocations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'item_desc_id' => 'required|exists:item_desc,id',
            'item_location_id' => 'required|exists:item_location,id',
            'Barcode' => 'required|unique:items,Barcode',
            'Quantity' => 'required',
            'LowStockAlert' => 'required',
        ];
        $validator = $request->validate($rules);
    
        $item = new \App\Models\Item;
        $item->item_desc_id = $request->item_desc_id;
        $item->item_location_id = $request->item_location_id;
        $item->Barcode = $request->Barcode;
        $item->Quantity = $request->Quantity;
        $item->LowStockAlert = $request->LowStockAlert;
        $item->save();
    
        Session::flash('success', 'New Item Added');

        return redirect()->route('items.homepage');
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        $itemDescriptions = \App\Models\ItemDesc::all();
        $itemLocations = \App\Models\ItemLocation::all();

        return view('items.edit', compact('item', 'itemDescriptions', 'itemLocations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        $rules = [
            'item_desc_id' => 'required|exists:item_desc,id',
            'item_location_id' => 'required|exists:item_location,id',
            'Barcode' => 'required|unique:items,Barcode,' . $item->id,
            'Quantity' => 'required',
            'LowStockAlert' => 'required',
        ];
        $validator = $request->validate($rules);
    
        $item->item_desc_id = $request->item_desc_id;
        $item->item_location_id = $request->item_location_id;
        $item->Barcode = $request->Barcode;
        $item->Quantity = $request->Quantity;
        $item->LowStockAlert = $request->LowStockAlert;
        $item->update();
    
        Session::flash('success', 'Item Updated');

        return redirect()->route('items.homepage');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        //
    }

    public function confirmDelete(Item $item)
    {
        //
    }
}
