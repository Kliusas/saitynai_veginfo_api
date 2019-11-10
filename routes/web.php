<?php
Route::get('/login', function () {
    return view('auth.login');
})->name("login");
