<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('main');
//});

Route::get('/', [\App\Http\Controllers\OrderController::class, 'index'])->name('home');
Route::get('/songs', [\App\Http\Controllers\SongsController::class, 'index'])->name('songs');

Route::middleware(['guest'])->group(function () {
    Route::post('/sign-up', [\App\Http\Controllers\UserController::class, 'signUp']);
    Route::post('/login', [\App\Http\Controllers\UserController::class, 'login']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/sign-out', [\App\Http\Controllers\UserController::class, 'signOut'])->name('sign-out');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin');
    Route::post('/add-song', [\App\Http\Controllers\AdminController::class, 'addSong']);
    Route::post('/save-song', [\App\Http\Controllers\AdminController::class, 'saveSong']);
    Route::get('/admin-all-songs', [\App\Http\Controllers\AdminController::class, 'allSongs'])->name('admin-all-songs');
});
