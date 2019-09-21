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


Route::get('dishes-categories', 'DishCategoryController@index');
Route::get('dishes-categories/{id}', 'DishCategoryController@show');
Route::post('dishes-categories', 'DishCategoryController@store');
Route::delete('dishes-categories/{id}', 'DishCategoryController@delete');
Route::put('dishes-categories/{id}', 'DishCategoryController@update');


Route::get('dishes', 'DishController@index');
Route::get('dishes/{id}', 'DishController@index');
Route::post('dishes', 'DishController@store');
Route::delete('dishes/{id}', 'DishController@delete');
Route::put('dishes/{id}', 'DishController@update');


Route::get('event-categories', 'EventCategoryController@index');
Route::get('event-categories/{id}', 'EventCategoryController@index');
Route::post('event-categories', 'EventCategoryController@store');
Route::delete('event-categories/{id}', 'EventCategoryController@delete');
Route::put('event-categories/{id}', 'EventCategoryController@update');


Route::get('events', 'EventController@index');
Route::get('events/{id}', 'EventController@index');
Route::post('events', 'EventController@store');
Route::delete('events/{id}', 'EventController@delete');
Route::put('events/{id}', 'EventController@update');


Route::get('ingredients', 'IngredientController@index');
Route::get('ingredients/{id}', 'IngredientController@index');
Route::post('ingredients', 'IngredientController@store');
Route::delete('ingredients/{id}', 'IngredientController@delete');
Route::put('ingredients/{id}', 'IngredientController@update');


Route::get('product-categories', 'ProductCategoryController@index');
Route::get('product-categories/{id}', 'ProductCategoryController@index');
Route::post('product-categories', 'ProductCategoryController@store');
Route::delete('product-categories/{id}', 'ProductCategoryController@delete');
Route::put('product-categories/{id}', 'ProductCategoryController@update');


Route::get('products', 'ProductController@index');
Route::get('products/{id}', 'ProductController@index');
Route::post('products', 'ProductController@store');
Route::delete('products/{id}', 'ProductController@delete');
Route::put('products/{id}', 'ProductController@update');


Route::get('recipes', 'RecipeController@index');
Route::get('recipes/{id}', 'RecipeController@index');
Route::post('recipes', 'RecipeController@store');
Route::delete('recipes/{id}', 'RecipeController@delete');
Route::put('recipes/{id}', 'RecipeController@update');


Route::get('restaurants', 'RestaurantController@index');
Route::get('restaurants/{id}', 'RestaurantController@index');
Route::post('restaurants', 'RestaurantController@store');
Route::delete('restaurants/{id}', 'RestaurantController@delete');
Route::put('restaurants/{id}', 'RestaurantController@update');


Route::get('shops', 'ShopController@index');
Route::get('shops/{id}', 'ShopController@index');
Route::post('shops', 'ShopController@store');
Route::delete('shops/{id}', 'ShopController@delete');
Route::put('shops/{id}', 'ShopController@update');


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
