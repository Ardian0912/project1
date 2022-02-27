<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('kontens', App\Http\Controllers\API\kontenAPIController::class);

Route::resource('akuns', App\Http\Controllers\API\akunAPIController::class);

Route::resource('portofolios', App\Http\Controllers\API\portofolioAPIController::class);

Route::resource('layanans', App\Http\Controllers\API\layananAPIController::class);

Route::resource('faqs', App\Http\Controllers\API\faqAPIController::class);

Route::resource('kontaks', App\Http\Controllers\API\kontakAPIController::class);