<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\RoleController;


Route::middleware(['prevent.back.history'])->group(function () {
    Route::middleware(['guest'])->group(function () {
        Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
        Route::get('/register', [UserController::class, 'register'])->name('register');
        Route::post('/authenticate', [UserController::class, 'authenticate'])->name('authenticate');
        Route::post('/save-account', [UserController::class, 'save'])->name('save.account');
    });

    Route::middleware(['auth'])->group(function () {
        Route::get('/logout', [UserController::class, 'logout'])->name('logout');
        Route::get('/', [UserController::class, 'index'])->name('home');
        Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
        Route::resource('/students', StudentController::class);
        Route::get('/students/export', [StudentController::class, 'export'])->name('students.export');
        Route::resource('/classrooms', ClassroomController::class);
        Route::resource('/teachers', TeacherController::class);
        Route::resource('/admin', AdminController::class);
        Route::resource('/roles', RoleController::class);
    });
});
