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
            <h4 class="modal-title">Add Tag</h4>
            <button type="button" class="close"
                data-dismiss="modal">&times;</button>
        </div>
        <form id="onboard"
            action="{{ url('asign-astrologer-tag')}}"
            enctype="multipart/form-data" method="post" >
            @csrf
            <!-- Modal Body -->
            <div class="modal-body">
                <div class="row formfile">
                    <input name="astroId" class="form-control" type="hidden" value="{{ $astroId }}"
                        required>
                    <div class="col-md-6">
                        <label for="">Tag</label>
                        <select name="tag_id" class="form-control"
                            required>
                            <option >Select Tag</option>
                            @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}" {{ $tag->id ==
                                    $astrologerTag->tag_id ? 'selected' : '' }}>{{ $tag->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <button style="margin-top: 30px;    background: #6925fd;  color: white;  font-size: 15px;  font-weight: 500;" type="submit" class="btn btn-block "
                            >Submit</button>
                    </div>
                </div>

            </div>
            {{-- <input name="avtar" value="{{ $user->image }}" type="hidden">
            --}}

        </form>


        <div class="mt-3"></div>
    </div>
</div>
