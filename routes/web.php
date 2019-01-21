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
Route::resource('tablearticles','TableArticlesController');
Route::get('/profile','staticController@Profile')->name('profile');
Route::get('/articles','articlesController@index')->name('articles.index')->middleware('auth');
Route::resource('comments','CommentsController');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['auth','role:manager'] ], function() {
    Route::resource('manager','ManagerController');
});
Route::group(['middleware' => ['auth','role:employee']], function() {
    Route::resource('employee','EmployeeController');

});