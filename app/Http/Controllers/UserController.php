<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // show Register/Create Form
    public function create()
    {
        return view('auth.register');
    }

    // Create New User
    public function store(Request $request)
    {
        // Validate the request
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'role' => 'required',
            'company' => 'required',
            'time' => 'required',
            'password' => 'required|confirmed|min:6'
        ]);

        // Hash Password
        $formFields['password'] = bcrypt($formFields['password']);

        // create User
        $user = User::create($formFields);

        // login
        auth()->login($user);

        return redirect('/')->with('success', "Your account has been created");
    }
}
