<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index() 
    {
        return view('user.login');
    }

    public function login(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        
        $login_ok = auth()->attempt([
            'email' => request('email'),
            'password' => request('password')
        ]);
        
        if ($login_ok) {
            flash('Connecté')->success();
            
            return redirect('/dashboard');
        }

        return back()->withInput()->withErrors([
            'email' => 'Identifiant incorrect',
        ]);
    }
}
