<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class SessionsController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store()
    {
        if (auth()->attempt(request(['email', 'password'])) == false) {
            return back()->withErrors([
                'message' => 'the email or password is incorrect,please try again'
            ]);
        } else {
            if (auth()->user()->status=='DEACTIVE'){
                auth()->logout();
                return redirect()->to('/');
            }
            if (auth()->user()->role == 'admin') {
                return redirect()->to('/admin');
            } else {
                return redirect()->to('/');
            }
        }
        return redirect()->to('/');
    }

    public function destroy()
    {
        auth()->logout();
        return redirect()->to('/');
    }
}
