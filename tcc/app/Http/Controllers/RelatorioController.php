<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\users;

class RelatorioController extends Controller
{
    public function index(){
        $iduser = session('id');
        $user = users::where('id', $iduser)->first();
        return view('relatorio/index', compact ('user'));
    }
}
