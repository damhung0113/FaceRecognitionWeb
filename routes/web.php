<?php

use Illuminate\Support\Facades\Route;

Route::get('/login', 'Auth\LoginController@showLoginForm');
Auth::routes([
  'register' => false,
  'reset' => false,
  'verify' => false,
]);

Route::resource('/home', 'HomeController')->middleware(['auth']);
