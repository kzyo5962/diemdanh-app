<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ClassroomController;

Route::get('/', function () {
    return view('layout.main');
});

Route::resource('/students', StudentController::class);
Route::resource('/classrooms', ClassroomController::class);
