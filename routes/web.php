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

Route::get('/Home','staticController@Home');
Route::get('/Profile','staticController@Profile');
Route::get('/Profile','staticController@Profile');
Route::get('/Contact','staticController@Contact');
Route::post('/Contact','staticController@Store');
Route::get('/About','staticController@About');
