@extends('website.dashboard_master')
@section('title','Dashboard')
@section('content')
<div class="container-fluid UProfileDetails">
    <div class="row">
        <div class="col-md-12">
            <div class="user-dashboard-info-box">
                <div class="mb-2 section-title-02 d-grid">
                    <h4 class='BasicName'>Appointment Form</h4>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="user-dashboard-info-box">
                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show"
                    role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close"
                        data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show"
                    role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close"
                        data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <form id="appointmentForm" method="POST">
                    @csrf
                    @method('POST')
                    <div class="userform ">
                        <div class="username row">
                            <div class="fullname makeAppoint col-6">
                                <label>Name</label>
                                <input type="text" placeholder="Name"
                                    name="name" required class="form-control"
                                    value="{{$appointment->name ?? ''}}" />
                            </div>
                            <div class="googleemail makeAppoint col-6">
                                <label>Email</label>
                                <input type="text" placeholder="Email"
                                    name="email" required class="form-control"
                                    value="{{$appointment->email ?? ''}}" />
                            </div>
                        </div>
                        <div class="mt-2 username row">
                            <div class="fullname col-6">
                                <label>Mobile number</label>
                                <input type="number" placeholder="Mobile Number"
                                    name="phone" required class="form-control"
                                    value="{{$appointment->phone ?? ''}}" />
                            </div>
                            <div class="googleemail col-6">
                                <label>Gender</label>
                                <select name="gender" required
                                    class="form-control">
                                    <option value="" disabled selected>
                                        Select</option>
                                    <option value="male" {{ optional($appointment)->gender == 'male' ? 'selected' : ''}}>Male</option>
                                    <option value="female" {{ optional($appointment)->gender == 'female' ? 'selected' : ''}}>Female
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="mt-2 username row">
                            <div class="fullname makeAppoint col-6">
                                <label>Date of Birth & Time </label>
                                <div class="row">
                                    <div
                                        class="col-lg-12 col-md-12 col-sm-12 col-12">
                                        <input type="datetime-local"
                                            placeholder="Date of Birth"
                                            name="dob" id="dob" required
                                            class="form-control" value="{{$appointment->dob ?? ''}}"/>
                                    </div>

                                </div>
                            </div>
                            <div class="fullname makeAppoint col-6">
                                <label>Birth Place</label>
                                <div class="row">
                                    <div
                                        class="col-lg-12 col-md-12 col-sm-12 col-12">
                                        <input type="text" name="place" class="city-input form-control"
                                            placeholder="Enter your birth place" autocomplete="off" required value="{{$appointment->place ?? ''}}">
                                        <input type="hidden" class="lat-input form-control" name="lat">
                                        <input type="hidden" class="lon-input form-control" name="lon">
                                        <div class="suggestions"></div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="mt-2 username row">
                            <div class="fullname makeAppoint col-6">
                                <label>Preferred Date & Time</label>
                                <div class="row">
                                    <div
                                        class="col-lg-12 col-md-12 col-sm-12 col-12">
                                        <input type="datetime-local"
                                            placeholder="Date"
                                            name="preferred_date" id="date"
                                            required class="form-control"
                                            min="{{ date('Y-m-d\TH:i') }}" value="{{$appointment->preferred_date ?? ''}}"/>
                                    </div>

                                </div>
                            </div>
                            <div class="googleemail makeAppoint col-6">
                                <label>Appointment Method</label>
                                <div class="row">
                                    <div
                                        class="col-lg-12 col-md-12 col-sm-12 col-12">
                                        <select name="method" required
                                            class="form-control">
                                            <option value="" disabled selected>
                                                Select</option>
                                            <option value="video" {{ optional($appointment)->way_to_reach == 'video' ? 'selected' : ''}}>Video
                                                Call</option>
                                            <option value="phone" {{ optional($appointment)->way_to_reach == 'phone' ? 'selected' : ''}}>Phone
                                                Call</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-2 col-6 makeAppoint">
                                <label for="floatingTextarea">Duration</label>
                                <select name="duration" id="duration"
                                    class="form-control" required>
                                    <option value="15:00">15:00 Min
                                    </option>
                                    <option value="30:00">30:00 Min
                                    </option>
                                    <option value="45:00">45:00 Min
                                    </option>
                                    <option value="60:00">60:00 Min
                                    </option>
                                </select>

                            </div>
                            <div class="mt-2 col-6 makeAppoint">
                                <label for="floatingTextarea">Reason</label>
                                <input type="text" name="reason"
                                    class="form-control" value="{{$appointment->reason ?? ''}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="cover-photo-contact">
                        <button type="submit" class="btn btn-block"
                            style="background-color: #ffcd3a;" onclick="assignId({{ $astroId }})">Book Appointment
                        </button>
                </form>

            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script
    src="https://cdn.jsdelivr.net/jquery.validation/1.19.3/jquery.validate.min.js">
</script>
<script>
    function assignId(id) {
            var form = document.querySelector('#appointmentForm');
            var url = "{{ url('enquiry/appointment') }}";
            form.action = url + '/' + id;
        }


</script>
@endsection
