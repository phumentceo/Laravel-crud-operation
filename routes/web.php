<?php

use Illuminate\Support\Facades\Route;

Route::get('/product',function(){
    return view('product');
});


Route::get("/product/create", function(){
    return view('create');
});

Route::get("/product/edit",function(){
    return view('edit');
});