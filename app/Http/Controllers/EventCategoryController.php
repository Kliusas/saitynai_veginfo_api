<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventCategoryController extends \App\Http\Controllers\Controller
{
    public function index()
    {
        $eventsCategories = DB::table('event_categories')->get();
        return response()->json($eventsCategories, 200);
    }

    public function show($id)
    {
        $eventsCategories = DB::table('event_categories')->get()->where('id', '=', $id);
        if($eventsCategories->isEmpty())
            return response()->json('Tokio elemento nėra.', 440);
        return response()->json($eventsCategories, 200);
    }

    public function store(Request $request)
    {
        try {
            DB::table('event_categories')->insert($request->all());
        }catch (\Exception $exception){
            return response()->json('Įvyko klaida kuriant naują elementą.', 441);
        }
        return response()->json('Elementas buvo sukurtas sėkmingai.',201);
    }

    public function delete($id)
    {
        $eventsCategories =DB::table('event_categories')->delete($id);
        if($eventsCategories)
            return response()->json( $eventsCategories,204);
        return response()->json('Tokio elemento nėra.', 442);


    }

    public function update($id, Request $request)
    {
        try {
            $eventsCategories = DB::table('event_categories')->get()->where('id', '=', $id);
            if($eventsCategories->isEmpty())
                return response()->json('Tokio elemento nėra.', 440);
            DB::table('event_categories')
                ->where('id', '=', $id)
                ->update($request->all());
        } catch (\Exception $exception) {
            return response()->json('Įvyko klaida atnaujinant duomenis.', 443);
        }
        return response()->json('Duomenys buvo atnaujinti sėkmingai.',209);

    }
}
