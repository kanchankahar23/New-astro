<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>AstroBuddy | Video Chat</title>
        <link rel="icon" href="{{asset('website/astro_link_icon.png')}}"
            sizes="32x32" />
        <link rel="icon" href="{{asset('website/astro_link_icon.png')}}"
            sizes="192x192" />
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
            crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.7.0.min.js"
            crossorigin="anonymous"></script>

            <style>
                @media screen and (max-width:500px) {
                .al-logo a img {
                min-width: 31px !important;
                height: 40px !important;
                }}
                .al-logo a {
                 margin: 0px !important;
                 margin-left: 35px !important;
                }

                @media screen and (max-width:500px) {
                .al-logo a img {
                min-width: 31px !important;
                height: 40px !important;
                }}

                .smallPeer img{
                width: 80px !important;
                height: 80px !important;
                }

                .leargPeer img{
                width: 140px !important;
                height: 140px !important;
                }
                .user-placeholder {
                position: absolute;
                width: 100px;
                height: 100px;
                object-fit: cover;
                border-radius: 50%;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                z-index: 1;
                }
                .video-container {
                position: relative;
                display: inline-block;
                }
                .smallPeer {
                width: 100px;
                height: 100px;
                 border-radius: 10px !important;
                    border: 2px solid #fff !important;
                    background: black !important;
                }

                #stream-wrapper {
                position: relative;
                width: 100%;
                height: 100%;
                }

                .leargPeer {
                width: 100%;
                height: 100%;
                top:0 !important;
                left:0 !important;
                 border-radius: 10px !important;
                    border: 2px solid #fff !important;
                    background: black !important;
                }

                #localVideo, #localUserImage {
                width: 100%;
                height: 100%;
                object-fit: cover;
                }

                #localVideo {
                display: block;
                }

                /* Modal Background */
                .modal {
                    display: none;
                    /* Hidden by default */
                    position: fixed;
                    z-index: 1000;
                    left: 0;
                    top: 0;
                    width: 100%;
                    height: 100%;
                    overflow: auto;
                    background-color: rgba(0, 0, 0, 0.4);
                    /* Black with opacity */
                }

                /* Modal Content Box */
                .modal-content {
                    background-color: #fefefe;
                    margin: 15% auto;
                    /* Centered */
                    padding: 20px;
                    border: 1px solid #888;
                    width: 100%;
                    /* max-width: 400px; */
                    text-align: center;
                    border-radius: 5px;
                }

                /* Close Button */
                .close {
                    color: #aaa;
                    float: right;
                    font-size: 28px;
                    font-weight: bold;
                    cursor: pointer;
                }

                /* Close Button Hover */
                .close:hover,
                .close:focus {
                    color: black;
                    text-decoration: none;
                }

                /* Extension Buttons */
                #modalButtons button {
                    margin: 5px;
                    padding: 10px 20px;
                    font-size: 13px;
                    cursor: pointer;
                    background: #41abdd;
                    border-radius: 7%;
                    font-weight: 500;
                }
            </style>
            <style>
                body {
                    width: 100%;
                    background: #000000 !important;
                    margin: 0;
                    padding: 0;
                    /* overflow: hidden; */
                }

                #astrologom {
                    height: 40px;
                }

                .header {
                    display: flex;
                }

                button {
                    outline: none;
                    transition: 0.2s;
                    cursor: pointer;
                }

                button:hover {
                    opacity: 0.7;
                }

                body {
                    --app-background: #eaebf5;
                    --chat-background: #fff;
                    --link-color: #c0c1c5;
                    --navigation-bg: #fff;
                    --navigation-box-shadow: 0 2px 6px 0 rgba(136, 148, 171, 0.2), 0 24px 20px -24px rgba(71, 82, 107, 0.1);
                    --main-color: #3d42df;
                    --message-bg: #f3f4f9;
                    --message-bg-2: #3d42df;
                    --message-text: #2c303a;
                    --placeholder-text: #a2a4bc;
                    --button-bg: #fff;
                }



                body.dark .mic {
                    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' stroke='%23fff' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-mic-off' viewBox='0 0 24 24'%3E%3Cpath d='M1 1l22 22M9 9v3a3 3 0 005.12 2.12M15 9.34V4a3 3 0 00-5.94-.6'/%3E%3Cpath d='M17 16.95A7 7 0 015 12v-2m14 0v2a7 7 0 01-.11 1.23M12 19v4M8 23h8'/%3E%3C/svg%3E%0A");
                }

                body.dark .camera {
                    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' stroke='%23fff' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-camera-off' viewBox='0 0 24 24'%3E%3Cpath d='M1 1l22 22M21 21H3a2 2 0 01-2-2V8a2 2 0 012-2h3m3-3h6l2 3h4a2 2 0 012 2v9.34m-7.72-2.06a4 4 0 11-5.56-5.56'/%3E%3C/svg%3E%0A");
                }

                body.dark .maximize {
                    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' stroke='%23fff' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-maximize' viewBox='0 0 24 24'%3E%3Cpath d='M8 3H5a2 2 0 00-2 2v3m18 0V5a2 2 0 00-2-2h-3m0 18h3a2 2 0 002-2v-3M3 16v3a2 2 0 002 2h3'/%3E%3C/svg%3E%0A");
                }

                body.dark .magnifier {
                    color: #fff;
                }

                body.dark .chat-header {
                    border-color: var(--message-bg);
                }

                body.dark .btn-close-right {
                    color: #fff;
                }

                a {
                    text-decoration: none;
                }

                .app-container {
                    background-color: var(--app-background);
                    width: 100%;
                    height: 92%;
                    font-family: "DM Sans", sans-serif;
                    display: flex;
                    transition: 0.2s;
                }



                .chat-header-button {
                    background-color: var(--main-color);
                    padding: 12px 16px 12px 40px;
                    border: none;
                    border-radius: 4px;

                    color: #fff;
                    background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 512 512' xmlns='http://www.w3.org/2000/svg' fill='%23fff'%3E%3Cpath d='M479.9 187.52l-90.19 68.53v-52.6a20 20 0 00-20-20H20a20 20 0 00-20 20V492a20 20 0 0020 20h349.71a20 20 0 0020-20v-52.6l90.18 68.52c13.05 9.91 32.1.67 32.1-15.92V203.45c0-16.5-18.94-25.92-32.1-15.93zM349.7 472H40V223.45h309.71zM472 451.68l-82.29-62.53V306.3L472 243.77zM87.96 79.24C129.62 28.88 190.86 0 256 0c65.13 0 126.37 28.88 168.03 79.24a20 20 0 01-30.82 25.5A177.6 177.6 0 00256 40a177.6 177.6 0 00-137.21 64.73 20 20 0 11-30.83-25.5zm240.36 32.21a20 20 0 11-21.02 34.03 97.57 97.57 0 00-51.3-14.53 97.6 97.6 0 00-51.31 14.53 20 20 0 11-21.02-34.03A137.53 137.53 0 01256 90.95c25.59 0 50.6 7.09 72.32 20.5zm0 0'/%3E%3C/svg%3E%0A");
                    background-repeat: no-repeat;
                    background-position: center left 12px;
                    background-size: 16px;
                    font-size: 14px;
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
                    background-color: #04a12b;
                    color: white !important;
                    padding: 2px 7px;
                    font-size: smaller;
                    border: none;
                    border-radius: 5px;
                    margin-top: 10px;
                }

                .view {
                    background-color: #4d1dec;
                    color: white !important;
                    padding: 2px 7px;
                    font-size: smaller;
                    border: none;
                    border-radius: 5px;
                    margin-top: 10px;
                }


                .app-main {
                    flex: 1;
                    width: 100%;
                    padding: 0px 32px 16px 32px;
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    background-color: #2c303a;
                }

                .video-call-wrapper {
                    width: 100%;
                    height: 100%;
                    overflow: hidden;
                    display: flex;
                    flex-wrap: wrap;
                }

                .video-participant {
                    width: 50%;
                    height: 100%;
                    position: relative;
                }

                .video-participant img {
                    width: 100%;
                    height: 100%;
                    object-fit: cover;
                }

                .name-tag {
                    position: absolute;
                    bottom: 12px;
                    right: 12px;
                    font-size: 12px;
                    color: #fff;
                    background-color: rgba(0, 15, 47, 0.5);
                    border-radius: 4px;
                    padding: 4px 12px;
                }

                .participant-actions {
                    position: absolute;
                    display: flex;
                    left: 12px;
                    top: 12px;
                }

                .btn-mute,
                .btn-camera {
                    width: 32px;
                    height: 32px;
                    border-radius: 4px;
                    background-color: rgba(0, 15, 47, 0.5);
                    background-repeat: no-repeat;
                    background-position: center;
                    background-size: 16px;
                    border: none;
                }

                .btn-mute {
                    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' stroke='%23fff' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-mic-off' viewBox='0 0 24 24'%3E%3Cpath d='M1 1l22 22M9 9v3a3 3 0 005.12 2.12M15 9.34V4a3 3 0 00-5.94-.6'/%3E%3Cpath d='M17 16.95A7 7 0 015 12v-2m14 0v2a7 7 0 01-.11 1.23M12 19v4M8 23h8'/%3E%3C/svg%3E%0A");
                    margin-right: 4px;
                }

                .btn-camera {
                    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' stroke='%23fff' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-camera-off' viewBox='0 0 24 24'%3E%3Cpath d='M1 1l22 22M21 21H3a2 2 0 01-2-2V8a2 2 0 012-2h3m3-3h6l2 3h4a2 2 0 012 2v9.34m-7.72-2.06a4 4 0 11-5.56-5.56'/%3E%3C/svg%3E%0A");
                }

                .video-call-actions {
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    padding-top: 22px;
                    /* margin-top: 5px; */
                    max-width: 500px;
                }

                .video-action-button {
                    background-repeat: no-repeat;
                    background-size: 24px;
                    border: none;
                    height: 48px;
                    margin: 0 8px;
                    box-shadow: var(--navigation-box-shadow);
                    border-radius: 50%;
                    width: 48px;
                    cursor: pointer;
                    outline: none;
                    background-color: var(--button-bg);
                }

                .video-action-button.mic {
                    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' stroke='%232c303a' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-mic-off' viewBox='0 0 24 24'%3E%3Cpath d='M1 1l22 22M9 9v3a3 3 0 005.12 2.12M15 9.34V4a3 3 0 00-5.94-.6'/%3E%3Cpath d='M17 16.95A7 7 0 015 12v-2m14 0v2a7 7 0 01-.11 1.23M12 19v4M8 23h8'/%3E%3C/svg%3E%0A");
                    background-position: center;
                }

                .video-action-button.camera {
                    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' stroke='%232c303a' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-camera-off' viewBox='0 0 24 24'%3E%3Cpath d='M1 1l22 22M21 21H3a2 2 0 01-2-2V8a2 2 0 012-2h3m3-3h6l2 3h4a2 2 0 012 2v9.34m-7.72-2.06a4 4 0 11-5.56-5.56'/%3E%3C/svg%3E%0A");
                    background-position: center;
                }

                .video-action-button.maximize {
                    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' stroke='%232c303a' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-maximize' viewBox='0 0 24 24'%3E%3Cpath d='M8 3H5a2 2 0 00-2 2v3m18 0V5a2 2 0 00-2-2h-3m0 18h3a2 2 0 002-2v-3M3 16v3a2 2 0 002 2h3'/%3E%3C/svg%3E%0A");
                    background-position: center;
                }

                .video-action-button.endcall {
                    /* color: #ff1932;
                                    width: auto;
                                    font-size: 14px;
                                    padding-left: 42px;
                                    padding-right: 12px;
                                    background-image: url("https://cdn-icons-png.flaticon.com/512/733/733497.png");
                                    background-size: 20px;
                                    background-position: center left 12px; */

                    color: #ff1932;
                    width: auto;
                    font-size: 14px;
                    padding-left: 42px;
                    padding-right: 6px;
                    background-image: url(https://cdn-icons-png.flaticon.com/512/733/733497.png);
                    /* background-size: 20px; */
                    background-position: center left 12px;
                    border-radius: 50%;
                }

                .video-action-button.toggle {
                    width: auto;
                    font-size: 14px;
                    padding-left: 42px;
                    padding-right: 6px;
                    background-image: url(https://cdn-icons-png.flaticon.com/512/32/32325.png);
                    background-size: 25px;
                    background-position: center left 11px;
                    border-radius: 50%;
                    transform: rotate(180deg);
                }

                .video-action-button.kundali {
                    width: auto;
                    font-size: 14px;
                    padding-left: 42px;
                    padding-right: 8px;
                    background-image: url(https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ5SR7I7o1oCEIfOt-lpqXrJFqlqeKu5fYWNw&s);
                    background-size: 34px;
                    background-position: center left 9px;
                    border-radius: 50%;
                }

                .video-action-button.magnifier {
                    padding: 0 12px;
                    display: flex;
                    align-items: center;
                    width: auto;
                    flex-grow: 0;
                    color: #2c303a;
                }



                .expand-btn {
                    position: absolute;
                    right: 32px;
                    top: 24px;
                    border: none;
                    background-color: var(--chat-background);
                    border-radius: 4px;
                    padding: none;
                    color: var(--message-text);
                    width: 40px;
                    height: 40px;
                    justify-content: center;
                    align-items: center;
                    display: none;
                }

                .video-call-header {
                    display: flex;

                        {
                            {
                            -- justify-content: space-between;
                            --
                        }
                    }

                    gap: 458px;
                    justify-content: space-around;
                    padding: 0px 14px;
                    /* margin-top:17px; */
                }

                .row {
                    /* width: 423px; */
                    display: flex;
                }

                .mt-2 {
                    /* width: 50%; */
                    margin-top: 0 !important;
                    background-color: #2f3033;
                }

                .container-fluid {
                    padding: 0px
                }

                #video-streams {
                    display: grid;
                    grid-template-columns: repeat(auto-fit, minmax(500px, 1fr));
                    height: 100%;
                    width: 100%;
                    gap: 10px;
                    margin: 0 auto;
                    margin-top: 11px !important;
                }

                .video-container {
                    position: relative;
                    width: 100%;
                    overflow: hidden;
                    border-radius: 10px;
                }

                .video-player {
                    background: black;
                    width: 100%;
                    /* height: 500px; */
                    height: 100%;
                    position: absolute;
                    top: 0;
                    left: 6;
                }

                .timer-container {
                    margin-top: 13px;
                    display: flex;
                    align-items: center;
                    background-color: #ffffff;
                    padding: 8px 20px;
                    border-radius: 10px;
                    width: 100px;
                    height: 25px !important;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                }

                .timer-icon {
                    width: 40px;
                    height: 40px;
                    font-size: larger;

                }

                #timer {
                    font-size: 24px;
                    font-weight: bold;
                    color: #333333;
                }

                #user-container-userIds {
                    border: 1px solid red !important;
                }
            </style>
            <style>
                body {
                    overflow-x: hidden;
                    overflow-y: auto;
                }

                .timer-container {
                    display: flex;
                    align-items: center;
                    background-color: #ffffff;
                    padding: 3px 20px;
                    border-radius: 10px;
                    width: 120px;
                    height: 41px;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                }

                .accept {
                    background-color: #04a12b;
                    color: #ffffff !important;
                    padding: 2px 7px;
                    font-size: 14px !important;
                    border: none;
                    border-radius: 5px;
                    margin-top: 10px;
                    font-weight: 600;
                }

                .FontOfAstro {
                    font-size: 25px;
                    font-weight: 600;
                    color: #0a0a5f !important;
                    /* color: #157ec1; */
                    margin: -43px 0px 10px;
                    margin-left: 90px !important;
                    font-family: "Montserrat", sans-serif;
                }


                .host-video {
                    /* border: 3px solid red !important; */
                    border-radius: 10px;
                    /* box-shadow: 0 0 15px rgba(255, 0, 0, 0.4); */
                }

                .joiner-video {
                    /* border: 2px solid green !important; */
                    border-radius: 10px;
                    /* box-shadow: 0 0 10px rgba(0, 255, 0, 0.2); */
                }
            </style>
            <style>
                /* .video-box {
                                            position: relative;
                                            display: inline-block;
                                            width: 300px;
                                            height: 200px;
                                            background: #222;
                                            border-radius: 10px;
                                            overflow: hidden;
                                        } */
                video {
                    width: 100%;
                    height: 100%;
                    object-fit: cover;
                }

                .user-icon {
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                    width: 80px;
                    height: 80px;
                    background: #444;
                    color: white;
                    font-size: 36px;
                    font-weight: bold;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    border-radius: 50%;
                }
            </style>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background: #121212;
                    color: white;
                    text-align: center;
                    margin: 0;
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    height: 100vh;
                    justify-content: center;
                }

                /* Updated: Video Call Container - Bigger Boxes */
                .video-call-container {
                    display: flex;
                    justify-content: center;
                    gap: 20px;
                    width: 90vw;
                    /* Adjust width for better spacing */
                    height: 75vh;
                    /* Take up most of the screen */
                    margin-bottom: 4.375rem;
                }

                /* Updated: Bigger Video Box */
                .video-box {
                    position: relative;
                    width: 100%;
                    /* Almost half of the screen */
                    height: 100%;
                    /* Take full height */
                    display: flex;
                    justify-content: center;
                    align-items: center;
                }

                /* Updated: Bigger Videos */
                video {
                    width: 100%;
                    height: 100%;
                    object-fit: cover;
                    /* Fill the entire box */
                    border-radius: 10px;
                    {{--  border: 2px solid #fff;
                    background: black;  --}}
                }

                /* Name & Username Label */
                .user-info {
                    position: absolute;
                    bottom: 15px;
                    left: 15px;
                    background: rgba(0, 0, 0, 0.6);
                    padding: 8px 12px;
                    border-radius: 5px;
                    font-size: 16px;
                }

                /* Controls: Floating Bottom Bar */
                .controls {
                    position: fixed;
                    bottom: 20px;
                    display: flex;
                    gap: 15px;
                    background: rgba(0, 0, 0, 0.7);
                    padding: 12px 18px;
                    border-radius: 10px;
                }


                /* End Call Button - Red */
                .end {
                    background: red;
                }


                .copylink {
                    background-color: #ffffff;
                    color: #000000 !important;
                    padding: 2px 7px;
                    font-size: 14px;
                    border: none;
                    border-radius: 5px;
                    /* margin-top: 10px; */
                    width: 31%;
                }

                .smallPeer {
                    position: absolute;
                    width: 250px;
                    height: 150px;
                    bottom: 0px;
                    right: 0px;
                    z-index: 9999;
                    /* border: 3px solid green; */
                }

                .leargPeer {
                    position: absolute;
                    width: 100%;
                    height: 100%;
                    /* border: 3px solid red; */
                    /* z-index: 99; */
                }

                #stream-wrapper {
                    width: 70vw;
                    height: 79vh;
                    display: block;
                    position: relative;
                    overflow: hidden;
                    margin-top: 10px;
                }


                @media (min-width: 1224px) {

                    .video-call-header {
                        gap: 300px;
                        padding: 0px 209px;
                        margin-top: 5px;
                        background: #000000;
                        width: 100%;
                        height: 50px;
                    }

                    .smallPeer {
                        position: absolute;
                        width: 250px;
                        bottom: 0px;
                        /* right: 209px; */
                        right: 0px;
                        /* z-index: 1; */
                    }

                    .leargPeer {
                        position: absolute;
                        width: 100%;
                        top: 0% !important;
                        height: 100%;
                        left: 0% !important;
                        /* transform: translate(-50%, -50%) !important; */
                    }

                    #stream-wrapper {
                        width: 70vw;
                        height: 79vh;
                        display: block;
                    }

                    .video-player {
                        width: 100%;
                        /* height: 500px; */
                        height: 100%;
                    }

                    .app-container {
                        height: 100%;
                    }
                    .videcall-footer{
                    display: none;
                    }
                }

                @media (min-width: 768px) and (max-width: 1024px) {
                    .video-call-header {
                        gap: 24vw;
                        padding: 10px 14px;
                    }

                    .smallPeer {
                        position: absolute;
                        width: 230px;
                        height: 140px;
                        bottom: 0px;
                        right: 0px;
                        /* z-index: 1; */
                    }

                    .leargPeer {
                        position: absolute;
                        width: 100%;
                        height: 100%;
                        /* margin-top: 30px; */
                        top: 0 !important;
                        left: 0 !important;
                    }

                    #stream-wrapper {
                        width: 97vw;
                        height: 83vh;
                        display: block;
                        overflow: hidden;
                        /* margin-left: -82px; */
                    }

                    .video-player {
                        width: 100%;
                        /* height: 500px; */
                        height: 100%;
                    }

                    .app-container {
                        height: 100%;
                    }

                    .col-6 {
                        margin-left: 5vw;
                    }
                    videcall-footer.videcall-footer{
                    display: none;
                    }

                }

                @media (min-width: 481px) and (max-width: 767px) {

                    .video-call-header {
                        gap: 12vw;
                        padding: 10px 14px;

                    }

                    .app-container {
                        height: 100%;
                    }

                    .smallPeer {
                        position: absolute;
                        width: 150px;
                        height: 220px;
                        bottom: 0px;
                        right: 0px;
                        touch-action: none;
                        /* z-index: 1; */
                    }

                    .leargPeer {
                        position: absolute;
                        width: 97%;
                        height: 100%;
                        /* margin-top: 27px; */
                        top: 50% !important;
                        left: 50% !important;
                        transform: translate(-50%, -50%);
                        touch-action: none;
                    }

                    #stream-wrapper {
                        width: 97vw;
                        height: 79vh;
                        display: block;
                        overflow: hidden;
                        /* margin-left: -82px; */
                    }

                    .video-player {
                        width: 100%;
                        /* height: 500px; */
                        height: 100%;
                    }

                    .videcall-footer{
                    display: block;
                    margin-top: 10px;
                    }
                }

                @media (max-width: 481px) and (min-width:312px) {

                    .video-call-header {
                        gap: 3vw;
                        padding: 10px 2px;
                    }

                    /* .video-box{
                                      width: 360px;
                                      height: 300px;
                                      margin-left: -33px;
                                   } */
                    .smallPeer {
                        position: absolute;
                        {{--  width: 150px;
                        height: 220px;  --}}
                        width: 140px;
                        height: 190px;
                        bottom: 8px;
                        right: 8px;
                        z-index: 9999;
                        touch-action: none;
                    }

                    .leargPeer {
                        position: absolute;
                        width: 100%;
                        height: 100%;
                        /* margin-top: 4px; */
                        top: 50% !important;
                        left: 50% !important;
                        transform: translate(-50%, -50%);
                        touch-action: none;
                    }

                    #stream-wrapper {
                        width: 97vw;
                        height: 75vh;
                        display: block;
                        overflow: hidden;
                        /* margin-left: -82px; */
                    }

                    .video-player {
                        width: 100%;
                        /* height: 500px; */
                        height: 100%;
                    }

                    /* .col-6 {
                            margin-left: -50px;
                        } */

                    .app-container {
                        height: 100%;
                    }
                    .videcall-footer{
                    display: block;
                    margin-top: 10px;
                    }
                }

                .container-fluid {
                    overflow: auto;
                    scrollbar-width: none;
                    /* Firefox */
                    -ms-overflow-style: none;
                    /* IE 10+ */
                }

                .container-fluid::-webkit-scrollbar {
                    display: none;
                    /* Chrome, Safari, Opera */
                }

                .kundali {
                    margin: 0px !important;
                }
            </style>
    </head>
    <body>
        <link
            href="https://fonts.googleapis.com/css?family=DM+Sans:400,500,700&display=swap"
            rel="stylesheet">
        <div class="video-call-header">
            <div class="row" style="margin-top: 10px;">
                {{-- <div class="col-6">
                    <a href="{{ url('login') }}">
                        <button class="chat-header-button">
                            Back to Dashboard
                        </button>
                    </a>
                </div> --}}
                <div class="col-6">
                    <div class="logoo">
                        <div style="white-space: nowrap     margin-top: -25px;"
                            class="al-logo">
                            <a href="">
                                <img src="https://astro-buddy.com/website/uploads/sites/logo23.png"
                                    style="height: 40px ; margin-top: -10px;"
                                    alt="logo">
                                <h3 class="FontOfAstro"
                                    style="color: #fbfbfb !important ; margin-top: 1px;">
                                    ASTROBUDDY
                                </h3>
                            </a>
                        </div>
                    </div>
                </div>
            </div> <br>
            <div class="row" id="joining-meeting">
                @if(!session()->has('meeting'))
                {{-- <div class="col-12">
                    <input type="text" id="linkname" value=""
                        class="form-control" placeholder="Enter Your Name ">
                </div> --}}
                @endif
                {{-- <div class="mt-2 col-12">
                    <input type="text" id="linkUrl" class="form-control"
                        value="{{url('join-meeting')}}/{{$meeting->url}}">
                </div> --}}
                <div class="timer-container">
                    <div>
                        <i class="mdi mdi-clock-outline timer-icon"></i>
                    </div>
                    <div id="timer">00:00</div>
                </div>

                {{-- <div class="mt-2 text-center col-12">
                </div> --}}
            </div>
            {{-- header buttons --}}
        </div>
        <div class="container-fluid app-container">
            <div class="app-main">
                <div id="timer-toast-container"
                    class="position-fixed top-0 end-0 p-3"
                    style="position: absolute; top: 50% !important;left: 50%;transform: translate(-50%, -50%);z-index: 9999;">
                </div>
                <div id="stream-wrapper" style="position: relative; width: 100%; height: 100%;">
                    <!-- Local Stream -->
                                        <div  class="leargPeer">
                        @if($appointment["type"] == "video")
                                <video id="localVideo" autoplay muted playsinline
                                    style="width: 100%; height: 100%; object-fit: cover;"></video>
                        @else
                        <audio id="localVideo" autoplay muted></audio>
                        @endif
                        
                            @if(!empty(Auth::user()->avtar()))
                            <img id="localUserImage"
                                src="{{ asset(Auth::user()->avtar) }}"
                                alt="Local User" class="user-placeholder"
                                style="display: none; position: absolute; top: 50%; left: 50%;
                                                                 border-radius: 50%;
                                                                object-fit: cover; z-index: 5; transform: translate(-50%, -50%);" />
                             @else
                             <img id="localUserImage"
                                src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8cHJvZmlsZSUyMGltYWdlfGVufDB8fDB8fHww"
                                alt="Local User" class="user-placeholder"
                                style="display: none; position: absolute; top: 50%; left: 50%;
                                                                 border-radius: 50%;
                                                                object-fit: cover; z-index: 5; transform: translate(-50%, -50%);" />
                            @endif

                    </div>
                    <!-- Remote Stream -->
                    <div
                         class="smallPeer">
                         @if($appointment["type"] == "video")
                        <video id="remoteVideo" autoplay playsinline
                            style="width: 100%; height: 100%; object-fit: cover; border-radius: 10px;"></video>
                        @else
                       <audio id="remoteVideo" autoplay></audio>
                        @endif
                       
                        @if(!empty($remoteUserImage))
                        <img id="remoteUserImage"
                            src="{{ url($remoteUserImage) }}"
                            alt="Remote User" class="user-placeholder"
                            style="display: none; position: absolute; top: 50%; left: 50%;
                                                            border-radius: 50%;
                                                            object-fit: cover; z-index: 111111; transform: translate(-50%, -50%);" />
                      @else
                      <img id="remoteUserImage"
                        src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8cHJvZmlsZSUyMGltYWdlfGVufDB8fDB8fHww" class="user-placeholder"
                        alt="Remote User" style="display: none; position: absolute; top: 50%; left: 50%; border-radius: 50%;object-fit: cover; z-index: 111111; transform: translate(-50%, -50%);" />
                        @endif
                    </div>
                </div>

                {{--  <div id="stream-wrapper">

                    <video id="localVideo" class="leargPeer" autoplay muted
                        playsinline></video>
                    <video id="remoteVideo" class="smallPeer" autoplay
                        playsinline></video>

                </div>  --}}
                {{-- <div id="popup"
                    style="display:none; position:fixed; top:30%; left:30%; padding:20px; background:#fff; border:1px solid #ccc; z-index:1000;">
                    The other user has ended the call.
                </div> --}}
                {{--
                <div class="row">
                    <div class="col-3">
                        <button class="btn btn-primary"
                            onclick="makeCall()">Make Call</button>
                    </div>
                    <div class="col-3">
                        <button class="btn btn-primary"
                            onclick="answerCall()">Answer</button>
                    </div>
                    <div class="col-3">
                        <button class="btn btn-primary"
                            onclick="toggleCamera()">Toggle
                            Camera</button>
                    </div>
                    <div class="col-3">
                        <button class="btn btn-primary"
                            onclick="toggleMic()">Toggle
                            Mic</button>
                    </div>
                    <br>
                    <div class="col-3">
                        <button class="btn btn-primary"
                            onclick="flipCamera()">Flip
                            Camera</button>
                    </div>
                </div> --}}
                <div class="mt-2 text-center col-12 headLinks">
                    {{-- <button id="join-btn" style="display: none;"></button>
                    --}}
                    <button id="joinCallBtn" class="accept"
                        onclick="makeCall()">Join
                        Call</button>
                    <button id="join-btn" style="display: none;"></button>

                    <button id="join-btns" class="accept" onclick="copyLink()"
                        style="background:#ff0808c9 !important;">Copy
                        Link</button>
                    @if(Auth::user()->type == "user")
                    <button class="accept"
                        style="background:#1f51f1 !important;">
                        Dashboard
                    </button>
                    </a>
                    @endif
                    @if(Auth::user()->type == "astrologer")
                        {{-- <button id="openModalBtn" class="view"
                            onclick="loadPopup(openKundliPopup)">View
                            Kundli</button> --}}
                        <a href="{{ url('login') }}">
                            <button class="accept"
                                style="background:#0030cb !important;">
                                Dashboard
                            </button>
                        </a>
                    @endif
                </div>
                <div class="video-call-actions" id="stream-controls"
                    style="display: none;">

                    @if (Auth::user()->type == 'astrologer')
                    <button id="openModalBtn"
                        class="video-action-button kundali"></button>
                    @endif
                    @if($appointment["type"] == "video")
                   <button id="toggle-btn" class="video-action-button toggle"
                    onclick="toogleClass()"></button>
                    @endif

                    {{-- <button id="leave-btn"
                        class="video-action-button endcall leavebtn"
                        onclick="leaveCall()"></button> --}}
                    <button id="leave-btn"
                        class="video-action-button endcall leavebtn"
                        onclick="stopTimer(onTimerStopped)"></button>
                    {{--  <button id="toggleAudioBtn" onclick="toggleMic()"
                        class="video-action-button mic"></button>  --}}
                        <button id="toggleAudioBtn" onclick="toggleMic()"
                            class="video-action-button mic" style="padding: 6px;">
                            </button>
                        @if($appointment["type"] == "video")
                        {{--  <button id="toggleCameraBtn" onclick="toggleCamera()"
                            class=" video-action-button camera"></button>  --}}
                            <button id="toggleCameraBtn" onclick="toggleCamera()"
                                class=" video-action-button camera" style="padding: 6px;">
                                </button>
                        @endif
                    {{--  <button id="joinCallBtn" style="display:none;">Join Call</button>  --}}

                </div>
                <div class="videcall-footer">
                    <p> ©Copyright 2025 <b>Astro-Buddy</b> All Rights Reserved</p>
                </div>
                <input id="appid" type="hidden" value="{{$meeting->app_id}}"
                    readonly>
                <input id="token" type="hidden" value="{{$meeting->token}}"
                    readonly>
                <input id="channel" type="hidden" value="{{$meeting->channel}}"
                    readonly>
                    {{--  <input type="text" value="{{ $appointment['type'] }}">  --}}
                <input id="urlId" type="hidden" value="{{$meeting->url}}"
                    readonly>
                <input id="event" type="hidden" value="{{$event}}" readonly>
                <input id="timer" type="hidden" value="0">
                <input id="user_meeting" type="hidden" value="0">
                <input id="user_permission" type="hidden" value="0">
                <div class="row" id="joining-meeting">
                    <div id="extendModal" class="modal">
                        <div class="modal-content">
                            <span class="close" id="closeModal">&times;</span>
                            <p id="modalMessage" style="color: black">You have
                                ₹0 in your wallet. Choose minutes to
                                extend call:</p>
                            <div id="modalButtons"></div>
                        </div>
                    </div>
                    {{-- @if(!session()->has('meeting'))
                    <div class="col-12">
                        <input type="text" id="linkname" value=""
                            class="form-control" placeholder="Enter Your Name ">
                    </div>
                    @endif --}}
                    {{-- <div class="mt-2 col-12">
                        <input type="text" id="linkUrl" class="form-control"
                            value="{{url('join-meeting')}}/{{$meeting->url}}">
                    </div> --}}
                </div>
            </div>
        </div>
        @include('popup.kundli_details_popup',["meeting_id"
        =>$appointment["id"],
        "name" => $appointment["name"] ,"dob" => $appointment["dob"] , "tob" =>
        $appointment["tob"] , "place" => $appointment["place"],"type"=>
        $appointment["type"]])
        @include('popup.rating',["meeting_id" =>$appointment["id"]])
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js">
        </script>
        <script src="https://cdn.socket.io/4.7.2/socket.io.min.js"></script>
        <script src="{{asset('video/video.js')}}"></script>
       <script>
        var appointmentType = @json($appointment['type']);
    </script>
    <script>
        window.currentUserId = "{{ Auth::id() }}";
    </script>
    <script src="{{ asset('js/realtime-status.js') }}"></script>
        <script>
            let timer;
                    let seconds = '{{ $appointment["duration"] }}';
                    const userType = "{{ Auth::user()->type }}";
                    function startTimer() {
                    if (timer) return;
                    document.querySelector('.timer-container').style.display = "flex";
                    timer = setInterval(() => {
                    seconds--;
                    displayTime();
                    if (userType === 'user') {
                    saveTime(seconds);
                    }
                    }, 1000);
                    }
                   function stopTimer(callback) {
                        clearInterval(timer);
                        timer = null;
                        confirmAndLeaveCall();
                        const time = document.getElementById('timer').innerHTML;
                        @if(Auth::user()->type == 'user')
                        callback(time);
                        const offcanvasElement = document.getElementById('offcanvasBottom');
                        const offcanvasInstance = new bootstrap.Offcanvas(offcanvasElement);
                        offcanvasInstance.show();
                        @endif
                    }



                        function displayTime() {
                        const hours = Math.floor(seconds / 3600);
                        const minutes = Math.floor((seconds % 3600) / 60);
                        const remainingSeconds = seconds % 60;
                        if (seconds === 60 || seconds === 120) {
                         promptExtendCall();
                        } else if (seconds <= 0) { clearInterval(timer); const
                            url="{{ url('complete-video-call') }}" ; fetch(url, { method: 'POST' ,
                            headers: { 'Content-Type' : 'application/json' , 'X-CSRF-TOKEN' :
                            document.querySelector('meta[name="csrf-token" ]').getAttribute('content')
                            }, body: JSON.stringify({ id: '{{ $appointment["id"] }}' }), })
                            .then(response=> response.json())
                            .then(data => {
                            if (data.success) {
                            window.location.href = '/dashboard';
                            } else {
                            console.error('Failed to complete the appointment.');
                            }
                            })
                            .catch(error => {
                            console.error('Error:', error);
                            });
                            return;
                            }
                            let timeString = '';
                            if (hours > 0) {
                            timeString = `${hours}:${minutes.toString().padStart(2,
                            '0')}:${remainingSeconds.toString().padStart(2, '0')}`;
                            } else {
                            timeString = `${minutes}:${remainingSeconds.toString().padStart(2, '0')}`;
                            }
                            document.getElementById('timer').innerText = timeString;
                        }

                            function promptExtendCall() {
                            fetch("{{ route('appointments.checkWallet') }}", {
                            method: 'POST',
                            headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN':
                            document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                            },
                            body: JSON.stringify({
                            appointment_id: '{{ $appointment["id"] }}'
                            }),
                            })
                            .then(response => response.json())
                            .then(data => {
                            console.log(data);
                            if (window.authUserType === 'user') {
                            if (data.success && data.can_extend) {
                            const walletBalance = data.wallet_balance;
                            const chargePerMin = data.charge_per_min;
                            const maxMinutes = Math.floor(walletBalance / chargePerMin);
                            if (maxMinutes > 0) {
                            if (confirm(`Do you want to extend the call by ${maxMinutes} minutes?`)) {
                            seconds += maxMinutes * 60;
                            fetch("{{ route('appointments.updateDuration') }}", {
                            method: 'POST',
                            headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN':
                            document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                            },
                            body: JSON.stringify({
                            appointment_id: '{{ $appointment["id"] }}',
                            new_duration: maxMinutes
                            })
                            })
                            .then(res => res.json())
                            .then(response => {
                            if (response.success) {
                            alert(`Call successfully extended by ${maxMinutes} minutes.`);
                            } else {
                            alert("Failed to update duration on the server.");
                            }
                            });
                            }
                            } else {
                            alert("Insufficient wallet balance to extend the call.");
                            }
                            } else {
                            alert("Insufficient wallet balance to extend the call.");
                            }
                            }
                            })
                            .catch(error => {
                            console.error('Error:', error);
                            });
                            }

                        function openPopUp(){
                                document.getElementById('timer').style.color = 'red';
                                document.querySelector('#instant').style.display = "block";
                            }

                        function closePopup() {
                            document.querySelector('#instant').style.display = "none";

                        }

                    function saveTime(seconds) {
                            const url = "{{ url('save-video-time') }}";
                            fetch(url, {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                                },
                                body: JSON.stringify({
                                    time: seconds,
                                    meeting_id: '{{ $appointment["id"] }}',
                                }),
                            })
                            .then(response => response.json())
                            .then(data => {
                                isStop =  data.is_stop;
                            })
                            .catch(error => console.log('Error saving time:', error));
                        }

                        function onTimerStopped(time) {
                            const url = "{{ url('complete-video-stream') }}";
                            fetch(url, {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                                },
                                body: JSON.stringify({
                                    time: time,
                                    meeting_id: '{{ $appointment["id"] }}',
                                }),
                            })
                            .then(response => response.json())
                            .then(data => {
                                isStop =  data.is_stop;
                            })
                            .catch(error => console.log('Error saving time:', error));
                        }




        </script>
        <script>

        let lastSmallPeerPosition = { left: 10, top: 10 };
        function makeDraggable(elmnt) {
            let pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
            const parent = elmnt.parentElement;
            elmnt.style.position = "absolute";
            elmnt.onmousedown = dragMouseDown;
            function dragMouseDown(e) {
                e.preventDefault();
                pos3 = e.clientX;
                pos4 = e.clientY;
                document.onmouseup = closeMouseDrag;
                document.onmousemove = elementDrag;
            }

            function elementDrag(e) {
                e.preventDefault();
                pos1 = pos3 - e.clientX;
                pos2 = pos4 - e.clientY;
                pos3 = e.clientX;
                pos4 = e.clientY;
                applyDrag();
            }

            function closeMouseDrag() {
                document.onmouseup = null;
                document.onmousemove = null;
            }

            // Touch Events
            elmnt.addEventListener("touchstart", dragTouchStart, { passive: false });

            function dragTouchStart(e) {
                e.preventDefault();
                const touch = e.touches[0];
                pos3 = touch.clientX;
                pos4 = touch.clientY;

                document.addEventListener("touchmove", elementTouchDrag, { passive: false });
                document.addEventListener("touchend", closeTouchDrag);
            }

            function elementTouchDrag(e) {
                e.preventDefault();
                const touch = e.touches[0];
                pos1 = pos3 - touch.clientX;
                pos2 = pos4 - touch.clientY;
                pos3 = touch.clientX;
                pos4 = touch.clientY;
                applyDrag();
            }

            function closeTouchDrag() {
                document.removeEventListener("touchmove", elementTouchDrag);
                document.removeEventListener("touchend", closeTouchDrag);
            }

            function applyDrag() {
                let newLeft = elmnt.offsetLeft - pos1;
                let newTop = elmnt.offsetTop - pos2;

                const maxLeft = parent.clientWidth - elmnt.offsetWidth;
                const maxTop = parent.clientHeight - elmnt.offsetHeight;

                newLeft = Math.max(0, Math.min(newLeft, maxLeft));
                newTop = Math.max(0, Math.min(newTop, maxTop));

                elmnt.style.left = newLeft + "px";
                elmnt.style.top = newTop + "px";

                lastSmallPeerPosition.left = newLeft;
                lastSmallPeerPosition.top = newTop;

                const small = document.querySelector('.smallPeer');
                const large = document.querySelector('.leargPeer');

                if (small) {
                    small.style.left = newLeft + "px";
                    small.style.top = newTop + "px";
                }

                if (large) {
                    large.style.left = newLeft + "px";
                    large.style.top = newTop + "px";
                }
            }
        }

      function toogleClass() {
        if (appointmentType !== 'video') return;
        const small = document.querySelector(".smallPeer");
        const large = document.querySelector(".leargPeer");
        if (!small || !large) return;
        const smallLeft = small.offsetLeft;
        const smallTop = small.offsetTop;
        small.classList.remove("smallPeer");
        small.classList.add("leargPeer");
        large.classList.remove("leargPeer");
        large.classList.add("smallPeer");
        setTimeout(() => {
        const newSmallPeer = document.querySelector(".smallPeer");
        if (appointmentType === 'video') {
        makeDraggable(newSmallPeer);
        }
        }, 0);
        }

        document.addEventListener('DOMContentLoaded', function () {
            if (appointmentType === 'video') {
            const elmnt = document.querySelector('.smallPeer');
            if (elmnt) {
            makeDraggable(elmnt);
            }
            window.addEventListener('resize', () => {
            const elmnt = document.querySelector('.smallPeer');
            if (!elmnt) return;
            const parent = elmnt.parentElement;
            const maxLeft = parent.clientWidth - elmnt.offsetWidth;
            const maxTop = parent.clientHeight - elmnt.offsetHeight;
            let currentLeft = parseInt(elmnt.style.left) || 0;
            let currentTop = parseInt(elmnt.style.top) || 0;
            const newLeft = Math.max(0, Math.min(currentLeft, maxLeft));
            const newTop = Math.max(0, Math.min(currentTop, maxTop));
            elmnt.style.left = newLeft + "px";
            elmnt.style.top = newTop + "px";
            });
            }
        });
        </script>

        {{-- <script>
            document.getElementsByClassName('leavebtn')[0].addEventListener('click', function() {
                        document.getElementsByClassName('headLinks')[0].style.display = 'block';
                     });
        </script> --}}
        <script>
            window.authUserType = "{{ Auth::check() ? Auth::user()->type : '' }}";
        </script>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
        <script src="{{asset('agoraVideo/AgoraRTC_N-4.7.3.js')}}"></script>
        {{-- <script>
            var userId = "{{Auth::user()->id}}";
    var userTypes = "{{Auth::user()->type}}";
        </script> --}}

        {{-- <script src="{{asset('agoraVideo/main.js')}}"></script> --}}
        <!-- <script src="https://js.pusher.com/7.2/pusher.min.js"></script> -->
        <script src="https://js.pusher.com/8.0.1/pusher.min.js"></script>
        <script>
            function saveUserName(name) {
            var url = "{{url('saveUserName')}}"
            var random = "{{session()->get('random_user')}}";
            var urlId = $('#urlId').val();
            $.ajax({
                url: url,
                headers: {
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                },
                data: {
                    'url': urlId,
                    'name': name,
                    'random': random
                },
                type: 'post',
                success: function (result) {

                }
            })
        }

        var notificationChannel = $('#channel').val();
        var notificationEvent = $('#event').val();
        Pusher.logToConsole = true;
        var pusher = new Pusher('44c45d214d1c84fcabc9', {
            cluster: 'ap2'
        });

        var channel = pusher.subscribe(notificationChannel);
        channel.bind(notificationEvent, function (data) {
            @if (session() -> has('meeting'))
                if (confirm(data.data.title)) {
                    meetingApprove(data.data.random_user, 2);
                } else {
                    meetingApprove(data.data.random_user, 3);
                }
            @else
            if (data.data.status == 2) {
                $('#join-btn').click();
                document.getElementById('stream-controls').style.display = 'flex';
            } else if (data.data.status == 3) {
                alert('Host has been deneid your entry');
            }
            @endif
        });
        </script>

        <script>
            function copyLink() {
                var urlPage = window.location.href;
                var temp = $("<input>");
                $("body").append(temp);
                temp.val(urlPage).select();
                document.execCommand("copy");
                temp.remove();
                $('#join-btns').text('URL COPIED');
            }
           $('#join-btn2').click(function () {
            var userId = "{{Auth::user()->id}}";
            @if (session() -> has('meeting'))
            $('#join-btn').click();
            document.getElementById('stream-controls').style.display = 'flex';
            setTimeout(function () {
            fetchAgoraUserIds();
            }, 2000);
            @else
            var name = $('#linkname').val();
            joinStream(); setTimeout(function () { fetchAgoraUserIds(); }, 2000);
            @endif
            });
            function fetchAgoraUserIds() {
            let userIds = [];
            let containers = $('#video-streams .video-container');
            console.log("Total video containers found:", containers.length);
            containers.each(function (index) {
            let containerId = $(this).attr('id');
            console.log("Processing container ID:", containerId);
            let parts = containerId.split('-');
            if (parts.length === 3) {
            let userId = parts[2];
            userIds.push(userId);
            $(this).removeClass('host-video joiner-video video-box');
            $(this).addClass('video-box');
            if (index === 0) {
            console.log("→ Setting as host:", userId);
            $(this).addClass('host-video');
            } else {
            console.log("→ Setting as joiner:", userId);
            $(this).addClass('joiner-video');
            }
            } else {
            console.warn("Invalid container ID format:", containerId);
            }
            });
            console.log("✅ Active Agora user IDs:", userIds);
            $('#user-ids-output').text("Active user IDs: " + userIds.join(', '));
            setTimeout(() => {
                const newSmallPeer = document.querySelector(".smallPeer");
                makeDraggable(newSmallPeer);
            }, 0);
          }
        </script>

        <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js">
        </script>
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
        <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>

        <script>
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
        cluster: 'ap2',
        encrypted: true
        });
        var channel = pusher.subscribe('update-astrologer-timer.' + userId);
        channel.bind('appointment.timer.update', function (data) {
        console.log('Timer extended event received:', data);
        if (typeof seconds !== "undefined" && !isNaN(seconds)) {
        const addedMinutes = data.appointment.new_duration;
        const addedSeconds = addedMinutes * 60;
        seconds += addedSeconds;
        alert(`Call extended by ${addedMinutes} minutes.`);
        displayTime();
        }
        });
        });

        </script>
        <script>
            const userLeftCallRoute = "{{ route('pusher.userLeftCall') }}";
        </script>
        <script>
            function confirmAndLeaveCall() {
            if (confirm("Are you sure you want to disconnect the call?")) {
            leaveAndRemoveLocalStream();
            }
            }
            let leaveAndRemoveLocalStream = async () => {
                        try {

                            const roomId = "{{$roomId}}";
                            const userId = "{{$sender}}";
                            const remoteUserId = "{{$receiver}}";
                            await axios.post("{{ route('pusher.userLeftCall') }}", {
                                roomId: roomId,
                                leaver: userId,
                                target: remoteUserId
                            });
                            if (userType === 'user') {
                                const popup = document.getElementById('popup');
                                if (popup) popup.style.display = 'flex';
                            }
                            else if (userType === 'astrologer') {
                                window.location.href = "{{ url('/dashboard') }}";
                            }
                            console.log("✅ Call ended and notification sent to opponent.");
                        } catch (error) {
                            console.error("❌ Error while ending call:", error);
                        }
                    };
        </script>

        <script>
            document.addEventListener("DOMContentLoaded", function () {
            if (typeof toastr === "undefined") {
            console.error("Toastr.js is not loaded!");
            } else {
            console.log("Toastr.js loaded successfully!");
            }
            Pusher.logToConsole = true;
            var authId = {{ Auth::user()->id }};
            console.log('Connecting to Pusher for user:', authId);
            var pusher = new Pusher('9f973de85dd01e4ec2c4', {
            cluster: 'ap2',
            encrypted: true
            });
            var channel = pusher.subscribe('video-call.' + authId);
            channel.bind('user.left.call', function (data) {
                console.log("📴 User left the call", data);
                if (userType === 'user') {
                alert('The astrologer has ended the call.');
                }
                else if (userType === 'astrologer') {
                alert('The user has ended the call.');
                }
                setTimeout(function () {
                window.location.href = "{{ url('/dashboard') }}";
                }, 0);
            });
            });
        </script>
        <script>
            $(document).ready(function () {
                const currentUserId = "{{ Auth::id() }}";
                const socket = io("https://astro-buddy.in/", {
                auth: { id: currentUserId },
                transports: ["websocket"]
                });
                socket.on("connect", () => {
                console.log("✅ Socket connected:", socket.id);
                startChatOrCall();
                });
                socket.on("disconnect", (reason) => {
                console.log("🔴 Socket disconnected:", reason);
                endChatOrCall();
                });
                
                socket.on("gotBusy", (data) => {
                console.log("⚡ Busy status changed:", data);
                updateBusyStatus(data.userId, data.busy);
                });
                
                function setBusyStatus(isBusy) {
                socket.emit("onBusy", { id: currentUserId, busy: isBusy });
                }
                function startChatOrCall() {
                console.log("🟠 User marked busy");
                setBusyStatus(true);
                }
                function endChatOrCall() {
                console.log("🟢 User marked free");
                setBusyStatus(false);
                }
                
                function updateBusyStatus(userId, isBusy) {
                const el = document.querySelector(`[data-user-id="${userId}"]
                .user-busy-status`);
                
                if (!el) {
                console.warn("No element found for userId:", userId);
                return;
                }
                
                if (isBusy === true || isBusy === "true" || isBusy === 1) {
                console.log("Setting status to Busy for user:", userId);
                el.textContent = "⛔ Busy";
                el.style.color = "orange";
                } else {
                console.log("Setting status to Free for user:", userId);
                el.textContent = "🟢 Free";
                el.style.color = "green";
                }
                }
            });
        </script>
       
    </body>


</html>
