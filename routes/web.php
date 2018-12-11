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

Route::name('clients.')->group(function(){
  Route::get('/clients', 'ClientsController@index')->name('index');
  Route::get('/client/create', 'ClientsController@create')->name('create');
  Route::get('/client/{client}', 'ClientsController@edit')->name('edit');
  Route::post('/client/{client}', 'ClientsController@store')->name('store');
  Route::put('/client/{client}', 'ClientsController@update')->name('update');
});