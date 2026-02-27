@extends('master.master')
@section('title', 'Enquiry List')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-xl-12 grid-margin ">
                <div class="card">
                    <div class="card-body">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <h4 class="card-title" style="margin: 0;">Tag Management</h4>
                            <a href="{{ url('tag-management') }}" class="btn btn-primary btn-sm" style="margin-left:50%;">Add New Tag</a>
                            <input type="search" id="myInput" name="search" class="form-control" placeholder="Search.."
                                style="width: auto;">
                        </div>


                        <div class="card">
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col"><b>S.no</b></th>
                                        <th scope="col"><b>Name</b></th>
                                        <th scope="col"><b>color</b></th>

                                            <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody id="myTable">
                                    @foreach ($tags as $i => $tag)
                                        <tr>
                                            <th scope="row">&nbsp;&nbsp; {{ ++$i }}.</th>
                                            <td>{{ ucfirst($tag->name) }}</td>
                                            <td><span
                                                    style="border-radius:5px; background-color: {{ $tag->color ?? 'NA' }};">&nbsp;&nbsp;
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td>

                                                <td class="text-center">
                                                    <a href="{{ url('edit-tag', $tag->id) }}" class="mx-3">
                                                        <i class="fas fa-user-edit text-primary"></i>
                                                    </a>
                                                    <a href="{{ url('delete-tag', $tag->id) }}" class="mx-3">
                                                        <i class="cursor-pointer fas fa-trash text-primary"></i>
                                                    </a>
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
    <script src="{{ url('assets/js/jquery.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
@endsection
