<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Http\Resources\ShowPostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //TODO get all posts 
        $posts = Post::all();
        return response()->json(array('message' => 'get all posts successfully', 'posts' => $posts), 200);
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
        //TODO create a post

        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'description' => 'required|string',
            'user_id' => 'required',
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }
        $post = Post::create($validator->validate());
        return response()->json(array('message' => 'create a post successfully', 'post' => $post), 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $post =  Post::find($id);
        $post  = new ShowPostResource($post);
        return response()->json(array('message' => 'success', 'data' => $post), 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }

    // public function PostLikeWithComment(Request $request, string $id)
    // {
    //     $post =  Post::find($id);
    //     $post1  = new ShowPostResource($post);
    //     return $post1;

    // }
}
