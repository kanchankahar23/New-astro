@extends('master.master') @section('title','User Register') @section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-xl-12 grid-margin ">
            <div class="card">
            <div class="card-body">

                <h4 class="card-title">Package Create</h4>
                <form class="forms-sample" action="{{ url('package-update', $package->id) }}" enctype="multipart/form-data" method="POST">
                    @csrf
                <div class="row">
                <div class="form-group col-6">
                    <label for="exampleInputprice">Price</label>
                    <input type="text" class="form-control" name="price" id="price" value="{{ $package->price }}">
                </div>


                <div class="form-group col-6">
                    <label class="">Gst</label>
                    <input type="text" class="form-control" id="gst" name="gst" value="{{ $package->gst }}">
                </div>

                <div class="form-group col-6">
                    <label for="total">Bonus</label>
                    <input type="text" class="form-control" id="bonus" name="bonus" value="{{ $package->bonus }}">
                </div>

                <div class="form-group col-6">
                    <label for="total">Total</label>
                    <input type="text" class="form-control" id="total" name="total" value="{{ $package->total }}">
                </div>

               </div>
                <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>


@endsection
