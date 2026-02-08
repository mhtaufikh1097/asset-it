<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Asset\DashboardController;
use App\Http\Controllers\Asset\AssetController;

// HOME → DASHBOARD
Route::get('/', [DashboardController::class, 'index']);

// DASHBOARD (opsional)
Route::get('/asset/dashboard', [DashboardController::class, 'index']);

// CRUD ASSET
Route::prefix('asset')->group(function () {
    Route::get('/list', [AssetController::class, 'index'])->name('asset.index');

   // CREATE
    Route::get('/create', [AssetController::class, 'create'])->name('asset.create');
    Route::post('/store', [AssetController::class, 'store'])->name('asset.store');

});


