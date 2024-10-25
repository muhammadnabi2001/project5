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
Route::get('/company',[CompanyController::class,'company']);
Route::delete('/company/{id}',[CompanyController::class,'delete']);
Route::get('/detailcompany/{id}',[CompanyController::class,'detail']);
Route::get('/createcompany',[CompanyController::class,'create']);
Route::post('/create',[CompanyController::class,'createcompany']);
Route::get('/product',[ProductController::class,'product']);
Route::get('/createproduct',[ProductController::class,'createproduct']);
