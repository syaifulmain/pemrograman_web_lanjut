<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LevelController;
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

Route::get('/', function () {
    return view('welcome');
});

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
});
