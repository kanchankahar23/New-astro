@extends('website.dashboard_master')
@section('title', 'Dashboard')
@section('content')

    <style>
        .circle {
        height: 22px !important;
        border-radius: 7% !important;
        bottom: 49% !important;
        right: -75px !important;
        }
        .mainpanditimage {
            background-image: url({{ asset('website_dashboard_assets/images/astrobuddy_pandit.png') }});
        }

        .clients.active {
            scale: 1;
            opacity: 1;
        }

        .clients {
            transition: all 0.25s ease;
            scale: 0.5;
            opacity: 0;
            width: 80%;
            left: 0%;
            cursor: pointer;
        }

        /* .jobbox-grid-item do not switch this class */
        .jobbox-grid-item {
            max-width: 28%;
            border-radius: 8px;
            border: 1px solid #E0E6F7;
            overflow: hidden;
            height: 100%;
            position: relative;
            background: #ffffff;
            padding-right: 7px;
            padding-left: 7px;
            padding-top: 7px;
            border-radius: 15px;
        }

        .astrouppercards {
            width: 100%;
            height: 100px;
            border-radius: 10px;
            background: linear-gradient(-13deg, rgb(19 31 88), rgb(42 209 109));
            position: relative;
            display: flex;
            align-items: center;
            justify-content: end;
        }

        .astrouppercards h2 {
            color: white !important;
            font-size: 15px;
            width: 70%;
            margin-right: 0;
            text-transform: uppercase;
        }

        .profilebox {
            position: absolute;
            bottom: -31%;
            left: 10%;
            width: 70px;
            height: 70px;
            border-radius: 50%;
            /* overflow: hidden; */
            border: 3px solid white;
        }

        .newcircle {
            left: 7% !important;
            width: 63px !important;
            height: 63px !important;
        }

        .newcircle {
            left: 7% !important;
            width: 63px !important;
            height: 63px !important;
        }

        /* .circle {
            background-color: #1a585f;
            width: 15px;
            height: 15px;
            border-radius: 50%;
            position: absolute;
            bottom: 0%;
            right: 0;
            z-index: 1000;

            background-color: #1a585f; }*/
        .circle {
            width: auto;
            height: 12px;
            border-radius: 14%;
            position: absolute;
            bottom: 0%;
            right: -34px;
            z-index: 1000;
            font-size: xx-small;
        }



        .lowerbox {
            margin-top: 0px 0;
            width: 100%;
            display: flex;
            flex-direction: column;
        }

        .astroname {
            margin-top: 40px !important;
            margin: 0 auto;
            width: 90%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .name {
            width: 70%;
            display: flex;
            align-items: center;
            justify-content: start;
        }

        .name h3 {
            font-size: 14px;
            margin-bottom: 0;
            font-weight: 500;
            color: black !important;
        }

        .chataap {
            width: 30%;
            display: flex;
            align-items: center;
            justify-content: end;
        }

        .chataap button {
            background: #1a585f;
            width: 83px;
            height: 25px;
            color: white;
            font-size: 14px;
            border: none;
            border-radius: 13px;
            font-weight: 500;
        }

        .chatbtn {
            background: #1a585f;
            width: 83px;
            height: 25px;
            color: white;
            font-size: 14px;
            border: none;
            border-radius: 13px;
            font-weight: 500;
        }

        .minstar {
            width: 90%;
            margin: 0 auto;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .rate-reviews-small {
            width: 50%;
            display: flex;
            align-items: center;
            justify-content: start;
        }

        .minutes {
            width: 50%;
            display: flex;
            align-items: center;
            padding-right: 12px;
            justify-content: end;
        }

        .minutes p {
            margin: 0 0;
            font-size: 14px;
            font-weight: 600;
            color: #29292a;
        }

        .upperbox2 {
            width: 100%;
            height: 100px;
            border-radius: 10px;
            background: linear-gradient(-13deg, rgb(19 31 88), rgb(42 209 109));
            position: relative;
            display: flex;
            align-items: center;
            justify-content: end;
        }

        .circle2 {
            background-color: #353949;
            width: 15px;
            height: 15px;
            border-radius: 50%;
            position: absolute;
            bottom: 0%;
            right: 0;
            z-index: 1000;
        }

        .upperbox2 h2 {
            color: white !important;
            font-size: 15px;
            width: 70%;
            margin-right: 0;
            text-transform: uppercase;
        }

        .chataap2 {
            width: 45%;
            display: flex;
            align-items: center;
            justify-content: end;
        }

        .chataap2 button {
            background: #353949;
            width: 83px;
            height: 25px;
            color: white;
            font-size: 14px;
            border: none;
            border-radius: 13px;
            font-weight: 500;
        }

        .upperbox3 {
            width: 100%;
            height: 100px;
            border-radius: 10px;
            background: linear-gradient(-13deg, rgb(22 19 15), rgb(227 20 20));
            position: relative;
            display: flex;
            align-items: center;
            justify-content: end;
        }

        .circle3 {
            background-color: #681311;
            width: 15px;
            height: 15px;
            border-radius: 50%;
            position: absolute;
            bottom: 0%;
            right: 0;
            z-index: 1000;
        }

        .chataap3 {
            width: 45%;
            display: flex;
            align-items: center;
            justify-content: end;
        }

        .chataap3 button {
            background: #681311;
            width: 83px;
            height: 25px;
            color: white;
            font-size: 14px;
            border: none;
            border-radius: 13px;
            font-weight: 500;
        }

        .upperbox3 h2 {
            color: white !important;
            font-size: 15px;
            width: 70%;
            margin-right: 0;
            text-transform: uppercase;
        }

        .lowertransaction {
            margin: 15px auto;
        }

        .alltransaction {
            width: 90%;
            margin: 10px auto;
            margin-bottom: 22px;
        }

        /* ************************************************************************************************ */

        .rightusername2 {
            display: flex;
            justify-content: center;
            align-items: center;
            /* height: 100vh; */
        }

        .upcomingappointment {
            text-align: center;
            margin-left: 8%;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        #up {
            color: #fff !important;
            overflow: hidden !important;
            font-size: 21px;
            padding-bottom: 20px;
        }

        .countdown-timer {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 3px;
            font-family: 'Arial', sans-serif;
            font-size: 20px;
            color: white;
        }

        .firstboxes {
            display: flex;
            flex-direction: column;
            align-items: center;
            color: #fff;
        }

        .firstboxes div {
            font-size: 1.5em;
            margin-bottom: 5px;
        }

        .firstboxes label {
            font-size: 0.7em;
            color: #fff;
        }

        #timing {
            color: #fff;
            font-size: 2em;
            margin: 0 5px;
            position: relative;
            bottom: 18px !important;
        }

        .countdown-label {
            margin-top: 10px;
            font-size: 1.2em;
            color: #333;
        }


        /* ************************************************************************************************ */
    </style>

    <body>
        <div class="row">
            <section class="usermainname ">
                <div class="container-fluid whiteboxescont">

                    <div class="leftusername" style="margin-top: 7px;">
                        <div class="twosections">
                            <div class="nameofuser">
                                <div class="iconname"><i class="fa-solid fa-user"></i>
                                    <h3>{{ ucwords($user->name) ?? '' }}</h3>
                                </div>
                                <div class="iconname"><i class="fa-solid fa-sign-hanging"></i>
                                    <h3>Rashi - {{ ucwords($user->userDetails->rashi ?? 'Na') }}</h3>
                                </div>

                            </div>
                            <div class="nameofuser2">
                                <div class="iconname" style="justify-content: end;"><i class="fa-solid fa-phone"></i>
                                    <h3>{{ ucwords($user->mobile ?? '') }}</h3>
                                </div>
                                <div class="iconname" style="justify-content: end;"><i class="fa-solid fa-location-dot"></i>
                                    <h3> Place - {{ ucwords($user->userDetails->pob ?? '') }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 mb-1 twosections2">
                            @if (isset($astrologers) && $astrologers->count() != 0)
                                @foreach ($astrologers as $astrologer)
                                    <div class="clients" style="position:absolute;cursor:pointer;">
                                        <div class="col-xl-4 col-lg-4 col-md-6 jobbox-grid-item">
                                            <div class="astrouppercards" style="height: 80px;">
                                                <h2>{{ ucfirst($astrologer->expertise ?? 'Vedic / Numerology') }}</h2>
                                                <div class="profilebox newcircle">
                                                    <img src="{{ $astrologer->avtar ?? '' }}" alt="" width="100%"
                                                        style="border-radius: 50%;width: 58px !important;
                                                        height: 58px !important;">
                                                        <span class="badge badge-dark circle"
                                                            style="    padding: 7px 7px;    font-size: 11px;font-weight: 500;cursor: pointer;"
                                                            id="user-{{ $astrologer->id }}-status">
                                                            Checking.
                                                        </span>
                                                    </div>
                                            </div>

                                            <div class="lowerbox">
                                                <div class="astroname">
                                                    <div class="name">
                                                        <h3>{{ $astrologer->name ?? '' }}</h3>
                                                    </div>
                                                    <div class="chataap">
                                                        <a href="{{ url('chat-with')}}"
                                                            target="_blank" class="chatbtn"
                                                            style="color: #fff; padding:3px 16px;">Chat</a>

                                                
                                                    </div>
                                                </div>

                                                <div class="minstar" style="margin-top: 10px;">
                                                    <div class="rate-reviews-small">
                                                        @php
                                                        $totalRatings = $astrologer->GetRating->count();
                                                        $rating = $totalRatings > 0
                                                        ? $astrologer->GetRating->sum('rating') / $totalRatings:3;
                                                        @endphp
                                                        {{--  @php
                                                        $rating = $astrologer->GetRating->sum('rating')/
                                                        $astrologer->GetRating->count()
                                                        @endphp  --}}
                                                        @for ($i = 1; $i <= (int) $rating; $i++)
                                                            <i style="color: #ffeb3bc9" class="fa-solid fa-star"></i>
                                                            @endfor
                                                           @if($rating - floor($rating) >= 0.5)
                                                            <i style="color: #ffeb3bc9" class="fa-solid fa-star-half-stroke"></i>
                                                            @endif
                                                        <span class="ml-10 font-xs color-text-mutted"><span></span><span
                                                                class="starnumber">{{ number_format($rating, 1) }}</span><span></span></span>
                                                               {{--  {{ $astrologer->GetRating->rating }}  --}}

                                                    </div>
                                                    <div class="minutes">
                                                        <p><span><i class="fa-solid fa-indian-rupee-sign"
                                                                    style="color: rgb(0, 0, 0); margin-right: 0px; font-size: 14px; font-weight: 600; opacity: 0.8;"
                                                                    aria-hidden="true"></i>
                                                                {{ $astrologer->astrologerDetail->charge_per_min ?? ' 0 ' }}/</span>min
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                @endforeach
                            @else
                                <div class="clients" style="position:absolute;cursor:pointer;">
                                    <div class="col-xl-4 col-lg-4 col-md-6 jobbox-grid-item">
                                        <div class="astrouppercards" style="height: 80px;">
                                            <h2>Explore Astrologers</h2>
                                            <div class="profilebox newcircle">
                                                <img src="{{ asset('website_dashboard_assets/images/astrobuddy_pandit.png') }}"
                                                    alt="" width="100%" style="border-radius: 50%;">


                                            </div>
                                        </div>

                                        <div class="lowerbox">
                                            <div class="astroname">
                                                <div class="name">
                                                    <h3><img src="{{ asset('website/astro_link_icon.png') }}"
                                                            alt="no image" height="30">Astro-Buddy</h3>
                                                </div>
                                                <div class="chataap">
                                                    <a href="{{ url('chat-with') }}" target="_blank" class="chatbtn"
                                                        style="color: #fff; padding:3px 16px;">Chat</a>
                                                </div>
                                            </div>

                                            <div class="minstar" style="margin-top: 10px;">
                                                <div class="rate-reviews-small">
                                                    <i class="fa-regular fa-star"></i>
                                                    <i class="fa-regular fa-star"></i>
                                                    <i class="fa-regular fa-star"></i>
                                                    <i class="fa-regular fa-star"></i>
                                                    <i class="fa-regular fa-star"></i>
                                                    <span class="ml-10 font-xs color-text-mutted"><span></span><span
                                                            class="starnumber">(Ratings)</span><span></span></span>
                                                </div>
                                                <div class="minutes">
                                                    <p><span><i class="fa-solid fa-indian-rupee-sign"
                                                                style="color: rgb(0, 0, 0); margin-right: 0px; font-size: 14px; font-weight: 600; opacity: 0.8;"
                                                                aria-hidden="true"></i> 5/</span>min</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            @endif
                            <div class="progressbar" style="z-index:9;">
                                <div class="alltransaction">
                                    <h3>Activity Summary</h3>
                                    <hr>
                                </div>
                                <div class="lowertransaction">
                                    <div class="conversation">
                                        <h2><i class="fa-brands fa-rocketchat"
                                                style="color: #efb508;font-size: 13px;margin-right: 4px;"></i> Chats</h2>
                                        <span>{{ $totalChat ?? '' }}</span>
                                        <div class="conversationbar">
                                            <div class="colorbar"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="lowertransaction">
                                    <div class="conversation">
                                        <h2><i class="fa-solid fa-phone" aria-hidden="true"
                                                style="color: #efb508;font-size: 13px;margin-right: 4px;"></i> Phone Calls
                                        </h2>
                                        <span>{{ $appointment_calls ?? 0 }} Times</span>
                                        <div class="conversationbar">
                                            <div class="colorbar"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="lowertransaction">
                                    <div class="conversation">
                                        <h2><i class="fa-solid fa-video"
                                                style="color: #efb508;font-size: 13px;margin-right: 4px;"></i> Video Call
                                        </h2>
                                        <span>{{ $appointment ?? 0 }} Times</span>
                                        <div class="conversationbar">
                                            <div class="colorbar"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="rightusername">
                        <div class="headingtext">
                            <div class="">
                                <div class="upcomingappointment">
                                    <h2 id="up">Upcoming Appointment</h2>
                                    <div class="countdown-timer" id="countdown">
                                        <div class="firstboxes">
                                            <div class="days"></div>
                                            <label for="">Days</label>
                                        </div>
                                        <span id="timing">:</span>
                                        <div class="firstboxes">
                                            <div class="hours"></div>
                                            <label for="">Hours</label>
                                        </div>
                                        <span id="timing">:</span>
                                        <div class="firstboxes">
                                            <div class="minpoints"></div>
                                            <label for="">Minutes</label>
                                        </div>
                                        <span id="timing">:</span>
                                        <div class="firstboxes">
                                            <div class="seconds"></div>
                                            <label for="">Seconds</label>
                                        </div>
                                    </div>
                                    <div class="countdown-label"></div>
                                </div>
                            </div>

                        </div>
                        <div class="panditimage">
                            <div class="circlerotation">
                                <img src="{{ asset('website_dashboard_assets/assets/images/astro-banner-hand.png') }}"
                                    alt="">
                                <div class="mainpanditimage">

                                </div>
                            </div>
                        </div>
                        <div class="overlaypandit"></div>
                    </div>
                </div>
            </section>
        </div>
        <script>
            var countDownDate = new Date("Sep 20, 2024 15:00:00").getTime();
            var countdownFunction = setInterval(function() {
                var now = new Date().getTime();
                var distance = countDownDate - now;
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                document.querySelector(".days").innerText = days;
                document.querySelector(".hours").innerText = hours;
                document.querySelector(".minpoints").innerText = minutes;
                document.querySelector(".seconds").innerText = seconds;

                if (distance < 0) {
                    clearInterval(countdownFunction);
                    document.querySelector(".countdown-timer").innerHTML = "No Appointment Scheduled";

                }
            }, 1000);
        </script>


        <script>
            let currentActiveIndex = 0;
            let allClients = document.querySelectorAll('.clients');
            allClients[0].classList.add('active')


            function handleNext() {
                let nexActiveIndex = (currentActiveIndex + 1) % allClients.length;

                allClients[currentActiveIndex].classList.remove('active')
                allClients[nexActiveIndex].classList.add('active')
                currentActiveIndex = nexActiveIndex;
            }

            setInterval(() => {
                handleNext()
            }, 3000)
        </script>

        <footer class="pt-0 mt-5 footer mt-md-5">
            <div class="footer-bottom" style="background-color: white;">
                <div class="container-fluid">
                    <div class="row userAstroDashboard">
                        <div class="col-md-6 d-flex">
                            <div class="d-flex align-items-start justify-content-center logoColommun"
                                style="padding-left: 2%;">
                                <div class="sm astroimagessa">
                                    <img src="{{ asset('website_dashboard_assets/assets/images/AstroNewLogo2.png') }}"
                                        alt="image not uploaded">
                                </div>
                                <div class="mx-1 mt-1 smlg">
                                    <h3 class='FontOfAstro'>ASTROBUDDY</h3>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 text-center col-md-6 text-md-end mt-md-0" style="padding-right: 2%;">
                            <p class="mb-0 foterCopyRight"> &copy;Copyright <span id="copyright">
                                    <script>
                                        document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
                                    </script>
                                </span> <a href="#"> Astro-Buddy </a> All Rights Reserved </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <div id="back-to-top" class="back-to-top">
            <i class="fas fa-angle-up"></i>
        </div>
        <script src="https://kit.fontawesome.com/66f2518709.js" crossorigin="anonymous"></script>
        <script>
            function portfolio(id) {
                window.open("{{ url('/portfolio') }}" + "/" + id, "_blank");
            }
        </script>
    </body>

    </html>
@endsection
