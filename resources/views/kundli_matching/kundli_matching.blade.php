@extends('website.website_master')
@section('title', 'Kundli Matching')
@section('content')

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ url('website/styles/style.min.css') }}" />
        <link rel="stylesheet" href="{{ url('website/plugins/astro-appointment/assets/css/responsive.css') }}">
        <link rel="stylesheet" href="{{ url('website/plugins/astro-appointment/assets/css/freekundli.css') }}">

        <link rel="stylesheet" type="text/css"
            href="{{ url('website/plugins/astro-appointment/assets/css/bootstrap.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('website/plugins/astro-appointment/assets/css/style.css') }}">
        <link rel="stylesheet" href="{{ url('website/themes/astrologer/assets/css/astrologer-custom-style.css?ver=1') }}" />
        <link rel="stylesheet" href="{{ url('website/plugins/astro-appointment/assets/css/bestastro.css') }}">
        <link rel="stylesheet"
            href="{{ url('website/themes/astrologer/assets/css/astrologer-custom-light-style.css?ver=1') }}" />
        <link href="https://fonts.googleapis.com/css?family=Roboto:400%7CPhilosopher:400&display=swap" rel="stylesheet"
            property="stylesheet" media="all" type="text/css" />
        <link
            href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
            rel="stylesheet">
        <style type="text/css" data-type="vc_shortcodes-custom-css">
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

            .appointfirst h3 {
                width: 90%;
            }
        </style>

        <style>
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
        @include('website.website_header')
        <div class="appointmentastro kundlimatching">
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
                        <li><a href="" class="hh2appoint">Get instant & accurate, Kundli Matching</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!--Slider End-->
        <!--Price Start-->
        <div class="appointfirst matchingkundli">

            <h3>Free Kundli Matching Online - Get Your Detailed Birth Chart with Predictions.
                <hr style="width: 73%;">
            </h3>
            <p>Looking for your free Kundli from expert astrologers? Then you have come to the right place. The online free
                kundali available on Astrobuddy is a 100% free and authentic free Kundli that has been prepared after
                consulting more than 30 expert astrologers on board. The free kundli is such that it can give you a glimpse
                into various aspects of your life such as your career, love life, marriage, business and much more. The
                online kundli prepared by the free Kundali software here is no less than any traditional Kundli and can also
                be used for purposes like matching making, kundali matching for marriage or simply making future
                predictions.</p>
            <!-- <p>It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p> -->
        </div>
        <div class="appointastrojd" style="width: 83%;">
            <form class='matchingKundaliFile' action="{{ url('kundli-matching-details') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="appform">
                    <h3 style="text-align: left; width: 86%;">Kundli Matching</h3>
                    <h4 class="tagline" style="width: 85.7%; margin-top: -35px; margin-bottom: 15px;"><span></span></h4>
                    <div style="margin: 3rem;" class="row malefemale">
                        <div style="border-right: 1px solid rgba(0, 0, 0, 0.151);padding-right: 60px;" class="col-6">
                            <div class="userdate">

                                <h5 class="birth"> <img style="width: 30px;" src="{{ url('/images/male.jpg') }}"
                                        alt="">&nbsp;Male Details
                                    <hr class="details" style="width: 135px;">
                                </h5>
                                <br>
                                <div class="userdate">
                                    <h5 class="birthplace">Name</h5>
                                    <input _ngcontent-serverapp-c113="" type="search" name="groom_name" id="placs"
                                        onpaste="return false;" oncopy="return false" oncut="return false"
                                        ondrag="return false" ondrop="return false"
                                        class="mat-autocomplete-trigger form-control ng-pristine ng-invalid ng-touched"
                                        placeholder="Enter your name" autocomplete="off" role="combobox"
                                        aria-autocomplete="list" aria-expanded="false" aria-haspopup="true" required>
                                    @error('groom_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="dateofbirth">
                                     <div class="dateofname">
                                        <label>Date Of Birth</label>
                                       <input type="date"  name="male_dob" value="2018-07-22"
                                                     placeholder="" required>
                                    </div>
                                    <div class="dateofname">
                                        <label>Time Of Birth</label>
                                        <input type="time" name="male_tob" required>
                                    </div>
                                </div>

                            </div>
                            <div class="userdate">
                                <h5 class="birthplace">Birth Place</h5>
                               <input type="search" name="groom_birth_place" class="city-input form-control"
                                placeholder="Enter your birth place" autocomplete="off">
                            <input type="hidden" class="lat-input form-control" name="groom_lat">
                            <input type="hidden" class="lon-input form-control" name="groom_lon">
                            <div class="suggestions"></div>
                                @error('groom_birth_place')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6 femaleboX" style="padding-left: 60px">
                            <div class="userdate">
                                <h5 class="birth"><img style="width: 30px;" src="{{ url('/images/female.png') }}"
                                        alt="">&nbsp;Female Details
                                    <hr class="details" style="width: 152px;">
                                </h5>
                                <br>
                                <div class="userdate">
                                    <h5 class="birthplace">Name</h5>
                                    <input _ngcontent-serverapp-c113="" type="search" name="bride_name" id="placs"
                                        onpaste="return false;" oncopy="return false" oncut="return false"
                                        ondrag="return false" ondrop="return false"
                                        class="mat-autocomplete-trigger form-control ng-pristine ng-invalid ng-touched"
                                        placeholder="Enter your name" autocomplete="off" role="combobox"
                                        aria-autocomplete="list" aria-expanded="false" aria-haspopup="true" required>
                                    @error('bride_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                 <div class="dateofbirth">
                                     <div class="dateofname">
                                        <label>Date Of Birth</label>
                                       <input type="date" id="start" name="female_dob" value="2018-07-22"
                                             placeholder="" required>
                                    </div>
                                    <div class="dateofname">
                                        <label>Time Of Birth</label>
                                        <input type="time" id="start" name="female_tob" required>
                                    </div>
                                </div>

                                <div class="userdate">
                                    <h5 class="birthplace">Birth Place</h5>
                                    <input type="search" name="bride_birth_place" class="city-input form-control"
                                        placeholder="Enter your birth place" autocomplete="off">
                                    <input type="hidden" class="lat-input form-control" name="bride_lat">
                                    <input type="hidden" class="lon-input form-control" name="bride_lon">
                                    <div class="suggestions"></div>
                                    @error('bride_birth_place')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="makeappointment" style="margin-top: -36px;display: flex; justify-content: center; ">
                        <div class="userdate hindiEnglish" style="padding: 0px 106px 0px 9px;width: 50%;">
                            <select style="font-size: 0.9rem;font-weight: 600;" name="lang" required>
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
                        <a class="generate">
                            <button style="width: 421px;" type="submit" class="ast_btn pull-right">Match Kundli</button>
                        </a>
                    </div>
                </div>
            </form>
        </div>
        </div>
        <script src="https://kit.fontawesome.com/66f2518709.js" crossorigin="anonymous"></script>

        <script src="/scripts/jquery/jquery.min.js?ver=3.7.1"></script>
        <!-- SCRIPTS ENDS -->
        <script src="/themes/astrologer/assets/js/astrologer-custom-script.js?ver=20151215" id="astrologer-custom-script-js">
        </script>
        <script src="./scripts/astrobuddy.js"></script>
    </body>
@endsection
