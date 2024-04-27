<?php

namespace App\Http\Controllers\pages;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomePage extends Controller
{
  public function index()
  {
    $vendor_count = User::latest()->filter('Vendor')->get()->count();
    $supplier_count = User::latest()->filter('Supplier')->get()->count();
    $deactivated_count = User::latest()->filter('Deactivated')->get()->count();

    return view('content.pages.pages-home', [
      'vendor' => $vendor_count,
      'supplier' => $supplier_count,
      'deactivated' => $deactivated_count
    ]);
  }
}
