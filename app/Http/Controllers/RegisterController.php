<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {

        $attributes = request()->validate([
            'name' => 'required|max:55',
            'username' => ['required', 'max:55', 'min:3', Rule::unique('users', 'username')],
            'email' => 'required|email|max:55|unique:users,email',
            'password' => ['required', 'max:55', 'min:7']
        ]);


        $user = User::create($attributes);

        auth()->login($user);

        return redirect('/')->with('success', 'Your account has been created.');
    }
}