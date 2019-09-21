<?php

namespace App\Http\Controllers;
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
                return response()->json('Tokio elemento nėra.', 409);
        return response()->json($events, 200);
    }

    public function store(Request $request)
    {
        return response()->json(true, 200);
    }

    public function delete($id)
    {
        $events =DB::table('events')->delete($id);
        if($events)
            return response()->json( $events,204);
        return response()->json('Tokio elemento nėra.', 410);


    }

    public function update($id)
    {
        $events = DB::table('events')->get()->where('id', '=', $id);
        $events->update();
        return response()->json($events, 210);
    }
}
