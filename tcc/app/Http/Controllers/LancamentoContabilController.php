<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CentroCusto;
use App\Models\LancamentoContabil;

class LancamentoContabilController extends Controller
{
    public function index(){

        $conta = session('id_conta_selecionada');
        $centrocusto = CentroCusto::where('conta_bancaria_id', $conta)->get();
        return view('lancamento/cadastro', compact('centrocusto'));
    }

    public function cadastro(Request $Request){
        $post = new LancamentoContabil();
        $post->Nome = $Request->input('Nome');
        $post->Tipo = $Request->input('Tipo');
        $post->conta_bancaria_id  = $Request->input('id_conta_selecionada');
        $post->centro_custo_id  = $Request->input('centro');
        $post->save();
        return redirect()->route('home');
    }
}
