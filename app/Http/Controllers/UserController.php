<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index($id)
    {
        $auth_email = Auth::user()->email;

        DB::table('users')->where('email', "=", $auth_email)->update(['current_portal_id' =>  $id]);

        return redirect('home/' . $id);
    }
}
