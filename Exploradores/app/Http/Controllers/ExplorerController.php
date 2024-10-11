<?php

namespace App\Http\Controllers;

use App\Models\Explorer;
use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;

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
    public function register(Request $request)
    {
        $explorer = $request->validate([
            'name' => 'string|required',
            'age' => 'integer|required',
            'email' => 'email|required|unique:explorers,email',
            'password' => [
                'string',
                'required',
                'confirmed',
                Password::min(8)
                    ->mixedCase()
                    ->letters()
                    ->numbers()
                    ->symbols()
            ],
        ]);

        $newExplorer = Explorer::create($explorer);
        $token = $newExplorer->createToken('auth_token')->plainTextToken;

        Inventory::create(['explorer_id' => $newExplorer->id]);
        return response()->json(['explorer'=>$newExplorer, 'token'=>$token], 200);
    }

    public function login(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);

        $explorer = Explorer::where('email', $request->email)->first();
        if(!$explorer || !Hash::check($request->password, $explorer->password)){
            return response()->json('Usuário ou senha incorretos!', 404);
        }

        $token = $explorer->createToken('auth_token')->plainTextToken;

        return response()->json($token, 200);
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
