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

Route::get('/login', function () {
    return view('auth/login');
});

Route::get('/signup', function () {
    return view('auth/signup');
});



Route::get('/student_course', function () {
    return view('dashboard.student/my_courses');
});

Route::get('/course_player', function () {
    return view('dashboard.student/course_player');
});



Route::get('/student_wishlist', function () {
    return view('dashboard.student.wishlist');
});


Route::get('/student_learnings', function () {
    return view('dashboard.student.learning');
});


Route::get('/student_setting', function () {
    return view('dashboard.student.setting');
});

