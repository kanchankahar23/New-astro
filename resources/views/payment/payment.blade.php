@extends('website.dashboard_master')
@section('title', 'Add Money')
@section('content')
    <div class="container m-auto row addamount">
        @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>Error!</strong> {{ $message }}
            </div>
        @endif
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>Success!</strong> {{ $message }}
            </div>
        @endif
        <div class="col-md-12">
            <form action="{{ url('initiate-payment') }}" method="POST" id="paymentForm">@csrf
                <div class="walletplus">
                    <h5 class="mb-4 card-title">
                        <i class="fa-solid fa-credit-card" style="margin-right: 5px; color: #ee9d05" aria-hidden="true"></i>
                        Add Money
                    </h5>
                    <input class="form-control" value="{{ $plan->price }}" name="without_gst_ammount" readonly><br>
                <div class="row secondBonus">
                    <div class="col-md-6 BonusGet">
                    <input class="form-control" value="{{ $plan->gst }}" readonly>
                    <div class="gstBonus">
                    <i class="fa-solid fa-percent"></i>
                        <span style="margin-left: 6px; font-family:Georgia;">Gst</span>
                    </div>
                    </div>

                    <div class="col-md-6 BonusGet">
                        <input name="bonus" class="form-control" value="{{ $plan->extra }}" readonly>
                        <div class="gstBonus">

                        <i class="fa fa-inr"></i>
                            <span style="margin-left: 6px; font-family:Georgia;">Bonus</span>
                        </div>
                    </div>
                </div>
                    <div class="flex-wrap mb-3 d-flex align-items-center fs-15">
                        <input id="amount" name="amount" class="selectmoneytag" value="{{ $plan->total }}" readonly>
                        <input type="hidden" id="pkg_id" name="pkg_id" value="{{ $plan->id }}">
                        <input type="hidden" name="name" value="{{ Auth::user()->name }}">
                        <input type="hidden" name="email" value="{{ Auth::user()->email }}">
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <button type="submit"  class="mt-2 moneybutton">Add Money</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


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
