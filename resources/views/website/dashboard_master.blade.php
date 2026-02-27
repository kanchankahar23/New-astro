<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="keywords" content="HTML5 Template">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Jobber - Job Board HTML5 Template">
    <meta name="author" content="potenzaglobalsolutions.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>AstroBuddy | @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('register_assets/logregister.css') }}" />

    <link rel="icon" href="{{ asset('website/astro_link_icon.ico') }}" sizes="32x32" />
    <!-- Favicon -->
    <link href="images/favicon.ico" rel="shortcut icon">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('website_dashboard_assets') }}/css/font-awesome/all.min.css">
    <link rel="stylesheet" href="{{ url('website_dashboard_assets') }}/css/flaticon/flaticon.css">
    <link rel="stylesheet" href="{{ url('website_dashboard_assets') }}/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('website_dashboard_assets') }}/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <!-- <link rel="stylesheet" href="{{ url('website_dashboard_assets') }}/css/themify-icons.css"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ url('website_dashboard_assets') }}/style.css">
    <link rel="stylesheet" href="{{ asset('website/plugins/astro-appointment/assets/css/responsive.css') }}">
<audio id="incomingRingtone" src="{{ url('assets/ringtones/incoming_call.mp3') }}"
    preload="auto" loop></audio>
    <style>
        .toast {
        max-width: 293px !important;
        }
        .active_tab {
            background-color: #ffcd3a;
            height: 38px;
            border-radius: 3px;
            padding-right: 0px !important;

        }

        .status {
            background-color: red;
            color: white !important;
            padding: 2px 7px;
            font-size: smaller;
            border: none;
            border-radius: 5px;
            margin-top: 10px;
        }

        .action {
            background-color: rgb(114, 118, 115);
            color: white !important;
            padding: 2px 7px;
            font-size: smaller;
            border: none;
            border-radius: 5px;
            margin-top: 10px;
        }

        .accept {
            background-color: #28513c;
            color: white !important;
            padding: 2px 7px;
            font-size: smaller;
            border: none;
            border-radius: 5px;
            margin-top: 10px;
        }

        .generate {
            background-color: #006fff;
            color: white !important;
            padding: 2px 7px;
            font-size: smaller;
            border: none;
            border-radius: 5px;
            margin-top: 10px;
        }

        .hamburger {
            display: none;
            background: none;
            border: none;
            font-size: 30px;
            cursor: pointer;
            padding: 5px;
        }

        #menu-list {
            display: flex;
            justify-content: space-around;
        }

        /* Mobile view */
        @media (max-width: 768px) {
            .hamburger {
                display: block;
                background-color: transparent;
                border: none;
                font-size: 30px;
                cursor: pointer;
            }

            #menu-list {
                display: none;
                flex-direction: column;
                text-align: center;
                width: 100%;
            }

            .one {
                padding: 10px 0;
                width: 100%;
            }

            .menu-active {
                display: flex !important;
            }
        }

        .userProProfile {
            position: relative;
        }

        .PencilProfile {
            position: absolute;
            right: -12%;
            top: 50%;
            background: #ffffff;
            width: 27px;
            /* border: 1px solid #c7c7c7; */
            height: 27px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            /* border: revert-layer; */
            box-shadow: 0 0 2px #b2b2b3a8;
        }

        .PencilProfile i {
            font-size: 0.75rem;
            color: #25253b;
        }

        .chrisBoard {
            margin-top: 28px;
        }


        /* header css start  */
        #ResponsiveShortheader {
            position: fixed;
            top: 0%;
            width: 100%;
            background: white;
            height: 52px;
            box-shadow: 0 0 2px #cecdd7;
            display: flex;
            align-items: center;
            justify-content: start;
            z-index: 9999;
            right:0;

        }


        .hamburger22 {
            display: inline-block;
            left: 0rem;
            position: relative;
            top: 0rem;
            -webkit-transition: all 0.3s ease-in-out 0s;
            transition: all 0.3s ease-in-out 0s;
            width: 1.625rem;
            z-index: 999;
            margin-left: 62%;
            cursor: pointer;
        }

        .hamburger22 .line:nth-child(1) {
            width: 1.625rem;
        }

        .hamburger22 .line {
            background: #202021e6;
            display: block;
            height: 2.4px;
            border-radius: 0.1875rem;
            margin-top: 0.25rem;
            margin-bottom: 0.2rem;
            margin-right: auto;
            -webkit-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
        }

        .nav-header .hamburger22.is-active {
            left: 0;
        }

        .hamburger22.is-active .line {
            /* background: #5a5c3e; */
            background: #3e3d55;
        }

        .hamburger22.is-active .line:nth-child(1) {
            transform: translateY(3px) translateX(12px) rotate(45deg);
        }

        .hamburger22.is-active .line:nth-child(1) {
            width: 0.7rem;
            height: 0.12rem;
        }

        .hamburger22.is-active .line:nth-child(3) {
            width: 0.7rem;
            height: 0.12rem;
            transform: translateY(-2px) translateX(12px) rotate(-45deg);
        }

        .hamburger22.is-active .line:nth-child(2) {
            transform: translateX(0px);
            width: 1.3rem;
            height: 0.115rem;
        }


        .hamburger22.is-flipped .line:nth-child(1) {
            transform: translateY(3px) translateX(-2px) rotate(143deg);
            width: 0.7rem;
            height: 0.12rem;
        }

        .hamburger22.is-flipped .line:nth-child(3) {
            width: 0.7rem;
            height: 0.12rem;
            transform: translateY(-3px) translateX(-2px) rotate(38deg);
        }

        .hamburger22.is-flipped .line:nth-child(2) {
            transform: translateX(0px);
            width: 1.3rem;
            height: 0.12rem;
            margin-top: 4.165px;
        }


        .hamburger22.line:nth-child(2) {
            width: 1.625rem;
        }

        .hamburger22 .line:nth-child(3) {
            width: 0.9375rem;
        }

        .DashList {
            transform: translateX(-100%);
            transition: transform 0.5s ease;
            position: fixed;
            left: 0;
            top: 43px;
            width: 54%;
            height: 100vh;
            background-color: #fff;
            z-index: 1000;
            box-shadow: 0px 1px 2px #a1a1a8;
            overflow-y: auto;
            padding-left: 0 !important;
            z-index: 99999;
        }

        .DashList.is-visible {
            transform: translateX(0);
        }


        .listChangeColor {
            background: #f3c74c;
        }

        .hamburger22 {
            position: relative;
            z-index: 1001;
        }

        .is-active {
            transform: translateX(154px);
            transition: all 800ms ease-in-out;
        }

        .is-flipped {
            transform: translateX(154px);
            transition: all 800ms ease-in-out;
        }

        .BoardOfElement {
            transform: translateX(100%);
            transition: transform 0.5s ease;
            position: fixed;
            right: 0;
            top: 43px;
            width: 100%;
            height: 100vh;
            background-color: #30303173;
            z-index: 1000;
            box-shadow: 0px 1px 2px #a1a1a8;
            overflow-y: auto;
            padding-left: 0 !important;
        }

        .BoardOfElement.is-visible {
            transform: translateX(0);
        }

        .logoMergePost {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .imgBuild {
            width: 170px;
            overflow: hidden;
            margin-right: 7%;
        }



        .imgBuild img {
            width: 100%;
        }



        #ResponsiveShortheader {
            transition: top 0.3s ease-in-out;
        }

        body.no-scroll {
            overflow: hidden;
        }
    </style>
    <script>
        function playRingtone() {
            const audio = document.getElementById('incomingRingtone');
            audio.currentTime = 0;
            audio.play().catch(err => console.log("Autoplay blocked:", err));
            if ("vibrate" in navigator) {
            navigator.vibrate([500, 300, 500, 300, 500]); 
            }
        }
    
        function stopRingtone() {
            const audio = document.getElementById('incomingRingtone');
            audio.pause();
            audio.currentTime = 0;
            if ("vibrate" in navigator) {
            navigator.vibrate(0); // Stop vibration
            }
        }
    </script>
    {{--  <style>
        @media (min-width: 241px) and (max-width: 480px) {
            #toast-container>div {
                padding: 8px 8px 8px 50px;
                width: 21em !important;
            }
        }

        .toast-info {
            background: #034100 !important;
            opacity: initial !important;
        }
    </style>  --}}
    @php
        $totalColumns = 8; 
        $filledColumns = 0;
        $user = App\Models\User::find(Auth::user()->id);
        if ($user) {
            $columnsToCheck = ['name', 'avtar', 'email', 'mobile', 'password', 'type', 'gender', 'active_status']; // replace with actual column names
            foreach ($columnsToCheck as $column) {
                if (!is_null($user->$column)) {
                    $filledColumns++;
                }
            }
        }
        $percentageFilled = ($filledColumns / $totalColumns) * 100;
        $profileProgress = number_format($percentageFilled);
    @endphp
</head>
<body>
    @include('notification.notification')
    <div class="header-inner chrisBoard">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="candidates-user-info">
                        <div class="jobber-user-info">
                            <div class="userProProfile">
                                <div class="profile-avatar">
                                    <img class="img-fluid"
                                        src="{{ Auth::user()->avtar 
                                                ? asset(Auth::user()->avtar) 
                                                : 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png' }}"
                                        alt="">
                                </div>
                                <a href="{{ url('/change-profile-picture') }}" class='PencilProfile'>
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                            </div>
                            <div class="profile-avatar-info ms-4">
                                <h3 style="">{{ ucwords(Auth::user()->name ?? '') }}</h3>
                                <span
                                    class="user-email d-block ">{{ ucwords(Auth::user()->email ?? Auth::user()->mobile) }}</span>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width:<?= $profileProgress ?>%"
                            aria-valuenow="<?= $profileProgress ?>" aria-valuemin="0" aria-valuemax="100">
                            <span class="progress-bar-number">{{ $profileProgress }}%</span>
                        </div>
                    </div>
                    <div class="candidates-skills">
                        <div class="candidates-skills-info">
                            <h3 class="">{{ $profileProgress }}%</h3>
                            <span class="d-block">Complete Your Profile</span>
                        </div>
                        <div class="mt-3 candidates-required-skills ms-auto mt-sm-0">
                            <div class="wallet">
                                <div class="rupee">
                                    <i class="fa-solid fa-indian-rupee-sign"></i>
                                </div>
                                @if (Auth::check() && Auth::user()->type == 'user')
                                    @php
                                        $walletInfo = Auth::user()
                                            ->getWalletInfo()
                                            ->where('status', 'completed')
                                            ->sum('credits');
                                    @endphp
                                    <div class="detail" id="open-popup-btn" style="cursor: pointer;">
                                        <h3 id="balance">{{ getWalletAmount($walletInfo, 0) }}</h3>
                                        <p>{{ Auth::user()->type == 'user' ? 'Total Balance' : 'Total Earning' }}</p>
                                    </div>
                                @else
                                <a href="{{ url('astro-earning-history') }}">
                                        <div class="detail" style="cursor: pointer;">
                                            <h3>{{ getAstrologerWalletBalance(Auth::user()->id) }}</h3>
                                            <p>{{ Auth::user()->type == 'user' ? 'Total Balance' : 'Total Earning' }}
                                            </p>
                                </div>
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js">
    </script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>

   {{--  <script>
    window.authUserId = {{ Auth::user()->id }};
</script>  --}}
   {{--  <script>
    document.addEventListener("DOMContentLoaded", function() {
        if (typeof toastr === "undefined") {
            console.error("Toastr.js is not loaded!");
        } else {
            console.log("Toastr.js loaded successfully!");
        }
    });
    Pusher.logToConsole = true;
    var astrologerId = {{ Auth::user()->id }};
    console.log('Connecting to Pusher for astrologer:', astrologerId);
    var pusher = new Pusher('9f973de85dd01e4ec2c4', {
        cluster: 'ap2'
    });

    var channel = pusher.subscribe('astrologer-notification.' + astrologerId);
    channel.bind('appointment.notification', function(data) {
        console.log('New appointment received:', data);

        if (typeof toastr !== "undefined") {
                    toastr.info(
            `<div class="notification-content">
                 <span> ${data.appointment.name}</span>
                 <span> ${data.appointment.preferred_time}</span>
            </div>`,
            'You have a new appointment!',
            {
                closeButton: true,   // Enables manual closing
                progressBar: true,   // Show progress bar
                timeOut: 0,          // Notification stays until closed manually
                positionClass: 'toast-top-right',
                enableHtml: true
            }
        );
        } else {
            console.error("Toastr is not defined!");
        }
    });

    pusher.connection.bind('connected', function() {
        console.log('Pusher connected for astrologer:', astrologerId);
    });
</script>  --}}
<div id="chat-toast-container" class="position-fixed top-0 end-0 p-3"
    style="z-index: 999999;"></div>
    <script>
        const userType = @json(Auth::user()->type);
        document.addEventListener("DOMContentLoaded", function () {
            if (typeof toastr === "undefined") {
                console.error("Toastr.js is not loaded!");
            } else {
                console.log("Toastr.js loaded successfully!");
            }

            Pusher.logToConsole = true;
            var userId = {{ Auth::user()->id }};
            console.log('Connecting to Pusher for user:', userId);

            var pusher = new Pusher('9f973de85dd01e4ec2c4', {
                cluster: 'ap2'
            });

            var channel = pusher.subscribe('astrologer-notification.' + userId);

            channel.bind('appointment.notification', function (data) {
            console.log('New appointment received:', data);
            const toastId = 'chat-toast-' + Date.now();
            const toastHTML = `
            <div id="${toastId}" class="toast show fade toast-warning mb-2" role="alert"
                aria-live="assertive" aria-atomic="true" data-mdb-autohide="false"
                style="background-color: #ffffff;border: none;box-shadow: 3px 3px 6px #d5d5d5;border-radius: 10px;">
                <div class="toast-header toast-warning"
                    style="background-color: #ffffff !important;padding: 9px 4% !important;">
                    <i class="fas fa-comments fa-lg me-2 text-warning"
                        style="color: #e5a125eb;font-size: 0.95rem;"></i>
                    <strong class="me-auto"
                        style="font-weight: 500;font-size: 0.84rem;color: #3b3c43;">${data.appointment?.name}</strong>
                    <small style="font-weight: 500;color: #138a41;">Just now</small>
                    <button type="button" class="btn-close" data-mdb-dismiss="toast"
                        aria-label="Close"
                        style='font-size: 0.65rem;opacity: 0.7 !important;'></button>
                </div>
                <div class="toast-body"
                    style="font-size: 0.85rem;font-weight: 400;color: #2f3033;">
                    <a
                        href="${data.appointment?.way_to_reach ? '/astrologer-appointments' : '/chats'}" style="font-size: 0.85rem;font-weight: 400;color: #2f3033;">You
                        have a new appointment for ${data.appointment?.way_to_reach ?? 'Chat'} </a>.
                </div>
            </div>
            `;

            const container = document.getElementById('chat-toast-container');
            container.insertAdjacentHTML('beforeend', toastHTML);

            const toastEl = document.getElementById(toastId);
            toastEl.querySelector('.btn-close').addEventListener('click', () => {
            toastEl.remove();
            }); });


           channel.bind('chat.request', function (data) {
            console.log('New chat request received:', data);

            const acceptUrl = userType === 'user'
            ? `/real-time-chat/${data.chatMeeting.astro_encrypt}`
            : `/real-time-chat/${data.chatMeeting.user_encrypt}`;

            const declineUrl = `/chat/decline/${data.chatMeeting.id}`;
            const toastId = 'chat-toast-' + Date.now();

            const toastHTML = `
            <div id="${toastId}" class="toast show fade toast-warning mb-2" role="alert"
                aria-live="assertive" aria-atomic="true" data-mdb-autohide="false" style="background-color: #ffffff;border: none;box-shadow: 3px 3px 6px #d5d5d5;border-radius: 10px;">
                <div class="toast-header toast-warning" style="background-color: #ffffff !important;padding: 9px 4% !important;">
                    <i class="fas fa-comments fa-lg me-2 text-warning" style="color: #e5a125eb;font-size: 0.95rem;"></i>
                    <strong class="me-auto" style="font-weight: 500;font-size: 0.84rem;color: #3b3c43;">${data.sender.name}</strong>
                    <small style="font-weight: 500;color: #138a41;">Just now</small>
                    <button type="button" class="btn-close" data-mdb-dismiss="toast"
                        aria-label="Close" style='font-size: 0.65rem;opacity: 0.7 !important;'></button>
                </div>
                <div class="toast-body" style="font-size: 0.85rem;font-weight: 400;color: #2f3033;">
                    wants to start a chat.
                    <div class="mt-2" style='display: flex;align-items: center;justify-content: space-between;margin-top: 5% !important;'>
                        <a href="${acceptUrl}"
                            class="btn btn-sm btn-success me-2" style='background-color: #219721;font-size: 0.84rem !important; padding: 5px 21px;'>Accept</a>
                        <a href="${declineUrl}" class="btn btn-sm btn-danger" style='background-color: #c40c0c; font-size: 0.84rem !important; padding: 5px 21px;'>Decline</a>
                    </div>
                </div>
            </div>
            `;

            const container = document.getElementById('chat-toast-container');
            container.insertAdjacentHTML('beforeend', toastHTML);

            // Optional: Remove toast when closed
            const toastEl = document.getElementById(toastId);
            toastEl.querySelector('.btn-close').addEventListener('click', () => {
            toastEl.remove();
            });
            });

            var declineChannel = pusher.subscribe('chat.decline.' + userId);
            declineChannel.bind('chat.declined', function (data) {
                console.log('Chat was declined by:', data.decliner.name);
                toastr.error(
                    `<div class="notification-content">
                        <strong>${data.decliner.name}</strong> has declined your chat request.
                    </div>`,
                    'Chat Declined',
                    {
                        closeButton: true,
                        progressBar: true,
                        timeOut: 0,
                        positionClass: 'toast-top-right',
                        enableHtml: true
                    }
                );
                setTimeout(function () {
                    window.location.href = '/dashboard';
                }, 5000);
            });


            var videoCallChannel = pusher.subscribe('video-call-request.' + userId);
            videoCallChannel.bind('App\\Events\\VideoCallRequested', function (data) {
                const acceptUrl = `/join-meeting/${data.meeting.meeting.url}`;
                const declineUrl = `/video-call/decline/${data.meeting.meeting.id}`;
                const toastId = 'video-toast-' + Date.now();
                playRingtone();
                const toastHTML = `
                <div id="${toastId}" class="toast show fade toast-warning mb-2" role="alert"
                    aria-live="assertive" aria-atomic="true" data-mdb-autohide="false"
                    style="background-color: #ffffff;border: none;box-shadow: 3px 3px 6px #d5d5d5;border-radius: 10px;">
                    <div class="toast-header toast-warning"
                        style="background-color: #ffffff !important;padding: 9px 4% !important;">
                        <i class="fas fa-comments fa-lg me-2 text-warning"
                            style="color: #e5a125eb;font-size: 0.95rem;"></i>
                        <strong class="me-auto"
                            style="font-weight: 500;font-size: 0.84rem;color: #3b3c43;">${data.sender.name}</strong>
                        <small style="font-weight: 500;color: #138a41;">Just now</small>
                        <button type="button" class="btn-close" data-mdb-dismiss="toast"
                            aria-label="Close"
                            style='font-size: 0.65rem;opacity: 0.7 !important;'></button>
                    </div>
                    <div class="toast-body"
                        style="font-size: 0.85rem;font-weight: 400;color: #2f3033;">
                        Incoming ${data.meeting.meeting.way_to_reach} call !
                        <div class="mt-2"
                            style='display: flex;align-items: center;justify-content: space-between;margin-top: 5% !important;'>
                            <a href="#" onclick="acceptVideoCall('${data.meeting.meeting.url}')" class="btn btn-sm btn-success me-2"
                                style='background-color: #219721;font-size: 0.84rem !important; padding: 5px 21px;'>Accept</a>
                            <a href="#" onclick="declineVideoCall('${declineUrl}')" class="btn btn-sm btn-danger"
                                style='background-color: #c40c0c; font-size: 0.84rem !important; padding: 5px 21px;'>Decline</a>
                        </div>
                    </div>
                </div>
                `;

                const container = document.getElementById('chat-toast-container');
                container.insertAdjacentHTML('beforeend', toastHTML);
                const toastEl = document.getElementById(toastId);
                
                toastEl.querySelector('.btn-close').addEventListener('click', () => {
                    stopRingtone();
                toastEl.remove();
                });
            });

            var videoAcceptChannel = pusher.subscribe('video-call-accept.' + userId);
            videoAcceptChannel.bind('App\\Events\\VideoCallAccepted', function (data) {
            toastr.success("Call accepted! Redirecting to meeting...");
            setTimeout(() => {
            window.location.href = `/join-meeting/${data.meeting_url}`;
            }, 2000);
            });

           window.acceptVideoCall = function(meetingId) {
            stopRingtone();
            fetch(`/video-call/accept/${meetingId}`, {
            method: 'POST',
            headers: {
            'X-CSRF-TOKEN':
            document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
            })
            .then(() => {
            window.location.href = `/join-meeting/${meetingId}`;
            });
            }

            var videoDeclineChannel = pusher.subscribe('video-call-decline.' + userId);
            videoDeclineChannel.bind('App\\Events\\VideoCallDeclined', function (data) {
            toastr.error(`${data.decliner_name} declined your video call.`);
            });

           window.declineVideoCall = function (url) {
            stopRingtone();
        fetch(url, {
        method: 'POST',
        headers: {
        'X-CSRF-TOKEN':
        document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        'Accept': 'application/json'
        }
        })
        .then(res => {
        if (!res.ok) {
        throw new Error("Non-200 response");
        }
        return res.json();
        })
        .then(() => {
        toastr.warning("You declined the video call.");
        })
        .catch(err => {
        console.error("Error while declining call:", err);
        toastr.error("Something went wrong while declining the call.");
        });
        };

          var videoDeclineChannel = pusher.subscribe('video-call-decline.' + userId);
            videoDeclineChannel.bind('App\\Events\\VideoCallDeclined', function (data) {
            toastr.error(`<strong>${data.decliner_name}</strong> has declined the video
            call.`);
            setTimeout(() => {
            window.location.href = data.redirect_url;
            }, 3000);
            });

            pusher.connection.bind('connected', function () {
                console.log('Pusher connected for user:', userId);
            });

            document.querySelectorAll('.start-chat-btn').forEach(function (btn) {
                btn.addEventListener('click', function () {
                    const astroEncrypt = btn.getAttribute('data-astro');
                    const chatId = btn.getAttribute('data-chat-id');

                    toastr.info("Waiting to accept your request...", "Please Wait", {
                        closeButton: true,
                        progressBar: true,
                        timeOut: 0,
                        positionClass: 'toast-top-right'
                    });
                    var acceptChannel = pusher.subscribe('chat.accept.' + userId);
                    acceptChannel.bind('chat.accepted', function (data) {
                        console.log('Chat accepted:', data);
                        if (data.chatMeeting.id == chatId) {
                            toastr.clear();
                            toastr.success("Request has accepted. Redirecting...");
                            setTimeout(function () {
                                window.location.href = `/real-time-chat/${astroEncrypt}`;
                            }, 2000);
                        }
                    });
                });
            });
        });
    </script>

    @if(Auth::user()->type == 'user')
    @include('popup.popup',['walletInfo' => getWalletAmount($walletInfo,0),'packages' => getPackages()])
    @endif
    <section id='mainFullheader'>
        <div class="mb-2 container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="sticky-top secondary-menu-sticky-top" style="z-index:0">
                        <div class="secondary-menu">
                            <button class="hamburger" id="hamburger-btn">&#9776;</button>
                            @php
                                $currentUser = Auth::user()->type;
                            @endphp
                            <ul class="list-unstyled" id="menu-list" style="height: auto;">
                                <li class="one"><a
                                        href="{{ $currentUser == 'user' ? url('/') : url('/') }}">Home</a>
                                </li>
                                <li class="one"><a
                                        href="{{ $currentUser == 'user' ? url('/user-dashboard') : url('/astrologer-dashboard') }}">Dashboard</a>
                                </li>
                                <li class="one"><a href="{{ url($currentUser) }}">My Profile</a></li>
                                <li class="one"><a
                                        href="{{ $currentUser == 'user' ? url('/upcoming-appointments') : url('/astrologer-appointments') }}">Appointment</a>
                                </li>
                                @php
                                    $existPremiumUser = \App\Models\ParasarKundliDetail::where('user_id', Auth::user()->id)->where('payment_status', 'completed')->first();
                                @endphp
                                @if ($currentUser == 'user')
                                    <li class="one"><a href="{{ url('/chat-with') }}">Our Astrologers</a></li>
                                    <li class="one"><a href="{{ url('/pricing') }}">Pricing Plan</a></li>
                                    <li class="one"><a href="{{ url('/wallet') }}">Wallet</a></li>
                                    <li class="one"><a href="{{ url('/chat-list') }}">Chat-list</a></li>
                                    {{--  <li class="one"><a href="{{ url('real-time-chat') }}">Real Time Chat</a></li>  --}}
                                    @if($existPremiumUser)
                                        <li class="one"><a href="{{ url('/premium-kundli') }}">Premium Kundli</a></li>
                                    @endif
                                @endif
                                @if ($currentUser == 'astrologer')
                                    <li class="one"><a href="{{ url('/chats') }}">Chat-Box</a></li>
                                    {{--  <li class="one"><a href="{{ url('user-chat-list') }}">Real Time Chat</a></li>  --}}
                                @endif
                                <li class="one"><a href="{{ url('/logout') }}">Log Out</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id='ResponsiveShortheader'>
        <div class="logoMergePost">
            <div class="">
                <div class="">
                    <div class="" style="">
                        <div class="">
                            <div class="hamburger22">
                                <span class="line"></span><span class="line"></span><span class="line"></span>
                            </div>
                            @php
                                $currentUser = Auth::user()->type;
                            @endphp
                            <ul class="DashList" id="">

                                <li class="changeTimeColor"
                                    data-page="{{ $currentUser == 'user' ? url('/') : url('/') }}">
                                    <a
                                        href="{{ $currentUser == 'user' ? url('/') : url('/') }}">Home</a>
                                </li>
                                <li class="changeTimeColor"
                                    data-page="{{ $currentUser == 'user' ? url('/user-dashboard') : url('/astrologer-dashboard') }}">
                                    <a
                                        href="{{ $currentUser == 'user' ? url('/user-dashboard') : url('/astrologer-dashboard') }}">Dashboard</a>
                                </li>
                                <li class="changeTimeColor" data-page="{{ url($currentUser) }}">
                                    <a href="{{ url($currentUser) }}">My Profile</a>
                                </li>
                                <li class="changeTimeColor"
                                    data-page="{{ $currentUser == 'user' ? url('/upcoming-appointments') : url('/astrologer-appointments') }}">
                                    <a
                                        href="{{ $currentUser == 'user' ? url('/upcoming-appointments') : url('/astrologer-appointments') }}">Appointment</a>
                                </li>
                                @if ($currentUser == 'user')
                                    <li class="changeTimeColor" data-page="{{ url('/chat-with') }}">
                                        <a href="{{ url('/chat-with') }}">Our Astrologers</a>
                                    </li>
                                    <li class="changeTimeColor" data-page="{{ url('/pricing') }}">
                                        <a href="{{ url('/pricing') }}">Pricing Plan</a>
                                    </li>
                                    <li class="changeTimeColor" data-page="{{ url('/wallet') }}">
                                        <a href="{{ url('/wallet') }}">Wallet</a>
                                    </li>
                                    <li class="changeTimeColor" data-page="{{ url('/chat-list') }}">
                                        <a href="{{ url('/chat-list') }}">Chat-list</a>
                                    </li>
                                    @if($existPremiumUser)
                                    <li class="one"><a href="{{ url('/premium-kundli') }}">Premium Kundli</a></li>
                                    @endif
                                    {{--  <li class="one"><a href="{{ url('real-time-chat') }}">Real Time Chat</a></li>  --}}
                                @endif
                                @if ($currentUser == 'astrologer')
                                    <li class="changeTimeColor" data-page="{{ url('/chats') }}">
                                        <a href="{{ url('/chats') }}">Chat-Box</a>
                                    </li>
                                    {{--  <li class="one"><a href="{{ url('real-time-chat-list') }}">Real Time Chat</a></li>  --}}
                                @endif
                                <li class="changeTimeColor" data-page="{{ url('/logout') }}">
                                    <a href="{{ url('/logout') }}">Log Out</a>
                                </li>
                            </ul>

                            <div class="BoardOfElement">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="imgBuild">
                <img src="{{ asset('website_dashboard_assets/assets/images/AstroLogo.png') }}" alt="">
            </div>
        </div>
    </section>

    <section class="container-fluid">
        @yield('content')
    </section>

    @if (Session::has('error'))
        <script>
            // Wait for the document to be fully loaded
            document.addEventListener('DOMContentLoaded', function() {
                document.querySelector('#popup').style.display = "flex";
            });
        </script>
    @endif

    <!-- chat box  -->
    <script>
        function show() {
            let plusButton = document.getElementById("plus_button");
            plusButton.style.display = "block";
        }

        function hide() {
            let plusButton = document.getElementById("plus_button");
            plusButton.style.display = "none";
        }

        function handleOutsideClick(e) {
            console.log("clicked");
            let plusButton = document.getElementById("plus_button");
            let toggleButton = document.getElementById("toggle_button");
            if (e.target.id === "toggle_button" || toggleButton.contains(e.target)) return;
            if (e.target.id !== "plus_button" && !plusButton.contains(e.target)) {
                hide();
                document.removeEventListener("click", handleOutsideClick)
            }
        }

        function toggle(event) {
            let plusButton = document.getElementById("plus_button");
            if (plusButton.style.display == "" || plusButton.style.display === "none") {
                plusButton.style.display = "block";
                document.addEventListener("click", handleOutsideClick);
            } else {
                plusButton.style.display = "none";
            }

        }
    </script>

    <script>
        function toggleImojies(event) {
            let imojiButton = document.getElementById("imoji_button");
            if (imojiButton.style.display === "none") {
                imojiButton.style.display = "block";
            } else {
                imojiButton.style.display = "none";
            }
        }

        function toggleGifs(event) {
            let plusButton = document.getElementById("gifs_button");
            if (plusButton.style.display === "none") {
                plusButton.style.display = "block";
            } else {
                plusButton.style.display = "none";
            }
        }
    </script>

    <script>
        let chat_active = null;

        function handleChatClick(clickedChat) {
            if (chat_active !== null) {
                chat_active.classList.remove('chat_active');
            }
            clickedChat.classList.add('chat_active');
            chat_active = clickedChat;
        }
    </script>


    <script>
        function toggle(event) {
            let plusButton = document.getElementById("plus_button");
            if (event.target !== plusButton && !plusButton.contains(event.target)) {
                if (plusButton.style.display === "none") {
                    plusButton.style.display = "block";
                } else {
                    plusButton.style.display = "none";
                }
            }

        }

        document.addEventListener("DOMContentLoaded", function(event) {
            var a = document.querySelectorAll('li.one');
            let url = new URL(window.location.href);
            let param = url.pathname;
            for (ele of a) {
                let anchorTag = ele.querySelector('a');
                var tagsUrl = new URL(anchorTag.href);
                if (param == tagsUrl.pathname) {
                    ele.classList.add('active_tab');
                }
            }
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

    <!--=================================
Javascript -->

    <!-- JS Global Compulsory (Do not remove)-->
    <script src="{{ url('website_dashboard_assets') }}/js/jquery-3.6.0.min.js"></script>
    <script src="{{ url('website_dashboard_assets') }}/js/popper/popper.min.js"></script>
    <script src="{{ url('website_dashboard_assets') }}/js/bootstrap/bootstrap.min.js"></script>
    <script src="{{ url('website_dashboard_assets') }}/js/custom.js"></script>
    <script src="https://kit.fontawesome.com/66f2518709.js" crossorigin="anonymous"></script>
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <script>
        Pusher.logToConsole = true;
        var pusher = new Pusher('44c45d214d1c84fcabc9', {
            cluster: 'ap2'
        });
        var channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function(data) {
            var con = confirm('Chat Session Avalible now')
            if (con) {
                var url = "{{ url('chatify') }}" + "/" + data["message"];
                window.open(url, '_blank');
                startChats(data["message"]);
            }
        });

        function startChats(id) {
            const url = "{{ url('start-chat-time') }}";
            fetch(url, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({
                        meeting_id: id,
                        action: "0",
                        complete: "0",
                    }),
                })
                .then(response => response.json())
                .then(data => {
                    return;
                })
                .catch(error => console.log('Error saving time:', error));
        }
        // Pusher.logToConsole = true;

        // var pusher = new Pusher('44c45d214d1c84fcabc9', {
        //     cluster: 'ap2',
        //     authEndpoint: '/broadcasting/auth',
        //     auth: {
        //         headers: {
        //             'X-CSRF-Token': "{{ csrf_token() }}"
        //         }
        //     }
        // });
        // var channel = pusher.subscribe('chat-notify.' + 3);
        // channel.bind('PrivateChatEvent', function(data) {
        //     alert(data.message);
        // });

        document.getElementById('hamburger-btn').addEventListener('click', function() {
            const menu = document.getElementById('menu-list');
            menu.classList.toggle('menu-active');
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const hamburger = document.querySelector('.hamburger22');
            const DashList = document.querySelector('.DashList');
            const BoardOfElement = document.querySelector('.BoardOfElement');
            const body = document.body;

            let flipTimeout; // Timeout for flipping animation

            if (hamburger && DashList && BoardOfElement) {
                hamburger.addEventListener('click', () => {
                    if (!hamburger.classList.contains('is-flipped')) {
                        // First click: Slide right and set flip after 1 second
                        hamburger.classList.toggle('is-active');
                        DashList.classList.toggle('is-visible');
                        BoardOfElement.classList.toggle('is-visible');

                        // Prevent multiple flip actions
                        clearTimeout(flipTimeout);
                        flipTimeout = setTimeout(() => {
                            hamburger.classList.add('is-flipped');
                            hamburger.classList.remove('is-active');
                        }, 1000);
                    } else {
                        // Second click: Slide left and reset state
                        hamburger.classList.remove('is-flipped');
                        hamburger.classList.remove('is-active');
                        DashList.classList.remove('is-visible');
                        BoardOfElement.classList.remove('is-visible');
                    }

                    // Manage body scroll
                    if (DashList.classList.contains('is-visible')) {
                        body.classList.add('no-scroll');
                    } else {
                        body.classList.remove('no-scroll');
                    }
                });
            } else {
                console.error("Hamburger, DashList, or BoardOfElement element not found!");
            }
        });







        document.addEventListener('DOMContentLoaded', () => {

            const changeTimeColor = document.querySelectorAll('.changeTimeColor');


            const currentURL = window.location.href;
            console.log('Current URL:', currentURL);


            changeTimeColor.forEach(element => {

                console.log('Checking <li> with data-page:', element.getAttribute('data-page'));

                if (element.getAttribute('data-page') === currentURL) {

                    element.classList.add('listChangeColor');
                    console.log('Color applied to <li>:', element);
                }
            });
        });
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const header = document.getElementById('ResponsiveShortheader');
            let lastScrollPosition = 0;

            window.addEventListener('scroll', () => {
                const currentScrollPosition = window.pageYOffset;

                if (currentScrollPosition > lastScrollPosition) {

                    header.style.top = '-100px';
                } else {

                    header.style.top = '0';
                }


                lastScrollPosition = currentScrollPosition;
            });
        });
    </script>
    <script></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
                let debounceTimer;
                let cache = {}; // Cache for storing previous results
                let activeRequest = null; // Track active request

                $(document).on('input', '.city-input', function () {
                    let inputField = $(this);
                    let query = inputField.val().trim();
                    let suggestionsList = inputField.siblings('.suggestions');

                    // Clear suggestions if input is too short
                    if (query.length < 3) {
                        suggestionsList.empty();
                        return;
                    }

                    // If cached data exists, use it instead of making a new API call
                    if (cache[query]) {
                        displaySuggestions(cache[query], inputField, suggestionsList);
                        return;
                    }

                    // Clear previous debounce timer
                    clearTimeout(debounceTimer);

                    // Set a new debounce timer to delay the API request
                    debounceTimer = setTimeout(() => {
                        // Abort the previous request if it's still ongoing
                        if (activeRequest) {
                            activeRequest.abort();
                        }

                        // Make an API request
                        activeRequest = $.ajax({
                            url: '/api/geo-search',
                            type: 'GET',
                            data: { city: query },
                            success: function (data) {
                                cache[query] = data.response; // Cache the response
                                displaySuggestions(data.response, inputField, suggestionsList);
                            },
                            error: function () {
                                suggestionsList.empty();
                            },
                            complete: function () {
                                activeRequest = null; // Reset active request tracking
                            }
                        });
                    }, 300); // 300ms debounce time
                });

                // Function to display suggestions
                function displaySuggestions(suggestions, inputField, suggestionsList) {
                    suggestionsList.empty();
                    if (suggestions && suggestions.length > 0) {
                        suggestions.forEach(function (suggestion) {
                            let item = $('<div class="suggestion-item"></div>').text(suggestion.full_name);
                            item.data('lat', suggestion.coordinates[0]);
                            item.data('lon', suggestion.coordinates[1]);
                            suggestionsList.append(item);
                        });

                        // Click event for selecting a suggestion
                        suggestionsList.find('.suggestion-item').on('click', function () {
                            inputField.val($(this).text());
                            inputField.siblings('.lat-input').val($(this).data('lat'));
                            inputField.siblings('.lon-input').val($(this).data('lon'));
                            suggestionsList.empty();
                        });
                    }
                }
            });
    </script>
    <script>
        // Close the notification when the close button is clicked

            const notify=document.getElementsByClassName('custom-notification-container')[0];
            const notifyContainer=document.getElementsByClassName('container')[0];
            const sidePopUp=document.getElementsByClassName('custom-social-proof')[0];
            const closeNotify=document.getElementsByClassName('close-notify')[0];
            notify.addEventListener('click', ()=>{
                 notifyContainer.style.display='block';
                 sidePopUp.style.display='none';
            })
            closeNotify.addEventListener('click', ()=>{
                notifyContainer.style.display='none';
                sidePopUp.style.display='block';
            })

    </script>
   @php
$userIds = \App\Models\User::pluck('id');
@endphp

<script src="https://cdn.socket.io/4.7.2/socket.io.min.js"></script>
{{--  <script>
    document.addEventListener("DOMContentLoaded", () => {
        // All user IDs from Laravel
        const userIds = @json($userIds);
        const currentUserId = "{{ Auth::id() }}"; 

        // Initialize socket connection
        const socket = io("https://astro-buddy.in", {
            transports: ["websocket"], // ensures stable connection
            auth: { id: currentUserId },
            reconnection: true,
            reconnectionAttempts: 5,
            reconnectionDelay: 2000,
        });

        // When socket successfully connects
        socket.on("connect", () => {
            console.log("✅ Socket connected:", socket.id);
            checkOnlineStatus();
        });

        // When socket disconnects
        socket.on("disconnect", (reason) => {
            console.warn("⚠️ Socket disconnected:", reason);
        });

        // Real-time status change for any user
        socket.on("gotOnline", (data) => {
            console.log("⚡ User status changed:", data);
            const el = document.getElementById(`user-${data.userId}-status`);
            if (el) {
                el.textContent = data.online ? "🟢 Online" : "🔴 Offline";
                el.style.color = data.online ? "green" : "red";
            }
        });

        // Function to check all users' status initially
        function checkOnlineStatus() {
            if (socket.connected) {
                socket.emit("checkOnline", { users: userIds }, (response) => {
                    console.log("🧩 Online list:", response);
                    response.forEach((user) => {
                        const el = document.getElementById(`user-${user.userId}-status`);
                        if (el) {
                            el.textContent = user.online ? "🟢 Online" : "🔴 Offline";
                            el.style.color = user.online ? "green" : "red";
                        }
                    });
                });
            } else {
                console.warn("❌ Socket not connected yet, retrying...");
                setTimeout(checkOnlineStatus, 2000);
            }
        }
    });
</script>  --}}
<script>
    document.addEventListener("DOMContentLoaded", () => {
    const userIds = @json($userIds);
    const currentUserId = "{{ Auth::id() }}";

    const socket = io("https://astro-buddy.in", {
        transports: ["websocket"],
        auth: { id: currentUserId },
        reconnection: true,
        reconnectionAttempts: 5,
        reconnectionDelay: 2000,
    });

    socket.on("connect", () => {
        console.log("✅ Socket connected:", socket.id);
        checkOnlineStatus();
    });

    socket.on("disconnect", (reason) => {
        console.warn("⚠️ Socket disconnected:", reason);
        socket.on("gotBusy", (data) => {
        console.log("⚡ Busy status changed:", data);
        updateBusyStatus(data.userId, data.busy);
        });
    });

    socket.on("gotOnline", (data) => {
        console.log("⚡ User online status changed:", data);
        updateUserStatus(data.userId, data.online);
    });

    socket.on("gotBusy", (data) => {
        console.log("⚡ Busy status changed:", data);
        updateBusyStatus(data.userId, data.busy);
    });

    function checkOnlineStatus() {
        if (socket.connected) {
            socket.emit("checkOnline", { users: userIds }, (response) => {
                console.log("🧩 Online/Busy list:", response);

                response.forEach((user) => {
                    updateUserStatus(user.userId, user.online);
                    updateBusyStatus(user.userId, user.busy);
                });
            });
        } else {
            console.warn("❌ Socket not connected yet, retrying...");
            setTimeout(checkOnlineStatus, 2000);
        }
    }

    function updateUserStatus(userId, isOnline) {
        const elements = document.querySelectorAll(`#user-${userId}-status`);
        if (!elements.length) {
            console.warn(`⚠️ No online/offline elements found for userId: ${userId}`);
            return;
        }

        elements.forEach((el) => {
            el.textContent = isOnline ? "🟢 Online" : "🔴 Offline";
           el.style.color = isOnline ? "white" : "white";
            el.style.background = isOnline ? "#ff8a00" : "#ff8a00";
           {{--  el.style.color = isOnline ? "rgb(95 153 21)" : "#0C0B28";
            el.style.background = isOnline ? "whitesmoke" : "whitesmoke";  --}}
        });

        console.log(`✅ Updated online status for user: ${userId} → ${isOnline ? "Online" : "Offline"}`);
    }

   function updateBusyStatus(userId, isBusy) {
// Update all busy spans for this user
const userDivs = document.querySelectorAll(`div[data-user-id="${userId}"]`);
userDivs.forEach((userDiv) => {
const busySpan = userDiv.querySelector(".user-busy-status");
if (busySpan) {
busySpan.textContent = isBusy ? "🔴 Busy" : "";
}
});

// Update all Join Call buttons for this user
const joinBtns =
document.querySelectorAll(`.start-video-call-btn[data-user-id="${userId}"]`);
joinBtns.forEach((btn) => {
btn.style.display = isBusy ? "none" : "inline-block";
});

// Update all Start Chat buttons for this user
const startChatBtns =
document.querySelectorAll(`.start-chat-btn[data-user-id="${userId}"]`);
startChatBtns.forEach((btn) => {
btn.style.display = isBusy ? "none" : "inline-block";
});
const startChatBtnsAstro =
document.querySelectorAll(`.start-chat-btn[data-astro="${userId}"]`);
startChatBtnsAstro.forEach((btn) => {
btn.style.display = isBusy ? "none" : "inline-block";
});


console.log(`✅ Updated busy status for user ${userId} → ${isBusy ? "Busy" :
"Free"}`);
}
    {{--  function updateBusyStatus(userId, isBusy) {
        const userDivs = document.querySelectorAll(`div[data-user-id="${userId}"]`);

        if (!userDivs.length) {
            console.warn(`⚠️ No busy-status div found for userId: ${userId}`);
            return;
        }
        userDivs.forEach((userDiv) => {
            const busySpan = userDiv.querySelector(".user-busy-status");
            if (!busySpan) {
                console.warn(`⚠️ No .user-busy-status span found inside userId ${userId}`);
                return;
            }
            busySpan.textContent = isBusy ? "🔴 Busy" : "🟢 Free";
            
        });

        console.log(`✅ Updated busy status for user: ${userId} → ${isBusy ? "Busy" : "Free"}`);
    }  --}}
});
</script>
</body>

</html>
