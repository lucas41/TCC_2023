<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CentroCusto;
use App\Models\LancamentoContabil;
use App\Models\users;

class LancamentoContabilController extends Controller
{
    public function index(){

        $iduser = session('id');
        $centrocusto = CentroCusto::where('user_id', $iduser)->get();
        return view('LancamentoContabil/cadastro', compact('centrocusto'));
    }

    public function cadastro(Request $Request){
        $post = new LancamentoContabil();
        $post->Nome = $Request->input('Nome');
        $post->Tipo = $Request->input('Tipo');
        $post->valor = $Request->input('valor');
        $post->conta_bancaria_id  = $Request->input('id_conta_selecionada');
        $post->centro_custo_id  = $Request->input('centro');
        $post->save();

        CentroCusto::where('id', $post->centro_custo_id)->increment('valatual', $post->valor);
        
        
       

        return redirect()->route('home');
    }
}
