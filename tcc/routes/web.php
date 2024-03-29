<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'LoginController@index')->name('index');

Route::group(['prefix' => 'acesso'], function () { // Rotas voltas para a parte não logada da aplicação (Login, Recupera Senha, Cadastro etc..)

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

Route::group(['prefix' => 'main', 'middleware' => 'checksession'], function () { // Rotas ligadas diretamente com a home da aplicação

    Route::get('/home', 'HomeController@home')->name('home'); // Pagina inicial da aplicação

});

Route::group(['prefix' => 'configuracao', 'middleware' => 'checksession'], function () { //Rotas ligadas a parte de configurações do user (Alterar senha, imagem, deletar conta)

    Route::get('/configura', 'ConfiguracaoController@configura')->name('configurar.get');
    Route::post('/configura', 'ConfiguracaoController@configurapost')->name('configurar.post');
    Route::get('/seguranca', 'ConfiguracaoController@seguranca')->name('seguranca.get');
    Route::post('/seguranca', 'ConfiguracaoController@segurancapost')->name('seguranca.post');
    Route::get('/deletar', 'ConfiguracaoController@deletar')->name('deletar'); 
    Route::delete('/deletar', 'ConfiguracaoController@destroy')->name('deletar.destroy');
    Route::post('/enviar-email', 'ConfiguracaoController@enviarEmail')->name('enviar.email');

});

Route::group(['prefix' => 'ContaBancaria', 'middleware' => 'checksession'], function () { // Rotas ligadas aos cadastro e manutenção das contas
    
    Route::get('/selecionaconta', 'ContaBancariaController@selecionaconta')->name('selecionaconta');
    Route::post('/selecionaconta', 'ContaBancariaController@CadastrarConta')->name('selecionacontapost'); // visualizado de contas bancarias cadastradas 
    Route::get('/selecionaconta/{id}', 'ContaBancariaController@selecionarContaid')->name('selecionarContaid'); // selecionar a conta bancaria que deseja trabalhar na home
    Route::get('/apagarContaid/{id}', 'ContaBancariaController@apagaContaid')->name('apagarContaid');  //apaga a conta bancaria seleiconada 
    Route::get('/contas/{id}/edit', 'ContaBancariaController@edit')->name('contas.edit');
    Route::post('/contas/{id}/update', 'ContaBancariaController@update')->name('contas.update');

});

Route::group(['prefix' => 'CentroCusto', 'middleware' => 'checksession'], function () { // Rotas ligadas aos cadastro e manutenção dos centros de custo
    
    Route::get('/cadastroCentrocusto', 'CentroCustoController@index')->name('CentroCusto');     //Cadastro de conta bancaria formulario
    Route::post('/cadastroCentrocusto', 'CentroCustoController@cadastro')->name('CentroCustocadastro');     //Cadastro de conta bancaria formulario
    Route::get('/apagarcentroid/{id}', 'CentroCustoController@apagaCentroid')->name('apagarcentroid');  //apaga a conta bancaria seleiconada 
    Route::get('/CentroCusto/{id}/edit', 'CentroCustoController@edit')->name('CentroCusto.edit');
    Route::post('/CentroCusto/{id}/update', 'CentroCustoController@update')->name('CentroCusto.update');

});

Route::group(['prefix' => 'LancamentoContabil', 'middleware' => 'checksession'], function() { //Rotas ligadas aos cadastro e manutenção dos lançamentos

    Route::get('/cadastroLancamento', 'LancamentoContabilController@index')->name('CadastroLancamento');
    Route::post('/cadastroLancamento', 'LancamentoContabilController@cadastro')->name('CadastroLancamentofinal');
    Route::get('/apagalancamentoid/{id}', 'LancamentoContabilController@apagalancamentoid')->name('apagalancamentoid');  //apaga a conta bancaria seleiconada 
    Route::get('/lancamento/{id}/edit', 'LancamentoContabilController@edit')->name('lancamento.edit');
    Route::post('/lancamento/{id}/update', 'LancamentoContabilController@update')->name('lancamento.update');

});

Route::group(['prefix' => 'Relatorio', 'middleware' => 'checksession'], function() { //Rotas ligadas aos cadastro e manutenção dos lançamentos

    Route::get('/Relatorio', 'RelatorioController@index')->name('Relatorio');

});


Route::get('/logout', function () { //Rota da atividade de logout ( matar a sessão e voltar para as rotas de acesso )
    session()->flush(); // remove todas as variáveis da sessão
    return redirect()->route('index'); // envia de volta para o login
})->name('logout');