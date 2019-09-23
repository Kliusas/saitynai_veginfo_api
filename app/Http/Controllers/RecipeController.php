<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
            return response()->json('Tokio elemento nėra.', 440);
        return response()->json($recipes, 200);
    }

    public function store(Request $request)
    {
        try {
            DB::table('recipes')->insert($request->all());
        }catch (\Exception $exception){
            return response()->json('Įvyko klaida kuriant naują elementą.', 441);
        }
        return response()->json('Elementas buvo sukurtas sėkmingai.',201);

    }

    public function delete($id)
    {
        $recipes =DB::table('recipes')->delete($id);
        if($recipes)
            return response()->json( $recipes,204);
        return response()->json('Tokio elemento nėra.', 442);


    }

    public function update($id, Request $request)
    {
        try {
            $recipes = DB::table('recipes')->get()->where('id', '=', $id);
            if($recipes->isEmpty())
                return response()->json('Tokio elemento nėra.', 440);
            DB::table('recipes')
                ->where('id', '=', $id)
                ->update($request->all());
        } catch (\Exception $exception) {
            return response()->json('Įvyko klaida atnaujinant duomenis.', 443);
        }
        return response()->json('Duomenys buvo atnaujinti sėkmingai.',209);
    }
}
