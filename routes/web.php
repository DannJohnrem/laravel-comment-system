<?php

use App\Http\Controllers\Admin\Comment\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\Dashboard\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use Whoops\Run;

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

/* A group of routes that are only accessible to authenticated users. */
Route::middleware('auth')->group( function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::post('/logout', [LogoutController::class, 'store'])->name('logout');
});

Route::controller(CommentController::class)->group( function () {
    Route::get('/comment', 'index')->name('comment.index');
    Route::post('/comment', 'store')->name('comment.store');
});

/* A group of routes that are only accessible to guests. */
Route::middleware('guest')->group(function () {
    Route::controller(LoginController::class)->group(function () {
        Route::get('/login','index')->name('login');
        Route::post('/login', 'store')->name('login.store');
    });

    Route::controller(RegisterController::class)->group(function () {
        Route::get('/register', 'index')->name('register');
        Route::post('/register', 'store')->name('register.store');
    });


});

Route::get('/', function () {
    return view('home');
})->name('home');
