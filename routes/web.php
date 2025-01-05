<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\CategoryController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [TransactionController::class, 'index']);

Route::get('/create-category', [CategoryController::class, 'create']);
Route::post('/store-category', [CategoryController::class, 'store']);

Route::get('/create-transaction', [TransactionController::class, 'create']);
Route::get('/transaction/detail/{id}', [TransactionController::class, 'show']);
Route::get('/transaction/edit/{id}', [TransactionController::class, 'edit']);
Route::post('/transaction/update/{id}', [TransactionController::class, 'update']);
Route::delete('/transaction/delete/{id}', [TransactionController::class, 'destroy']);
Route::post('/store-transaction', [TransactionController::class, 'store']);