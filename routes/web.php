<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('landing');
});

// Route::get('/dashboard', function () {
//     $user = Auth::user();
//     return view('home', compact('user'));

// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/create-category', [CategoryController::class, 'create']);
    Route::post('/store-category', [CategoryController::class, 'store']);
    
    Route::get('/transactions', [TransactionController::class, 'index']);
    Route::get('/transactions/create', [TransactionController::class, 'create']);
    Route::get('/transactions/detail/{id}', [TransactionController::class, 'show']);
    Route::get('/transactions/edit/{id}', [TransactionController::class, 'edit']);
    Route::put('/transactions/update/{id}', [TransactionController::class, 'update']);
    Route::delete('/transactions/delete/{id}', [TransactionController::class, 'destroy']);
    Route::post('/transactions/store', [TransactionController::class, 'store']);

    Route::get('/myWallet', [WalletController::class, 'index']);
    Route::get('/myWallet/create', [WalletController::class, 'create']);
    Route::post('/myWallet/store', [WalletController::class, 'store']);
    Route::get('/myWallet/detail/{id}', [WalletController::class, 'show']);
});

require __DIR__.'/auth.php';
