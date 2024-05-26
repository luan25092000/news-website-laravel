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
            return redirect()->route('ad.category.index');
        } else {
            return redirect()->route('ad.login-page')->with('error', 'Email/Password not correct!');
        }
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('ad.login-page');
    }
}
