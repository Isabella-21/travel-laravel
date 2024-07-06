<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function create(){
        return view('register.show');
    }

    public function store(){
        request()->validate([
            'username' => ['required','max:30'],
            'email' => ['required','email',Rule::unique('users','email')],
            'password' =>['required','min:8']
        ]);
      $user = new User;
      $user-> username = request('username');
      $user-> email = request('email');
      $user-> password = request('password');
      $user->save();
      
      auth()->login($user);

        return redirect('/');
        }
        

    }
