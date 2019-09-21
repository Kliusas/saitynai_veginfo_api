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
            return response()->json('Tokio elemento nėra.', 409);
        return response()->json($dishes, 200);
    }

    public function store(Request $request)
    {
        return response()->json(true, 200);
    }

    public function delete($id)
    {
        $dishes =DB::table('dishes')->delete($id);
        if($dishes)
            return response()->json( $dishes,204);
        return response()->json('Tokio elemento nėra.', 410);

    }

    public function update($id)
    {
        $dishes = DB::table('dishes')->get()->where('id', '=', $id);
        $dishes->update();
        return response()->json($dishes, 210);
    }
}
