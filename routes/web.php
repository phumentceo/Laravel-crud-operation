<?php

use App\Http\Controllers\AuthController;
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



#Auth Routers
Route::get('/login',[AuthController::class,'showLogin'])->name('auth.show.login');
Route::post('/login/process',[AuthController::class,'processLogin'])->name('auth.login.process');

Route::get('/register',[AuthController::class,'showRegister'])->name('auth.show.register');
Route::post('/register/process',[AuthController::class,'processRegister'])->name('auth.register.process');


Route::get('/logout',[AuthController::class,'logout'])->name('auth.logout');

#Router with controller
Route::get('/product',[ProductController::class,'index'])->name('product.list');
Route::get('/product/create',[ProductController::class,'create'])->name('product.create');
Route::get('/product/edit/{id}',[ProductController::class,'edit'])->name('product.edit');
Route::post('/product/store',[ProductController::class,'store'])->name('product.store');
Route::get('/product/{id}',[ProductController::class,'delete'])->name('product.delete');
Route::post('/product/deleteSelect',[ProductController::class,'deleteSelect'])->name('product.deleteSelect');
Route::post('/product/update/{id}',[ProductController::class,'update'])->name('product.update');



// Route::get('/login',function(){
//     return view('login');
// });

// Route::get('/register',function(){
//     return view('register');
// });