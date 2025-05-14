<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'errors',
                'errors' => $validator->errors()
            ], 422);
        }
        $validated = $validator->validated();
        $newUser = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);
        return response()->json([
            'status' => 'Berhasil membuat user',
            'user' => $newUser,
        ], 201);
    
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::where('id', $id)->first();
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
            $user = User::where('id', $id)->first();
            if(!User::where('id', $id)->exists()) {
                return response()->json([
                    'status' => 'User tidak ditemukan',
                ], 404);
            }

            $validator = Validator::make($request->all(), [
                'name' => 'nullable|unique:users,name',
                'email' => 'nullable|unique:users,email|email',
                'password' => 'nullable|min:5|max:10',
            ]);
            if($validator->fails()){
                return response()->json([
                    'status' => 'gagal',
                    'errors' => $validator->errors()
                ]);
            }
            $validated = $validator->validated();
            $user->update($validated);
            return response()->json([
                'status' => 'Berhasil mengubah data','name' => $user->name,
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::where('id', $id)->first();
        if(!User::where('id', $id)->exists()) {
            return response()->json([
                'status' => 'User tidak ditemukan',
            ], 404);
        }
        $user->delete();
        return response()->json([
            'status' => 'Berhasil menghapus user',
        ], 200);
    }
}
