<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

class DishController extends \App\Http\Controllers\Controller
{
    public function index()
    {
        $dishes = DB::table('dishes')->get();
        return response()->json($dishes, 200);
    }

    public function show($id)
    {
        $dishes = DB::table('dishes')->get()->where('id', '=', $id);
        if($dishes->isEmpty())
            return response('Tokio elemento nėra.', 409)->header('Content-Type', 'text/plain');
        return response()->json($dishes, 200);
    }

    public function store(Request $request)
    {
        return response('Hello World', 200)->header('Content-Type', 'text/plain');
    }

    public function delete($id)
    {
        $dishes =DB::table('dishes')->delete($id);
        if($dishes==0)
            return response('Tokio elemento nėra.', 410)->header('Content-Type', 'text/plain');
        return response('Patiekalas ištrintas sėkmingai.', 410)->header('Content-Type', 'text/plain');


    }

    public function update($id)
    {
        $dishes = DB::table('dishes')->get()->where('id', '=', $id);
        $dishes->update();
        return response('Hello World', 200)->header('Content-Type', 'text/plain');
    }
}
