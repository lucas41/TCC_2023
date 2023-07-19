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
            return redirect()->route('verirficacodigo')->with('email', $email)->with('success', 'E-mail de código de reset enviado com sucesso para ' . $email);
        }
        return redirect()->back()->with('danger', 'Usuário não encontrado.');
    }

    public function verirficacodigo(Request $request)
    {   
        $email = $request->session()->get('email');
        return view('main/verirficacodigo', compact('email'));    
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
        
        if($mfa_banco == $codigo){
            return redirect()->route('altera')->with('email', $email);
        }else{
            return redirect()->route('recuperacao')->with('danger', 'O codigo digita é diferente do enviado via Email por favor verificar');
        }

    } 

    public function alterar(Request $Request)
    {
        $email = $Request->session()->get('email');
        return view('main/AlteraSenha', compact('email'));
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

    public function home()
    {
        return view('main/home');

    }




}