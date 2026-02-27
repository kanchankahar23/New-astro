@extends('website.website_master')
@section('title', 'Horoscope')
@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Astrobuddy | Kundli Details</title>
    <link rel="icon" href="{{ asset('website/uploads/sites/3/2021/09/vas_1.png') }}" sizes="32x32" />
    <link rel="icon" href="{{ asset('website/uploads/sites/3/2021/09/vas_1.png') }}" sizes="192x192" />
    <link rel="stylesheet" href="{{ asset('website/styles/style.min.css') }}" />

    <link rel="stylesheet" type="text/css"
        href="{{ asset('website/plugins/astro-appointment/assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('website/plugins/astro-appointment/assets/css/style.css') }}">
    <link rel="stylesheet"
        href="{{ asset('website/themes/astrologer/assets/css/astrologer-custom-style.css?ver=1') }}" />
    <link rel="stylesheet" href="{{ asset('website/plugins/astro-appointment/assets/css/freekundli.css') }}">

    <link rel="stylesheet" href="{{ asset('website/plugins/astro-appointment/assets/css/bestastro.css') }}">
    <link rel="stylesheet"
        href="{{ asset('website/themes/astrologer/assets/css/astrologer-custom-light-style.css?ver=1') }}" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:400%7CPhilosopher:400&display=swap" rel="stylesheet"
        property="stylesheet" media="all" type="text/css" />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('website/plugins/astro-appointment/assets/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('website/plugins/astro-appointment/assets/css/somefooter.css') }}">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        .table-striped>tbody>tr:nth-of-type(odd) {
            --bs-table-accent-bg: #ffffaf !important;
            ;
            color: var(--bs-table-striped-color);
        }

        .tableliner table td {
            border: transparent !important;
            padding: 10px 36px;
            text-align: center;
            padding-left: 31px;
            color: #101010;
            font-weight: 500;
            background: white;
            vertical-align: middle;
        }

        .tableliner table {
            margin-top: 0 !important;
            margin-bottom: 0;
        }

        :root {
            --font-fam: "Satoshi", sans-serif;
            --text-color: #212529;
            --bar-color: #36f31d;
            --transition-effect: all 90ms linear;
        }



        .load {
            background: linear-gradient(120deg, #f6d365 0%, #fda085 100%);
            padding: 8px;
            border-radius: 10px;

        }

        #loader {

            z-index: 999;
            height: 40px;
            margin-top: 5px;
            display: flex;
            align-items: center;
            gap: 10%;
            position: relative;

        }

        .wrap {
            margin: 500px;
        }

        #text {
            font-family: var(--font-fam);
            color: var(--text-color);
            font-size: 20px;
            padding: 0 10px;

            font-weight: 500;
        }

        #percent {
            border: 1px solid black;
            font-family: var(--font-fam);
            color: var(--text-color);
            transition: var(--transition-effect);
            font-size: 16px;
            padding: 0 10px;
            font-weight: 500;
        }

        #bar {
            position: absolute;
            height: 40px;
            width: 100%;
            z-index: -1;
            border-top: 4px solid var(--bar-color);
            transform-origin: left;
            transform: scalex(0%);
            transition: var(--transition-effect);
        }

        #help {
            font-family: var(--font-fam);
            color: var(--text-color);
            font-size: 20px;
            position: absolute;
            top: 20px;
            font-weight: 600;
        }

        .table-wrap {
            /* margin: 10px; */
            /* border: 1px solid rgba(0, 0, 0, 0.425); */
            border-radius: 10px;
            /* border:none !important; */
        }



        th {
            text-align: inherit;
        }

        label {
            display: inline-block;
            margin-bottom: 0.5rem;
        }

        .table {
            width: 100%;
            color: #212529;
        }

        .custom-list {
            list-style-type: disc;
            margin-left: 20px;
            margin-top: 10px;
        }
    </style>
    <style>
        .nav-link.active {
            background-color: #ccc;
        }

        .nav-pills .nav-link {
            color: #555;
            font-family: 'poppins', sans-serif;
        }

        .text-uppercase {
            letter-spacing: 0.1em;
        }

        ol li,
        ul li {
            margin-bottom: 0px;
        }

        .tableliner {
            width: 95%;
            margin: 40px auto;
        }
    </style>

    <style>
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
        .rot{
            animation: spin 8s infinite;
        }
    </style>
</head>
<body>
    {{--  <div id="preloader">
        <img src="{{ url('loader/loader.gif') }}" alt="Loading...">
    </div>  --}}

    <!--Slider Start-->
    <div class="kundlidetailsfirst">
        <div class="astrooverlay"></div>
        <div class="ast_banner_text">
            <div class="ast_waves3">
                <div class="ast_wave"></div>
                <div class="ast_wave"></div>
                <div class="ast_wave"></div>
            </div>
            <div class="appointment">
                <div class="appheading">
                    <h2>Free Numerology</h2>
                </div>
                <ul class="homeapp">

                    <li><a href="" class="hh2appoint">Get instant & accurate, your lucky number</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!--Slider End-->
    <!--Price Start-->
    <div class="ast_packages_wrapper ast_bottompadder70">
        <div class="appointfirst" style="margin: 0px auto;">
            <h3>Numerology Details
                <h4 class="tagline panChangLine"><span></span></h4>
            </h3><br>
            <br>
        </div>

        <div id="basicPage" class="appointastrojd pointNum">
            <div class="p-2 appform">
                <div class="innerforms">
                    <div class="tableliner firstTable">
                        <h5 class="birth" style="font-size: 17px;    margin-bottom: inherit;">Bacis Details
                            <hr class="kundlitag" style=" width: 115px;color:#fbe216 ;">
                        </h5>
                        <div class="table-wrap feWrap">
                            <table class="table table-striped dummyTable">
                                <thead>
                                    <tr>
                                        <th style="color: #000000;">
                                            @lang('messages.name')
                                        </th>
                                        <th style="color: #000000;">
                                           @lang('messages.gender')
                                        </th>
                                        <th style="color: #000000;">
                                            @lang('messages.date')
                                        </th>
                                        <th style="color: #000000;">
                                            @lang('messages.time')
                                        </th>
                                        <th style="color: #000000;">
                                            @lang('messages.place')
                                        </th>
                                        <th style="color: #000000;">
                                           @lang('messages.latitude')
                                        </th>
                                        <th style="color: #000000;">
                                           @lang('messages.longitude')
                                        </th>
                                        <th style="color: #000000;">
                                           @lang('messages.timezone')
                                        </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>{{ $basicUserDetails['full_name'] ?? '' }}</td>
                                        <td>{{ $basicUserDetails['gender'] ?? '' }}</td>
                                        <td>{{ $basicUserDetails['dob'] ?? '' }}</td>
                                        <td>{{ $basicUserDetails['tob'] ?? '' }}</td>
                                        <td>{{ $basicUserDetails['place'] ?? '' }}</td>
                                        <td>{{ $basicUserDetails['lat'] ?? '' }}</td>
                                        <td>{{ $basicUserDetails['lon'] ?? '' }}</td>
                                        <td>GMT<span class="ng-star-inserted">+</span>5.5</td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="tableliner DetailNumerology">
                        <h5 class="birth" style="font-size: 17px; margin-bottom: inherit;">Numerology Details
                            <hr class="kundlitag" style="width: 160px;color:#fbe216 ;">
                        </h5>
                        <div class="table-wrap feWrap">
                            <table class="table table-striped ankForTable">
                                <thead>
                                    <tr>
                                        <th style="color:#000000;">
                                            @lang('messages.Attribute')
                                        </th>
                                        <th style="color: #000000;">
                                            @lang('messages.Result')
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            @lang('messages.radicalNumber')

                                        </td>
                                        <td>
                                            {{ $data['response']['radical_number'] }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            @lang('messages.radicalRuler')
                                        </td>
                                        <td>
                                            {{ $data['response']['radical_ruler'] }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            @lang('messages.characteristics')

                                        </td>
                                        <td>
                                            @foreach ($data['response']['characteristics'] as $index => $characteristic)
                                                {{ $characteristic }}@if (!$loop->last)
                                                    ,
                                                @endif
                                            @endforeach
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            @lang('messages.favoriteColor')

                                        </td>
                                        <td>
                                            {{ $data['response']['fav_color'] }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            @lang('messages.favoriteDay')

                                        </td>
                                        <td>
                                            {{ $data['response']['fav_day'] }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            @lang('messages.favoriteGod')
                                        </td>
                                        <td>
                                            {{ $data['response']['fav_god'] }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            @lang('messages.favoriteMantra')
                                        </td>
                                        <td>
                                            {{ $data['response']['fav_mantra'] }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            @lang('messages.favoriteMetal')
                                        </td>
                                        <td>
                                            {{ $data['response']['fav_metal'] }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            @lang('messages.favoriteStone')
                                        </td>
                                        <td>
                                            {{ $data['response']['fav_stone'] }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            @lang('messages.favoriteSubstone')
                                        </td>
                                        <td>
                                            {{ $data['response']['fav_substone'] }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            @lang('messages.friendlyNumbers')
                                        </td>
                                        <td>
                                            {{ $data['response']['friendly_num'] }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            @lang('messages.evilNumbers')
                                        </td>
                                        <td>
                                            {{ $data['response']['evil_num'] }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            @lang('messages.neutralNumbers')
                                        </td>
                                        <td>
                                            {{ $data['response']['neutral_num'] }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            @lang('messages.destinyNumber')
                                        </td>
                                        <td>
                                            {{ $data['response']['destiny'] }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            @lang('messages.nameNumber')
                                        </td>
                                        <td>
                                            {{ $data['response']['name_number'] }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            @lang('messages.dateConsidered')
                                        </td>
                                        <td>
                                            {{ $data['response']['date_considered'] }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Price End-->
    <script src="https://kit.fontawesome.com/66f2518709.js" crossorigin="anonymous"></script>
    <script src="{{ asset('website/scripts/jquery/jquery.min.js?ver=3.7.1') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- SCRIPTS ENDS -->


    <script>
        var button = document.getElementById('myButton');
        button.addEventListener('click', function() {
            var messageParagraph = document.getElementById('message');
            messageParagraph.textContent = 'Button was clicked!';
        });
    </script>
    <!-- <script src="{{ asset('website/themes/astrologer/assets/js/astrologer-custom-script.js?ver=20151215') }}"
        id="astrologer-custom-script-js"></script> -->

    <script src="{{ asset('website/scripts/astrobuddy.js') }}"></script>
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
</body>
@endsection

