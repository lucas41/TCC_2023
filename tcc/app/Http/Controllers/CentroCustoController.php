<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CentroCusto;

class CentroCustoController extends Controller
{
    public function index()
    {
        $conta = session('id_conta_selecionada');

        if ($conta == null) {
            return redirect()->back()->with('danger', 'Para cadastrar um centro de custo é preciso ter uma conta selecionada');
        } else {
            return view('centrocusto/index');
        }

    }

    public function cadastro(Request $Request){

        $post = new CentroCusto();
        $post->nome = $Request->input('nome');
        $post->tipo = $Request->input('tipo' );
        $post->conta_bancaria_id = $Request->input('id_conta_selecionada');
        $post->save();
        return redirect()->route('home');

    }

}