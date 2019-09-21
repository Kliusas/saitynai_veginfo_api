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
            return response('Tokio elemento nėra.', 409)->header('Content-Type', 'text/plain');
        return response()->json($products, 200);
    }

    public function store(Request $request)
    {
        return response('Hello World', 200)->header('Content-Type', 'text/plain');
    }

    public function delete($id)
    {
        $products =DB::table('products')->delete($id);
        if($products==0)
            return response('Tokio elemento nėra.', 410)->header('Content-Type', 'text/plain');
        return response('Patiekalas ištrintas sėkmingai.', 410)->header('Content-Type', 'text/plain');


    }

    public function update($id)
    {
        $products = DB::table('products')->get()->where('id', '=', $id);
        $products->update();
        return response('Hello World', 200)->header('Content-Type', 'text/plain');
    }
}
