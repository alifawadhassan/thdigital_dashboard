<?php
echo "<script>var stats_opensolar = '" . $stats_opensolar . "'</script>";
?>

@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row flex-nowrap">
        @include('components.sidebar')

        <div class="col py-1">
            <!--  -->

            <h1 class="mb-3">APPS</h1>

            <!-- 1st APP Saular -->
            <div class="row">
                <div class="card ms-3" style="width: 18rem;">
                    <img src="	https://thdigital.au/opensolar_app/install/512.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><b>Saular</b></h5>
                        <p class="card-text">Save time and ensure HubSpot and OpenSolar are synchronised with the latest data</p>
                        <!-- <a href="#" id="123_stat" class="btn btn-primary">Installed</a> -->
                        <div id="div_open_solar">

                        </div>
                    </div>
                </div>

                <!-- 2nd APP Notes -->
                <div class="card ms-3" style="width: 18rem;">
                    <img src="https://static.vecteezy.com/system/resources/previews/003/551/402/original/yellow-sticky-notes-on-black-background-for-journal-or-memo-decoration-illustration-social-media-post-frame-free-vector.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><b>Notes</b></h5>
                        <p class="card-text">Create custom notes in HubSpot in Workflows using custom action</p>
                        <a href="#" id="321_stat" class="btn btn-primary">Starting at $199.00/mo</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


<script>
    window.onload = function abc() {

        var div_open_solar = document.getElementById("div_open_solar");
        if (stats_opensolar == "Yes") {
            div_open_solar.innerHTML = '<a href="" class="btn btn-primary">Installed</a>';
        } else {
            div_open_solar.innerHTML = '<a href="https://thdigital.au/opensolar_app/install/"  class="btn btn-primary">Starting at $199.00/mo</a>';
        }
    }
</script>