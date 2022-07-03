<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

Route::middleware(['prevent.back.history'])->group(function () {
    Route::group([
        'namespace' => 'Auth',
        'as' => 'auth.'
    ], function () {
        Route::get('/login', [LoginController::class, 'login'])->name('login');
        Route::post('/login', [LoginController::class, 'onLogin'])->name('onLogin');
        Route::get('/forbidden', [LoginController::class, 'forbidden'])->name('forbidden');
        Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

        Route::get('/register', [RegisterController::class, 'register'])->name('register');
        Route::post('/register', [RegisterController::class, 'onRegister'])->name('onRegister');
    });

    Route::middleware(['auth'])->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('home');
        Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
        Route::resource('/students', StudentController::class);
        Route::get('/students/export', [StudentController::class, 'export'])->name('students.export');
        Route::resource('/classrooms', ClassroomController::class);
        Route::resource('/teachers', TeacherController::class);
        Route::resource('/admin', AdminController::class)->middleware('admin');
        Route::resource('/roles', RoleController::class);
    });
});
