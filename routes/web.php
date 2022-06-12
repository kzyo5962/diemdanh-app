<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\UserController;


Route::middleware(['prevent.back.history'])->group(function () {
    Route::middleware(['guest'])->group(function () {
        Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
        Route::get('/register', [UserController::class, 'register'])->name('register');
        Route::post('/authenticate', [UserController::class, 'authenticate'])->name('authenticate');
        Route::post('/save-account', [UserController::class, 'save'])->name('save.account');
    });

    Route::middleware(['auth'])->group(function () {
        Route::get('/logout', [UserController::class, 'logout'])->name('logout');

        Route::get('/', [UserController::class, 'index'])->name('/');
        Route::resource('/students', StudentController::class)->except(['show']);
        Route::resource('/classrooms', ClassroomController::class)->except(['show']);
    });

});
