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
        $conta = ContaBancaria::where('id', $contaid)->first();
        return view('main/home', compact('conta'));
        
    }
}
