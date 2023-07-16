<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\users;
use Illuminate\Support\Facades\DB;
use App\Mail\BoasvindasEmail;
use App\Mail\CodigoReset;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    private function gerarConjuntoAleatorio($tamanho)
    {
        $caracteres = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        return substr(str_shuffle($caracteres), 0, $tamanho);
    }

    public function index()
    {

        return view('main/index');

    }

    public function login()
    {

        return view('main/login');

    }

    public function efetuarlogin(Request $Request)
    {

        $email = $Request->input('email');
        $senha = $Request->input('senha');

        $results = DB::select('select * from users where email = ? and senha = ?', [$email, $senha]);



        if (!empty($results)) {
            $nome = $results[0]->nome;
            session(['nome' => $nome]);
            return redirect()->route('home');

        } else {
            $Request->session()->flash('danger', 'Usuario ou senha incorreta');
            return redirect()->route('login');
        }

    }

    public function registro()
    {

        return view('main/registro');

    }

    public function cadastro(Request $Request)
    {
        $post = new users();
        $post->nome = $Request->input('nome');
        $post->sobrenome = $Request->input('sobrenome');
        $post->email = $Request->input('email');
        $post->senha = $Request->input('password');
        $post->save();
        $Request->session()->flash('success', 'Registro criado com sucesso.');
        try {
        Mail::to($post->email)->send(new BoasvindasEmail());
        }catch (\Exception $e) {
            return redirect()->back()->with('danger', 'Não foi possível enviar o e-mail de Boas vindas.');
        }
        return redirect()->route('login');

    }

    public function recupera()
    {

        return view('main/RecuperaSenha');

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
            return redirect()->route('verirficacodigo')->with('success', 'E-mail de código de reset enviado com sucesso.');
        }
        return redirect()->back()->with('danger', 'Usuário não encontrado.');
    }

    public function verirficacodigo()
    {
        return view('main/verirficacodigo');
    }

    public function alterar()
    {

        return view('main/alteraSenha');
    }

    public function home()
    {


        return view('main/home');

    }




}