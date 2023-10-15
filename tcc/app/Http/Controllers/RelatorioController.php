<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\users;
use App\Models\relatorio;

class RelatorioController extends Controller
{
    public function index(){
        $iduser = session('id');
        $user = users::where('id', $iduser)->first();
        $relatorios = relatorio::where('user_id', $iduser)->get(); 
        return view('relatorio/index', compact ('user','relatorios'));
    }
}
