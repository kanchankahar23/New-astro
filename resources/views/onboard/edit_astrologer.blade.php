@extends('master.master') @section('title', 'Enquiry Form') @section('content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show"
                        role="alert">
                        <button type="button" class="close" data-dismiss="alert"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{ session('success') }}
                    </div>
                    @endif

                    <h4 class="card-title">Enquiry Excel Import</h4>
                    <form action="{{ url('enquiry/import-enquiry') }}"
                        enctype="multipart/form-data" method="POST">
                        @method('POST')
                        @csrf
                        <div class="form-group d-flex">
                            <input type="file" name="excel"
                                class="file-upload-default" id="excel"
                                onchange="updateFileName(this)">
                            <div class="input-group col-xl-3 ">
                                <a href="{{ url('assets/Enquiry_sheet.xlsx') }}"
                                    download style="text-decoration: none;">
                                    <button
                                        class="m-auto file-upload-browse btn btn-success btn-block"
                                        type="button">Download Sheet</button>
                                </a>
                            </div>

                            <div class="input-group col-xl-7">
                                <input type="text"
                                    class="form-control file-upload-info"
                                    disabled placeholder="Upload Excel Sheet"
                                    id="fileName">
                                <span class="input-group-append">
                                    <button
                                        class="file-upload-browse btn btn-primary"
                                        type="button"
                                        onclick="handleClick()">Upload</button>
                                </span>
                            </div>
                            <div class="input-group col-xl-2">
                                <button
                                    class="m-auto file-upload-browse btn btn-info btn-block"
                                    type="submit">Submit</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="mt-4 card">
            <div class="card-body">
                <h4 class="card-title">Astrologer Enquiry</h4>
            </div>
            <form id="onboard" action="{{ url('onboard-edit-store', $enquiry->id) }}"
                enctype="multipart/form-data" method="post" id="onboard">
                @csrf
                <!-- Modal Body -->
                <div class="modal-body">
                    <div class="row formfile">
                        <div class="col-md-5">
                            <label for="name">Name</label>
                            <input name="name" class="form-control" type="text"
                                value="{{ $enquiry->name }}" id="name" required>
                        </div>
                        <div class="col-md-5">
                            <label for="email">Email</label>
                            <input name="email" class="form-control" type="email"
                                value="{{ $enquiry->email }}" id="email" required readonly>
                        </div>
                    </div>

                    <div class="row formfile">
                        <div class="col-md-5">
                            <label for="mobile">Mobile</label>
                            <input name="mobile" class="form-control" type="number"
                                value="{{ $enquiry->mobile }}" id="mobile" required>
                        </div>
                        <div class="col-md-5">
                            <label for="gender">Gender</label>
                            <select name="gender" class="form-control" id="gender" required>
                                <option value="male" {{ $enquiry->gender == 'male' ?
                                    'selected' : '' }}>Male</option>
                                <option value="female" {{ $enquiry->gender == 'female' ?
                                    'selected' : '' }}>Female</option>
                                <option value="other" {{ $enquiry->gender == 'other' ?
                                    'selected' : '' }}>Other</option>
                            </select>
                        </div>
                    </div>

                    <div class="row formfile">
                        <div class="col-md-5">
                            <label for="expertise">Experties</label>
                            <input name="expertise" class="form-control" type="text"
                                value="{{ $enquiry->astrologerDetail->expertise }}"
                                placeholder="Expertise" id="expertise" required>
                        </div>
                        <div class="col-md-5">
                            <label for="language">Language</label>
                            <input name="language" class="form-control" type="text"
                                value="{{ $enquiry->astrologerDetail->language ?? 'Hindi' }}"
                                id="language" required>
                        </div>
                    </div>

                    <div class="row formfile">
                        <div class="col-md-5">
                            <label for="name">Rate Per Minut</label>
                            <input name="rate" class="form-control" type="number"
                                value="{{ $enquiry->astrologerDetail->charge_per_min }}"
                                id="rate" placeholder="Per Min Amount " required>
                        </div>
                        <div class="col-md-5">
                            <label for="name">Agreement Percent</label>
                            <input name="agreement_percent" class="form-control"
                                type="number"
                                value="{{ $enquiry->astrologerDetail->agreement_percent }}"
                                id="rate" placeholder="" required>
                        </div>
                        {{-- <div class="mt-4 col-md-5">
                            <label for="name">Conversation Prefrence</label>

                        </div>
                        <div class="mt-4 col-md-5">
                            <input type="checkbox" value="video"
                                name="conversation_type[]"></input> <label for="name">Video
                                Call</label>
                            &nbsp;
                            <input type="checkbox" value="voice"
                                name="conversation_type[]"></input> <label for="name">Voice
                                Call</label>
                            &nbsp;
                            <input type="checkbox" value="chat"
                                name="conversation_type[]"></input> <label
                                for="name">Chat</label>
                        </div> --}}
                    </div>
                    <div class="row formfile">
                        <div class="col-11 mt-2">
                            <label for="name">Profile Image</label>
                            <input type="file" name="image" class="form-control" id=""
                                required>
                        </div>
                    </div>
                </div>
                {{-- <input name="avtar" value="{{ $user->image }}" type="hidden"> --}}
                <center><button type="submit" class="btn btn-primary submitbtn"
                        id="onboardButton">Submit</button></center>

            </form>
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
<script
    src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js">
</script>


<script>
    $(document).ready(function($) {
        $("#enq_form").validate({
            rules: {
                name: 'required',
                email: 'required',
                mobile: 'required',
                education: 'required',
                gender: 'required',
                specialization: 'required',
                expertise: 'required',
            },
            messages: {
                name: '*Please Enter Name',
                email: '*Please Enter Email',
                mobile: '*Please Enter Mobile',
                education: '*Please Enter Education',
                gender: '*Please Select Gender',
                specialization: '*Please Enter Specialization',
                expertise: '*Please Enter Expertise',
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
