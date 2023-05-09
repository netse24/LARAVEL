<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // TODO Get all posts data
        return Post::all();
    }
    public function getPosts()
    {
        // TODO Get all posts data but only name title and description
        return Post::all('id', 'name', 'title', 'description');
    }
    public function getPostsByDESC()
    {
        // TODO Get all posts data by DESC orderBy
        return Post::orderBy('id', 'desc')->get(); // get mean that get all posts from database
    }
    public function getPostsOrderBy()
    {
        // TODO Get all posts data by DESC orderBy but only id name title and description.
        return Post::orderBy('id', 'desc')->get(array('id', 'name', 'title', 'description')); // if we want to select to columns we can use array inside get function
    }
    public function countPosts()
    {
        // TODO count all posts in database
        return 'All posts is: ' . Post::count();
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //TODO
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //TODO  get a data that id is equal 

        return Post::find($request['id']);
    }
    public function getPrice(Request $request)
    {
        //TODO  get price information 

        return Post::where('price', '=', $request['price'])->get(); // select all items which is equal with price input
        // return Post::where('price', '=', $request['price'])->first(); // just select first item 
    }

    public function getPriceBetween()
    {
        //TODO get all price which are between
        return Post::whereBetween('price', [20, 120])->get();
    }
    public function getPriceGreaterThan()
    {
        //TODO get all price which are greater than 25
        return Post::where('price', '>=', 25)->get();
    }
    public function getPriceLessThan()
    {
        //TODO get all price which are less than 20
        return Post::where('price', '<=', 20)->get();
    }
    public function getBiggestPrice()
    {
        //TODO get the price which is biggest
        return Post::max('price');
    }
    public function getBiggestPost()
    {
        //TODO get the price which is biggest post
        $biggestPrice = Post::max('price');
        return Post::where('price', $biggestPrice)->get();
    }

    public function getPriceNotBetween()
    {
        //TODO get all price which are between
        return Post::whereNotBetween('price', [3, 120])->get();
    }
    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //TODO
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //TODO
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //TODO
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //TODO  
        
    }
}
