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
            'vendors' => User::latest()->filter('Vendor')->get()
        ]);
    }

    // deactivate  a vendor account
    public function deactivate()
    {
        $status = User::find(request('id'));
        $status->status = 'Deactivated';
        $status->save();

        if ($status->role == 'Supplier') {
            return redirect('/suppliers')->with('success', "The account has been successfully Deactivated");
        }

        return redirect('/vendors')->with('success', "The account has been successfully Deactivated");
    }

    // activate a  vendor account
    public function activate()
    {
        $status = User::find(request('id'));
        $status->status = 'Activated';
        $status->save();

        if ($status->role == 'Supplier') {
            return redirect('/suppliers')->with('success', "The account has been successfully Activated");
        }
        return redirect('/vendors')->with('success', "The account has been successfully Activated");
    }
}
