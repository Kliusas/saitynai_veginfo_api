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
            return response('Tokio elemento nėra.', 409)->header('Content-Type', 'text/plain');
        return response()->json($shops, 200);
    }

    public function store(Request $request)
    {
        return response('Hello World', 200)->header('Content-Type', 'text/plain');
    }

    public function delete($id)
    {
        $shops =DB::table('shops')->delete($id);
        if($shops)
            return response('Patiekalas ištrintas sėkmingai.', 410)->header('Content-Type', 'text/plain');
        return response('Tokio elemento nėra.', 410)->header('Content-Type', 'text/plain');


    }

    public function update($id)
    {
        $shops = DB::table('shops')->get()->where('id', '=', $id);
        $shops->update();
        return response('Hello World', 200)->header('Content-Type', 'text/plain');
    }
}
