<!DOCTYPE html>
<html lang="en-US">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="profile" href="https://gmpg.org/xfn/11" />

        <script>
            document.documentElement.className =
            document.documentElement.className + " yes-js js_active js";
        </script>
        <title>AstroBuddy | @yield('title')</title>
        <link rel="icon" href="{{asset('website/astro_link_icon.ico')}}" />
        <style>
            .callWithUs {
                position: fixed;
                bottom: 1.5%;
                background-image: linear-gradient(0deg, rgb(231, 143, 5) 0%, rgb(203, 74, 12) 100%);
                color: white;
                width: auto;
                display: flex;
                align-items: center;
                padding: 10px;
                border-radius: 50px;
                z-index: 999;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
                cursor: pointer;
                overflow: hidden;
            }

            @media screen and (min-width: 500px) {
                .numberShow {
                    width: 163px;
                    text-align: center;
                }
            }

            .phonering-alo-ph-img-circle {
                width: 40px;
                height: 40px;
                display: flex;
                align-items: center;
                justify-content: center;
                background: #ffffff;
                border-radius: 50%;
                transition: transform 0.3s ease-in-out;
            }

            .phonering-alo-ph-img-circle i {
                color: #c77b11;
                font-size: 1.2rem;
            }

            @media screen and (max-width: 500px) {
                .numberShow {
                    width: 0;
                    opacity: 0;
                    overflow: hidden;
                    transition: width 0.5s ease-in-out, opacity 0.5s ease-in-out;
                }

                .numberShow h2 {
                    margin-right: 10px;
                }

                .showNumber {
                    width: auto;
                    opacity: 1;
                    padding-left: 10px;
                }

                #ringCall {
                    left: 2.5% !important;
                    bottom: 1.7% !important;

                    color: white;
                    width: auto;

                    height: 50px !important;
                    z-index: 9999;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    cursor: pointer;
                }


                .phonering-alo-ph-img-circle i {
                    color: #ffffff !important;
                    font-size: 1.25rem !important;
                }

                .phonering-alo-phone .phonering-alo-ph-img-circle {
                    background-color: transparent !important;
                }

            }

            @keyframes ringAnimation {

                0%,
                100% {
                    transform: scale(1);
                }

                50% {
                    transform: scale(1.1);
                }
            }






            .numberShow h2 {
                color: #ffffff;
                font-size: 1.2rem;
                font-weight: 600;
            }

            .phonering-alo-ph-img-circle {
                width: 30px;
                height: 30px;
                display: flex;
                align-items: center;
                justify-content: center;
                border-radius: 100%;
                border: 2px solid transparent;
                animation: phonering-alo-circle-img-anim 1s infinite ease-in-out;
            }

            .phonering-alo-phone .phonering-alo-ph-img-circle {
                background-color: #ffffff;
            }

            @keyframes phonering-alo-circle-img-anim {

                0%,
                100% {
                    transform: rotate(0) scale(1);
                }

                10%,
                30% {
                    transform: rotate(-25deg) scale(1);
                }

                20%,
                40% {
                    transform: rotate(25deg) scale(1);
                }

                50% {
                    transform: rotate(0) scale(1);
                }
            }
        </style>
        <style>
            :root {
                --primary: #ff9092 !important;
                --gradient_first_color: #ff9092 !important;
                --gradient_second_color: #ff9092 !important;
            }

            .scrollbar::-webkit-scrollbar-thumb {
                width: 3px;
                background: #f2e790;
                border-radius: 5px;

            }

            /* Preloader styles */
            #preloader {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: blur;
                /* Semi-transparent white */
                display: flex;
                align-items: center;
                justify-content: center;
                z-index: 9999;
                backdrop-filter: blur(10px);
            }

            .as_loader {
                position: fixed;
                left: 0;
                top: 0;
                right: 0;
                bottom: 0;
                background-color: transparent;
                z-index: 999;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .as_loader img {
                animation: spin 7s infinite linear;
                -webkit-animation: spin 7s infinite linear;
                -moz-animation: spin 7s infinite linear;
            }

            .as_loader img {
                animation: spin 7s infinite linear;
                -webkit-animation: spin 7s infinite linear;
                -moz-animation: spin 7s infinite linear;
            }

            @keyframes spin {
                0% {
                    transform: rotate(0deg);
                }

                100% {
                    transform: rotate(360deg);
                }
            }

            .rot {
                animation: spin 8s infinite;
            }

            .FontOfAstro {
                font-size: 22px;
                font-weight: 600;
                color: #0a0a5f;
                margin: 10px 5px;
                margin-left: 9px !important;
                font-family: "Montserrat", sans-serif;
            }
        </style>
        <meta name="robots" content="max-image-preview:large" />

        <script src="{{ asset('website/scripts/preload.js') }}"></script>
        <style src="{{ asset('website/styles/preload.css') }}"></style>
        <link rel="stylesheet"
            href="{{ asset('website/plugins/astro-appointment/assets/css/freekundli.css') }}" />

        <!-- LINKS STARTS -->

        <link rel="stylesheet"
            href="{{ asset('website/styles/style.min.css') }}" />
        <link rel="stylesheet"
            href="{{ asset('website/plugins/yith-woocommerce-wishlist/assets/css/jquery.selectBox.css?ver=1.2.0') }}" />
        <link rel="stylesheet"
            href="{{ asset('website/plugins/yith-woocommerce-wishlist/assets/css/font-awesome.css?ver=4.7.0') }}" />
        <link rel="stylesheet"
            href="{{ asset('website/plugins/woocommerce/assets/css/prettyPhoto.css') }}" />


        <link rel="stylesheet"
            href="{{ asset('website/plugins/astro-appointment/assets/css/bootstrap.min.css?ver=5.0.2') }}" />
        <link rel="stylesheet"
            href="{{ asset('website/plugins/astro-appointment/assets/css/bootstrap-datepicker.min.css?ver=1.9.0') }}" />
        <link rel="stylesheet"
            href="{{ asset('website/plugins/astro-appointment/assets/css/bootstrap-datetimepicker.css?ver=1.9.0') }}" />
        <link rel="stylesheet"
            href="{{ asset('website/plugins/astro-appointment/assets/css/astro-font.css?ver=1.0') }}" />
        <link rel="stylesheet"
            href="{{ asset('website/plugins/astro-appointment/assets/css/toastr.min.css?ver=2.1.3') }}" />
        <link rel="stylesheet"
            href="{{ asset('website/plugins/astro-appointment/assets/css/jquery.fancybox.min.css?ver=3.5.7') }}" />
        <link rel="stylesheet"
            href="{{ asset('website/plugins/astro-appointment/assets/css/printarea.css?ver=3.5.7') }}" />
        <link rel="stylesheet"
            href="{{ asset('website/plugins/astro-appointment/assets/css/t-datepicker.min.css?ver=3.5.7') }}" />
        <link rel="stylesheet"
            href="{{ asset('website/plugins/astro-appointment/public/css/astro-public.css?ver=1.0.8') }}" />
        <link rel="stylesheet"
            href="{{ asset('website/plugins/astrologercore/assets/css/toastr.min.css?ver=1') }}" />
        <link rel="stylesheet"
            href="{{ asset('website/plugins/contact-form-7/includes/css/styles.css?ver=5.8.6') }}" />
        <link rel="stylesheet"
            href="{{ asset('website/plugins/pixel-chat/public/css/moto-chat-public.css?ver=1.0.0') }}" />
        <link rel="stylesheet"
            href="{{ asset('website/plugins/wallet-system-for-woocommerce/package/lib/slick/slick.min.css?ver=2.5.5') }}" />
        <link rel="stylesheet"
            href="{{ asset('website/plugins/wallet-system-for-woocommerce/public/css/wps-public.css?ver=2.5.5') }}" />
        <link rel="stylesheet"
            href="{{ asset('website/plugins/woocommerce/assets/css/woocommerce-layout.css?ver=8.4.0') }}" />
        <link rel="stylesheet"
            href="{{ asset('website/plugins/woocommerce/assets/css/woocommerce-smallscreen.css?ver=8.4.0') }}" />
        <link rel="stylesheet"
            href="{{ asset('website/plugins/woocommerce/assets/css/woocommerce.css?ver=8.4.0') }}" />
        <link rel="stylesheet"
            href="{{ asset('website/plugins/yith-woocommerce-quick-view/assets/css/yith-quick-view.css?ver=1.34.0') }}" />
        <link rel="stylesheet"
            href="{{ asset('website/themes/astrologer/style.css?ver=1.0.9') }}" />
        <link rel="stylesheet"
            href="{{ asset('website/themes/astrologer/assets/css/nice-select.css?ver=1') }}" />
        <link rel="stylesheet"
            href="{{ asset('website/themes/astrologer/assets/css/fonts.css?ver=1') }}" />
        <link rel="stylesheet"
            href="{{ asset('website/themes/astrologer/assets/css/swiper-bundle.min.css?ver=1') }}" />
        <link rel="stylesheet"
            href="{{ asset('website/themes/astrologer/assets/css/fontawesome.min.css?ver=1') }}" />
        <link rel="stylesheet"
            href="{{ asset('website/themes/astrologer/assets/css/slick.css?ver=1') }}" />
        <link rel="stylesheet"
            href="{{ asset('website/themes/astrologer/assets/css/magnific.css?ver=1') }}" />
        <link rel="stylesheet"
            href="{{ asset('website/themes/astrologer/assets/css/owl.carousel.css?ver=1') }}" />
        <link rel="stylesheet"
            href="{{ asset('website/themes/astrologer/assets/css/animate.min.css?ver=1') }}" />
        <link rel="stylesheet"
            href="{{ asset('website/themes/astrologer/assets/css/owl.theme.default.css?ver=1') }}" />
        <link rel="stylesheet"
            href="{{ asset('website/themes/astrologer/assets/css/astrologer-custom-style.css?ver=1') }}" />
        <link rel="stylesheet"
            href="{{ asset('website/themes/astrologer/assets/css/astrologer-custom-light-style.css?ver=1') }}" />
        <link rel="stylesheet"
            href="{{ asset('website/plugins/astrologercore/public/css/style.css?ver=6.4.3') }}" />
        <link rel="stylesheet"
            href="{{ asset('website/plugins/js_composer/assets/css/js_composer.min.css?ver=7.3') }}" />


        <link rel="stylesheet"
            href="{{ asset('website/plugins/mage-eventpress/assets/helper/jquery-ui.min.css?ver=1.13.2') }}" />
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css?ver=4.3.0" />
        <link rel="stylesheet"
            href="//cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/all.min.css?ver=5.15.4" />
        <link rel="stylesheet"
            href="{{ asset('website/plugins/mage-eventpress/assets/helper/flaticon/flaticon.css?ver=6.4.3') }}" />
        <link rel="stylesheet"
            href="{{ asset('website/plugins/mage-eventpress/assets/helper/select_2/select2.min.css?ver=4.0.13') }}" />
        <link rel="stylesheet"
            href="{{ asset('website/plugins/mage-eventpress/assets/helper/owl_carousel/owl.carousel.min.css?ver=2.3.4') }}" />
        <link rel="stylesheet"
            href="{{ asset('website/plugins/mage-eventpress/assets/helper/calender/calendar.min.css?ver=6.4.3') }}" />
        <link rel="stylesheet"
            href="{{ asset('website/plugins/mage-eventpress/assets/frontend/filter_pagination.css?ver=1707390364') }}" />
        <link rel="stylesheet"
            href="{{ asset('website/plugins/mage-eventpress/assets/frontend/mpwem_style.css?ver=1707390364') }}" />

        <link
            href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
            rel="stylesheet" />
        <link rel="stylesheet"
            href="{{ asset('website/plugins/astro-appointment/assets/css/responsive.css') }}" />


            <!-- updatedCode.css -->
        <link rel="stylesheet" href="{{ asset(path:'css/updatedCode.css') }}">

        <!-- LINKS ENDS -->

        <!-- SCRIPTS STARTS -->

        <script
            src="{{ asset('website/scripts/jquery/jquery.min.js?ver=3.7.1') }}">
        </script>

        <script
            src="{{ asset('website/plugins/astro-appointment/assets/js/bootstrap.min.js?ver=5.0.2') }}">
        </script>
        <script
            src="{{ asset('website/plugins/astro-appointment/assets/js/bootstrap-datepicker.min.js?ver=5.0.2') }}">
        </script>
        <script
            src="{{ asset('website/plugins/astro-appointment/public/js/astro-public.js?ver=1.0.8') }}">
        </script>
        <script
            src="{{ asset('website/plugins/pixel-chat/public/js/moto-chat-public.js?ver=1.0.0') }}">
        </script>
        <script
            src="{{ asset('website/plugins/wallet-system-for-woocommerce/package/lib/slick/slick.min.js?ver=2.5.5') }}">
        </script>
        <script
            src="{{ asset('website/plugins/wallet-system-for-woocommerce/common/src/js/wallet-system-for-woocommerce-common.js?ver=2.5.5') }}">
        </script>
        <script
            src="{{ asset('website/plugins/mage-eventpress/assets/helper/select_2/select2.min.js?ver=4.0.13') }}">
        </script>
        <script
            src="{{ asset('website/plugins/mage-eventpress/assets/helper/owl_carousel/owl.carousel.min.js?ver=2.3.4') }}">
        </script>
        <script
            src="{{ asset('website/plugins/wallet-system-for-woocommerce/public/src/js/wallet-system-for-woocommerce-public.js?ver=2.5.5') }}">
        </script>

        <!-- SCRIPTS ENDS -->


        <!-- <link rel="icon" href="{{ asset('website/uploads/sites/3/2021/09/vas_1.png') }}" sizes="32x32" />
    <link
      rel="icon"
      href="{{ asset('website/uploads/sites/3/2021/09/vas_1.png') }}"
      sizes="192x192"
    /> -->

        <link rel="apple-touch-icon"
            href="{{ asset('website/uploads/sites/3/2021/09/vas_1.png') }}" />
        <meta name="msapplication-TileImage"
            content="{{ asset('website/uploads/sites/3/2021/09/vas_1.png') }}" />

        <style>
            .btn-open-popup:hover {
                background-color: #4caf50;
            }

            .overlay-container {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.6);
                justify-content: center;
                align-items: center;
                opacity: 0;
                transition: opacity 0.3s ease;
            }

            .popup-box {
                background: #fff;
                padding: 24px;
                border-radius: 12px;
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.4);
                width: 380px;
                text-align: center;
                opacity: 0;
                transform: scale(0.8);
                animation: fadeInUp 0.5s ease-out forwards;
            }

            .form-container {
                display: flex;
                flex-direction: column;
            }

            .form-label {
                margin-bottom: 10px;
                font-size: 16px;
                color: #444;
                text-align: left;
            }

            .form-input {
                padding: 10px;
                margin-bottom: 20px;
                border: 1px solid #ccc;
                border-radius: 8px;
                font-size: 16px;
                width: 100%;
                box-sizing: border-box;
            }

            .btn-submit,
            .btn-close-popup {
                padding: 12px 24px;
                border: none;
                border-radius: 8px;
                cursor: pointer;
                transition: background-color 0.3s ease, color 0.3s ease;
            }

            .btn-submit {
                background-color: green;
                color: #fff;
            }

            #preloader {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: blur;
                display: flex;
                align-items: center;
                justify-content: center;
                z-index: 9999;
                backdrop-filter: blur(10px);
            }
        </style>

    </head>

    <body
        class="home page-template-default page page-id-13 wp-embed-responsive theme-astrologer moc_chat_win woocommerce-no-js astrologer-demo wpb-js-composer js-comp-ver-7.3 vc_responsive">

        <!-- Preloader -->
        {{-- <div id="preloader">
            <div class="loader">
                <div class="as_loader">
                    <img src="https://kamleshyadav.com/html/astrology/version-3/assets/images/loader.png"
                        alt="" class="img-responsive" width="10%"
                        style="border-radius: 25%;">
                </div>
            </div>
        </div> --}}
        {{--  <div id="preloader">
            <div class="loader" style="    display: flex;
    align-items: center;
    justify-content: center;">
                <img src="{{ url('website/uploads/sites/3/2021/08/pandit.png') }}"
                    alt="" width="50%"
                    style="border-radius: 25%; z-index: 999;">
                <img class="rot" style=" width: 290px;
    position: absolute; opacity: 0.5;" src="{{ url('loader/chakra_one.png') }}"
                    alt="">
            </div>
        </div>  --}}
        @include('website.website_header')
        <!-- @include('parasar_kundli.parasar_kundli_popup') -->
        @yield('content')

        @include('website.website_footer')
        <div class="callWithUs" id='ringCall'>
            <div class="phonering-alo-phone phonering-alo-green phonering-alo-show"
                id="phonering-alo-phoneIcon">

                <div class="phonering-alo-ph-img-circle">
                    <i class="fa-solid fa-phone"></i>
                </div>

            </div>

            <div class="numberShow" id="numberShow">
                <a href="tel:9294549294"><h2>9294 - 54 - 9294</h2></a>
            </div>

        </div>
        </div>
        <script>
            const ringCall = document.querySelector("#ringCall");
                                const numberShow = document.querySelector("#numberShow");

                                ringCall.addEventListener("click", () => {
                                        numberShow.classList.add("showNumber");

                                        setTimeout(() => {
                                            numberShow.classList.remove("showNumber");
                                        }, 7000);

                                });

        </script>
        @include('website.website_chatbot_script')
        @if(Auth::check())
        @php
        $walletInfo = Auth::user()
        ->getWalletInfo()
        ->where('status', 'completed')
        ->sum('amount');
        @endphp
        @if(Auth::user()->type == 'user')
        @include('popup.web_recharge_popup',['walletInfo' =>
        getBalanceAmount($walletInfo,0),'packages' => getPackages()])
        @endif
        @endif
        @if (Session::has('error'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                        document.querySelector('#popup').style.display = "flex";
                    });

                    function show() {
                    let plusButton = document.getElementById("plus_button");
                    plusButton.style.display = "block";
                    }

                    function hide() {
                    let plusButton = document.getElementById("plus_button");
                    plusButton.style.display = "none";
                    }
        </script>
        @endif

        <link
            href="https://fonts.googleapis.com/css?family=Roboto:400%7CPhilosopher:400&display=swap"
            rel="stylesheet" property="stylesheet" media="all"
            type="text/css" />
        <script>
            document.addEventListener("DOMContentLoaded", function() {
            // Hide preloader when the content is fully loaded
            window.onload = function() {
                var preloader = document.getElementById('preloader');
                var content = document.getElementById('content');
                preloader.style.display = 'none';
                // content.style.display = 'block';
            };
        });
        </script>
        <script type="text/javascript"></script>
        <script></script>
        <link rel="preload" as="font" id="rs-icon-set-revicon-woff"
            href="{{ asset('website/plugins/revslider/public/assets/fonts/revicons/revicons.woff?5510888') }}"
            type="font/woff" crossorigin="anonymous" media="all" />

        <script type="text/template" id="tmpl-variation-template">
            <div class="woocommerce-variation-description"></div>
    <div class="woocommerce-variation-price"></div>
    <div class="woocommerce-variation-availability"></div>

  </script>
        <script type="text/template" id="tmpl-unavailable-variation-template">
            <p>Sorry, this product is unavailable. Please choose a different combination.</p>
  </script>
        <link rel="stylesheet" id="photoswipe-css"
            href="{{ asset('website/plugins/woocommerce/assets/css/photoswipe/photoswipe.min.css?ver=8.4.0') }}"
            media="all" />
        <link rel="stylesheet" id="photoswipe-default-skin-css"
            href="{{ asset('website/plugins/woocommerce/assets/css/photoswipe/default-skin/default-skin.min.css?ver=8.4.0') }}"
            media="all" />
        <link rel="stylesheet" id="rs-plugin-settings-css"
            href="{{ asset('website/plugins/revslider/public/assets/css/rs6.css?ver=6.6.20') }}"
            media="all" />

        <script
            src="{{ asset('website/plugins/yith-woocommerce-wishlist/assets/js/jquery.selectBox.min.js?ver=1.2.0') }}"
            id="jquery-selectBox-js"></script>
        <script
            src="{{ asset('website/plugins/woocommerce/assets/js/prettyPhoto/jquery.prettyPhoto.min.js') }}"
            id="prettyPhoto-js" data-wp-strategy="defer"></script>


        <script
            src="{{ asset('website/plugins/astro-appointment/assets/js/toastr.min.js?ver=2.1.3') }}"
            id="toastr-js">
        </script>
        <script
            src="{{ asset('website/plugins/astro-appointment/assets/js/jquery.fancybox.min.js?ver=3.5.7') }}"
            id="fancybox-js"></script>
        <script
            src="{{ asset('website/plugins/astro-appointment/assets/js/jquery.cookie.min.js?ver=3.5.7') }}"
            id="cookie-js">
        </script>
        <script
            src="{{ asset('website/plugins/astro-appointment/assets/js/bootstrap-datetimepicker.min.js?ver=3.5.7') }}"
            id="bootstrap-datetimepicker-js"></script>
        <script
            src="{{ asset('website/plugins/astro-appointment/assets/js/jquery.PrintArea.js?ver=3.5.7') }}"
            id="printarea-js"></script>
        <script
            src="{{ asset('website/plugins/astro-appointment/assets/js/t-datepicker.min.js?ver=3.5.7') }}"
            id="t-datepicker-js"></script>
        <script
            src="{{ asset('website/plugins/astro-appointment/assets/js/astro-fullcalendar.js?ver=1.6.4') }}"
            id="astro-fullcalendar-js"></script>
        <script id="astrologercore-forent-custom-script-js-extra">
            var frontadminajax = {
            ajax_url: "https:\/\/kamleshyadav.com\/wp\/astrologer\/demo2\/wp-admin\/admin-ajax.php",
            switch_header: "true",
        };
        </script>
        <script
            src="{{ asset('website/plugins/astrologercore//assets/js/astrologercore-forent-custom-script.js?ver=1.0') }}"
            id="astrologercore-forent-custom-script-js"></script>

        <script
            src="{{ asset('website/plugins/revslider/public/assets/js/rbtools.min.js?ver=6.6.20') }}"
            defer async id="tp-tools-js"></script>
        <script
            src="{{ asset('website/plugins/revslider/public/assets/js/rs6.min.js?ver=6.6.20') }}"
            defer async id="revmin-js"></script>
        <script
            src="{{ asset('website/plugins/wallet-system-for-woocommerce/package/lib/datatables/media/js/jquery.dataTables.min.js?ver=2.5.5') }}"
            id="wps-datatable-js"></script>
        <script
            src="{{ asset('website/plugins/wallet-system-for-woocommerce/public/js/wps-public.min.js?ver=2.5.5') }}"
            id="wps-public-min-js"></script>
        <script
            src="{{ asset('website/plugins/wallet-system-for-woocommerce/public/src/js/wallet-system-for-woocommerce-enable-link.js?ver=2.5.5') }}"
            id="wps-script-wallet-js"></script>

        <script
            src="{{ asset('website/plugins/yith-woocommerce-quick-view/assets/js/frontend.min.js?ver=1.34.0') }}"
            id="yith-wcqv-frontend-js"></script>
        <script
            src="{{ asset('website/themes/astrologer/assets/js/bootstrap.bundle.min.js?ver=20151215') }}"
            id="bootstrap-bundle-js"></script>
        <script
            src="{{ asset('website/themes/astrologer/assets/js/smooth-scroll.min.js?ver=20151215') }}"
            id="smooth-scroll-js"></script>
        <script
            src="{{ asset('website/themes/astrologer/assets/js/slick.min.js?ver=20151215') }}"
            id="slickmin-js"></script>
        <script
            src="{{ asset('website/themes/astrologer/assets/js/owl.carousel.js?ver=20151215') }}"
            id="owl-js"></script>
        <script
            src="{{ asset('website/themes/astrologer/assets/js/wow.min.js?ver=20151215') }}"
            id="wow-js"></script>
        <script
            src="{{ asset('website/themes/astrologer/assets/js/maginific.js?ver=20151215') }}"
            id="maginific-js"></script>
        <script
            src="{{ asset('website/themes/astrologer/assets/js/jquery.nice-select.min.js?ver=20151215') }}"
            id="jquery-nice-select-js"></script>
        <script
            src="{{ asset('website/themes/astrologer/assets/js/swiper-bundle.min.js?ver=20151215') }}"
            id="swiper-bundle-js"></script>
        <script
            src="{{ asset('website/themes/astrologer/assets/js/astrologer-custom-script.js?ver=20151215') }}"
            id="astrologer-custom-script-js"></script>
        <script
            src="{{ asset('website') }}/themes/astrologer/assets/js/navigation.js?ver=1.0.9"
            id="astrologer-navigation-js">
        </script>
        <script src="{{ asset('website/scripts/core.min.js?ver=1.13.2') }}"
            id="jquery-ui-core-js"></script>
        <script
            src="{{ asset('website/scripts/datepicker.min.js?ver=1.13.2') }}"
            id="jquery-ui-datepicker-js"></script>
        <script id="jquery-ui-datepicker-js-after"></script>
        <script src="{{ asset('website/scripts/accordion.min.js?ver=1.13.2') }}"
            id="jquery-ui-accordion-js"></script>
        <script
            src="{{ asset('website/plugins/mage-eventpress/assets/helper/timeline/timeline.min.js?ver=1') }}"
            id="mep-timeline-min-js"></script>
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment-with-locales.min.js?ver=1"
            id="mep-moment-js-js"></script>
        <script
            src="{{ asset('website/plugins/mage-eventpress/assets/helper/calender/calendar.min.js?ver=1') }}"
            id="mep-calendar-scripts-js"></script>
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/mixitup/3.3.0/mixitup.min.js?ver=3.3.0"
            id="mep-mixitup-min-js-js">
        </script>
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/jquery.countdown/2.2.0/jquery.countdown.min.js?ver=1"
            id="mep-countdown-js-js"></script>
        <script
            src="{{ asset('website/plugins/mage-eventpress/assets/frontend/filter_pagination.js?ver=1707390364') }}"
            id="filter_pagination-js"></script>
        <script
            src="{{ asset('website/plugins/mage-eventpress/assets/frontend/mpwem_script.js?ver=1707390364') }}"
            id="mpwem_script-js"></script>
        <script
            src="{{ asset('website/plugins/js_composer/assets/js/dist/js_composer_front.min.js?ver=7.3') }}"
            id="wpb_composer_front_js-js"></script>
        <script
            src="{{ asset('website/scripts/underscore.min.js?ver=1.13.4') }}"
            id="underscore-js"></script>

        <script src="{{ asset('website/scripts/wp-util.min.js?ver=6.4.3') }}"
            id="wp-util-js"></script>
        <script id="wc-add-to-cart-variation-js-extra"></script>
        <script
            src="{{ asset('website/plugins/woocommerce/assets/js/frontend/add-to-cart-variation.min.js?ver=8.4.0') }}"
            id="wc-add-to-cart-variation-js" defer data-wp-strategy="defer">
        </script>
        <script
            src="{{ asset('website/plugins/woocommerce/assets/js/zoom/jquery.zoom.min.js?ver=1.7.21-wc.8.4.0') }}"
            id="zoom-js" defer data-wp-strategy="defer"></script>
        <script
            src="{{ asset('website/plugins/woocommerce/assets/js/photoswipe/photoswipe.min.js?ver=4.1.1-wc.8.4.0') }}"
            id="photoswipe-js" defer data-wp-strategy="defer"></script>
        <script
            src="{{ asset('website/plugins/woocommerce/assets/js/photoswipe/photoswipe-ui-default.min.js?ver=4.1.1-wc.8.4.0') }}"
            id="photoswipe-ui-default-js" defer data-wp-strategy="defer">
        </script>
        <script id="wc-single-product-js-extra"></script>
        <script
            src="{{ asset('website/plugins/woocommerce/assets/js/frontend/single-product.min.js?ver=8.4.0') }}"
            id="wc-single-product-js" defer data-wp-strategy="defer"></script>

        <script id="rs-initialisation-scripts"></script>

        <!-- DEFER SCRIPTS STARTS -->

        <script
            src="{{ asset('website/plugins/woocommerce/assets/js/jquery-blockui/jquery.blockUI.min.js?ver=2.7.0-wc.8.4.0') }}">
        </script>
        <script
            src="{{ asset('website/plugins/woocommerce/assets/js/js-cookie/js.cookie.min.js?ver=2.1.4-wc.8.4.0') }}">
        </script>
        <script
            src="{{ asset('website/plugins/woocommerce/assets/js/frontend/woocommerce.min.js?ver=8.4.0') }}">
        </script>
        <script src="{{ asset('website/scripts/astrobuddy.js') }}"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function () {
            let debounceTimer;
            let cache = {}; // Cache for storing previous results
            let activeRequest = null; // Track active request

            $(document).on('input', '.city-input', function () {
                let inputField = $(this);
                let query = inputField.val().trim();
                let suggestionsList = inputField.siblings('.suggestions');

                // Clear suggestions if input is too short
                if (query.length < 3) {
                    suggestionsList.empty();
                    return;
                }

                // If cached data exists, use it instead of making a new API call
                if (cache[query]) {
                    displaySuggestions(cache[query], inputField, suggestionsList);
                    return;
                }

                // Clear previous debounce timer
                clearTimeout(debounceTimer);

                // Set a new debounce timer to delay the API request
                debounceTimer = setTimeout(() => {
                    // Abort the previous request if it's still ongoing
                    if (activeRequest) {
                        activeRequest.abort();
                    }

                    // Make an API request
                    activeRequest = $.ajax({
                        url: '/api/geo-search',
                        type: 'GET',
                        data: { city: query },
                        success: function (data) {
                            cache[query] = data.response; // Cache the response
                            displaySuggestions(data.response, inputField, suggestionsList);
                        },
                        error: function () {
                            suggestionsList.empty();
                        },
                        complete: function () {
                            activeRequest = null; // Reset active request tracking
                        }
                    });
                }, 300); // 300ms debounce time
            });
            // Function to display suggestions
            function displaySuggestions(suggestions, inputField, suggestionsList) {
                suggestionsList.empty();
                if (suggestions && suggestions.length > 0) {
                    suggestions.forEach(function (suggestion) {
                        let item = $('<div class="suggestion-item"></div>').text(suggestion.full_name);
                        item.data('lat', suggestion.coordinates[0]);
                        item.data('lon', suggestion.coordinates[1]);
                        suggestionsList.append(item);
                    });

                    // Click event for selecting a suggestion
                    suggestionsList.find('.suggestion-item').on('click', function () {
                        inputField.val($(this).text());
                        inputField.siblings('.lat-input').val($(this).data('lat'));
                        inputField.siblings('.lon-input').val($(this).data('lon'));
                        suggestionsList.empty();
                    });
                }
            }
        });
        </script>
    </body>

</html>
