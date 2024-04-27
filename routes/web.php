<?php

use Illuminate\Support\Facades\Http;
use App\Http\Controllers\pages\Page2;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pages\HomePage;
use App\Http\Controllers\UserController;
use App\Http\Controllers\pages\MiscError;
use App\Http\Controllers\VendorsController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\authentications\LoginBasic;
use App\Http\Controllers\language\LanguageController;
use App\Http\Controllers\authentications\RegisterBasic;

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
Route::get('/', function () {
  return view('auth.login');
});;

// show Register/Create Form
Route::get('/register', [UserController::class, 'create'])->name('register');

// create new user
Route::post('/verification', [UserController::class, 'store']);

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

  // vendor portal
  Route::get('/vendors', [VendorsController::class, 'show']);

  // deactivation of account
  Route::post('/deactivate', [VendorsController::class, 'deactivate']);

  // activation of account
  Route::post('/activate', [VendorsController::class, 'activate']);

  // supplier portal
  Route::get('/suppliers', [SupplierController::class, 'show']);
});
