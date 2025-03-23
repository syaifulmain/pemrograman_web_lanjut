<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\PenjualanController;
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

Route::prefix('kategori')->group(function () {
    Route::get('/', [KategoriController::class, 'index']);
    Route::post('/', [KategoriController::class, 'store']);
    Route::get('/create', [KategoriController::class, 'create']);
    Route::get('/edit/{id}', [KategoriController::class, 'edit']);
    Route::put('/edit', [KategoriController::class, 'update']);
    Route::get('/hapus/{id}', [KategoriController::class, 'delete']);
});

Route::prefix('level')->group(function () {
    Route::get('/', [LevelController::class, 'index']);
    Route::post('/', [LevelController::class, 'store']);
    Route::get('/create', [LevelController::class, 'create']);
    Route::get('/edit/{id}', [LevelController::class, 'edit']);
    Route::put('/edit', [LevelController::class, 'update']);
    Route::get('/hapus/{id}', [LevelController::class, 'delete']);
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

Route::prefix('barang')->group(function () {
    Route::get('/', [BarangController::class, 'index']);
    Route::post('/', [BarangController::class, 'store']);
    Route::get('/create', [BarangController::class, 'create/']);
    Route::get('/edit/{id}', [BarangController::class, 'edit']);
    Route::put('/edit', [BarangController::class, 'update']);
    Route::get('/hapus/{id}', [BarangController::class, 'delete']);
});

Route::prefix('penjualan')->group(function () {
    Route::get('/', [PenjualanController::class, 'index']);
    Route::post('/', [PenjualanController::class, 'store']);
    Route::get('/create', [PenjualanController::class, 'create']);
    Route::get('/detail/{id}', [PenjualanController::class, 'detail']);
    Route::get('/hapus/{id}', [PenjualanController::class, 'delete']);
});

Route::prefix('stok')->group(function () {
    Route::get('/', [StokController::class, 'index']);
    Route::post('/', [StokController::class, 'store']);
    Route::get('/create', [StokController::class, 'create']);
    Route::get('/edit/{id}', [StokController::class, 'edit']);
    Route::put('/edit', [StokController::class, 'update']);
    Route::get('/hapus/{id}', [StokController::class, 'delete']);
});
