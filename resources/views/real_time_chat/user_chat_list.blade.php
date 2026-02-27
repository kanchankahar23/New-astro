@extends('website.dashboard_master')
@section('title','Scheduled Chats')
@section('content')
<head>
    <style>
        .jobbox-grid-item {
            border-radius: 8px;
            border: 1px solid #E0E6F7;
            overflow: hidden;
            height: 100%;
            position: relative;
            background: #ffffff;
            padding-right: 7px;
            padding-left: 7px;
            padding-top: 7px;
            border-radius: 15px;
        }

        .astrouppercards {
            width: 100%;
            height: 100px;
            border-radius: 10px;
            background: linear-gradient(-13deg, rgb(19 31 88), rgb(42 209 109));
            position: relative;
            display: flex;
            align-items: center;
            justify-content: end;
        }

        .upperbox2 {
            width: 100%;
            height: 100px;
            border-radius: 10px;
            background: linear-gradient(-13deg, rgb(2 21 76), rgb(221 173 64));
            position: relative;
            display: flex;
            align-items: center;
            justify-content: end;
        }

        .upperbox2 h2 {
            color: white !important;
            font-size: 15px;
            width: 70%;
            margin-right: 0;
            text-transform: uppercase;
        }

        .circle2 {
            background-color: #353949;
            width: 15px;
            height: 15px;
            border-radius: 50%;
            position: absolute;
            bottom: 0%;
            right: 0;
            z-index: 1000;
        }

        .chataap2 {
            width: 45%;
            display: flex;
            align-items: center;
            justify-content: end;
        }

        .chataap2 button {
            background: #353949;
            width: 83px;
            height: 25px;
            color: white;
            font-size: 14px;
            border: none;
            border-radius: 13px;
            font-weight: 500;
        }

        .upperbox3 {
            width: 100%;
            height: 100px;
            border-radius: 10px;
            background: linear-gradient(-13deg, rgb(22 19 15), rgb(227 20 20));
            position: relative;
            display: flex;
            align-items: center;
            justify-content: end;
        }

        .upperbox3 h2 {
            color: white !important;
            font-size: 15px;
            width: 70%;
            margin-right: 0;
            text-transform: uppercase;
        }

        .circle3 {
            background-color: #681311;
            width: 15px;
            height: 15px;
            border-radius: 50%;
            position: absolute;
            bottom: 0%;
            right: 0;
            z-index: 1000;
        }

        .chataap3 {
            width: 45%;
            display: flex;
            align-items: center;
            justify-content: end;
        }

        .chataap3 button {
            background: #681311;
            width: 83px;
            height: 25px;
            color: white;
            font-size: 14px;
            border: none;
            border-radius: 13px;
            font-weight: 500;
        }

        .upperbox4 {
            width: 100%;
            height: 100px;
            border-radius: 10px;
            background: linear-gradient(-13deg, rgb(8 8 8), rgb(32 163 213));
            position: relative;
            display: flex;
            align-items: center;
            justify-content: end;
        }

        .upperbox4 h2 {
            color: white !important;
            font-size: 15px;
            width: 70%;
            margin-right: 0;
            text-transform: uppercase;
        }

        .circle4 {
            background-color: #14526a;
            width: 15px;
            height: 15px;
            border-radius: 50%;
            position: absolute;
            bottom: 0%;
            right: 0;
            z-index: 1000;
        }

        .chataap4 {
            width: 45%;
            display: flex;
            align-items: center;
            justify-content: end;
        }

        .chataap4 button {
            background: #14526a;
            width: 83px;
            height: 25px;
            color: white;
            font-size: 14px;
            border: none;
            border-radius: 13px;
            font-weight: 500;
        }

        .profilebox {
            position: absolute;
            bottom: -31%;
            left: 10%;
            width: 70px;
            height: 70px;
            border-radius: 50%;
            /* overflow: hidden; */
            border: 3px solid white;
        }

        .profilebox img {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
        }

        .astrouppercards h2 {
            color: white !important;
            font-size: 15px;
            width: 70%;
            margin-right: 0;
            text-transform: uppercase;
        }

        .lowerbox {
            margin-top: -13px !important;
            ;
            width: 100%;
            display: flex;
            flex-direction: column;
        }

        .astroname {
            margin-top: 25px !important;
            margin: 0 auto;
            width: 90%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .name {
            width: 70%;
            display: flex;
            align-items: center;
            justify-content: start;
        }

        .name h3 {
            font-size: 15px;
            margin-bottom: 0;
        }

        .chataap {
            width: 30%;
            display: flex;
            align-items: center;
            justify-content: end;
        }

        .circle {
            background-color: #1a585f;
            width: 15px;
            height: 15px;
            border-radius: 50%;
            position: absolute;
            bottom: 0%;
            right: 0;
            z-index: 1000;
        }

        .chataap button {
            background: #1a585f;
            width: 83px;
            height: 25px;
            color: white;
            font-size: 14px;
            border: none;
            border-radius: 13px;
            font-weight: 500;
        }

        .description {
            width: 100%;
        }

        .description p {
            width: 90%;
            margin: 5px auto;
            text-align: left;
            font-size: 14px;
        }

        .description p span {
            font-weight: 500;
        }

        .minstar {
            width: 90%;
            margin: 0 auto;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .rate-reviews-small {
            width: 50%;
            display: flex;
            align-items: center;
            justify-content: start;
        }

        .minutes {
            width: 50%;
            display: flex;
            align-items: center;
            padding-right: 12px;
            justify-content: end;
        }

        .minutes p {
            margin: 0 0;
            font-size: 14px;
            font-weight: 600;
        }

        .starnumber {
            font-size: 14px;
            font-weight: 600;
            margin-left: 5px;
        }

        .searchastro {
            width: 90%;
            display: flex;
            align-items: center;
            justify-content: start;
            margin: 10px auto;
            margin-bottom: 25px;
        }

        .headingastro {
            width: 50%;
            display: flex;
            align-items: center;
            justify-content: start;
            margin-right: 15px;
            box-shadow: 0 0 3px -2px #a3a3a3;
            color: #323246 !important;
            border: 1px solid #d1d2d5;
        }

        .headingastro h3 {
            font-size: 19px;
            font-weight: 500;
            width: 50%;
            color: #323246 !important;
            border-radius: 5px;
            height: 45px;
            display: flex;
            align-items: center;
            margin: 0 0;
            padding-left: 7%;
        }

        .headingastro2 {
            display: flex;
            align-items: center;
            justify-content: start;
            width: 50%;
        }

        .headingastro2 p {
            font-size: 15px;
            font-weight: 500;
            width: 100%;
            border-radius: 5px;
            margin: 0 auto;
            height: 45px;
            color: #323246 !important;
            display: flex;
            align-items: center;
            margin: 0 0;
            padding-left: 5%;
        }

        .headingastro2 p span {
            font-weight: 500;
            font-size: 15px;
            margin-right: 5px;
        }

        .mysearchastro {
            width: 50%;
            display: flex;
            align-items: center;
            justify-content: end;
        }

        .mysearchastro input {
            width: 55%;
            border: 1px solid #c1c1c5;
            height: 38px;
            padding-left: 20px;
            font-size: 16px;
        }

        .mysearchastro button {
            height: 38px;
            border: none;
            background: #ffcd3a;
            width: 41px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #010101;
            transition: all 400ms ease-in-out;
        }

        .mysearchastro button:hover {
            background: #20252c;
            color: white !important;
        }

        .rate-reviews-small {
            width: 50%;
            display: flex;
            align-items: center;
            justify-content: end;
        }
        /* Astrologers css end  */
    </style>
</head>
<div class="container d-flex"
    style="flex-wrap: wrap;justify-content: center;background-color: white;border-radius: 5px;">
    @if($chats->count()<= 0) <h4>NO CHATS FOUND</h4>
        @endif
        @foreach ($chats as $chat)
        <div class="col-xl-4 col-lg-4 col-md-6 jobbox-grid-item">
            <div class="lowerbox">
                <div class="astroname">
                    <div class="name">
                        <h3> <img src="{{asset($chat->userDetails->avtar)}}"
                                alt="" width="25%" style="border-radius: 50%;">
                            {{ ucwords($chat->name ?? '') }}</h3>
                    </div>
                    <div class="chataap">
                        <button type="button"
                            onclick="gotoChat('{{ $chat->user_id }}')"
                            style="margin-left: 15px;">Chat</button>
                    </div>
                </div>
                <div class="description ">
                    <p><span style="margin-right: 4px;"><i
                                class="fa fa-calendar"></i></span> {{
                        \Carbon\Carbon::parse($chat->dob ?? '')->format('d M y')
                        }}
                        <span style="margin-left: 70px; margin-right: px;"><i
                                class="fa fa-clock"></i></span> {{
                        \Carbon\Carbon::parse($chat->tob ?? '')->format('g:i A')
                        }}
                    </p>
                    <p style="position: relative;"><span><i
                                class="fa-solid fa-location"></i></span>
                        Jabalpur <span style="position: absolute;
                right: 2%;;"><span><i class="fa-solid fa-mars-and-venus"></i>
                            </span>{{ ucwords($chat->gender ?? '') }}</span>

                    </p>

                </div>
                <div class="mt-2 minstar" style="flex-direction: row-reverse;">
                    <div class="pt-1 rate-reviews-small">
                        <img alt="Star"
                            src="https://jthemes.com/themes/wp/jobbox/wp-content/themes/jobbox/assets/imgs/template/icons/star.svg"><span
                            class="ml-10 font-xs color-text-mutted"><span></span><span
                                class="starnumber">{{ $chat->wallet ?? ''
                                }}</span> &nbsp;<i
                                class="fa fa-indian-rupee-sign"></i><span></span></span>
                    </div>

                    <div class="minutes" style="position: relative;">
                        <p class="lowerment"
                            style="position: absolute; right: 8.5%;"
                            onclick="scheduleAstrologer(11)">View Details</p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        {{ $chats->links() }}
</div>
<script>
    function gotoChat(id){
        startChat(id);
       window.open("{{ url('real-time-chat') }}" +"/" + id,"_blank");
    }

    function startChat(id) {
            const url = "{{ url('start-chat-time') }}";
            fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                body: JSON.stringify({
                    meeting_id: id,
                    action : "0",
                    complete:"0",
                }),
            })
            .then(response => response.json())
            .then(data => {
              return;
            })
            .catch(error => console.log('Error saving time:', error));
        }
</script>


<script>
    // Enable Pusher logging - don't include this in production




</script>
@endsection
