<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\POSController;
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

//Route::get('/level', [LevelController::class, 'index']);
Route::get('/kategori/create', [KategoriController::class, 'create']);
Route::post('/kategori', [KategoriController::class, 'store']);
Route::get('/kategori', [KategoriController::class, 'index']);

Route::get('kategori/edit/{id}', [KategoriController::class, 'edit']);
Route::put('kategori/edit', [KategoriController::class, 'update']);
Route::get('kategori/hapus/{id}', [KategoriController::class, 'delete']);

Route::get('/level/create', [LevelController::class, 'create']);
Route::post('/level', [LevelController::class, 'store']);
Route::get('/level', [LevelController::class, 'index']);

Route::get('level/edit/{id}', [LevelController::class, 'edit']);
Route::put('level/edit', [LevelController::class, 'update']);
Route::get('level/hapus/{id}', [LevelController::class, 'delete']);

Route::get('/user/create', [UserController::class, 'create']);
Route::post('/user', [UserController::class, 'store']);
Route::get('/user', [UserController::class, 'index']);

Route::get('user/edit/{id}', [UserController::class, 'edit']);
Route::put('user/edit', [UserController::class, 'update']);
Route::get('user/hapus/{id}', [UserController::class, 'delete']);

//Route::get('/user', [UserController::class, 'index']);
//
//JS4
//Route::get('/user/tambah', [UserController::class, 'tambah']);
//Route::post('/user/tambah_simpan', [UserController::class, 'tambah_simpan']);
//Route::get('/user/ubah/{id}', [UserController::class, 'ubah']);
//Route::put('/user/ubah_simpan/{id}', [UserController::class, 'ubah_simpan']);
//Route::get('/user/hapus/{id}', [UserController::class, 'hapus']);

Route::resource('m_user', POSController::class);
