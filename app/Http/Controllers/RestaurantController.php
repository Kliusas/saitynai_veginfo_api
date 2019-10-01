<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
            return response()->json('Tokio elemento nėra.', 440);
        return response()->json($restaurants, 200);
    }

    public function showRestaurantDish($idRestaurant, $idDish)
    {
        $restaurantDish = DB::table('dishes')->get()->where('id', '=', $idDish)->where('restaurant_id', '=', $idRestaurant);
        if($restaurantDish->isEmpty())
            return response()->json('Tokio elemento nėra.', 440);
        return response()->json($restaurantDish, 200);
    }

    public function showAllRestaurantDishes($id)
    {
        $restaurantDishes = DB::table('dishes')->get()->where('restaurant_id', '=', $id);
        if($restaurantDishes->isEmpty())
            return response()->json('Tokio elemento nėra.', 440);
        return response()->json($restaurantDishes, 200);
    }

    public function store(Request $request)
    {
        try {
            DB::table('restaurants')->insert($request->all());
        }catch (\Exception $exception){
            return response()->json('Įvyko klaida kuriant naują elementą.', 441);
        }
        return response()->json('Elementas buvo sukurtas sėkmingai.',201);
    }

    public function delete($id)
    {
        $restaurants =DB::table('restaurants')->delete($id);
        if($restaurants)
            return response()->json( $restaurants,204);
        return response()->json('Tokio elemento nėra.', 442);
    }

    public function update($id, Request $request)
    {
        try {
            $restaurants = DB::table('restaurants')->get()->where('id', '=', $id);
            if($restaurants->isEmpty())
                return response()->json('Tokio elemento nėra.', 440);
            DB::table('restaurants')
                ->where('id', '=', $id)
                ->update($request->all());
        } catch (\Exception $exception) {
            return response()->json('Įvyko klaida atnaujinant duomenis.', 443);
        }
        return response()->json('Duomenys buvo atnaujinti sėkmingai.',209);

    }
}
