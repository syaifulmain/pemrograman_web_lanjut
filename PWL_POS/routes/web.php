<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index']);

Route::pattern('id', '[0-9]+');

Route::middleware(['mustNotLogin'])->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'postlogin']);

    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'store']);
});

Route::middleware(['mustLogin'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


    Route::middleware(['authorize:MNG'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::prefix('kategori')->group(function () {
            Route::get('/', [KategoriController::class, 'index']);
            Route::post('/list', [KategoriController::class, 'list']);
            Route::get('/{id}/show', [KategoriController::class, 'show']);
            Route::get('/create', [KategoriController::class, 'create']);
            Route::post('/', [KategoriController::class, 'store']);
            Route::get('/{id}/edit', [KategoriController::class, 'edit']);
            Route::put('/{id}/update', [KategoriController::class, 'update']);
            Route::get('/{id}/delete', [KategoriController::class, 'confirm']);
            Route::delete('/{id}/delete', [KategoriController::class, 'delete']);
        });

        Route::prefix('barang')->group(function () {
            Route::get('/', [BarangController::class, 'index']);
            Route::post('/list', [BarangController::class, 'list']);
            Route::get('/{id}/show', [BarangController::class, 'show']);
            Route::get('/create', [BarangController::class, 'create']);
            Route::post('/', [BarangController::class, 'store']);
            Route::get('/{id}/edit', [BarangController::class, 'edit']);
            Route::put('/{id}/update', [BarangController::class, 'update']);
            Route::get('/{id}/delete', [BarangController::class, 'confirm']);
            Route::delete('/{id}/delete', [BarangController::class, 'delete']);
        });

        Route::prefix('stok')->group(function () {
            Route::get('/', [StokController::class, 'index']);
            Route::post('/list', [StokController::class, 'list']);
            Route::get('/{id}/show', [StokController::class, 'show']);
            Route::get('/create', [StokController::class, 'create']);
            Route::post('/', [StokController::class, 'store']);
            Route::get('/{id}/edit', [StokController::class, 'edit']);
            Route::put('/{id}/update', [StokController::class, 'update']);
            Route::get('/{id}/delete', [StokController::class, 'confirm']);
            Route::delete('/{id}/delete', [StokController::class, 'delete']);
        });
    });

    Route::middleware(['authorize:ADM'])->group(function () {
        Route::prefix('level')->group(function () {
            Route::get('/', [LevelController::class, 'index']);
            Route::post('/list', [LevelController::class, 'list']);
            Route::get('/{id}/show', [LevelController::class, 'show']);
            Route::get('/create', [LevelController::class, 'create']);
            Route::post('/', [LevelController::class, 'store']);
            Route::get('/{id}/edit', [LevelController::class, 'edit']);
            Route::put('/{id}/update', [LevelController::class, 'update']);
            Route::get('/{id}/delete', [LevelController::class, 'confirm']);
            Route::delete('/{id}/delete', [LevelController::class, 'delete']);
        });

        Route::prefix('user')->group(function () {
            Route::get('/', [UserController::class, 'index']);
            Route::post('/', [UserController::class, 'store']);
            Route::get('/create', [UserController::class, 'create']);
            Route::get('/edit/{id}', [UserController::class, 'edit']);
            Route::put('/edit', [UserController::class, 'update']);
            Route::get('/hapus/{id}', [UserController::class, 'delete']);

            Route::post('/list', [UserController::class, 'list']);
            Route::get('/{id}/show_ajax', [UserController::class, 'show']);
            Route::get('/create_ajax', [UserController::class, 'create_ajax']);
            Route::post('/ajax', [UserController::class, 'store_ajax']);
            Route::get('/{id}/edit_ajax', [UserController::class, 'edit_ajax']);
            Route::put('/{id}/update_ajax', [UserController::class, 'update_ajax']);
            Route::get('/{id}/delete_ajax', [UserController::class, 'confirm_ajax']);
            Route::delete('/{id}/delete_ajax', [UserController::class, 'delete_ajax']);

        });
    });

    Route::middleware(['authorize:STF'])->group(function () {
        Route::prefix('penjualan')->group(function () {
            Route::get('/', [PenjualanController::class, 'index']);
            Route::post('/', [PenjualanController::class, 'store']);
            Route::get('/create', [PenjualanController::class, 'create']);
            Route::get('/detail/{id}', [PenjualanController::class, 'detail']);
            Route::get('/hapus/{id}', [PenjualanController::class, 'delete']);
        });
    });
});

