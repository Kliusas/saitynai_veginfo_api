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
            return response()->json('Tokio elemento nėra.', 409);
        return response()->json($dishesCategory, 200);
    }
    
    public function store(Request $request)
    {
        DB::table('dish_categories')->insert(
            array('name' => $request->all()['name'])
        );
        return response()->json(true, 200);
    }
    
    public function delete($id)
    {
        $dishesCategory = DB::table('dish_categories')->delete($id);
        if($dishesCategory)
            return response()->json( $dishesCategory,204);
        return response()->json('Tokio elemento nėra.', 410);
    }
    
    public function update($id, Request $request)
    {
        DB::table('dish_categories')
          ->where('id', '=', $id)
          ->update(array('name' => $request->all()['name']));

        return response()->json('paupdatinau', 210);
    }
}
