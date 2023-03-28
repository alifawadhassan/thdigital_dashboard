<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showSubscriptions()
    {

        //  Getting Current User Email
        $auth_email = Auth::user()->email;


        $hubspot_status_opensolar = "";
        $temp_hubspot_status_opensolar = DB::connection('opensolar')->table('users')->where('hubspot_email', "=", $auth_email)->get();
        if (count($temp_hubspot_status_opensolar)!=0) {
            $hubspot_status_opensolar = "Connected";
        } else {
            $hubspot_status_opensolar = "Not Connected";
        }

        //  If Subscription is yes we show Installed on App otherwise we show Payment Link
        //  Cheking That Email in OpenSolar User Table and check its subscription
        $change_plan_text_opensolar = "";
        $current_plan_opensolar = "Inactivated";
        $change_plan_link_opensolar = "";
        $temp_subscription_status_opensolar = DB::connection('opensolar')->table('users')->where('hubspot_email', "=", $auth_email)->get('subscribed');
        if (count($temp_subscription_status_opensolar) > 0) {

            if ($temp_subscription_status_opensolar[0]->subscribed == "Yes") {

                $current_plan_opensolar = "Activated";

            } else {
                $change_plan_link_opensolar = "https://buy.stripe.com/7sI8Aq5c20xea4M006";
            }

        } else {
            $change_plan_link_opensolar = "https://buy.stripe.com/7sI8Aq5c20xea4M006";
        }


        // 
        // --------------------------------------NOTES--------------------------------
        // 
        $hubspot_status_notes = "";
        $temp_hubspot_status_notes = DB::connection('notes')->table('users')->where('email', "=", $auth_email)->get();
        if (count($temp_hubspot_status_notes)!=0) {
            $hubspot_status_notes = "Connected";
        } else {
            $hubspot_status_notes = "Not Connected";
        }


        // 
        $change_plan_text_notes = "";
        $change_plan_link_notes = "";
        $current_plan_notes = "Inactivated";

        $temp_subscription_status_notes = DB::connection('notes')->table('users')->where('email', "=", $auth_email)->get('subscription_status');
        if (count($temp_subscription_status_notes) > 0) {

            if ($temp_subscription_status_notes[0]->subscribed == "Yes") {

                $current_plan_notes = "Activated";

            } else {
                $change_plan_link_notes = "https://buy.stripe.com/7sI8Aq5c20xea4M006";

            }

        } else {
            $change_plan_link_notes = "https://buy.stripe.com/7sI8Aq5c20xea4M006";
        }


        return view('payments.subscriptions', [
            'hubspot_status_opensolar' => $hubspot_status_opensolar,
            'hubspot_status_notes' => $hubspot_status_notes,
            'change_plan_text_opensolar' => $change_plan_text_opensolar,
            'change_plan_text_notes' => $change_plan_text_notes,
            'change_plan_link_opensolar' => $change_plan_link_opensolar,
            'change_plan_link_notes' => $change_plan_link_notes,
            'current_plan_notes' => $current_plan_notes,
            'current_plan_opensolar' => $current_plan_opensolar,
        ]);



        // if ($subscription_status_opensolar[0]->subscribed == "Yes") {
        //     return view('payments.subscriptions', [
        //         'current_plan_opensolar' => "Activated",
        //         'change_plan_text_opensolar' => "",
        //         'change_plan_link_opensolar' => "",
        //         'hubspot_status_opensolar' => $hubspot_status_opensolar
        //     ]);
        // } else {
        //     return view('payments.subscriptions', [
        //         'current_plan_opensolar' => "Inactivated",
        //         'change_plan_text_opensolar' => "Change Plan",
        //         'change_plan_link_opensolar' => "https://buy.stripe.com/7sI8Aq5c20xea4M006",
        //         'hubspot_status_opensolar' => $hubspot_status_opensolar
        //     ]);
        // }
    }


    public function showBillingHistory()
    {
        // $stripe = new \Stripe\StripeClient('sk_test_51GjYsRKEh3EHlbgxuhNFELRXuKopzLDnA60MJFnD7RyErG6h5N00jtXgAtFZxKOxk4J7C5Mh0CGwlcracQzO5yVz00xLcuyp49');

        // //  Getting Current User Email
        // $auth_email = Auth::user()->email;

        // //  Cheking That Email in OpenSolar User Table and check client subscription id
        // $subscription_id_opensolar = DB::connection('opensolar')->table('users')->where('hubspot_email', "=", $auth_email)->get('stripe_customer_id');

        // $response = $stripe->customers->allBalanceTransactions(
        //     $subscription_id_opensolar
        // );
        // //

        return view('payments.billingHistory');
        // echo $response;
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}