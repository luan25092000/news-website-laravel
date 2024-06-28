<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('client.login');
    }

    public function showRegisterForm()
    {
        return view('client.register');
    }
}
