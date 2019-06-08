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

// routes PQR
Route::group(['prefix' => 'pqr', 'as' => 'pqr.'], function () {
    Route::get('/', 'Pqr@index')->name('index');
    Route::get('/create', 'Pqr@create')->name('index');
    Route::get('/update/{id?}', 'Pqr@update')->name('update');

    Route::post('/create', 'Pqr@crearPqr')->name('crearPqr');
    Route::post('/update/{id?}', 'Pqr@responderPqr')->name('responderPqr');
});
