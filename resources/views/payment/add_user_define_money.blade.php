@extends('website.dashboard_master')
@section('title', 'Add Money')
@section('content')
<div class="container m-auto row addamount">
    @if ($message = Session::get('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert"
            aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>Error!</strong> {{ $message }}
    </div>
    @endif
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert"
        id="success-alert">
        <button type="button" class="close" data-dismiss="alert"
            aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>Success!</strong> {{ $message }}
    </div>
    @endif
   @php
    $maxPrice = \App\Models\Package::max('price');
    $maxPrice = $maxPrice ?? 0;
    @endphp
    <div class="col-md-12">
        <form action="{{ url('initiate-payment') }}" method="POST"
            id="paymentForm">@csrf
            <div class="walletplus">
                <h5 class="mb-4 card-title">
                    <i class="fa-solid fa-credit-card"
                        style="margin-right: 5px; color: #ee9d05"
                        aria-hidden="true"></i>
                    Add Money
                </h5>
                @php
                $maxPrice = \App\Models\Package::max('price');
                $maxPrice = $maxPrice ?? 0;
                @endphp
                <div class="row">
                    <div class="form-group col-6">
                        <label for="exampleInputprice">Price</label>
                       <input type="number" class="form-control" name="price" id="price"
                        placeholder="Please enter price..."
                        oninput="validatePrice({{ $maxPrice }})">
                    <span id="priceError" style="color: red; display: none;">
                        Please enter a value greater than or equal to {{ $maxPrice }}.
                    </span>
                    </div>
                    <div class="form-group col-6">
                        <label class="">Gst in Percent %</label>
                        <input type="text" class="form-control" id="gst" name="gst" value="18"
                            readonly oninput="calculateTotal()">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-6">
                        <label for="total">Total</label>
                        <input type="text" class="form-control" id="amount" name="amount"
                            placeholder="Total Amount" readonly>
                    </div>
                    <input type="hidden" name="name" value="{{ Auth::user()->name }}">
                    <input type="hidden" name="email" value="{{ Auth::user()->email }}">
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <div class="form-group col-6">
                       <button id="submitButton" style="margin-top: 30px !important;" type="submit" class="mt-2 moneybutton">Add Money</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    function validatePrice(maxPrice) {
        const priceInput = document.getElementById('price');
        const errorSpan = document.getElementById('priceError');
        const submitButton = document.getElementById('submitButton');
            if (parseFloat(priceInput.value) < maxPrice) {
             errorSpan.style.display = "inline";
             submitButton.disabled = true;
             calculateTotal();
             } else {
                 errorSpan.style.display = "none";
                 calculateTotal();
                 submitButton.disabled = false;
             }
          }
</script>
<script>
    function calculateTotal() {
        let price = parseFloat(document.getElementById('price').value) || 0;
        let gstPercent = parseFloat(document.getElementById('gst').value) || 0;
        let gstAmount = (price * gstPercent) / 100;
        let total = price + gstAmount;
        document.getElementById('amount').value = total.toFixed(2);
    }
</script>

<script>
    if (!localStorage.getItem('success-alert-hidden')) {
            setTimeout(function() {
                var successAlert = document.getElementById('success-alert');
                if (successAlert) {
                    successAlert.style.display = 'none';
                    localStorage.setItem('success-alert-hidden', 'true');
                }
            }, 5000);
        } else {
            var successAlert = document.getElementById('success-alert');
            if (successAlert) {
                successAlert.style.display = 'none';
            }
        }
</script>
@endsection
