<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class VendorsController extends Controller
{
    // show the vendors information
    public function show()
    {
        return view('content.pages.pages-vendors', [
            'vendors' => User::latest()->filter()->get()
        ]);
    }
}
