<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
            return response()->json('Tokio elemento nėra.', 440);
        return response()->json($dishes, 200);
    }

    public function store(Request $request)
    {
        try {
            DB::table('dishes')->insert(array($request->all()));
        }catch (\Exception $exception){
            return response()->json('Įvyko klaida kuriant naują elementą.', 441);
        }
        return response()->json('Elementas buvo sukurtas sėkmingai.',201);

    }

    public function delete($id)
    {
        $dishes =DB::table('dishes')->delete($id);
        if($dishes)
            return response()->json( $dishes,204);
        return response()->json('Tokio elemento nėra.', 442);

    }

    public function update($id, Request $request)
    {
        try {
            $dishes = DB::table('dishes')->get()->where('id', '=', $id);
            if($dishes->isEmpty())
                return response()->json('Tokio elemento nėra.', 440);
            DB::table('dishes')
                ->where('id', '=', $id)
                ->update($request->all());
        } catch (\Exception $exception) {
            return response()->json('Įvyko klaida atnaujinant duomenis.', 443);
        }
        return response()->json('Duomenys buvo atnaujinti sėkmingai.',209);
    }
}
