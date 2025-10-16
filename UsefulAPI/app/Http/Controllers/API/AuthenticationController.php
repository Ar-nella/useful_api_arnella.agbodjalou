<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Models\User;



class AuthenticationController extends Controller
{
    //Function to register
    public function register(Request $request)
    {

        $validated = $request->validate([
            'name' => 'string|required',
            'email' => 'required|email|unique:users',
            'password' => 'string|required|confirmed|min:8',
            // 'password_confirmation'=> 'required'

        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        // if(!$user){
        //     throw ValidationException::withMessages([
        //         'user'=> ['Error during registration'],
        //     ]);
        // }

        return response()->json([
            // 'message'=> 'User registered successfully',
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'created_at' => $user->created_at,
        ], 201);
    }

    //Function to login
    public function login(Request $request)
    {

        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',

        ]);

        $user = User::where('email', $request->email)->first();

        if (!Auth::attempt($request->only('email', 'password'))) {
            throw ValidationException::withMessages([
                'email' => ['Invalid credentials'],
            ]);
            return response()->json([ 'status_message' => 'Invalid credentials'], 401);
        }

        $token = $user->createToken('API token')->plainTextToken;

        return response()->json([
            'token' => $token,
            'user_id'=>$user->id
        ], 200);
    }

    //Function to get User's Informations


}
