<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserPostRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //TODO to get all users
        $users = User::all();
        return response()->json(array('message' => 'get all users successfully', 'users' => $users), 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserPostRequest $request)
    {
        //TODO CREATE A NEW USERS

        // $VALIDATOR = Validator::make($request->all(), [
        //     'name' => 'required|min:2',
        //     'email' => 'required|email|unique:users,email',
        //     'password' => 'required|string',
        // ]);

        // $VALIDATOR = Validator::make($request->all(), [
        //     'name' => 'required|min:2',
        //     'email' => 'required|email|unique:users,email',
        //     'password' => 'required|string',
        // ]);

        // if ($VALIDATOR->fails()) {
        //     return $VALIDATOR->errors();
        // }
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        return response()->json(array('message' => 'create user successfully', 'user' => $user), 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
