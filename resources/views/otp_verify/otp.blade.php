
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
    <link href="images/favicon.png" rel="icon">
    <title>AstroBuddy | Verify</title>
    <link rel="icon" href="{{asset('website/astro_link_icon.png')}}" sizes="32x32" />
    <meta name="description" content="Login and Register Form Html Template">
    <meta name="author" content="harnishdesign.net">

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
        .otp{
            text-align: center;
            border: 2px solid darkgrey;
            font-size: larger;
            width: 45px;
        }
    </style>
    <style>
        .FontOfAstro {
        font-size: 22px;
        font-weight: 600;
        color: #0a0a5f;
        margin: 10px 0px;
        margin-left: 9px !important;
        font-family: "Montserrat", sans-serif;
        }
    </style>
</head>

<body>



    <div id="main-wrapper" class="oxyy-login-register">
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
                                <form id="loginForm" class="form-border" method="post" action="javascript:void(0)">
                                    <div class="otpheading">
                                        <p>Enter Your OTP</p>
                                    </div>
                                    <div class="enterotp">
                                        <input type="" maxlength="1" class="otp">
                                        <input type="" maxlength="1" class="otp">
                                        <input type="" maxlength="1" class="otp">
                                        <input type="" maxlength="1" class="otp">
                                        <input type="" maxlength="1" class="otp">
                                        <input type="" maxlength="1" class="otp">
                                    </div>
                                    <div class="my-4 d-grid">
                                        <button class="btn btn-primary text-uppercase" type="buton" onclick="verifyOtp()">Verify OTP</button>
                                    </div>
                                </form>
                                <p class="text-2">New to Astro-Buddy? <a href="{{ url('/mobile-verify') }}">Sign Up!</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="container py-2">
                        <p class="mb-0 text-center text-2 text-muted">Copyright © 2024 <a href="{{ url('/') }}">Astro-Buddy</a>. All Rights
                            Reserved.</p>
                    </div>
                </div>
                <!-- Login Form End -->

                <!-- Welcome Text
          ========================= -->
                <div class="order-1 col-md-6 col-lg-7 col-xl-8 order-md-2">
                    <div class="hero-wrap h-100">
                        <div class="hero-bg hero-bg-scroll" style="background-image: url('{{ asset('astrobuddylogin2/loginbg.jpg') }}');
">
                        <div class="hero-content w-100 h-100 d-flex flex-column">
                            <div class="py-5 my-auto row g-0">
                                <div class="mx-auto text-center col-10 col-lg-9">
                                    <!--
                    <p class="text-6 d-inline-block fw-500">Welcome back!</p>
                    <h1 class="mb-2 text-12 fw-600">Join the largest Designer community in the world.</h1>
                    -->
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
        function verifyOtp() {
            try {
                var path = window.location.pathname;
                var hashId = path.substring(path.lastIndexOf('/') + 1);

                var otpInputs = document.querySelectorAll('input.otp');
                var otpString = '';
                otpInputs.forEach(function(input) {
                    otpString += input.value;
                });

                const apiUrl = "{{ url('api/verify-otp') }}"; // Replace this with your actual API URL

                // Data to be sent in the request body
                const postData = {
                     otp:otpString,
                     user:hashId,
                    _token: "{{ csrf_token() }}",
                };

                // Options for the fetch request
                const options = {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json' // Specify that the data is JSON
                    },
                    body: JSON.stringify(postData) // Convert JavaScript object to JSON string
                };

                // Make the fetch request
                fetch(apiUrl, options)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data.token) {
                            const verifyUrl = `{{ url('api/verify-token') }}?token=${encodeURIComponent(data.token)}`;
                            fetch(verifyUrl, {
                                method: 'GET',
                                headers: {
                                    'Content-Type': 'application/json'
                                }
                            })
                            .then(response => response.json())
                            .then(result => {
                                console.log('Success:', result);
                               if(result.message == 'Success'){
                                window.location.href =  `{{ url('/login') }}`
                               }
                            })
                            .catch(error => {
                                console.log('Error:', error);
                                // Handle the error here
                            });
                        }
                    })
                    .catch(error => {
                       console.log(error)
                    });
            } catch (error) {
                console.error('Error:', error);
            }
        }

       document.addEventListener('DOMContentLoaded', function() {
        const otpInputs = document.querySelectorAll('.otp');

        otpInputs.forEach(function(input, index) {
            input.addEventListener('input', function() {
                if (this.value.length === 1) {
                    if (index < otpInputs.length - 1) {
                        otpInputs[index + 1].focus();
                    }
                }
            });
        });
    });

    function goToPreviousPage() {
        history.back();
    }
    </script>
</body>

</html>

</html>
