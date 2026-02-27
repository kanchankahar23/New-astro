<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Kundali Modal</title>
        <link rel="stylesheet"
            href="{{ asset('website/styles/style.min.css') }}" />

        <link rel="stylesheet" type="text/css"
            href="{{ asset('website/plugins/astro-appointment/assets/css/bootstrap.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('website/plugins/astro-appointment/assets/css/style.css') }}">

        <link rel="stylesheet"
            href="{{ asset('website/plugins/astro-appointment/assets/css/freekundli.css') }}">

        <link
            href="https://fonts.googleapis.com/css?family=Roboto:400%7CPhilosopher:400&display=swap"
            rel="stylesheet" property="stylesheet" media="all"
            type="text/css" />

        <link
            href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
            rel="stylesheet">
        <link rel="stylesheet"
            href="{{ asset('website/plugins/astro-appointment/assets/css/responsive.css') }}">
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

            /* Modal Container */
            .modal {
                display: none;
                /* Hidden by default */
                position: fixed;
                font-family: "Poppins", sans-serif;
                z-index: 9999;
                left: 0;
                top: 0;
                width: 50%;
                /* 50% of the screen */
                height: 100%;
                overflow: hidden;
                box-shadow: 0 19px 38px rgba(0, 0, 0, 0.30), 0 15px 12px rgba(0, 0, 0, 0.22);
                animation: slideIn 0.5s ease-out;
            }

            .close {
                display: flex;
                justify-content: center;
            }

            /* Modal Content */
            .modal-content {
                background-size: contain;
                background-position: center;
                background: #f8f8f8f1 url(https://media.istockphoto.com/id/1401897354/vector/vector-zodiac-signs-star-constellations.jpg?s=612x612&w=0&k=20&c=6plB6UUye5BDt_N8F761_rNOk_tLRmTx4mObI23mctY=);
                background-blend-mode: lighten;
                margin: 0;
                padding: 20px;
                /* overflow: scroll; */
                height: 100%;
                display: flex;
                flex-direction: column;
                transform: translateX(-100%);
                animation: slideInContent 0.5s ease-out forwards;
            }
            /* Modal Header */
            .modal-header {
                display: flex;
                justify-content: space-between;
                align-items: center;
            }
            .modal-header h2 {
                margin: 0;
            }
            /* Close Button */
            .close {
                color: #000000;
                font-size: 30px;
                font-weight: bold;
                cursor: pointer;
            }

            /* Modal Body */
            .modal-body {
                display: flex;
                flex-direction: column;
                height: 100%;
            }

            /* Left Section - Kundali Chart */
            .left-section {
                /* flex: 1; */
                display: grid;
                padding: 20px;
                border-bottom: 1px solid #ddd;
            }

            .left-section img {
                width: 100%;
                height: auto;
                display: block;
            }

            /* Right Section - Person Details */
            .right-section {
                display: flex;
                text-align: left;
                border-bottom: 1px solid rgba(0, 0, 0, 0.541);
                padding: 20px;
                /* padding-top: 0; */
                justify-content: space-between;
            }

            /* Responsive Design */
            @media (max-width: 768px) {
                .modal {
                    width: 100%;
                }
            }

            /* Keyframes for the sliding animation */
            @keyframes slideIn {
                from {
                    left: -50%;
                }

                to {
                    left: 0;
                }
            }

            @keyframes slideInContent {
                from {
                    transform: translateX(-100%);
                }

                to {
                    transform: translateX(0);
                }
            }

            /* Modal Body */
            .modal-body {
                display: flex;
                flex-direction: column;
                /* Stack sections top to bottom */
                height: 100%;
            }

            /* Left Section - Kundali Chart */
            .left-section {
                flex: 1;
                padding: 20px;
                border-bottom: 1px solid #ddd;
                /* Change to bottom border */
            }

            .left-section img {
                width: 100%;
                height: auto;
                display: block;
            }

            /* Right Section - Person Details */


            .one p {
                font-size: 17px;
            }

            .two p {
                font-size: 17px;

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
            .tab-betail .nav-tabs {
                border-bottom: 0px solid #dee2e6;
            }

            .tab-betail .nav {
                display: flex;
                justify-content: center;
                column-gap: 10px;
            }

            .tab-betail .nav-tabs .nav-item {
                margin-bottom: 0px;
            }

            .tab-betail .nav-tabs .nav-item.show .nav-link,
            .tab-betail .nav-tabs .nav-link.active {
                color: #ffffff;
                background-color: #fbe216;
                border-color: #fbe216;
            }

            .tab-betail .nav-tabs .nav-link:hover {
                color: #ffffff;
                background-color: #f9a72e;
                border-color: #fbe216;
            }

            .tab-betail .nav-tabs .nav-link {
                border: 1px solid #fff;
                border-top-left-radius: 0;
                border-top-right-radius: 0;
                border-radius: 10px;
                color: #000;
                background-color: #f0f0ec78;
                box-shadow: 0px 1px 3px #ddd;
                font-size: 15px;
                font-weight: 600;
                transition: 0.5s;
            }

            .slider-tabs .tab-betail .nav,
            .panchang-datail-sec .tab-betail .nav {
                margin: 20px 0px;
                overflow-x: auto;
                display: flex;
                width: 100%;
                justify-content: flex-start;
                overflow-y: hidden;
                flex-wrap: unset;
            }

            .slider-tabs .nav-tabs .nav-link {
                border: 1px solid #fff;
                color: #000;
                background-color: transparent;
                box-shadow: 0px 0px 0px #fbe216;
                font-size: 16px;
                font-weight: 600;
                transition: 0.5s;
                border: 1px solid #fbe216;
                margin-bottom: 1px;
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

           /* updated code */
        .innerformss {
        width: 100%;
        }

        .appointastrojds {
        width: 100%;
        }

        .myTabs {
            display: flex;
            border: 1px solid #988c8c38 !important;
            flex-direction: row !important;
            padding-top: 1px;
            width: 100%;
            height: 55px;
            border-radius: 1px !important;
            flex-wrap: nowrap;
            overflow: scroll;
            scrollbar-width: thin;
            scrollbar-color: #888 #f1f1f1;
            scroll-behavior: smooth;
            overflow-y: hidden;
            justify-content: flex-start;
        }

        .nav-tabs .nav-item .nav-links.active {
           white-space: nowrap;
           border-radius: 0px !important;
        }

        .nav-tabs .nav-item .nav-links {
           border-radius: 0px !important;
           white-space: nowrap;
        }
        .tab-betail .nav{
            display: flex;
            justify-content: flex-start;
            column-gap: 10px;
            width: 100%;
            flex-direction: row;
            overflow-x: scroll;
            flex-wrap: nowrap;
        }
        .tab-betail .nav-tabs .nav-link{
            width: max-content !important;
        }
        #doshaPage .mt-4 , #pitraDoshaPage > div , #kaalsharpDoshaPage > div , #papasamayaPage > div{
            width: 100%;
            overflow: hidden;
            padding: 10px !important;
        }
        .appointastrojd{
                width: 100% !important;
        }
        @media screen and (max-width:1200px) {
            .container {
                max-width: max-content !important;
            }
            .appointastrojd {
               width: 100%;
               margin: 0px auto;
            }
            .innerforms{
                width: 100% !important;
                overflow: scroll;
            }
            .tableliner {
                width: max-content;
                margin: 0 10%;
            }


        }
        @media screen and (max-width:500px) {
            .tableliner{
                width: 100% !important;
                margin:20px 0px !important;
            }
            .table-wrap{
                border-radius: 0px !important;
            }
            .right-section{
                padding: 20px 5px !important;
            }
            .right-section .one p, .right-section .two p{
                font-size: 14px !important;
            }
            .tab-betail .nav{
                flex-direction: row;
                width: 100%;
                overflow: scroll;
                flex-wrap: nowrap;
                justify-content: flex-start !important;
            }
            #doshaPage .mt-4{
                width: 100%;
                overflow: scroll;
                padding: 0px !important;
            }
            #pitraDoshaPage > div , #kaalsharpDoshaPage > div , #papasamayaPage > div{
                width: 100% !important;
                padding: 0px !important;
            }
            .GeneralPrediction a{
                width: max-content !important;
            }
            .modal-body{
                padding: 0px !important;
            }
            .p-2{
                padding: 0px !important;
            }
           .nav-tabs .nav-item {
              width: 100%;
              height: 100%;
              margin: 0px;
            }
            .appointfirst {
                margin-top: 40px !important;
            }
            .appointastrojd{
                width: 100% !important;
                margin: 0px 0px !important;
            }
            .innerforms{
                width: 100% !important;
            }
            .tagchart1{
                margin: 10px auto;
            }
            .table-wrap{
                border: 0px !important;
            }

        .kundali {
        margin-left: 145vw ;
        }
        .kundali-btn{
        margin-left: 160vw !important;
        }

        .nav-tabs .nav-item .nav-links {
        padding: 20px 15px !important;
        width: 100%;
        height: 100%;
        }

        .chat-container {
        width: 100%;
        height: 90% !important;
        }
        }

        @keyframes slideOutContent {
        from {
        transform: translateX(0);
        }

        to {
        transform: translateX(-100%);
        }
        }
        .modal-content.slide-out {
        animation: slideOutContent 0.5s ease-out forwards;
        }

        </style>
    </head>
    @php
    use Carbon\Carbon;
    $lat = '23.1686';
    $lon = '79.9339';
    $tz = '5.5';
    $apiKey = "93d6829d-2e4f-5288-a831-b06045c4b956";
    $lang = 'hi';
    App::setLocale($lang);
    $formattedDate = Carbon::parse($dob)->format('d/m/Y');
    $dob = $formattedDate;
    $tob = $tob;
    try {
    $url =
    'https://api.vedicastroapi.com/v3-json/extended-horoscope/extended-kundli-details';
    $response = Http::get($url, [
    'dob' => $dob,
    'tob' => $tob,
    'lat' => $lat,
    'lon' => $lon,
    'tz' => $tz,
    'api_key' => $apiKey,
    'lang' => $lang,
    ]);
    if ($response->successful()) {
    $basicKundliDetails = $response->json();
    $basicKundliDetails = $basicKundliDetails['response'] ?? null;
    } else {
    return response()->json(['error' => 'API request failed.'], 400);
    }
    } catch (Exception $e) {
    return response()->json(['error' => $e->getMessage()], 400);
    }
    @endphp
    <body>
        <div id="kundaliModal" class="modal">
            <div class="modal-content" >
                <div class="modal-header">
                    <h2>User Kundali Details
                        <hr>
                    </h2>
                    <span class="close" onclick="closeKundliPopup()">&times;</span>
                </div>
                <div class="modal-body" style="overflow: auto;">
                    <div >
                        <ul style="border: 1px solid #988c8c38 !important;" id="myTab"
                                role="tablist"
                                class="text-center border-0 mobRestable nav nav-tabs nav-pills flex-column flex-sm-row bg-light rounded-nav myTabs">
                                <li class="nav-item flex-sm-fill listrestheader kundali ">
                                    <a href="#basicPage" id="basic-tab"
                                        onclick="showPage('basic', this)" data-toggle="tab"
                                        href="#home" role="tab" aria-controls="home"
                                        aria-selected="true"
                                        class="border-0 nav-link text-uppercase font-weight-bold clickedpage nav-links ">Kundli</a>
                                </li>
                                <li class="nav-item flex-sm-fill listrestheader">
                                    <a href="#planetsPositionPage"
                                        onclick="showPage('planetsPosition', this),getPlanetsPosition()"
                                        data-toggle="tab" href="#home" role="tab"
                                        aria-controls="home" aria-selected="true"
                                        class="border-0 nav-link text-uppercase font-weight-bold nav-links">Planetary
                                        Position</a>
                                </li>
                                <li class="nav-item flex-sm-fill listrestheader ">
                                    <a id="kundli-tab" data-toggle="tab" href="#kundliPage"
                                        role="tab"
                                        onclick="showPage('kundli', this),getbirthChart()"
                                        aria-controls="contact" aria-selected="false"
                                        class="border-0 nav-link text-uppercase font-weight-bold nav-links">Charts</a>
                                </li>
                                <li class="nav-item flex-sm-fill listrestheader ">
                                    <a id="extentdedHoroscope-tab" data-toggle="tab"
                                        href="#extentdedHoroscopePage" role="tab"
                                        onclick="showPage('extentdedHoroscope', this),getPersonalCharacterstics()"
                                        aria-controls="profile" aria-selected="false"
                                        class="border-0 nav-link text-uppercase font-weight-bold nav-links">General
                                        Prediction</a>
                                </li>
                                <li class="nav-item flex-sm-fill listrestheader ">
                                    <a id="dasha-tab" data-toggle="tab" href="#dashaPage" role="tab"
                                        onclick="showPage('dasha', this),getDashaChart()"
                                        aria-controls="contact" aria-selected="false"
                                        class="border-0 nav-link text-uppercase font-weight-bold nav-links">Dasha</a>
                                </li>
                                <li class="nav-item flex-sm-fill listrestheader ">
                                    <a id="sadeSati-tab" data-toggle="tab" href="#sadeSatiPage"
                                        role="tab"
                                        onclick="showPage('sadeSati', this),getSadheShati('')"
                                        aria-controls="profile" aria-selected="false"
                                        class="border-0 nav-link text-uppercase font-weight-bold nav-links">Extended
                                        Horoscope</a>
                                </li>
                                <li class="nav-item flex-sm-fill listrestheader ">
                                    <a id="dosha-tab" data-toggle="tab" href="#doshaPage" role="tab"
                                        onclick="showPage('dosha', this),getMangalDosha()"
                                        aria-controls="contact" aria-selected="false"
                                        class="border-0 nav-link text-uppercase font-weight-bold nav-links">Dosha</a>
                                </li>
                        </ul>
                    </div>
                    <div class="right-section">
                        <div class="one">
                            <p><strong>@lang('messages.name') :</strong> {{
                                $name ?? '' }}</p>
                            <p><strong>@lang('messages.date') :</strong> {{ $dob
                                ?? '' }}</p>
                        </div>
                        <div class="two">
                            <p><strong>@lang('messages.time') :</strong> {{ $tob
                                ?? '' }}</p>
                            <p><strong>@lang('messages.place') :</strong> {{
                                $place ?? '' }}</p>
                        </div>
                    </div>
                    {{--  <div class="ast_packages_wrapper ast_bottompadder70">
                        <div class="appointfirst" style="margin: 40px auto;">
                            <h3>Kundli Details
                                <h4 class="tagline"><span></span></h4>
                            </h3>
                            <ul style="border: 1px solid #988c8c38 !important;"
                                id="myTab" role="tablist"
                                class="text-center border-0 mobRestable nav nav-tabs nav-pills flex-column flex-sm-row bg-light rounded-nav">
                                <li
                                    class="nav-item flex-sm-fill listrestheader">
                                    <a href="#basicPage" id="basic-tab"
                                        onclick="showPage('basic', this)"
                                        data-toggle="tab" href="#home"
                                        role="tab" aria-controls="home"
                                        aria-selected="true"
                                        class="border-0 nav-link text-uppercase font-weight-bold clickedpage">Kundli</a>
                                </li>
                                <li
                                    class="nav-item flex-sm-fill listrestheader">
                                    <a href="#planetsPositionPage"
                                        onclick="showPage('planetsPosition', this),getPlanetsPosition()"
                                        data-toggle="tab" href="#home"
                                        role="tab" aria-controls="home"
                                        aria-selected="true"
                                        class="border-0 nav-link text-uppercase font-weight-bold">Planetary
                                        Position</a>
                                </li>
                                <li
                                    class="nav-item flex-sm-fill listrestheader">
                                    <a id="kundli-tab" data-toggle="tab"
                                        href="#kundliPage" role="tab"
                                        onclick="showPage('kundli', this),getbirthChart()"
                                        aria-controls="contact"
                                        aria-selected="false"
                                        class="border-0 nav-link text-uppercase font-weight-bold">Charts</a>
                                </li>
                                <li
                                    class="nav-item flex-sm-fill listrestheader">
                                    <a id="extentdedHoroscope-tab"
                                        data-toggle="tab"
                                        href="#extentdedHoroscopePage"
                                        role="tab"
                                        onclick="showPage('extentdedHoroscope', this),getPersonalCharacterstics()"
                                        aria-controls="profile"
                                        aria-selected="false"
                                        class="border-0 nav-link text-uppercase font-weight-bold">General
                                        Prediction</a>
                                </li>
                                <li
                                    class="nav-item flex-sm-fill listrestheader">
                                    <a id="dasha-tab" data-toggle="tab"
                                        href="#dashaPage" role="tab"
                                        onclick="showPage('dasha', this),getDashaChart()"
                                        aria-controls="contact"
                                        aria-selected="false"
                                        class="border-0 nav-link text-uppercase font-weight-bold">Dasha</a>
                                </li>
                                <li
                                    class="nav-item flex-sm-fill listrestheader">
                                    <a id="sadeSati-tab" data-toggle="tab"
                                        href="#sadeSatiPage" role="tab"
                                        onclick="showPage('sadeSati', this),getSadheShati('')"
                                        aria-controls="profile"
                                        aria-selected="false"
                                        class="border-0 nav-link text-uppercase font-weight-bold">Extended
                                        Horoscope</a>
                                </li>
                                <li
                                    class="nav-item flex-sm-fill listrestheader">
                                    <a id="dosha-tab" data-toggle="tab"
                                        href="#doshaPage" role="tab"
                                        onclick="showPage('dosha', this),getMangalDosha()"
                                        aria-controls="contact"
                                        aria-selected="false"
                                        class="border-0 nav-link text-uppercase font-weight-bold">Dosha</a>
                                </li>
                            </ul>
                            <br>
                        </div>
                        <div id="basicPage" class="appointastrojd">
                            <div class="p-2 appform">
                                <div class="innerforms">
                                    <div class="tableliner">
                                        <h5 class="birth"
                                            style="font-size: 17px;margin-bottom: 20px;">
                                            Panchang Details
                                            <hr class="kundlitag"
                                                style="width: 160px;color:#fbe216;">
                                        </h5>
                                        <table>
                                            <tbody>
                                                @foreach ($basicKundliDetails as $key => $value)
                                                <tr>
                                                    <td>{{
                                                        ucfirst(str_replace('_',
                                                        ' ', $key)) }}</td>
                                                    <td>{{ $value }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="planetsPositionPage" class="appointastrojd">
                        </div>
                        <div id="kundliPage" class=" appointastrojd"></div>
                        <div id="bhavaKundliPage" class=" appointastrojd"></div>
                        <div id="dashaPage" class="appointastrojd"> </div>
                        <div id="planatPage" class="appointastrojd"></div>
                        <div id="doshaPage" class="appointastrojd"></div>
                        <div id="kaalsharpDoshaPage" class="appointastrojd">
                        </div>
                        <div id="pitraDoshaPage" class="appointastrojd"></div>
                        <div id="papasamayaPage" class="appointastrojd"></div>
                        <div id="sadeSatiPage" class="appointastrojd"></div>
                        <div id="friendshipPage" class="appointastrojd"></div>
                        <div id="extentdedHoroscopePage" class="appointastrojd">
                        </div>
                        <div id="gemSuggestionPage" class="appointastrojd">
                        </div>
                    </div>  --}}
                    <div class="ast_packages_wrapper ast_bottompadder70">
                        <div class="appointfirst" style="margin: 40px auto;">
                            <h3>Kundli Details
                                <h4 class="tagline"><span></span></h4>
                            </h3>
                        </div>
                        <div id="basicPage" class="appointastrojd appointastrojds">
                            <div class="p-2 appform">
                                <div class="innerforms innerformss" style="width: 100%;">
                                    <div class="tableliner">
                                        <h5 class="birth"
                                            style="font-size: 17px;margin-bottom: 20px;">
                                            Panchang Details
                                            <hr class="kundlitag"
                                                style="width: 160px;color:#fbe216;">
                                        </h5>
                                        <table style="width: 100%;">
                                            <tbody>
                                                @foreach ($basicKundliDetails as $key => $value)
                                                <tr>
                                                    <td>{{
                                                        ucfirst(str_replace('_',
                                                        ' ', $key)) }}</td>
                                                    <td>{{ $value }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="planetsPositionPage" class="appointastrojd">
                        </div>
                        <div id="kundliPage" class=" appointastrojd"></div>
                        <div id="bhavaKundliPage" class=" appointastrojd"></div>
                        <div id="dashaPage" class="appointastrojd"> </div>
                        <div id="planatPage" class="appointastrojd"></div>
                        <div id="doshaPage" class="appointastrojd"></div>
                        <div id="kaalsharpDoshaPage" class="appointastrojd">
                        </div>
                        <div id="pitraDoshaPage" class="appointastrojd"></div>
                        <div id="papasamayaPage" class="appointastrojd"></div>
                        <div id="sadeSatiPage" class="appointastrojd"></div>
                        <div id="friendshipPage" class="appointastrojd"></div>
                        <div id="extentdedHoroscopePage" class="appointastrojd">
                        </div>
                        <div id="gemSuggestionPage" class="appointastrojd">
                        </div>
                        </div>
                </div>
            </div>
        </div>


        <script src="https://kit.fontawesome.com/66f2518709.js"
            crossorigin="anonymous"></script>
        <script
            src="{{ asset('website/scripts/jquery/jquery.min.js?ver=3.7.1') }}">
        </script>
        <script
            src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js">
        </script>
        <script src="{{ asset('website/scripts/astrobuddy.js') }}"></script>

        <script>
            function showPage(pageId, e) {
            var pages = document.querySelectorAll('.appointastrojd');
            var tabs = document.querySelectorAll('.nav-link');
            pages.forEach(function(page) {
                page.classList.add('hidden');
            });
            tabs.forEach(function(tab) {
                tab.classList.remove('clickedpage');
            });
            var selectedPage = document.getElementById(pageId + 'Page');
            selectedPage.classList.remove('hidden');
            e.classList.add('clickedpage');
        }

        document.addEventListener("DOMContentLoaded", function() {
            var defaultTab = document.querySelector('.nav-link.clickedpage');
            if (defaultTab) {
                var pageId = defaultTab.getAttribute('href').substring(1).replace('Page', '');
                showPage(pageId, defaultTab);
            }
        });

        function activeTab(pageId, e) {
            var pages = document.querySelectorAll('.appointastrojd');
            pages.forEach(function(page) {
                page.classList.add('hidden');
            });
            var activeTabs = document.querySelectorAll('.kudlibutton');
            activeTabs.forEach(function(tab) {
                tab.classList.remove('activeTab');
            });
            var navLinks = document.querySelectorAll('.nav-link');
            navLinks.forEach(function(link) {
                link.classList.remove('clickedpage');
            });
            var selectedPage = document.getElementById(pageId + 'Page');
            selectedPage.classList.remove('hidden');
            e.classList.add('activeTab');
            e.classList.add('active');
        }

        function getPlanetsPosition() {
            var meetingId = null;
            var vcMeetingId = null;
            @if ($type === 'chat')
                meetingId = "{{ $meeting_id }}";
            @elseif ($type === 'video' || $type === 'phone')
                vcMeetingId = "{{ $meeting_id }}";
            @endif
            var url = "{{ '/get-planetory-positions' }}";
            $('#preloader').show();

            $.ajax({
                url: url,
                type: 'GET',
                data: {
                    meetingId: meetingId,
                    vcMeetingId: vcMeetingId
                },
                success: function(response) {
                    var kundli_chart = $('#planetsPositionPage');
                    console.log(kundli_chart);
                    $('#preloader').hide();
                    kundli_chart.html(response);
                },
                error: function(error) {
                    console.log('Error:', error);
                    $('#preloader').hide();
                }
            });
        }

        function getbirthChart() {
            var meetingId = null;
            var vcMeetingId = null;
            @if ($type === 'chat')
                var meetingId = "{{ $meeting_id }}";
            @elseif ($type === 'video' || $type === 'phone')
                var vcMeetingId = "{{ $meeting_id }}";
            @endif
            var url = "{{ '/get-kundli-charts' }}";
            $('#preloader').show();
            $.ajax({
                url: url,
                type: 'GET',
                data: {
                    meetingId: meetingId,
                    vcMeetingId: vcMeetingId
                },
                success: function(response) {
                    var kundli_chart = $('#kundliPage');
                    $('#preloader').hide();
                    kundli_chart.html(response);
                    console.log(response);
                },
                error: function(error) {
                    console.log('Error:', error);
                    $('#preloader').hide();
                }
            });
        }

        function getBhavaKundliChart() {
            var meetingId = null;
            var vcMeetingId = null;
            @if ($type === 'chat')
                var meetingId = "{{ $meeting_id }}";
            @elseif ($type === 'video' || $type === 'phone')
                var vcMeetingId = "{{ $meeting_id }}";
            @endif
            var url = "{{ '/get-bhava-kundli-charts' }}";
            $.ajax({
                url: url,
                type: 'GET',
                data: {
                    meetingId: meetingId,
                    vcMeetingId: vcMeetingId
                },
                success: function(response) {
                    var kundli_chart = $('#bhavaKundliPage');
                    console.log(kundli_chart);
                    kundli_chart.html(response);
                },
                error: function(error) {
                    console.log('Error:', error);
                }
            });
        }

        function getDashaChart() {
            var meetingId = null;
            var vcMeetingId = null;
            @if ($type === 'chat')
                var meetingId = "{{ $meeting_id }}";
            @elseif ($type === 'video' || $type === 'phone')
                var vcMeetingId = "{{ $meeting_id }}";
            @endif
            var url = "{{ '/get-maha-dasha' }}";
            $('#preloader').show();
            $.ajax({
                url: url,
                type: 'GET',
                data: {
                    meetingId: meetingId,
                    vcMeetingId: vcMeetingId
                },
                success: function(response) {
                    var dasha_chart = $('#dashaPage');
                    console.log(dasha_chart);
                    $('#preloader').hide();
                    dasha_chart.html(response);
                },
                error: function(error) {
                    console.log('Error:', error);
                    $('#preloader').hide();
                }
            });
        }

        function getAntardasha() {
            var meetingId = null;
            var vcMeetingId = null;
            @if ($type === 'chat')
                var meetingId = "{{ $meeting_id }}";
            @elseif ($type === 'video' || $type === 'phone')
                var vcMeetingId = "{{ $meeting_id }}";
            @endif
            var url = "{{ '/get-antar-dasha' }}";
            $.ajax({
                url: url,
                type: 'GET',
                data: {
                    meetingId: meetingId,
                    vcMeetingId: vcMeetingId
                },
                success: function(response) {
                    var dasha_chart = $('#dashaPage');
                    console.log(dasha_chart);
                    dasha_chart.html(response);
                },
                error: function(error) {
                    console.log('Error:', error);
                }
            });
        }

        function getParyantardasha() {
            var meetingId = null;
            var vcMeetingId = null;
            @if ($type === 'chat')
                var meetingId = "{{ $meeting_id }}";
            @elseif ($type === 'video' || $type === 'phone')
                var vcMeetingId = "{{ $meeting_id }}";
            @endif
            var url = "{{ '/get-paryantar-dasha' }}";
            $.ajax({
                url: url,
                type: 'GET',
                data: {
                    meetingId: meetingId,
                    vcMeetingId: vcMeetingId
                },
                success: function(response) {
                    var dasha_chart = $('#dashaPage');
                    console.log(dasha_chart);
                    dasha_chart.html(response);
                },
                error: function(error) {
                    console.log('Error:', error);
                }
            });
        }

        function getMahadashaPrediction() {
            var meetingId = null;
            var vcMeetingId = null;
            @if ($type === 'chat')
                var meetingId = "{{ $meeting_id }}";
            @elseif ($type === 'video' || $type === 'phone')
                var vcMeetingId = "{{ $meeting_id }}";
            @endif
            var url = "{{ '/get-mahadasha-prediction' }}";
            $('#preloader').show();
            $.ajax({
                url: url,
                type: 'GET',
                data: {
                    meetingId: meetingId,
                    vcMeetingId: vcMeetingId
                },
                success: function(response) {
                    var dasha_chart = $('#dashaPage');
                    console.log(dasha_chart);
                    $('#preloader').hide();
                    dasha_chart.html(response);
                },
                error: function(error) {
                    console.log('Error:', error);
                    $('#preloader').hide();
                }
            });
        }

        function getSadheShati() {
            var meetingId = null;
            var vcMeetingId = null;
            @if ($type === 'chat')
                var meetingId = "{{ $meeting_id }}";
            @elseif ($type === 'video' || $type === 'phone')
                var vcMeetingId = "{{ $meeting_id }}";
            @endif
            var url = "{{ '/get-sade-sati' }}";
            $('#preloader').show();
            $.ajax({
                url: url,
                type: 'GET',
                data: {
                    meetingId: meetingId,
                    vcMeetingId: vcMeetingId
                },
                success: function(response) {
                    var sade_sati = $('#sadeSatiPage');
                    console.log(sade_sati);
                    $('#preloader').hide();
                    sade_sati.html(response);
                },
                error: function(error) {
                    console.log('Error:', error);
                    $('#preloader').hide();
                }
            });
        }

        function getSadheShatiTable() {
            var meetingId = null;
            var vcMeetingId = null;
            @if ($type === 'chat')
                var meetingId = "{{ $meeting_id }}";
            @elseif ($type === 'video' || $type === 'phone')
                var vcMeetingId = "{{ $meeting_id }}";
            @endif
            var url = "{{ '/get-sade-sati-table' }}";
            $('#preloader').show();
            $.ajax({
                url: url,
                type: 'GET',
                data: {
                    meetingId: meetingId,
                    vcMeetingId: vcMeetingId
                },
                success: function(response) {
                    var sade_sati = $('#sadeSatiPage');
                    console.log(sade_sati);
                    $('#preloader').hide();
                    sade_sati.html(response);
                },
                error: function(error) {
                    console.log('Error:', error);
                    $('#preloader').hide();
                }
            });
        }

        function getFriendshipTable() {
            var meetingId = null;
            var vcMeetingId = null;
            @if ($type === 'chat')
                var meetingId = "{{ $meeting_id }}";
            @elseif ($type === 'video' || $type === 'phone')
                var vcMeetingId = "{{ $meeting_id }}";
            @endif
            var url = "{{ '/get-friendship-table' }}";
            $('#preloader').show();
            $.ajax({
                url: url,
                type: 'GET',
                data: {
                    meetingId: meetingId,
                    vcMeetingId: vcMeetingId
                },
                success: function(response) {
                    var sade_sati = $('#friendshipPage');
                    console.log(sade_sati);
                    $('#preloader').hide();
                    sade_sati.html(response);
                },
                error: function(error) {
                    console.log('Error:', error);
                    $('#preloader').hide();
                }
            });
        }

        function getkpHouses() {
            var meetingId = null;
            var vcMeetingId = null;
            @if ($type === 'chat')
                var meetingId = "{{ $meeting_id }}";
            @elseif ($type === 'video' || $type === 'phone')
                var vcMeetingId = "{{ $meeting_id }}";
            @endif
            var url = "{{ '/get-kp-houses' }}";
            $('#preloader').show();
            $.ajax({
                url: url,
                type: 'GET',
                data: {
                    meetingId: meetingId,
                    vcMeetingId: vcMeetingId
                },
                success: function(response) {
                    var sade_sati = $('#extentdedHoroscopePage');
                    console.log(sade_sati);
                    $('#preloader').hide();
                    sade_sati.html(response);
                },
                error: function(error) {
                    console.log('Error:', error);
                    $('#preloader').hide();
                }
            });
        }

        function getkpHousesPlanet() {
            var meetingId = null;
            var vcMeetingId = null;
            @if ($type === 'chat')
                var meetingId = "{{ $meeting_id }}";
            @elseif ($type === 'video' || $type === 'phone')
                var vcMeetingId = "{{ $meeting_id }}";
            @endif
            var url = "{{ '/get-kp-houses-planet' }}";
            $('#preloader').show();
            $.ajax({
                url: url,
                type: 'GET',
                data: {
                    meetingId: meetingId,
                    vcMeetingId: vcMeetingId
                },
                success: function(response) {
                    var sade_sati = $('#extentdedHoroscopePage');
                    console.log(sade_sati);
                    $('#preloader').hide();
                    sade_sati.html(response);
                },
                error: function(error) {
                    console.log('Error:', error);
                    $('#preloader').hide();
                }
            });
        }

        function getGemSuggestion() {
            var meetingId = null;
            var vcMeetingId = null;
            @if ($type === 'chat')
                var meetingId = "{{ $meeting_id }}";
            @elseif ($type === 'video' || $type === 'phone')
                var vcMeetingId = "{{ $meeting_id }}";
            @endif
            var url = "{{ '/get-gem-suggestion' }}";
            $('#preloader').show();
            $.ajax({
                url: url,
                type: 'GET',
                data: {
                    meetingId: meetingId,
                    vcMeetingId: vcMeetingId
                },
                success: function(response) {
                    var sade_sati = $('#gemSuggestionPage');
                    console.log(sade_sati);
                    $('#preloader').hide();
                    sade_sati.html(response);
                },
                error: function(error) {
                    console.log('Error:', error);
                    $('#preloader').hide();
                }
            });
        }

        function getRudrakshSuggestion() {
            var meetingId = null;
            var vcMeetingId = null;
            @if ($type === 'chat')
                var meetingId = "{{ $meeting_id }}";
            @elseif ($type === 'video' || $type === 'phone')
                var vcMeetingId = "{{ $meeting_id }}";
            @endif
            var url = "{{ '/get-rudraksh-suggestion' }}";
            $('#preloader').show();
            $.ajax({
                url: url,
                type: 'GET',
                data: {
                    meetingId: meetingId,
                    vcMeetingId: vcMeetingId
                },
                success: function(response) {
                    var sade_sati = $('#extentdedHoroscopePage');
                    console.log(sade_sati);
                    $('#preloader').hide();
                    sade_sati.html(response);
                },
                error: function(error) {
                    console.log('Error:', error);
                    $('#preloader').hide();
                }
            });
        }

        function getPersonalCharacterstics() {
            var meetingId = null;
            var vcMeetingId = null;
            @if ($type === 'chat')
                var meetingId = "{{ $meeting_id }}";
            @elseif ($type === 'video' || $type === 'phone')
                var vcMeetingId = "{{ $meeting_id }}";
            @endif
            var url = "{{ '/get-personal-characterstics' }}";
            $('#preloader').show();
            $.ajax({
                url: url,
                type: 'GET',
                data: {
                    meetingId: meetingId,
                    vcMeetingId: vcMeetingId
                },
                success: function(response) {
                    var sade_sati = $('#extentdedHoroscopePage');
                    console.log(sade_sati);
                    $('#preloader').hide();
                    sade_sati.html(response);
                },
                error: function(error) {
                    console.log('Error:', error);
                    $('#preloader').hide();
                }
            });
        }

        function getAscendantReport() {
            var meetingId = null;
            var vcMeetingId = null;
            @if ($type === 'chat')
                var meetingId = "{{ $meeting_id }}";
            @elseif ($type === 'video' || $type === 'phone')
                var vcMeetingId = "{{ $meeting_id }}";
            @endif
            var url = "{{ '/get-ascendant-report' }}";
            $('#preloader').show();
            $.ajax({
                url: url,
                type: 'GET',
                data: {
                    meetingId: meetingId,
                    vcMeetingId: vcMeetingId
                },
                success: function(response) {
                    var sade_sati = $('#extentdedHoroscopePage');
                    console.log(sade_sati);
                    $('#preloader').hide();
                    sade_sati.html(response);
                },
                error: function(error) {
                    console.log('Error:', error);
                    $('#preloader').hide();
                }
            });
        }

        function getPlanetReport() {
            var meetingId = null;
            var vcMeetingId = null;
            @if ($type === 'chat')
                var meetingId = "{{ $meeting_id }}";
            @elseif ($type === 'video' || $type === 'phone')
                var vcMeetingId = "{{ $meeting_id }}";
            @endif
            var url = "{{ '/get-planet-report' }}";
            $('#preloader').show();
            $.ajax({
                url: url,
                type: 'GET',
                data: {
                    meetingId: meetingId,
                    vcMeetingId: vcMeetingId
                },
                success: function(response) {
                    var sade_sati = $('#extentdedHoroscopePage');
                    console.log(sade_sati);
                    $('#preloader').hide();
                    sade_sati.html(response);
                },
                error: function(error) {
                    console.log('Error:', error);
                    $('#preloader').hide();
                }
            });
        }

        function getMangalDosha() {
            var meetingId = null;
            var vcMeetingId = null;
            @if ($type === 'chat')
                var meetingId = "{{ $meeting_id }}";
            @elseif ($type === 'video' || $type === 'phone')
                var vcMeetingId = "{{ $meeting_id }}";
            @endif
            var url = "{{ '/get-mangal-dosha' }}";
            $('#preloader').show();
            $.ajax({
                url: url,
                type: 'GET',
                data: {
                    meetingId: meetingId,
                    vcMeetingId: vcMeetingId
                },
                success: function(response) {
                    var sadheSati_chart = $('#doshaPage');
                    console.log(sadheSati_chart);
                    $('#preloader').hide();
                    sadheSati_chart.html(response);
                },
                error: function(error) {
                    console.log('Error:', error);
                    $('#preloader').hide();
                }
            });
        }

        function getKaalsharpDosha() {
            var meetingId = null;
            var vcMeetingId = null;
            @if ($type === 'chat')
                var meetingId = "{{ $meeting_id }}";
            @elseif ($type === 'video' || $type === 'phone')
                var vcMeetingId = "{{ $meeting_id }}";
            @endif
            var url = "{{ '/get-kaalsharp-dosha' }}";
            $('#preloader').show();
            $.ajax({
                url: url,
                type: 'GET',
                data: {
                    meetingId: meetingId,
                    vcMeetingId: vcMeetingId
                },
                success: function(response) {
                    var sadheSati_chart = $('#kaalsharpDoshaPage');
                    console.log(sadheSati_chart);
                    $('#preloader').hide();
                    sadheSati_chart.html(response);
                },
                error: function(error) {
                    console.log('Error:', error);
                    $('#preloader').hide();
                }
            });
        }

        function getPitraDosha() {
            var meetingId = null;
            var vcMeetingId = null;
            @if ($type === 'chat')
                var meetingId = "{{ $meeting_id }}";
            @elseif ($type === 'video' || $type === 'phone')
                var vcMeetingId = "{{ $meeting_id }}";
            @endif
            var url = "{{ '/get-pitra-dosha' }}";
            $('#preloader').show();
            $.ajax({
                url: url,
                type: 'GET',
                data: {
                    meetingId: meetingId,
                    vcMeetingId: vcMeetingId
                },
                success: function(response) {
                    var sadheSati_chart = $('#pitraDoshaPage');
                    console.log(sadheSati_chart);
                    $('#preloader').hide();
                    sadheSati_chart.html(response);
                },
                error: function(error) {
                    console.log('Error:', error);
                    $('#preloader').hide();
                }
            });
        }

        function getPapasamaya() {
            var meetingId = null;
            var vcMeetingId = null;
            @if ($type === 'chat')
                var meetingId = "{{ $meeting_id }}";
            @elseif ($type === 'video' || $type === 'phone' )
                var vcMeetingId = "{{ $meeting_id }}";
            @endif
            var url = "{{ '/get-papasamaya' }}";
            $('#preloader').show();
            $.ajax({
                url: url,
                type: 'GET',
                data: {
                    meetingId: meetingId,
                    vcMeetingId: vcMeetingId
                },
                success: function(response) {
                    var sadheSati_chart = $('#papasamayaPage');
                    console.log(sadheSati_chart);
                    $('#preloader').hide();
                    sadheSati_chart.html(response);
                },
                error: function(error) {
                    console.log('Error:', error);
                    $('#preloader').hide();
                }
            });
        }
        </script>
        <script>
            function openTab(event, tabId) {
            const contents = document.querySelectorAll('.nav-link');
            contents.forEach(content => {
                content.classList.remove('active');
            });
            const buttons = document.querySelectorAll('.tab-button');
            buttons.forEach(button => {
                button.classList.remove('active');
            });
            document.getElementById(tabId).classList.add('active');
            event.currentTarget.classList.add('active');
        }
        </script>
        <script>
            var button = document.getElementById('myButton');
        button.addEventListener('click', function() {
            var messageParagraph = document.getElementById('message');
            messageParagraph.textContent = 'Button was clicked!';
        });
        </script>
        <script
            src="{{ asset('website/themes/astrologer/assets/js/astrologer-custom-script.js?ver=20151215') }}"
            id="astrologer-custom-script-js"></script>


        <script src="{{ asset('website/scripts/astrobuddy.js') }}"></script>
        {{--  <script>
            document.addEventListener("DOMContentLoaded", function() {
            window.onload = function() {
                var preloader = document.getElementById('preloader');
                var content = document.getElementById('content');
                preloader.style.display = 'none';
            };
        });
        </script>  --}}
        <script>
            var modal = document.getElementById("kundaliModal");
        var btn = document.getElementById("openModalBtn");
        var span = document.getElementsByClassName("close")[0];
        btn.onclick = function() {
            modal.style.display = "block";
        }
        span.onclick = function() {
            modal.style.display = "none";
        }
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        function closeKundliPopup() {
        const modal = document.getElementById('kundaliModal');
        const content = modal.querySelector('.modal-content');

        // Add the slide-out class to start animation
        content.classList.add('slide-out');

        // When animation ends, hide the modal completely and reset class
        content.addEventListener('animationend', () => {
        modal.style.display = 'none';
        content.classList.remove('slide-out'); // Correct element here
        }, { once: true });
        }
        </script>
    </body>
</html>
