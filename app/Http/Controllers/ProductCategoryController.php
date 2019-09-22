<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
                return response()->json('Tokio elemento nėra.', 440);
        return response()->json($productsCategories, 200);
    }

    public function store(Request $request)
    {
        try {
            DB::table('product_categories')->insert(array('name' => $request->all()['name']));
        }catch (\Exception $exception){
            return response()->json('Įvyko klaida kuriant naują elementą.', 441);
        }
        return response()->json('Elementas buvo sukurtas sėkmingai.',201);
    }

    public function delete($id)
    {
        $productsCategories =DB::table('product_categories')->delete($id);
        if($productsCategories)
            return response()->json( $productsCategories,204);
        return response()->json('Tokio elemento nėra.', 442);


    }

    public function update($id, Request $request)
    {
        try {
            $productsCategories = DB::table('product_categories')->get()->where('id', '=', $id);
            if($productsCategories->isEmpty())
                return response()->json('Tokio elemento nėra.', 440);
            DB::table('product_categories')
                ->where('id', '=', $id)
                ->update($request->all());
        } catch (\Exception $exception) {
            return response()->json('Įvyko klaida atnaujinant duomenis.', 443);
        }
        return response()->json('Duomenys buvo atnaujinti sėkmingai.',209);
    }
}
