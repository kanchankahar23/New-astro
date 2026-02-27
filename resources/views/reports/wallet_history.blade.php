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
                    <p class="card-title">Total Wallet Amount - {{
                        $totalWalletAmount }}</p>
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
                                            <table id="example1"
                                                class="table display expandable-table dataTable no-footer table-responsive table-striped table-hover"
                                                style="width: 100%;display: inline-table;"
                                                role="grid">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            Sr. No.
                                                        </th>
                                                        <th>
                                                            Astrologer Name
                                                        </th>
                                                        <th>
                                                            Astrologer Percent
                                                        </th>
                                                        <th>
                                                            Astrologer Price Per Minuts
                                                        </th>
                                                        <th>
                                                            User Name
                                                        </th>
                                                        <th>
                                                            Total amount
                                                        </th>
                                                        <th>
                                                            Amount Credited
                                                        </th>
                                                        <th>
                                                            Source
                                                        </th>
                                                        <th>
                                                            Credit Date
                                                        </th>
                                                    </tr>

                                                </thead>

                                                <tbody>
                                                    @if($walletHistory->count() > 0 )
                                                        @foreach($walletHistory
                                                        as $key =>
                                                        $wallet)
                                                        <tr>
                                                            <td class="py-1">
                                                                {{ ++$key }}.
                                                            </td>
                                                            <td class="py-1">
                                                                {{
                                                                ucwords($wallet->getAstrologer->name??
                                                                "") }}
                                                            </td>
                                                            <td class="py-1">
                                                                {{
                                                                $wallet->getAstrologerDetails->agreement_percent  ??
                                                                "" }} %
                                                            </td>
                                                            <td class="py-1">
                                                              &#8377;  {{ $wallet->getAstrologerDetails->charge_per_min ?? ''}}
                                                            </td>
                                                            <td class="">{{
                                                                $wallet->getUser->name
                                                                ?? "" }}
                                                            </td>
                                                            <td class="">&#8377;
                                                                {{
                                                                $wallet->total_amount
                                                                ?? "" }}
                                                            </td>
                                                            <td class="">&#8377;
                                                                {{
                                                                $wallet->admin_amount
                                                                ?? "" }}
                                                            </td>
                                                            <td class="">{{
                                                                $wallet->source
                                                                ?? "" }}
                                                            </td>
                                                            <td>
                                                                {{\Carbon\Carbon::parse($wallet->created_at)->format('M d, Y') }}
                                                            </td>

                                                        </tr>
                                                        @endforeach
                                                    @else
                                                        <h1>No History Available</h1>
                                                    @endif

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-7">
                                            {{ $walletHistory->links() }}
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
