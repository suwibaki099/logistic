<?php

namespace App\Http\Controllers;

use App\Mail\MyMail;
use App\Models\User;
use App\Mail\Documents;
use Illuminate\Http\Request;
use App\Models\Verifications;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

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
            'email' => ['required', 'email', Rule::unique('verifications', 'email')],
            'role' => 'required',
            'company' => 'required',
            'upload' => 'required',
            'time' => 'required',
            'status' => 'required',
            'password' => 'required|confirmed|min:6'
        ]);

        // Hash Password
        $formFields['password'] = bcrypt($formFields['password']);
        $formFields['upload'] = $request->file('upload')->store('upload', 'public');

        // Verify the User
        Verifications::create($formFields);

        // sending email
        $file_local = Storage::path('\public/' . $formFields['upload']);
        Mail::to($request->email)->send(new MyMail($request->name));
        Mail::to('ltics2267@gmail.com')->send(new Documents($request->name, $file_local));

        return redirect('/register')->with('success', "Registration Done, Check your email for verification process!");
    }
}
