<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\IpUtils;

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

    public function handleRegister(Request $request)
    {
        if ($request->confpassword == $request->password) {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);

            return redirect()->route('client.login.form');
        } else {
            return redirect()->back()->withInput()->with('error', 'Password and confirm password not match!');
        }
    }

    public function handleLogin(Request $request)
    {
        if (!$request->input('g-recaptcha-response')) {
            return redirect()->back()->with('error', 'You are a robot!');
        }

        $res = Http::post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => env('GOOGLE_RECAPTCHA_SECRET'),
            'response' => $request->input('g-recaptcha-response'),
            'remoteip' => IpUtils::anonymize($request->ip())
        ]);

        if ($res->successful()) {
            $result = Auth::attempt(['email' => $request->email, 'password' => $request->password], true); // return true or false
            if ($result) {
                return redirect()->route('client.index');
            } else {
                return redirect()->back()->with('error', 'Email/Password not correct!');
            }
        } else {
            return redirect()->back()->with('error', 'Recaptcha is invalid!');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('client.login.form');
    }
}
