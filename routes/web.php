<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});
Route::get('/',[UserController::class,'index']);
Route::delete('/user/{id}',[UserController::class,'user']);
Route::get('/detailuser/{id}',[UserController::class,'detail']);
Route::get('/create',[UserController::class,'create']);
Route::post('/create',[UserController::class,'createuser']);
Route::put('/user/{user}', [UserController::class, 'update'])->name('user.update');

Route::get('/company',[CompanyController::class,'company']);
Route::delete('/company/{id}',[CompanyController::class,'delete']);
Route::get('/detailcompany/{id}',[CompanyController::class,'detail']);
Route::get('/createcompany',[CompanyController::class,'create']);
Route::post('/create',[CompanyController::class,'createcompany']);
Route::put('/company/{name}', [CompanyController::class, 'update'])->name('company.update');

Route::get('/product',[ProductController::class,'product']);
Route::get('/createproduct',[ProductController::class,'createproduct']);
Route::post('/createproduct',[ProductController::class,'addproduct']);
Route::get('/detailproduct/{id}',[ProductController::class,'detail']);
Route::delete('/deleteproduct/{id}',[ProductController::class,'delete']);


