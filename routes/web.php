<?php

Route::get('/', function () {
    return view('products.search');
});



Route::group(['prefix' => 'products'], function () {
	Route::get('/upload', 'ProductUploadController@index');
	Route::post('/upload', 'ProductUploadController@upload');
	
	Route::get('/create', 'ProductController@create');
	Route::post('/store', 'ProductController@store');
	Route::get('/{product}', 'ProductController@show');
});

Route::resource('category', 'CategoryController');

