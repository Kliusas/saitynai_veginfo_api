<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DishCategoryController extends \App\Http\Controllers\Controller
{
    public function index()
    {
        $dishesCategories = DB::table('dish_categories')->get();
        return response()->json($dishesCategories, 200);
    }
    
    public function show($id)
    {
        $dishesCategory = DB::table('dish_categories')->get()->where('id', '=', $id);
        if($dishesCategory->isEmpty())
            return response()->json('Tokio elemento nėra.', 440);
        return response()->json($dishesCategory, 200);
    }

    public function showCategoryDish($idCategory, $idDish)
    {
        $categoryDish = DB::table('dishes')->get()->where('id', '=', $idDish)->where('category_id', '=', $idCategory);
        if($categoryDish->isEmpty())
            return response()->json('Tokio elemento nėra.', 440);
        return response()->json($categoryDish, 200);
    }

    public function showAllCategoryDishes($id)
    {
        $categoryDishes = DB::table('dishes')->get()->where('category_id', '=', $id);
        if($categoryDishes->isEmpty())
            return response()->json('Tokio elemento nėra.', 440);
        return response()->json($categoryDishes, 200);
    }
    
    public function store(Request $request)
    {
        try {
            DB::table('dish_categories')->insert($request->all());
        }catch (\Exception $exception){
            return response()->json('Įvyko klaida kuriant naują elementą.', 441);
        }
        return response()->json('Elementas buvo sukurtas sėkmingai.',201);

    }
    
    public function delete($id)
    {
        $dishesCategory = DB::table('dish_categories')->delete($id);
        if($dishesCategory)
            return response()->json( $dishesCategory,204);
        return response()->json('Tokio elemento nėra.', 442);
    }
    
    public function update($id, Request $request)
    {
        try {
            $dishesCategory = DB::table('dish_categories')->get()->where('id', '=', $id);
            if($dishesCategory->isEmpty())
                return response()->json('Tokio elemento nėra.', 440);
            DB::table('dish_categories')
                ->where('id', '=', $id)
                ->update($request->all());
        } catch (\Exception $exception) {
            return response()->json('Įvyko klaida atnaujinant duomenis.', 443);
        }
        return response()->json('Duomenys buvo atnaujinti sėkmingai.',209);
    }
}
