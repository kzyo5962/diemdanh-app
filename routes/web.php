<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ClassroomController;

Route::get('/', function () {
    return view('layout.main');
})->name('/');

Route::resource('/students', StudentController::class)->except(['show']);
Route::resource('/classrooms', ClassroomController::class)->except(['show']);
