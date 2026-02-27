@extends('master.master')
 @section('title','Add Banner')
  @section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-xl-12 grid-margin ">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Add Banner</h4>
                    <form class="forms-sample" action="{{ url('save-banner') }}"
                        enctype="multipart/form-data" method="POST">
                        @csrf
                        @method('POST')
                        <div class="row">
                            <div class="form-group col-6 ">
                                <label class="">Banner Type</label>
                                <div class="">
                                    <select class="form-control" name="banner_type">
                                        <option value="">Select Banner Type</option>
                                        <option value="appointment">Appointment</option>
                                        <option value="call">Call</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-6">
                                <label class="">link</label>
                                <div class="">
                                    <input type="text" class="form-control" name="link">
                                </div>
                            </div>
                            <div class="form-group col-6 ">
                                <label class="">Status</label>
                                <div class="">
                                    <select class="form-control" name="status">
                                        <option value="1">Show</option>
                                        <option value="0">Hide</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-12">
                                <label for="exampleInputUsername1"><b>Select
                                        Banner Image</b></label>
                                @include('cropper.cropper')
                            </div>

                        </div>
                        <button type="submit"
                            class="btn btn-primary btn-block">Submit</button>
                    </form>
                    <br><br>
                    <h4 class="card-title">Banner List</h4>
                    <div class="row">
                        <div class="col-xl-12">
                            <table id="example1"
                                class="display expandable-table dataTable no-footer table-responsive table-striped table-hover"
                                style="width: 100%" role="grid">
                                <thead>
                                    <tr role="row">
                                        <th class="select-checkbox sorting_disabled"
                                            rowspan="1" colspan="1"
                                            aria-label="Quote#"
                                            style="
                                                                                    width: 71px;
                                                                                ">
                                            S.No
                                        </th>
                                        <th class="" tabindex="0"
                                            aria-controls="example" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Product: activate to sort column descending"
                                            style="
                                                                                    width: 81px;
                                                                                ">
                                            Image
                                        </th>
                                        <th class="" tabindex="0"
                                            aria-controls="example" rowspan="1"
                                            colspan="1"
                                            aria-label="Business type: activate to sort column ascending"
                                            style="
                                                                                    width: 133px;
                                                                                ">

                                        </th>
                                        <th class="" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                                            aria-label="Status: activate to sort column ascending"
                                            style="
                                                                                                                            width: 108px;
                                                                                                                        ">
                                            Banner Type
                                        </th>
                                        <th class="" tabindex="0"
                                            aria-controls="example" rowspan="1"
                                            colspan="1"
                                            aria-label="Business type: activate to sort column ascending"
                                            style="
                                                                                    width: 133px;
                                                                                ">
                                            Link
                                        </th>
                                        <th class="" tabindex="0"
                                            aria-controls="example" rowspan="1"
                                            colspan="1"
                                            aria-label="Policy holder: activate to sort column ascending"
                                            style="
                                                                                    width: 126px;
                                                                                ">
                                            Status
                                        </th>

                                        <th class="" tabindex="0"
                                            aria-controls="example" rowspan="1"
                                            colspan="1"
                                            aria-label="Status: activate to sort column ascending"
                                            style="
                                                                                    width: 108px;
                                                                                ">
                                            Short-Order
                                        </th>

                                        <th class="" tabindex="0"
                                            aria-controls="example" rowspan="1"
                                            colspan="1"
                                            aria-label="Updated at: activate to sort column ascending"
                                            style="
                                                                                    width: 110px;
                                                                                ">

                                        </th>

                                        <th class="" rowspan="1" colspan="1"
                                            aria-label="" style="width: 269px;">
                                            Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($banner as $key => $banners)
                                    <tr>
                                        <td class="py-1">{{ ++$key }}.</td>
                                        <td class="py-1" colspan="2">
                                            <div
                                                class="d-flex align-items-center">
                                                <div>
                                                    <img src="{{ $banners->image ?? '-' }}"
                                                        alt="image"
                                                        style="width: 40px; border-radius:20px;">
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $banners->banner_type ?? '-' }}</td>
                                        <td>{{ $banners->link ?? '-' }}</td>
                                        <td>{{ $banners->status ?? '-' }}</td>
                                        <td> {{ $banners->short_order ?? '-' }}
                                        </td>
                                        <td></td>

                                        <td>
                                            <a style="line-height: 1px; margin-bottom: 5px;" class="btn btn-success"
                                                data-toggle="modal"
                                                onclick="editBanner('{{ url('edit-banner?id=' . $banners->id) }}')">Edit</a>
                                            <a style="line-height: 1px;" class="btn btn-danger"
                                                href="{{ url('delete-banner', $banners->id) }}">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal" id="myModal"></div>
<script>
    function editBanner(url) {
        $.get(url, function(rs) {
            $('#myModal').html(rs);
            $('#myModal').modal('show');
        });
    }
</script>

@endsection
