@extends('website.dashboard_master')
@section('title', 'Wallet')
@section('content')

    <link rel="stylesheet" href="{{ url('website_dashboard_assets') }}/style.css">
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
        <div class="col-md-5">
            <div class="walletplus" style="">
                <h5 class="mb-4 card-title">
                    <i class="fa-solid fa-wallet" aria-hidden="true" style="margin-right: 5px; color: #ee9d05;"></i>
                    Total Recharge
                </h5>
                <div class="flex-wrap gap-2 mx-2 mb-0 d-flex align-items-center fs-15">
                    <i class="fa-solid fa-indian-rupee-sign" style="margin-right: 2px; color: #ee9d05; font-size: 20px;"
                        aria-hidden="true"></i>
                    <p class='toTalPrice' style="margin: 0 0; font-size: 20px; font-weight: 500; font-family: Poppins, sans-serif;">
                        {{ number_format($totalAmount, 2) }} &nbsp; </p>
                </div>
            </div>
            <div class="walletplus" style="position: relative;">
                <h5 class="mb-4 card-title popularrecharge">
                    <i class="fa-solid fa-bolt" style="margin-right: 5px; color: #ee9d05;"></i>
                    Total Bonus
                </h5>
                <div class="flex-wrap gap-2 mx-2 mb-0 d-flex align-items-center fs-15">
                    <p style="margin: 0 0; font-size: 17px; font-weight: 400; font-family: Poppins, sans-serif;">
                    </p>
                </div>
                <div class="redsticker"> <p style="font-size: 18px; font-weight: 500; font-family: Poppins, sans-serif; color: white;     padding-left: 10%;">
                        <i class="fa-solid fa-indian-rupee-sign" style="margin-right: 6px; color: #ffffff; font-size: 18px;"
                            aria-hidden="true"></i>{{ $totalBonusAmount ?? '0' }}
                    </p></div>
            </div>

            <form action="{{ url('add-money') }}" method="POST" id="myForm">@csrf
                <div class="walletplus">
                    <h5 class="mb-4 card-title">
                        <i class="fa-solid fa-credit-card" style="margin-right: 5px; color: #ee9d05" aria-hidden="true"></i>
                        Add Money
                    </h5>
                    <div class="flex-wrap mb-3 d-flex align-items-center fs-15 walletAddAmount">
                        <select id="amount" name="amount" class="selectmoneytag" onchange="bonusGet(this.value)" required>
                            <option value="">-Select-</option>
                            @foreach ($plans as $plan)
                                <option value="{{ $plan->price }}" data-pkg-id="{{ $plan->id }}"
                                    class="optionmoneytag">₹ {{ $plan->price }}
                                    @if ($plan->extra)
                                        (+₹ {{ $plan->extra }} Bonus)
                                    @endif
                                </option>
                            @endforeach
                        </select>
                        <input type="hidden" id="pkg_id" name="pkg_id" value="">
                        <script>
                            document.getElementById('amount').addEventListener('change', function() {
                                var selectedOption = this.options[this.selectedIndex];
                                var pkgId = selectedOption.getAttribute('data-pkg-id');
                                document.getElementById('pkg_id').value = pkgId;
                            });
                        </script>
                        <input type="hidden" name="name" value="{{ Auth::user()->name }}">
                        <input type="hidden" name="email" value="{{ Auth::user()->email }}">
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <button type="submit" class="mt-1 moneybutton" id="payNowDisable">Add Money</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-md-7 walletamount">
            <a href="{{ url('all-user-transection') }}" class="btn btn-warning btn-sm mt-3" style="margin-left: 29%;
    width: 45%;">All
                Transection</a>
            <div class="usertransaction" style="max-height: 300px; overflow-y: auto; padding: 10px;">
                <h5 class="mt-2 mb-4 card-title">
                    <i class="fa-solid fa-wallet" aria-hidden="true" style="margin-right: 5px; color: #ee9d05;"></i>
                    Transaction History
                </h5>
                <div class="transaction">
                    @foreach ($payments as $payment)
                        @if (!empty($payment->bonus) && $payment->bonus != 0.00)
                            <a href="{{ url('bonus-invoice', $payment->id) }}">
                                <div class="historypayment">

                                    <div style="width: 47px;" class="sm panditprofile" style="height: none !important;">
                                        <img style="height: 36px;width: 33px; border: navajowhite;" src="{{ asset('/assets/images/astro-buddy.jpg') }}"
                                            alt="" class="img-float rounded">
                                    </div>

                                    <div class="nameofmoneyrecieved">
                                        <h4>Bonus By Astrobuddy</h4>
                                        <p>{{ $payment->created_at->format('d M, Y , h:i A') }}</p>
                                    </div>
                                    <div class="paidpayments">
                                        <p><i class="fa-solid fa-indian-rupee-sign"
                                                style="margin-right: 2px; color: #1b1b1a;"></i>{{ $payment->bonus ?? '-' }}
                                        </p>
                                        <p class="paidsign" style="color:#ee9d05 !important;">Bonus<i
                                                class="fa-solid fa-circle-check"></i></p>
                                    </div>

                                    <div class="transactionline"></div>
                                </div>
                            </a>
                            @endif
                            @if(!empty($payment->credits) && $payment->credits != 0.00)
                            <a href="{{ url('recharge-history', $payment->id) }}">
                                <div class="historypayment">
                                    <div class="panditprofile">
                                        <img src="{{ url($payment->GetTransection->avtar ?? 'website_dashboard_assets/assets/images/ram-nath.jpg') }}"
                                            alt="">
                                    </div>
                                    <div class="nameofmoneyrecieved">
                                        <h4>{{ ucfirst($payment->GetTransection->name) }}</h4>
                                        <p>{{ $payment->created_at->format('d M, Y , h:i A') }}</p>
                                    </div>

                                    <div class="paidpayments">
                                        <p><i class="fa-solid fa-indian-rupee-sign"
                                                style="margin-right: 2px; color: #1b1b1a;"></i>
                                            {{-- {{ $payment->amount ?? '-' }} --}}
                                            {{ $payment->credits ?? '-' }}
                                        </p>
                                        <p class="paidsign">Credited <i
                                                class="fa-solid fa-circle-check"></i></p>
                                    </div>
                                    <div class="transactionline"></div>
                                </div>
                            </a>
                            @endif
                            @if (!empty($payment->debits) && $payment->debits != 0.00)
                            <a href="{{ url('recharge-history', $payment->id) }}">
                                <div class="historypayment">
                                    <div class="panditprofile">
                                        <img src="{{ url($payment->GetTransection->avtar ?? 'website_dashboard_assets/assets/images/ram-nath.jpg') }}"
                                            alt="">
                                    </div>
                                    <div class="nameofmoneyrecieved">
                                        <h4>{{ ucfirst($payment->name) }}</h4>
                                        <p>{{ $payment->created_at->format('d M, Y , h:i A') }}</p>
                                    </div>

                                    <div class="paidpayments">
                                        <p><i class="fa-solid fa-indian-rupee-sign"
                                                style="margin-right: 2px; color: #0e0c0d;"></i>{{
                                            $payment->debits ?? '-' }}
                                        </p>
                                        <p class="paidsign" style="color: #f00b3d !important;">Debits <i
                                                class="fa-solid fa-circle-check"></i></p>
                                    </div>
                                    <div class="transactionline"></div>
                                </div>
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
