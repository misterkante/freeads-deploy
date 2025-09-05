<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
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

Route::get('/', function () {
    redirect()->route('ads.index');
});

// create all default ads route in on line
Route::resource('ads',AdsController::class);

// REGISTER
Route::get('/register', [AuthController::class, 'showRegister'])->name('show.register');
Route::post('/register', [AuthController::class, 'register'])->name('register');
// LOGIN
Route::get('/login', [AuthController::class, 'showLogin'])->name('show.login');
Route::post('/login', [AuthController::class, 'login'])->name('login');

// CRUD Users
Route::get('/users', [UserController::class, 'index'])->name('users.index');

Route::post('/users/create', [UserController::class, 'store'])->name('create'); //Create user
Route::get('/users/create', [UserController::class, 'create'])->name('users.create'); //Go to create user page


// EMAIL VERIF
Route::get('/email/verify', function () {
    return view('auth.email-verify');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {

    $request->fulfill();
    return redirect('/');

})->middleware(['auth', 'signed'])->name('verification.verify');


Route::post('/email/verification-notification', function (Request $request) {

    $request->user()->sendEmailVerificationNotification();


    return back()->with('message', 'Verification link sent!');

})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/profile', function () {

    // Only verified users may access this route...

})->middleware(['auth', 'verified']);
