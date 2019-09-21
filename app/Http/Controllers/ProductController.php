<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

class ProductController extends \App\Http\Controllers\Controller
{
    public function index()
    {
        $products = DB::table('products')->get();
        return response()->json($products, 200);
    }

    public function show($id)
    {
        $products = DB::table('products')->get()->where('id', '=', $id);
        if($products->isEmpty())
            return response()->json('Tokio elemento nėra.', 409);
        return response()->json($products, 200);
    }

    public function store(Request $request)
    {
        return response()->json(true, 200);
    }

    public function delete($id)
    {
        $products =DB::table('products')->delete($id);
        if($products)
            return response()->json( $products,204);
        return response()->json('Tokio elemento nėra.', 410);


    }

    public function update($id)
    {
        $products = DB::table('products')->get()->where('id', '=', $id);
        $products->update();
        return response()->json($products, 210);
    }
}
