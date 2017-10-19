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
    return redirect()->route('admin.home');
});

Route::group(['prefix' => 'admin'], function() {
	Route::get('/', 'Admin\HomeController@index')->name('admin.home');

	// Category Module
	Route::get('/category', 'Admin\CategoryController@index')->name('admin.category.list');
	Route::get('/category/create', 'Admin\CategoryController@create')->name('admin.category.create');
	Route::get('/category/edit/{id}', 'Admin\CategoryController@edit')->name('admin.category.edit');
	Route::get('/category/destroy/{id}', 'Admin\CategoryController@destroy')->name('admin.category.destroy');
	Route::get('/category/data', 'Admin\CategoryController@optionData')->name('admin.category.data');

	Route::post('/category/create', 'Admin\CategoryController@store')->name('admin.category.store');
	Route::post('/category/edit/{id}', 'Admin\CategoryController@update')->name('admin.category.update');

	// Transaction Module
	Route::get('/transaction', 'Admin\TransactionController@index')->name('admin.transaction.list');
	Route::get('/transaction/create', 'Admin\TransactionController@create')->name('admin.transaction.create');
	Route::get('/transaction/edit/{id}', 'Admin\TransactionController@edit')->name('admin.transaction.edit');
	Route::get('/transaction/destroy/{id}', 'Admin\TransactionController@destroy')->name('admin.transaction.destroy');

	Route::post('/transaction/create', 'Admin\TransactionController@store')->name('admin.transaction.store');
	Route::post('/transaction/edit/{id}', 'Admin\TransactionController@update')->name('admin.transaction.update');
});