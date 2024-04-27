<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    // show the Supplier information
    public function show()
    {
        return view('content.pages.pages-supplier', [
            'Suppliers' => User::latest()->filter('Supplier')->get()
        ]);
    }
}
