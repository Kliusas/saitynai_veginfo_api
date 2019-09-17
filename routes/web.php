<?php

Route::get('dish-category/index', 'DishCategoryController@index');
Route::post('dish-category/{id}/store', 'DishCategoryController@store');
Route::delete('dish-category/{id}/delete', 'DishCategoryController@delete');
Route::post('dish-category/{id}/update', 'DishCategoryController@update');


Route::get('dish/index', 'DishController@index');
Route::post('dish/{id}/store', 'DishController@store');
Route::delete('dish/{id}/delete', 'DishController@delete');
Route::post('dish/{id}/update', 'DishController@update');


Route::get('event-category/index', 'EventCategoryController@index');
Route::post('event-category/{id}/store', 'EventCategoryController@store');
Route::delete('event-category/{id}/delete', 'EventCategoryController@delete');
Route::post('event-category/{id}/update', 'EventCategoryController@update');


Route::get('event/index', 'EventController@index');
Route::post('event/{id}/store', 'EventController@store');
Route::delete('event/{id}/delete', 'EventController@delete');
Route::post('event/{id}/update', 'EventController@update');


Route::get('ingredient/index', 'IngredientController@index');
Route::post('ingredient/{id}/store', 'IngredientController@store');
Route::delete('ingredient/{id}/delete', 'IngredientController@delete');
Route::post('ingredient/{id}/update', 'IngredientController@update');


Route::get('product-category/index', 'ProductCategoryController@index');
Route::post('product-category/{id}/store', 'ProductCategoryController@store');
Route::delete('product-category/{id}/delete', 'ProductCategoryController@delete');
Route::post('product-category/{id}/update', 'ProductCategoryController@update');


Route::get('product/index', 'ProductController@index');
Route::post('product/{id}/store', 'ProductController@store');
Route::delete('product/{id}/delete', 'ProductController@delete');
Route::post('product/{id}/update', 'ProductController@update');


Route::get('recipe/index', 'RecipeController@index');
Route::post('recipe/{id}/store', 'RecipeController@store');
Route::delete('recipe/{id}/delete', 'RecipeController@delete');
Route::post('recipe/{id}/update', 'RecipeController@update');


Route::get('restaurant/index', 'RestaurantController@index');
Route::post('restaurant/{id}/store', 'RestaurantController@store');
Route::delete('restaurant/{id}/delete', 'RestaurantController@delete');
Route::post('restaurant/{id}/update', 'RestaurantController@update');


Route::get('shop/index', 'ShopController@index');
Route::post('shop/{id}/store', 'ShopController@store');
Route::delete('shop/{id}/delete', 'ShopController@delete');
Route::post('shop/{id}/update', 'ShopController@update');
