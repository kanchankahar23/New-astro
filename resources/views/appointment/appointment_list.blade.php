@extends('master.master') @section('title','Appointment List') @section('content')
<style>
    .expandable-table tr td {
        text-align: center !important;
    }
    .expandable-table tr th {
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
                    <p class="card-title">Appointment List</p>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <div
                                    id="example_wrapper">
                                    <form action="{{ url('enquiry/appointment-list') }}" method="GET">
                                        <div class="row">
                                            <div
                                                class="col-sm-12 col-md-3"
                                            >
                                            <input type="text" class="form-control" placeholder="Search via name" name="name" value="{{ $name ?? '' }}">
                                        </div>
                                        <div
                                                class="col-sm-12 col-md-3"
                                            >
                                            <input type="text" class="form-control" placeholder="Search via phone" name="phone" value="{{ $phone ?? '' }}">
                                        </div>
                                        <div
                                                class="col-sm-12 col-md-3"
                                            >
                                            <input type="text" class="form-control" placeholder="Search via email" name="email"  value="{{ $email ?? '' }}">
                                        </div>
                                        <div
                                                class="col-sm-12 col-md-3"
                                            >
                                            <button class="btn btn-primary btn-block" type="submit">Search</button>
                                        </div>
                                            <div
                                                class="col-sm-12 col-md-6"
                                            ></div>
                                        </div>
                                    </form>
                                    <br>
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <table
                                                id="example1"
                                                class="table display expandable-table dataTable no-footer table-responsive table-striped table-hover"
                                                style="width: 100%"
                                                role="grid"
                                            >
                                                <thead>
                                                    <tr role="row">
                                                        <th
                                                            class="select-checkbox sorting_disabled"
                                                            rowspan="1"

                                                            aria-label="Quote#"
                                                            style="
                                                                width: 71px;
                                                            "
                                                        >
                                                            S.No
                                                        </th>
                                                        <th
                                                            class=""
                                                            tabindex="0"
                                                            aria-controls="example"
                                                            rowspan="1"

                                                            aria-sort="ascending"
                                                            aria-label="Product: activate to sort column descending"
                                                            style="
                                                                width: 81px;
                                                            "
                                                        >
                                                            Name
                                                        </th>

                                                        <th
                                                            class=""
                                                            tabindex="0"
                                                            aria-controls="example"
                                                            rowspan="1"

                                                            aria-label="Business type: activate to sort column ascending"
                                                            style="
                                                                width: 133px;
                                                            "
                                                        >
                                                            Email
                                                        </th>
                                                        <th
                                                            class=""
                                                            tabindex="0"
                                                            aria-controls="example"
                                                            rowspan="1"

                                                            aria-label="Policy holder: activate to sort column ascending"
                                                            style="
                                                                width: 126px;
                                                            "
                                                        >
                                                            Mobile
                                                        </th>


                                                        <th
                                                            class=""
                                                            tabindex="0"
                                                            aria-controls="example"
                                                            rowspan="1"

                                                            aria-label="Updated at: activate to sort column ascending"
                                                            style="
                                                                width: 110px;
                                                            "
                                                        >
                                                        Date
                                                        </th>
                                                        <th
                                                        class=""
                                                        tabindex="0"
                                                        aria-controls="example"
                                                        rowspan="1"

                                                        aria-label="Status: activate to sort column ascending"
                                                        style="
                                                            width: 69px;
                                                        "
                                                    >
                                                        Time
                                                    </th>
                                                    <th
                                                        class=""
                                                        tabindex="0"
                                                        aria-controls="example"
                                                        rowspan="1"

                                                        aria-label="Status: activate to sort column ascending"
                                                        style="
                                                            width: 69px;
                                                        "
                                                    >
                                                        Time_of_Day
                                                    </th>

                                                    <th
                                                        class=""
                                                        rowspan="1"

                                                        aria-label=""
                                                        style="
                                                            width: 7px;
                                                        "
                                                    >Action</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @foreach($appointments as $key => $user)
                                                    <tr>
                                                      <td class="py-1">
                                                        {{ ++$key }}.
                                                      </td>
                                                      <td class="py-1" >
                                                        <div class="d-flex align-items-center">
                                                            <div>
                                                                <img src="{{ url($user['icon']) }}" alt="image" style="width: 40px;
                                                                  border-radius: 20px;">
                                                              </div>
                                                          <div class="p-3">
                                                            <h6>{{ ucwords($user['name']?? "") }}</h6>
                                                          </div>
                                                        </div>
                                                      </td>
                                                      <td>{{ $user['email']?? "" }}</td>
                                                      <td>{{ $user['phone']?? "" }}</td>
                                                      <td>
                                                        @php
                                                        $date = \Carbon\Carbon::parse($user->preferred_date)->format('d/m/y');
                                                        @endphp
                                                        {{ $date ?? "" }}
                                                      </td>
                                                      <td class=""><label class="badge badge-success"> {{ ucwords($user['preferred_time'] ?? '--/--') }}</label></td>
                                                        {{--  <td class=""><label class="text-white badge badge-primary"> {{ ucwords($user['time_of_day'] ?? '') }}</label></td>  --}}
                                                       <td><i class="mdi mdi-eye"  onclick="openSidebar()"style="cursor: pointer;"></i>
                                                        <a href="{{ url('enquiry/delete-appointment',$user->id) }}">
                                                        <i class="mdi mdi-delete" style="cursor: pointer;"></i>
                                                        </a>
                                                       </td>
                                                    </tr>
                                                    @endforeach
                                                  </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-7">
                                        {{ $appointments->links() }}
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
