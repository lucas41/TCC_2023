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
}
