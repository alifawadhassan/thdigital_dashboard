<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //  Getting Current User Email
        $auth_email = Auth::user()->email;



        //  Cheking That Email in OpenSolar User Table and check its subscription
        //  If Subscription is yes we show Installed on App otherwise we show Payment Link
        //  If Subscription is yes we show Installed on App otherwise we show Payment Link

        // 
        $subscription_status_opensolar = "";
        $temp_subscription_status_opensolar = DB::connection('opensolar')->table('users')->where('hubspot_email', "=", $auth_email)->get('subscribed');
        if (count($temp_subscription_status_opensolar) > 0) {
            if ($temp_subscription_status_opensolar[0]->subscribed == "Yes") {
                $subscription_status_opensolar = "Yes";
            } else {
                $subscription_status_opensolar = "No";
            }

        } else {
            $subscription_status_opensolar = "No";
        }

        //
        //  
        $subscription_status_notes = "";
        $temp_subscription_status_notes = DB::connection('notes')->table('users')->where('email', "=", $auth_email)->get('subscribed');

        if (count($temp_subscription_status_notes) > 0) {

            if ($temp_subscription_status_notes[0]->subscribed == "Yes") {

                $subscription_status_notes = "Yes";
            } else {
                $subscription_status_notes = "No";
            }

        } else {
            $subscription_status_notes = "No";
        }





        return view('home', [
            'subscription_status_opensolar' => $subscription_status_opensolar,
            'subscription_status_notes' => $subscription_status_notes,
        ]);


    }
}