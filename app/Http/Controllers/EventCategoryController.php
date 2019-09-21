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
            return response()->json('Tokio elemento nėra.', 409);
        return response()->json($eventsCategories, 200);
    }

    public function store(Request $request)
    {
        return response()->json(true, 200);
    }

    public function delete($id)
    {
        $eventsCategories =DB::table('event_categories')->delete($id);
        if($eventsCategories)
            return response()->json( $eventsCategories,204);
        return response()->json('Tokio elemento nėra.', 410);


    }

    public function update($id)
    {
        $eventsCategories = DB::table('event_categories')->get()->where('id', '=', $id);
        $eventsCategories->update();
        return response()->json($eventsCategories, 210);
    }
}
