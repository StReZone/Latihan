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

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::get('/Home','staticController@Home');
//Route::get('/Profile','staticController@Profile');
//Route::get('/Contact','staticController@Contact');
//Route::resource('/About','articlesController',['only'=>['about']]);
//Route::get('/About','articlesController@about')->name('About');

Route::get('/','articlesController@index');
Route::group(['namespace' => 'Admin'],function(){
    Route::resource('articles','articlesController');
});

