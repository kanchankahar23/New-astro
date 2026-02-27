@extends('website.dashboard_master')
@section('title','Dashboard')
@section('content')
<style>
    .d-none {
    display: none !important;
    }
    @media screen and (max-width: 500px) {
    .table-borderless thead tr th {
    font-size: 14px;
    font-weight: 500;
    min-width: 100px !important;
    }
    }
    @media screen and (max-width: 500px) {
    .table-borderless thead tr th:nth-child(1) {
    font-size: 14px;
    font-weight: 500;
    }
    }
</style>

<div class="container-fluid UProfileDetails">
    <div class="row">
        <div class="col-md-12">
            <div class="user-dashboard-info-box">
                <div class="mb-2 section-title-02 d-grid ">
                    <h4 class='BasicName'>Withdraw Amount</h4>
                </div>
                {{--  <div class="cover-photo-contact">
                    <div class="mb-3 upload-file">
                        <label for="formFile" class="form-label"
                            onclick="window.location.href='{{ url('/change-profile-picture') }}'">Upload
                            Profile Photo</label>
                    </div>
                </div>  --}}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="user-dashboard-info-box">

                @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show"
                    role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close"
                        data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @php
                    $isExists = $bankAlreadyExist = \App\Models\AstroBankDetail::where('astrologer_id',
                    Auth::user()->id)->exists();
                @endphp
                @if (!empty($isExists))
                    <div class="row selectBank">
                        <form id="dataForm" class="" action="{{ url('save-withdrow-request') }}"
                            method="POST">
                            @csrf
                            <div class="row">
                                <div class="mb-3 form-group col-md-6">
                                    <label class="form-label">Bank Name</label>
                                    <select name="bank_id" id="" class="form-select" required>
                                        <option value="">Select bank</option>
                                        @foreach ($BankDetails as $BankDetail)
                                        <option value="{{ $BankDetail->id }}">{{
                                            $BankDetail->bank_name }}</option>
                                        @endforeach
                                    </select>

                                </div>
                                @error('bank_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <div class="mb-3 form-group col-md-6">
                                    <label class="form-label">Withdraw Amount</label>
                                    <input type="text" class="form-control datetimepicker-input"
                                        placeholder="Enter Amount" name="withdraw_amount">
                                </div>
                                @error('withdraw_amount')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <div class="mb-3 form-group col-md-6">
                                    <button type="submit" class="btn btn-block"
                                        style="background-color: #ffcd3a;margin-top: 32px;font-size: 0.9rem;font-weight: 500;">Submit
                                    </button>
                                </div>
                                <div class="mb-3 form-group col-md-6">
                                    <button class="btn btn-block"
                                        style="background-color: #3aff75;margin-top: 32px;font-weight: 500;"
                                        id="showFormBtn">Add New Bank Account
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <form action="{{ url('save-withdrow-request') }}" method="POST">
                        @csrf
                        <a href="{{ url('withdraw-money') }}"><i id="arrow"
                                style="font-size: 25px;margin-bottom: 13px;color: #000000;"
                                class="fa-solid fa-arrow-left d-none"></i></a>
                        <br>
                        <div class="row d-none" id="addBank">
                            <div class="mb-3 form-group col-md-6">
                                <label class="form-label">Bank Name</label>
                                <input type="text" class="form-control"
                                    placeholder="Enter Bank Name" name="bank_name" id="name"
                                    required>

                            </div>
                            @error('bank_name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="mb-3 form-group col-md-6">
                                <label class="form-label">Account Number</label>
                                <input type="text" class="form-control"
                                    placeholder="Enter Account Number" name="account_number"
                                    id="name" required>
                            </div>
                            @error('account_number')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="mb-3 form-group col-md-6">
                                <label class="form-label">Account Holder Name</label>
                                <input type="text" placeholder="Enter Account Holder Name"
                                    class="form-control" name="account_holder_name" required>

                            </div>
                            @error('account_holder_name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="mb-3 form-group col-md-6 datetimepickers">
                                <label class="form-label">IFSC Code</label>
                                <div class="input-group date" id="datetimepicker-01"
                                    data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input"
                                        placeholder="Enter IFSC Code"
                                        data-target="#datetimepicker-01" name="ifsc_code" required>

                                </div>
                                @error('ifsc_code')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 form-group col-md-6 datetimepickers">
                                <label class="form-label">UPI ID</label>
                                <div class="input-group date" id="datetimepicker-01"
                                    data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input"
                                        placeholder="UPI ID" value="{{ $userDetails->dob ?? '' }}"
                                        data-target="#datetimepicker-01" name="upi_id">
                                </div>
                            </div>
                            <div class="mb-3 form-group col-md-6 datetimepickers">
                                <label class="form-label">Pan Card Number</label>
                                <div class="input-group date" id="datetimepicker-01"
                                    data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input"
                                        placeholder="Pan Number"
                                        value="{{ $userDetails->dob ?? '' }}"
                                        data-target="#datetimepicker-01" name="pan_number" required>

                                </div>
                                @error('pan_number')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 form-group col-md-6 datetimepickers">
                                <label class="form-label">Addhar Card Number</label>
                                <div class="input-group date" id="datetimepicker-01"
                                    data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input"
                                        placeholder="Addhar Number"
                                        value="{{ $userDetails->dob ?? '' }}"
                                        data-target="#datetimepicker-01" name="adhaar_number"
                                        required>
                                </div>
                                @error('adhaar_number')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 form-group col-md-6 datetimepickers">
                                <label class="form-label">Withdraw Amount</label>
                                <div class="input-group date" id="datetimepicker-01"
                                    data-target-input="nearest">
                                    <input type="number" class="form-control datetimepicker-input"
                                        value="{{ $userDetails->dob ?? '' }}"
                                        data-target="#datetimepicker-01" name="withdraw_amount"
                                        required>
                                </div>
                                @error('withdraw_amount')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- <div class="row">
                                <div class="col-12">
                                    @include('cropper.cropper')
                                </div>
                            </div> --}}
                            <div class="cover-photo-contact">
                                <button type="submit" class="btn btn-block"
                                    style="background-color: #ffcd3a;">Save Details
                                </button>
                            </div>
                        </div>
                    </form>
                @else
                    <form action="{{ url('save-withdrow-request') }}" method="POST">
                        @csrf
                        <div class="row" id="addBank">
                            <div class="mb-3 form-group col-md-6">
                                <label class="form-label">Bank Name</label>
                                <input type="text" class="form-control"
                                    placeholder="Enter Bank Name" name="bank_name" id="name"
                                    required>

                            </div>
                            @error('bank_name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="mb-3 form-group col-md-6">
                                <label class="form-label">Account Number</label>
                                <input type="text" class="form-control"
                                    placeholder="Enter Account Number" name="account_number"
                                    id="name" required>
                            </div>
                            @error('account_number')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="mb-3 form-group col-md-6">
                                <label class="form-label">Account Holder Name</label>
                                <input type="text" placeholder="Enter Account Holder Name"
                                    class="form-control" name="account_holder_name" required>

                            </div>
                            @error('account_holder_name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="mb-3 form-group col-md-6 datetimepickers">
                                <label class="form-label">IFSC Code</label>
                                <div class="input-group date" id="datetimepicker-01"
                                    data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input"
                                        placeholder="Enter IFSC Code"
                                        data-target="#datetimepicker-01" name="ifsc_code" required>

                                </div>
                                @error('ifsc_code')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 form-group col-md-6 datetimepickers">
                                <label class="form-label">UPI ID</label>
                                <div class="input-group date" id="datetimepicker-01"
                                    data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input"
                                        placeholder="UPI ID" value="{{ $userDetails->dob ?? '' }}"
                                        data-target="#datetimepicker-01" name="upi_id">
                                </div>
                            </div>
                            <div class="mb-3 form-group col-md-6 datetimepickers">
                                <label class="form-label">Pan Card Number</label>
                                <div class="input-group date" id="datetimepicker-01"
                                    data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input"
                                        placeholder="Pan Number"
                                        value="{{ $userDetails->dob ?? '' }}"
                                        data-target="#datetimepicker-01" name="pan_number" required>

                                </div>
                                @error('pan_number')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 form-group col-md-6 datetimepickers">
                                <label class="form-label">Addhar Card Number</label>
                                <div class="input-group date" id="datetimepicker-01"
                                    data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input"
                                        placeholder="Addhar Number"
                                        value="{{ $userDetails->dob ?? '' }}"
                                        data-target="#datetimepicker-01" name="adhaar_number"
                                        required>
                                </div>
                                @error('adhaar_number')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 form-group col-md-6 datetimepickers">
                                <label class="form-label">Withdraw Amount</label>
                                <div class="input-group date" id="datetimepicker-01"
                                    data-target-input="nearest">
                                    <input type="number" class="form-control datetimepicker-input"
                                        value="{{ $userDetails->dob ?? '' }}"
                                        data-target="#datetimepicker-01" name="withdraw_amount"
                                        required>
                                </div>
                                @error('withdraw_amount')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- <div class="row">
                                <div class="col-12">
                                    @include('cropper.cropper')
                                </div>
                            </div> --}}
                            <div class="cover-photo-contact">
                                <button type="submit" class="btn btn-block"
                                    style="background-color: #ffcd3a;">Save Details
                                </button>
                            </div>
                        </div>
                    </form>
                @endif

            </div>
        </div>
    </div>

    <div class="card mb-5">
        <div class="mb-0 card">

            <div class="card-body">
                <h5 class="mb-4 card-title">
                   <i class="fa-solid fa-list"></i> Requested Amount List
                </h5>
                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                        aria-label="Close"></button>
                </div>
                @endif
                <div class="row">
                    <div class="px-0 col-lg-12">
                        <div class="table-responsive">

                            @if($withdrawDetails->count()>0)
                            <table class="table display expandable-table dataTable no-footer table-responsive table-striped table-hover" id="request">
                                <thead class="table-light">
                                    <tr>
                                       <th scope="col">Sr. No.
                                        </th>
                                       <th scope="col">Amount
                                        </th>
                                        <th scope="col">Bank name</th>
                                        <th scope="col">Account number</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Remark</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($withdrawDetails as $indax => $withdrawDetail)
                                        <tr>
                                            <td>
                                                {{ $indax+1 }}
                                            </td>
                                            <td>
                                               &#8377; {{ $withdrawDetail->withdraw_amount }}
                                            </td>
                                            <td>
                                                {{ $withdrawDetail->getBankDetails->bank_name }}
                                            </td>
                                            <td>
                                                {{ $withdrawDetail->getBankDetails->account_number }}
                                            </td>
                                            {{--  <td>
                                               &#8377; {{ $withdrawDetail->withdraw_amount }}
                                            </td>  --}}
                                            <td>
                                                @if ($withdrawDetail->status == 0)
                                                    <button class="btn btn-warning">Pending</button>
                                                @elseif($withdrawDetail->status == 1)
                                                    <button class="btn btn-success">Approved</button>
                                                @elseif($withdrawDetail->status == 2)
                                                    <button class="btn btn-danger">Rejected</button>
                                                @endif
                                            </td>
                                            <td>
                                                {{ $withdrawDetail->remark ?? 'NA'}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @else
                            <h6
                                style="border:2px solid #ffcd3a;padding:6px;display: flex;justify-content: center;">
                               No Request Found</h6>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script
    src="https://cdn.jsdelivr.net/jquery.validation/1.19.3/jquery.validate.min.js">
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $("#showFormBtn").click(function () {
            $("#addBank").toggleClass("d-none"); // Toggle bank form visibility
            $("#arrow").toggleClass("d-none"); // Toggle bank form visibility
            $(".selectBank").toggleClass("d-none"); // Hide selectBank when form is shown
        });
    });
</script>
<script>
    $(document).ready(function() {
            $("#dataForm").validate({
                rules: {
                    name: 'required',
                },
                messages: {
                    name: '*Please Enter Name',
                },
                errorPlacement: function(error, element) {
                    error.insertAfter(element); // Display error message after the input field
                },
                submitHandler: function(form) {
                    $("#createUserBtn").prop("disabled", true);
                    form.submit(); // Submit the form if all validation passes
                }
            });
        });
</script>
@endsection
