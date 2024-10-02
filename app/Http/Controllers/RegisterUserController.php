<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisterUserController extends Controller
{

    public function create()
    {
        return view('auth.register');
    }
    public function store()
    {
        $userAttributes=request()->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required','confirmed', Password::min(3)],
        ]);

        $employer=request()->validate([
            'employer'=>['required'],
            'logo'=>[\Illuminate\Validation\Rules\File::image()],
        ]);
        if(request('logo'))
        {
            $logoPath=request()->logo->store('logos');
        }

        $user=User::create($userAttributes);
        $user->employer()->create([
            'name'=>$employer['employer'],
            'logo'=>$logoPath??null,
            'jobTitle' => 'me',
        ]);

        Auth::login($user);
        return redirect('/');
    }
}
