<?php

namespace App\Http\Controllers;

use App\Models\Explorer;
use App\Models\Inventory;
use Illuminate\Http\Request;

class ExplorerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $inventory = Inventory::create();
        $explorer = $request->validate([
            'name'=>'required',
            'age'=>'required',
        ]);
        $explorer['inventory_id']=$inventory->id;

        $newExplorer = Explorer::create($explorer);
        return response()->json($newExplorer, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Explorer $explorer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Explorer $explorer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Explorer $explorer)
    {
        //
    }
}
