<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Route::get('api', 'ApiController@index');

Route::group(['prefix'  => 'api', 'middleware'  => 'auth:api'], function () {
    Route::resource('note', 'NoteController');
    Route::resource('group', 'Api\GroupController');
});


Route::group(['middleware'  => 'web'], function () {
    Auth::routes();

    Route::get('/home', 'HomeController@index');
});
//Auth::routes();

//Route::get('/home', 'HomeController@index');
