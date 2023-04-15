<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'LoginController@index')->name('index');

Route::group(['prefix' => 'acesso'], function () {
Route::get('/login', 'LoginController@login')->name('login');
Route::get('/registro', 'LoginController@registro')->name('registro');
Route::get('/recupera', 'LoginController@recupera')->name('recuperacao');
Route::get('/altera', 'LoginController@alterar')->name('altera');

});