@extends('layouts.app')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> --}}

<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class="fs-5 d-none d-sm-inline">Menu</span>
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                        <span class="text-muted">All APPS</span>
                        <hr>
                        <a href="{{ url('/home') }}" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">View All Apps</span>
                        </a>
                    </li>
                    <li>
                        <span class="text-muted">MY APPS</span>
                        <hr>
                        <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">My Installed Apps</span> </a>
                        <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Saular</span> 1 </a>
                            </li>
                            <li>
                                <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Notes</span> 2 </a>
                            </li>
                        </ul>
                    </li>
                   
                    <li>
                        <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle ">
                            <i class="fs-4 bi-credit-card"></i> <span class="ms-1 d-none d-sm-inline">Payments</span></a>
                        <ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Subscriptions</span> </a>
                            </li>
                            <li>
                                <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Billing History</span> </a>
                            </li>
                        </ul>
                    </li>
                   
                    <li>
                        <span class="text-muted">SUPPORT</span>
                        <hr>
                        <a href="#" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-file-text"></i> <span class="ms-1 d-none d-sm-inline">KnowledgeBase</span> </a>
                    </li>
                </ul>
            </div>
        </div>

{{--  --}}
        <div class="col py-1">
            {{--  --}}
            <h1 class="mb-3">APPS</h1>
            {{--  --}}
            <div class="row">
            <div class="card ms-3" style="width: 18rem;">
                <img src="	https://thdigital.au/opensolar_app/install/512.png" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Saular</h5>
                  <p class="card-text">Save time and ensure HubSpot and OpenSolar are synchronised with the latest data</p>
                  <a href="#" id="123_stat" class="btn btn-primary">Installed</a>
                </div>
            </div>

             {{--  --}}
             <div class="card ms-3" style="width: 18rem;">
                <img src="https://static.vecteezy.com/system/resources/previews/003/551/402/original/yellow-sticky-notes-on-black-background-for-journal-or-memo-decoration-illustration-social-media-post-frame-free-vector.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Notes</h5>
                  <p class="card-text">Create custom notes in HubSpot in Workflows using custom action</p>
                  <a href="#" id="321_stat" class="btn btn-primary">Starting at $199.00/mo</a>
                </div>
            </div>
        </div>
        </div>
       
    </div>
</div>
@endsection
