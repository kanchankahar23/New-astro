<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Astrologer Recharge Popup</title>
        <link rel="stylesheet" href="{{ asset('popup/popup4.css') }}" />
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');

            .popup-content {
                position: absolute;
                font-family: 'poppins', sans-serif;
                transform: translate(-50%, -50%);
                margin: auto;
            }

            .package {
                font-family: 'poppins', sans-serif;

            }
        </style>
        <link rel="stylesheet"
            href="{{ url('assets/pricing-model') }}/pricing.css">
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
            integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link
            href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Philosopher:ital,wght@0,400;0,700;1,400;1,700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
            rel="stylesheet">
    </head>
    @php
    $isModel = $isOpen ?? false;
    @endphp
    <body>
        <!-- <button id="open-popup-btn">Show Recharge Popup</button> -->
        <!-- Popup Container -->
        <div class="popup show" id="popup" style="z-index: 99999;">


            {{-- <section class="pop-upPricing"> --}}
                <div class="innerPricing">
                    <div class="popupUser">
                        <div class="logoLine">
                            <div class="logodesign">
                                <div class="astroLogo">
                                    <img src="{{ url('assets/pricing-model') }}/logo23.png"
                                        alt="">
                                    <img src="{{ url('assets/pricing-model') }}/23full.png"
                                        alt="">
                                </div>
                            </div>
                            <div class="textAmount">
                                <p class="biggAmount"> <i
                                        class="fa-solid fa-indian-rupee-sign"></i>
                                    @if (session('neededBalance', 0) >
                                    0)
                                    {{ session('neededBalance') }}
                                    @else
                                    {{ $walletInfo ?? '0' }}
                                    @endif </p>
                                <p class="walletText"><i
                                        class="fa-solid fa-wallet"></i>

                                    Balance Needed</p>
                            </div>
                        </div>

                    </div>
                    <div class="validUser">
                        @foreach($packages as $package)
                        <div class="boucher"
                            onclick="selectPackage({{ $package->id }}, {{ $package->total }})"
                            style="cursor:pointer;" type="submit"><i
                                class="fa-solid fa-indian-rupee-sign"></i>
                            {{ number_format($package->price) ?? 0 }}
                        </div>

                        @endforeach


                    </div>
                    <div class="topUpRecharge">
                        <button id="recharge-btn" onclick="rechargeNow()">Click
                            for Recharge
                            Top-Up</button>
                        <!-- <button>Cancel</button> -->
                    </div>
                </div>

                {{--
            </section> --}}

            @if($isModel == false)
            <span class="close-btn" id="close-btn">&times;</span>
            @else
            <span class="close-btn" onclick="backHistory()">&times;</span>
            @endif
        </div>
        <div>
            @if(Session::has('error'))
            <div class="mt-2 alert alert-danger">
                <b>{{ Session::get('error') }}</b>
            </div>
            @endif
        </div>

        <form action="{{ url('add-money-from-popup') }}" method="post"
            id="popupForm">
            @csrf
        </form>

        <script src="{{ asset('popup/popup4.js')}}"></script>
        <script>
            var walletUrl = "{{ url('/pricing') }}";

        function selectPackage(pkgId, price) {
            var form = document.querySelector('#popupForm');

                // Create and append the pkg_id input field
                var package_id = document.createElement('input');
                package_id.type = 'hidden';
                package_id.name = 'pkg_id';
                package_id.value = pkgId;
                form.appendChild(package_id);

                // Create and append the price input field
                var price_input = document.createElement('input');
                price_input.type = 'hidden';
                price_input.name = 'price';
                price_input.value = price;
                form.appendChild(price_input);

                // Log the form to the console for debugging
                // console.log(form);

                form.submit();
        }

        // document.addEventListener('DOMContentLoaded', function () {
        //     if({{ $isModel }}){
        //         document.querySelector('#popup').style.display = "block";
        //     }
        // });


        // function backHistory(){

        //     window.history.back();

        // }
        </script>
    </body>
</html>
