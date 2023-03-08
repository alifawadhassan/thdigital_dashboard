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

        $auth_email = Auth::user()->email;
        $stats_opensolar = DB::connection('opensolar')->table('users')->where('hubspot_email', "=", $auth_email)->get('subscribed');
        if ($stats_opensolar[0]->subscribed == "Yes") {
            return view('home', ['stats_opensolar' => $stats_opensolar[0]->subscribed]); // '<a href="" id="123_stat" class="btn btn-primary">Installed</a>']);

        } else {
            return view('home', ['stats_opensolar' => $stats_opensolar[0]->subscribed]); // '<a href="https://www.google.com/" id="123_stat" class="btn btn-primary">Starting at $199.00/mo</a>']);
        }
        // return view('home', ['stats' => $stats]);
        // echo $stats_opensolar[0]->subscribed;
    }
}