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




// instructor


Route::get('/instructor_courses', function () {
    return view('dashboard.instructor.my_courses');
});


Route::get('/create_course', function () {
    return view('dashboard.instructor.create_course');
});

Route::get('/edit_course{id}', function () {
    return view('dashboard.instructor.edit_course');
});




Route::get('/instructor_quiz', function () {
    return view('dashboard.instructor.quiz');
});


Route::get('/create_quiz', function () {
    return view('dashboard.instructor.create_quiz');
});


Route::get('/create_quiz_2', function () {
    return view('dashboard.instructor.create_quiz_2');
});
