<head>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link href="{{ url('assets/css/onboard_model.css') }}" rel="stylesheet" />
</head>



<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Edit Banner</h4>
            <button type="button" class="close"
                data-dismiss="modal">&times;</button>
        </div>

        <form style="padding: 25px;" class="forms-sample" action="{{ url('update-banner', $banner->id) }}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('POST')
            <div class="row">
                {{--  <div class="form-group col-12">
                    <label for="exampleInputUsername1"><b>Select
                            Banner Image</b></label>
                            @php
                            $preview = $banner->image;
                            @endphp
                    @include('cropper.cropper')
                </div>  --}}
                <div class="form-group col-6 ">
                    <label class="">Banner Type</label>
                    <div class="">
                        <select class="form-control" name="banner_type">
                            <option value="">Select Banner Type</option>
                            <option {{ $banner->banner_type == 'appointment' ? 'selected' : '' }} value="appointment">Appointment</option>
                            <option {{ $banner->banner_type == 'call' ? 'selected' : '' }} value="call">Call</option>
                        </select>
                    </div>
                </div>
                <div class="form-group col-6">
                    <label class="">link</label>
                    <div class="">
                        <input type="text" class="form-control" name="link"
                            value="{{ $banner->link }}">
                    </div>
                </div>
                <div class="form-group col-6">
                    <label class="">Short Order</label>
                    <div class="">
                        <input type="text" class="form-control"
                            name="short_order"
                            value="{{ $banner->short_order }}">
                    </div>
                </div>
                <div class="form-group col-6 ">
                    <label class="">Status</label>
                    <div class="">
                        <select class="form-control" name="status">
                            <option {{ $banner->status == 1 ? 'selected' : '' }}
                                value="1">Show</option>
                            <option {{ $banner->status == 0 ? 'selected' : '' }}
                                value="0">Hide</option>
                        </select>
                    </div>
                </div>
            </div>
            <button type="submit"
                class="btn btn-primary btn-block">Submit</button>
        </form>
        <div class="mt-3"></div>
    </div>
</div>
