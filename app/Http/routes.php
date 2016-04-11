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
Route::get('/', 'HomeController@getIndex');


    Route::get('signup', 'UsersController@getNewaccount');
    Route::get('login', 'UsersController@getSignIn');
    Route::post('users/signin', 'UsersController@postSignIn');
    Route::get('users/signout', 'UsersController@getSignout');

    Route::get('users/newaccount', 'UsersController@getNewaccount');
    Route::post('users/create', 'UsersController@postCreate');

/*    Route::get('store', 'StoreController@getIndex');*/



Route::group(['middleware' => ['web','auth']], function ()
{
    Route::controller('store', 'StoreController');
    Route::get('game', function () {
        return view('game');
    });

});

Route::group(['middleware' => ['web','admin']], function ()
{
    Route::get('admin/categories', 'CategoriesController@getIndex');
    Route::post('admin/categories/create', 'CategoriesController@postCreate');
    Route::post('admin/categories/destroy', 'CategoriesController@postDestroy');
    Route::get('admin/products', 'ProductsController@getIndex');
    Route::post('admin/products/create', 'ProductsController@postCreate');
    Route::post('admin/products/destroy', 'ProductsController@postDestroy');
});

Route::get('/game', 'GameController@index');
Route::get('/getscore', 'GameController@getScore');
Route::post('/postscore', 'GameController@postScore');










