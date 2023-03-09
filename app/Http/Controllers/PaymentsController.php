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
        //
        return view('payments.subscriptions');
    }


    public function showBillingHistory()
    {
        $stripe = new \Stripe\StripeClient('sk_test_51GjYsRKEh3EHlbgxuhNFELRXuKopzLDnA60MJFnD7RyErG6h5N00jtXgAtFZxKOxk4J7C5Mh0CGwlcracQzO5yVz00xLcuyp49');

        //  Getting Current User Email
        $auth_email = Auth::user()->email;

        //  Cheking That Email in OpenSolar User Table and check client subscription id
        $subscription_id_opensolar = DB::connection('opensolar')->table('users')->where('hubspot_email', "=", $auth_email)->get('stripe_customer_id');

        $response = $stripe->customers->allBalanceTransactions(
            $subscription_id_opensolar
        );
        //
        
        return view('payments.billingHistory', ["data" => $response->data]);
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