<?php

// use Illuminate\Support\Facades\Redis;
Route::get('/', function () {
    return view('products.search');
});

Route::get('/products/create' , function () {
    return view('products.create');
});
