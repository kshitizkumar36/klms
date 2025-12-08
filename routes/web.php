<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/student_dashboard', function () {
    return view('dashboard/student');
});


Route::get('/instructor_dashboard', function () {
    return view('dashboard/instructor');
});

