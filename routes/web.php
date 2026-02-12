<?php
use App\Http\Controllers\Asset\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Asset\DashboardController;
use App\Http\Controllers\Asset\AssetController;
use App\Http\Controllers\Asset\AssetTypeController;
use App\Http\Controllers\Asset\LaporanController;
use App\Http\Controllers\Asset\UserController;
use App\Http\Controllers\AuthController;

Route::middleware('auth')->group(function () {

    // DASHBOARD
    Route::get('/', [DashboardController::class, 'index']);

    // ========================
    // ASSET MODULE
    // ========================
 Route::prefix('asset')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('asset.dashboard');

    Route::get('/list', [AssetController::class, 'index'])
        ->name('asset.index');

    Route::get('/create', [AssetController::class, 'create'])
        ->name('asset.create');

    Route::post('/store', [AssetController::class, 'store'])
        ->name('asset.store');

    // DELETE DI BAWAH DAN LEBIH SPESIFIK
    Route::delete('/delete/{id}', [AssetController::class, 'destroy'])
        ->name('asset.destroy');



        // ========================
        // CATEGORY (asset/category)
        // ========================
        Route::get('/category', [CategoryController::class, 'index'])
            ->name('category.index');

        Route::get('/category/create', [CategoryController::class, 'create'])
            ->name('category.create');

        Route::post('/category/store', [CategoryController::class, 'store'])
            ->name('category.store');

        Route::delete('/category/{id}', [CategoryController::class, 'destroy'])
            ->name('category.destroy');

        // ========================
        // TYPE (asset/type)
        // ========================
        Route::get('/type', [AssetTypeController::class, 'index'])
            ->name('type.index');

        Route::get('/type/create', [AssetTypeController::class, 'create'])
            ->name('type.create');

        Route::post('/type/store', [AssetTypeController::class, 'store'])
            ->name('type.store');

        Route::delete('/type/{id}', [AssetTypeController::class, 'destroy'])
            ->name('type.destroy');

        // ========================
        // LAPORAN
        // ========================
        Route::get('/laporan', [LaporanController::class, 'index'])
            ->name('laporan.index');

    });

    // ========================
    // USER (tidak di dalam asset)
    // ========================
    Route::prefix('user-list')->group(function () {

        Route::get('/', [UserController::class, 'index'])
            ->name('user.index');

        Route::get('/create', [UserController::class, 'create'])
            ->name('user.create');

        Route::post('/store', [UserController::class, 'store'])
            ->name('user.store');

        Route::delete('/{id}', [UserController::class, 'destroy'])
            ->name('user.destroy');

    });

});

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.process');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');




