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
                                <td>{{ $current_plan_opensolar }}</td>
                                <td><a href="{{ $change_plan_link_opensolar }}">{{ $change_plan_text_opensolar }}</a></td>
                            </tr>
                            <tr>
                                <td>Installation URL</td>
                                <td><a href="https://thdigital.au/opensolar_app/install/">Click here</a></td>
                            </tr>
                            <tr>
                                <td>HubSpot Status</td>
                                <td>{{ $hubspot_status_opensolar }}</td>
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
                                <td>{{ $current_plan_notes}}</td>
                                <td><a href="{{ $change_plan_link_notes }}">{{ $change_plan_text_notes }}</a></td>
                            </tr>
                            <tr>
                                <td>Installation URL</td>
                                <td><a href="https://thdigital.au/opensolar_app/install/">Click here</a></td>
                            </tr>
                            <tr>
                                <td>HubSpot Status</td>
                                <td>{{ $hubspot_status_notes }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>


            </div>

        </div>
    </div>
    @endsection