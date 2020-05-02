<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');
Route::get('/', 'Auth\LoginController@login');
Route::get('/teacher', 'TeacherController@index')->name('teacher');
Route::get('/student', 'StudentController@index')->name('student');
Auth::routes([
  'register' => false,
  'reset' => false,
  'verify' => false,
]);

Route::get('/home', 'HomeController@index')->name('home');
