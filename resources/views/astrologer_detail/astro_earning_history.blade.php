@extends('website.dashboard_master')
@section('title', 'Wallet')
@section('content')

<link rel="stylesheet" href="{{ url('website_dashboard_assets') }}/style.css">
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
    <div class="col-md-12 walletamount">
        <a href="" class="btn btn-success btn-sm mt-3" style="width: 100% !important;font-size: 1rem;
    font-weight: 600;">
    Earning History
    {{--  <img style="width: 30px;
    margin-left: 4px;" src="{{ url('assets/images/hand-pointer.png') }}" alt="">  --}}
</a>

        <div class="usertransaction">
            <h5 class="mt-4 card-title">
                <i class="fa-solid fa-wallet" aria-hidden="true"
                    style="margin-right: 5px; color: #ee9d05;"></i>
                <b>Earning Money</b>
            </h5>
            <div style="max-height: 300px; overflow-y: auto;">
                @if($earnings->count()>0)
                @foreach ($earnings as $earning)
                <div class="transaction" style="border: 1px solid #efefef;margin: 13px 0;">
                    @if (!empty($earning->astro_withdraw_amount))

                    <div class="historypayment" style="margin-bottom: 32px;width:87%;">
                        <div class="panditprofile" style="margin-left: 15px;">
                            <img src="{{ url($earning->getAstrologer->avtar ?? 'website_dashboard_assets/assets/images/ram-nath.jpg') }}"
                                alt="">
                        </div>
                        <div class="nameofmoneyrecieved">
                            <h4>{{ ucfirst($earning->getAstrologer->name) }}</h4>
                            <p>{{ $earning->created_at->format('d M, Y , h:i A') }}</p>
                        </div>

                        <div class="paidpayments">
                            <p><i class="fa-solid fa-indian-rupee-sign"
                                    style="margin-right: 2px; color: #1b1b1a;"></i>
                                {{-- {{ $payment->amount ?? '-' }} --}}
                                {{ $earning->astro_withdraw_amount ?? '-' }}
                            </p>
                            <p class="paidsign" style="color: #ff7f06 !important;">withdrawal <i
                                    class="fa-solid fa-circle-check"></i>
                            </p>
                        </div>

                        {{-- <div class="transactionline"></div> --}}
                    </div>
                    @elseif (!empty($earning->astrologer_amount))
                        <div class="historypayment" style="margin-bottom: 32px;width:87%;">
                            <div class="panditprofile" style="margin-left: 15px;">
                                <img src="{{ url($earning->getUser->avtar ?? 'website_dashboard_assets/assets/images/ram-nath.jpg') }}"
                                    alt="">
                            </div>
                            <div class="nameofmoneyrecieved">
                                <h4>{{ ucfirst($earning->getUser->name) }}</h4>
                                <p>{{ $earning->created_at->format('d M, Y , h:i A') }}</p>
                            </div>

                            <div class="paidpayments">
                                <p><i class="fa-solid fa-indian-rupee-sign"
                                        style="margin-right: 2px; color: #1b1b1a;"></i>
                                    {{-- {{ $payment->amount ?? '-' }} --}}
                                    {{ $earning->astrologer_amount ?? '-' }}
                                </p>
                                <p class="paidsign">Credited <i class="fa-solid fa-circle-check"></i>
                                </p>
                            </div>

                            {{-- <div class="transactionline"></div> --}}
                        </div>
                    @endif
                </div>
                @endforeach

                @else
                <div class="transaction" style="border: 1px solid #efefef;margin: 13px 0;">
                    <div class="historypayment" style="margin-bottom: 32px;width:87%;">
                        <div class="nameofmoneyrecieved" style="width: auto;">
                            <h4><i style="font-size: 25px;"
                                    class="fa-solid fa-hand-holding-dollar"></i> You Have No
                                Earning</h4>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
