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



Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::name('clients.')->group(function(){
  Route::get('/clients', 'ClientsController@index')->name('index');
  Route::get('/clients/create', 'ClientsController@create')->name('create');
  Route::get('/clients/{client}/edit', 'ClientsController@edit')->name('edit');
  Route::post('/clients', 'ClientsController@store')->name('store');
  Route::patch('/clients/{client}', 'ClientsController@update')->name('update');
});