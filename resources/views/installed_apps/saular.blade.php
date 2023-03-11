<?php
echo "<script>var want_deals = '" . $want_deals . "'</script>";
echo "<script>var want_contacts = '" . $want_contacts . "'</script>";
echo "<script>var deal_stage = '" . $deal_stage . "'</script>";
echo "<script>var subscribed = '" . $subscribed . "'</script>";
?>

@extends('layouts.app')
@section('content')

<div class="container-fluid">
    <div class="row flex-nowrap">
        @include('components.sidebar')

        <div class="col py-1">
            <!--  -->

            <h1 class="mb-3 display-6 text-primary">Saular Setting Page</h1>


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
                <!--  CARD 1  -->
                <div class="mt-4 mb-3 card">
                    <div class="card-body">
                        <h4>
                            <b>Create Deals in Hubspot</b> 
                        </h4>   
                           
                            <span class="lead">Do you want to create deals for all new projects created in Open Solar?                            </span>
                            <div class="form-check form-switch position-absolute top-50 end-0">
                            
                                <div class="d-flex">
                                  No
                                  <div class="form-switch ms-2">
                                    <input id="want_deals" onchange="update_want_deals()" class="form-check-input" type="checkbox" >
                                  </div>
                                  <label for="site_state" class="form-check-label">Yes</label>
                                </div>
                            </div>
                    </div>
                </div>

                <!--  -->
                <!-- CARD 2 -->
                <div class="mb-3 card">
                    <div class="card-body">
                        <h4>
                            <b>Deal Stage</b> 
                        </h4>    
                            <span class="lead">Choose a Deal Stage in Hubspot for all your projects.</span>
                            <div class="position-absolute top-50 end-0">
                                <select onchange="update_deal_stage()" id="deal_stage" class="form-select" aria-label="Default select example">
                                    <option value="selectanoption">Select an Option</option>
                                    <option value="appointmentscheduled">Appointment scheduled</option>
                                    <option value="qualifiedtobuy">Qualified to buy</option>
                                    <option value="presentationscheduled">Presentation scheduled</option>
                                    <option value="decisionmakerboughtin">Decision maker bought-In</option>
                                    <option value="contractsent">Contract sent</option>
                                    <option value="closedwon">Closed Won</option>
                                    <option value="closedlost">Closed lost</option>
                                </select>
                            </div>
                        </div>
                </div>


                <!--  -->
                <!-- CARD 3 -->
                <div class="mb-3 card">
                    <div class="card-body">
                        <h4>
                            <b>Create Contacts in OpenSolar</b> 
                        </h4>
                            <span class="lead">Do you want to create contacts in Open Solar for all new contacts created in HubSpot?</span>
                            {{--  --}}
                            <div class="form-check form-switch position-absolute top-50 end-0">
                                <div class="d-flex">
                                  No
                                  <div class="form-switch ms-2">
                                    <input onchange="update_want_contacts()" class="form-check-input" type="checkbox" id="want_contacts" >
                                  </div>
                                  <label for="site_state" class="form-check-label">Yes</label>
                                </div>
                            </div>
                    </div>
                </div>

                <!--  -->
                <!-- CARD 4 -->
                <div class="mb-3 card">
                    <div class="card-body">
                        <h4>
                            <b>Subscription Status with Saular:</b> 
                        </h4>
                            <span class="lead">Active / Cancelled</span>

                            {{--  --}}
                            <div class="form-check form-switch position-absolute top-50 end-0" title="Please get in touch on our support page ( https://www.thrive-digital.com.au/saular-support )">
                                <div class="d-flex">
                                  Cancelled
                                  <div class="form-switch ms-2">
                                    <input class="form-check-input" type="checkbox" id="subscribed" disabled>
                                  </div>
                                  <label for="site_state" class="form-check-label">Active</label>
                                </div>
                            </div>
                    </div>
                </div>

            </div>


        </div>
    </div>
</div>
@endsection


<script>
  
    // 
    // -----------------------------------------------
    // 
    window.onload = function abc() {

        //  Update the value of Want deals using the data from database
        if(want_deals=="Yes")
        {
            document.getElementById("want_deals").checked = true ;
        }else{
            document.getElementById("want_deals").checked = false ;
        }

        //  Update the value of Want deals using the data from database
         if(deal_stage!="")
        {
            document.getElementById("deal_stage").value = deal_stage ;
        }else{
            document.getElementById("deal_stage").value = "selectanoption" ;
        }


        //  Update the value of Want deals using the data from database
        if(want_contacts=="Yes")
        {
            document.getElementById("want_contacts").checked = true ;
        }else{
            document.getElementById("want_contacts").checked = false ;
        }


        //  Update the value of Want deals using the data from database
        if(subscribed=="Yes")
        {
            document.getElementById("subscribed").checked = true ;
        }else{
            document.getElementById("subscribed").checked = false ;
        }
    }

    // 
    // -----------------------------------------------
    // 
    function update_want_deals()
    {
      var temp_inputValue = document.getElementById("want_deals").checked;

      if(temp_inputValue == true)
      {
        inputValue = "Yes"
      }else{
        inputValue = "No"
      }


      var url = '{{ route('update_want_deals') }}';


      // Send an Ajax request to the update-my-input route
      $.ajax({
        url: url,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        method: 'POST',
        data: {
          value: inputValue
        },
        success: function(response) {
        
          if(temp_inputValue == true)
      {
        alert('Now Deals will create in HubSpot for OpenSolar Projects!');
      }else{
        alert('Now Deals will not create in HubSpot for OpenSolar Projects!');
      }

          // console.log(response);
          //  saular_session  = response['saular_session'];
        },
        error: function(xhr, status, error) {
          console.log(error);
        }
      });

    }


    // 
    // -----------------------------------------------
    // 
    function update_deal_stage()
    {
      var inputValue  = document.getElementById("deal_stage").value;
      var url = '{{ route('update_deal_stage') }}';

      // Send an Ajax request to the update-my-input route
      $.ajax({
        url: url,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        method: 'POST',
        data: {
          value: inputValue
        },
        success: function(response) {
          // console.log(response);
          // saular_session  = response['saular_session'];
          alert("Deal Stage in Hubspot for all your projects is updated successfully!");
        },
        error: function(xhr, status, error) {
          console.log(error);
        }
      });
      document.getElementById("saular_session").innerHTML  = saular_session;

    }


    // 
    // ---------------------------------------------------
    // 
    function update_want_contacts()
    {
  
      var temp_inputValue = document.getElementById("want_contacts").checked;

      if(temp_inputValue == true)
      {
        inputValue = "Yes"
      }else{
        inputValue = "No"
      }

      var url = '{{ route('update_want_contacts') }}';

      // Send an Ajax request to the update-my-input route
      $.ajax({
        url: url,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        method: 'POST',
        data: {
          value: inputValue
        },
        success: function(response) {
          // console.log(response);
            // saular_session  = response['saular_session'];

            if(temp_inputValue == true)
      {
        alert('New contacts will create in Open Solar for new Contacts in HubSpot!');
      }else{
        alert('New contacts will not create in Open Solar for new Contacts in HubSpot!');
      }
            
        },
        error: function(xhr, status, error) {
          console.log(error);
        }
      });

    }



</script>