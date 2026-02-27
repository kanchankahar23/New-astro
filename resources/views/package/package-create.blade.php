@extends('master.master') @section('title', 'User Register') @section('content')
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
                    <h4 class="card-title">Package Create</h4>
                    <form class="forms-sample" action="{{ url('package-store') }}" enctype="multipart/form-data"
                        method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="exampleInputprice">Price</label>
                                <input type="text" class="form-control" name="price" id="price"
                                    placeholder="please Enter Price .. "oninput="calculateTotal()">
                            </div>
                            <div class="form-group col-6">
                                <label class="">Gst in Percent %</label>
                                <input type="text" class="form-control" id="gst" name="gst" value="18" readonly
                                    oninput="calculateTotal()">
                            </div>
                            <div class="form-group col-6">
                                <label class="">Bonus</label>
                                <input type="text" class="form-control" id="bonus" name="bonus"
                                    placeholder="bonus..">
                            </div>
                            <div class="form-group col-6">
                                <label for="total">Total</label>
                                <input type="text" class="form-control" id="total" name="total"
                                    placeholder="Total Amount  ">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function calculateTotal() {
        let price = parseFloat(document.getElementById('price').value) || 0;
        let gstPercent = parseFloat(document.getElementById('gst').value) || 0;
        let gstAmount = (price * gstPercent) / 100;
        let total = price + gstAmount;
        document.getElementById('total').value = total.toFixed(2);
    }
</script>
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
            for (p of parent) {
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
