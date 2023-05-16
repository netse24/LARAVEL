<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //TODO
        $products  =  Product::all();
        return response()->json(array('message' => 'Success', 'data' => $products), 200);
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
        //TODO 
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:5',
            'description' => 'nullable',
            'price' => 'required', 'numeric'
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }
        $product = Product::create($validator->validate());
        return response()->json(array('message' => 'Created successfully'), 200);
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
        //TODO update data 
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:5',
            'description' => 'nullable',
            'price' => 'required', 'numeric'
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }
        $product = Product::find($id)->update($validator->validate());
        return response()->json(array('message' => 'Updated successfully'), 200);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //TODO destroy 

        $product = Product::destroy($id);
        return response()->json(array('message' => 'Destroy successfully'), 200);
    }
}
