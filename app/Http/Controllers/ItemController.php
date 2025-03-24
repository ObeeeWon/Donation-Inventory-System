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
        $items = \App\Models\Item::all()->sortBy('item');

        return view('items.homepage')->with('items', $items);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('items.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'ItemName' => 'required|max:100|unique:items,ItemName',
            'Barcode' => 'required|unique:items,Barcode',
            'Quantity' => 'required',
            'LowStockAlert' => 'required',
            'Location' => 'required',
        ];
        $validator = $request->validate($rules);

        $item = new \App\Models\Item;
        $item->ItemName = $request->ItemName;
        $item->Barcode = $request->Barcode;
        $item->Quantity = $request->Quantity;
        $item->LowStockAlert = $request->LowStockAlert;
        $item->Location = $request->Location;
        $item->save();

        Session::flash('success', 'New Item Added');

        return redirect()->route('homepage');
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
        if (!$item) {
            Session::flash('error', 'No Item Found');
            return redirect()->route('items.index'); // Redirect to a list of items if not found
        } else {
            return view('items.edit')->with('item', $item);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        $rules = [
            'ItemName' => 'required|max:100|unique:items,ItemName',
            'Barcode' => 'required|unique:items,Barcode',
            'Quantity' => 'required',
            'LowStockAlert' => 'required',
            'Location' => 'required',
        ];
        $validator = $request->validate($rules);


        $item->ItemName = $request->ItemName;
        $item->Barcode = $request->Barcode;
        $item->Quantity = $request->Quantity;
        $item->LowStockAlert = $request->LowStockAlert;
        $item->Location = $request->Location;
        $item->update();

        Session::flash('success', 'Item Updated');

        return redirect()->route('homepage');
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
