@extends('master.master') @section('title','User List') @section('content')
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
                                    id="example_wrapper"

                                >   <form action="{{ url('appointment-search') }}" method="post">@csrf
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
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <table
                                                id="example1"
                                                class="display expandable-table dataTable no-footer table-responsive table-striped table-hover"
                                                style="width: 100%"
                                                role="grid"
                                            >
                                                <thead>
                                                    <tr role="row">
                                                        <th
                                                            class="select-checkbox sorting_disabled"
                                                            rowspan="1"
                                                            colspan="1"
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
                                                            colspan="1"
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
                                                            colspan="1"
                                                            aria-label="Business type: activate to sort column ascending"
                                                            style="
                                                                width: 133px;
                                                            "
                                                        >

                                                        </th>
                                                        <th
                                                            class=""
                                                            tabindex="0"
                                                            aria-controls="example"
                                                            rowspan="1"
                                                            colspan="1"
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
                                                            colspan="1"
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
                                                            colspan="1"
                                                            aria-label="Status: activate to sort column ascending"
                                                            style="
                                                                width: 69px;
                                                            "
                                                        >
                                                           Sub
                                                        </th>
                                                        <th
                                                            class=""
                                                            tabindex="0"
                                                            aria-controls="example"
                                                            rowspan="1"
                                                            colspan="1"
                                                            aria-label="Updated at: activate to sort column ascending"
                                                            style="
                                                                width: 110px;
                                                            "
                                                        >
                                                        Date
                                                        </th>


                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @foreach($users as $key => $user)
                                                    <tr>
                                                      <td class="py-1">
                                                        {{ ++$key }}.
                                                      </td>
                                                      <td class="py-1" colspan="2">
                                                        <div class="d-flex align-items-center">
                                                          <div>
                                                            <img src="{{ url($user['avtar'] ?? 'user_image/69839589_1719390514.png') }}" alt="image" style="width: 40px;
                                                              border-radius: 20px;">
                                                          </div>
                                                          <div class="p-3">
                                                            <h6>{{ ucwords($user['name']?? "") }}</h6>
                                                          </div>
                                                        </div>
                                                      </td>
                                                      <td>
                                                        {{ $user['email']?? "" }}
                                                      </td>
                                                      <td>
                                                        {{ $user['mobile']?? "" }}
                                                      </td>

                                                      <td class="text-center">
                                                        <label class="badge badge-success"> {{ ucwords($user['type'] ?? '-') }}</label>

                                                        </td>
                                                      <td>
                                                        @php
                                                        $date = \Carbon\Carbon::parse($user->created_at)->format('d/m/y');
                                                        @endphp
                                                        {{ $date ?? "" }}
                                                      </td>

                                                    </tr>
                                                    @endforeach
                                                  </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div
                                            class="col-sm-12 col-md-7"
                                        ></div>
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
