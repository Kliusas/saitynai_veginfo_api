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
Route::get('dishes-categories/{id}', 'DishCategoryController@show');
Route::get('dishes-categories/{id}/dishes/{idDish}', 'DishCategoryController@showCategoryDish');
Route::get('dishes-categories/{id}/dishes', 'DishCategoryController@showAllCategoryDishes');
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


Route::get('product-categories', 'ProductCategoryController@index')->middleware('customauth');
Route::get('product-categories/{id}', 'ProductCategoryController@show')->middleware('customauth');
Route::get('product-categories/{id}/products/{idProduct}', 'ProductCategoryController@showCategoryProduct')->middleware('customauth');
Route::get('product-categories/{id}/products', 'ProductCategoryController@showAllCategoryProducts')->middleware('customauth');
Route::post('product-categories', 'ProductCategoryController@store')->middleware('customauth');
Route::delete('product-categories/{id}', 'ProductCategoryController@delete')->middleware('customauth');
Route::patch('product-categories/{id}', 'ProductCategoryController@update')->middleware('customauth');


Route::get('products', 'ProductController@index')->middleware('customauth');
Route::get('products/{id}', 'ProductController@show')->middleware('customauth');
Route::get('products/{id}/ingredients/{idIngredient}', 'ProductController@showProductIngredient')->middleware('customauth');
Route::get('products/{id}/ingredients', 'ProductController@showAllProductIngredient')->middleware('customauth');
Route::post('products', 'ProductController@store')->middleware('customauth');
Route::delete('products/{id}', 'ProductController@delete')->middleware('customauth');
Route::patch('products/{id}', 'ProductController@update')->middleware('customauth');


Route::get('recipes', 'RecipeController@index');
Route::get('recipes/{id}', 'RecipeController@show');
Route::post('recipes', 'RecipeController@store');
Route::delete('recipes/{id}', 'RecipeController@delete');
Route::patch('recipes/{id}', 'RecipeController@update');


Route::get('restaurants', 'RestaurantController@index');
Route::get('restaurants/{id}', 'RestaurantController@show');
Route::get('restaurants/{id}/dishes/{idDish}', 'RestaurantController@showRestaurantDish');
Route::get('restaurants/{id}/dishes', 'RestaurantController@showAllRestaurantDishes');
Route::post('restaurants', 'RestaurantController@store');
Route::delete('restaurants/{id}', 'RestaurantController@delete');
Route::patch('restaurants/{id}', 'RestaurantController@update');


Route::get('shops', 'ShopController@index')->middleware('customauth');
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
