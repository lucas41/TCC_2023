<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\users;
use App\Models\ContaBancaria;

class ContaBancariaController extends Controller
{

    public function home() {
        return view ('conta/cadastro');
    }

    public function CadastrarConta(Request $Request){

        $userId = session('id');

        $post = new ContaBancaria();
        $post->Nome_banco = $Request->input('Nome_banco');
        $post->Agencia = $Request->input('Agencia' );
        $post->Numero = $Request->input('Numero');
        $post->user_id  = $userId;
        $post->save();

        return redirect()->route('home');
    }

}


