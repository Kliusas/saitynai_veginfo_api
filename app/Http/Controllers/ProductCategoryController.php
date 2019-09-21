<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

class ProductCategoryController extends \App\Http\Controllers\Controller
{
    public function index()
    {
        $productsCategories = DB::table('product_categories')->get();
        return response()->json($productsCategories, 200);
    }

    public function show($id)
    {
        $productsCategories = DB::table('product_categories')->get()->where('id', '=', $id);
        if($productsCategories->isEmpty())
            return response('Tokio elemento nėra.', 409)->header('Content-Type', 'text/plain');
        return response()->json($productsCategories, 200);
    }

    public function store(Request $request)
    {
        return response('Hello World', 200)->header('Content-Type', 'text/plain');
    }

    public function delete($id)
    {
        $productsCategories =DB::table('product_categories')->delete($id);
        if($productsCategories)
            return response('Patiekalas ištrintas sėkmingai.', 410)->header('Content-Type', 'text/plain');
        return response('Tokio elemento nėra.', 410)->header('Content-Type', 'text/plain');


    }

    public function update($id)
    {
        $productsCategories = DB::table('product_categories')->get()->where('id', '=', $id);
        $productsCategories->update();
        return response('Hello World', 200)->header('Content-Type', 'text/plain');
    }
}
