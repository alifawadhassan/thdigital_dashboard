<?php

ob_flush();
ob_start();
require_once "../../../../config.php";
var_dump($link);

$request = @file_get_contents('php://input');
var_dump($request);
$contents = ob_get_contents(); // put the buffer into a variable
// file_put_contents("webhook_hubspot_logs_v2/00_getContentFromWebhook.log", $contents . "\n", FILE_APPEND);

// ob_end_clean();
file_put_contents("logs/001_v2_wh_stripe_dumpRequestFromWebhook.log", json_encode($request) . "\n", FILE_APPEND);



if (json_decode($request)->type == "customer.created" || json_decode($request)->type == "customer.updated") {
} else {
    
    $product_id  = json_decode($request)->data->object->items->data[0]->plan->product;
    $temp_stripe_customer_id = json_decode($request)->data->object->customer;
    $temp_status = json_decode($request)->data->object->status;



    if ($temp_status == "active" || $temp_status == "trialing") {
        $status = "Yes";
    } else if ($temp_status == "unpaid" || $temp_status == "canceled" || $temp_status == "incomplete_expired" || $temp_status == "paused" || $temp_status == "ended") {
        $status = "No";
    }else{
        $status = "No";
    }
    file_put_contents("logs/002_product_id_stats.log","\n\n\nProduct Id: ". $product_id."\nCustomer Striple Id: ".$temp_stripe_customer_id."\nStatus: ".$status . "\n", FILE_APPEND);



    //  OPENSOLAR OPENSOLAR OPENSOLAR OPENSOLAR OPENSOLAR OPENSOLAR OPENSOLAR OPENSOLAR OPENSOLAR OPENSOLAR OPENSOLAR OPENSOLAR 
    //******************************************************************************************************************* */
    // ##################################################################################################################
    //    Parse data if subscriptionType == "customer.created" "customer.updated" and all events related to subscription   
    // ##################################################################################################################
    //******************************************************************************************************************** */
    if ($product_id == $open_solar_product_id) {




        $query = "SELECT * FROM `users` WHERE `stripe_customer_id`='" . $temp_stripe_customer_id . "'";
        $result = mysqli_query($link_opensolar , $query);

        if (mysqli_num_rows($result) > 0) {
            $query = "UPDATE `users` SET `subscribed`='" . $status . "' WHERE `stripe_customer_id`='" . $temp_stripe_customer_id . "'";
            mysqli_query($link_opensolar, $query);
        }

        file_put_contents("logs/OS_01_wh_contactcreation.log", "\n\n\nQuery of subscription_status: " . $query . "\nRequest" . $request . "\n", FILE_APPEND);




        //     $temp_stripe_email = json_decode($request)->data->object->email;
        //     $temp_stripe_customer_id = json_decode($request)->data->object->id;


        //     // SQL Query to fetch the stripe customer id and update it subscription status
        // $query = "SELECT * FROM `users` WHERE `open_solar_email`='" . $temp_stripe_email . "'";
        // $result = mysqli_query($link, $query);

        // if (mysqli_num_rows($result) > 0) {
        //     $query = "UPDATE `users` SET `stripe_customer_id`='" . $temp_stripe_customer_id . "' WHERE `open_solar_email`='" . $temp_stripe_email . "'";
        //     mysqli_query($link, $query);
        // }
        // // else{
        // //     $query = "INSERT INTO `users`(`stripe_customer_id`, `open_solar_email`) VALUES ('" .  $temp_stripe_customer_id . "','" . $temp_stripe_email . "')";
        // //     file_put_contents("webhook_hubspot_logs_v2/0000002_v2_wh_contaonquery.log", $query . "\n", FILE_APPEND);

        // //     mysqli_query($link, $query);
        // // }

        // file_put_contents("webhook_hubspot_logs_v2/002_v2_wh_contactcreation.log", $request . "\n", FILE_APPEND);

        // } else if (json_decode($request)->type == "customer.subscription.created" || json_decode($request)->type == "customer.subscription.deleted" || json_decode($request)->type == "customer.subscription.paused" || json_decode($request)->type == "customer.subscription.updated" || json_decode($request)->type == "customer.subscription.resumed") {
        //     $temp_stripe_customer_id = json_decode($request)->data->object->customer;
        //     $temp_status = json_decode($request)->data->object->status;
        //     $status = "";

        //     if ($temp_status == "active" || $temp_status == "trialing") {
        //         $status = "Yes";
        //     } else if ($temp_status == "unpaid" || $temp_status == "canceled" || $temp_status == "incomplete_expired" || $temp_status == "paused" || $temp_status == "ended") {
        //         $status = "No";
        //     }



        //     $query = "SELECT * FROM users WHERE stripe_customer_id='" . $temp_stripe_customer_id . "'";
        //     $result = mysqli_query($link, $query);

        //     if (mysqli_num_rows($result) > 0) {
        //         $query = "UPDATE `users` SET `subscribed`='" . $status . "' WHERE `stripe_customer_id`='" . $temp_stripe_customer_id . "'";
        //         mysqli_query($link, $query);
        //     }

        //     file_put_contents("webhook_hubspot_logs_v2/003_v2_wh_subscription_updates.log", $request . "\n", FILE_APPEND);
        // } else {
        //     file_put_contents("webhook_hubspot_logs_v2/004_v2_wh_else_logs.log", $request . "\n", FILE_APPEND);
        // }


    }

    //  NOTES NOTES NOTES NOTES NOTES NOTES NOTES NOTES NOTES NOTES NOTES NOTES NOTES NOTES NOTES NOTES NOTES NOTES NOTES
    //******************************************************************************************************************* */
    // ##################################################################################################################
    //    Parse data if subscriptionType == "customer.created" "customer.updated" and all events related to subscription   
    // ##################################################################################################################
    //******************************************************************************************************************** */

    else if ($product_id == $notes_product_id ) {


        $query = "SELECT * FROM `users` WHERE `stripe_customer_id`='" . $temp_stripe_customer_id . "'";
        $result = mysqli_query($link_notes, $query);

        if (mysqli_num_rows($result) > 0) {
            $query = "UPDATE `users` SET `subscription_status`='" . $temp_status . "' WHERE `stripe_customer_id`='" . $temp_stripe_customer_id . "'";
            mysqli_query($link_notes, $query);
        }

        file_put_contents("logs/NO_01_wh_contactcreation.log", "\n\n\nQuery of subscription_status: " . $query . "\nRequest" . $request . "\n", FILE_APPEND);





        // if (json_decode($request)->type == "customer.created" || json_decode($request)->type == "customer.updated") {

        //     $temp_stripe_email = json_decode($request)->data->object->email;
        //     $temp_stripe_customer_id = json_decode($request)->data->object->id;


        //     // SQL Query to update the stripe customer id parallel to OpenSolar Email
        //     $query = "SELECT * FROM `users` WHERE `open_solar_email`='" . $temp_stripe_email . "'";
        //     $result = mysqli_query($link, $query);

        //     if (mysqli_num_rows($result) > 0) {
        //         $query = "UPDATE `users` SET `stripe_customer_id`='" . $temp_stripe_customer_id . "' WHERE `open_solar_email`='" . $temp_stripe_email . "'";
        //         mysqli_query($link, $query);
        //     }
        //     // else{
        //     //     $query = "INSERT INTO `users`(`stripe_customer_id`, `open_solar_email`) VALUES ('" .  $temp_stripe_customer_id . "','" . $temp_stripe_email . "')";
        //     //     file_put_contents("webhook_hubspot_logs_v2/0000002_v2_wh_contaonquery.log", $query . "\n", FILE_APPEND);

        //     //     mysqli_query($link, $query);
        //     // }

        //     file_put_contents("webhook_hubspot_logs_v2/002_v2_wh_contactcreation.log", $request . "\n", FILE_APPEND);

        // } else if (json_decode($request)->type == "customer.subscription.created" || json_decode($request)->type == "customer.subscription.deleted" || json_decode($request)->type == "customer.subscription.paused" || json_decode($request)->type == "customer.subscription.updated" || json_decode($request)->type == "customer.subscription.resumed") {
        //     $temp_stripe_customer_id = json_decode($request)->data->object->customer;
        //     $temp_status = json_decode($request)->data->object->status;
        //     $status = "";

        //     if ($temp_status == "active" || $temp_status == "trialing") {
        //         $status = "Yes";
        //     } else if ($temp_status == "unpaid" || $temp_status == "canceled" || $temp_status == "incomplete_expired" || $temp_status == "paused" || $temp_status == "ended") {
        //         $status = "No";
        //     }



        //     $query = "SELECT * FROM users WHERE stripe_customer_id='" . $temp_stripe_customer_id . "'";
        //     $result = mysqli_query($link, $query);

        //     if (mysqli_num_rows($result) > 0) {
        //         $query = "UPDATE `users` SET `subscribed`='" . $status . "' WHERE `stripe_customer_id`='" . $temp_stripe_customer_id . "'";
        //         mysqli_query($link, $query);
        //     }

        //     file_put_contents("webhook_hubspot_logs_v2/003_v2_wh_subscription_updates.log", $request . "\n", FILE_APPEND);
        // } else {
        //     file_put_contents("webhook_hubspot_logs_v2/004_v2_wh_else_logs.log", $request . "\n", FILE_APPEND);
        // }


    }
}
