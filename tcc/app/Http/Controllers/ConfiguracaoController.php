<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\users;
use App\Models\ContaBancaria;
use App\Mail\CodigoReset;
use Illuminate\Support\Facades\Mail;

class ConfiguracaoController extends Controller
{
    private function gerarConjuntoAleatorio($tamanho)
    {
        $caracteres = '0123456789';
        return substr(str_shuffle($caracteres), 0, $tamanho);
    }

    public function configura()
    {
        $iduser = session('id');
        $user = users::where('id', $iduser)->first();
        return view('configuracao/configura', compact('user'));

    }

    public function configurapost(Request $Request)
    {

        
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
        $user->sobrenome = $Request->input('sobrenome');
        ;
        $user->email = $Request->input('email');
        $user->endereco = $Request->input('endereco');
        $user->cidade = $Request->input('cidade');
        $user->estado = $Request->input('estado');
        $user->cep = $Request->input('cep');
        $user->pais = $Request->input('pais');
        $user->save();

        return redirect()->route('configurar.get');
    }

    public function seguranca()
    {
        $iduser = session('id');
        $user = users::where('id', $iduser)->first();
        return view('configuracao/seguranca', compact('user'));
    }

    public function segurancapost(Request $Request)
    {
        $senhaatual = $Request->input('senhaatual');
        $novasenha = $Request->input('novasenha');
        $iduser = session('id');
        $user = users::where('id', $iduser)->first();

        if ($user->senha == $senhaatual) {
            $user->updatePassword($novasenha);
            return redirect()->back()->with('success', 'Senha atualizada com sucesso!');
        } else {
            return redirect()->back()->with('danger', 'A senha digitada e diferente da senha atual');
        }
    }

    public function deletar()
    {
        $iduser = session('id');
        $user = users::where('id', $iduser)->first();
        return view('configuracao/deletar', compact('user'));
    }

    public function destroy(Request $Request)
    {
        $iduser = session('id');
        $user = users::where('id', $iduser)->first();
        $novasenha = $Request->input('senhaatual');
        $resetcode = $Request->input('codigo2fa');

        echo ($novasenha);
        if ($novasenha == $user->senha && $resetcode == $user->reset_code) {
            $user->delete();
            return redirect()->route('logout');
        } else {
            return redirect()->back()->with('danger', 'Não foi possivel apagar a conta');
        }
    }

    public function enviarEmail()
    {
        $iduser = session('id');
        $user = users::where('id', $iduser)->first();
        $conjuntoAleatorio = $this->gerarConjuntoAleatorio(6);
        $user->reset_code = $conjuntoAleatorio;
        $user->save();
        Mail::to($user->email)->send(new CodigoReset($conjuntoAleatorio));
        return redirect()->route('deletar');
    }

}
