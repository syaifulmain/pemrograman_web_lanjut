<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/register', \App\Http\Controllers\Api\RegisterController::class)->name('register');
Route::post('/login', \App\Http\Controllers\Api\LoginController::class)->name('login');
Route::post('/logout', \App\Http\Controllers\Api\LogoutController::class)->name('logout');

Route::get('/levels', [\App\Http\Controllers\Api\LevelController::class, 'index']);
Route::post('/levels', [\App\Http\Controllers\Api\LevelController::class, 'store']);
Route::get('/levels/{level}', [\App\Http\Controllers\Api\LevelController::class, 'show']);
Route::put('/levels/{level}', [\App\Http\Controllers\Api\LevelController::class, 'update']);
Route::delete('/levels/{level}', [\App\Http\Controllers\Api\LevelController::class, 'destroy']);

Route::prefix('/users')->group(function () {
    Route::get('/', [\App\Http\Controllers\Api\UserController::class, 'index']);
    Route::post('/', [\App\Http\Controllers\Api\UserController::class, 'store']);
    Route::get('/{user}', [\App\Http\Controllers\Api\UserController::class, 'show']);
    Route::put('/{user}', [\App\Http\Controllers\Api\UserController::class, 'update']);
    Route::delete('/{user}', [\App\Http\Controllers\Api\UserController::class, 'destroy']);
});

Route::prefix('/barangs')->group(function () {
    Route::get('/', [\App\Http\Controllers\Api\BarangController::class, 'index']);
    Route::post('/', [\App\Http\Controllers\Api\BarangController::class, 'store']);
    Route::get('/{barang}', [\App\Http\Controllers\Api\BarangController::class, 'show']);
    Route::put('/{barang}', [\App\Http\Controllers\Api\BarangController::class, 'update']);
    Route::delete('/{barang}', [\App\Http\Controllers\Api\BarangController::class, 'destroy']);
});

Route::prefix('/kategoris')->group(function () {
    Route::get('/', [\App\Http\Controllers\Api\KategoriController::class, 'index']);
    Route::post('/', [\App\Http\Controllers\Api\KategoriController::class, 'store']);
    Route::get('/{kategori}', [\App\Http\Controllers\Api\KategoriController::class, 'show']);
    Route::put('/{kategori}', [\App\Http\Controllers\Api\KategoriController::class, 'update']);
    Route::delete('/{kategori}', [\App\Http\Controllers\Api\KategoriController::class, 'destroy']);
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
