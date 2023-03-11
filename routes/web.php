<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\SaularController;
use App\Http\Controllers\HomeController;

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


// 
// 
Route::get('/home', [HomeController::class, 'index'])->name('home');


// 
Route::get('/subscription', [PaymentsController::class, 'showSubscriptions'])->name("subscription");
Route::get('/billing_history', [PaymentsController::class, 'showBillingHistory'])->name("billing_history");


// 
// SHOW USER PREVIOUS SELECTED SETTING ON SAULAR
// 
Route::get('/installed_apps/saular', [SaularController::class, 'show'])->name('saular');

// 
// Update Saular Input Fields setting ( WANT DEALS STATUS )
// 
Route::post('/update_want_deals', [SaularController::class, 'update_want_deals'])->name('update_want_deals');


// 
// Update Saular Input Fields setting ( WANT contact STATUS )
// 
Route::post('/update_want_contacts', [SaularController::class, 'update_want_contacts'])->name('update_want_contacts');


// 
// Update Saular Input Fields setting (  DEAL STAGE STATUS )
// 
Route::post('/update_deal_stage', [SaularController::class, 'update_deal_stage'])->name('update_deal_stage');
