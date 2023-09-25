<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\users;
use App\Models\ContaBancaria;
use Illuminate\Support\Facades\DB;
use App\Mail\BoasvindasEmail;
use App\Mail\CodigoReset;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    private function gerarConjuntoAleatorio($tamanho)
    {
        $caracteres = '0123456789';
        return substr(str_shuffle($caracteres), 0, $tamanho);
    }

    public function index()
    {

        return view('acesso/index');

    }

    public function login()
    {

        return view('acesso/login');

    }

    public function efetuarlogin(Request $Request)
    {

        $email = $Request->input('email');
        $senha = $Request->input('senha');

        $user = users::where('email', $email)->where('senha', $senha)->first();

        if ($user) {
            session(['nome' => $user->nome]);
            session(['id' => $user->id]);

            return redirect()->route('home');
        } else {
            // Autenticação falhou, redireciona de volta para a página de login
            $Request->session()->flash('danger', 'Usuário ou senha incorretos');
            return redirect()->route('login');
        }

    }

    public function registro()
    {

        return view('acesso/registro');

    }

    public function cadastro(Request $Request)
    {
        try {
            
            $Request->validate([
                'nome' => 'required',
                'sobrenome' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6',
            ]);
    
            $user = new users();
            $user->nome = $Request->input('nome');
            $user->sobrenome = $Request->input('sobrenome');
            $user->email = $Request->input('email');
            $user->senha = $Request->input('password');
            
        }
        catch (\Exception $e) {
            return redirect()->back()->with('danger', ''. $e->getMessage());
        }

        
        $user->save();
        Mail::to($user->email)->send(new BoasvindasEmail());
        $Request->session()->flash('success', 'Registro criado com sucesso.');
        return redirect()->route('login');
        

    }

    public function recupera()
    {

        return view('acesso/RecuperaSenha');

    }

    public function recuperasenha(Request $Request)
    {
        $email = $Request->input('email');
        $user = users::where('email', $email)->first();

        if ($user) {
            $conjuntoAleatorio = $this->gerarConjuntoAleatorio(6);
            $user->reset_code = $conjuntoAleatorio;
            $user->save();

            try {
                Mail::to($email)->send(new CodigoReset($conjuntoAleatorio));
            } catch (\Exception $e) {
                return redirect()->back()->with('danger', 'Não foi possível enviar o e-mail de código de reset.');
            }
            return redirect()->route('verirficacodigo')->with('email', $email)->with('success', 'E-mail de código de reset enviado com sucesso para ' . $email);
        }
        return redirect()->back()->with('danger', 'Usuário não encontrado.');
    }

    public function verirficacodigo(Request $request)
    {
        $email = $request->session()->get('email');
        return view('acesso/verirficacodigo', compact('email'));
    }

    public function verirficacodigopost(Request $Request)
    {
        $codigo = implode('', [
            $Request->input('codigo'),
            $Request->input('codigo1'),
            $Request->input('codigo2'),
            $Request->input('codigo3'),
            $Request->input('codigo4'),
            $Request->input('codigo5'),
        ]);

        $email = $Request->input('email');

        $user = users::where('email', $email)->first();

        $mfa_banco = $user->reset_code;

        if ($mfa_banco == $codigo) {
            return redirect()->route('altera')->with('email', $email);
        } else {
            return redirect()->route('recuperacao')->with('danger', 'O codigo digita é diferente do enviado via Email por favor verificar');
        }

    }

    public function alterar(Request $Request)
    {
        $email = $Request->session()->get('email');
        return view('acesso/AlteraSenha', compact('email'));
    }

    public function alterarsenha(Request $Request)
    {
        $email = $Request->input('email');
        $user = users::where('email', $email)->first();
        $senha = $Request->input('senha');

        if (!$user) {
            return redirect()->back()->with('error', 'Usuário não encontrado.');
        }

        $user->updatePassword($senha);

        return redirect()->route('login')->with('success', 'Senha atualizada com sucesso!');

    }

}