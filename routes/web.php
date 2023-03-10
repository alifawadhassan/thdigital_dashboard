<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

// 
// Update Saular Input Fields setting
// 
Route::post('/update_want_deals', function (Request $request) {
    $newValue = $request->input('value');

    //  Getting Current User Email
    $auth_email = Auth::user()->email;

    // Update the value of the input field in the database
    $temp = DB::connection('opensolar')->table('users')->where('hubspot_email', "=", $auth_email)->update(['want_deals' => $newValue]);

    return $temp;
    // return response()->json(['status' => 'success']);
})->name('update_want_deals');


// 
// Update Saular Input Fields setting
// 
Route::post('/update_want_contacts', function (Request $request) {
    $newValue = $request->input('value');

    //  Getting Current User Email
    $auth_email = Auth::user()->email;

    // Update the value of the input field in the database
    $temp = DB::connection('opensolar')->table('users')->where('hubspot_email', "=", $auth_email)->update(['want_contacts' => $newValue]);

    return $temp;
    // return response()->json(['status' => 'success']);
})->name('update_want_contacts');



// 
// Update Saular Input Fields setting
// 
Route::post('/update_deal_stage', function (Request $request) {
    $newValue = $request->input('value');

    //  Getting Current User Email
    $auth_email = Auth::user()->email;

    // Update the value of the input field in the database
    $temp = DB::connection('opensolar')->table('users')->where('hubspot_email', "=", $auth_email)->update(['deal_stage' => $newValue]);

    return $temp;
    // return response()->json(['status' => 'success']);
})->name('update_deal_stage');
