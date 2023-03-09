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

        //  If Subscription is yes we show Installed on App otherwise we show Payment Link
        if ($subscription_status_opensolar[0]->subscribed == "Yes") {
            return view('home', ['subscription_status_opensolar' => $subscription_status_opensolar[0]->subscribed]);

        } else {
            return view('home', ['subscription_status_opensolar' => $subscription_status_opensolar[0]->subscribed]);
        }
    }
}