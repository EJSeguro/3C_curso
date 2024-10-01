<?php

namespace App\Http\Controllers;

use App\Models\Human;
use Illuminate\Http\Request;

class HumanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $humans = Human::all();
        return response()->json($humans);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $human = $request->validate([
            'name' => 'required',
            'cpf' => 'required|unique:humans,cpf|max:11',
            'age' => 'integer|required',
        ]);
        $newHuman = Human::create($human);
        return response()->json($newHuman, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Human $human)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Human $human)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Human $human)
    {
        //
    }
}
