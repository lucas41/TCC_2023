<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\users;
use App\Models\ContaBancaria;

class HomeController extends Controller
{
    
    public function home(Request $request)
    {
       

        $userId = session('id');

        $contasBancarias = ContaBancaria::where('user_id', $userId)->get();
        return view('main/home',compact('contasBancarias'));


    
    }
}
