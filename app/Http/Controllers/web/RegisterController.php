<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\User;


class RegisterController extends Controller
{
    public function create(){
        return view('auth.register');

    }

    public function store(){

        $this->validate(\request(),[
            'name'=>'required',
            'email'=>'required|email|unique:Users',
            'password'=>'required|confirmed'
            ]);

        $user=User::create(\request(['name','email','password']));

        auth()->login($user);


        return redirect()->to('/');
    }

}
