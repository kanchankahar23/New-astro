<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Notifications</title>
        <link rel="stylesheet" href="pop2.css" />
        <link
            href="https://fonts.googleapis.com/css2?family=Poppins&display=swap"
            rel="stylesheet">
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
            integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
            <style>
                * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                }

                body {
                font-family: "Poppins", sans-serif;
                background-color: #f0f2f5;
                }
                .notification-container {
                display: none;
                right: 0%;
                position: fixed;
                top: 0%;
                transform: translate(0%, -51%);
                max-height: 100%;
                margin: 0 auto;
                background-color: #fff;
                animation: slideIn 1s forwards;
                z-index: 999999;
                }
                @keyframes slideIn {
                from {
                transform: translateX(100%);
                }
                to {
                transform: translateX(0);
                }
                }

                @keyframes slideOut {
                from {
                transform: translateX(0);
                }
                to {
                transform: translateX(100%);
                }
                }
                /* Classes to trigger animations */
                .slide-in {
                animation: slideIn 1s forwards;
                }

                .slide-out {
                animation: slideOut 1s forwards;
                }

                .heading {
                position: relative;
                }
                .close-notify {
                color: #ffffff;
                position: absolute;
                left: 14px;
                top: 32%;
                font-size: 25px;
                cursor: pointer;
                }
                .notify-heading {
                font-size: 20px;
                /* background: #020024;
                background: linear-gradient(
                90deg,
                rgba(2, 0, 36, 1) 0%,
                rgba(9, 9, 121, 1) 35%,
                rgba(0, 212, 255, 1) 100%
                ); */
                background: #b43a42;
                background: linear-gradient(90deg,rgba(180, 58, 66, 1) 0%, rgba(253, 29, 29, 1)
                50%, rgba(252, 176, 69, 1) 100%);
                padding: 10px;
                color: #ffffff;
                text-align: center;
                }

                .notification-card {
                cursor: pointer;
                margin: 10px;
                display: flex;
                align-items: flex-start;
                background-color: white;
                padding: 10px 30px;
                margin-bottom: 15px;
                border-radius: 10px;
                box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
                transition: all 0.3s ease;
                }

                .notification-card img {
                width: 50px;
                height: auto;
                margin-right: 15px;
                border-radius: 50%;
                }

                .text-content {
                flex: 1;
                text-align: left;
                }

                .text-content p {
                margin-bottom: 5px;
                color: #333;
                font-size: 13px;
                line-height: 1;
                }

                .time-badge {
                /* background-color: #ff8a00; */
                /* color: white; */
                /* padding: 3px 8px; */
                font-size: 0.75rem;
                border-radius: 5.2px;
                margin-left: 16.6px;
                color: #ff8a00;
                }
                .user-name {
                width: 185px;
                margin-top: 9px;
                display: flex;
                justify-content: space-between;
                }
                /* .time-badge.blue {
                background-color: #ff8a00;
                } */

                /* Responsive */
                @media (max-width: 600px) {

                    .user-name {
                    margin-top: 7px;

                    }
                .notification-card {
                flex-direction: row;
                align-items: center;
                text-align: center;
                }

                .notification-box {
                    z-index: 999 !important;
                    top: 62px !important;
                    right: 14px !important;
                }
                .notification-card img {
                width: 38px;
                }

                .text-content p {
                font-size: 0.7rem;
                }
                }


                .view-btn {
                display: inline-block;
                background-color: #ff8a00;
                color: white;
                padding: 4px 10px;
                border-radius: 4px;
                text-decoration: none;
                font-size: 0.8em;
                transition: background-color 0.3s ease;
                }

                .view-btn:hover {
                background-color: #0056b3;
                }
                .custom-social-proof {
                display: block;
                }
                * {
                margin: 0;
                padding: 0;
                }
                html {
                line-height: 1.2;
                box-sizing: border-box;
                }
                *,
                *::after,
                *::before {
                box-sizing: inherit;
                }


                body {
                position: relative;
                }
                .my-moon {
                width: 120px;
                height: 120px;
                background-color: #fff;
                border-radius: 50%;
                box-shadow: 0 0 0 10px rgba(255, 255, 255, 0.04),
                0 0 0 20px rgba(255, 255, 255, 0.04),
                0 0 0 30px rgba(255, 255, 255, 0.04),
                0 0 50px 50px rgba(255, 255, 255, 0.02),
                0 0 100px 100px rgba(255, 255, 255, 0.02);
                animation: moon-moving 30s both infinite;
                }
                .notification-box {
                position: absolute;
                z-index: 999;
                top: 30px;
                right: 30px;
                width: 50px;
                height: 50px;
                text-align: center;
                }
                .notification-bell {
                animation: bell 1s 1s both infinite;
                }
                .notification-bell * {
                display: block;
                margin: 0 auto;
                background-color: #ffc107;
                box-shadow: 0px 0px 15px #fff;
                }
                .bell-top {
                width: 6px;
                height: 6px;

                border-radius: 3px 3px 0 0;
                }
                .bell-middle {
                width: 25px;
                height: 25px;
                margin-top: -1px;
                border-radius: 12.5px 12.5px 0 0;
                }
                .bell-bottom {
                position: relative;
                z-index: 0;
                width: 32px;
                height: 2px;
                }
                .bell-bottom::before,
                .bell-bottom::after {
                content: "";
                position: absolute;
                top: -4px;
                }
                .bell-bottom::before {
                left: 1px;
                border-bottom: 4px solid #fff;
                border-right: 0 solid transparent;
                border-left: 4px solid transparent;
                }
                .bell-bottom::after {
                right: 1px;
                border-bottom: 4px solid #fff;
                border-right: 4px solid transparent;
                border-left: 0 solid transparent;
                }
                .bell-rad {
                width: 8px;
                height: 4px;
                margin-top: 2px;
                border-radius: 0 0 4px 4px;
                animation: rad 1s 2s both infinite;
                }
                .notification-count {
                position: absolute;
                z-index: 1;
                top: -6px;
                right: -6px;
                width: 28px;
                height: 28px;
                line-height: 29px;
                font-size: 13px;
                border-radius: 50%;
                background-color: #795548;
                font-weight: 500;
                color: #fff;
                animation: zoom 3s 3s both infinite;
                }
                @keyframes bell {
                0% {
                transform: rotate(0);
                }
                10% {
                transform: rotate(30deg);
                }
                20% {
                transform: rotate(0);
                }
                80% {
                transform: rotate(0);
                }
                90% {
                transform: rotate(-30deg);
                }
                100% {
                transform: rotate(0);
                }
                }
                @keyframes rad {
                0% {
                transform: translateX(0);
                }
                10% {
                transform: translateX(6px);
                }
                20% {
                transform: translateX(0);
                }
                80% {
                transform: translateX(0);
                }
                90% {
                transform: translateX(-6px);
                }
                100% {
                transform: translateX(0);
                }
                }
                @keyframes zoom {
                0% {
                opacity: 0;
                transform: scale(0);
                }
                10% {
                opacity: 1;
                transform: scale(1);
                }
                50% {
                opacity: 1;
                }
                51% {
                opacity: 0;
                }
                100% {
                opacity: 0;
                }
                }
                @keyframes moon-moving {
                0% {
                transform: translate(-200%, 600%);
                }
                100% {
                transform: translate(800%, -200%);
                }
                }
                </style>

                <style>
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
    </head>
    <body>
        @php
        $notification = App\Models\Notification::where('receiver',
        Auth::user()->id)->orderBy('id', 'desc')->get();
        $notificationCount = App\Models\Notification::where('receiver',
        Auth::user()->id)->count();
        @endphp
        <section class="custom-social-proof">
            <div class="custom-notification">
                <div class="custom-notification-container ">
                    <div class="notification-box custom-notification-container">
                        <span class="notification-count">{{ $notificationCount }}</span>
                        <div class="notification-bell">
                            <span class="bell-top"></span>
                            <span class="bell-middle"></span>
                            <span class="bell-bottom"></span>
                            <span class="bell-rad"></span>
                        </div>
                    </div>
                </div>
        </section>
        <div class="notification-container" style="height: -webkit-fill-available;width: 336px;box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;">
            <div class="heading">
                <h1 class="notify-heading">Notifications</h1>
                <i class="fa-regular fa-circle-xmark close-notify"
                    style="color: #ffffff;"></i>
            </div>
            <div style="overflow: auto;height: 569px;padding-bottom: 21px;">
                @if($notification->count() > 0)
                @foreach ($notification as $notifications)
                @if($notifications->appointment_type == 'chat')
                @php
                $backgroundColor = '#ffa500';
                @endphp
                @elseif ($notifications->appointment_type == 'video' )
                @php
                $backgroundColor = '#ffe10ddb';
                @endphp
                @elseif ($notifications->appointment_type == 'audio' )
                @php
                $backgroundColor = '#0096884a';
                @endphp
                @endif
                @if($notifications->is_read == 1)
                <div class="toast show fade toast-warning mb-2" role="alert"
                    aria-live="assertive" aria-atomic="true" data-mdb-autohide="false"
                    style="background-color: #ffffff;border: none;box-shadow: 3px 3px 6px #d5d5d5;border-radius: 10px;text-align: justify;margin-left: 20px;margin-top: 5px;border: 1px solid #72d1728a;">
                    <div class="toast-header toast-warning"
                        style="background-color: #ffffff !important;padding: 9px 4% !important;">
                        <a href="{{ route('notification.read', $notifications->id) }}"
                            style="font-size: 0.85rem;font-weight: 400;color: #2f3033;display: flex;">
                            <div>
                                <img style="width: 22px;margin-right: 6px;border-radius: 50%;"
                                    src="{{ asset($notifications->getUser->avtar ?? 'https://cdn-icons-png.freepik.com/256/11675/11675118.png?uid=R186345876&ga=GA1.1.219329638.1739767594') }}">
                            </div>
                            <div>
                                <b>{{
                                    $notifications->getUser->name }}</b>
                                is trying to connect for <b>
                                    @if($notifications->appointment_type == 'chat')
                                    Chat
                                    @else
                                    {{ $notifications->appointment_type}} Call
                                    @endif</b>
                            </div>
                        </a>
                    </div>
                    <div class="toast-body"
                        style="font-size: 0.85rem;font-weight: 400;color: #2f3033;display:flex;justify-content: space-between !important;">
                        <b>
                            @if($notifications->appointment_type == 'chat')
                            <i class="fas fa-comments fa-lg me-2 text-warning"
                                style="color: #e5a125eb;font-size: 0.95rem;"></i>
                            @elseif($notifications->appointment_type == 'video' )
                            <i class="fa-solid fa-video text-warning"></i>
                            @elseif($notifications->appointment_type == 'audio')
                            <i class="fa-solid fa-phone text-warning"></i>
                            @endif
                            &nbsp;{{ $notifications->appointment_type }}
                        </b>
                        <strong class=""
                            style="font-weight: 500;font-size: 0.84rem;color: #3b3c43;">{{
                            \Carbon\Carbon::parse($notifications->created_at)->format('M
                            d, Y :
                            h:i')}}</strong>
                        {{-- <small style="font-weight: 500;color: #138a41;">Just now</small>
                        --}}
                    </div>
                </div>
                @elseif($notifications->is_read == 0)
                <div class="toast show fade toast-warning mb-2" role="alert"
                    aria-live="assertive" aria-atomic="true" data-mdb-autohide="false"
                    style="background-color: #ffffff;border: none;box-shadow: 3px 3px 6px #d5d5d5;border-radius: 10px;text-align: justify;margin-left: 20px;margin-top: 5px;border: 1px solid #f49a1a80;">
                    <div class="toast-header toast-warning"
                        style="background-color: #ffffff !important;padding: 9px 4% !important;">
                        <a href="{{ route('notification.read', $notifications->id) }}" style="font-size: 0.85rem;font-weight: 400;color: #2f3033;display: flex;">
                            <div>
                                <img style="width: 22px;margin-right: 6px;border-radius: 50%;"
                                    src="{{ asset($notifications->getUser->avtar ?? 'https://cdn-icons-png.freepik.com/256/11675/11675118.png?uid=R186345876&ga=GA1.1.219329638.1739767594') }}">
                            </div>
                            <div>
                                <b>{{
                                    $notifications->getUser->name }}</b>
                                is trying to connect for <b>
                                    @if($notifications->appointment_type == 'chat')
                                    Chat
                                    @else
                                    {{ $notifications->appointment_type}} Call
                                    @endif</b>
                            </div>
                        </a>
                    </div>
                    <div class="toast-body"
                        style="font-size: 0.85rem;font-weight: 400;color: #2f3033;display:flex;justify-content: space-between !important;">
                        <b>
                            @if($notifications->appointment_type == 'chat')
                            <i class="fas fa-comments fa-lg me-2 text-warning"
                                style="color: #e5a125eb;font-size: 0.95rem;"></i>
                            @elseif($notifications->appointment_type == 'video' )
                            <i class="fa-solid fa-video text-warning"></i>
                            @elseif($notifications->appointment_type == 'audio')
                            <i class="fa-solid fa-phone text-warning"></i>
                            @endif
                            &nbsp;{{ $notifications->appointment_type }}
                        </b>
                        <strong class=""
                            style="font-weight: 500;font-size: 0.84rem;color: #3b3c43;">{{
                            \Carbon\Carbon::parse($notifications->created_at)->format('M
                            d, Y :
                            h:i')}}</strong>
                        {{-- <small style="font-weight: 500;color: #138a41;">Just now</small>
                        --}}
                    </div>
                </div>
                @endif
                @endforeach
                @else
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                           <h3 style="font-size: 1rem;margin-top: 20px;">No Notifications Found</h3>

                        </div>
                    </div>
                </div>
                @endif

            </div>

        </div>
        <script>
            const notify=document.getElementsByClassName('notification-box')[0];
        const notifyContainer=document.getElementsByClassName('notification-container')[0];
        const sidePopUp=document.getElementsByClassName('custom-social-proof')[0];
        const closeNotify=document.getElementsByClassName('close-notify')[0];
        notify.addEventListener('click', ()=>{
             notifyContainer.style.display='block';
             sidePopUp.style.display='none';
             document.body.style.overflow='hidden';
             notifyContainer.classList.add('slide-in');
             notifyContainer.classList.remove('slide-out');
        })
        closeNotify.addEventListener('click', ()=>{
            // notifyContainer.style.display='none';
            sidePopUp.style.display='block';
            document.body.style.overflow='auto';
            notifyContainer.classList.remove('slide-in');
            notifyContainer.classList.add('slide-out');
        })

        </script>
    </body>

</html>
