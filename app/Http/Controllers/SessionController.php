<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $user=$request->validate([
            'email' => ['required','email'],
            'password' => ['required']
        ]);
        if(! Auth::attempt($user))
        {
            throw \Illuminate\Validation\ValidationException::withMessages([
                'email'=> 'Sorry , those credentials do not match'
            ]);
        }
        $request->session()->regenerate();
        return redirect('/');
    }

    public function destroy()
    {
        Auth::logout();
        return redirect('/');
    }
}
