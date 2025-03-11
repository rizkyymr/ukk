<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm(){
        return view('auth.login');
    }

    public function login(Request $request){
        $crenditials = $request->validate([
            'login' => ['required', 'string'],
            'password' => ['required']
        ]);

        $loginField = filter_var($crenditials['login'], FILTER_VALIDATE_EMAIL) ? 'email' : 'name';

        if (Auth::attempt([
            $loginField => $crenditials['login'],
            'password' => $crenditials['password'],
        ])) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'login'=> 'Ther provide crenditials do not match our records.',
        ])->withInput($request->except('password'));
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/welcome');
    }
}
