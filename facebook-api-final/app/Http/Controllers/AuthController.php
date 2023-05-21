<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Http\Requests\StoreUserPostRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // TODO REGISTER LOGIN AND LOGOUT 

    public function register(StoreUserPostRequest $request)
    {
        $user = User::create(array(
            'name' => $request->name,
            'email' => $request->email,
            // 'password' => Hash::make($request->password) || TODO NOTE bcrypt and Hash::make are the same...
            'password' => bcrypt($request->password)
        ));
        $token = $user->createToken('FINAL TOKEN', array('select', 'create', 'update', 'delete'))->plainTextToken;
        $response  = [
            'user' => $user,
            'token' => $token,
        ];
        return response()->json(array('message' => 'Register successfully', 'data' => $response), 201);
    }

    public function login(AuthRequest $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('FINAL Token')->plainTextToken;
            return response()->json(array(
                'message' => 'successful login',
                'user' => $user,
                'token' => $token
            ));
        }
        return response()->json(array('message' => 'Invalid credentials'), 401);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json(array('message' => 'Logged out successfully'));
    }
}
