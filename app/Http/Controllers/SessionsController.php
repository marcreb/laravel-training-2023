<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            // 'email' => ['required', 'exists:users,email']
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        if(! auth()->attempt($attributes)) {
            throw ValidationException::withMessages([
                'email' => 'Your provided credentials could not be verified'
            ]);
        }

        session()->regenerate();

        return redirect('/')->with('success', 'You are now logged in!');
        // return back()
        //     ->withInput()
        //     ->withErrors(['email' => 'Your provided credentials could not be verified']);



    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'You are now logged out.');
    }
}
