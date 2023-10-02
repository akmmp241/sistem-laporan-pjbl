<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\AuthMiddleware;
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


Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'submit'])->name('login');
});

Route::middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::controller(ActivityController::class)->group(function () {
        Route::get('/activity/checkin', 'index')->name('checkin');
        Route::get('/activity/checkout', 'index')->name('checkout');
    });

    Route::get('/logout', [AuthController::class, 'logout']);
});
