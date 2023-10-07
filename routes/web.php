<?php

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\StudentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Student\AccountController;
use App\Http\Controllers\Student\ActivityController;
use App\Http\Controllers\Student\HomeController;
use App\Http\Controllers\Student\ReportController;
use App\Http\Controllers\Supervisor\StudentAttendanceController;
use App\Http\Controllers\Supervisor\SupervisorHomeController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
    Route::post('/login', [AuthController::class, 'submit']);
    Route::prefix('/admin')->name('admin.')->group(function () {
        Route::get('/login', [AuthController::class, 'login'])->name('login');
        Route::post('/login', [AuthController::class, 'submit']);
    });
});

Route::middleware(['auth'])->group(function () {
    /* Home route */
    Route::get('/', function () {
        return match (Auth::user()->role_id) {
            User::$ADMIN => redirect(route('admin.dashboard')),
            User::$STUDENT => redirect(route('student.home')),
            User::$SUPERVISOR => redirect(route('supervisor.home')),
            default => redirect()->intended(),
        };
    });

    /* Route For Student */
    Route::middleware(['student'])->prefix('/student')->name('student.')->group(function () {
        Route::get('/', [HomeController::class, 'index'])->name('home');
        Route::controller(ActivityController::class)->prefix('/activities')->group(function () {
            Route::get('/checkin', 'index')->name('checkin');
            Route::get('/checkout', 'index')->name('checkout');
            Route::post('/checkin', 'submit');
            Route::post('/checkout', 'submit');
        });
        Route::controller(ReportController::class)->group(function () {
            Route::get('/reports', 'index')->name('reports');
        });
        Route::get('/profile', [AccountController::class, 'index'])->name('profile');
    });

    /* Route For Supervisor */
    Route::middleware(['supervisor'])->prefix('/supervisor')->name('supervisor.')->group(function () {
        Route::get('/', [SupervisorHomeController::class, 'index'])->name('home');
        Route::get('/attendance', [StudentAttendanceController::class, 'index'])->name('attendance');
    });

    /* Route For Admin */
    Route::middleware(['admin'])->prefix('/admin')->name('admin.')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/students', [StudentController::class, 'index'])->name('students');
        Route::post('/students', [StudentController::class, 'create']);
//        Route::controller(StudentController::class)->group(function () {
//            Route::get('/students', 'index')->name('students');
//            Route::post('/students', 'addStudent');
//        });
    });

    /* Logout */
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
