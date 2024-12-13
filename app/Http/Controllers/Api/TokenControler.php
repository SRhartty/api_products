<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TokenControler extends Controller
{
    public function token(Request $request): \Illuminate\Http\JsonResponse
    {
        $user = User::where('email', $request->email)->first();

        if(!$user || !Hash::check($request->password, $user->password)){
            return response()->json(['message' => 'credencial invalida'], 401);
        }

        $user->tokens()->delete();

        $token = $user->createToken($request->token_name, ['*']);

        return response()->json(['Token'=> $token->plainTextToken]);
    }
}
