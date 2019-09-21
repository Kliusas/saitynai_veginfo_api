<?php

namespace App\Http\Controllers;
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
            return response()->json('Tokio elemento nėra.', 409);
        return response()->json($shops, 200);
    }

    public function store(Request $request)
    {
        return response()->json(true, 200);
    }

    public function delete($id)
    {
        $shops =DB::table('shops')->delete($id);
        if($shops)
            return response()->json( $shops,204);
        return response()->json('Tokio elemento nėra.', 410);


    }

    public function update($id)
    {
        $shops = DB::table('shops')->get()->where('id', '=', $id);
        $shops->update();
        return response()->json($shops, 210);
    }
}
