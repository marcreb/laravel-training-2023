<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
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
            'profile_picture' => ['required', 'image'],
            'username' => ['required','min:3', 'max:30', 'alpha_dash', Rule::unique('users', 'username')],
            'email' => ['required','email','max:100', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'max:255','min:7'],
        ]);


        $attributes['user_role'] = 'customer';
        $attributes['profile_picture'] = request()->file('profile_picture')->store('profilepictures');

        $user = User::create($attributes);

        auth()->login($user);

        // User::create([
        //     'name' => $attributes['name'],
        //     'username' => $attributes['username'],
        //     'password' => bcrypt($attributes['username']),

        // ]);
        // return view('register.create');
        return redirect('/')->with('success', 'Your account has been created');
    }
}
