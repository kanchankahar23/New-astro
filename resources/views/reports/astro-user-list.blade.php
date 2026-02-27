@extends('master.master')
@section('title', 'Enquiry List')
@section('content')

    <style>
        .bonus {
            font-size: 10px;
            color: rgb(248, 245, 243);
            font-weight: bold;
            padding: 6px 8px;
            background-color: rgb(99, 8, 245);
            border-radius: 10px;
            text-decoration: none;
        }

        .bonus:hover {
            color: white;
            /* You can define a color here when hovering */
        }

        .detail-button {
            position: relative;
            padding: 10px 20px;
            cursor: pointer;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
        }

        .details {
            display: none;
            position: absolute;
            top: 120%;
            left: 50%;
            transform: translateX(-50%);
            background-color: #333;
            color: white;
            padding: 10px;
            border-radius: 5px;
            white-space: nowrap;
        }

        .detail-button:hover .details {
            display: block;
        }
    </style>
    <link rel="stylesheet" href="{{ url('assets/css/font-awesome.min.css') }}">
    <div class="content-wrapper">

        <div class="card-body" style="background-color: #fff; border-radius:10px;">
            <div class="row">
                <div class="col-md-2">
                    <h4>Astro Users List</h4>
                </div>
                <div class="col-md-3">
                    <h4>Total Balance : <b><span class="badge badge-success">{{ $totalAmount ?? 0.0 }}&nbsp;
                                &#8377;</span></b></h4>
                </div>
                <div class="col-md-3">
                    <h4>Total Bonus : <b><span class="badge badge-warning">{{ $totalBonus ?? 0.0 }}&nbsp; &#8377;</span></b>
                    </h4>
                </div>
                <div class="col-md-4">
                    <h4>Available Balance : <b><span class="badge badge-primary">{{ $totalAvaBl ?? 0.0 }}&nbsp;
                                &#8377;</span></b></h4>
                </div>
            </div>
        </div>


        <form action="{{ url('astro-user') }}" method="Post" enctype="multipart/form-data" class="mt-2">@csrf
            <div class=" ">
                <div class="mb-3 card col-xl-12 d-flex">
                    <div class="row ">
                        <div class="mt-4 col-xl-4 ">
                            <label>Name</label>
                            <input type="text" class="form-control" placeholder="Search via name" name="name"
                                value="{{ $name ?? '' }}">
                        </div>
                        <div class="mt-4 col-xl-4 ">
                            <label>Mobile</label>
                            <input type="text" class="form-control" placeholder="Search via Amount" name="mobile"
                                value="{{ $mobile ?? '' }}">
                        </div>
                        <div class="mt-1 mb-3 col-xl-4">
                            <label>.</label>
                            <div class="card-body">
                                <button class="py-3 btn btn-primary btn-block" type="submit">Search</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div style="overflow: auto;">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>S.No.</th>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Gender</th>
                        <th>Total recharge</th>
                        <th>Total Bonus</th>
                        <th>Available balance</th>
                        <th>Upcoming Appointment</th>
                        <th>View</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($users as $i => $user)
                    <tr>
                        <td>{{ ++$i }}.</td>
                        <td><a href="{{ url('all-transection-user', $user->id) }}">{{
                                ucfirst($user->name) }}</a></td>
                        <td>{{ $user->mobile }}</td>
                        <td>{{ $user->gender }}</td>
                        <td>&#8377; &nbsp;{{ totalBalance($user->id) }}</td>
                        <td>&#8377; &nbsp; {{ balanceEnquiryBonus($user->id) }}
                            @if (!empty($user->getPaymentInfo->remark))
                            <a onclick="appointmentHistory('{{ url('special-bonus' . '?id=' . $user->getPaymentInfo->id) }}')"
                                class="bonus">Special Offer</a>
                            @endif
                        </td>
                        <td>&#8377; &nbsp;{{ balanceEnquiry($user->id) }}</td>
                        <td>
                            @if (!empty($user->getAppointment->preferred_date))
                            <a
                                onclick="appointments('{{ url('appointment-details', $user->id) }}')">
                                <span class="badge-success badge-large detail-button"> yes
                                    @php
                                    $astroDetails =
                                    upcomingDate($user->getAppointment->preferred_date);
                                    @endphp

                                    @if ($astroDetails)
                                    <div class="details">
                                        <p>Astrologer Name: {{ $astroDetails['astro_name']
                                            }}</p>
                                        <p>Appointment Date: {{
                                            $astroDetails['appointment']->preferred_date }}
                                        </p>
                                        <p>Appointment Time: {{
                                            $astroDetails['appointment']->preferred_time }}
                                        </p>
                                    </div>
                                    @else
                                    <div class="details">
                                        <p>No upcoming appointment available.</p>
                                    </div>
                                    @endif
                                </span>
                            </a>
                            @else
                            <span class="badge-danger badge-large1">No</span>
                            @endif
                        </td>
                        <td>
                            @if (!empty($user->getAppointment->preferred_date))
                            <button
                                onclick="appointmentHistory('{{ url('appointment-history' . '?id=' . $user->id) }}')"
                                class="btn btn-warning btn-sm">View</button>
                            @endif
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <div class="mt-3" style="float: right;">
            {{ $users->links() }}
        </div>
    </div>
    <div class="modal" id="appointmentHistory"></div>
    <div class="modal" id="appointment"></div>
    <script>
        function appointmentHistory(url, id) {
            $.get(url, id, function(rs) {
                $('#appointmentHistory').html(rs);
                $('#appointmentHistory').modal('show');
            });
        }

        function appointments(url, id) {
            $.get(url, id, function(rs) {
                $('#appointment').html(rs);
                $('#appointment').modal('show');
            });
        }
    </script>

@endsection
