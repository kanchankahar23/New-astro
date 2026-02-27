@extends('master.master') @section('title', 'Enquiry Form') @section('content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            {{ session('success') }}
                        </div>
                    @endif

                    <h4 class="card-title">Enquiry Excel Import</h4>
                    <form action="{{ url('enquiry/import-enquiry') }}" enctype="multipart/form-data" method="POST">
                        @method('POST')
                        @csrf
                        <div class="form-group d-flex">
                            <input type="file" name="excel" class="file-upload-default" id="excel"
                                onchange="updateFileName(this)">
                            <div class="input-group col-xl-3 ">
                                <a href="{{ url('assets/Enquiry_sheet.xlsx') }}" download
                                    style="text-decoration: none;">
                                    <button class="m-auto file-upload-browse btn btn-success btn-block"
                                        type="button">Download Sheet</button>
                                </a>
                            </div>

                            <div class="input-group col-xl-7">
                                <input type="text" class="form-control file-upload-info" disabled
                                    placeholder="Upload Excel Sheet" id="fileName">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button"
                                        onclick="handleClick()">Upload</button>
                                </span>
                            </div>
                            <div class="input-group col-xl-2">
                                <button class="m-auto file-upload-browse btn btn-info btn-block"
                                    type="submit">Submit</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="mt-4 card">
            <div class="card-body">
                <h4 class="card-title">Enquiry Form</h4>
                <form id="enq_form" class="form-sample" action="{{ url('enquiry/enquiry-save') }}" method="post">
                    @csrf
                    @method('POST')
                    @if ($errors->any())
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Enquiry Type</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="enquiry_type" id="enquiry_type">
                                            <option value="">Select Type</option>
                                            <option value="user">User</option>
                                            <option value="astrologer">Astrologer</option>
                                        </select>
                                    </div>
                                </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label"> Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="name" id="name">
                                        </div>
                                    </div>  </div>
                        </div>
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="email" id="email">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Mobile</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" name="mobile" id="mobile">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Gender</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="gender" id="gender">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Status</label>
                                <div class="col-sm-9">
                                    @php
                                        $statuss = \App\Models\EnquiryStatus::get();
                                    @endphp
                                    <select class="form-control" name="status_id" id="status_id">
                                        <option>Select Status</option>
                                        @foreach ($statuss as $status)
                                            <option value="{{ $status->id }}">{{ $status->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Feedback</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="remark" >
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row education-expertise">
                        <div class="col-md-6 ">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Education</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="education"
                                        id="education">
                                </div>
                            </div>
                        </div>
                        {{--  <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Specialization</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="specialization[]"
                                        id="specialization" multiple required></select>
                                </div>
                            </div>
                        </div>  --}}
                        <div class="col-md-6 ">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Expertise</label>
                                <div class="col-sm-9">
                                    <select name="expertise[]" id="expertise" multiple class="form-control" ></select>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>

            @include('cropper.cropper')
            <div class="row">
                <div class="col-12">
                    <button class="btn btn-primary btn-block" type="submit" id="buttonId">Submit</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
<script>
    function handleClick() {
        document.querySelector('#excel').click();
    }

    function updateFileName(input) {
        var fileNameElement = document.getElementById('fileName');
        if (input.files.length > 0) {
            fileNameElement.value = input.files[0].name;
        } else {
            fileNameElement.value = ''; // Clear the value if no file is selected
        }
    }


</script>
<script src="{{ url('assets/js/query.js') }}"></script>
<script src="{{ url('assets/js/jquery.validate.min.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        function toggleFields() {
            var enquiryType = $('#enquiry_type').val();
            if (enquiryType === 'user') {
                $('.education-expertise').hide();
            } else {
                $('.education-expertise').show();
            }
        }

        // Run on page load
        toggleFields();

        // Run when selection changes
        $('#enquiry_type').on('change', function() {
            toggleFields();
        });
    });
</script>

<script>
    $(document).ready(function($) {
        $("#enq_form").validate({
            rules: {
                name: 'required',
                email: 'required',
                mobile: 'required',
                gender: 'required',
            },
            messages: {
                name: '*Please Enter Name',
                email: '*Please Enter Email',
                mobile: '*Please Enter Mobile',
                gender: '*Please Select Gender',
            },
            errorPlacement: function(error, element) {
                error.insertAfter(element);
            },
            submitHandler: function(form) {
                $("#buttonId").prop("disabled", true);
                form.submit();
            }
        });
    });

    $("#expertise").select2({
            tags: true,
            tokenSeparators: [',', ' ']
        })

    $("#specialization").select2({
        tags: true,
        tokenSeparators: [',', ' ']
    })
</script>

@endsection
