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
            return response('Tokio elemento nėra.', 409)->header('Content-Type', 'text/plain');
        return response()->json($ingredients, 200);
    }

    public function store(Request $request)
    {
        return response('Hello World', 200)->header('Content-Type', 'text/plain');
    }

    public function delete($id)
    {
        $ingredients =DB::table('ingredients')->delete($id);
        if($ingredients==0)
            return response('Tokio elemento nėra.', 410)->header('Content-Type', 'text/plain');
        return response('Patiekalas ištrintas sėkmingai.', 410)->header('Content-Type', 'text/plain');


    }

    public function update($id)
    {
        $ingredients = DB::table('ingredients')->get()->where('id', '=', $id);
        $ingredients->update();
        return response('Hello World', 200)->header('Content-Type', 'text/plain');
    }
}
