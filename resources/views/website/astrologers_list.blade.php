@extends('website.dashboard_master')
@section('title','Appointments')
@section('content')

<head>
    <style>
        .circle {
        right: -53px !important;
        }
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

        .circle {
            width: auto;
            height: 12px;
            border-radius: 14%;
            position: absolute;
            bottom: 0%;
            right: -34px;
            z-index: 1000;
            font-size: xx-small;
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
            margin-top: 0px 0;
            width: 100%;
            display: flex;
            flex-direction: column;
        }

        .astroname {
            margin-top: 40px !important;
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

        /* .circle {
            background-color: #1a585f;
            width: 15px;
            height: 15px;
            border-radius: 50%;
            position: absolute;
            bottom: 0%;
            right: 0;
            z-index: 1000;
        } */

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
            justify-content: start;
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
            background: white;
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
<section class="upastrocard">
    <div class="container" style="max-width: 93%; margin-top: -10px;">
        <div class="searchastro">
            <div class="headingastro">
                <h3>Chat with Astrologers</h3><i
                    class="fa-solid fa-arrow-right"></i>
                <div class="headingastro2">
                    @if(Auth::check())
                    @php
                    $walletInfo = Auth::user()->getWalletInfo->sum('credits');
                    @endphp
                    @endif
                    <p><span>Available Balance :</span> <i
                            class="fa-solid fa-indian-rupee-sign" style="color: rgb(0, 0, 0);
            margin-right: 4px;
            font-size: 16px;
            font-weight: 600; opacity: 0.8;" aria-hidden="true"></i>{{
                        getWalletAmount() }}</p>
                </div>
            </div>

            <div class="mysearchastro">
                <input type="search" id="search"
                    placeholder="Search Astrologer by name, mobile, Email"
                    onkeyup="search()">
                <button><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
        </div>
        <style>
            .label {
                rotate: -36deg;
                position: absolute;
                left: -9%;
                top: 8%;
                rotate: 10de;
                align-items: center;
                justify-content: center;
                display: flex;
                height: 22px;
                width: 118px;
                background: #1b1e29;
            }

            .PremiumCards {
                width: 90%;
                margin: 35px auto;
                text-align: center;
                font-size: 0.7rem;
                color: white !important;
            }

            .upperbox4 {
                position: relative;
            }
        </style>
        <div class="row g-4"
            style="display: flex; align-items: center; justify-content: center; margin-top: 20px;"
            id="results">
            @php
            $userIds = [];
            @endphp
            @foreach($astrologers as $key => $astrologer)
            <div class="col-xl-4 col-lg-4 col-md-6 jobbox-grid-item">
                <div class=" {{ $key % 2 == 0 ? (rand(1, 3) == 3 ? 'astrouppercards' : 'upperbox4') : (rand(2, 4) == 4 ? 'upperbox2' : 'upperbox3') }}
                ">
                
                @if(!empty($astrologer->astrologerDetail->getTag->name))
                <div class="label" style="background:{{ $astrologer->astrologerDetail->getTag->color ?? 'rgb(121, 24, 120)' }}">
                    <h3 class="PremiumCards">{{
                    $astrologer->astrologerDetail->getTag->name ?? '' }}</h3>
                </div>
                @endif

                    <h2>
                        <marquee behavior="" direction="">{{
                            $astrologer->astrologerDetail->expertise ?? "Vedic ,
                            Numerology" }}</marquee>
                    </h2>
                    <div class="profilebox">
                        <img src="{{ asset($astrologer->avtar) ?? '' }}" alt="">
                         <span
                            class="badge badge-dark circle" id="user-{{ $astrologer->id }}-status" > Checking...
                        </span>
                        {{--  @if ($astrologer->last_seen >= now()->subMinutes(2) && $astrologer->active_status == 1)
                        <span
                            class="badge badge-success circle" id="user-{{ $astrologer->id }}-status" >
                            Online
                        </span>
                        @elseif ($astrologer->active_status == 2)
                            <span class="badge badge-warning circle">
                                Busy</span>
                        @else
                            <span class="badge badge-danger circle">
                                Offline</span>
                        @endif  --}}
                        
                    </div>

                </div>

                <div class="lowerbox">
                    <div class="astroname">
                        <div class="name">
                            <h3>{{ $astrologer->name ?? '' }}</h3>
                        </div>
                        <div class="chataap">
                            <button
                                onclick="gotoChat({{ $astrologer->id }})">Chat</button>
                        </div>
                    </div>
                    <div class="description">
                        <p><span>Language :</span>{{
                            $astrologer->astrologerDetail->language ?? ' Hindi,
                            English '}}</p>
                        <p style="position: relative;"><span>Experience :</span>
                            {{ $astrologer->astrologerDetail->total_experience
                            ?? ' 0 '}} Years <span style="position: absolute;
                            right: 2%;;"><Span><i
                                        class="fa-solid fa-indian-rupee-sign"
                                        style="color: rgb(0, 0, 0);
                                margin-right: 0px; font-size: 14px; font-weight: 600; opacity: 0.8;"
                                        aria-hidden="true"></i> {{
                                    $astrologer->astrologerDetail->charge_per_min
                                    ?? ' 0 '}}/</Span>min</span>

                        </p>
                    </div>
                    <div class="mt-2 minstar"
                        style="flex-direction: row-reverse;">
                        {{--  <div class="pt-1 rate-reviews-small">
                            @for($i=1 ; $i<= (int)$astrologer->
                                astrologerDetail->rating ;$i++)
                                <img style="width:25px;" alt="Star" src="{{ url('assets/images/star.png') }}">
                                @endfor
                                <span
                                    class="ml-10 font-xs color-text-mutted"><span></span><span
                                        class="starnumber">({{
                                        $astrologer->astrologerDetail->rating_count
                                        ?? ' 0 '}})</span><span></span></span>
                        </div>  --}}

                        <div class="minutes" style="position: relative;">
                            {{-- <p class="lowerment"
                                onclick="scheduleAstrologer({{ $astrologer->id }})">
                                Appointment</p> --}}
                            <p class="lowerment" style="background: #00513c;"><a style="color: white;"
                                    href="{{ url('astro-appointment', $astrologer->id ) }}">Appointment</a>
                            </p>
                        </div>
                        <div class="minutes" style="position: relative;">
                            {{-- <p class="lowerment"
                                onclick="scheduleAstrologer({{ $astrologer->id }})">
                                Appointment</p> --}}
                            <p class="lowerment" style="background:#112d63;"><a style="color: white;"
                                    href="{{ url('transaction-history', $astrologer->id ) }}">Transactions</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            {{ $astrologers->links() }}

        </div>
    </div>
</section>
@include('popup.kundli_popup');

</div>

<script>
    function search() {
        let query = $('#search').val();

        $.ajax({
            url: "{{ url('search') }}",
            type: "GET",
            data: { query: query },
            success: function (data) {
                console.log(data);
                $('#results').empty();
                for(result of data){
                $('#results').append(`
    <div class="col-xl-4 col-lg-4 col-md-6 jobbox-grid-item">
        <div class="${result.id % 2 === 0 ? (Math.floor(Math.random() * 3) + 1 === 3 ? 'astrouppercards' : 'upperbox4') : (Math.floor(Math.random() * 3) + 2 === 4 ? 'upperbox2' : 'upperbox3')}">
            <h2><marquee>Vedic / Numerology</marquee></h2>
            <div class="profilebox">
                <img src="${result.avtar ? result.avtar : ''}" alt="">
               ${result.active_status ? `
                    <span class="badge ${result.is_active.status === 'busy' ? 'badge-warning' : 'badge-success'} circle">
                        ${result.is_active.status === 'busy' ? 'Busy' : 'Online'}
                    </span>
                ` : `
                    <span class="badge badge-danger circle">Offline</span>
                `}

            </div>
        </div>
        <div class="lowerbox">
            <div class="astroname">
                <div class="name">
                    <h3>${result.name ? result.name : ''}</h3>
                </div>
                <div class="chataap">
                    <button onclick="gotoChat(${result.id})">Chat</button>
                </div>
            </div>
            <div class="description">
                <p><span>Language :</span> Hindi, English</p>
                <p style="position: relative;">
                    <span>Experience :</span> 3 Years
                    <span style="position: absolute; right: 2%;">
                        <span>
                            <i class="fa-solid fa-indian-rupee-sign" style="color: rgb(0, 0, 0); margin-right: 0px; font-size: 14px; font-weight: 600; opacity: 0.8;" aria-hidden="true"></i> ${result.astrologer_detail.charge_per_min}/
                        </span>min
                    </span>
                </p>
            </div>
            <div class="mt-2 minstar" style="flex-direction: row-reverse;">
                <div class="pt-1 rate-reviews-small">
                    <img alt="Star" src="https://jthemes.com/themes/wp/jobbox/wp-content/themes/jobbox/assets/imgs/template/icons/star.svg">
                    <img alt="Star" src="https://jthemes.com/themes/wp/jobbox/wp-content/themes/jobbox/assets/imgs/template/icons/star.svg">
                    <img alt="Star" src="https://jthemes.com/themes/wp/jobbox/wp-content/themes/jobbox/assets/imgs/template/icons/star.svg">
                    <img alt="Star" src="https://jthemes.com/themes/wp/jobbox/wp-content/themes/jobbox/assets/imgs/template/icons/star.svg">
                    <img alt="Star" src="https://jthemes.com/themes/wp/jobbox/wp-content/themes/jobbox/assets/imgs/template/icons/star.svg">
                    <span class="ml-10 font-xs color-text-mutted">
                        <span></span>
                        <span class="starnumber">(${result.astrologer_detail.rating_count})</span>
                        <span></span>
                    </span>
                </div>
                <div class="minutes" style="position: relative;">
                    <p class="lowerment"  onclick="scheduleAstrologer(${result.id})">Appointment</p>
                </div>
            </div>
        </div>
    </div>
`);}

            }

        });
    }

    function assignId(id) {
        var form = document.querySelector('#appointmentForm');
        var url = "{{ url('/goto-chat') }}" +"/" +id;;
        form.action = url;
    }

    function gotoChat(id) {
        assignId(id)
        openModal();
        // window.location.href = "{{ url('/goto-chat') }}" +"/" +id;
        // sessionStorage.setItem('astroChatId',id);
    }

    function scheduleAstrologer(id){
        window.location.href = "{{ url('/schedule') }}"+ "/" + id;
    }



</script>

{{--  <script src="https://cdn.socket.io/4.7.2/socket.io.min.js"></script>
<script>
    const userIds = @json($userIds);
    const currentUserId = "{{ Auth::id() }}"; 
    const socket = io('https://astro-buddy.in/', {
        auth: { id: currentUserId } 
    });
    socket.on("connect", () => {
        console.log("✅ Socket connected:", socket.id);
        checkOnlineStatus(); // initial online check
    });
    socket.on("gotOnline", (data) => {
        console.log("⚡ User status changed:", data);
        const el = document.getElementById(`user-${data.userId}-status`);
        if (el) {
            el.textContent = data.online ? "🟢 Online" : "🔴 Offline";
            el.style.color = data.online ? "green" : "red";
        }
    });
    function checkOnlineStatus() {
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
    }
</script>  --}}
@endsection
