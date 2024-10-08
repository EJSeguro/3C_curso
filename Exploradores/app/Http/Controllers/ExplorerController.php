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
        $explorer = $request->validate([
            'name'=>'string|required',
            'age'=>'integer|required',
        ]);


        $newExplorer = Explorer::create($explorer);

        Inventory::create(['explorer_id'=>$newExplorer->id]);
        return response()->json($newExplorer, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Explorer $explorer)
    {
        return response()->json($explorer, 200);
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
