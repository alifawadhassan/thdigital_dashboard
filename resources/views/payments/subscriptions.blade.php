@extends('layouts.app')

@section('content')


<div class="container-fluid">
    <div class="row flex-nowrap">
        @include('components.sidebar')

        <div class="col py-1">
            <!--  -->
            <h1 class="display-6 text-primary">Subscriptions</h1>

           
            <div class="mt-4 row">
                 <!-- 1st APP Saular -->
                <div class="ms-3" style="width: 26rem;">
                    <table class="table border">
                        <thead>
                            <tr>
                                <th scope="col" colspan="12">
                                    <h4><b>Saular</b></h4>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>

                                <td>Current Plan</td>
                                <td>Pro</td>
                                <td><a href="">Change Plan</a></td>
                            </tr>
                            <tr>
                                <td>Billing</td>
                                <td>Trial Ends Mar 01 2023</td>
                            </tr>
                            <tr>
                                <td>HubSpot Status</td>
                                <td>Connected</td>
                            </tr>
                        </tbody>
                    </table>
                </div>


                  <!-- 2ND APP Custom Notes -->
                  <div class="ms-3" style="width: 26rem;">
                    <table class="table border">
                        <thead>
                            <tr>
                                <th scope="col" colspan="12">
                                    <h4><b>Notes</b></h4>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>

                                <td>Current Plan</td>
                                <td>Pro</td>
                                <td><a href="">Change Plan</a></td>
                            </tr>
                            <tr>
                                <td>Billing</td>
                                <td>Trial Ends Mar 01 2023</td>
                            </tr>
                            <tr>
                                <td>HubSpot Status</td>
                                <td>Connected</td>
                            </tr>
                        </tbody>
                    </table>
                </div>


            </div>

        </div>
    </div>
    @endsection