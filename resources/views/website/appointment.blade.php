@extends('website.website_master')
@section('title','Kundli')
@section('content')
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>AstroBuddy | Appointment</title>

        <link rel="stylesheet"
            href="{{ asset('website/styles/style.min.css')}}" />
        <link rel="stylesheet"
            href="{{ asset('website/plugins/astro-appointment/assets/css/freekundli.css')}}" />
        <link rel="stylesheet" type="text/css"
            href="{{ asset('website/plugins/astro-appointment/assets/css/bootstrap.css')}}" />
        <link rel="stylesheet" type="text/css"
            href="{{ asset('website/plugins/astro-appointment/assets/css/style.css')}}" />
        <link rel="stylesheet"
            href="{{ asset('website/themes/astrologer/assets/css/astrologer-custom-style.css?ver=1')}}" />

        <link rel="stylesheet"
            href="{{ asset('website/plugins/astro-appointment/assets/css/bestastro.css')}}" />
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
            href="{{ asset('website/plugins/astro-appointment/assets/css/responsive.css') }}">


    </head>
    <body>
        @include('website.website_header')
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
                        <h2>appointment</h2>
                    </div>

                    <ul class="homeapp">
                        <li><a>home</a></li>
                        // <li></li>
                        <li>
                            <a class="hh2appoint">appointment</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="appointmoibile">
            <div class="appointmobiles"></div>
            <div class="ast_banner_text">
                <div class="ast_waves3">
                    <div class="ast_wave"></div>
                    <div class="ast_wave"></div>
                    <div class="ast_wave"></div>
                </div>
                <div class="appointment">
                    <div class="appheading">
                        <h2>appointment</h2>
                    </div>

                    <ul class="homeapp">
                        <li><a href="index.html">home</a></li>
                        <li>//</li>
                        <li>
                            <a href="appointment.html"
                                class="hh2appoint">appointment</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="ast_packages_wrapper ast_bottompadder70">

            <div class="appointastrojd">
                <div class="appform">
                    <h3>@if ($appointmentType == "vcall")
                    Video Call
                    @elseif($appointmentType == "call")
                    Audio Call
                    @else
                    Chat
                    @endif appointment form</h3>
                    <form action="{{ url('book-appointment') }}"
                        method="POST">
                        @csrf
                        @method('POST')
                        @if ($appointmentType == "vcall")
                            <input type="hidden" name="appointment_type" value="video"
                                hidden>
                        @elseif($appointmentType == "call")
                                <input type="hidden" name="appointment_type" value="phone"
                                    hidden>
                        @else
                            <input type="hidden" name="appointment_type" value="{{ $appointmentType }}"
                                hidden>
                        @endif

                            <input type="hidden" name="astrologer_id" value="{{ $astro_id }}" hidden>
                        <div class="userform">
                            <div class="username">
                                <div class="fullname">
                                    <label>name</label>
                                    <input type="text" placeholder="Name"
                                        name="name" value="{{ Auth::user()->name }}" required />
                                        @error('name')
                                        <span class="text-danger">{{
                                            $message }}</span>
                                        @enderror
                                </div>
                                <div class="fullname">
                                    <label>Mobile</label>
                                    <input type="text" placeholder="Enter Mobile Number" value="{{ Auth::user()->mobile }}"
                                        name="mobile" required />
                                        @error('mobile')
                                        <span class="text-danger">{{
                                            $message }}</span>
                                        @enderror
                                </div>


                            </div>
                            <div class="username">
                                <div class="fullname">
                                    <label>Date of Birth</label>
                                    <input type="date" id="start" name="dob" value="2018-07-22" required />
                                    @error('dob')
                                    <span class="text-danger">{{
                                        $message }}</span>
                                    @enderror
                                </div>
                                <div class="googleemail">
                                    <label>Time of Birth</label>
                                    <input type="time" id="start" name="tob" required />
                                    @error('tob')
                                    <span class="text-danger">{{
                                        $message }}</span>
                                    @enderror
                                </div>

                            </div>
                            <div class="username">
                                <div class="fullname">
                                    <label>Place</label>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">

                                            <input type="text" name="place" class="city-input form-control"
                                                placeholder="Enter your birth place" autocomplete="off" required>
                                                @error('place')
                                                <span class="text-danger">{{
                                                    $message }}</span>
                                                @enderror
                                            <input type="hidden" class="lat-input form-control" name="lat">
                                            <input type="hidden" class="lon-input form-control" name="lon">
                                            <div class="suggestions"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="fullname">
                                    <label>Preferred Date & Time</label>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                            <input _ngcontent-serverapp-c113="" type="datetime-local" name="preferred_date"
                                                oncut="return false" ondrag="return false"
                                                ondrop="return false" required="" aria-required="true"
                                                class="mat-autocomplete-trigger form-control ng-pristine ng-invalid ng-touched"
                                                autocomplete="off"
                                                role="combobox" aria-autocomplete="list" aria-expanded="false"
                                                aria-haspopup="true" required>
                                            @error('preferred_date')
                                            <span class="text-danger">{{
                                                $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                            </div>
                                <div class="username" style="">

                                    <div class="googleemail">
                                        <label>gender</label>
                                        <select name="gender" required style="margin-bottom: 28px !important;">
                                            <option value="">Select Gender</option>
                                            <option value="male" {{ Auth::user()->gender == 'male' ? 'selected' :
                                                ''}}>Male</option>
                                            <option value="female" {{ Auth::user()->gender == 'female' ? 'selected'
                                                : ''}}>Female</option>
                                        </select>
                                        @error('gender')
                                        <span class="text-danger">{{
                                            $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="googleemail">
                                        
                                    </div>
                                    @if($appointmentType != 'chat')
                                    <div class="fullname">
                                        <label>Duration</label>
                                        <select name="duration" id="duration" class="form-control" required>
                                            <option value="15:00">15:00 Min</option>
                                            <option value="30:00">30:00 Min</option>
                                            <option value="45:00">45:00 Min</option>
                                            <option value="60:00">60:00 Min</option>
                                        </select>
                                        @error('duration')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    @endif
                                </div>


                            <div class="response">
                                @if (session()->has('success'))
                                <div class="alert alert-success d-flex align-items-center"
                                    id="response" role="alert">
                                    {{--  <img src="{{asset('website/uploads/sites/3/2021/09/vas_1.png')}}"
                                        alt="" width="15px;">  --}}
                                    <div>
                                        &nbsp; {{ session('success') }}
                                    </div>
                                </div>
                                @endif
                            </div>
                            <div class="makeappointment" style="width: auto;">
                                <a>
                                    <button style="width: 248px;" type="submit"
                                        class="ast_btn pull-right">
                                        Make an appointment
                                    </button>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="https://kit.fontawesome.com/66f2518709.js"
            crossorigin="anonymous"></script>

        <script
            src="{{ asset('website/scripts/jquery/jquery.min.js?ver=3.7.1')}}">
        </script>

        <!-- SCRIPTS ENDS -->

        <script
            src="{{ asset('website/themes/astrologer/assets/js/astrologer-custom-script.js?ver=20151215')}}"
            id="astrologer-custom-script-js"></script>



        <script src="{{ asset('website/scripts/astrobuddy.js') }}"></script>
        <script
            src="{{ asset('website/plugins/astro-appointment/assets/js/astro.js')}}">
        </script>
    </body>
@endsection
