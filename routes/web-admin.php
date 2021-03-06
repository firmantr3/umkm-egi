<?php

Route::get('/', function() {
    return redirect(route('admin.home'));
});

Route::middleware('auth.admin')->group(function() {
    Route::get('/home', 'HomeController@index')->name('admin.home');
    
    Route::resource('kategori', 'kategoriController');
    
    Route::resource('produk', 'produkController');

    Route::resource('customers', 'CustomerController');

    Route::resource('kotas', 'KotaController');

    Route::resource('banks', 'BankController');

    Route::resource('orders', 'OrderController');

    Route::resource('suppliers', 'SupplierController');

    $this->post('logout', 'AuthAdmin\LoginController@logout')->name('admin.logout');
});

Route::middleware('guest.admin')->group(function() {
    $this->get('login', 'AuthAdmin\LoginController@showLoginForm')->name('admin.login');
    $this->post('login', 'AuthAdmin\LoginController@login')->name('admin.login');
});
