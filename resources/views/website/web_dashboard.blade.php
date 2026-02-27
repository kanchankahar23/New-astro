
@extends('website.dashboard_master')
@section('title','Dashboard')
@section('content')
<div class="container-fluid UProfileDetails">
    <div class="row">
        <div class="col-md-12">
            <div class="user-dashboard-info-box">
                <div class="mb-2 section-title-02 d-grid">
                    <h4 class='BasicName'>Basic Information</h4>
                </div>
                <div class="cover-photo-contact">
                    <div class="mb-3 upload-file">
                            <label for="formFile" class="form-label" onclick="window.location.href='{{ url('/change-profile-picture') }}'">Upload Profile Photo</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="user-dashboard-info-box">
                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
                <form id="dataForm" class="" action="{{ url('save-user-details',$user->id) }}" method="POST">@csrf
                    <div class="row">
                        <div class="mb-3 form-group col-md-6">
                            <label class="form-label">Your Name</label>
                            <input type="text" class="form-control" value="{{ucwords($user->name ?? '')}}" name="name" id="name" required>
                        </div>
                        <div class="mb-3 form-group col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email" placeholder="example@gmail.com" class="form-control" value="{{$user->email ?? ''}}" name="email" required>
                        </div>
                        <div class="mb-3 form-group col-md-6 datetimepickers">
                            <label class="form-label">Date of birth</label>
                            <div class="input-group date" id="datetimepicker-01" data-target-input="nearest">
                                <input type="date" class="form-control datetimepicker-input" value="{{ $userDetails->dob ?? '' }}"
                                    data-target="#datetimepicker-01" name="dob" required>
                            </div>
                        </div>
                        <div class="mb-3 form-group col-md-6">
                            <label class="form-label">Phone</label>
                            <input type="text" class="form-control" value="{{$user->mobile ?? ''}}" name="mobile" required>
                        </div>
                        <div class="mb-3 form-group col-md-6">
                            <label class="form-label">Time of Birth</label>
                            <input type="time" class="form-control" value="{{ $userDetails->tob ?? '' }}" name="tob" required>
                        </div>
                        <div class="mb-3 form-group col-md-6">
                            <label class="mb-3 form-label d-block">Gender</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender"
                                    value="male"
                                    id="customRadio1" {{Auth::user()->gender == 'male' ? 'checked':''}} >
                                <label class="form-check-label" for="customRadio1">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender"
                                    id="customRadio2" value="female" {{Auth::user()->gender == 'female' ? 'checked':''}}>
                                <label class="form-check-label" for="customRadio2">Female</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender"
                                    id="customRadio2" value="other" {{Auth::user()->gender == 'other' ? 'checked':''}}>
                                <label class="form-check-label" for="customRadio2">Other</label>
                            </div>
                        </div>
                        <div class="mb-3 form-group col-md-6 select-border">
                            <label class="form-label">Place of Birth :</label>
                            <input type="text" class="form-control" value="{{ $userDetails->pob ?? '' }}" name="pob" required>
                        </div>
                        <div class="mb-3 form-group col-md-6">
                            <label class="form-label">Rashi :</label>
                            <select name="rashi" id="rashi" class="form-control">
                                @foreach ($rashis as $rashi)
                                <option value="{{ $rashi->id }}" >{{ ucfirst($rashi->name) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-12 form-group col-md-12">
                            <label class="form-label">About</label>
                            <textarea type="text" class="form-control" value="" name="about" required>{{ $userDetails->about ?? '' }}</textarea>
                        </div>
                        <div class="cover-photo-contact">
                            <button type="submit" class="btn btn-block" style="background-color: #ffcd3a;">Save Details


                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.19.3/jquery.validate.min.js"></script>
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

