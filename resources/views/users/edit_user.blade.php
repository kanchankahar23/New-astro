@extends('master.master') @section('title','User Edit') @section('content')
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
                <h4 class="card-title">Edit User Form</h4>
                <form class="forms-sample" action="{{ url('users/update', $user->id) }}" enctype="multipart/form-data" method="POST">
                    @csrf
                <div class="row">
                <div class="form-group col-6">
                    <label for="exampleInputUsername1">Full Name</label>
                    <input type="text" class="form-control" id="exampleInputUsername1" value="{{$user->name ?? '-'}}" name="name">
                </div>
                <div class="form-group col-6">
                    <label class="">Mobile</label>
                    <div class="">
                    <input type="number" class="form-control" name="mobile" value="{{$user->mobile ?? '-'}}">
                    </div>
                </div>
                <div class="form-group col-6 ">
                    <label class="">Gender</label>
                    <div class="">
                      <select class="form-control" name="gender">
                        <option value="male" {{$user->gender == 'male' ? 'selected' : ''}}>Male</option>
                        <option value="female" {{$user->gender == 'female' ? 'selected' : ''}}>Female</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group col-6">
                    <label class="">Role</label>
                    <div class="">
                      <select class="form-control" name="role" required>
                        <option value="0" >Select Role</option>
                        <option value="manager" {{ $user->role == 'manager' ? 'selected' : ''}}>Manager</option>
                        <option value="staff" {{ $user->role == 'staff' ? 'selected' : ''}}>Staff</option>
                      </select>
                    </div>
                  </div>
                <div class="form-group col-6">
                    <label class="">Manager</label>
                    <div class="">
                    <select class="form-control" name="parent" id="manager">
                        <option value="0">Select Manager</option>

                    </select>
                    </div>
                </div>
                <div class="form-group col-6">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" value="{{ $user->email ?? '-'}}" name="email">
                </div>
                <div class="form-group col-12">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" value="{{ $user->password ?? '-'}}" name="password">
                </div>
               @include('cropper.cropper')
               </div>
                <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
