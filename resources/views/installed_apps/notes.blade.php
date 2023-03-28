@extends('layouts.app')
@section('content')

<div class="container-fluid">
    <div class="row flex-nowrap">
        @include('components.sidebar')

        <div class="col py-1">
            <!--  -->

            <h1 class="mb-3 display-6 text-primary">Custom Notes Setting Page</h1>


            @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="mt-2">
                <!--  -->
                <!--  -->
                <h3>
                  <b>General settings</b>  
                    <br>
                    <span class="lead">These preferences apply only to this app and how it works in HubSpot.</span>
                </h3>


                <!--  -->
                <!-- CARD 4 -->
                <div class="mb-3 card">
                    <div class="card-body">
                        <h4>
                            <b>Status with Custom Notes App:</b> 
                        </h4>


                        <p>
                       <h4><b class="text-primary">  My Plan: Pro</b></h4> <br>
                       <h5> 0 of 50 successful custom notes have been created this period </h5> 
                        </p>
                    </div>
                </div>

            </div>


        </div>
    </div>
</div>
@endsection
