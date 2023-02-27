<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('Auth.login');
    }

    public function loginProcess(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials, $request->input('remember'))) {
            return redirect()->intended('/home');
        }

        return back()->withErrors([
            'username' => 'Data yang dimasukkan salah!',
            'password' => 'Data yang dimasukkan salah!',
        ]);
    }
}
