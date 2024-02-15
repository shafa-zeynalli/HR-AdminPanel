<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        return view('admin.pages.login.index');
    }

    public function authenticate(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('index');
        }

        return back()->withErrors([
            'email' => 'Giriş bilgileri hatalı. Lütfen tekrar deneyin.',
        ]);
    }

    public function logout()
    {
        Auth::logout();

        return redirect('login');
    }
}
