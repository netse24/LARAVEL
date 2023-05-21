<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         //TODO get all comments 
         $comments = Comment::all();
         return response()->json(array('message' => 'get all comments successfully', 'comments' => $comments), 200);
        
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
        //TODO create new comment 
        $VALIDATOR = Validator::make($request->all(), [
            'text' => 'required|string',
            'user_id' => 'required|integer',
            'post_id' => 'required|integer',
        ]);

        if ($VALIDATOR->fails()) {
            return $VALIDATOR->errors();
        }
        $comment = Comment::create($VALIDATOR->validate());
        return response()->json(array('message' => 'create user successfully', 'comment' => $comment), 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
