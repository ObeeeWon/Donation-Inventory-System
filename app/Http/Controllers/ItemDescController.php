<?php

namespace App\Http\Controllers;

use App\Models\ItemDesc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItemDescController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $itemdesc = \App\Models\ItemDesc::get();

        return view('itemdesc.index', compact('itemdesc'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('itemdesc.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $rules = [
        'ItemName' => 'required|string|max:255',
        'ItemDescription' => 'required|string',
    ];
    $validator = $request->validate($rules);

    $itemDesc = new \App\Models\ItemDesc;
    $itemDesc->ItemName = $request->ItemName;
    $itemDesc->ItemDescription = $request->ItemDescription;
    $itemDesc->save();

    Session::flash('success', 'New Item Master Added');

    return redirect()->route('itemdesc.index');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ItemDesc $itemdesc)
    {
        return view('itemdesc.edit', compact('itemdesc'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ItemDesc $itemdesc)
    {
        $rules = [
            'ItemName' => 'required|exists:ItemName',
            'ItemDescription' => 'required|exists:ItemDescription',
        ];
        $validator = $request->validate($rules);
    
        $itemdesc->ItemName = $request->ItemName;
        $itemdesc->ItemDescription = $request->ItemDescription;
        $itemdesc->update();
    
        Session::flash('success', 'Item Master Updated');

        return redirect()->route('itemdesc.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function confirmDelete(Item $item)
    {
        //
    }
}
