<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\SaularController;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

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

// Route::get('/', function () {
//     return view('welcome');
// });




Auth::routes();


// 
Route::get('/testing', [HomeController::class, 'testing'])->name('testing');

// 
// 
Route::middleware(['auth'])->group(
    function () {

        Route::get('/{id}', [HomeController::class, 'index'])->name('home');


        // 
        // Update Saular Input Fields setting (  DEAL STAGE STATUS )
        // 
        Route::post('/update_deal_stage', [SaularController::class, 'update_deal_stage'])->name('update_deal_stage');


        // 
        Route::get('/{id}/subscription', [PaymentsController::class, 'showSubscriptions'])->name("subscription");
        Route::get('/{id}/billing_history', [PaymentsController::class, 'showBillingHistory'])->name("billing_history");


        // 
        // SHOW USER PREVIOUS SELECTED SETTING ON SAULAR
        // 
        Route::get('/{id}/installed_apps/saular', [SaularController::class, 'show'])->name('saular');
        Route::get('/{id}/installed_apps/notes', [NotesController::class, 'show'])->name('notes');

        // 
        // Update Saular Input Fields setting ( WANT DEALS STATUS )
        // 
        Route::post('/update_want_deals', [SaularController::class, 'update_want_deals'])->name('update_want_deals');


        // 
        // Update Saular Input Fields setting ( WANT contact STATUS )
        // 
        Route::post('/update_want_contacts', [SaularController::class, 'update_want_contacts'])->name('update_want_contacts');

        // 
        Route::post('/update_portal_id/{id}', [UserController::class, 'index'])->name('update_portal_id');
    }
);
