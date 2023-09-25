<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\users;
use App\Models\CentroCusto;
use App\Models\LancamentoContabil;
use App\Models\ContaBancaria;
use App\Mail\CodigoReset;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
 

    public function home(Request $request)
    {

        $contaid = session('id_conta_selecionada');
        $iduser = session('id');
        $lancamentos = LancamentoContabil::where('conta_bancaria_id', $contaid)->get();
        $centrocusto = CentroCusto::where('user_id', $iduser)->get();
        $conta = ContaBancaria::where('id', $contaid)->first();
        $user = users::where('id', $iduser)->first();
        return view('main/home', compact('conta', 'user','centrocusto', 'lancamentos'));

    }

    

}