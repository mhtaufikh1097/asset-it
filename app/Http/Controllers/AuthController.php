<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {

            if (!Auth::user()->is_active) {
                Auth::logout();
                return back()->with('error', 'User tidak aktif');
            }

            return redirect()->route('asset.index');
        }

        return back()->with('error', 'Username atau password salah');
    }

        public function getAuthIdentifierName(){
        return 'username';
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

}
