
    @extends('master.master') @section('title', 'User Register') @section('content')

    <script src="url('assets/js/jquery-3.6.0.min.js')"></script>

    <div class="content-wrapper">
        <div class="row">
            <div class="col-xl-12 grid-margin ">
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
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
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
                        <h4 class="card-title">Create Tag</h4>
                        <div id="alertContainer"></div>
                        <form id="tagform" action="{{ url('tag-edit', $tag->id) }}" method="POST" enctype="multipart/form-data">@csrf
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="exampleInputUsername1">Tag Name</label>
                                    <input class="form-control" type="text" placeholder="Tag Name" id="name" name="name" value="{{ $tag->name }}">
                                </div>
                                <div class="form-group col-6">
                                    <label class="">Code</label>
                                    <input type="text" id="colorCodeInput" name="color" class="form-control" value="{{ $tag->color }}"
                                        placeholder="color code">
                                    <div id="openColorPickerBtn">select color</div>
                                    <input class="custom-color-picker" type="color">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 mx-auto">
                                    <button type="submit" class="btn btn-primary btn-block" id="createTagBtn">Submit</button>
                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ url('assets/jquery-validation/jquery.validate.min.js') }}"></script>

    <script>
        const colorCodeInput = document.getElementById('colorCodeInput');
        const openColorPickerBtn = document.getElementById('openColorPickerBtn');
        const colorPicker = document.querySelector('.custom-color-picker');

        openColorPickerBtn.addEventListener('click', () => {
            colorPicker.click();
        });

        colorPicker.addEventListener('input', (event) => {
            colorCodeInput.value = event.target.value;
            console.log('Selected color code:', event.target.value);
        });
    </script>

    <script>
        $(document).ready(function($) {
            $("#tagform").validate({
                rules: {
                    name: 'required',
                    color: 'required',
                },
                messages: {
                    name: '*Please Enter Tag Name',
                    color: '*Please Select color',
                },
                errorPlacement: function(error, element) {
                    error.insertAfter(element);
                },
                submitHandler: function(form) {
                    $("#createTagBtn").prop("disabled", true);
                    form.submit();
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#name').on('input', function() {
                var name = $(this).val();
                $.ajax({
                    type: 'POST',
                    url: '{{ url('check-name') }}', // Laravel route for checking name
                    data: {
                        name: name,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response === 'exists') {
                            $('#createTagBtn').prop('disabled', true);
                            var alertHtml = `
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <span class="alert-text text-black"> <b>Error: This name already exists in the database!</b></span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    <i class="fa fa-close" aria-hidden="true"></i>
                            </button
                        </div>
                    `;
                    $('#alertContainer').html(alertHtml);
                        } else {
                            $('#createTagBtn').prop('disabled', false);
                            var alertHtml = `
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <span class="alert-text text-black"> <b> Success: This name is available ...!</b></span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    <i class="fa fa-close" aria-hidden="true"></i>
                            </button
                        </div>
                    `;
                    $('#alertContainer').html(alertHtml);
                        }
                    }
                });
            });
        });
    </script>



    @endsection
