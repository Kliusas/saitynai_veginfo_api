<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

class RecipeController extends \App\Http\Controllers\Controller
{
    public function index()
    {
        $recipes = DB::table('recipes')->get();
        return response()->json($recipes, 200);
    }

    public function show($id)
    {
        $recipes = DB::table('recipes')->get()->where('id', '=', $id);
        if($recipes->isEmpty())
            return response()->json('Tokio elemento nėra.', 409);
        return response()->json($recipes, 200);
    }

    public function store(Request $request)
    {
        return response()->json(true, 200);
    }

    public function delete($id)
    {
        $recipes =DB::table('recipes')->delete($id);
        if($recipes)
            return response()->json( $recipes,204);
        return response()->json('Tokio elemento nėra.', 410);


    }

    public function update($id)
    {
        $recipes = DB::table('recipes')->get()->where('id', '=', $id);
        $recipes->update();
        return response()->json($recipes, 210);
    }
}
