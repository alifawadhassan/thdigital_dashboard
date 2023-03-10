<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SaularController extends Controller
{
    //
    public function show()
    {
        $want_deals = "";
        $want_contacts = "";
        $deal_stage = "";
        $subscribed = "";


        //  Getting Current User Email
        $auth_email = Auth::user()->email;

        //  Cheking That Email in OpenSolar User Table and check its subscription
        $want_deals = DB::connection('opensolar')->table('users')->where('hubspot_email', "=", $auth_email)->get('want_deals');
        $deal_stage = DB::connection('opensolar')->table('users')->where('hubspot_email', "=", $auth_email)->get('deal_stage');
        $want_contacts = DB::connection('opensolar')->table('users')->where('hubspot_email', "=", $auth_email)->get('want_contacts');
        $subscribed = DB::connection('opensolar')->table('users')->where('hubspot_email', "=", $auth_email)->get('subscribed');

        return view('installed_apps.saular', [
            "want_deals" => $want_deals[0]->want_deals,
            "deal_stage" => $deal_stage[0]->deal_stage,
            "want_contacts" => $want_contacts[0]->want_contacts,
            "subscribed" => $subscribed[0]->subscribed
        ]);
    }
}
