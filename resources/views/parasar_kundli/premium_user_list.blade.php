@extends('master.master') @section('title', 'User List') @section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ url('premium-kundli-users') }}" method="GET">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-3">
                                                <input type="text" class="form-control" placeholder="Search via name"
                                                    name="name" value="{{ $name ?? '' }}">
                                            </div>
                                            <div class="col-sm-12 col-md-3">
                                                <input type="text" class="form-control"
                                                    placeholder="Search via phone" name="phone"
                                                    value="{{ $phone ?? '' }}">
                                            </div>


                                            <div class="col-sm-12 col-md-3">
                                                <button class="btn btn-primary btn-block" type="submit">Search</button>
                                            </div>
                                            <div class="col-sm-12 col-md-6"></div>
                                        </div>
                     </form>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title">Premium User List - {{ $premiumUserCount }}</p>
                    <div class="row">
                        <div class="col-12">
                               <div class="table-responsive">
                                <div id="example_wrapper">
                                    <div class="row">
                                        <div class="col-xl-12">

                                                 <table style="display: inline-table;" id="example1"
                                                class="display expandable-table dataTable no-footer table-responsive table-striped table-hover"
                                                 >
                                                <thead>
                                                    <tr>
                                                        <th >
                                                            S.No
                                                        </th>
                                                        <th >
                                                            Name
                                                        </th>
                                                        <th >
                                                            Number
                                                        </th>

                                                        <th  >
                                                            Gender
                                                        </th>
                                                        <th >
                                                            Date Of Birth
                                                        </th>

                                                        <th >
                                                           Time of Birth
                                                        </th>
                                                        <th >
                                                           place
                                                        </th>
                                                        <th >
                                                           Language
                                                        </th>
                                                        <th >
                                                           Payment Amount
                                                        </th>
                                                        <th >
                                                           Payment Status
                                                        </th>
                                                        <th >
                                                           Action
                                                        </th>
                                                </thead>
                                                <tbody>
                                                    @foreach ($premiumUsers as $key => $user)
                                                        <tr>
                                                            <td ><b>{{ ++$key }}.</b></td>

                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <h6>{{ ucwords($user['name'] ?? '-') }}</h6>
                                                                </div>
                                                            </td>

                                                            <td >
                                                                <div class="d-flex align-items-center">
                                                                    <h6>{{ ucwords($user['mobile'] ?? '-') }}</h6>
                                                                </div>
                                                            </td>

                                                            <td >
                                                                <div class="d-flex align-items-center">
                                                                    <h6>{{ ucwords($user['gender'] ?? '-') }}</h6>
                                                                </div>
                                                            </td>

                                                            <td> {{ $user['dob'] ?? '-' }}</td>

                                                            <td> {{ $user['tob'] ?? '-' }}</td>

                                                            <td> {{ $user['place'] ?? '-' }}</td>
                                                            <td> {{ $user['lang'] ?? '-' }}</td>

                                                            <td> {{ $user['payble_amount'] ?? '-' }}</td>
                                                            <td> {{ $user['payment_status'] ?? '-' }}</td>
                                                            <td>
                                                                @if(empty($user->premium_kundli_pdf) && $user['payment_status'] == 'completed')
                                                                    <a href="{{ url('upload-premium-kundli', encrypt($user->id)) }}"
                                                                        class="btn btn-primary">Add Kundli</a>
                                                                @elseif(isset($user->premium_kundli_pdf))
                                                              <a href="{{ $user->premium_kundli_pdf }}" target="_blank" class="btn btn-success " style="margin-top: 5px;">View</a>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-7"></div>
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
