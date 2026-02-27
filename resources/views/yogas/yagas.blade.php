@extends('website.website_master')
@section('title','Kundli')
@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('website/uploads/sites/3/2021/09/vas_1.png') }}" sizes="32x32" />
    <link rel="icon" href="{{ asset('website/uploads/sites/3/2021/09/vas_1.png') }}" sizes="192x192" />
    <link rel="stylesheet" href="{{ asset('website/styles/style.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('website/plugins/astro-appointment/assets/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('website/plugins/astro-appointment/assets/css/freekundli.css') }}">

    <link rel="stylesheet" type="text/css"
        href="{{ asset('website/plugins/astro-appointment/assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('website/plugins/astro-appointment/assets/css/style.css') }}">
    <link rel="stylesheet"
        href="{{ asset('website/themes/astrologer/assets/css/astrologer-custom-style.css?ver=1') }}" />


    <link rel="stylesheet" href="{{ asset('website/plugins/astro-appointment/assets/css/bestastro.css') }}">
    <link rel="stylesheet"
        href="{{ asset('website/themes/astrologer/assets/css/astrologer-custom-light-style.css?ver=1') }}" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:400%7CPhilosopher:400&display=swap" rel="stylesheet"
        property="stylesheet" media="all" type="text/css" />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">





    <style type="text/css" data-type="vc_shortcodes-custom-css">

        .appointfirst h3 {
         width: 90%;
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

        .ast_slider_wrapper {
            float: left;
            width: 100%;
            position: relative;
            background-color: #111111;
            z-index: 1;
            background-image: url('https://hips.hearstapps.com/hmg-prod/images/solar-system-royalty-free-image-1649969440.jpg?crop=1xw:0.75xh;center,top&resize=1200:*');
            background-size: cover;
        }
    </style>



    <style>
        .appointmentastro {
            background-image: url("{{ asset('website/assets/header/slider1.jpg') }}") !important;
        }

        .appointment {
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 18px 0;
        }

        .appheading h2 {
            font-family: 'Philosopher', sans-serif;
            font-weight: 600;
            font-size: 36px;
            color: white;
        }

        .homeapp {
            width: 90%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 15px auto;
        }

        .homeapp li {
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 0;
        }

        .homeapp li a {
            color: #ffffff;
            font-size: 18px;
            padding: 0px 10px;
            text-decoration: none;
        }

        .hh2appoint {
            color: #ff7010 !important;
        }
    </style>

</head>

<body>
    <!--Slider Start-->
    <div class="appointmentastro">
        <div class="astrooverlay"></div>
        <div class="ast_banner_text">


            <div class="ast_waves3">
                <div class="ast_wave"></div>
                <div class="ast_wave"></div>
                <div class="ast_wave"></div>
            </div>
            <div class="appointment">
                <div class="appheading">
                    <h2>Free Yoga's</h2>
                </div>

                <ul class="homeapp">

                    <li><a href="" class="hh2appoint">Get instant & accurate, your Yoga's</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!--Slider End-->
    <!--Price Start-->
    <div class="appointfirst">

        <h3>Free Yoga's Online - Get Your Yoga's with Characteristics.
            <hr style="width: 73%;">
        </h3>
        <p>At Astrobuddy, we offer insightful and accurate readings on various astrological yogas that can shape your destiny. Yogas are powerful combinations of planets in your horoscope that influence different aspects of life, such as prosperity, health, relationships, and success. Our expert-guided interpretations ensure you receive authentic insights. Let us help you unlock the hidden potential of these yogas, guiding you on your path to success and fulfillment.</p>

    </div>
    <div class="appointastrojd YoGAsForm" style="width: 83%;">
        <div class="appform">
            <h3 style="text-align: left; width: 86%;">Get Yoga's</h3>
            <h4 class="tagline" style="width: 85.7%; margin-top: -35px; margin-bottom: 15px;"><span></span></h4>
            <form action="{{ url('/yogas-details') }}" method="POST">
                @csrf
                @method('POST')
                <div class="userform" style="margin-top: -15px;">

                    <div class="username">
                        <div class="fullname">
                            <label>name</label>
                            <input type="text" placeholder="Enter Your Full Name" name="full_name">
                        </div>
                        <div class="googleemail">
                            <label>gender</label>
                            <select style="font-size: 0.9rem;font-weight: 600;" name="gender">
                                <option style="font-size: 0.9rem;font-weight: 600;" value="male">Male</option>
                                <option style="font-size: 0.9rem;font-weight: 600;" value="female">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="userdate">
                        {{--  <h5 class="birth">Birth Details
                            <hr class="details">
                        </h5>  --}}
                        <div class="username">
                            <div class="fullname">
                                <label>Date Of Birth</label>
                                <input type="date" id="start" name="dob" value="2018-07-22"  />
                            </div>
                            <div class="googleemail">
                                <label>Time Of Birth</label>
                                <input type="time" id="start" name="tob"   />
                            </div>
                        </div>
                    </div>
                    <div class="userdate">

                        <div class="username">
                            <div class="fullname">
                                <label>Place</label>
                                <input type="search" name="place" class="city-input form-control"
                                    placeholder="Enter your birth place" autocomplete="off" required>
                                <input type="hidden" class="lat-input form-control" name="lat">
                                <input type="hidden" class="lon-input form-control" name="lon">
                                <div class="suggestions"></div>

                                {{--  <input _ngcontent-serverapp-c113="" type="search" name="place" id="city"
                            oncut="return false" ondrag="return false"
                            ondrop="return false" required="" aria-required="true"
                            class="mat-autocomplete-trigger form-control ng-pristine ng-invalid ng-touched"
                            placeholder="Enter Your birth place" autocomplete="off" role="combobox"
                            aria-autocomplete="list" aria-expanded="false" aria-haspopup="true">
                            <input class="form-control" id="lat" type="hidden" name="lat">
                            <input class="form-control" id="lon" type="hidden" name="lon">
                            <div id="suggestions" class="suggestions"></div>  --}}
                            </div>
                            <div class="googleemail">
                                <label>Language</label>
                                        <select style="font-size: 0.9rem;font-weight: 600;" name="lang">
                                            <option style="font-size: 0.9rem;font-weight: 600;" value="hi">Hindi</option>
                                            <option style="font-size: 0.9rem;font-weight: 600;" value="en">English</option>
                                            <option style="font-size: 0.9rem;font-weight: 600;" value="ml">Malayalam</option>
                                            <option style="font-size: 0.9rem;font-weight: 600;" value="ta">Tamil</option>
                                            <option style="font-size: 0.9rem;font-weight: 600;" value="ka">Kannada</option>
                                            <option style="font-size: 0.9rem;font-weight: 600;" value="te">Telegu</option>
                                            <option style="font-size: 0.9rem;font-weight: 600;" value="sp">Spanish</option>
                                            <option style="font-size: 0.9rem;font-weight: 600;" value="fr">French</option>
                                        </select>
                                        @error('lang')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                            </div>
                        </div>
                        <div class="makeappointment" style="margin-bottom: 0px !important;width: 57%;">
                            <a class="generate" >
                                <button style="width: 459px; height: 51px;" type="submit" class="ast_btn pull-right">Generate Kundli</button>
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!--Price End-->
    <script src="https://kit.fontawesome.com/66f2518709.js" crossorigin="anonymous"></script>
    <script src="{{ asset('website/scripts/jquery/jquery.min.js?ver=3.7.1') }}"></script>

    <!-- SCRIPTS ENDS -->

    <!-- <script src="{{ asset('website/themes/astrologer/assets/js/astrologer-custom-script.js?ver=20151215') }}"
        id="astrologer-custom-script-js"></script> -->
        <script src="{{ asset('website/scripts/astrobuddy.js') }}"></script>
        <script src="https://kit.fontawesome.com/66f2518709.js" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#city').on('input', function() {
                var query = $(this).val();
                if (query.length > 2) {
                    $.ajax({
                        url: '/api/geo-search',
                        type: 'GET',
                        data: { city: query },
                        success: function(data) {
                            var suggestions = data.response;
                            var suggestionsList = $('#suggestions');
                            suggestionsList.empty();
                            if (suggestions && suggestions.length > 0) {
                                suggestions.forEach(function(suggestion) {
                                    var item = $('<div class="suggestion-item"></div>').text(suggestion.full_name);
                                    item.data('lat', suggestion.coordinates[0]);
                                    item.data('lon', suggestion.coordinates[1]);
                                    suggestionsList.append(item);
                                });
                                $('.suggestion-item').on('click', function() {
                                    $('#city').val($(this).text());
                                    $('#lat').val($(this).data('lat'));
                                    $('#lon').val($(this).data('lon'));
                                    $('#suggestions').empty();
                                });
                            }
                        },


                        error: function() {
                            $('#suggestions').empty();
                        }
                    });
                } else {
                    $('#suggestions').empty();
                }
            });
        });
    </script>
</body>
@endsection
