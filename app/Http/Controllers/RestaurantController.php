<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

class RestaurantController extends \App\Http\Controllers\Controller
{
    public function index()
    {
        $restaurants = DB::table('restaurants')->get();
        return response()->json($restaurants, 200);
    }

    public function show($id)
    {
        $restaurants = DB::table('restaurants')->get()->where('id', '=', $id);
        if($restaurants->isEmpty())
            return response('Tokio elemento nėra.', 409)->header('Content-Type', 'text/plain');
        return response()->json($restaurants, 200);
    }

    public function store(Request $request)
    {
        return response('Hello World', 200)->header('Content-Type', 'text/plain');
    }

    public function delete($id)
    {
        $restaurants =DB::table('restaurants')->delete($id);
        if($restaurants==0)
            return response('Tokio elemento nėra.', 410)->header('Content-Type', 'text/plain');
        return response('Patiekalas ištrintas sėkmingai.', 410)->header('Content-Type', 'text/plain');


    }

    public function update($id)
    {
        $restaurants = DB::table('restaurants')->get()->where('id', '=', $id);
        $restaurants->update();
        return response('Hello World', 200)->header('Content-Type', 'text/plain');
    }
}
