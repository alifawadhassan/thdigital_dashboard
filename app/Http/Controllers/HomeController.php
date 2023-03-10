<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $subscription_status_opensolar = DB::connection('opensolar')->table('users')->where('hubspot_email', "=", $auth_email)->get('subscribed');

        $hide_show_opensolar_div = "";
        $temp_hide_show_opensolar_div = DB::connection('opensolar')->table('users')->where('hubspot_email', "=", $auth_email)->get();
        if (!$temp_hide_show_opensolar_div) {
            $hide_show_opensolar_div = "none";
        }

        //  If Subscription is yes we show Installed on App otherwise we show Payment Link
        if ($subscription_status_opensolar[0]->subscribed == "Yes") {
            return view('home', [
                'subscription_status_opensolar' => "Yes",
                'hide_show_opensolar_div' => $hide_show_opensolar_div
            ]);

        } else {
            return view('home', [
                'subscription_status_opensolar' => "No",
                'hide_show_opensolar_div' => $hide_show_opensolar_div

            ]);
        }
    }

    public function saular()
    {
        return view('installed_apps.saular');

    }
}