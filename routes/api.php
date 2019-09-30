<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('dishes-categories', 'DishCategoryController@index')->middleware('auth:api');
Route::get('dishes-categories/{id}', 'DishCategoryController@show');
Route::post('dishes-categories', 'DishCategoryController@store');
Route::delete('dishes-categories/{id}', 'DishCategoryController@delete');
Route::patch('dishes-categories/{id}', 'DishCategoryController@update');


Route::get('dishes', 'DishController@index');
Route::get('dishes/{id}', 'DishController@show');
Route::post('dishes', 'DishController@store');
Route::delete('dishes/{id}', 'DishController@delete');
Route::patch('dishes/{id}', 'DishController@update');


Route::get('event-categories', 'EventCategoryController@index');
Route::get('event-categories/{id}', 'EventCategoryController@show');
Route::post('event-categories', 'EventCategoryController@store');
Route::delete('event-categories/{id}', 'EventCategoryController@delete');
Route::patch('event-categories/{id}', 'EventCategoryController@update');


Route::get('events', 'EventController@index');
Route::get('events/{id}', 'EventController@show');
Route::post('events', 'EventController@store');
Route::delete('events/{id}', 'EventController@delete');
Route::patch('events/{id}', 'EventController@update');


Route::get('ingredients', 'IngredientController@index');
Route::get('ingredients/{id}', 'IngredientController@show');
Route::post('ingredients', 'IngredientController@store');
Route::delete('ingredients/{id}', 'IngredientController@delete');
Route::patch('ingredients/{id}', 'IngredientController@update');


Route::get('product-categories', 'ProductCategoryController@index');
Route::get('product-categories/{id}', 'ProductCategoryController@show');
Route::post('product-categories', 'ProductCategoryController@store');
Route::delete('product-categories/{id}', 'ProductCategoryController@delete');
Route::patch('product-categories/{id}', 'ProductCategoryController@update');


Route::get('products', 'ProductController@index');
Route::get('products/{id}', 'ProductController@show');
Route::post('products', 'ProductController@store');
Route::delete('products/{id}', 'ProductController@delete');
Route::patch('products/{id}', 'ProductController@update');


Route::get('recipes', 'RecipeController@index');
Route::get('recipes/{id}', 'RecipeController@show');
Route::post('recipes', 'RecipeController@store');
Route::delete('recipes/{id}', 'RecipeController@delete');
Route::patch('recipes/{id}', 'RecipeController@update');


Route::get('restaurants', 'RestaurantController@index');
Route::get('restaurants/{id}', 'RestaurantController@show');
Route::post('restaurants', 'RestaurantController@store');
Route::delete('restaurants/{id}', 'RestaurantController@delete');
Route::patch('restaurants/{id}', 'RestaurantController@update');


Route::get('shops', 'ShopController@index');
Route::get('shops/{id}', 'ShopController@show');
Route::post('shops', 'ShopController@store');
Route::delete('shops/{id}', 'ShopController@delete');
Route::patch('shops/{id}', 'ShopController@update');


Route::get('redirect/{driver}', 'Auth\LoginController@redirectToProvider')
    ->where('driver', implode('|', config('auth.socialite.drivers')));

Route::get('{driver}/callback', 'Auth\LoginController@handleProviderCallback')
    ->where('driver', implode('|', config('auth.socialite.drivers')));


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::fallback(function(){
    return response()->json('404. Puslapis nerastas.', 404);
});