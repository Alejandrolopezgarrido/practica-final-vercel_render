<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('student', function(){
    return view('student');
});

Route::get('course', function(){
    return view('course');
});