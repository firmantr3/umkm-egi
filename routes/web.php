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

Route::get('/', 'PublicController@index')->name('landing');
Route::get('/katalog', 'PublicController@katalog')->name('katalog');
Route::get('/produk/{id}', 'PublicController@produkDetail')->name('produk-detail');

Auth::routes();
