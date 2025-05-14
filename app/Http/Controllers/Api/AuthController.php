<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\LoginResource;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['message' => 'Invalid Credentials'], 401);
        }

        $user = Auth::user();
        $token = $user->createToken('lulus-semua')->plainTextToken;

        return response()->json([
            'user' => new LoginResource($user),
            'token' => $token,
            'message' => 'Login Berhasil',
        ]);
    }

    public function register(RegisterRequest $request)
    {
        $newUser = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'email_verified_at' => Carbon::now(),
        ]);

        Auth::login($newUser);
        $token = $newUser->createToken('lulus-semua')->plainTextToken;
        return response()->json([
            'user' => $newUser,
            'token' => $token,
            'message' => 'Register Berhasil'
        ]);
    }

    public function logout(Request $request)
    {
        if($request->user()){
            $request->user()->tokens()->delete();
        }

        return response()->json([
            'message' => 'Logout Berhasil'
        ], 204);
    }
}
