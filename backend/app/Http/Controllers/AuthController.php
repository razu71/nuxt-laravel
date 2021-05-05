<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        try {
            $user = User::where('email', $request->email)->first();
            if ($user) {
                if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                    $token = $user->createToken($request->email)->accessToken;
                    return response()->json(['success' => true, 'token' => $token, 'type' => 'Bearer', 'user' => $user]);
                } else {
                    return response()->json(['success' => false]);
                }
            } else {
                return response()->json(['success' => false]);
            }

        } catch (\Exception $e) {
            return response()->json(['success' => false]);
        }
    }

    public function user()
    {
        return response()->json(['user' => Auth::user()]);
    }

    public function logout()
    {
        $user = Auth::user()->token();
        $user->revoke();
        return response()->json(['success' =>true]);
    }
}
