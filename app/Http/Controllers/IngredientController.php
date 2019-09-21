<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

class IngredientController extends \App\Http\Controllers\Controller
{
    public function index()
    {
        $ingredients = DB::table('ingredients')->get();
        return response()->json($ingredients, 200);
    }

    public function show($id)
    {
        $ingredients = DB::table('ingredients')->get()->where('id', '=', $id);
        if($ingredients->isEmpty())
            return response()->json('Tokio elemento nėra.', 409);
        return response()->json($ingredients, 200);
    }

    public function store(Request $request)
    {
        return response()->json(true, 200);
    }

    public function delete($id)
    {
        $ingredients =DB::table('ingredients')->delete($id);
        if($ingredients)
            return response()->json( $ingredients,204);
        return response()->json('Tokio elemento nėra.', 410);


    }

    public function update($id)
    {
        $ingredients = DB::table('ingredients')->get()->where('id', '=', $id);
        $ingredients->update();
        return response()->json($ingredients, 210);
    }
}
