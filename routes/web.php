<?php

use Illuminate\Support\Facades\Route;

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


// Santri
// Route::get('/santri', 'SantriController@index');
// Route::get('/santri/create', 'SantriController@create');
// Route::post('/santri', 'SantriController@store');
// Route::delete('/santri/{santri}', 'SantriController@destroy');
// Route::get('/santri/{santri}/edit', 'SantriController@edit');
// Route::put('/santri/{santri}', 'SantriController@update');

Route::resource('santri', 'SantriController');