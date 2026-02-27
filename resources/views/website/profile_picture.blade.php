@extends('website.dashboard_master')
@section('title','Profile Image')
@section('content')
<style>
    *{
        border:0;
        margin:0;
        box-sizing:border-box;
    }
    .container-fluid{
padding-right:0 !important;
    }
</style>
<div class="container">
<form action="{{ url('save-profile-picture',Auth::user()->id) }}" method="POST">
@csrf
@method('POST')
<div class="row">
    <div class="col-12">
        @include('cropper.cropper',["preview"=> Auth::user()->avtar])
    </div>
</div>
<button type="submit" class="mb-4 btn btn-warning btn-block col-8 offset-2">Change Profile Image</button>
</form>
</div>
@endsection
