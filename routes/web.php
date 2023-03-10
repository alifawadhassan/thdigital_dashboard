<?php

use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/installed_apps/saular', [App\Http\Controllers\SaularController::class, 'show'])->name('saular');

Route::get('/subscription', [App\Http\Controllers\PaymentsController::class, 'showSubscriptions'])->name("subscription");
Route::get('/billing_history', [App\Http\Controllers\PaymentsController::class, 'showBillingHistory'])->name("billing_history");
