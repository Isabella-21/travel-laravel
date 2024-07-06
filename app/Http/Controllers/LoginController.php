<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function create(){
        return view('login.create');
    }

    public function store(){
        request()->validate([
            'username' => ['required','max:30'],
            'email' => ['required','email'],
            'password' => ['required','min:8']
        ]);

        if (auth()->attempt([
            'username' => request('username'),
            'email' => request('email'),
            'password' => request('password'),
        ])) {
            return redirect('/');
        } else {
            return back()->withErrors([
                'email' => 'Wrong credentials'
            ]);
        }
    }
}
