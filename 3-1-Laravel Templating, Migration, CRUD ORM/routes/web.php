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


// INDEX
Route::get('/', 'IndexController@home');

// REGISTER
Route::get('/formregister', 'AuthController@formregister');

Route::post('/register', 'AuthController@register');

// WELCOME
Route::get('/welcome', 'AuthController@welcome');

Route::get('/data-table', 'IndexController@table');

//CRUD Cast

Route::get('/cast','CastController@index');

//Create
Route::get('/cast/create','CastController@create');
Route::post('/cast','CastController@store');

//Read
Route::get('/cast/{cast_id}','CastController@show');

//Update
Route::get('/cast/{cast_id}/edit','CastController@edit');
Route::put('/cast/{cast_id}','CastController@update');

//Delete
Route::delete('/cast/{cast_id}','CastController@destroy');

