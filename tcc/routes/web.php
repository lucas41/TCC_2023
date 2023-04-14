<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'LoginController@index')->name('index');
Route::get('/login', 'LoginController@login')->name('login');
Route::get('/registro', 'LoginController@registro')->name('registro');
