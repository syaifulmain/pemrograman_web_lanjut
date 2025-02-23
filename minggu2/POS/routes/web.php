<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
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

Route::prefix('product') ->group(function ()
{
    Route::get('/', [ProductController::class, 'index']);
    Route::prefix('category') ->group(function ()
    {
        Route::get('/food-beverage', [ProductController::class, 'foodBeverage']) -> name ('product.food-beverage');
        Route::get('/beauty-health', [ProductController::class, 'beautyHealth']) -> name ('product.beauty-health');
        Route::get('/home-care', [ProductController::class, 'homeCare']) -> name ('product.home-care');
        Route::get('/baby-kid', [ProductController::class, 'babyKid']) -> name ('product.baby-kid');
    });
});

Route::get('/transaction', [TransactionController::class, 'index']);

Route::get('/user/{id}/name/{name}', [UserController::class, 'index']);
