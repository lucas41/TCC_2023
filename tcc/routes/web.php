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

    Route::get('/home', 'homeController@home')->name('home')->middleware('checksession'); // Pagina inicial da aplicação
    Route::get('/cadastroConta', 'ContaBancariaController@home')->name('Cadastraconta')->middleware('checksession');     //Cadastro de conta bancaria formulario
    Route::post('/cadastroConta', 'ContaBancariaController@CadastrarConta')->name('Cadatroform')->middleware('checksession'); // cadastro de conbta bancaria recebimento do form 
    Route::get('/selecionaconta', 'ContaBancariaController@selecionaconta')->name('selecionaconta')->middleware('checksession'); // visualizado de contas bancarias cadastradas 
    Route::get('/selecionaconta/{id}', 'ContaBancariaController@selecionarContaid')->name('selecionarContaid'); // selecionar a conta bancaria que deseja trabalhar na home

});

Route::group(['prefix' => 'CentroCusto'], function () {

    Route::get('/cadastroCentrocusto', 'CentroCustoController@index')->name('CentroCusto')->middleware('checksession');     //Cadastro de conta bancaria formulario
    Route::post('/cadastroCentrocusto', 'CentroCustoController@cadastro')->name('CentroCustocadastro')->middleware('checksession');     //Cadastro de conta bancaria formulario

});

Route::get('/logout', function () {
    session()->flush(); // remove todas as variáveis da sessão
    return redirect()->route('login'); // envia de volta para o login
});