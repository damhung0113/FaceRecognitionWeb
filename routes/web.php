<?php

use Illuminate\Support\Facades\Route;

Route::get('/login', 'Auth\LoginController@showLoginForm');
Route::get('/', 'Auth\LoginController@showLoginForm');
Auth::routes([
  'register' => false,
  'reset' => false,
  'verify' => false,
]);

Route::resource('/home', 'HomeController')->middleware(['auth']);
Route::resource('/subject', 'SubjectController')->middleware(['auth']);
Route::resource('/recognition', 'RecognitionController');
Route::resource('/student', 'StudentController')->middleware(['auth']);
Route::resource('/teacher', 'TeacherController')->middleware(['auth']);
