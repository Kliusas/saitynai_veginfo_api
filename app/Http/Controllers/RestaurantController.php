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
            return response()->json('Tokio elemento nėra.', 409);
        return response()->json($restaurants, 200);
    }

    public function store(Request $request)
    {
        return response()->json(true, 200);
    }

    public function delete($id)
    {
        $restaurants =DB::table('restaurants')->delete($id);
        if($restaurants)
            return response()->json( $restaurants,204);
        return response()->json('Tokio elemento nėra.', 410);


    }

    public function update($id)
    {
        $restaurants = DB::table('restaurants')->get()->where('id', '=', $id);
        $restaurants->update();
        return response()->json($restaurants, 210);
    }
}
