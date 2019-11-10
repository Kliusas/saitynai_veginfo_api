<?php

namespace App\Http\Controllers;
// KK

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductCategoryController extends \App\Http\Controllers\Controller
{
    public function index()
    {
        $productsCategories = DB::table('product_categories')->get();
        return response()->json($productsCategories, 200)->header('Content-Type', 'application/json');
    }

    public function show($id)
    {
        $productsCategories = DB::table('product_categories')->get()->where('id', '=', $id);
        if($productsCategories->isEmpty())
                return response()->json('Tokio elemento nėra.', 404)->header('Content-Type', 'application/json');
        return response()->json($productsCategories, 200)->header('Content-Type', 'application/json');
    }

    public function showCategoryProduct($idCategory, $idProduct)
    {
        $categoryProduct = DB::table('products')->get()->where('id', '=', $idProduct)->where('category_id', '=', $idCategory);
        if($categoryProduct->isEmpty())
            return response()->json('Tokio elemento nėra.', 404)->header('Content-Type', 'application/json');
        return response()->json($categoryProduct, 200)->header('Content-Type', 'application/json');
    }

    public function showAllCategoryProducts($id)
    {
        $categoryProducts = DB::table('products')->get()->where('category_id', '=', $id);
        if($categoryProducts->isEmpty())
            return response()->json('Tokio elemento nėra.', 404)->header('Content-Type', 'application/json');
        return response()->json($categoryProducts, 200)->header('Content-Type', 'application/json');
    }

    public function store(Request $request)
    {
        try {
            DB::table('product_categories')->insert(array('name' => $request->all()['name']));
        }catch (\Exception $exception){
            return response()->json('Įvyko klaida kuriant naują elementą.', 404)->header('Content-Type', 'application/json');
        }
        return response()->json('Elementas buvo sukurtas sėkmingai.',200)->header('Content-Type', 'application/json');
    }

    public function delete($id)
    {
        $productsCategories =DB::table('product_categories')->delete($id);
        if($productsCategories)
            return response()->json( $productsCategories,200)->header('Content-Type', 'application/json');
        return response()->json('Tokio elemento nėra.', 404)->header('Content-Type', 'application/json');


    }

    public function update($id, Request $request)
    {
        try {
            $productsCategories = DB::table('product_categories')->get()->where('id', '=', $id);
            if($productsCategories->isEmpty())
                return response()->json('Tokio elemento nėra.', 200);
            DB::table('product_categories')
                ->where('id', '=', $id)
                ->update($request->all());
        } catch (\Exception $exception) {
            return response()->json('Įvyko klaida atnaujinant duomenis.', 404)->header('Content-Type', 'application/json');
        }
        return response()->json('Duomenys buvo atnaujinti sėkmingai.',200)->header('Content-Type', 'application/json');
    }
}
