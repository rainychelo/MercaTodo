<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorView extends Controller
{
    public function index()
    {
        $message=auth()->user()->error;
        $data=(['error'=>null]);
        $user=auth()->user();
        $user->update($data);
        return view('error',compact('message'));
    }
    }
