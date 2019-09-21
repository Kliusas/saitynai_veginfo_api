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
                return response()->json('Tokio elemento nėra.', 409);
        return response()->json($productsCategories, 200);
    }

    public function store(Request $request)
    {
        return response()->json(true, 200);
    }

    public function delete($id)
    {
        $productsCategories =DB::table('product_categories')->delete($id);
        if($productsCategories)
            return response()->json( $productsCategories,204);
        return response()->json('Tokio elemento nėra.', 410);


    }

    public function update($id)
    {
        $productsCategories = DB::table('product_categories')->get()->where('id', '=', $id);
        $productsCategories->update();
        return response()->json($productsCategories, 210);
    }
}
