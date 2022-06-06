<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('layout.main');
})->name('/');

Route::resource('/students', StudentController::class)->except(['show']);
Route::resource('/classrooms', ClassroomController::class)->except(['show']);

Route::get('/login', [UserController::class, 'login'])->name('login');

Route::get('/register', [UserController::class, 'register'])->name('register');
