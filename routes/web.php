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
Route::get('/editUser', 'UserController@edit')->name('editUser');
//Rotas User
Route::post('/update', 'UserController@update')->name('update');
Route::get('/destroyUser/{id}', 'UserController@destroy')->name('destroyUser');
//Rotas Client
Route::get('/new', 'ClientController@create')->name('new');
Route::get('/indexCli', 'ClientController@index')->name('indexCli');
Route::get('/index', 'ClientController@index')->name('index');
Route::post('/storeC', 'ClientController@store')->name('storeC');
ROute::get('/store', 'ClientController@stote')->name('store');
Route::get('/view/{id}', 'ClientController@view')->name('view');
Route::post('/searchCli', 'ClientController@search')->name('searchCli');
Route::get('/destroyCli/{id}', 'ClientController@destroy')->name('destroyCli');
Route::get('/edit/{id}', 'ClientController@edit')->name('edit');
Route::post('/Clientupdate/{id}', 'ClientController@update')->name('Clientupdate');
Route::post('/{id}', 'ClientController@msg')->name('msg');
// Rotas Fornecedor
Route::get('/store', 'ProviderController@store')->name('store');
Route::get('/newPro', 'ProviderController@create')->name('newPro');
Route::post('/search', 'ProviderController@search')->name('search');
Route::get('/destroyPro/{id}', 'ProviderController@destroy')->name('destroyPro');
Route::get('/indexPro', 'ClientController@index')->name('indexPro');
Route::get('/editPro/{id}', 'ProviderController@edit')->name('editPro');
Route::post('/updatePro/{id}', 'ProviderController@update')->name('updatePro');
Route::get('/viewPro/{id}', 'ProviderController@view')->name('viewPro');

// Rotas mecanico
Route::get('/newMe', 'MechanicalController@create')->name('newMe');
Route::post('/store', 'MechanicalController@store')->name('store');
// Rotas Produtos
Route::get('indexP', 'ProductController@index')->name('indexP');
Route::get('newProd', 'ProductController@create')->name('newProd');
Route::get('/storeP', 'ProductController@store')->name('storeP');
Route::post('/search', 'ProductController@search')->name('search');
Auth::routes();