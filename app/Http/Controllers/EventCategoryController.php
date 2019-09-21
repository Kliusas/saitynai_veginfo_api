<?php

namespace App\Http\Controllers;
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
            return response('Tokio elemento nėra.', 409)->header('Content-Type', 'text/plain');
        return response()->json($eventsCategories, 200);
    }

    public function store(Request $request)
    {
        return response('Hello World', 200)->header('Content-Type', 'text/plain');
    }

    public function delete($id)
    {
        $eventsCategories =DB::table('event_categories')->delete($id);
        if($eventsCategories)
            return response('Patiekalas ištrintas sėkmingai.', 410)->header('Content-Type', 'text/plain');
        return response('Tokio elemento nėra.', 410)->header('Content-Type', 'text/plain');


    }

    public function update($id)
    {
        $eventsCategories = DB::table('event_categories')->get()->where('id', '=', $id);
        $eventsCategories->update();
        return response('Hello World', 200)->header('Content-Type', 'text/plain');
    }
}
