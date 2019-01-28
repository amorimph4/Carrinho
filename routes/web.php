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
Route::redirect('/', '/category');

Route::get('/compras', 'RequestController@shopping')->name('compras');
Route::get('/getItems', 'RequestController@getItems')->name('getCar');
Route::get('/itemsJson/{item}', 'RequestController@getItemsJson')->name('CarJson');
Route::post('/addItems', 'RequestController@setItems')->name('setCar');
Route::post('/removeItems', 'RequestController@removeItems')->name('deleteToCar');
Route::post('/editItems', 'RequestController@updateItems')->name('editCar');
Route::get('/store', 'RequestController@store')->name('storeCar');


Route::prefix('category')->group(function () {
    Route::get('/', 'CategoryController@index')->name('categorys');
    Route::get('/all', 'CategoryController@all');
    Route::get('/edit/{category}', 'CategoryController@edit')->name('edit-categorys');
    Route::post('/create', 'CategoryController@store')->name('store-category');
    Route::post('/update/{category}', 'CategoryController@update')->name('up-category');
    Route::post('/delete/{category}', 'CategoryController@destroy')->name('delete-category');
});

Route::prefix('product')->group(function () {
    Route::get('/', 'ProductController@index')->name('products');
    Route::get('/edit/{product}', 'ProductController@edit')->name('edit-product');
    Route::post('/create', 'ProductController@store')->name('store-product');
    Route::post('/update/{product}', 'ProductController@update')->name('up-product');
    Route::post('/delete/{product}', 'ProductController@destroy')->name('delete-product');
});

Route::prefix('request')->group(function () {
    Route::get('/', 'RequestController@index')->name('requests');
    Route::get('/{pedido}', 'RequestController@getOrder')->name('getOrder');
});

Auth::routes();
Route::redirect('/home', '/category')->name('home');
