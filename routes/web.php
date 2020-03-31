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
Route::get('/dashboard','DashboardController@index');

// Pendafataran Santri


// Santri
Route::get('/santri', 'SantriController@index');

// Daftar Santri
Route::get('/almanshur/daftar', 'SantriController@daftar');
Route::post('/santri', 'SantriController@store');
Route::get('/santri/{santri}/acc', 'SantriController@acc');


// Tagihan Santri
Route::get('santri/tagihan', 'SantriController@tagihan');
// 
Route::get('/santri/santri_baru', 'SantriController@baru');
Route::delete('/santri/{santri}', 'SantriController@destroy');
Route::get('/santri/{santri}/edit', 'SantriController@edit');
Route::put('/santri/{santri}', 'SantriController@update');
Route::get('santri/cari', 'SantriController@cari');


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


// Pembayaran
Route::get('/pembayaran', 'PembayaranController@index');
Route::get('pembayaran/{santri}/{tagihan}/bayar', 'PembayaranController@bayar');
Route::get('pembayaran/{bayar}/byr', 'PembayaranController@byr');
Route::get('/pembayaran/cari', 'PembayaranController@cari');