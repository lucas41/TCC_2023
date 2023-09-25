<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CentroCusto;
use App\Models\users;

class CentroCustoController extends Controller
{
    public function index()
    {
            $iduser = session('id');
            $user = users::where('id', $iduser)->first();
            $centrocusto = CentroCusto::where('user_id', $iduser)->get();
            return view('centrocusto/index', compact('centrocusto','user'));
        

    }

    public function cadastro(Request $Request){
        $iduser = session('id');
        try {
        $post = new CentroCusto();
        $post->nome = $Request->input('nome');
        $post->valplanejado = $Request->input('valplanejado');
        $post->user_id = $iduser;
        $post->save();
        }
        catch (\Exception $e) {
            return redirect()->back()->with('danger', ''. $e->getMessage());
        }
        return redirect()->route('CentroCusto')->with('success','Centro de custo cadastrado');

    }

}