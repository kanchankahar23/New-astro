@extends('master.master') @section('title','User Register') @section('content')
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
                <h4 class="card-title">Register User Form</h4>
                <form class="forms-sample" action="{{ url('users/user-save') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('POST')
                <div class="row">
                <div class="form-group col-6">
                    <label for="exampleInputUsername1">Full Name</label>
                    <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Enter Your Full Name" name="name">
                </div>
                <div class="form-group col-6">
                    <label class="">Mobile</label>
                    <div class="">
                    <input type="number" class="form-control" name="mobile">
                    </div>
                </div>
                <div class="form-group col-6 ">
                    <label class="">Gender</label>
                    <div class="">
                      <select class="form-control" name="gender">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                      </select>
                    </div>
                  </div>
                  <!-- <div class="form-group ">
                    <label class="">Category</label>
                    <div class="">
                      <select class="form-control" name="type">
                        <option value="internal">Internal</option>
                        <option value="astrolger">Astrolger</option>
                        <option value="user">User</option>
                      </select>
                    </div>
                    </div> -->
                  <div class="form-group col-6">
                    <label class="">Role</label>
                    <div class="">
                      <select class="form-control" name="role" onchange="getParent(this)" required>
                        <option value="0" >Select Role</option>
                        <option value="manager">Manager</option>
                        <option value="staff">Staff</option>
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
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Your Email" name="email">
                </div>
                <div class="form-group col-12">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
                </div>
               @include('cropper.cropper')
               </div>
                <button type="submit" class="btn btn-primary btn-block">Submit</button>
                <!-- <button class="btn btn-light">Cancel</button> -->
                </form>
            </div>
            </div>
        </div>
    </div>
</div>
<script>
  async function getParent(e) {
    var role = e.value;
    var url = "{{ url('users/get-parent') }}";

    try {
        const response = await fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                role: role
            })
        });

        const data = await response.json();
        var parent = data.parent;
        var selectElement = document.getElementById('manager');
        selectElement.innerHTML = '';
        for(p of parent){
            var option = document.createElement('option');
                option.value = p.id;
                option.innerHTML = p.name;
            document.querySelector('#manager').appendChild(option);
        }
    } catch (error) {
        alert("Something went Wrong Refreash the page");
        console.error('Error fetching data:', error);
    }
}
</script>

@endsection
