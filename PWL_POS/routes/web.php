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
use App\Http\Controllers\SupplierController;
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
            Route::get('/import', [KategoriController::class, 'import']);
            Route::post('/import_ajax', [KategoriController::class, 'import_ajax']);
            Route::get('/export_excel', [KategoriController::class, 'export_excel']);
            Route::get('/export_pdf', [KategoriController::class, 'export_pdf']);
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
            Route::get('/import', [BarangController::class, 'import']);
            Route::post('/import_ajax', [BarangController::class, 'import_ajax']);
            Route::get('/export_excel', [BarangController::class, 'export_excel']);
            Route::get('/export_pdf', [BarangController::class, 'export_pdf']);
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

        Route::prefix('supplier')->group(function () {
            Route::get('/', [SupplierController::class, 'index']);
            Route::post('/list', [SupplierController::class, 'list']);
            Route::get('/{id}/show', [SupplierController::class, 'show']);
            Route::get('/create', [SupplierController::class, 'create']);
            Route::post('/', [SupplierController::class, 'store']);
            Route::get('/{id}/edit', [SupplierController::class, 'edit']);
            Route::put('/{id}/update', [SupplierController::class, 'update']);
            Route::get('/{id}/delete', [SupplierController::class, 'confirm']);
            Route::delete('/{id}/delete', [SupplierController::class, 'delete']);
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
            Route::get('/import', [LevelController::class, 'import']);
            Route::post('/import_ajax', [LevelController::class, 'import_ajax']);
            Route::get('/export_excel', [LevelController::class, 'export_excel']);
            Route::get('/export_pdf', [LevelController::class, 'export_pdf']);
        });

        Route::prefix('user')->group(function () {
            Route::get('/', [UserController::class, 'index']);
            Route::post('/list', [UserController::class, 'list']);
            Route::get('/{id}/show', [UserController::class, 'show']);
            Route::get('/create', [UserController::class, 'create']);
            Route::post('/', [UserController::class, 'store']);
            Route::get('/{id}/edit', [UserController::class, 'edit']);
            Route::put('/{id}/update', [UserController::class, 'update']);
            Route::get('/{id}/delete', [UserController::class, 'confirm']);
            Route::delete('/{id}/delete', [UserController::class, 'delete']);
            Route::get('/import', [UserController::class, 'import']);
            Route::post('/import_ajax', [UserController::class, 'import_ajax']);
            Route::get('/export_excel', [UserController::class, 'export_excel']);
            Route::get('/export_pdf', [UserController::class, 'export_pdf']);
        });
    });

    Route::middleware(['authorize:STF'])->group(function () {
        Route::prefix('penjualan')->group(function () {
            Route::get('/', [PenjualanController::class, 'index']);
            Route::post('/list', [PenjualanController::class, 'list']);
            Route::get('/{id}/show', [PenjualanController::class, 'show']);
            Route::get('/create', [PenjualanController::class, 'create']);
            Route::get('/{id}/edit', [PenjualanController::class, 'edit']);
            Route::put('/{id}/update', [PenjualanController::class, 'update']);
            Route::get('/{id}/delete', [PenjualanController::class, 'confirm']);
            Route::delete('/{id}/delete', [PenjualanController::class, 'delete']);
            Route::post('/list_barang', [PenjualanController::class, 'listBarang']);
            Route::get('/bayar', [PenjualanController::class, 'bayar']);
            Route::post('/store', [PenjualanController::class, 'postbayar']);
        });
    });
});

