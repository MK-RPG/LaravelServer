<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', 'HomeController@getIndex');


/*Route::group(['middleware' => 'web'], function () {

    Route::get('/', [
        'uses' => 'HomeController@getIndex',
        'as' => 'index'
    ]);


    Route::get('/login', [
        'uses' => '\App\Http\Controllers\AuthController@getLogin',
        'as' => 'auth.login',
        'middleware' => ['guest']
    ]);

    Route::post('/login', [
        'uses' => '\App\Http\Controllers\AuthController@postLogin',
        'as' => 'auth.login',
        'middleware' => ['guest']
    ]);

    Route::get('/logout', [
        'uses' => '\App\Http\Controllers\AuthController@logout',
        'as' => 'main_layout',
    ]);
});*/

Route::get('admin/categories', 'CategoriesController@getIndex');
Route::post('admin/categories/create', 'CategoriesController@postCreate');
Route::post('admin/categories/destroy', 'CategoriesController@postDestroy');

Route::get('admin/products', 'ProductsController@getIndex');
Route::post('admin/products/create', 'ProductsController@postCreate');
Route::post('admin/products/destroy', 'ProductsController@postDestroy');

Route::get('store', 'StoreController@getIndex');








