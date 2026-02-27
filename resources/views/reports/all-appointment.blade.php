@extends('master.master')
@section('title', 'Enquiry List')
@section('content')

    <div class="content-wrapper">

        <div class="row">
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show w-100" role="alert">
                    <span class="alert-text text-black">{{ $errors->first() }}</span>
                    <button type="button" class="close" data-dismiss="alert" style="float: right;">&times;</button>
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-warning alert-dismissible fade show w-100" role="alert">
                    <span class="alert-text text-black">{{ session('success') }}</span>
                    <button type="button" class="close" data-dismiss="alert" style="float: right;">&times;</button>
                </div>
            @endif
        </div>

        <div class="row ">
            <div class="mb-3 card col-xl-12 ">
                <div class="mt-3 col-xl-4">
                    <div class="card-body">
                        <h4 class="card-title">All Appointments </h4>
                    </div>
                </div>
            </div>
        </div>

        <form action="{{ url('user-appointment') }}" method="Post" enctype="multipart/form-data">@csrf
            <div class="row ">
                <div class="mb-3 card col-xl-12 d-flex">
                    <div class="row ">
                        <div class="mt-4 col-xl-2 ">
                            <label>Name</label>
                            <input type="text" class="form-control" placeholder="Search via name" name="name"
                                value="{{ $name ?? '' }}">
                        </div>

                        <div class="mt-4 col-xl-2 ">
                            <label>Mobile</label>
                            <input type="text" class="form-control" placeholder="Search via Mobile" name="mobile"
                                value="{{ $mobile ?? '' }}">
                        </div>
                        <div class="mt-4 col-xl-2 ">
                            <label>Select Astrologer</label>
                            <select name="astrologer" class="form-control">
                                <option value="">-select-</option>
                                @foreach ($astrologers as $astrologer)
                                    <option value="{{ $astrologer->id }}">{{ ucfirst($astrologer->name) }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-4 col-xl-2 ">
                            <label>From Date</label>
                            <input type="date" class="form-control" placeholder="From date" name="from_date"
                                value="{{ $fromDate ?? '' }}">
                        </div>
                        <div class="mt-4 col-xl-2 ">
                            <label>To Date</label>
                            <input type="date" class="form-control" placeholder="To date" name="to_date"
                                value="{{ $toDate ?? '' }}">
                        </div>

                        <div class="mt-1 mb-3 col-xl-2 mt-4">
                            <button class="py-3 btn btn-primary btn-sm mt-4" type="submit">Search</button>
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
                        <th>UserName</th>
                        <th>Astrologer Name</th>
                        <th>Appointment Date</th>
                        <th>Status</th>
                        <th>Balance Rs.</th>
                        <th>Conversation Time</th>
                        <th>Rupee Deduction</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($appointments as $i => $appointment)
                    <tr>
                        <td>{{ ++$i }}.</td>
                        <td><a
                                href="{{ url('appointment-detail', $appointment->user_id) }}">
                                {{ ucfirst($appointment->name) }}</a></td>
                        <td>{{ $appointment->getAstrologer->name ?? '-' }} <b>
                                <sapn style="color:red;">({{
                                    $appointment->getAstrologerDetail->rate ?? '0' }}
                                    &#8377;)
                                </sapn>
                            </b></td>
                        <td>{{
                            \Carbon\Carbon::parse($appointment->getChatlogs->date)->format('d
                            M, Y H:i a') }}</td>

                        <td>
                            @if ($appointment->status == 0)
                            <span class="badge bg-warning"><b>Pending</b></span>
                            @elseif($appointment->status == 1)
                            <span class="badge bg-success"><b>Success</b></span>
                            @else
                            <span class="badge bg-danger"><b>Failed</b></span>
                            @endif
                        </td>
                        <td>{{ getBalanceAffterAppointment($appointment->user_id,
                            $appointment->preferred_date) }}</td>
                        @if ($appointment->status == 1)
                        <td>
                            <?php
                                            $minutes = floor($appointment->getChatlogs->duration / 60); // This will give the number of full minutes
                                            $remainingSeconds = $appointment->getChatlogs->duration % 60;
                                            ?>
                            {{ $minutes }} minutes {{ $remainingSeconds ?? 00 }} seconds
                        </td>
                        <td>&#8377; &nbsp;{{ $appointment->getChatlogs->deduct_amount ?? 0
                            }} </td>
                        @else
                        <td>Null</td>
                        <td>Null</td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
        <div class="mt-3" style="float: right;">
            {{ $appointments->links() }}
        </div>



    </div>
@endsection
