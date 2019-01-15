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
})->name('root');
Route::resource('articles','articlesController');
//Route::get('/Home','staticController@Home');
Route::get('/profile','staticController@Profile')->name('profile');
Route::resource('comments','CommentsController');

