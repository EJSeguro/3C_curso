<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $animals = Animal::with('human')->get();
        return response()->json($animals);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $animal = $request->validate([
        'name' => 'required',
        'breed' => 'required',
        'color' => 'required',
        'gender' => 'required',
        'human_id' => 'required',
        ]);

        $newAnimal = Animal::create($animal);
        return response()->json($animal, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Animal $animal)
    {
        return response()->json($animal, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Animal $animal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Animal $animal)
    {
        //
    }
}
