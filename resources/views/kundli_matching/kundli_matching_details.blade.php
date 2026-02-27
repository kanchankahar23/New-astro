@extends('website.website_master')
@section('title','Kundli')
@section('content')
<head>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        .table-striped>tbody>tr:nth-of-type(odd) {
            --bs-table-accent-bg: #ffffaf !important;
            ;
            color: var(--bs-table-striped-color);
        }

        .table-striped thead th,
        table thead th,
        table th {
            color: #101010;
        }

        .tableliner table td {
            border: transparent !important;
            padding: 10px 10px;
            /* text-align: center !important; */
            padding-left: 31px;
            color: #101010;
            font-weight: 400;
            background: white;
            font-family: "Poppins", sans-serif;
        }

        .tableliner table {
            margin-top: 0 !important;
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
            margin: 10px;
            /* border: 1px solid rgba(116, 116, 116, 0.425); */
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

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kundli Matching</title>
    <link rel="stylesheet" href="{{ url('styles/style.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('website/kundli/kundli.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('website/plugins/astro-appointment/assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('website/plugins/astro-appointment/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ url('website/themes/astrologer/assets/css/astrologer-custom-style.css?ver=1') }}" />
    <link rel="stylesheet" href="{{ url('website/plugins/astro-appointment/assets/css/freekundli.css') }}">

    <link rel="stylesheet" href="{{ url('website/plugins/astro-appointment/assets/css/bestastro.css') }}">
    <link rel="stylesheet"
        href="{{ url('website/themes/astrologer/assets/css/astrologer-custom-light-style.css?ver=1') }}" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:400%7CPhilosopher:400&display=swap" rel="stylesheet"
        property="stylesheet" media="all" type="text/css" />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="./plugins/astro-appointment/assets/css/responsive.css">

    <link rel="stylesheet" href="{{ asset('website/plugins/astro-appointment/assets/css/somefooter.css') }}">

    <link rel="stylesheet" href="{{ asset('website/plugins/astro-appointment/assets/css/responsive.css') }}">

    
    <style type="text/css" data-type="vc_shortcodes-custom-css">


        .kundlitag {
            color: #fbe216 !important;
            ;
        }


        .appointment {
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 18px 0;
        }

        .tableliner {
            width: 90%;
            margin: 40px auto;
        }


    </style>

</head>
<body>
    @include('website.website_header')
  
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
                    <h2>Free Kundli Matching</h2>
                </div>
                <ul class="homeapp">
                    <li><a href="#" class="hh2appoint">Get instant & accurate, Kundli Matching</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="ast_packages_wrapper ast_bottompadder70">
        <div class="appointfirst" style="margin: 40px auto;">
            <h3 class='MatchingDetails'>Kundli Matching Details
                <h4 class="tagline"><span></span></h4>
            </h3><br>
            <!-- Rounded tabs -->
            <ul class='MatchingDkundali' style="border: 1px solid #988c8c38 !important;height: 43px;" id="myTab" role="tablist"
                class="text-center border-0 nav nav-tabs nav-pills flex-column flex-sm-row bg-light rounded-nav">
                <li class="nav-item flex-sm-fill GeneralPrediction allBoxBorder">
                    <a href="#basicPage" id="basic-tab" onclick="showPage('basic', this)" data-toggle="tab"
                        href="#home" role="tab" aria-controls="home" aria-selected="true"
                        class="border-0 nav-link text-uppercase font-weight-bold clickedpage">Ashtakoot</a>
                </li>
                <li class="nav-item flex-sm-fill GeneralPrediction allBoxBorder">
                    <a id="dashakoot-tab" href="#dashakootPage" onclick="showPage('dashakoot', this),getDashakoot()"
                        data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"
                        class="border-0 nav-link text-uppercase font-weight-bold">Dashakoot</a>
                </li>
                <li class="nav-item flex-sm-fill GeneralPrediction allBoxBorder">
                    <a id="aggregate-tab" data-toggle="tab" href="#aggregatePage" role="tab"
                        onclick="showPage('aggregate', this),getAggregateMatching()" aria-controls="contact"
                        aria-selected="false" class="border-0 nav-link text-uppercase font-weight-bold">Aggregate
                        Match</a>
                </li>
                <li class="nav-item flex-sm-fill GeneralPrediction allBoxBorder">
                    <a id="rajjuVedha-tab" data-toggle="tab" href="#rajjuVedhaPage" role="tab"
                        onclick="showPage('rajjuVedha', this),getRajjuVedha()" aria-controls="profile"
                        aria-selected="false" class="border-0 nav-link text-uppercase font-weight-bold">Rajju Vedha
                        Details</a>
                </li>
                <li class="nav-item flex-sm-fill GeneralPrediction allBoxBorder">
                    <a id="papasamaya-tab" data-toggle="tab" href="#papasamayaPage" role="tab"
                        onclick="showPage('papasamaya', this),getPapasamayaMatching()" aria-controls="contact"
                        aria-selected="false" class="border-0 nav-link text-uppercase font-weight-bold">Papasamaya
                        Match</a>
                </li>
            </ul>
            <br>
            <!-- End rounded tabs -->
        </div>
        <div id="basicPage" class="appointastrojd">
            <div class="appform">
                <div class="tableliner increeseOutWidth">
                    <h5 style="display: grid; justify-content: center;align-items: center;font-size: 1.5rem;">Ashtkoot
                        Milan
                        <hr class="kundlitag" style="width: 160px;color:#fbe216;">
                    </h5>
                    @php
                        $response_data = $response['response'];
                    @endphp

                    @if (isset($response_data['score']))
                        @php
                            $totalScore = $response_data['score'];
                            $outOf = 36;
                            $percentage = ($totalScore / $outOf) * 100;
                            $progressBarClass = $totalScore < 18 ? 'bg-danger' : 'bg-success';
                        @endphp

                        <div class="progress-card"
                            style="--color-accent: #ffd502;  width: 98%;  margin: 41px 10px 25px auto;">

                            <div class="progress-card-content" style="padding: 15px;">
                                <div style="display: flex; justify-content: space-between; margin-top: 5px;" class='totalScore'>
                                    <h6 class="progress-title">
                                        @lang('messages.overallScore')

                                        - {{ number_format($percentage, 2) }} %
                                    </h6>
                                </div>
                                <h6 class="progress-title" style="text-align: center;"> <i
                                        class="fa-solid fa-pen-nib"></i>&nbsp;&nbsp;
                                    {{ $response_data['bot_response'] ?? '--' }}
                                </h6>
                            </div>
                            <span class="progress-bar" style="--value:{{ $percentage }}%;"></span>
                        </div>
                    @else
                        <p><strong>Total Score:</strong> Not available</p>
                    @endif
                    <div class='DualDetails' style="display: flex">
                        <div class="table-wrap BchangeTable" style="width: -webkit-fill-available;">
                            <h5 class='basicDetails' style="margin: 8px auto; width: 90%;text-align: center;color: #1c1f25;">
                                @lang('messages.basicMaleDetails')

                            </h5>

                            @if (isset($response['response']))
                                @php
                                    $response_data = $response['response'];
                                @endphp
                                <table class="table table-striped DataTableTwo">
                                    <tbody>
                                         <tr>
                                            <td scope="row" class="ashtkootcolo leftNameM">
                                                @lang('messages.name')
                                            </td>
                                            <td class="ashtkootcolo rightNameM">{{ $kundliMatchingDetail->male_name ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <td scope="row">
                                                @lang('messages.birthDateTime')

                                            </td>
                                            <td>
                                                {{ $kundliMatchingDetail->male_dob ? \Carbon\Carbon::createFromFormat('d/m/Y', $kundliMatchingDetail->male_dob)->format('d M, Y') : '' }}
                                                | {{ $kundliMatchingDetail->male_tob ?? '' }}
                                            </td>

                                        </tr>

                                        <tr >
                                            <td scope="row" class="ashtkootcolo">
                                                @lang('messages.birthPlace')

                                            </td>
                                            <td class="ashtkootcolo">{{ $kundliMatchingDetail->male_place ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <td scope="row">
                                               @lang('messages.janamRashi')
                                            </td>
                                            <td>{{ $response_data['bhakoot']['boy_rasi_name'] ?? '--' }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            @else
                                <p>No data available.</p>
                            @endif
                        </div>
                        <div class="table-wrap BchangeTable" style="width: -webkit-fill-available;">
                            <h5 class='basicDetails' style="margin: 8px auto; width: 90%;text-align: center;color: #1c1f25;">
                                @lang('messages.basicFemaleDetails')

                            </h5>

                            @if (isset($response['response']))
                                @php
                                    $response_data = $response['response'];
                                @endphp
                                <table class="table table-striped DataTableTwo">
                                    <tbody>
                                        <tr class="ashtkootcolo">
                                            <td scope="row" class="ashtkootcolo">
                                                @lang('messages.name')
                                            </td>
                                            <td class="ashtkootcolo">{{ $kundliMatchingDetail->female_name ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <td scope="row">
                                                @lang('messages.birthDateTime')
                                            </td>
                                            <td>
                                                {{ $kundliMatchingDetail->female_dob ? \Carbon\Carbon::createFromFormat('d/m/Y', $kundliMatchingDetail->female_dob)->format('d M, Y') : '' }}
                                                | {{ $kundliMatchingDetail->female_tob ?? '' }}
                                            </td>

                                            {{--  <td>{{ $kundliMatchingDetail->female_dob ? \Carbon\Carbon::parse($kundliMatchingDetail->female_dob)->format('d M,Y') : '' }}
                                                | {{ $kundliMatchingDetail->female_tob ?? '' }}</td>  --}}
                                        </tr>
                                       <tr class="ashtkootcolo">
                                            <td scope="row" class="ashtkootcolo">
                                                @lang('messages.birthPlace')
                                            </td>
                                            <td class="ashtkootcolo">{{ $kundliMatchingDetail->female_place ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <td scope="row">
                                                @lang('messages.janamRashi')

                                            </td>
                                            <td>{{ $response_data['bhakoot']['girl_rasi_name'] ?? '--' }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            @else
                                <p>No data available.</p>
                            @endif
                        </div>
                    </div>
                    <div class="table-wrap lowTable BchangeTable">
                        @if (isset($response['response']))
                            @php
                                $response_data = $response['response'];
                            @endphp
                            <table class="table table-striped rotateTable">
                                <thead>
                                    <tr>
                                        <th>
                                            @lang('messages.Attribute')

                                        </th>
                                        <th>
                                            @lang('messages.male')

                                        </th>
                                        <th>
                                            @lang('messages.female')
                                        </th>
                                        <th>
                                            @lang('messages.description')
                                        </th>
                                        <th>
                                            @lang('messages.matchingPoints')
                                        </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr class="ashtkootcolo">
                                        <td scope="row" class="ashtkootcolo">
                                            @lang('messages.tara')
                                        </td>
                                        <td class="ashtkootcolo">{{ $response_data['tara']['boy_tara'] ?? '--' }}</td>
                                        <td class="ashtkootcolo">{{ $response_data['tara']['girl_tara'] ?? '--' }}</td>
                                        <td class="ashtkootcolo largetoScale">{{ $response_data['tara']['description'] ?? '--' }}</td>
                                        <td class="ashtkootcolo">{{ $response_data['tara']['tara'] ?? '--' }}/{{ $response_data['tara']['full_score'] ?? '--' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">
                                            @lang('messages.gana')
                                        </td>
                                        <td>{{ $response_data['gana']['boy_gana'] ?? '--' }}</td>
                                        <td>{{ $response_data['gana']['girl_gana'] ?? '--' }}</td>
                                        <td>{{ $response_data['gana']['description'] ?? '--' }}</td>
                                        <td>{{ $response_data['gana']['gana'] ?? '--' }}/{{ $response_data['gana']['full_score'] ?? '--' }}
                                        </td>
                                    </tr>
                                    <tr class="ashtkootcolo">
                                        <td scope="row" class="ashtkootcolo">
                                            @lang('messages.yoni')
                                        </td>
                                        <td class="ashtkootcolo">{{ $response_data['yoni']['boy_yoni'] ?? '--' }}</td>
                                        <td class="ashtkootcolo">{{ $response_data['yoni']['girl_yoni'] ?? '--' }}</td>
                                        <td class="ashtkootcolo">{{ $response_data['yoni']['description'] ?? '--' }}</td>
                                        <td class="ashtkootcolo">{{ $response_data['yoni']['yoni'] ?? '--' }}/{{ $response_data['yoni']['full_score'] ?? '--' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">
                                            @lang('messages.bhakoot')
                                        </td>
                                        <td>{{ $response_data['bhakoot']['boy_rasi_name'] ?? '--' }}</td>
                                        <td>{{ $response_data['bhakoot']['girl_rasi_name'] ?? '--' }}</td>
                                        <td class='largetoScale'>{{ $response_data['bhakoot']['description'] ?? '--' }}</td>
                                        <td>{{ $response_data['bhakoot']['bhakoot'] ?? '--' }}/{{ $response_data['bhakoot']['full_score'] ?? '--' }}
                                        </td>
                                    </tr>
                                    <tr class="ashtkootcolo">
                                        <td scope="row" class="ashtkootcolo">
                                            @lang('messages.grahamaitri')
                                        </td>
                                        <td class="ashtkootcolo">{{ $response_data['grahamaitri']['boy_lord'] ?? '--' }}</td>
                                        <td class="ashtkootcolo">{{ $response_data['grahamaitri']['girl_lord'] ?? '--' }}</td>
                                        <td class="ashtkootcolo">{{ $response_data['grahamaitri']['description'] ?? '--' }}</td>
                                        <td class="ashtkootcolo">{{ $response_data['grahamaitri']['grahamaitri'] ?? '--' }}/{{ $response_data['grahamaitri']['full_score'] ?? '--' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">
                                            @lang('messages.vasya')
                                        </td>
                                        <td>{{ $response_data['vasya']['boy_vasya'] ?? '--' }}</td>
                                        <td>{{ $response_data['vasya']['girl_vasya'] ?? '--' }}</td>
                                        <td class='largetoScale'>{{ $response_data['vasya']['description'] ?? '--' }}</td>
                                        <td>{{ $response_data['vasya']['vasya'] ?? '--' }}/{{ $response_data['vasya']['full_score'] ?? '--' }}
                                        </td>
                                    </tr>
                                    <tr class="ashtkootcolo">
                                        <td scope="row" class="ashtkootcolo">
                                            @lang('messages.nadi')
                                        </td>
                                        <td class="ashtkootcolo">{{ $response_data['nadi']['boy_nadi'] ?? '--' }}</td>
                                        <td class="ashtkootcolo">{{ $response_data['nadi']['girl_nadi'] ?? '--' }}</td>
                                        <td class="ashtkootcolo">{{ $response_data['nadi']['description'] ?? '--' }}</td>
                                        <td class="ashtkootcolo">{{ $response_data['nadi']['nadi'] ?? '--' }}/{{ $response_data['nadi']['full_score'] ?? '--' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">
                                            @lang('messages.varna'),
                                        </td>
                                        <td>{{ $response_data['varna']['boy_varna'] ?? '--' }}</td>
                                        <td>{{ $response_data['varna']['girl_varna'] ?? '--' }}</td>
                                        <td>{{ $response_data['varna']['description'] ?? '--' }}</td>
                                        <td>{{ $response_data['varna']['varna'] ?? '--' }}/{{ $response_data['varna']['full_score'] ?? '--' }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        @else
                            <p>No data available.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <div id="aggregatePage" class="appointastrojd"></div>
    <div id="dashakootPage" class="appointastrojd"></div>
    <div id="rajjuVedhaPage" class="appointastrojd"></div>
    <div id="papasamayaPage" class="appointastrojd"></div>

   
    <script src="{{ asset('website/scripts/astrobuddy.js') }}"></script>
    <script src="{{ asset('website/scripts/jquery/jquery.min.js?ver=3.7.1') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script
      src="https://kit.fontawesome.com/66f2518709.js"
      crossorigin="anonymous"
    ></script>


    <script
      src="https://kit.fontawesome.com/66f2518709.js"
      crossorigin="anonymous"
    ></script>
    <script src="{{ asset('website/scripts/jquery/jquery.min.js?ver=3.7.1')}}"></script>

    <script>

        function showPage(pageId, e) {
            var pages = document.querySelectorAll('.appointastrojd');
            var tabs = document.querySelectorAll('.nav-link');
            pages.forEach(function(page)

 {
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

        function getDashakoot() {
            var url = "{{ '/get-dashakoot-matching' }}";
            $('#preloader').show();
            $.ajax({
                url: url,
                type: 'GET',
                success: function(response) {
                    var kundli_chart = $('#dashakootPage');
                    console.log(kundli_chart);
                    kundli_chart.html(response);
                    $('#preloader').hide();
                },
                error: function(error) {
                    console.log('Error:', error);
                    $('#preloader').hide();
                }
            });
        }

        function getAggregateMatching() {
            var url = "{{ '/get-aggregate-matching' }}";
            $('#preloader').show();
            $.ajax({
                url: url,
                type: 'GET',
                success: function(response) {
                    var kundli_chart = $('#aggregatePage');
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

        function getRajjuVedha() {
            var url = "{{ '/get-rajju-vedha-matching' }}";
            $('#preloader').show();
            $.ajax({
                url: url,
                type: 'GET',
                success: function(response) {
                    var kundli_chart = $('#rajjuVedhaPage');
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

        function getPapasamayaMatching() {
            var url = "{{ '/get-papasamaya-matching' }}";
            $('#preloader').show();
            $.ajax({
                url: url,
                type: 'GET',
                success: function(response) {
                    var kundli_chart = $('#papasamayaPage');
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

    </script>
    <script src="https://kit.fontawesome.com/66f2518709.js" crossorigin="anonymous"></script>
    <script src="/scripts/jquery/jquery.min.js?ver=3.7.1"></script>
    <!-- <script src="/themes/astrologer/assets/js/astrologer-custom-script.js?ver=20151215" id="astrologer-custom-script-js">
    </script> -->
    <script src="./scripts/astrobuddy.js"></script>
   
@endsection
