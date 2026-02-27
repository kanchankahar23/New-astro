@extends('website.dashboard_master')
@section('title', 'Pricing')
@section('content')
<section>
    <div class="container-fluid">
        @if (Session::has('error'))
        <div class="alert alert-danger alert-dismissible fade show"
            role="alert">
            <button type="button" class="close" data-dismiss="alert"
                aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>Error!</strong>
        </div>
        @endif

        @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show"
            role="alert">
            <button type="button" class="close" data-dismiss="alert"
                aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>Success!</strong>
        </div>
        @endif
        <form action="{{ url('add-money') }}" method="POST" id="paymentForm">
            @csrf
            <input type="hidden" name="pkg_id" id="pkg_id_input">
            <input type="hidden" name="price" id="price_input">
            <div class="row">
                <div class="col-md-12 pricingBox">
                    <div class="mb-0 user-dashboard-info-box">
                        <div class="mb-4 section-title-02">
                            <h4>Buy Our Plans and Packages</h4>
                        </div>
                        <div class="row">
                            <div class="cardscont" style="flex-wrap: wrap;">
                                @foreach ($packages as $key => $package)
                                <div class="threebox"
                                    onclick="selectPackage({{ $package->id }}, {{ $package->total }})">
                                    <div class="upperbox">
                                        <div class="fullgread">
                                            <div class="lowerinner22">
                                                <div class="logotagimg">
                                                    <i class="fa-solid fa-indian-rupee-sign"
                                                        style="color: white; margin-top: 2px;"></i>
                                                </div>
                                                <p>{{ $package->extra }} Extra
                                                </p>
                                            </div>
                                            <div class="halfwhite"></div>
                                            <div class="shadecont"></div>
                                        </div>
                                    </div>
                                    <div class="lowerbox">
                                        <div class="lowerinner">
                                            <div class="bigamount">
                                                <i
                                                    class="fa-solid fa-indian-rupee-sign"></i>
                                                <span>{{ number_format($package->price)
                                                    }}</span>
                                            </div>
                                            <div class="sidetax">
                                                <div class="taxbox">
                                                    <p><i
                                                            class="fa-solid fa-circle-check"></i>
                                                        GST
                                                        <span>{{ $package->gst
                                                            }}</span>
                                                    </p>
                                                </div>
                                                <div class="taxbox">
                                                    <p><i
                                                            class="fa-solid fa-circle-check"></i>
                                                        Total
                                                        <span>{{ $package->total
                                                            }}</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="lowerinner">
                                            <button type="submit">Pay <span
                                                    class='PayNow'>Now</span>
                                                &nbsp;</button>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <script>
            function selectPackage(pkgId, price) {
                document.getElementById('pkg_id_input').value = pkgId;
                document.getElementById('price_input').value = price;
            }
        </script>



</section>

@endsection
