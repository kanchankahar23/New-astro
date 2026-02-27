@extends('website.website_master')
@section('title',' Contact Us')
@section('content')

    <link rel="stylesheet" href="{{ asset('website/styles/style.min.css')}}" />
    <link  rel="stylesheet"  href="{{ asset('website/plugins/astro-appointment/assets/css/freekundli.css')}}" />
    <link rel="stylesheet" href="{{ asset('website/plugins/astro-appointment/assets/css/responsive.css')}}">
    <link
      rel="stylesheet"
      type="text/css"
      href="{{ asset('website/plugins/astro-appointment/assets/css/bootstrap.css')}}"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="{{ asset('website/plugins/astro-appointment/assets/css/style.css')}}"
    />
    <link
      rel="stylesheet"
      href="{{ asset('website/themes/astrologer/assets/css/astrologer-custom-style.css?ver=1')}}"
    />
    <link
      rel="stylesheet"
      href="{{ asset('website/plugins/astro-appointment/assets/css/freekundli.css')}}"
    />
    <link
      rel="stylesheet"
      href="{{ asset('website/plugins/astro-appointment/assets/css/bestastro.css')}}"
    />
    <link
      rel="stylesheet"
      href="{{ asset('website/themes/astrologer/assets/css/astrologer-custom-light-style.css?ver=1') }}"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Roboto:400%7CPhilosopher:400&display=swap"
      rel="stylesheet"
      property="stylesheet"
      media="all"
      type="text/css"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  </head>
  <body>


    <!--Slider Start-->

    <div class="contform">
      <div class="astrooverlay"></div>
      <div class="ast_banner_text">
        <div class="ast_waves3">
          <div class="ast_wave"></div>
          <div class="ast_wave"></div>
          <div class="ast_wave"></div>
        </div>
        <div class="appointment">
          <div class="appheading">
            <h2>Contact Us</h2>
          </div>

          <ul class="homeapp">
            <li><a href="">Home</a></li>
            <li>//</li>
            <li><a href="" class="hh2appoint">Contact Us</a></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="mobilecontact">
      <div class="mobilelay"></div>
      <div class="ast_banner_text">
        <div class="ast_waves3">
          <div class="ast_wave"></div>
          <div class="ast_wave"></div>
          <div class="ast_wave"></div>
        </div>
        <div class="appointment">
          <div class="appheading">
            <h2>Contact Us</h2>
          </div>

          <ul class="homeapp">
            <li><a href="">Home</a></li>
            <li>//</li>
            <li><a href="" class="hh2appoint">Contact Us</a></li>
          </ul>
        </div>
      </div>
    </div>

    <!--Slider End-->


<div class="contuserform">
<div class="innerform">
<div class="findmsg">
  <h1>Get In <span class="findcolor">Touch</span> </h1>
  <p>Have questions about your astrological chart or need personalized guidance? We are here to illuminate your path! Reach out to us at support@astro-buddy.com for insights and support. The stars are waiting to reveal their secrets to you!</p>
</div>
<div class="lowerform">
  <form action=" {{ url('enquiry/website-enquiry') }}" method="POST">
        @csrf
        @method('POST')
        <div class="row multiform">
            <div class="col-lg-6 col-md-6 col-sm-12 col-12 inputforms">
                <label>Full Name</label>
                <input type="text" name="name" class="require"
                    value="{{ old('name') }}">
                @error('name')
                <span class="text-danger">{{
                    $message }}</span>
                @enderror
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-12 inputforms">
                <label>Mobile</label>
                <input type="number" name="mobile" class="require"
                    value="{{ old('mobile') }}">
                @error('mobile')
                <span class="text-danger">{{
                    $message }}</span>
                @enderror
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-12 inputforms">
                <label>Email</label>
                <input type="text" name="email" class="require" data-valid="email"
                    data-error="Email should be valid." value="{{ old('email') }}">
                @error('email')
                <span class="text-danger">{{
                    $message }}</span>
                @enderror
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-12 inputforms">
                <label>Subject</label>
                <input type="text" name="subject" class="require"
                    value="{{ old('subject') }}">
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-12 inputforms">
                <label>Gender</label>
                <select name="gender">
                    <option disabled selected>Select Gender</option>
                    <option value="male" {{ old('gender')=='male' ? 'selected' : ''
                        }}>Male</option>
                    <option value="female" {{ old('gender')=='female' ? 'selected'
                        : '' }}>Female</option>
                </select>
                @error('gender')
                <span class="text-danger">{{
                    $message }}</span>
                @enderror
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-12 inputforms">
                <label>Type</label>
                <select name="type">
                    <option disabled selected>Select Type</option>
                    <option value="user" {{ old('type')=='user' ? 'selected' : ''
                        }}>User</option>
                    <option value="astrologer" {{ old('type')=='astrologer'
                        ? 'selected' : '' }}>Astrologer</option>
                </select>
                @error('type')
                <span class="text-danger">{{
                    $message }}</span>
                @enderror
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-12 inputforms">
                <label>message</label>
                <textarea rows="5" name="message" class="require"
                    style="height: 120px;"
                    name="messsage">{{ old('message') }}</textarea>
            </div>
            <div class="response">
                @if (session()->has('success'))
                <div class="alert alert-success d-flex align-items-center"
                    id="response" role="alert">
                    <img src="{{asset('website/uploads/sites/3/2021/09/vas_1.png')}}"
                        alt="" width="15px;">
                    <div>
                        &nbsp; {{ session('success') }}
                    </div>

                </div>
                @endif

                @if (session()->has('error'))
                <div class="alert alert-danger d-flex align-items-center"
                    id="response" role="alert">
                    <img src="{{asset('website/astro_link_icon.png')}}" alt=""
                        width="15px;">
                    <div>
                        &nbsp; {{ session('error') }}
                    </div>
                </div>
                @endif
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-12 inputforms">
                <div class="g-recaptcha"
                    data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}">
                </div>
                @if ($errors->has('g-recaptcha-response'))
                <span class="text-danger">{{ $errors->first('g-recaptcha-response')
                    }}</span>
                @endif
            </div>
            <div
                class="col-lg-12 col-md-12 col-sm-12 col-12 inputforms kundlilogin">
                <button class="ast_btn pull-right submitForm" type="submit"
                    form-type="contact">Send</button>
            </div>
        </div>
        </form>
</div>
  </div>
</div>
    <script
      src="https://kit.fontawesome.com/66f2518709.js"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://kit.fontawesome.com/66f2518709.js"
      crossorigin="anonymous"
    ></script>
    <script src="{{ asset('website/scripts/jquery/jquery.min.js?ver=3.7.1')}}"></script>

    <!-- SCRIPTS ENDS -->

    <!-- <script
    src="{{ asset('website/themes/astrologer/assets/js/astrologer-custom-script.js?ver=20151215')}}"
    id="astrologer-custom-script-js"
  ></script> -->

  <script src="{{ asset('website/scripts/astrobuddy.js') }}"></script>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endsection
