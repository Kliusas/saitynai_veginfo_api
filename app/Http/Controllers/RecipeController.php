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
            return response('Tokio elemento nėra.', 409)->header('Content-Type', 'text/plain');
        return response()->json($recipes, 200);
    }

    public function store(Request $request)
    {
        return response('Hello World', 200)->header('Content-Type', 'text/plain');
    }

    public function delete($id)
    {
        $recipes =DB::table('recipes')->delete($id);
        if($recipes)
            return response('Patiekalas ištrintas sėkmingai.', 410)->header('Content-Type', 'text/plain');
        return response('Tokio elemento nėra.', 410)->header('Content-Type', 'text/plain');


    }

    public function update($id)
    {
        $recipes = DB::table('recipes')->get()->where('id', '=', $id);
        $recipes->update();
        return response('Hello World', 200)->header('Content-Type', 'text/plain');
    }
}
