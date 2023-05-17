<?php

namespace App\Http\Controllers;

use App\Models\{User};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // TODO  register 
    public function register(Request $request)
    {
        $fields = $request->validate(array(
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed'
        ));

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password'])
        ]);

        $token = $user->createToken('API Token', array('*'))->plainTextToken;

        $response  = [
            'user' => $user,
            'token' => $token,
        ];
        return response()->json(array('message' => 'Register successfully', 'data' => $response), 201);
    }

    // TODO by video -------------------------------------

    public function login(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        // check name 
        $name = User::where('name', $fields['name'])->first();

        // check email
        $user = User::where('email', $fields['email'])->first();

        // check password or field validity

        if (!$name || !$user || !Hash::check($fields['password'], $user->password)) {
            return response()->json(array('error' => 'Invalid field!'), 401);
        }

        $token = $user->createToken('API Token', ['*'])->plainTextToken;

        $response  = [
            'user' => $user,
            'token' => $token,
        ];
        return response()->json(array('message' => 'Login successfully', 'data' => $response), 201);
    }

    // TODO TEACHER IS DEMOSTRATINGS 

    // public function login(Request $request)
    // {
    //     $credential = $request->only('name', 'email', 'password');
    //     $credential = $request->validate(array(
    //         'name' => 'required|string',
    //         'email' => 'required|string',
    //         'password' => 'required',
    //     ));

    //     if (Auth::attempt($credential)) {

    //         $user = Auth::user();
    //         $token = $user->createToken('API token', ['create', 'update', 'delete'])->plainTextToken;
    //         return response()->json(array(
    //             'user' => $user,
    //             'token' => $token
    //         ));
    //     }

    //     return response()->json(array('message' => 'Invalid field'), 401);
    // }


    public function logout(Request $request)
    {
        // $user = Auth::user()->tokens()->delete();
        $user = $request->user()->tokens()->delete();
        return [
            'message' => 'Logout successfully',
            'logout' => $user
        ];
    }
}
