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
Route::resource('genres', 'GenresController');
Route::resource('countries', 'CountriesController');

Route::resource('films', 'FilmsController');

Route::get('/', 'FilmsController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/listFilms', 'FilmsController@listFilms')->name('list');
Route::get('/film/{slug}', 'FilmsController@film')->name('film');
