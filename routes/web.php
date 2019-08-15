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
Route::get('/users', 'UserController@index')->name('users');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/edit', 'UserController@edit')->name('edit');
Route::post('/update', 'UserController@update')->name('update');
Route::get('/destroy/{id}', 'UserController@destroy')->name('destroy');
Route::get('/new', 'ClientController@create')->name('new');
Route::get('/home', 'ClientController@index')->name('home');
Route::post('/store', 'ClientController@store')->name('store');
ROute::get('/store', 'ClientController@stote')->name('store');
Route::get('/view/{id}', 'ClientController@view')->name('view');
Route::post('/search', 'ClientController@search')->name('search');
Route::get('/destroy/{id}', 'ClientController@destroy')->name('destroy');
Route::get('/edit/{id}', 'ClientController@edit')->name('edit');
Route::post('/{id}', 'ClientController@update')->name('Clientupdate');
Auth::routes();