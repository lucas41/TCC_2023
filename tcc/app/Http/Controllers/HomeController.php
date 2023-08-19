<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\users;
use App\Models\ContaBancaria;

class HomeController extends Controller
{
    
    public function home(Request $request)
    {   

        $contaid = session('id_conta_selecionada');
        $iduser = session('id');
        $conta = ContaBancaria::where('id', $contaid)->first();
        $user = users::where('id', $iduser)->first();
        return view('main/home', compact('conta', 'user'));
        
    }

    public function configura() {
        $iduser = session('id');
        $user = users::where('id', $iduser)->first();
        return view('main/configura', compact('user'));
    }

    public function configurapost(Request $Request){
        $iduser = session('id');
        $user = users::find($iduser);
        $nomeFotoAntiga = $user->foto;


        if ($Request->hasFile('foto')) {
            
            if ($nomeFotoAntiga <> 'default.jpg') {
                $caminhoFotoAntiga = public_path('img/users') . '/' . $nomeFotoAntiga;
                if (file_exists($caminhoFotoAntiga)) {
                    unlink($caminhoFotoAntiga);
                }
            }

            $foto = $Request->file('foto');
            $nomeFoto = time() . '_' . $foto->getClientOriginalName();
            $caminhoFoto = public_path('img/users'); // Corrigido o separador de diretórios
            $foto->move($caminhoFoto, $nomeFoto);
            $user->foto = $nomeFoto;
        }

        $user->nome = $Request->input('nome');
        $user->sobrenome = $Request->input('sobrenome');;
        $user->email = $Request->input('email');
        $user->save();

        return redirect()->route('configurar');
    }

    public function seguranca(){
        $iduser = session('id');
        $user = users::where('id', $iduser)->first();
        return view('main/seguranca', compact('user'));
    }

    public function deletar(){
        $iduser = session('id');
        $user = users::where('id', $iduser)->first();
        return view('main/deletar', compact('user'));
    }
    
}
