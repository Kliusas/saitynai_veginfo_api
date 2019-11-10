<?php

namespace App\Http\Controllers;
// KK

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IngredientController extends \App\Http\Controllers\Controller
{
    public function index()
    {
        $ingredients = DB::table('ingredients')->get();
        return response()->json($ingredients, 200)->header('Content-Type', 'application/json');
    }

    public function show($id)
    {
        $ingredients = DB::table('ingredients')->get()->where('id', '=', $id);
        if($ingredients->isEmpty())
            return response()->json('Tokio elemento nėra.', 404)->header('Content-Type', 'application/json');
        return response()->json($ingredients, 200)->header('Content-Type', 'application/json');
    }

    public function store(Request $request)
    {
        try {
            DB::table('ingredients')->insert(array('name' => $request->all()['name']));
        }catch (\Exception $exception){
            return response()->json('Įvyko klaida kuriant naują elementą.', 404)->header('Content-Type', 'application/json');
        }
        return response()->json('Elementas buvo sukurtas sėkmingai.',200)->header('Content-Type', 'application/json');
    }

    public function delete($id)
    {
        $ingredients =DB::table('ingredients')->delete($id);
        if($ingredients)
            return response()->json( $ingredients,200)->header('Content-Type', 'application/json');
        return response()->json('Tokio elemento nėra.', 404)->header('Content-Type', 'application/json');


    }

    public function update($id, Request $request)
    {
        try {
            $ingredients = DB::table('ingredients')->get()->where('id', '=', $id);
            if($ingredients->isEmpty())
                return response()->json('Tokio elemento nėra.', 404);
            DB::table('ingredients')
                ->where('id', '=', $id)
                ->update($request->all());
        } catch (\Exception $exception) {
            return response()->json('Įvyko klaida atnaujinant duomenis.', 404);
        }
        return response()->json('Duomenys buvo atnaujinti sėkmingai.',200);
    }
}
