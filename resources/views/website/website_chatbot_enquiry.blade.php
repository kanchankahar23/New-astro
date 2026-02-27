@extends('master.master') @section('title', 'User List') @section('content')
<style>
   .modal .modal-dialog {
  margin-top: 20px;
}
</style>
<div class="content-wrapper">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ url('enquiries', $enquiryType) }}" method="GET">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-4">
                                                <label for="">Name</label>
                                                <input type="text" class="form-control" placeholder="Search via name"
                                                    name="name" value="{{ $name ?? '' }}">
                                            </div>
                                            <div class="col-sm-12 col-md-4">
                                                <label for="">Mobile Number</label>
                                                <input type="text" class="form-control"
                                                    placeholder="Search via phone" name="phone"
                                                    value="{{ $phone ?? '' }}">
                                            </div>
                                            <div class="col-sm-12 col-md-4">
                                                <label for="">Type</label>
                                                <select name="type" id="" class="form-control">
                                                    <option value="">Select Type</option>
                                                    <option {{ $type == 'user' ? 'selected' : '' }} value="user">User</option>
                                                    <option {{ $type == 'astrologer' ? 'selected' : '' }} value="astrologer">Astrologer</option>
                                                </select>

                                            </div>


                                            <div class="col-sm-12 col-md-6"></div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-4">
                                                <label for="">From Date</label>
                                                <input type="date" class="form-control"
                                                    name="from" value="{{ $fromDate ?? '' }}">
                                            </div>
                                            <div class="col-sm-12 col-md-4">
                                                <label for="">To Date</label>
                                                <input type="date" class="form-control"
                                                    name="to" value="{{ $toDate ?? '' }}">
                                            </div>
                                            <div class="col-sm-12 col-md-4">
                                                <label for="">Status</label>
                                                @php
                                                $statuses = \App\Models\EnquiryStatus::get();
                                                @endphp
                                                <select name="status_id" id="" class="form-control">
                                                    <option value="">Select Status</option>
                                                    @foreach ($statuses as $status)
                                                    <option value="{{ $status->id }}" {{ $status->id == $statusId ? 'selected' : '' }}>{{ $status->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-4 mt-2">
                                                <label class="form-label">Remark Date From</label>
                                                <input name="remark_from_date" class="form-control" type="date"
                                                    value="{{ $remark_from_date ?? '-' }}">
                                            </div>
                                            <div class="col-md-4 mt-2">
                                                <label class="form-label">Remark To Date</label>
                                                <input name="remark_to_date" class="form-control" type="date"
                                                    value="{{ $remark_to_date ?? '-' }}">
                                            </div>
                                            <div class="col-md-4 mt-2">
                                                <label class="form-label">Lead Source</label>
                                                <select name="lead_source" id="" class="form-control">
                                                    <option value="">Select Lead Source</option>
                                                    <option value="Facebook" {{ $leadSource == 'Facebook' ? 'selected' : '' }}>Facebook</option>
                                                    <option value="Franchise" {{ $leadSource == 'Franchise' ? 'selected' : '' }}>Franchise</option>
                                                  
                                                </select>
                                            </div>
                                            <div class="col-md-4 mt-2">
                                                <label class="form-label">Select Country</label>
                                                <select name="country" id="" class="form-control">
                                                    <option value="">Select Lead Source</option>
                                                    <option value="india" {{ $country == 'india' ? 'selected' : '' }}>India</option>
                                                    <option value="other" {{ $country == 'other' ? 'selected' : '' }}>Other Countries</option>
                                                  
                                                </select>
                                            </div>
                                            <div class="col-sm-12 col-md-4 mt-2">
                                                <button class="btn btn-primary btn-block" style="margin-top: 30px;" type="submit">Search</button>
                                            </div>
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
                    <div style="display: flex;justify-content: space-between;">
                        <p class="card-title">Users List - {{ $enquiryCount }}</p>
                        <a style="font-size: 0.7rem;font-weight: 500;height: 37px;" href="{{ url('enquiry/enquiry-form') }}"
                        class="btn btn-primary">Add New</a>
                    </div>
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
                                                            User Type
                                                        </th>

                                                        <th >
                                                            Name
                                                        </th>
                                                        <th>
                                                            Created At
                                                        </th>
                                                        <th >
                                                            Email
                                                        </th>

                                                        <th >
                                                            Number
                                                        </th>

                                                        <th  >
                                                            Gender
                                                        </th>

                                                        <th >
                                                            Service select
                                                        </th>

                                                        <th >
                                                           Status
                                                        </th>
                                                        <th >
                                                           Message
                                                        </th>
                                                       
                                                        <th>
                                                            Change Status
                                                        </th>
                                                        <th>
                                                            Lead Source
                                                        </th>
                                                        <th >
                                                          Action
                                                        </th>
                                                </thead>
                                                <tbody>
                                                    @foreach ($enquiries as $key => $user)
                                                        <tr>
                                                            <td ><b>{{ ++$key }}.</b></td>

                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <h6>{{ ucwords($user['type'] ?? '-') }}</h6>
                                                                </div>
                                                            </td>
                                                            <td >
                                                                <div class="d-flex align-items-center">
                                                                    <h6>{{ ucwords($user['name'] ?? '-') }}</h6>
                                                                </div>
                                                            </td>
                                                            <td> {{ ($user['created_at']) ?
                                                                Carbon\Carbon::parse($user['created_at'])->format('M d, Y') : '' }}</td>
                                                           
                                                            <td >
                                                               <h6>{{ ucwords($user['email'] ?? '-') }}</h6>
                                                            </td>
                                                            <td> {{ $user['mobile'] ?? '-' }}</td>

                                                            <td> {{ $user['gender'] ?? '-' }}</td>

                                                            <td> {{ $user['service_selected'] ?? '-' }}</td>

                                                            <td> {{  $user->getStatus?->name }}</td>
                                                           @php
                                                        $remark = $user['message'] ?? $user->getRemark?->remark;
                                                        @endphp
                                                        
                                                        <td>
                                                            @if($remark)
                                                            <span data-bs-toggle="tooltip" data-bs-placement="top"
                                                                title="{{ e($remark) }}">
                                                                {{ \Illuminate\Support\Str::limit($remark, 40) }}
                                                            </span>
                                                            @else
                                                            —
                                                            @endif
                                                        </td>
                                                    <td>
                                                               <select style="color: #403d3d;font-size: 14px; text-align:center;width:auto;"
                                                                class="form-control status-dropdown" data-enquiry-id="{{ $user->id }}">
                                                                <option value="">Change Status</option>
                                                                @foreach ($statuses as $status)
                                                                <option value="{{ $status->id }}" {{ $status->id == $user->status_id ? 'selected' :
                                                                    '' }}>
                                                                    {{ $status->name }}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                            </td>
                                                            <td> {{ $user['lead_source'] ?? '-' }}</td>
                                                            <td> <a href="javascript:void(0);"
                                                                onclick="Remark('{{ url('sms-remark') }}', '{{ $user->id }}')"
                                                                class="btn btn-primary btn-sm">Remarks</a></td>

                                                            {{--  <td> {{ $user['updated_at'] ?? '-' }}</td>  --}}
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                          {{ $enquiries->appends(request()->query())->links() }}
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
        <div class="modal" id="myModal"></div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function Remark(url, candidateId) {
    $.get(url + '?id=' + candidateId, function(response) {
    $('#myModal').html(response);
    $('#myModal').modal('show');
    setTimeout(function() {
    $('#candidate_id').val(candidateId);
    scrollBottom();
    }, 100); 
    });
    }
    function scrollBottom() {
    const container = $('#response');
    if (container.length) {
    container.scrollTop(container[0].scrollHeight);
    }
    }

       $(document).ready(function() {
    $('.status-dropdown').on('change', function() {
    var enquiryId = $(this).data('enquiry-id');
    var newStatus = $(this).val();
        $.ajax({
        url: "{{ route('change-status') }}",
        method: 'POST',
        data: {
        enquiryId: enquiryId,
        newStatus: newStatus,
        _token: '{{ csrf_token() }}'
        },
        success: function(response) {
        if (response.success) {
        var label = $('.statusLabel[data-enq-id="' + response.enquiryId + '"]');
        label.html(getStatusHTML(response.newStatus));
        } else {
        alert("Failed to update status.");
        }
        },
        error: function(xhr) {
        console.log('Error updating status', xhr.responseText);
        }
        });
        });
        });
</script>
<script>
    document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach(el => {
        new bootstrap.Tooltip(el)
    })
</script>

@endsection
