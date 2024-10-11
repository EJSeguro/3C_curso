<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Inventory::with('items')->get(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Inventory $inventory)
    {
        return response()->json($inventory, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function trade(Request $request)
    {
        $item = $request->validate([
            'idItem1'=>'exists:items,id|required',
            'idItem2'=>'exists:items,id|required',
        ]);

        $item1 = Item::find($item['idItem1']);
        $item2 = Item::find($item['idItem2']);

        $explorer = Auth::user();
        if($item1->inventory->explorer_id != $explorer->id){
            return response()->json('Esse item não pertence ao usuário!',403);
        }

        if($item1->price != $item2->price){
            return response()->json('Valor dos itens não são equivalentes!', 400);
        }

        $aux = $item1->inventory_id;
        $item1->inventory_id = $item2->inventory_id;
        $item2->inventory_id = $aux;

        $item1->save();
        $item2->save();

        return response()->json('Deu boa!', 200);
    }

}
