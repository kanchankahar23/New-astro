@extends('website.website_master')
@section('title', 'Horoscope')
@section('content')

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="{{ asset('website/uploads/sites/3/2021/09/vas_1.png') }}" sizes="32x32" />
        <link rel="icon" href="{{ asset('website/uploads/sites/3/2021/09/vas_1.png') }}" sizes="192x192" />
        <link rel="stylesheet" href="{{ asset('website/styles/style.min.css') }}" />

        <link rel="stylesheet" href="{{ asset('website/plugins/astro-appointment/assets/css/freekundli.css') }}" />
        <link rel="stylesheet" href="{{ asset('website/plugins/astro-appointment/assets/css/responsive.css') }}">

        <link rel="stylesheet" type="text/css"
            href="{{ asset('website/plugins/astro-appointment/assets/css/bootstrap.css') }}" />
        <link rel="stylesheet" type="text/css"
            href="{{ asset('website/plugins/astro-appointment/assets/css/style.css') }}" />
        <link rel="stylesheet"
            href="{{ asset('website/themes/astrologer/assets/css/astrologer-custom-style.css?ver=1') }}" />
        <!-- <link rel="stylesheet" href="{{ asset('website/plugins/astro-appointment/assets/css/freekundli.css') }}" /> -->

        <link rel="stylesheet" href="{{ asset('website/plugins/astro-appointment/assets/css/bestastro.css') }}" />
        <link rel="stylesheet"
            href="{{ asset('website/themes/astrologer/assets/css/astrologer-custom-light-style.css?ver=1') }}" />

        <link
            href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
            rel="stylesheet" />

        <style>
            .active-tab {
                background: var(--primary-color);
                background: -moz-linear-gradient(top, #fbe016a1 2%, #fbe216 100%);
                background: -webkit-linear-gradient(top, #fbe016a1 2%, #fbe216 100%);
                background: linear-gradient(to bottom, #fbe01634 2%, #fbe216 100%);
                border-color: var(--al-border-color);
            }
        </style>
    </head>

    <body>
        <div class="ast_slider_wrapper" style=" margin-bottom: 0;">
            <div class="astrooverlay"></div>
            <div class="ast_banner_text">
                <div class="ast_waves3">
                    <div class="ast_wave"></div>
                    <div class="ast_wave"></div>
                    <div class="ast_wave"></div>
                </div>
                <div class="appointment">
                    <div class="appheading rr-appheading">
                        @if ($report_type == 'daily')
                            <h2>AstroBuddy Daily Horoscope</h2>
                        @elseif($report_type == 'weekly')
                            <h2>AstroBuddy Weekly Horoscope</h2>
                        @elseif($report_type == 'yearly')
                            <h2>AstroBuddy Yearly Horoscope</h2>
                        @endif
                    </div>
                    <ul class="homeapp">
                        <li><a href="">Home</a></li>
                        <li>//</li>
                        <li><a href="" class="hh2appoint">Horoscope</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="horoscope-data-container">
            @include('horoscope.daily_weekly_yearly_horoscope')
        </div>
        </div>
        </div>
    </body>
    <script src="https://kit.fontawesome.com/66f2518709.js" crossorigin="anonymous"></script>

    <script src="{{ asset('website/scripts/jquery/jquery.min.js?ver=3.7.1') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function changePeriod() {
            var period = $('#periodSelect').val();
            var activeTab = {{ $zodiac }};
            if (activeTab) {
                var url = "/" + period + "/horoscope/" + activeTab;
                window.location.href = url;
            } else {
                alert("Please select a zodiac sign first.");
            }
        }
    </script>
    <script>
        {{--  $(document).on('change', '#languageSelect', function() {
            loadHoroscopeData(); // Load horoscope when language is changed
        });
        function loadHoroscopeData(element = null) {
            var id;

            if (element !== null) {
                id = $(element).data('id');
            } else {
                id = "{{ $zodiac }}";
            }
            var lang = $('#languageSelect').val();
            $('#preloader').show();
            $.ajax({
                url: "{{ url($report_type . '/horoscope-response/') }}" + "/" + id,
                method: 'GET',
                data: {
                    lang: lang
                },
                success: function(data) {
                    $('#horoscope-data-container').html(data);
                    $('#preloader').hide();
                },
                error: function() {
                    $('#horoscope-data-container').html('<p>An error has occurred</p>');
                    $('#preloader').hide();
                }
            });
        }
        $(document).on('click', 'a[data-id]', function(event) {
            event.preventDefault();
            loadHoroscopeData(this);
        });  --}}
        $(document).on('change', '#languageSelect', function() {
            loadHoroscopeData(); // Load horoscope when language is changed
        });
        function loadHoroscopeData(element = null) {
            var id;
            if (element !== null) {
                id = $(element).data('id');
            } else {
                id = $('.as-sign-box.active-tab').closest('a').data('id');
            }
            var lang = $('#languageSelect').val();
            $('#preloader').show();
            $.ajax({
                url: "{{ url($report_type . '/horoscope-response/') }}" + "/" + id,
                method: 'GET',
                data: {
                    lang: lang
                },
                success: function(data) {
                    $('#horoscope-data-container').html(data);
                    $('#preloader').hide();
                },
                error: function() {
                    $('#horoscope-data-container').html('<p>An error has occurred</p>');
                    $('#preloader').hide();
                }
            });
        }

        $(document).on('click', 'a[data-id]', function(event) {
            event.preventDefault();
            loadHoroscopeData(this);
        });
    </script>

@endsection
