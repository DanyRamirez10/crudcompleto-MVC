<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\IndexController;
use App\Http\Controllers\UserController;

Route::get('/', [IndexController::class, 'actionIndex']);

Route::get('user/getall', [UserController::class, 'actionGetAll']);
Route::match(['get', 'post'], 'user/insert', [UserController::class, 'actionInsert']);
Route::get('user/delete/{idUser}', [UserController::class, 'actionDelete']);
Route::match(['get', 'post'], 'user/update/{idUser}', [UserController::class, 'actionUpdate']);