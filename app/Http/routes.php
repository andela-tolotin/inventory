<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/add-product', 'HomeController@loadAddProductForm');
Route::get('/search', 'ProductController@loadSeachForm');
Route::post('/search-form', 'ProductController@search');

Route::post('/product/create', 'ProductController@addProduct');
