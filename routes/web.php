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
Route::get('/home', 'HomeController@index')->name('home');

//Rotas User
Route::prefix('user')->group(function(){
    Route::get('/index', 'UserController@index')->name('user.index');
    Route::get('/edit', 'UserController@edit')->name('user.edit');
    Route::post('/update', 'UserController@update')->name('user.update');
    Route::get('/destroy/{id}', 'UserController@destroy')->name('user.destroy');
});
//Rotas Client
Route::prefix('client')->group(function(){
    Route::get('/new', 'ClientController@create')->name('client.new');
    Route::get('/index', 'ClientController@index')->name('client.index');
    Route::post('/store', 'ClientController@store')->name('client.store');
    Route::get('/view/{id}', 'ClientController@view')->name('client.view');
    Route::post('/search', 'ClientController@search')->name('client.search');
    Route::get('/destroy/{id}', 'ClientController@destroy')->name('client.destroy');
    Route::get('/edit/{id}', 'ClientController@edit')->name('client.edit');
    Route::post('/update/{id}', 'ClientController@update')->name('client.update');
    Route::post('/msg/{id}', 'ClientController@msg')->name('client.msg');
    Route::get('/orders/{id}', 'ClientController@orders')->name('client.orders');
    Route::get('/toFile/{id}', 'ClientController@toFile')->name('client.toFile');
    Route::get('/pdf', 'ClientController@pdf')->name('client.pdf');
});
//Rotas Fornecedor
Route::prefix('provider')->group(function(){
    Route::post('/store', 'ProviderController@store')->name('provider.store');
    Route::get('/new', 'ProviderController@create')->name('provider.new');
    Route::post('/search', 'ProviderController@search')->name('provider.search');
    Route::get('/destroy/{id}', 'ProviderController@destroy')->name('provider.destroy');
    Route::get('/index', 'ProviderController@index')->name('provider.index');
    Route::get('/edit/{id}', 'ProviderController@edit')->name('provider.edit');
    Route::post('/update/{id}', 'ProviderController@update')->name('provider.update');
    Route::get('/view/{id}', 'ProviderController@view')->name('provider.view');
    Route::get('/products/{id}', 'ProviderController@products')->name('provider.products');
    Route::get('/pdf', 'ProviderController@pdf')->name('provider.pdf');
    Route::get('/pdf/{id}', 'ProviderController@pdfProduct')->name('provider.pdfProdcts');
});

// Rotas mecanico
Route::get('/newMe', 'MechanicalController@create')->name('newMe');
Route::post('/store', 'MechanicalController@store')->name('store');
// Rotas Produtos
Route::prefix('product')->group(function(){
    Route::get('/index', 'ProductController@index')->name('product.index');
    Route::get('/new', 'ProductController@create')->name('product.new');
    Route::post('/store', 'ProductController@store')->name('product.store');
    Route::post('/search', 'ProductController@search')->name('product.search');
    Route::get('/view/{id}', 'ProductController@view')->name('product.view');
    Route::get('/edit/{id}', 'ProductController@edit')->name('product.edit');
    Route::post('/update/{id}', 'ProductController@update')->name('product.update');
    Route::get('/destroy/{id}', 'ProductController@destroy')->name('product.destroy');
    Route::get('/pdf', 'ProductController@pdf')->name('product.pdf');
});
 //Rotas Ordem de Serviço
 Route::prefix('service')->group(function(){
    Route::get('/new', 'ServiceOrderController@create')->name('service.new');
    Route::get('/index', 'ServiceOrderController@index')->name('service.index');
    Route::post('/store', 'ServiceOrderController@store')->name('service.store');
    Route::post('/search', 'ServiceOrderController@search')->name('service.search');
    Route::post('/orders', 'ServiceOrderController@orders')->name('service.orders');
    Route::get('/edit/{id}', 'ServiceOrderController@edit')->name('service.edit');
    Route::post('/update/{id}', 'ServiceOrderController@update')->name('service.update');
    Route::get('/notes/{id}', 'ServiceOrderController@notes')->name('service.notes');
    Route::get('/view/{id}', 'ServiceOrderController@view')->name('service.view');
    Route::get('/pdf/{id}', 'ServiceOrderController@pdf')->name('service.pdf');
 });

//Rotas Vendas
Route::prefix('sales')->group(function(){
    Route::get('/new', 'SalesController@create')->name('sales.new');
    Route::get('/index', 'SalesController@index')->name('sales.index');
    Route::post('/store', 'SalesController@store')->name('sales.store');
    Route::get('/view/{id}', 'SalesController@view')->name('sales.view');
    Route::get('/destroy/{id}', 'SalesController@destroy')->name('sales.destroy');
    Route::get('/pdfSales/{id}', 'SalesController@pdfSales')->name('sales.pdfSales');
    Route::get('/pdf', 'SalesController@pdf')->name('sales.pdf');
});
Route::prefix('automobiles')->group(function(){
    Route::get('/inde', 'AutomobilesController@index')->name('automobiles.index');
    Route::get('/new', 'AutomobilesController@create')->name('automobiles.new');
    Route::post('/store', 'AutomobilesController@store')->name('automobiles.store');
    Route::post('/search', 'AutomobilesController@search')->name('automobiles.search');
});
Route::prefix('central')->group(function(){
    Route::get('/index/{name}', 'CentralController@index')->name('central.index');
    Route::get('/central', 'CentralController@central')->name('central.central');
    Route::get('/view', 'CentralController@view')->name('central.view');
    Route::post('/login', 'CentralController@login')->name('central.login');
    Route::get('/pdf/{id}', 'CentralController@pdfCentral')->name('central.pdf');
});

Route::get('sales/get-product/{idProduct}', 'SalesController@getProduct');
Route::get('sales/get-client/{idclient}', 'SalesController@getClient');
Route::get('automobiles/get-client/{idclient}', 'AutomobilesController@getClient');
Route::get('/service/get-auto/{id}', 'ServiceOrderController@getAuto');