<?php

namespace App\Http\Controllers;

class DishController extends \App\Http\Controllers\Controller
{
    public function index()
    {
        return response('Hello World', 200)
            ->header('Content-Type', 'text/plain');
    }
    
    public function store()
    {
        return response('Hello World', 200)
            ->header('Content-Type', 'text/plain');
    }
    
    public function delete()
    {
        return response('Hello World', 200)
            ->header('Content-Type', 'text/plain');
    }
    
    public function update()
    {
        return response('Hello World', 200)
            ->header('Content-Type', 'text/plain');
    }
}
