<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'LoginController@index')->name('index');

Route::group(['prefix' => 'acesso'], function () {

Route::get('/login', 'LoginController@login')->name('login');
Route::post('/login', 'LoginController@efetuarlogin')->name('efetuarlogin');
Route::get('/registro', 'LoginController@registro')->name('registro');
Route::post('/registro', 'LoginController@cadastro')->name('cadastro');
Route::get('/recupera', 'LoginController@recupera')->name('recuperacao');
Route::post('/recupera', 'LoginController@recuperasenha')->name('recuperaçãosenha');
Route::get('/altera', 'LoginController@alterar')->name('altera');
Route::post('/altera', 'LoginController@alterarsenha')->name('alterasenha');
Route::get('/verirficacodigo', 'LoginController@verirficacodigo')->name('verirficacodigo');
Route::post('/verirficacodigo', 'LoginController@verirficacodigopost')->name('verirficacodigopost');
});


Route::group(['prefix' => 'aplicacao'], function () {

    Route::get('/home', 'homeController@home')->name('home')->middleware('checksession');

});


Route::get('/logout', function () {
    session()->flush(); // remove todas as variáveis da sessão
    return redirect()->route('login'); // envia de volta para o login
});