<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Astrobuddy | Kundli Details</title>
    <link rel="icon" href="{{ asset('website/uploads/sites/3/2021/09/vas_1.png') }}" sizes="32x32" />
    <link rel="icon" href="{{ asset('website/uploads/sites/3/2021/09/vas_1.png') }}" sizes="192x192" />
    <link rel="stylesheet" href="{{ asset('website/kundli/kundli.css') }}" />
    <link rel="stylesheet" href="{{ asset('website/styles/style.min.css') }}" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('website/plugins/astro-appointment/assets/css/bootstrap.css') }}">
    <link rel="stylesheet"
        href="{{ asset('website/themes/astrologer/assets/css/astrologer-custom-style.css?ver=1') }}" />
    <link rel="stylesheet" href="{{ asset('website/plugins/astro-appointment/assets/css/freekundli.css') }}">
    <link rel="stylesheet" href="{{ asset('website/plugins/astro-appointment/assets/css/bestastro.css') }}">
    <link rel="stylesheet" href="{{ asset('website/plugins/astro-appointment/assets/css/somefooter.css') }}">
    <link rel="stylesheet"
        href="{{ asset('website/themes/astrologer/assets/css/astrologer-custom-light-style.css?ver=1') }}" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:400%7CPhilosopher:400&display=swap" rel="stylesheet"
        property="stylesheet" media="all" type="text/css" />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('website/plugins/astro-appointment/assets/css/responsive.css') }}">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        .tableliner {
            width: 95%;
            margin: 40px auto;
        }

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

        .table-striped thead th,
        table thead th,
        table th {
            color: #101010;
        }


        .text-center {
            text-align: center;
        }

        .scrollbar::-webkit-scrollbar {
                {
                    {
                    -- display: ;
                    --
                }
            }
        }

        .scrollbar::-webkit-scrollbar {
            width: 5px;
            height: 8px;
            border-radius: 5px;
            background-color: #aaa;
            /* or add it to the track */
        }

        /* Add a thumb */
        .scrollbar::-webkit-scrollbar-thumb {
            width: 3px;
            background: #fbe216;
            border-radius: 5px;

        }

        .chartbutton.active {
            background-color: #fbe216;
            color: #ff3366;
        }

        .kundlitag {
            color: #fbe216 !important;
            ;
        }

        .kundlidetailsfirst {
            float: left;
            width: 100%;
            position: relative;
            background-color: #111111;
            z-index: 1;
            background-image: url('https://hips.hearstapps.com/hmg-prod/images/solar-system-royalty-free-image-1649969440.jpg?crop=1xw:0.75xh;center,top&resize=1200:*');
            background-size: cover;
            margin-bottom: 70px;
        }

        .table-striped>tbody>tr:nth-of-type(odd) {
            --bs-table-accent-bg: #ffffaf !important;
            ;
            color: var(--bs-table-striped-color);
        }
    </style>

</head>


<body>
    @include('website.website_header')
    <div id="preloader">
        <div class="loader" style="    display: flex; align-items: center; justify-content: center;">
            {{--  <img src="https://kamleshyadav.com/html/astrology/version-3/assets/images/loader.png" alt=""
                    class="img-responsive" width="10%" style="border-radius: 25%;">  --}}
            <img src="{{ url('website/uploads/sites/3/2021/08/pandit.png') }}" alt="" width="50%"
                style="border-radius: 25%; z-index: 999;">
            <img class="rot" style=" width: 290px;
    position: absolute; opacity: 0.5;"
                src="{{ url('loader/chakra_one.png') }}" alt="">
        </div>
    </div>
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
                    <h2>Free Kundli</h2>
                </div>
                <ul class="homeapp">
                    <li>
                    <li><a href="" class="hh2appoint">Get instant & accurate, Janam Kundli</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="ast_packages_wrapper ast_bottompadder70">
        <div class="appointfirst" style="margin: 40px auto;">
            <h3>Kundli Details
                <h4 class="tagline"><span></span></h4>
            </h3><br>
            <!-- Rounded tabs -->
            <ul style="border: 1px solid #988c8c38;" id="myTab" role="tablist"
                class="mobRestable text-center border-0 nav nav-tabs nav-pills flex-column flex-sm-row bg-light rounded-nav">
                <li class="nav-item flex-sm-fill listrestheader">
                    <a href="#basicPage" id="basic-tab" onclick="showPage('basic', this)" data-toggle="tab"
                        href="#home" role="tab" aria-controls="home" aria-selected="true"
                        class="border-0 nav-link text-uppercase clickedpage">Kundli</a>
                </li>
                <li class="nav-item flex-sm-fill listrestheader">
                    <a href="#planetsPositionPage" onclick="showPage('planetsPosition', this),getPlanetsPosition()"
                        data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"
                        class="border-0 nav-link text-uppercase ">Planetary Position</a>
                </li>
                <li class="nav-item flex-sm-fill listrestheader">
                    <a id="kundli-tab" data-toggle="tab" href="#kundliPage" role="tab"
                        onclick="showPage('kundli', this),getbirthChart()" aria-controls="contact" aria-selected="false"
                        class="border-0 nav-link text-uppercase ">Charts</a>
                </li>

                <li class="nav-item flex-sm-fill listrestheader">
                    <a id="extentdedHoroscope-tab" data-toggle="tab" href="#extentdedHoroscopePage" role="tab"
                        onclick="showPage('extentdedHoroscope', this),getPersonalCharacterstics()"
                        aria-controls="profile" aria-selected="false"
                        class="border-0 nav-link text-uppercase ">General Prediction</a>
                </li>
                <li class="nav-item flex-sm-fill listrestheader">
                    <a id="dasha-tab" data-toggle="tab" href="#dashaPage" role="tab"
                        onclick="showPage('dasha', this),getDashaChart()" aria-controls="contact"
                        aria-selected="false" class="border-0 nav-link text-uppercase ">Dasha</a>
                </li>
                <li class="nav-item flex-sm-fill listrestheader">
                    <a id="sadeSati-tab" data-toggle="tab" href="#sadeSatiPage" role="tab"
                        onclick="showPage('sadeSati', this),getSadheShati('')" aria-controls="profile"
                        aria-selected="false" class="border-0 nav-link text-uppercase ">Extended
                        Horoscope</a>
                </li>
                <li class="nav-item flex-sm-fill listrestheader">
                    <a id="dosha-tab" data-toggle="tab" href="#doshaPage" role="tab"
                        onclick="showPage('dosha', this),getMangalDosha()" aria-controls="contact"
                        aria-selected="false" class="border-0 nav-link text-uppercase ">Dosha</a>
                </li>
            </ul>
            <br>
        </div>
        <div id="basicPage" class="appointastrojd">
            <div class="p-2 appform">
                <div class="innerforms">
                    <div class="tableliner">
                        <h5 class="birth" style="font-size: 17px;margin-bottom: 20px;">Bacis Details
                            <hr class="kundlitag basictag" style=" width: 115px;color:#fbe216; ">
                        </h5>
                        <table id='basicdetails' class='tableForm'>
                            <thead>
                                <tr>
                                    <th style="color: #000000;">@lang('messages.name')</th>
                                    <th style="color: #000000;">@lang('messages.gender')</th>
                                    <th style="color: #000000;">@lang('messages.date')</th>
                                    <th style="color: #000000;">@lang('messages.time')</th>
                                    <th style="color: #000000;">@lang('messages.place')</th>
                                    <th style="color: #000000;">@lang('messages.latitude')</th>
                                    <th style="color: #000000;">@lang('messages.longitude')</th>
                                    <th style="color: #000000;">@lang('messages.timezone')</th>
                                </tr>
                            </thead>
                            <tbody class='tabWidth'>
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
                    <div class="tableliner">
                        <h5 class="birth" style="font-size: 17px;margin-bottom: 20px;">Panchang Details
                            <hr class="kundlitag" style="width: 160px;color:#fbe216;">
                        </h5>
                        <table class='tableForm'>
                            <tbody id='panchangDetails'>
                                @foreach ($basicKundliDetails as $key => $value)
                                    <tr>
                                        <td> {{ trans("messages.$key") }}</td>
                                        <td class='valinFo'>{{ $value }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div id="planetsPositionPage" class="appointastrojd"></div>
        <div id="kundliPage" class=" appointastrojd"></div>
        <div id="bhavaKundliPage" class=" appointastrojd"></div>
        <div id="dashaPage" class="appointastrojd"> </div>
        <div id="planatPage" class="appointastrojd"></div>
        <div id="doshaPage" class="appointastrojd"></div>
        <div id="kaalsharpDoshaPage" class="appointastrojd"></div>
        <div id="pitraDoshaPage" class="appointastrojd"></div>
        <div id="papasamayaPage" class="appointastrojd"></div>
        <div id="sadeSatiPage" class="appointastrojd"></div>
        <div id="friendshipPage" class="appointastrojd"></div>
        <div id="extentdedHoroscopePage" class="appointastrojd"></div>
        <div id="gemSuggestionPage" class="appointastrojd"></div>
    </div>
    <script src="https://kit.fontawesome.com/66f2518709.js" crossorigin="anonymous"></script>
    @include('website.website_footer')
    <script src="{{ asset('website/scripts/jquery/jquery.min.js?ver=3.7.1') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- SCRIPTS ENDS -->
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


        {{--  function showPage(pageId, e) {
            var loader = document.getElementById('loader');
            loader.style.display = 'block';
            var pages = document.querySelectorAll('.appointastrojd');
            pages.forEach(function (page) {
                page.classList.add('hidden');
            });
            var activeTabs = document.querySelectorAll('.kudlibutton');
            activeTabs.forEach(function (tab) {
                tab.classList.remove('clickedpage');
            });
            var navLinks = document.querySelectorAll('.nav-link');
            navLinks.forEach(function (link) {
                link.classList.remove('active');
            });
            setTimeout(function () {
                var selectedPage = document.getElementById(pageId + 'Page');
                selectedPage.classList.remove('hidden');
                e.classList.add('clickedpage');
                e.classList.add('active');
                loader.style.display = 'none';
            }, 1000);
        }  --}}

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
            var url = "{{ '/get-planetory-positions' }}";
            $('#preloader').show();
            $.ajax({
                url: url,
                type: 'GET',

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
            var url = "{{ '/get-kundli-charts' }}";
            $('#preloader').show();
            $.ajax({
                url: url,
                type: 'GET',
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
            var url = "{{ '/get-bhava-kundli-charts' }}";
            $.ajax({
                url: url,
                type: 'GET',
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
            var url = "{{ '/get-maha-dasha' }}";
            $('#preloader').show();
            $.ajax({
                url: url,
                type: 'GET',
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
            var url = "{{ '/get-antar-dasha' }}";
            $.ajax({
                url: url,
                type: 'GET',
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
            var url = "{{ '/get-paryantar-dasha' }}";
            $.ajax({
                url: url,
                type: 'GET',
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
            var url = "{{ '/get-mahadasha-prediction' }}";
            $('#preloader').show();
            $.ajax({
                url: url,
                type: 'GET',
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
            var url = "{{ '/get-sade-sati' }}";
            $('#preloader').show();
            $.ajax({
                url: url,
                type: 'GET',
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
            var url = "{{ '/get-sade-sati-table' }}";
            $('#preloader').show();
            $.ajax({
                url: url,
                type: 'GET',
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
            var url = "{{ '/get-friendship-table' }}";
            $('#preloader').show();
            $.ajax({
                url: url,
                type: 'GET',
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
            var url = "{{ '/get-kp-houses' }}";
            $('#preloader').show();
            $.ajax({
                url: url,
                type: 'GET',
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
            var url = "{{ '/get-kp-houses-planet' }}";
            $('#preloader').show();
            $.ajax({
                url: url,
                type: 'GET',
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
            var url = "{{ '/get-gem-suggestion' }}";
            $('#preloader').show();
            $.ajax({
                url: url,
                type: 'GET',
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
            var url = "{{ '/get-rudraksh-suggestion' }}";
            $('#preloader').show();
            $.ajax({
                url: url,
                type: 'GET',
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
            var url = "{{ '/get-personal-characterstics' }}";
            $('#preloader').show();
            $.ajax({
                url: url,
                type: 'GET',
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
            var url = "{{ '/get-ascendant-report' }}";
            $('#preloader').show();
            $.ajax({
                url: url,
                type: 'GET',
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
            var url = "{{ '/get-planet-report' }}";
            $('#preloader').show();
            $.ajax({
                url: url,
                type: 'GET',
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
            var url = "{{ '/get-mangal-dosha' }}";
            $('#preloader').show();
            $.ajax({
                url: url,
                type: 'GET',
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
            var url = "{{ '/get-kaalsharp-dosha' }}";
            $('#preloader').show();
            $.ajax({
                url: url,
                type: 'GET',
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
            var url = "{{ '/get-pitra-dosha' }}";
            $('#preloader').show();
            $.ajax({
                url: url,
                type: 'GET',
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
            var url = "{{ '/get-papasamaya' }}";
            $('#preloader').show();
            $.ajax({
                url: url,
                type: 'GET',
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
    <script src="{{ asset('website/themes/astrologer/assets/js/astrologer-custom-script.js?ver=20151215') }}"
        id="astrologer-custom-script-js"></script>

    {{--  <script>
            function showPage(pageName, element) {
                var tabs = document.getElementsByClassName("nav-link");
                for (var i = 0; i < tabs.length; i++) {
                    tabs[i].classList.remove("active");
                }
                var tabContents = document.querySelectorAll("[id$='Page']");
                for (var i = 0; i < tabContents.length; i++) {
                    tabContents[i].style.display = "none";
                }
                document.getElementById(pageName + "Page").style.display = "block";
                element.classList.add("active");
                localStorage.setItem('activeTab', pageName);
            }
            document.addEventListener('DOMContentLoaded', (event) => {
                const activeTab = localStorage.getItem('activeTab') || 'basic';
                document.getElementById(activeTab + "Page").style.display = "block";
                const activeLink = document.querySelector(`a[href="#${activeTab}Page"]`);
                if (activeLink) {
                    activeLink.classList.add('active');
                }
            });
        </script>  --}}
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

</html>
