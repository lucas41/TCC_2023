<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\users;
use Illuminate\Support\Facades\DB;
use App\Mail\BoasvindasEmail;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{

    public function index (){

        return view('main/index');

    }

    public function login(){

        return view('main/login');

    }

    public function efetuarlogin(Request $Request){

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

    public function registro(){

        return view('main/registro');

    }

    public function cadastro(Request $Request){
        $post = new users();
        $post->nome = $Request->input('nome');
        $post->sobrenome = $Request->input('sobrenome');
        $post->email = $Request->input('email');
        $post->senha = $Request->input('password');
        $post->save();
        $Request->session()->flash('success', 'Registro criado com sucesso.');
        Mail::to($post->email)->send(new BoasvindasEmail());
        return redirect()->route('login');

    }

    public function recupera(){

        return view('main/RecuperaSenha');
        
    }

    public function alterar(){

        return view('main/RecuperaSenha');
    }

    public function home(){

 
        return view('main/home');

    }
        
    


}
