@extends('master.master') @section('title','Kundli User')
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
                    <p class="card-title">Website Kundli Users - {{ $kundliUserCount }}</p>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <div id="example_wrapper">
                                    {{--  <form
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
                                    </form>  --}}
                                    <br>
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <table id="example1"
                                                class="table display expandable-table dataTable no-footer table-responsive table-striped table-hover"
                                                style="width: 100%;display: inline-table;" role="grid">
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
                                                        <th class="select-checkbox sorting_disabled"
                                                            rowspan="1"
                                                            colspan="1"
                                                            aria-label="Quote#"
                                                            style="
                                                                width: 71px;
                                                            ">
                                                           Registered User Name
                                                        </th>
                                                        <th class="select-checkbox sorting_disabled"
                                                            rowspan="1"
                                                            colspan="1"
                                                            aria-label="Quote#"
                                                            style="
                                                                width: 71px;
                                                            ">
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
                                                            Name
                                                        </th>
                                                        <th class="" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                                                            aria-label="Status: activate to sort column ascending" style="width: 69px;">  Gender </th>

                                                        <th class=""
                                                            tabindex="0"
                                                            aria-controls="example"
                                                            rowspan="1"
                                                            colspan="1"
                                                            aria-label="Business type: activate to sort column ascending"
                                                            style="
                                                                width: 133px;
                                                            ">
                                                          Date of Birth
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
                                                            Time of Birth
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
                                                            Place
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
                                                            Language
                                                        </th>
                                                        <th>
                                                            Created At
                                                        </th>


                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @foreach($kundliUsers as $key => $kundliUser)
                                                    <tr>
                                                        <td class="py-1">
                                                            {{ ++$key }}.
                                                        </td>
                                                        <td class="py-1">
                                                           {{
                                                        ucwords($kundliUser->getUser->name??
                                                        "") }}
                                                        </td>
                                                        <td class="py-1">
                                                           {{ $kundliUser->getUser->mobile??
                                                        "" }}
                                                        </td>
                                                        <td class="py-1">
                                                            {{
                                                            ucwords($kundliUser->name??
                                                            "") }}
                                                        </td>
                                                        <td class=""><label class="text-white badge badge-primary">
                                                                {{ $kundliUser->gender ?? "" }}</label></td>
                                                        <td> {{ optional(\Carbon\Carbon::createFromFormat('d/m/Y',
                                                            $kundliUser->dob))->format('M d, Y') }}</td>
                                                        <td> {{ optional(\Carbon\Carbon::createFromFormat('H:i',
                                                            $kundliUser->tob))->format('h:i A') }}</td>
                                                        <td>

                                                            {{ $kundliUser->place ?? "" }}
                                                        </td>
                                                        <td class="">
                                                            @if($kundliUser->language == 'hi')
                                                            Hindi
                                                            @elseif($kundliUser->language == 'fr')
                                                            French
                                                            @elseif($kundliUser->language == 'ml')
                                                            Malayalam
                                                            @elseif($kundliUser->language == 'ta')
                                                            Tamil
                                                            @elseif($kundliUser->language == 'ka')
                                                            Kannada
                                                            @elseif($kundliUser->language == 'te')
                                                            Telegu
                                                            @elseif($kundliUser->language == 'sp')
                                                            Spanish
                                                            @else
                                                            English
                                                            @endif

                                                            </td>

                                                            <td>
                                                            
                                                                {{ $kundliUser->created_at ?
                                                                Carbon\Carbon::parse($kundliUser->created_at)->format('d M Y, h:i') : '' }}
                                                            </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-7">
                                            {{ $kundliUsers->links() }}
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
