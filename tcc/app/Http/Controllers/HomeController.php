<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\users;
use App\Models\ContaBancaria;

class HomeController extends Controller
{
    
    public function home(Request $request)
    {
        return view('main/home');
    }
}
