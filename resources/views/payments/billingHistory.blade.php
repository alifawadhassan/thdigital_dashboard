@extends('layouts.app')

@section('content')


<div class="container-fluid">
    <div class="row flex-nowrap">
        @include('components.sidebar')

        <div class="col py-1">
            <h1 class="display-6 text-primary">Billing History</h1>

            <!-- Table -->
            <table class="mt-4 table table-striped table-bordered table-responsive">
                <thead class="table-dark">
                    <tr>
                        <th class="text-nowrap" scope="col">S.no</th>
                        <th scope="col">Product</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Date</th>
                        <th scope="col">Invoice</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Saular</td>
                        <td>50$</td>
                        <td>7-3-2023</td>
                        <td>file</td>
                    </tr>

                    {{ $data }}

                    <!-- @foreach($data as $user)
                    <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td>{{$user->firstname}}</td>
                    <td>{{$user->created}}</td>
                    <td>{{$user->email}}</td>
                    </tr>
                    @endforeach -->

                </tbody>

            </table>

        </div>
    </div>
</div>
@endsection
