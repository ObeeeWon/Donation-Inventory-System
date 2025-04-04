<?php

namespace App\Http\Controllers;

use App\Models\ItemLocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItemLocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $itemloc = \App\Models\ItemLocation::get();

        return view('itemloc.index', compact('itemloc'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('itemloc.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'Location_Name' => 'required|exists:Location_Name',
            'location_desc' => 'required|exists:location_desc',
        ];
        $validator = $request->validate($rules);
    
        $itemLoc = new \App\Models\ItemLocation;
        $itemLoc->Location_Name = $request->Location_Name;
        $itemLoc->location_desc = $request->location_desc;
        $itemLoc->save();
    
        Session::flash('success', 'New Item Location Added');

        return redirect()->route('itemloc.index');
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
    public function edit(ItemLocation $itemLoc)
    {
        return view('itemloc.edit', compact('itemloc'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ItemLocation $itemLoc)
    {
        $rules = [
            'Location_Name' => 'required|exists:Location_Name',
            'ItemDescription' => 'required|exists:ItemDescription',
        ];
        $validator = $request->validate($rules);
    
        $itemLoc->Location_Name = $request->Location_Name;
        $itemLoc->location_desc = $request->location_desc;
        $itemLoc->update();
    
        Session::flash('success', 'Item Location Updated');

        return redirect()->route('itemloc.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
