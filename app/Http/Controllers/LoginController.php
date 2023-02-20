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
        if (Auth::attempt($request->only('username', 'password'))) {
            return redirect('/home');
        }

        return redirect('/login');
    }
}
