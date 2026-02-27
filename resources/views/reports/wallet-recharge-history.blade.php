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
    }

    .tooltip-text {
        visibility: hidden;
        background-color: #333;
        /* Dark background for the tooltip */
        color: #fff;
        /* White text for the tooltip */
        text-align: center;
        padding: 5px 10px;
        border-radius: 6px;

        /* Positioning of the tooltip */
        position: absolute;
        z-index: 1;
        top: 50%;
        left: 110%;
        /* Show it to the right */
        transform: translateY(-50%);
        /* Center it vertically */

        /* Optional: Add some fade-in animation */
        opacity: 0;
        transition: opacity 0.3s;
    }

    /* Show the tooltip when hovering over the link */
    .bonus-link:hover .tooltip-text {
        visibility: visible;
        opacity: 1;
    }
</style>
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link rel="stylesheet" href="{{ url('assets/css/font-awesome.min.css') }}">
<div class="content-wrapper">
    <div class="row">
        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show w-100"
            role="alert">
            <span class="alert-text text-black">{{ $errors->first() }}</span>
            <button type="button" class="close" data-dismiss="alert"
                style="float: right;">&times;</button>
        </div>
        @endif
        @if (session('success'))
        <div class="alert alert-warning alert-dismissible fade show w-100"
            role="alert">
            <span class="alert-text text-black">{{ session('success') }}</span>
            <button type="button" class="close" data-dismiss="alert"
                style="float: right;">&times;</button>
        </div>
        @endif
    </div>

    <div class="card-body" style="background-color: #fff; border-radius:10px;margin-bottom: 11px;">
        <div class="row">
            <div class="col-md-2">
                <h4>All Transaction</h4>
            </div>
            <div class="col-md-3">
                <h4>Total Balance : <b><span class="badge badge-success">{{
                            $total ?? 0.0 }}&nbsp; &#8377;</span></b>
                </h4>
            </div>
            <div class="col-md-3">
                <h4>Total Bonus : <b><span class="badge badge-warning">{{
                            $totalBonus ?? 0.0 }}&nbsp; &#8377;</span></b>
                </h4>
            </div>
            <div class="col-md-4">
                <h4>Available Balance : <b><span class="badge badge-primary">{{
                            $totalAvaBl ?? 0.0 }}&nbsp;
                            &#8377;</span></b>
                </h4>
            </div>
        </div>
    </div>

    <form action="{{ url('allover-transection') }}" method="Post"
        enctype="multipart/form-data">@csrf
        <div class=" ">
            <div class="mb-3 card col-xl-12 d-flex">
                <div class="row ">
                    <div class="mt-4 col-xl-2 ">
                        <label>Name</label>
                        <input type="text" class="form-control"
                            placeholder="Search via name" name="name"
                            value="{{ $name ?? '' }}">
                    </div>
                    <div class="mt-4 col-xl-2 ">
                        <label>Amount</label>
                        <input type="text" class="form-control"
                            placeholder="Search via Amount" name="amount"
                            value="{{ $amount ?? '' }}">
                    </div>
                    <div class="mt-4 col-xl-2 ">
                        <label>Pay ID</label>
                        <input type="text" class="form-control"
                            placeholder="Search via Pay Id" name="pay_id"
                            value="{{ $pay_id ?? '' }}">
                    </div>

                    <div class="mt-4 col-xl-2">
                        <label>From Date</label>
                        <input type="date" name="from_date" id="from_date"
                            class="form-control" placeholder="from date">
                    </div>
                    <div class="mt-4 col-xl-2">
                        <label>To Date</label>
                        <input type="date" name="to_date" id="to_date"
                            class="form-control" placeholder="To Date date">
                    </div>

                    <div class="mt-1 mb-3 col-xl-2">
                        <label>.</label>
                        <div class="card-body">
                            <button class="py-3 btn btn-primary btn-block"
                                type="submit">Search</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div style="overflow:auto;">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>S.No.</th>
                    <th>User Name</th>
                    <th>Total earn</th>
                    <th>GST</th>
                    <th>Package value</th>
                    <th>Order Id</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @if ($rechargeHistory->count() > 0)
                @foreach ($rechargeHistory as $i => $history)
                @if(!empty($history->amount))
                <tr>
                    <td>
                        {{ ++$i }}
                    </td>
                    <td>
                        {{ $history->getUser->name ?? '-' }}
                    </td>
                    <td>
                        ₹ {{ number_format($history->amount) ?? '-' }}
                    </td>
                    <td>
                        @php
                        $gst = ($history->amount * 18) / 100;
                        @endphp
                        ₹ {{ number_format($gst) ?? '-' }}
                    </td>
                    <td>
                        @php
                        $package = $history->amount - $gst;
                        @endphp
                        ₹ {{ number_format($package) ?? '-' }}
                    </td>
                    <td>
                        {{ $history->order_id ?? '-' }}
                    </td>
                    <td>
                        {{ $history->created_at->format('d M, Y') }}
                    </td>
                </tr>
                @endif
                @endforeach
                @else
                No Recharge History Available
                @endif

                @if (!empty($total))
                <tr>
                    <td><b>Total</b></td>
                    <td></td>
                    <td><b>&#8377; &nbsp;{{ $total ?? 0.0 }} </b></td>
                    <td><b>&#8377; &nbsp; {{ $totalBonus ?? 0.0 }} </b></td>
                    <td></td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
    <div class="mt-3" style="float: right;">
        {{ $rechargeHistory->links() }}
    </div>
</div>


<div class="modal" id="appointmentHistory"></div>
<div class="modal" id="addBonus"></div>
<script>
    function appointmentHistory(url, id) {
            $.get(url, id, function(rs) {
                $('#appointmentHistory').html(rs);
                $('#appointmentHistory').modal('show');
            });
        }

        function addBonus(url, id) {
            $.get(url, id, function(rs) {
                $('#addBonus').html(rs);
                $('#addBonus').modal('show');
            });
        }
</script>

@endsection
