<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\users;
use App\Models\ContaBancaria;
use Illuminate\Support\Facades\Session;
use App\Models\LancamentoContabil;

class ContaBancariaController extends Controller
{

    public function home()
    {
        return view('ContaBancaria/cadastro');
    }

    public function CadastrarConta(Request $Request)
    {

        $userId = session('id');
        $post = new ContaBancaria();
        $post->Nome_Conta = $Request->input('Nome_Conta');
        $post->Nome_banco = $Request->input('Nome_banco');
        $post->Agencia = $Request->input('Agencia');
        $post->Numero = $Request->input('Numero');
        $post->saldo = $Request->input('saldo');
        $post->entrada = $Request->input('saldo');
        $post->saida = 0;
        $post->user_id = $userId;
        $post->save();

        $contaBancariaId = $post->getKey();

        $lancamentoinicial = new LancamentoContabil();
        $lancamentoinicial->Nome = "Lançamento inicial";
        $lancamentoinicial->Tipo = 1;
        $lancamentoinicial->valor = $Request->input('saldo');
        $lancamentoinicial->conta_bancaria_id = $contaBancariaId;
        $lancamentoinicial->centro_custo_id  = null;
        $lancamentoinicial->save();
        
        return redirect()->route('selecionaconta');

    }

    public function selecionaconta(Request $request)
    {

        $userId = session('id');
        $contasBancarias = ContaBancaria::where('user_id', $userId)->get();
        $user = users::where('id', $userId)->first();
        return view('ContaBancaria/seleciona', compact('contasBancarias', 'user'));
    }

    public function selecionarContaid($id)
    {

        Session::put('id_conta_selecionada', $id);
        return redirect()->route('home');

    }

    public function apagaContaid($id)
    {
        $ContaBancaria = ContaBancaria::where('id', $id)->first();
        try {
            $ContaBancaria->delete();
            return redirect()->route('selecionaconta')->with('success', 'Conta apagada com sucesso');

        } catch (\Exception $e) {
            return redirect()->back()->with('danger', '' . $e->getMessage());
        }



    }

}