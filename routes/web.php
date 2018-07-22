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



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/show/{survey}', 'HomeController@show')->name('home.show');


Route::get('auth/', 'Controller@index')->name('authindex');
Route::get('auth/show/{user}', 'Controller@show')->name('authshow');

//Route::get('/home', 'SurveyController@indexindex')->name('home');

