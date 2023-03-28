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
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($id)
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
        $temp_subscription_status_notes = DB::connection('notes')->table('users')->where('email', "=", $auth_email)->get('subscription_status');

        if (count($temp_subscription_status_notes) > 0) {

            if ($temp_subscription_status_notes[0]->subscription_status == "Yes") {

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

    function testing()
    {
        //  $auth_email = Auth::user()->email;


        //  // Fetching Portal IDs relevent to the current user id on the behalf of email
        // $auth_id = DB::table('users')->where('email', "=", $auth_email)->get('id');

        // if ($auth_id[0]->id) {

        //     $account_details = DB::table('user_account_assoc')
        //         ->select('accounts.portal_id', 'users.email', 'users.id as user_id')
        //         ->where('user_account_assoc.user_id', $auth_id[0]->id)
        //         ->join('accounts', 'user_account_assoc.account_id', '=', 'accounts.id')
        //         ->join('users', 'users.id', '=', 'user_account_assoc.user_id')
        //         ->get();
        // }


        // $accounts = json_decode($account_details, true);


        // if($accounts>0){


        // //   updating current user portal id in database
        //     DB::table('users')->where('email', "=", $auth_email)->update(['current_portal_id' =>  $accounts[0]["portal_id"]]);

        //     // if ($accounts > 1) {

        //     //     foreach ($accounts as $key => $account) {
        //     //         if ($account['portal_id'] == $accounts[0]["portal_id"]) {
        //     //             unset($accounts[$key]);
        //     //         }
        //     //     }

        //         // Re-index the array keys
        //         $accounts = array_values($accounts);

        //         // Convert the array back to JSON
        //         $data = json_encode($accounts);

        //         echo $data;
        //     }
        // }



        // $auth_email = Auth::user()->current_portal_id;

        // echo $auth_email;
        //  // Fetching Portal IDs relevent to the account
        // $auth_id = DB::table('users')->where('email', "=", $auth_email)->get('id');


        // if($auth_id[0]->id){
        // $account_details = DB::table('user_account_assoc')
        //  ->select('users.email', 'users.id as user_id')
        //     ->where('user_id', $auth_id[0]->id)
        //     ->join('accounts', 'user_account_assoc.account_id', '=', 'accounts.id')
        //     ->get('accounts.portal_id','users.id');
        // }

        // return $account_details;

        $userId = 1;

        $accounts = DB::table('user_account_assoc')
            ->select('accounts.portal_id', 'users.email', 'users.id as user_id')
            ->where('user_account_assoc.user_id', $userId)
            ->join('accounts', 'user_account_assoc.account_id', '=', 'accounts.id')
            ->join('users', 'users.id', '=', 'user_account_assoc.user_id')
            ->get();

        $accounts = json_decode($accounts, true);

        foreach ($accounts as $key => $account) {
            if ($account['portal_id'] === Auth::user()->current_portal_id) {
                unset($accounts[$key]);
            }
        }

        // Re-index the array keys
        $accounts = array_values($accounts);

        // Convert the array back to JSON
        // $data = json_encode($accounts);

        return $accounts;


        // return $accounts;
        // $accounts = json_decode($accounts, true);

        // foreach ($accounts as $account) {
        //     echo $account['portal_id'] . '<br>';
        //  }

        // return Auth::user()->current_portal_id;
    }
}
