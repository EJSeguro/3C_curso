<?php

namespace App\Http\Controllers;

use App\Models\Explorer;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Location::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $location = $request->validate([
            'latitude' => 'numeric|required',
            'longitude' => 'numeric|required',
            'explorer_id' => 'numeric|required|exists:explorers,id',
        ]);
        $newLocation = Location::create($location);
        return response()->json($newLocation, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Explorer $explorer)
    {
        return response()->json([
            'explorer' => [
                'id' => $explorer->id,
                'name' => $explorer->name,
            ],
            'location' => [
                'latitude' => $explorer->location()->latitude,
                'longitude' => $explorer->location()->longitude,
                'visited_at' => $explorer->location()->created_at,
            ]
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Location $location)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Location $location)
    {
        //
    }

    public function showAll(Explorer $explorer)
    {
        $locations = $explorer->locations;
        return response()->json($locations, 200);
    }
}
