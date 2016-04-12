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


    Route::get('signup', 'UsersController@getNewaccount');
    Route::get('login', 'UsersController@getSignIn');
    Route::post('users/signin', 'UsersController@postSignIn');
    Route::get('users/signout', 'UsersController@getSignout');

    Route::get('users/newaccount', 'UsersController@getNewaccount');
    Route::post('users/create', 'UsersController@postCreate');

//Route::resource('payment', 'PaymentController');



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
Route::get('/ranking', 'RankingController@index');
Route::get('/getscore', 'GameController@getGold');
Route::post('/postscore', 'GameController@postScore');

Route::get('auth/facebook', 'UsersController@redirectToProvider');
Route::get('auth/facebook/callback', 'UsersController@handleProviderCallback');










