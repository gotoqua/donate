<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DonationsController;
use App\Http\Controllers\DonorsController;

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
    return view('donate');
});

Route::resource('donations', DonationsController::class);
Route::resource('donors', DonorsController::class);

