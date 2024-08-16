<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginPage() {
        return view('admin.login');
    }

    public function login(Request $request) {
        $result = Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], true); // return true or false
        if ($result) {
            toast('Login successful!', 'success');
            if (Auth::guard('admin')->user()->role == 0) {
                return redirect()->route('ad.dashboard');
            } else {
                return redirect()->route('ad.news.index');
            }
        } else {
            toast('Email/Password not correct!', 'error');
            return redirect()->route('ad.login-page');
        }
    }

    public function logout() {
        Auth::guard('admin')->logout();
        return redirect()->route('ad.login-page');
    }
}
