
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
    <link href="images/favicon.png" rel="icon">
    <title>Astro-Buddy | Login</title>
    <meta name="description" content="Login and Register Form Html Template">
    <meta name="author" content="harnishdesign.net">
    <link rel="icon" href="{{asset('website/astro_link_icon.png')}}" sizes="32x32" />
    <link rel="stylesheet" href="{{ asset('website/plugins/astro-appointment/assets/css/responsive.css') }}">
    <!-- Web Fonts
    ========================= -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900"
        type="text/css">

    <!-- Stylesheet
    ========================= -->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/font-awesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
    <link rel="stylesheet" href="{{ asset('astrobuddylogin2/style.css') }}">
    <!-- Colors Css -->
    <link id="color-switcher" type="text/css" rel="stylesheet" href="css/color-orange.css">
    <style>
        #main-wrapper{
        position: relative;
        }
        .toBackBox{
        position: absolute;
        top: 2%;
        left: 2%;
        z-index: 9999;
        }
        .toBackBox a button {
        font-family: "Montserrat", sans-serif;
        width: 34px;
        height: 29px;
        background: #e8f0fe;
        font-size: 1rem;
        font-weight: 600;
        border: none;
        z-index: 99999;
        border-radius: 3px;
        box-shadow: 1px 1px 2px -1px #a7a6c9;
        transition: all 400ms ease-in-out;
        }
        .toBackBox a button:hover {
        background: #181820;
        color: white;
        }
        .toBackBox a button:hover i {
        color: white !important;
        transition: all 400ms ease-in-out
        }
        .toBackBox a button i{
        color: #1f2028 !important;
        margin-left: 0 !important;
        }
        @media screen and (max-width:500px) {
        .toBackBox a button {
        box-shadow: none !important;
        }
        }
    </style>
</head>

<body>



    <div id="main-wrapper" class="oxyy-login-register">
        <div class="toBackBox">
            <a href="{{ url('/') }}">
                <button> <i class="fa-solid fa-share fa-flip-horizontal"
                        style="color: #ffffff;margin-left: 5px;" aria-hidden="true"></i>
                </button>
            </a>
        </div>
        <div class="px-0 container-fluid">
            <div class="row g-0 min-vh-100">
                <!-- Login Form
          ========================= -->
                <div class="order-2 shadow-lg col-md-6 col-lg-5 col-xl-4 d-flex flex-column bg-light order-md-1">
                    <div class="container py-5 my-auto">
                        <div class="row g-0">
                            <div class="mx-auto text-center col-10 col-md-9">
                                <div class="mb-4 logo"> <a  title="Oxyy" style='display: flex; align-items:center; justify-content:center;'><img height="50"
                                    src="{{ asset('website/uploads/sites/AstroNewLogo2.png') }}" alt="Oxyy" style='min-width: 37px;height: 31px;margin-right: 4px;'>
                                    <!-- <img id="" src="{{ asset('website/uploads/sites/AstroNewLogo2.png') }}" alt="logo" /> -->
                                    <h3 class='FontOfAstro'>ASTROBUDDY</h3></a> </div>
                                    <form method="POST" action="{{ route('login') }}" id="myForm">
                                        @csrf
                                        @method('POST')
                                    <div class="mb-3">
                                        <x-text-input id="email" class="form-control" type="text" name="login" :value="old('login')" required autofocus autocomplete="username" placeholder="Email / Phone" />
                                        <x-input-error :messages="$errors->get('login')" class="mt-2" style="color:red;"/>
                                    </div>
                                    <div class="mb-3">
                                        <x-text-input id="password" class="form-control"
                               type="password"
                               name="password"
                               required autocomplete="current-password" placeholder="Password"/>
                <x-input-error :messages="$errors->get('password')" class="mt-2" style="color:white;"/>
                                    </div>
                                    <a class="my-4 d-block text-2" href="{{ url('/otp') }}">Login With OTP</a>
                                    <div class="my-4 d-grid">
                                        <button class="btn btn-primary text-uppercase" type="submit">Sign In</button>
                                    </div>
                                </form>
                                <p class="text-2">New to Astro-Buddy? <a href="{{ url('/register') }}">Sign Up!</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="container py-2">
                        <p class="mb-0 text-center text-2 text-muted">Copyright © 2024 <a href="{{url('/')}}">Astro-Buddy</a>. All Rights
                            Reserved.</p>
                    </div>
                </div>
                <!-- Login Form End -->

                <!-- Welcome Text
          ========================= -->
                <div class="order-1 col-md-6 col-lg-7 col-xl-8 order-md-2">
                    <div class="hero-wrap h-100">
                        <div class="hero-bg hero-bg-scroll" style="background-image: url('{{ asset('astrobuddylogin2/loginbg.jpg') }}');
"></div>
                        <div class="hero-content w-100 h-100 d-flex flex-column">
                            <div class="py-5 my-auto row g-0">
                                <div class="mx-auto text-center col-10 col-lg-9">
                                   <div class="mx-auto text-center col-10 col-lg-9">
                                    <img src="https://astro-buddy.com/website/uploads/sites/3/2021/08/pandit.png     "
                                        style="    width: 35%;"><br>
                                    <p class="text-6 d-inline-block fw-500" style="color: white;">Welcome back!
                                    </p>
                                    <h1 class="mb-2 text-12 fw-600" style="color: white;font-size: 2rem !important;">Unlock Your Cosmic
                                        Path – Sign
                                        In to Discover Your Destiny!</h1>

                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Welcome Text End -->
                </div>
            </div>
        </div>
    </div>

    <!-- Styles Switcher -->
    <div id="styles-switcher" class="right">
        <h5>Color Switcher</h5>
        <hr>
        <ul class="mb-0">
            <li class="blue" data-bs-toggle="tooltip" data-path="#" aria-label="Blue" data-bs-original-title="Blue">
            </li>
            <li class="indigo" data-bs-toggle="tooltip" data-path="css/color-indigo.css" aria-label="Indigo"
                data-bs-original-title="Indigo"></li>
            <li class="purple" data-bs-toggle="tooltip" data-path="css/color-purple.css" aria-label="Purple"
                data-bs-original-title="Purple"></li>
            <li class="pink" data-bs-toggle="tooltip" data-path="css/color-pink.css" aria-label="Pink"
                data-bs-original-title="Pink"></li>
            <li class="red" data-bs-toggle="tooltip" data-path="css/color-red.css" aria-label="Red"
                data-bs-original-title="Red"></li>
            <li class="orange" data-bs-toggle="tooltip" data-path="css/color-orange.css" aria-label="Orange"
                data-bs-original-title="Orange"></li>
            <li class="yellow" data-bs-toggle="tooltip" data-path="css/color-yellow.css" aria-label="Yellow"
                data-bs-original-title="Yellow"></li>
            <li class="teal" data-bs-toggle="tooltip" data-path="css/color-teal.css" aria-label="Teal"
                data-bs-original-title="Teal"></li>
            <li class="green" data-bs-toggle="tooltip" data-path="css/color-green.css" aria-label="Green"
                data-bs-original-title="Green"></li>
            <li class="cyan" data-bs-toggle="tooltip" data-path="css/color-cyan.css" aria-label="Cyan"
                data-bs-original-title="Cyan"></li>
            <li class="brown" data-bs-toggle="tooltip" data-path="css/color-brown.css" aria-label="Brown"
                data-bs-original-title="Brown"></li>
        </ul>

    </div>
    <!-- Styles Switcher End -->

    <!-- Script -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Style Switcher -->
    <script src="js/switcher.min.js"></script>
    <script src="js/theme.js"></script>
    <script src="https://kit.fontawesome.com/d31220f8d2.js" crossorigin="anonymous"></script>
    <script>
        function submitForm() {
            // Get the form element
            var form = document.getElementById('myForm');
            // Submit the form
            form.submit();
        }
        function goToPreviousPage() {
                    history.back();
            }
    </script>
</body>

</html>




