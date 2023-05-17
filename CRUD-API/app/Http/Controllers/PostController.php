<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post =  Post::all();
        return response()->json(array('status' => true, 'data' => $post), 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $store = Post::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);
        return response()->json(array('status' => true, 'data' => $store), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $show = Post::find($id);
        return response()->json(array('status' => true, 'data' => $show), 202);
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
        $update = Post::where('id', $id)->update([
            'title' => $request->title,
            'description' => $request->description
        ]);

        return response()->json(array('status' => 'succeess', 'updated' => $update), 202);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Post::where('id', $id)->delete();
    }
}
