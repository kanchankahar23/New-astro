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
    <style>
        .progress-card {
            transition: transform 250ms;
            --color-accent: #333;
            --color-border: #e4e4e4;
            width: 100%;
            border-radius: 5px;
            margin-bottom: 1em;
            position: relative;
            overflow: hidden;
            border: 1px solid var(--color-border);
            border-bottom: 0;
        }

        .progress-card-head {
            --color-accent: #333;
            --color-border: #e4e4e4;
            width: 100%;
            border-radius: 5px;
            margin-bottom: 1em;
            position: relative;
            overflow: hidden;
            border: 1px solid var(--color-border);
            border-bottom: 0;
        }

        .progress-title {
            color: #000;
            font-weight: 600;
            font-size: 17px;
            font-family: 'poppins', sans-serif;
        }

        .progress-card:hover {
            background-color: #fbe01617 !important;
            transform: translateY(-2px);
            box-shadow: 0 0 11px rgba(33, 33, 33, .2);
        }

        .progress-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: var(--color-accent);
            opacity: 0.05;
        }
    </style>

    <style>
        .progress-description {
            font-size: .95rem;
            font-weight: 500;
            font-size: 1px;
            font-family: 'poppins', sans-serif;
        }

        .as-sign-box {
            margin-bottom: 15px;
            margin-top: 0px;
        }

        .progress-card {
            --color-accent: #333;
            --color-border: #e4e4e4;
            width: 100%;
            border-radius: 5px;
            margin-bottom: 1em;
            position: relative;
            overflow: hidden;
            border: 1px solid var(--color-border);
            border-bottom: 0;
        }

        .progress-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: var(--color-accent);
            opacity: 0.05;
        }

        .progress-card.orange {
            --color-accent: #ffc48b;
        }

        .progress-card.purple {
            --color-accent: #b4b3ff;
        }

        .progress-card.pink {
            --color-accent: #ffb3c0;
        }

        .progress-card-content {
            padding: 0.7em;
        }

        .progress-card .progress-bar {
            background-color: var(--color-border);
            display: block;
            width: 100%;
            height: 5px;
            position: relative;
        }

        .progress-card .progress-bar::before {
            content: '';
            width: 100%;
            position: absolute;
            left: 0;
            top: 0;
            height: 5px;
            background-color: var(--color-accent);
            opacity: 0.15;
        }

        .progress-card .progress-bar::after {
            content: '';
            width: var(--value);
            position: absolute;
            left: 0;
            top: 0;
            height: 5px;
            background-color: var(--color-accent);
        }

        .progress-title {
            font-weight: 600;
            margin-bottom: 0.25em;

                {
                    {
                    -- opacity: 0.9;
                    --
                }
            }
        }

        .progress-description {
            font-size: 0.95rem;
            font-weight: 500;

                {
                    {
                    -- opacity: 0.85;
                    --
                }
            }

            color: black;
        }

        .progress-card span {
            display: block;
        }

        .as-sign-box {

            margin-bottom: 15px;
            margin-top: 0px;
        }

        .ast_slider_wrapper {
            margin-bottom: 45px;
        }

        .ariesdescription {
            display: flex;
            flex-direction: column;
            width: 100%;
            margin-right: 0 !important;
            margin: 0 auto;
        }
    </style>
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
            font-family: "Poppins", sans-serif;
        }

        .tableliner table {
            margin-top: 11px !important;
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
            border: 1px solid rgb(217 217 217 / 43%);
            ;
            border-radius: 10px;
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

        .rot {
            animation: spin 8s infinite;
        }
    </style>
</head>
<body>
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
                    <h2>Free Panchang</h2>
                </div>
                <ul class="homeapp">

                    <li><a href="" class="hh2appoint">Get instant & accurate, daily panchang</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="ast_packages_wrapper ast_bottompadder70">
        <div class="appointfirst" style="margin: 0px auto;">
            <h3>Panchang Details
                <h4 class="tagline panChangLine"><span></span></h4>
            </h3><br>
            <br>
        </div>
        <div id="basicPage" class="appointastrojd FormPanChang">
            <div class="p-2 appform">
                <div class="innerforms" style="width: 94%;">
                    <div class="tableliner firstTable" style="width: 100%;">
                        <div class="container">
                            <div class="row intPanchanG">
                                <div class="col-6 box">
                                    <div class="table-wrap">
                                        <h3
                                            style="width: 90%;margin: 5px auto;text-align: center;color: #1c1f25;    font-size: 18px;font-weight: 500;">
                                            @lang('messages.tithi')</h3>
                                        <table class="table table-striped firAreTables">
                                            <thead>
                                                <tr>
                                                    <th style="color: #000000;">
                                                        @lang('messages.Attribute')
                                                    </th>
                                                    <th style="color: #000000;">
                                                        @lang('messages.Result')
                                                    </th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <tr>
                                                <tr>
                                                    <td> @lang('messages.tithi')  @lang('messages.name')</td>
                                                    <td>{{ $response['tithi']['name'] }}
                                                        ({{ $response['tithi']['type'] }})</td>
                                                </tr>
                                                <tr>
                                                    <td>@lang('messages.diety')</td>
                                                    <td>{{ $response['tithi']['diety'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>@lang('messages.start')</td>
                                                    <td>{{ $response['tithi']['start'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>@lang('messages.end')</td>
                                                    <td>{{ $response['tithi']['end'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        @lang('messages.meaning')
                                                    </td>
                                                    <td>{{ $response['tithi']['meaning'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>@lang('messages.special')</td>
                                                    <td>{{ $response['tithi']['special'] }}</td>
                                                </tr>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                                <div class="col-6 box">
                                    <div class="table-wrap">
                                        <table class="table table-striped  firAreTables">
                                            <h3
                                                style="width: 90%;margin: 5px auto;text-align: center;color: #1c1f25;    font-size: 18px;font-weight: 500;">
                                                @lang('messages.nakshatra') </h3>
                                            <thead>
                                                <tr>
                                                    <th style="color: #000000;">
                                                        @lang('messages.Attribute')
                                                    </th>
                                                    <th style="color: #000000;">
                                                        @lang('messages.Result')
                                                    </th>
                                                </tr>
                                            </thead>

                                            <tbody>

                                                <tr>
                                                    <td>@lang('messages.nakshatra') @lang('messages.name')</td>
                                                    <td>{{ $response['nakshatra']['name'] }} (Lord:
                                                        {{ $response['nakshatra']['lord'] }})</td>
                                                </tr>
                                                <tr>
                                                    <td>@lang('messages.diety')</td>
                                                    <td>{{ $response['nakshatra']['diety'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>@lang('messages.start')</td>
                                                    <td>{{ $response['nakshatra']['start'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>@lang('messages.end')</td>
                                                    <td>{{ $response['nakshatra']['end'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        @lang('messages.meaning')
                                                    </td>
                                                    <td>{{ $response['nakshatra']['meaning'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>@lang('messages.special')</td>
                                                    <td>{{ $response['nakshatra']['special'] }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row intPanchanG">
                                <div class="col-6 box">
                                    <div class="table-wrap">
                                        <h3
                                            style="width: 90%;margin: 5px auto;text-align: center;color: #1c1f25;    font-size: 18px;font-weight: 500;">
                                            @lang('messages.karana')</h3>
                                        <table class="table table-striped  firAreTables">

                                            <thead>
                                                <tr>
                                                    <th style="color: #000000;">
                                                        @lang('messages.Attribute')
                                                    </th>
                                                    <th style="color: #000000;">
                                                        @lang('messages.Result')
                                                    </th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <tr>
                                                <tr>
                                                    <td>@lang('messages.karana')  @lang('messages.name')</td>
                                                    <td>{{ $response['karana']['name'] }}
                                                        ({{ $response['karana']['type'] }})</td>
                                                </tr>
                                                <tr>
                                                    <td>@lang('messages.diety')</td>
                                                    <td>{{ $response['karana']['diety'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>@lang('messages.start')</td>
                                                    <td>{{ $response['karana']['start'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>@lang('messages.end')</td>
                                                    <td>{{ $response['karana']['end'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        @lang('messages.nextKarana')
                                                    </td>
                                                    <td>{{ $response['karana']['next_karana'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>@lang('messages.special')</td>
                                                    <td>{{ $response['karana']['special'] }}</td>
                                                </tr>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                                <div class="col-6 box">
                                    <div class="table-wrap">
                                        <table class="table table-striped  firAreTables">
                                            <h3
                                                style="width: 90%;margin: 5px auto;text-align: center;color: #1c1f25;    font-size: 18px;font-weight: 500;">
                                                @lang('messages.yoga')</h3>
                                            <thead>
                                                <tr>
                                                    <th style="color: #000000;">
                                                        @lang('messages.Attribute')
                                                    </th>
                                                    <th style="color: #000000;">
                                                        @lang('messages.Result')
                                                    </th>
                                                </tr>
                                            </thead>

                                            <tbody>

                                                <tr>
                                                    <td>@lang('messages.yoga') @lang('messages.name')</td>
                                                    <td>{{ $response['yoga']['name'] ?? '' }} </td>
                                                </tr>
                                                <tr>
                                                    <td>@lang('messages.number')</td>
                                                    <td>{{ $response['yoga']['number'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>@lang('messages.start')</td>
                                                    <td>{{ $response['yoga']['start'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>@lang('messages.end')</td>
                                                    <td>{{ $response['yoga']['end'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        @lang('messages.meaning')
                                                    </td>
                                                    <td>{{ $response['yoga']['meaning'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>@lang('messages.special')</td>
                                                    <td>{{ $response['yoga']['special'] }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row intPanchanG">
                                <div class="col-4">
                                    <div class="progress-card" style="--color-accent: #2f2b71;">
                                        <div class="progress-card-content">
                                            <span class="progress-title">
                                                @lang('messages.sunrise')
                                            </span>
                                            <span class="progress-description">{{ $response['advanced_details']['sun_rise'] }}
                                            </span>
                                        </div>
                                        <span class="progress-bar" style="--value:100%;"></span>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="progress-card" style="--color-accent: #2f2b71;">
                                        <div class="progress-card-content">
                                            <span class="progress-title">
                                                @lang('messages.sunSet')
                                            </span>
                                            <span class="progress-description">{{ $response['advanced_details']['sun_set'] }}
                                            </span>
                                        </div>
                                        <span class="progress-bar" style="--value:100%;"></span>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="progress-card" style="--color-accent: #2f2b71;">
                                        <div class="progress-card-content">
                                            <span class="progress-title">
                                                @lang('messages.rahukaal')
                                            </span>
                                            <span class="progress-description">{{ $response['rahukaal'] }}
                                            </span>
                                        </div>
                                        <span class="progress-bar" style="--value:100%;"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row intPanchanG">
                                <div class="col-4">
                                    <div class="progress-card" style="--color-accent: #1c7399;">
                                        <div class="progress-card-content">
                                            <span class="progress-title">
                                                @lang('messages.moonrise')
                                            </span>
                                            <span class="progress-description">{{ $response['advanced_details']['moon_rise'] }}
                                            </span>
                                        </div>
                                        <span class="progress-bar" style="--value:100%;"></span>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="progress-card" style="--color-accent: #1c7399;">
                                        <div class="progress-card-content">
                                            <span class="progress-title">
                                                @lang('messages.moonset')
                                            </span>
                                            <span class="progress-description">{{ $response['advanced_details']['moon_set'] }}
                                            </span>
                                        </div>
                                        <span class="progress-bar" style="--value:100%;"></span>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="progress-card" style="--color-accent: #1c7399;">
                                        <div class="progress-card-content">
                                            <span class="progress-title">
                                                @lang('messages.gulika')
                                            </span>
                                            <span class="progress-description">{{ $response['gulika'] }}
                                            </span>
                                        </div>
                                        <span class="progress-bar" style="--value:100%;"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row intPanchanG">
                                <div class="col-4">
                                    <div class="progress-card" style="--color-accent: #88d252;">
                                        <div class="progress-card-content">
                                            <span class="progress-title">
                                                @lang('messages.abhijitMuhurtaStart')
                                            </span>
                                            <span class="progress-description">{{ $response['advanced_details']['abhijit_muhurta']['start'] }}
                                            </span>
                                        </div>
                                        <span class="progress-bar" style="--value:100%;"></span>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="progress-card" style="--color-accent: #88d252;">
                                        <div class="progress-card-content">
                                            <span class="progress-title">
                                                @lang('messages.abhijitMuhurtaEnd')
                                            </span>
                                            <span class="progress-description">{{ $response['advanced_details']['abhijit_muhurta']['end'] }}
                                            </span>
                                        </div>
                                        <span class="progress-bar" style="--value:100%;"></span>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="progress-card" style="--color-accent: #88d252;">
                                        <div class="progress-card-content">
                                            <span class="progress-title">
                                                @lang('messages.yamakanta')
                                            </span>
                                            <span class="progress-description">{{ $response['yamakanta'] }}
                                            </span>
                                        </div>
                                        <span class="progress-bar" style="--value:100%;"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
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

