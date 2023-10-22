<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CentroCusto;
use App\Models\LancamentoContabil;
use App\Models\ContaBancaria;
use App\Models\users;

class LancamentoContabilController extends Controller
{
    
    public function index(){
        if(session('id_conta_selecionada') == null){
            return redirect()->back()->with('danger', 'Para cadastro de um lançamento é necessario escolher primeiramente uma conta');
        } else {
        $iduser = session('id');
        $contaid = session('id_conta_selecionada');
        $user = users::where('id', $iduser)->first();
        $centrocusto = CentroCusto::where('user_id', $iduser)->get();
        $lancamentos = LancamentoContabil::where('conta_bancaria_id', $contaid)->get();
        return view('LancamentoContabil/cadastro', compact('centrocusto','user','lancamentos'));
        }
    }

    public function cadastro(Request $Request){
        $post = new LancamentoContabil();
        $post->Nome = $Request->input('Nome');
        $post->Tipo = $Request->input('Tipo');
        $post->valor = $Request->input('valor');
        $post->conta_bancaria_id  = $Request->input('id_conta_selecionada');
        if($post->Tipo == 1) {
            $post->centro_custo_id  = null;
        }
        else{
            $post->centro_custo_id  = $Request->input('centro');
        }
        $post->save();
        
        CentroCusto::where('id', $post->centro_custo_id)->increment('valatual', $post->valor);
        if($post->Tipo == 1){
            ContaBancaria::where('id', $post->conta_bancaria_id)->increment('saldo', $post->valor);
            ContaBancaria::where('id', $post->conta_bancaria_id)->increment('entrada', $post->valor);
        }else if($post->Tipo == 2){
            ContaBancaria::where('id', $post->conta_bancaria_id)->decrement('saldo', $post->valor);
            ContaBancaria::where('id', $post->conta_bancaria_id)->increment('saida', $post->valor);
        }
       

        return redirect()->route('CadastroLancamento');
    }
}
