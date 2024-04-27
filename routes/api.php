<?php

use App\Models\User;
use App\Models\Verifications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Vendor Verification
Route::get('/vendors-unverified', function () {
    $vendors = Verifications::all();

    return response()->json($vendors);
});

// Verified Vendors
Route::get('/Verified-vendors', function (Request $verified) {
    if($verified->status && $verified->id){
        $vendor = Verifications::find($verified->id);
        
        $vendor->status = $verified->status;
        $vendor->save();

        User::create(
            [
                'name' => $vendor->name,
                'email' => $vendor->email,
                'company' => $vendor->company,
                'role' => $vendor->role,
                'time' => $vendor->time,
                'status' => 'Activated',
                'password' => $vendor->password,
            ]
        );  // Create a new user with verified vendor

        return response()->json([
            'message' => 'Successfully marked as verified.'
        ]);
    }

    return response()->json([
        'message' => 'Error!'
    ]);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
