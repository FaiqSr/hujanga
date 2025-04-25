<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SignController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function signUp() {}
}
