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
Route::get('/produk', 'PublicController@katalog')->name('katalog');
Route::get('/produk/{id}/detail', 'PublicController@produkDetail')->name('produk-detail');

Route::get('/keranjang', 'PublicController@showKeranjangBelanja')->name('keranjang');
Route::get('/keranjang/add/{id}', 'PublicController@addToKeranjang')->name('keranjang.add');
Route::post('/keranjang/add/{id}', 'PublicController@addToKeranjang')->name('keranjang.add');
Route::get('/keranjang/del/{id}', 'PublicController@delFromKeranjang')->name('keranjang.del');
Route::post('/keranjang/del/{id}', 'PublicController@delFromKeranjang')->name('keranjang.del');
Route::get('/keranjang/dec/{id}', 'PublicController@decFromKeranjang')->name('keranjang.dec');
Route::post('/keranjang/dec/{id}', 'PublicController@decFromKeranjang')->name('keranjang.dec');

Auth::routes();
