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
                    <p class="card-title">Website Kundli Matching Users - {{
                        $kundliMatchingUserCount }}</p>
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
                                                    <tr role="row">
                                                        <th class="select-checkbox sorting_disabled"
                                                            rowspan="1"
                                                            colspan="1"
                                                            aria-label="Quote#"
                                                            style="
                                                                width: 71px;
                                                            ">
                                                            S.No
                                                        </th>
                                                        <th class="select-checkbox sorting_disabled" rowspan="1" colspan="1"
                                                            aria-label="Quote#" style="width: 71px;">
                                                            Registered User Name
                                                        </th>
                                                        <th class="select-checkbox sorting_disabled" rowspan="1" colspan="1"
                                                            aria-label="Quote#" style=" width: 71px;">
                                                            Registered User Mobile
                                                        </th>
                                                        <th class=""
                                                            tabindex="0"
                                                            aria-controls="example"
                                                            rowspan="1"
                                                            colspan="1"
                                                            aria-sort="ascending"
                                                            aria-label="Product: activate to sort column descending"
                                                            style="
                                                                width: 81px;
                                                            ">
                                                           Male Name
                                                        </th>
                                                        <th class=""
                                                            tabindex="0"
                                                            aria-controls="example"
                                                            rowspan="1"
                                                            colspan="1"
                                                            aria-label="Status: activate to sort column ascending"
                                                            style="width: 69px;">
                                                            Female Name </th>

                                                        <th class=""
                                                            tabindex="0"
                                                            aria-controls="example"
                                                            rowspan="1"
                                                            colspan="1"
                                                            aria-label="Business type: activate to sort column ascending"
                                                            style="
                                                                width: 133px;
                                                            ">
                                                           Male Date of Birth & Time
                                                        </th>
                                                        <th class=""
                                                            tabindex="0"
                                                            aria-controls="example"
                                                            rowspan="1"
                                                            colspan="1"
                                                            aria-label="Policy holder: activate to sort column ascending"
                                                            style="
                                                                width: 126px;
                                                            ">
                                                           Female Date of Birth & Time
                                                        </th>


                                                        <th class=""
                                                            tabindex="0"
                                                            aria-controls="example"
                                                            rowspan="1"
                                                            colspan="1"
                                                            aria-label="Updated at: activate to sort column ascending"
                                                            style="
                                                                width: 110px;
                                                            ">
                                                           Male Place
                                                        </th>
                                                        <th class=""
                                                            tabindex="0"
                                                            aria-controls="example"
                                                            rowspan="1"
                                                            colspan="1"
                                                            aria-label="Status: activate to sort column ascending"
                                                            style="
                                                            width: 69px;
                                                        ">
                                                           Female Place
                                                        </th>
                                                        <th class=""
                                                            tabindex="0"
                                                            aria-controls="example"
                                                            rowspan="1"
                                                            colspan="1"
                                                            aria-label="Status: activate to sort column ascending"
                                                            style="
                                                            width: 69px;
                                                        ">
                                                        Kundli Matching Language
                                                        </th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @foreach($kundliMatchingUsers as $key => $kundliMatchingUser)
                                                    <tr>
                                                        <td class="py-1">
                                                            {{ ++$key }}.
                                                        </td>
                                                        <td class="py-1">
                                                            {{
                                                            ucwords($kundliMatchingUser->getUser->name??
                                                            "") }}
                                                        </td>
                                                        <td class="py-1">
                                                            {{ $kundliMatchingUser->getUser->mobile??
                                                            "" }}
                                                        </td>
                                                        <td class="py-1">
                                                            {{
                                                            ucwords($kundliMatchingUser->male_name??
                                                            "") }}
                                                        </td>
                                                        <td class="">{{
                                                        $kundliMatchingUser->female_name
                                                        ?? "" }}
                                                        </td>
                                                      <td>
                                                        {{ optional(\Carbon\Carbon::createFromFormat('d/m/Y',
                                                        $kundliMatchingUser->male_dob))->format('M d, Y') }}
                                                        {{ optional(\Carbon\Carbon::createFromFormat('H:i',
                                                        $kundliMatchingUser->male_tob))->format('h:i A') }}
                                                    </td>
                                                    <td>
                                                        {{ optional(\Carbon\Carbon::createFromFormat('d/m/Y',
                                                        $kundliMatchingUser->female_dob))->format('M d, Y') }}
                                                        {{ optional(\Carbon\Carbon::createFromFormat('H:i',
                                                        $kundliMatchingUser->female_tob))->format('h:i A') }}
                                                    </td>

                                                        <td>
                                                            {{
                                                            $kundliMatchingUser->male_place
                                                            ?? "" }}
                                                        </td>
                                                        <td class="">{{
                                                        $kundliMatchingUser->female_place
                                                        ?? "" }}
                                                        </td>
                                                        <td class="">
                                                            @if($kundliMatchingUser->language == 'hi')
                                                            Hindi
                                                            @elseif($kundliMatchingUser->language == 'fr')
                                                            French
                                                            @elseif($kundliMatchingUser->language == 'ml')
                                                            Malayalam
                                                            @elseif($kundliMatchingUser->language == 'ta')
                                                            Tamil
                                                            @elseif($kundliMatchingUser->language == 'ka')
                                                            Kannada
                                                            @elseif($kundliMatchingUser->language == 'te')
                                                            Telegu
                                                            @elseif($kundliMatchingUser->language == 'sp')
                                                            Spanish
                                                            @else
                                                            English
                                                            @endif
                                                        </td>


                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-7">
                                            {{ $kundliMatchingUsers->links() }}
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
