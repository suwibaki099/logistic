<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\language\LanguageController;
use App\Http\Controllers\pages\HomePage;
use App\Http\Controllers\pages\Page2;
use App\Http\Controllers\pages\MiscError;
use App\Http\Controllers\authentications\LoginBasic;
use App\Http\Controllers\authentications\RegisterBasic;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VendorsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Redirect to login page
Route::redirect(uri: '/', destination: 'login');

// show Register/Create Form
Route::get('/register', [UserController::class, 'create'])->name('register');

// create new user
Route::post('/users', [UserController::class, 'store']);

// locale
Route::get('lang/{locale}', [LanguageController::class, 'swap']);

Route::middleware([
  'auth:sanctum',
  config('jetstream.auth_session'),
  'verified',
])->group(function () {
  Route::get('/dashboard', function () {
    return view('dashboard');
  })->name('dashboard');

  // Main Page Route
  Route::get('/', [HomePage::class, 'index'])->name('pages-home');
  // Route::get('/page-2', [Page2::class, 'index'])->name('pages-page-2');
  Route::get('/vendors', [VendorsController::class, 'show']);
  Route::get('/suppliers', [SupplierController::class, 'show']);
});
