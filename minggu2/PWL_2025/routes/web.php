<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\WelcomeController;
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

//Route::get('/', function () {
//    return "Selamat Datang";
//});
Route::get('/', [HomeController::class,'index']);

//Route::get('/hello', function () {
//    return "Hello World";
//});
Route::get('/hello', [WelcomeController::class,'hello']);

Route::get('/world', function () {
    return "Hello World";
});

//Route::get('/about', function () {
//    return "NIM : 2341720013 <br> Nama : Muhamad Syaifullah";
//});
Route::get('/about', [AboutController::class,'index']);
// Route Parameters

Route::get('/user/{name}', function ($name) {
    return "Nama saya " . $name;
});
Route::get('/posts/{post}/comments/{commnet}', function ($postId, $commentId) {
    return "Pos ke-" . $postId . " Komentar ke-: " . $commentId;
});

//Route::get('/articles/{id}', function ($id) {
//    return "Halaman artikel dengan ID " . $id;
//});
Route::get('/articles/{id}', [ArticleController::class,'index']);
// Optional Parameters

Route::get('/user/{name?}', function ($name = "John") {
    return "Nama saya " . $name;
});

// Route Name

//Route::get('/user/profile', function () {
//})->name('profile');
//
//Route::get('/user/profile',
//    [UserProfileController::class, 'show']
//)->name('profile');
//
//// Generating URLs...
//$url = route('profile');
//
//// Generating Redirects...
//return redirect()->route('profile');
//
//// Route Group dan Route Prefixes
//
//Route::middleware(['first', 'second'])->group(function () {
//    Route::get('/', function () {
//        // Uses first & second middleware...
//    });
//
//    Route::get('/user/profile', function () {
//        // Uses first & second middleware...
//    });
//});
//
//Route::domain('{account}.example.com')->group(function () {
//    Route::get('user/{id}', function ($account, $id) {
//        //
//    });
//});
//
//Route::middleware('auth')->group(function () {
//    Route::get('/user', [UserController::class, 'index']);
//    Route::get('/post', [PostController::class, 'index']);
//    Route::get('/event', [EventController::class, 'index']);
//});
//
//// Route Prefixes
//
//Route::prefix('admin')->group(function () {
//    Route::get('/user', [UserController::class, 'index']);
//    Route::get('/post', [PostController::class, 'index']);
//    Route::get('/event', [EventController::class, 'index']);
//});
//
//// Redirect Route
//
//Route::redirect('/here', '/there');
//
//// View Route
//
//Route::view('/welcome', 'welcome');
//Route::view('/welcome', 'welcome', ['name' => 'Taylor']);


Route::resource('photos', PhotoController::class)->only([
    'index', 'show'
]);

Route::resource('photos', PhotoController::class)->except([
    'create', 'store', 'update', 'destroy'
]);
