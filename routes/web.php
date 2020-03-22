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

// Dasboard
Route::get('/dashboard', function(){
    return view('dashboard');
});


// Santri
// Route::get('/santri', 'SantriController@index');
// Route::get('/santri/create', 'SantriController@create');
// Route::post('/santri', 'SantriController@store');
// Route::delete('/santri/{santri}', 'SantriController@destroy');
// Route::get('/santri/{santri}/edit', 'SantriController@edit');
// Route::put('/santri/{santri}', 'SantriController@update');

Route::resource('santri', 'SantriController');

// Kelas
Route::get('/kelas', 'KelasController@index');
Route::post('/kelas', 'KelasController@store');
Route::delete('kelas/{santri}', 'KelasController@destroy');
Route::get('/kelas/{kelas}/edit', 'KelasController@edit');
Route::put('/kelas/{kelas}', 'KelasController@update');

// Kamar
Route::get('/kamar', 'KamarController@index');
Route::post('/kamar', 'KamarController@store');
Route::delete('/kamar/{kamar}', 'KamarController@destroy');
Route::get('/kamar/{kamar}/edit', 'KamarController@edit');
Route::put('/kamar/{kamar}', 'KamarController@update');


// Tagihan
Route::get('/tagihan', 'TagihanController@index');
Route::post('/tagihan', 'TagihanController@store');
Route::delete('/tagihan/{tagihan}', 'TagihanController@destroy');
Route::get('/tagihan/{tagihan}/edit', 'TagihanController@edit');
Route::put('/tagihan/{tagihan}', 'TagihanController@update');