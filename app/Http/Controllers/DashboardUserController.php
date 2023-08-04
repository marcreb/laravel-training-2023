<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\http\UploadedFile;

class DashboardUserController extends Controller
{
    public function index()
    {

        return view('dashboard.users.index', [
            'users' => User::orderBy('id', 'desc')->get()
        ]);

    }

    public function create()
    {
        $userRoles = User::distinct('user_role')->pluck('user_role');

        return view('dashboard.users.create', [
            'userRoles' => $userRoles,
        ]);
    }

    public function store()
    {
        // ddd(request()->all());

        // $path = request()->file('profile_pic')->store('profilepictures');
        // return 'done:' . $path;

        $attributes = request()->validate([
            'name' => ['required', 'max:100'],
            'profile_picture' => ['required', 'image'],
            'user_role' => ['required', Rule::exists('users', 'user_role')],
            'username' => ['required','min:3', 'max:30', 'alpha_dash', Rule::unique('users', 'username')],
            'email' => ['required','email','max:100', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'max:255','min:7'],
        ]);

        $attributes['profile_picture'] = request()->file('profile_picture')->store('profilepictures');

        User::create($attributes);

        // auth()->login($user);

        return redirect('/dashboard/users')->with('success', 'Your account has been created');
    }
}
