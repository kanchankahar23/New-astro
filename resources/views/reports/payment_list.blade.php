@extends('master.master') @section('title','Kundli Matching User')
@section('content')
<style>
    .expandable-table tr td {
        text-align: center !important;
    }

    .expandable-table tr td {
        font-size: 0.9rem;
        font-weight: 500;
    }
</style>
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title">Total Payment - {{ $paymentListCount }}</p>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <div id="example_wrapper">
                                    {{-- <form
                                        action="{{ url('enquiry/appointment-list') }}"
                                        method="GET">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-3">
                                                <input type="text"
                                                    class="form-control"
                                                    placeholder="Search via name"
                                                    name="name"
                                                    value="{{ $name ?? '' }}">
                                            </div>
                                            <div class="col-sm-12 col-md-3">
                                                <input type="text"
                                                    class="form-control"
                                                    placeholder="Search via phone"
                                                    name="phone"
                                                    value="{{ $phone ?? '' }}">
                                            </div>
                                            <div class="col-sm-12 col-md-3">
                                                <input type="text"
                                                    class="form-control"
                                                    placeholder="Search via email"
                                                    name="email"
                                                    value="{{ $email ?? '' }}">
                                            </div>
                                            <div class="col-sm-12 col-md-3">
                                                <button
                                                    class="btn btn-primary btn-block"
                                                    type="submit">Search</button>
                                            </div>
                                            <div class="col-sm-12 col-md-6">
                                            </div>
                                        </div>
                                    </form> --}}
                                    <br>
                                    <div class="row">
                                        <div class="col-xl-12">
                                            @if($paymentList->count()>0)
                                            <table id="example1"
                                                class="table display expandable-table dataTable no-footer table-responsive table-striped table-hover"
                                                style="width: 100%;display: inline-table;"
                                                role="grid">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th scope="col">Sr. No.
                                                        </th>
                                                        <th scope="col">Astrologer Name
                                                        </th>
                                                        <th scope="col">Amount</th>
                                                        <th scope="col">Payment Date</th>
                                                        <th scope="col">Invoice</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($paymentList as $indax => $paymentLists)
                                                    <tr>
                                                        <td>
                                                            {{ $indax+1 }}
                                                        </td>
                                                        <td>
                                                            {{ $paymentLists->getAstrologer->name }}
                                                        </td>
                                                        <td>
                                                          &#8377;  {{ $paymentLists->astro_withdraw_amount }}
                                                        </td>
                                                        <td>
                                                            {{\Carbon\Carbon::parse($paymentLists->created_at)->format('m d, Y')}}
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-primary">
                                                                <a style="color: white;" href="{{$paymentLists->payment_invoice}}" target="_blank">View
                                                                    Invoice</a>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            @else
                                            <h6
                                                style="border:2px solid #ffcd3a;padding:6px;display: flex;justify-content: center;">
                                                No Payment Found</h6>
                                            @endif

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-7">
                                            {{ $paymentList->links() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
