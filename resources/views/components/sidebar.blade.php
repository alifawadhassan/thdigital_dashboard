<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

 //  Getting Current User Email
 $auth_email = Auth::user()->email;

 $current_portal_id  = Auth::user()->current_portal_id;


 // 
 // -----------------------------OPENSOLAR----------------
 //

 //  Check if user Email Exist in Our DB then show this app on his portal
 $hide_show_opensolar_div = "";
 $temp_hide_show_opensolar_div = DB::connection('opensolar')->table('users')->where('hubspot_email', "=", $auth_email)->get();
 if (count($temp_hide_show_opensolar_div)==0) {
     $hide_show_opensolar_div = "none";
 }



 // 
 // -----------------------------NOTES----------------
 // 
 //  Check if user Email Exist in Our DB then show this app on his portal

 $hide_show_notes_div = "";
 $temp_hide_show_notes_div = DB::connection('notes')->table('users')->where('email', "=", $auth_email)->get();
 // return $temp_hide_show_notes_div;
 if (count($temp_hide_show_notes_div) == 0) {
     $hide_show_notes_div = "none";
 }


?>



<div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class="fs-5 d-none d-sm-inline">Menu</span>
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <!--  -->
                    <!-- ALL APPS AVAILABLE -->
                    <!--  -->
                    <li class="nav-item">
                        <span class="text-muted">All APPS</span>
                        <hr>
                        <a href="{{ url('/'.$current_portal_id) }}" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">View All Apps</span>
                        </a>
                    </li>

                    <!--  -->
                    <!-- MY INSTALLED APPS -->
                    <!--  -->
                    <li>
                        <span class="text-muted">MY APPS</span>
                        <hr>
                        <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">My Installed Apps</span> </a>
                        <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">

<?php  
    if($hide_show_opensolar_div != "none"){
?>
    <li class="w-100">
        <div id="hide_show_opensolar_div" class="btn-group">
           <a href="{{ url('/'.$current_portal_id.'/installed_apps/saular') }}">
            <i class="fs-4 bi-sun"></i> <span class="ms-1 d-none d-sm-inline">Saular</span> </a>
            </a>
        </div>
    </li>
<?php
    }
?>

<?php 
    if($hide_show_notes_div !="none"){
?>
    <li class="mt-2">
        <div id="hide_show_notes_div" class="btn-group">
            <a href="{{ url('/'.$current_portal_id.'/installed_apps/notes') }}">
                <i class="fs-4 bi-file-earmark-medical"></i> <span class="ms-1 d-none d-sm-inline">Notes</span> </a>
            </a>
        </div>
    </li>
<?php 
    }
?>


                        </ul>
                    </li>

                    <!--  -->
                    <!-- PAYMENTS -->
                    <!--  -->

                    <li>
                        <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle ">
                            <i class="fs-4 bi-credit-card"></i> <span class="ms-1 d-none d-sm-inline">Payments</span></a>
                        <ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="{{ url('/'.$current_portal_id.'/subscription') }}" class="nav-link px-0"> <span class="d-none d-sm-inline">Subscriptions</span> </a>
                            </li>
                            <li>
                                <a href="{{ url('/'.$current_portal_id.'/billing_history') }}" class="nav-link px-0"> <span class="d-none d-sm-inline">Billing History</span> </a>
                            </li>
                        </ul>
                    </li>

                    <!--  -->
                    <!-- SUPPORT -->
                    <!--  -->
                    <li>
                        <span class="text-muted">SUPPORT</span>
                        <hr>
                        <a href="http://thdigital.com.au/saular-support" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-file-text"></i> <span class="ms-1 d-none d-sm-inline">KnowledgeBase</span> </a>
                    </li>
                </ul>
            </div>
</div>





       


