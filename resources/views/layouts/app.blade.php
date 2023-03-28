<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

$auth_email = "";
$current_portal_id = "";
$accounts = ""; 

//  Getting Current User Email
if (Auth::check())
{
    // The user is logged in...
$auth_email = Auth::user()->email;



// Fetching Portal IDs relevent to the current user id on the behalf of email
$auth_id = DB::table('users')->where('email', "=", $auth_email)->get('id');

if ($auth_id[0]->id) {

    $account_details = DB::table('user_account_assoc')
        ->select('accounts.portal_id', 'users.email', 'users.id as user_id')
        ->where('user_account_assoc.user_id', $auth_id[0]->id)
        ->join('accounts', 'user_account_assoc.account_id', '=', 'accounts.id')
        ->join('users', 'users.id', '=', 'user_account_assoc.user_id')
        ->get();
}

// Retrieved data of connected HubSpot Accounts
$accounts = json_decode($account_details, true);

if ($accounts > 0) {

    if (is_null(Auth::user()->current_portal_id) || empty(Auth::user()->current_portal_id)) {
        // updating current user portal id in database
        DB::table('users')->where('email', "=", $auth_email)->update(['current_portal_id' =>  $accounts[0]["portal_id"]]);

        $current_portal_id  = $accounts[0]["portal_id"];

        if ($accounts > 1) {

        foreach ($accounts as $key => $account) {
            if ($account['portal_id'] === $current_portal_id) {
                unset($accounts[$key]);
            }
        }
    }

        // Re-index the array keys
        $accounts = array_values($accounts);
    } else {

        foreach ($accounts as $key => $account) {
            if ($account['portal_id'] === Auth::user()->current_portal_id) {
                unset($accounts[$key]);
            }
        }

        // Re-index the array keys
        $accounts = array_values($accounts);
        $current_portal_id  = Auth::user()->current_portal_id;
    }
}

}

?>


<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->

    <link rel="dns-prefetch" href="//fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" />

    <!-- Option 1: Include in HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/'.$current_portal_id) }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto"></ul>

                    <!---->
                    <!---->
                    <!---->
                    <!---->
                    <!-- Icons -->
                    <!-- Notifications -->
                    <ul class="navbar-nav">
                        <li>
                            <a href="#notification" data-bs-toggle="collapse" class="nav-link px-0 align-middle ">
                                <i class="fs-4 bi-bell-fill"></i>
                            </a>
                            <ul class="collapse nav flex-column ms-1" id="notification" data-bs-parent="#menu">
                                <!-- <li class="w-100">
                    <a class="nav-link px-0">
                      <span class="d-none d-sm-inline"
                        >Testing Notification</span
                      >
                    </a>
                  </li> -->
                            </ul>
                        </li>
                    </ul>
                    <!---->
                    <!---->
                    <!---->

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        <!--@if (Route::has('register'))-->
                        <!--    <li class="nav-item">-->
                        <!--        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>-->
                        <!--    </li>-->
                        <!--@endif-->
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                
                                
                                <!--DropDown For Current User ID -->
                                <a class="dropdown-item" href="{{ url('/'.$current_portal_id) }}" onclick=sendUserData("{{ $current_portal_id }} ")>
                                    <b>Current ID:  {{ $current_portal_id }}</b>
                                    </a>

                                
                                <!--DropDown For Portal Id Dynamically -->
                                <?php

                                //  Rest Accounts of User HubSpot
                                foreach ($accounts as $account) {
                                    echo '<a
                                          class="dropdown-item"
                                          href="'.url('/'.$account["portal_id"]).'"
                                           onclick=sendUserData("'.$account["portal_id"].'") >
                                          ID: ' . $account['portal_id'] . '
                                         </a>';
                                }

                                ?>


                                <!--DropDown For Logout-->
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
</body>

</html>

<script>

function sendUserData(value) {
    // alert(value);

    axios.post("/update_portal_id/"+value+"", {
                   
                    portal_id: value,
                })
                .then(function(response) {
                    Swal.fire('Form Submitted Successfully!', 'Email Successfully Send to Agent.', 'success')
                })
                .catch(function(error) {
                    console.log(error.response);
                });
    
}

    
</script>