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
        return response()->json($dishesCategory, 200);
    }
    
    public function store(Request $request)
    {
        return response('Hello World', 200)->header('Content-Type', 'text/plain');
    }
    
    public function delete($id)
    {
        DB::table('dish_categories')->delete($id);
        return response()->json(true, 200);
    }
    
    public function update($id)
    {
        $dishesCategory = DB::table('dish_categories')->get()->where('id', '=', $id);
        $dishesCategory->update();
        return response('Hello World', 200)->header('Content-Type', 'text/plain');
    }
}
