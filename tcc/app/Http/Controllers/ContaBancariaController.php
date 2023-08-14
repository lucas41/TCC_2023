<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\users;
use App\Models\ContaBancaria;
use Illuminate\Support\Facades\Session;

class ContaBancariaController extends Controller
{

    public function home() {
        return view ('conta/cadastro');
    }

    public function CadastrarConta(Request $Request) {

        $userId = session('id');
        $post = new ContaBancaria();
        $post->Nome_Conta = $Request->input('Nome_Conta');
        $post->Nome_banco = $Request->input('Nome_banco');
        $post->Agencia = $Request->input('Agencia');
        $post->Numero = $Request->input('Numero');
        $post->saldo = $Request->input('saldo');
        $post->user_id  = $userId;
        $post->save();
        return redirect()->route('selecionaconta');

    }

    public function selecionaconta(Request $request){
        
        $userId = session('id');
        $contasBancarias = ContaBancaria::where('user_id', $userId)->get();
        return view ('conta/seleciona',compact('contasBancarias'));
    }

    public function selecionarContaid($id){

        Session::put('id_conta_selecionada', $id);
        return redirect()->route('home');
        
    }

}


