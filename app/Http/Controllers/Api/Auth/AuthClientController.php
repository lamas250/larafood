<?php

namespace App\Http\Controllers\Api\Auth;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\ClientResource;

class AuthClientController extends Controller
{
    public function auth(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'required',
        ]);

        $client = Client::where('email',$request->email)->first();

        if(!$client || !Hash::check($request->password, $client->password)){
            return response()->json(['message' => 'Credenciais Invalidas'],404);
        }

        $token = $client->createToken('device_name')->plainTextToken;

        return response()->json(['token' => $token]);
    }

    public function me(Request $request)
    {
        $client = $request->user();

        return new ClientResource($client);
    }

    public function logout(Request $request)
    {
        $client = $request->user();

        // Retirar todos os tokens
        $client->tokens()->delete();

        return response()->json([],204);
    }
}
