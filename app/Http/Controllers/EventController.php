<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventController extends \App\Http\Controllers\Controller
{
    public function index()
    {
        $events = DB::table('events')->get();
        return response()->json($events, 200);
    }

    public function show($id)
    {
        $events = DB::table('events')->get()->where('id', '=', $id);
        if($events->isEmpty())
                return response()->json('Tokio elemento nėra.', 440);
        return response()->json($events, 200);
    }

    public function store(Request $request)
    {
        try {
            DB::table('events')->insert($request->all());
        }catch (\Exception $exception){
            return response()->json('Įvyko klaida kuriant naują elementą.', 441);
        }
        return response()->json('Elementas buvo sukurtas sėkmingai.',201);

    }

    public function delete($id)
    {
        $events =DB::table('events')->delete($id);
        if($events)
            return response()->json( $events,204);
        return response()->json('Tokio elemento nėra.', 442);


    }

    public function update($id, Request $request)
    {
        try {
            $events = DB::table('events')->get()->where('id', '=', $id);
            if($events->isEmpty())
                return response()->json('Tokio elemento nėra.', 440);
            DB::table('events')
                ->where('id', '=', $id)
                ->update($request->all());
        } catch (\Exception $exception) {
            return response()->json('Įvyko klaida atnaujinant duomenis.', 443);
        }
        return response()->json('Duomenys buvo atnaujinti sėkmingai.',209);
    }
}
