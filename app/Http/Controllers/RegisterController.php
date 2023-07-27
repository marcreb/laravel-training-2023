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
        // dd(request()->all());
        $attributes = request()->validate([
            'name' => ['required', 'max:100'],
            // 'username' => ['required','min:3', 'max:30', 'unique:users,username'],
            'username' => ['required','min:3', 'max:30', Rule::unique('users', 'username')],
            'email' => ['required','email','max:100', Rule::unique('users', 'email')],
            'password' => ['required','max:255','min:7'],
        ]);

        User::create($attributes);

        // User::create([
        //     'name' => $attributes['name'],
        //     'username' => $attributes['username'],
        //     'password' => bcrypt($attributes['username']),

        // ]);
        // return view('register.create');
        return redirect('/');
    }
}
