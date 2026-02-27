<!DOCTYPE html>
<html lang="en">
     <title>AstroBuddy | @yield('title')</title>
        <link rel="icon" href="{{asset('website/astro_link_icon.ico')}}"
            sizes="32x32" />
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>AstroBuddy | Astrologers</title>
        <link rel="icon"
            href="{{asset('website/uploads/sites/3/2021/09/vas_1.png')}}"
            sizes="32x32" />
        <link rel="icon"
            href="{{asset('website/uploads/sites/3/2021/09/vas_1.png')}}"
            sizes="192x192" />
        <link rel="stylesheet"
            href="{{ asset('website/styles/style.min.css')}}" />
        <link rel="stylesheet"
            href="{{ asset('website/plugins/astro-appointment/assets/css/freekundli.css')}}" />
        <link rel="stylesheet"
            href="{{ asset('website/plugins/astro-appointment/assets/css/responsive.css')}}">

        <link rel="stylesheet" type="text/css"
            href="{{ asset('website/plugins/astro-appointment/assets/css/bootstrap.css')}}" />
        <link rel="stylesheet" type="text/css"
            href="{{ asset('website/plugins/astro-appointment/assets/css/astropandit.css')}}" />
        <link rel="stylesheet" type="text/css"
            href="{{ asset('website/plugins/astro-appointment/assets/css/style.css')}}" />
        <link rel="stylesheet"
            href="{{ asset('website/themes/astrologer/assets/css/astrologer-custom-style.css?ver=1')}}" />

        <link rel="stylesheet"
            href="{{ asset('website/plugins/astro-appointment/assets/css/bestastro.css')}}" />
        <link rel="stylesheet"
            href="{{ asset('website/plugins/astro-appointment/assets/css/somefooter.css')}}" />
        <link rel="stylesheet"
            href="{{ asset('website/themes/astrologer/assets/css/astrologer-custom-light-style.css?ver=1')}}" />
        <link
            href="https://fonts.googleapis.com/css?family=Roboto:400%7CPhilosopher:400&display=swap"
            rel="stylesheet" property="stylesheet" media="all"
            type="text/css" />
        <link
            href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
            rel="stylesheet" />
        <link rel="stylesheet"
            href="{{ asset('website/plugins/astro-appointment/assets/css/responsive.css')}}">
        <style type="text/css" data-type="vc_shortcodes-custom-css">
            .astroteam {
                background-image: url("{{ asset('website/assets/Zodiac/panditback.webp')}}");
            }

            #astrologom {
                animation: spin 9s infinite linear;
            }

            @keyframes spin {
                from {
                    transform: rotate(0deg);
                }

                to {
                    transform: rotate(360deg);
                }
            }

            .astropandit {
                float: left;
                width: 100%;
                position: relative;
                background-color: #111111;
                z-index: 1;
                background-image: url("{{ asset('website/assets/Zodiac/contact.jpg')}}");
                background-size: cover;
                background-attachment: fixed;
                margin-bottom: 70px;
            }
        </style>

        <style>
            .hidden-content {
                position: absolute;
                bottom: 25%;
                /* Start off-screen */
                left: 0;
                right: 0;
                background-color: #f0e68c;
                color: white;
                padding: 5px 0;
                text-align: center;
                opacity: 0;
                transform: translateY(100%);
                transition: transform 0.3s ease, opacity 0.3s ease;
                z-index: 1;
                border-radius: 5px;
            }

            .hidden-content p {
                display: flex !important;
                justify-content: space-evenly;
                width: 90%;
                margin: 0 auto;
            }

            .rr-appointment-card {
                position: relative;
                overflow: hidden;
            }


            .rr-appointment-card:hover .hidden-content {
                transform: translateY(0);
                opacity: 1;
            }
        </style>
    </head>

    <body>
        @include('website.website_header')
        <!--Slider Start-->
        <div class="astropandit">
            <div class="astrooverlay"></div>
            <div class="ast_banner_text">
                <div class="ast_waves3">
                    <div class="ast_wave"></div>
                    <div class="ast_wave"></div>
                    <div class="ast_wave"></div>
                </div>
                <div class="appointment">
                    <div class="appheading">
                        <h2>Astrologers</h2>
                    </div>

                    <ul class="homeapp">
                        <li><a href="{{ url('/') }}">home</a></li>
                        <li>//</li>
                        <li>
                            <a class="hh2appoint">Astrologers</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="ast_packages_wrapper ast_bottompadder70">
            <div class="astropfirst">
                <h3>
                    Our Astrologers
                    <hr />
                </h3>
                <p>
                    Meet Our Expert Astrologers at AstroBuddy! Unlock the
                    mysteries of the cosmos with our team of seasoned
                    astrologers who are dedicated to guiding you through life's
                    celestial journey. Whether you're seeking
                    insights into love, career, finances, or personal growth,
                    our skilled astrologers are here to provide
                    personalized consultations and meaningful conversations.
                    Connect with our knowledgeable experts today
                    and embark on a transformative exploration of the stars.
                </p>
            </div>
            <div class="appointastrojd">
                <div class="astroteamcards">
                    <!-- <h3>appointment form</h3> -->
                    <div class="upperastro" style="flex-wrap:wrap;">
                        @foreach($astrologers as $astrologer)
                        <div class="swiper-slide">

                            <div class="rr-container">
                                <div class="rr-appointment-card"
                                    onclick='portfolio("{{$astrologer->id}}")'>
                                    <div class="label" style="background:{{ $astrologer->astrologerDetail->getTag->color ?? 'rgb(121, 24, 120)' }}">
                                        <h3 class='PremiumCards'>{{ $astrologer->astrologerDetail->getTag->name ?? '' }}</h3>
                                    </div>
                                    <img src="{{ asset($astrologer->avtar) ?? 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png' }}"
                                        alt="Astrologer Photo"
                                        class="rr-astrologer-photo" />
                                    <h2 class="rr-astrologer-name">{{
                                        $astrologer->name ?? ''}}</h2>
                                        <span class="" style="font-size: 13px;"
                                            id="user-{{ $astrologer->id }}-status">
                                            Checking.
                                        </span>
                                    <hr />

                                    <div class="rr-appointment-details">
                                        <p class="rr-payment">Click Here</p>
                                    </div>

                                    <div
                                        class="rr-appointment-details hidden-content">
                                        <p class="rr-payment">
                                            <a href="{{ url('appointment/call', encrypt($astrologer->id)) }}"><span><i
                                                        class="fa-solid fa-phone"></i></span></a>
                                            <a href="{{ url('appointment/vcall', encrypt($astrologer->id)) }}"><span><i
                                                        class="fa-solid fa-video"></i></span> </a>
                                            <a href="{{ url('appointment/chat', encrypt($astrologer->id)) }}"><span><i
                                                        class="fa-brands fa-rocketchat"></i></span></a>

                                        </p>
                                    </div>

                                </div>

                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        </div>
        @include('website.website_footer')
        <script src="https://kit.fontawesome.com/66f2518709.js"
            crossorigin="anonymous"></script>
        <script
            src="{{ asset('website/scripts/jquery/jquery.min.js?ver=3.7.1')}}">
        </script>
        <script
            src="{{ asset('website/themes/astrologer/assets/js/astrologer-custom-script.js?ver=20151215')}}"
            id="astrologer-custom-script-js"></script>
        <script src="{{ asset('website/scripts/astrobuddy.js') }}"></script>
    </body>
</html>
