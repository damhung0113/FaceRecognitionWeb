<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');
Auth::routes([
  'register' => false,
  'reset' => false,
  'verify' => false,
]);

Route::resource('/home', 'HomeController')->middleware(['auth']);
