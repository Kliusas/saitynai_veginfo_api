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
            return response('Tokio elemento nėra.', 409)->header('Content-Type', 'text/plain');
        return response()->json($events, 200);
    }

    public function store(Request $request)
    {
        return response('Hello World', 200)->header('Content-Type', 'text/plain');
    }

    public function delete($id)
    {
        $events =DB::table('events')->delete($id);
        if($events)
            return response('Patiekalas ištrintas sėkmingai.', 410)->header('Content-Type', 'text/plain');
        return response('Tokio elemento nėra.', 410)->header('Content-Type', 'text/plain');


    }

    public function update($id)
    {
        $events = DB::table('events')->get()->where('id', '=', $id);
        $events->update();
        return response('Hello World', 200)->header('Content-Type', 'text/plain');
    }
}
