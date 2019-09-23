<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopController extends \App\Http\Controllers\Controller
{
    public function index()
    {
        $shops = DB::table('shops')->get();
        return response()->json($shops, 200);
    }

    public function show($id)
    {
        $shops = DB::table('shops')->get()->where('id', '=', $id);
        if($shops->isEmpty())
            return response()->json('Tokio elemento nėra.', 440);
        return response()->json($shops, 200);
    }

    public function store(Request $request)
    {
        try {
            DB::table('shops')->insert($request->all());
        }catch (\Exception $exception){
            return response()->json('Įvyko klaida kuriant naują elementą.', 441);
        }
        return response()->json('Elementas buvo sukurtas sėkmingai.',201);
    }

    public function delete($id)
    {
        $shops =DB::table('shops')->delete($id);
        if($shops)
            return response()->json( $shops,204);
        return response()->json('Tokio elemento nėra.', 442);


    }

    public function update($id, Request $request)
    {
        try {
            $shops = DB::table('shops')->get()->where('id', '=', $id);
            if($shops->isEmpty())
                return response()->json('Tokio elemento nėra.', 440);
            DB::table('shops')
                ->where('id', '=', $id)
                ->update($request->all());
        } catch (\Exception $exception) {
            return response()->json('Įvyko klaida atnaujinant duomenis.', 443);
        }
        return response()->json('Duomenys buvo atnaujinti sėkmingai.',209);

    }
}
