<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('layout.main');
});

Route::get('/students', function () {
    return view('students.manage');
});