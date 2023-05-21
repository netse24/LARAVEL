<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //TODO get all likes 
        $likes = Like::all();
        return response()->json(array('message' => 'get all likes successfully', 'likes' => $likes), 200);
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
    public function store(Request $request)
    {
        //TODO create a like

        $VALIDATOR = Validator::make($request->all(), [
            'like_number' => 'required|integer',
            'user_id' => 'required|integer',
            'post_id' => 'required|integer',
        ]);

        if ($VALIDATOR->fails()) {
            return $VALIDATOR->errors();
        }
        $like = Like::create($VALIDATOR->validate());
        return response()->json(array('message' => 'create a like successfully', 'like' => $like), 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Like $like)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Like $like)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Like $like)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Like $like)
    {
        //
    }
}
