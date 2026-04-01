<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthApiController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {

            $user = User::find(Auth::user()->id);

            $token = $user->createToken("access_token");

            return response()->json(['token' => $token->plainTextToken]);


        }

        return response()->json('Unauthorized', 401);
    }

    public function revokeToken(Request $request)
    {
        $user = User::find(Auth::user()->id);

        $user->tokens()->delete();

        return response()->json('Token revogado com sucesso');
    }
}
