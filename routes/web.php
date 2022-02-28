<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('landing-page.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('kontens', App\Http\Controllers\kontenController::class);

Route::resource('akuns', App\Http\Controllers\akunController::class);

Route::resource('portofolios', App\Http\Controllers\portofolioController::class);

Route::resource('layanans', App\Http\Controllers\layananController::class);

Route::resource('faqs', App\Http\Controllers\faqController::class);

Route::resource('kontaks', App\Http\Controllers\kontakController::class);