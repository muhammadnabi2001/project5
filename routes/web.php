<?php

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
