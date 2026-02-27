<head>
<link href="{{url('assets/css/font-1.css')}}" rel="stylesheet">
<link href="{{ url('assets/css/onboard_model.css') }}" rel="stylesheet" />
<script src="{{ url('assets/js/bootstrap-multiselect.js')}}"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="{{ url('assets/css/multiselect-container.css')}}">
<link rel="stylesheet" href="{{url('assets/css/bootstrap-theme.min.css')}}">
<script src="{{url('assets/js/bootstrap-multiselect.js')}}"></script>
</head>



<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">On Board User </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <form id="onboard" action="{{ url('onboard-detail', $user->id) }}" enctype="multipart/form-data"
            method="post">
            @csrf
            <!-- Modal Body -->
            <div class="modal-body">
                <div class="row formfile">
                    <div class="col-md-5">
                        <label for="name">Name</label>
                        <input name="name" class="form-control" type="text" value="{{ $user->name }}"
                            id="name" required>
                    </div>
                    <div class="col-md-5">
                        <label for="email">Email</label>
                        <input name="email" class="form-control" type="email" value="{{ $user->email }}"
                            id="email" required>
                    </div>
                </div>

                <div class="row formfile">
                    <div class="col-md-5">
                        <label for="mobile">Mobile</label>
                        <input name="mobile" class="form-control" type="number" value="{{ $user->mobile }}"
                            id="mobile" required>
                    </div>
                    <div class="col-md-5">
                        <label for="gender">Gender</label>
                        <select name="gender" class="form-control" id="gender" required>
                            <option value="male" {{ $user->gender == 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ $user->gender == 'female' ? 'selected' : '' }}>Female</option>
                            <option value="other" {{ $user->gender == 'other' ? 'selected' : '' }}>Other</option>
                        </select>
                    </div>
                </div>

                <div class="row formfile">
                    <div class="col-md-5">
                        <label for="expertise">Experties</label>
                        <input name="expertise" class="form-control" type="text" value="{{ $user->expertise }}"
                            placeholder="Expertise" id="expertise" required>
                    </div>
                    <div class="col-md-5">
                        <label for="language">Language</label>
                        <input name="language" class="form-control" type="text"
                            value="{{ $user->language ?? 'Hindi' }}" id="language" required>
                    </div>
                </div>

                <div class="row formfile">
                    <div class="col-md-5">
                        <input name="experience" class="form-control" type="hidden"
                            value="{{ $user->experience ?? '2' }}" id="experience" >
                    </div>
                    <div class="col-md-5">
                        <input name="rating" class="form-control" type="hidden" value="{{ $user->rating }}"
                            id="rating">
                    </div>
                </div>
                <div class="row formfile">
                    <div class="col-md-5">
                        <label for="name">Rate Per Minut</label>
                        <input name="rate" class="form-control" type="number" value="{{ $user->rate }}"
                            id="rate" placeholder="Per Min Amount " required>
                    </div>
                    <div class="col-md-5">
                        <label for="name">Agreement Percent</label>
                        <input name="agreement_percent" class="form-control" type="number" value="{{ $user->agreement_percent }}"
                            id="rate" placeholder="" required>
                    </div>
                    <div class="mt-4 col-md-5">
                        <label for="name">Conversation Prefrence</label>

                    </div>
                    <div class="mt-4 col-md-5">
                        <input type="checkbox" value="video" name="conversation_type[]"></input> <label for="name">Video Call</label>
                        &nbsp;
                        <input type="checkbox" value="voice" name="conversation_type[]"></input> <label for="name">Voice Call</label>
                        &nbsp;
                        <input type="checkbox" value="chat" name="conversation_type[]"></input> <label for="name">Chat</label>
                    </div>
                </div>
                <div class="row formfile">
                    <div class="col-11 mt-2">
                        <label for="name">Profile Image</label>
                        <input type="file" name="image" class="form-control" id="image" required>
                    </div>
                </div>
            </div>
            {{--  <input name="avtar" value="{{ $user->image }}" type="hidden">  --}}

            <center><button type="submit" class="btn btn-danger" id="onboardButton">Submit</button></center>
        </form>
        <div class="mt-3"></div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function($) {
        $("#onboard").validate({
            rules: {
                name: 'required',
                email: 'required',
                mobile: 'required',
                gender: 'required',
                expertise: 'required',
            },
            messages: {
                name: '*Please Enter Name',
                email: '*Please Enter Email',
                mobile: '*Please Enter Mobile',
                gender: '*Please Select Gender',
                expertise : '*Please Enter Expertise',
            },
            errorPlacement: function(error, element) {
                error.insertAfter(element);
            },
            submitHandler: function(form) {
                $("#onboardButton").prop("disabled", true);
                form.submit();
            }
        });
    });


</script>
