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


Route::get('dishes-categories', 'DishCategoryController@index')->middleware('customauth');
Route::get('dishes-categories/{id}', 'DishCategoryController@show')->middleware('customauth');
Route::get('dishes-categories/{id}/dishes/{idDish}', 'DishCategoryController@showCategoryDish')->middleware('customauth');
Route::get('dishes-categories/{id}/dishes', 'DishCategoryController@showAllCategoryDishes')->middleware('customauth');
Route::post('dishes-categories', 'DishCategoryController@store')->middleware('customauth');
Route::delete('dishes-categories/{id}', 'DishCategoryController@delete')->middleware('customauth');
Route::patch('dishes-categories/{id}', 'DishCategoryController@update')->middleware('customauth');


Route::get('dishes', 'DishController@index');
Route::get('dishes/{id}', 'DishController@show')->middleware('customauth');
Route::post('dishes', 'DishController@store')->middleware('customauth');
Route::delete('dishes/{id}', 'DishController@delete')->middleware('customauth');
Route::patch('dishes/{id}', 'DishController@update')->middleware('customauth');


Route::get('event-categories', 'EventCategoryController@index');
Route::get('event-categories/{id}', 'EventCategoryController@show')->middleware('customauth');
Route::post('event-categories', 'EventCategoryController@store')->middleware('customauth');
Route::delete('event-categories/{id}', 'EventCategoryController@delete')->middleware('customauth');
Route::patch('event-categories/{id}', 'EventCategoryController@update')->middleware('customauth');


Route::get('events', 'EventController@index');
Route::get('events/{id}', 'EventController@show')->middleware('customauth');
Route::post('events', 'EventController@store')->middleware('customauth');
Route::delete('events/{id}', 'EventController@delete')->middleware('customauth');
Route::patch('events/{id}', 'EventController@update')->middleware('customauth');


Route::get('ingredients', 'IngredientController@index');
Route::get('ingredients/{id}', 'IngredientController@show')->middleware('customauth');
Route::post('ingredients', 'IngredientController@store')->middleware('customauth');
Route::delete('ingredients/{id}', 'IngredientController@delete')->middleware('customauth');
Route::patch('ingredients/{id}', 'IngredientController@update')->middleware('customauth');


Route::get('product-categories', 'ProductCategoryController@index');
Route::get('product-categories/{id}', 'ProductCategoryController@show')->middleware('customauth');
Route::get('product-categories/{id}/products/{idProduct}', 'ProductCategoryController@showCategoryProduct')->middleware('customauth');
Route::get('product-categories/{id}/products', 'ProductCategoryController@showAllCategoryProducts')->middleware('customauth');
Route::post('product-categories', 'ProductCategoryController@store')->middleware('customauth');
Route::delete('product-categories/{id}', 'ProductCategoryController@delete')->middleware('customauth');
Route::patch('product-categories/{id}', 'ProductCategoryController@update')->middleware('customauth');


Route::get('products', 'ProductController@index');
Route::get('products/{id}', 'ProductController@show')->middleware('customauth');
Route::get('products/{id}/ingredients/{idIngredient}', 'ProductController@showProductIngredient')->middleware('customauth');
Route::get('products/{id}/ingredients', 'ProductController@showAllProductIngredient')->middleware('customauth');
Route::post('products', 'ProductController@store')->middleware('customauth');
Route::delete('products/{id}', 'ProductController@delete')->middleware('customauth');
Route::patch('products/{id}', 'ProductController@update')->middleware('customauth');


Route::get('recipes', 'RecipeController@index');
Route::get('recipes/{id}', 'RecipeController@show')->middleware('customauth');
Route::post('recipes', 'RecipeController@store')->middleware('customauth');
Route::delete('recipes/{id}', 'RecipeController@delete')->middleware('customauth');
Route::patch('recipes/{id}', 'RecipeController@update')->middleware('customauth');


Route::get('restaurants', 'RestaurantController@index');
Route::get('restaurants/{id}', 'RestaurantController@show')->middleware('customauth');
Route::get('restaurants/{id}/dishes/{idDish}', 'RestaurantController@showRestaurantDish')->middleware('customauth');
Route::get('restaurants/{id}/dishes', 'RestaurantController@showAllRestaurantDishes')->middleware('customauth');
Route::post('restaurants', 'RestaurantController@store')->middleware('customauth');
Route::delete('restaurants/{id}', 'RestaurantController@delete')->middleware('customauth');
Route::patch('restaurants/{id}', 'RestaurantController@update')->middleware('customauth');


Route::get('shops', 'ShopController@index');
Route::get('shops/{id}', 'ShopController@show')->middleware('customauth');
Route::get('shops/{id}/products/{idProduct}', 'ShopController@showShopProduct')->middleware('customauth');
Route::get('shops/{id}/products', 'ShopController@showAllShopProducts')->middleware('customauth');
Route::post('shops', 'ShopController@store')->middleware('customauth');
Route::delete('shops/{id}', 'ShopController@delete')->middleware('customauth');
Route::patch('shops/{id}', 'ShopController@update')->middleware('customauth');


Route::get('redirect/{driver}', 'Auth\LoginController@redirectToProvider')
    ->where('driver', implode('|', config('auth.socialite.drivers')));

Route::get('{driver}/callback', 'Auth\LoginController@handleProviderCallback')
    ->where('driver', implode('|', config('auth.socialite.drivers')));


Route::middleware('customauth')->get('/user', function (Request $request) {
    return $request->user();
});


Route::fallback(function(){
    return response()->json('404. Puslapis nerastas.', 404);
});
