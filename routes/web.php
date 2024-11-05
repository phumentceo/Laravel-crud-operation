<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Route::get('/product',function(){
//     return view('product');
// });

// Route::get("/product/create", function(){
//     return view('create');
// });

// Route::get("/product/edit",function(){
//     return view('edit');


#Router with controller
Route::get('/product',[ProductController::class,'index'])->name('product.list');
Route::get('/product/create',[ProductController::class,'create'])->name('product.create');
Route::get('/product/edit/{id}',[ProductController::class,'edit'])->name('product.edit');
Route::post('/product/store',[ProductController::class,'store'])->name('product.store');
Route::get('/product/{id}',[ProductController::class,'delete'])->name('product.delete');
Route::post('/product/update/{id}',[ProductController::class,'update'])->name('product.update');