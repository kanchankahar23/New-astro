<head>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<link href="{{ url('assets/css/onboard_model.css') }}" rel="stylesheet" />
</head>
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Edit Board User</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
         <form id="onboard" action="{{ url('onboard-edit-store', $enquiry->id) }}" enctype="multipart/form-data"
            method="post"  id="onboard">
            @csrf
            <!-- Modal Body -->
            <div class="modal-body">
                <div class="row formfile">
                    <div class="col-md-5">
                        <label for="name">Name</label>
                        <input name="name" class="form-control" type="text" value="{{ $enquiry->name }}"
                            id="name" required>
                    </div>
                    <div class="col-md-5">
                        <label for="email">Email</label>
                        <input name="email" class="form-control" type="email" value="{{ $enquiry->email }}"
                            id="email" required readonly>
                    </div>
                </div>

                <div class="row formfile">
                    <div class="col-md-5">
                        <label for="mobile">Mobile</label>
                        <input name="mobile" class="form-control" type="number" value="{{ $enquiry->mobile }}"
                            id="mobile" required>
                    </div>
                    <div class="col-md-5">
                        <label for="gender">Gender</label>
                        <select name="gender" class="form-control" id="gender" required>
                            <option value="male" {{ $enquiry->gender == 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ $enquiry->gender == 'female' ? 'selected' : '' }}>Female</option>
                            <option value="other" {{ $enquiry->gender == 'other' ? 'selected' : '' }}>Other</option>
                        </select>
                    </div>
                </div>

                <div class="row formfile">
                    <div class="col-md-5">
                        <label for="expertise">Experties</label>
                        <input name="expertise" class="form-control" type="text" value="{{ $enquiry->astrologerDetail->expertise }}"
                            placeholder="Expertise" id="expertise" required>
                    </div>
                    <div class="col-md-5">
                        <label for="language">Language</label>
                        <input name="language" class="form-control" type="text"
                            value="{{ $enquiry->astrologerDetail->language ?? 'Hindi' }}" id="language" required>
                    </div>
                </div>

                <div class="row formfile">
                    <div class="col-md-5">
                        <label for="name">Rate Per Minut</label>
                        <input name="rate" class="form-control" type="number" value="{{ $enquiry->astrologerDetail->charge_per_min }}"
                            id="rate" placeholder="Per Min Amount " required>
                    </div>
                    <div class="col-md-5">
                        <label for="name">Agreement Percent</label>
                        <input name="agreement_percent" class="form-control" type="number" value="{{ $enquiry->astrologerDetail->agreement_percent }}"
                            id="rate" placeholder="" required>
                    </div>
                    {{--  <div class="mt-4 col-md-5">
                        <label for="name">Conversation Prefrence</label>

                    </div>
                    <div class="mt-4 col-md-5">
                        <input type="checkbox" value="video" name="conversation_type[]"></input> <label for="name">Video Call</label>
                        &nbsp;
                        <input type="checkbox" value="voice" name="conversation_type[]"></input> <label for="name">Voice Call</label>
                        &nbsp;
                        <input type="checkbox" value="chat" name="conversation_type[]"></input> <label for="name">Chat</label>
                    </div>  --}}
                </div>
                <div class="row formfile">
                    <div class="col-11 mt-2">
                        <label for="name">Profile Image</label>
                        <input type="file" name="image" class="form-control" id=""
                            >
                    </div>
                </div>
            </div>
            {{--  <input name="avtar" value="{{ $user->image }}" type="hidden">  --}}
                <center><button type="submit" class="btn btn-primary submitbtn" id="onboardButton">Submit</button></center>

        </form>


        <div class="mt-3"></div>
    </div>
</div>


