<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//resources
Route::get('/resources/', 'ResourceController@getList');
Route::get('/resources/find/{id}', 'ResourceController@getFind');
Route::get('/resources/create', 'ResourceController@getCreate');
Route::post('/resources/create', 'ResourceController@postCreate');
Route::get('/resources/update/{id}', 'ResourceController@getUpdate');
Route::put('/resources/update/{id}', 'ResourceController@postUpdate');
Route::get('/resources/delete/{id}', 'ResourceController@getDelete');