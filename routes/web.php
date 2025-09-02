<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdsController;

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
    return view('welcome');
});

//audry tu dois metttre le middleware ici pour protéger les deux routes suivantes
Route::get('/ads/create', [AdsController::class, 'create'])->name('ads.create');
Route::post('/ads', [AdsController::class, 'store'])->name('ads.store');


Route::get('/', [AdsController::class, 'getAds'])->name('home');