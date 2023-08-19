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
    Route::get('/configura', 'homeController@configura')->name('configurar')->middleware('checksession'); 
    Route::post('/configura', 'homeController@configurapost')->name('configurarpost')->middleware('checksession'); 
    Route::get('/seguranca', 'homeController@seguranca')->name('seguranca')->middleware('checksession'); 
    Route::get('/deletar', 'homeController@deletar')->name('deletar')->middleware('checksession'); 
    Route::get('/selecionaconta', 'ContaBancariaController@selecionaconta')->name('selecionaconta')->middleware('checksession');
    Route::post('/selecionaconta', 'ContaBancariaController@CadastrarConta')->name('selecionacontapost')->middleware('checksession'); // visualizado de contas bancarias cadastradas 
    Route::get('/selecionaconta/{id}', 'ContaBancariaController@selecionarContaid')->name('selecionarContaid'); // selecionar a conta bancaria que deseja trabalhar na home

});

Route::group(['prefix' => 'CentroCusto'], function () {

    Route::get('/cadastroCentrocusto', 'CentroCustoController@index')->name('CentroCusto')->middleware('checksession');     //Cadastro de conta bancaria formulario
    Route::post('/cadastroCentrocusto', 'CentroCustoController@cadastro')->name('CentroCustocadastro')->middleware('checksession');     //Cadastro de conta bancaria formulario

});

Route::group(['prefix' => 'LancamentoContabil'], function() {
    
    Route::get('/cadastroLancamento', 'LancamentoContabilcontroller@index')->name('CadastroLancamento')->middleware('checksession');
    Route::post('/cadastroLancamento', 'LancamentoContabilcontroller@cadastro')->name('CadastroLancamentofinal')->middleware('checksession');

});

Route::get('/logout', function () {
    session()->flush(); // remove todas as variáveis da sessão
    return redirect()->route('login'); // envia de volta para o login
});