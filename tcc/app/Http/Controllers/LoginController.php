<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index (){

        return view('main/index');

    }

    public function login(){

        return view('main/login');

    }

    public function registro(){

        return view('main/registro');

    }
}
