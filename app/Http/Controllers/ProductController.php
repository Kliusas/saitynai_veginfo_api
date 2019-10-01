<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
            return response()->json('Tokio elemento nėra.', 440);
        return response()->json($products, 200);
    }

    public function showProductIngredient($idProduct, $idIngredient)
    {
        $product=DB::table('products')->get()->where('id', '=', $idProduct);
        $productsIngredients=explode(", ", $product[0]->ingredients );
        foreach ($productsIngredients as $ingredient){
            $ingredientDB=DB::table('ingredients')->get()->where('name', '=', $ingredient)->where('id','=',$idIngredient);
            if(!$ingredientDB->isEmpty())
            return response()->json($ingredientDB, 200);
        }
        return response()->json('Tokio elemento nėra.', 440);
    }

    public function showAllProductIngredient($id)
    {
        $categoryDishes = DB::table('dishes')->get()->where('category_id', '=', $id);
        if($categoryDishes->isEmpty())
            return response()->json('Tokio elemento nėra.', 440);
        return response()->json($categoryDishes, 200);
    }

    public function store(Request $request)
    {
        try {
            DB::table('products')->insert($request->all());
        }catch (\Exception $exception){
            return response()->json('Įvyko klaida kuriant naują elementą.', 441);
        }
        return response()->json('Elementas buvo sukurtas sėkmingai.',201);

    }

    public function delete($id)
    {
        $products =DB::table('products')->delete($id);
        if($products)
            return response()->json( $products,204);
        return response()->json('Tokio elemento nėra.', 442);


    }

    public function update($id, Request $request)
    {
        try {
            $products = DB::table('products')->get()->where('id', '=', $id);
            if($products->isEmpty())
                return response()->json('Tokio elemento nėra.', 440);
            DB::table('products')
                ->where('id', '=', $id)
                ->update($request->all());
        } catch (\Exception $exception) {
            return response()->json('Įvyko klaida atnaujinant duomenis.', 443);
        }
        return response()->json('Duomenys buvo atnaujinti sėkmingai.',209);

    }
}
