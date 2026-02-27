@extends('website.dashboard_master')
@section('title','Chats')
@section('content')
@include('Chatify::layouts.headLinks')
@include('popup.instant_recharge_popup',['walletInfo' =>
getBalanceAmount(),'packages' => getPackages()])
<div class="messenger">
    {{-- ----------------------Users/Groups lists side----------------------
    --}}
    <div class="messenger-listView {{ !!$id ? 'conversation-active' : '' }}">
        {{-- Header and search bar --}}
        <div class="m-header">
            <nav>
                <a href="#"><i class="fas fa-inbox"></i> Welcome </a>
                {{-- header buttons --}}
                <nav class="m-header-right">
                    <!-- <a href="#"><i class="fas fa-cog settings-btn"></i></a> -->
                    <a href="#" class="listView-x"><i
                            class="fas fa-times"></i></a>
                    <!-- <i class="fas fa-cog"></i> -->
                    <div class="timer-container"
                        style="border:2px solid #FFC206;padding:2px;border-radius: 5px;">
                        <!-- <div  onclick="stopTimer()">
                            <i class=""></i>
                        </div> -->
                        <small style="margin-left: 6px;">Chat ends</small>
                        &nbsp; @if(Auth::user()->type == 'user')<span
                            id="timer"> 00:00</span> @endif
                    </div>
                </nav>
            </nav>
            {{-- Search input --}}
            <!-- <input type="text" class="messenger-search" placeholder="Search" /> -->
            {{-- Tabs --}}
            {{-- <div class="messenger-listView-tabs">
                <a href="#" class="active-tab" data-view="users">
                    <span class="far fa-user"></span> Contacts</a>
            </div> --}}
        </div>
        {{-- tabs and lists --}}
        <div class="m-body contacts-container">
            {{-- Lists [Users/Group] --}}
            {{-- ---------------- [ User Tab ] ---------------- --}}
            <div class="show messenger-tab users-tab app-scroll"
                data-view="users">
                {{-- Favorites --}}
                <div class="favorites-section">
                    <p class="messenger-title"><span>Favorites</span></p>
                    <div class="messenger-favorites app-scroll-hidden"></div>
                </div>
                {{-- Saved Messages --}}


                {{-- Contact --}}
                <p class="messenger-title"><span>All Messages</span></p>
                <div class="listOfContacts"
                    style="width: 100%;height: calc(100% - 272px);position: relative;">
                </div>
            </div>
            {{-- ---------------- [ Search Tab ] ---------------- --}}
            <div class="messenger-tab search-tab app-scroll" data-view="search">
                {{-- items --}}
                <p class="messenger-title"><span>Search</span></p>
                <div class="search-records">
                    <p class="message-hint center-el"><span>Type to
                            search..</span></p>
                </div>
            </div>
        </div>
    </div>

    {{-- ----------------------Messaging side---------------------- --}}
    <div class="messenger-messagingView">
        {{-- header title [conversation name] amd buttons --}}
        <div class="m-header m-header-messaging">
            <nav
                class="chatify-d-flex chatify-justify-content-between chatify-align-items-center">
                {{-- header back button, avatar and user name --}}
                <div
                    class="chatify-d-flex chatify-justify-content-between chatify-align-items-center">
                    <a href="#" class="show-listView"><i
                            class="fas fa-arrow-left"></i></a>
                    <div class="avatar av-s header-avatar"
                        style="margin: 0px 10px; margin-top: -5px; margin-bottom: -5px;">
                    </div>
                    <a href="#" class="user-name">{{ config('chatify.name')
                        }}</a>
                </div>
                {{-- header buttons --}}
                <nav class="m-header-right">
                    @if(Auth::user()->type == "astrologer")
                    {{-- <span style="cursor: pointer;"><i class="fas fa-eye"
                            id="openModalBtn"></i></span> --}}
                    <span style="cursor: pointer;" id="openModalBtn"><i
                            class="fas fa-eye"></i></span>
                    @endif

                    <i class="fas fa-home" onclick="openPopUp()"></i>
                    {{-- <a href="#" class="show-infoSide"><i
                            class="fas fa-info-circle"></i></a> --}}
                    <span style="cursor: pointer;" onclick="stopTimer(true , function(e){
                         var offcanvasElement = document.getElementById('offcanvasBottom');
                        var offcanvasInstance = new bootstrap.Offcanvas(offcanvasElement);
                        offcanvasInstance.show();})"><i
                            style="color: var(--primary-color); font-size: 18px;"
                            class="fa-solid fa-xmark"></i></span>
                </nav>
            </nav>
            {{-- Internet connection --}}
            <div class="internet-connection">
                <span class="ic-connected">Connected</span>
                <span class="ic-connecting">Connecting...</span>
                <span class="ic-noInternet">No internet access</span>
            </div>
        </div>
        {{-- Messaging area --}}
        <div class="m-body messages-container app-scroll">
            <div class="messages">
                <p class="message-hint center-el"><span>Please select a chat to
                        start messaging</span></p>
            </div>
            {{-- Typing indicator --}}
            <div class="typing-indicator">
                <div class="message-card typing">
                    <div class="message">
                        <span class="typing-dots">
                            <span class="dot dot-1"></span>
                            <span class="dot dot-2"></span>
                            <span class="dot dot-3"></span>
                        </span>
                    </div>
                </div>
            </div>

        </div>
        {{-- Send Message Form --}}
        <div id="sending">
            @if($complete != 1)
            @include('Chatify::layouts.sendForm')
            @endif
        </div>
    </div>
    {{-- ---------------------- Info side ---------------------- --}}
    <div class="messenger-infoView app-scroll">
        {{-- nav actions --}}
        <nav>
            <p>User Details</p>
            <a href="#"><i class="fas fa-times"></i></a>
        </nav>
        {!! view('Chatify::layouts.info')->render() !!}
    </div>
</div>
{{-- @include('popup.kundli_details_popup',["meeting_id" => $meeting_id,
"name" => $name ,"dob" => $dob , "tob" => $tob , "place" => $place,"type"=>
$type]) --}}

@include('popup.kundli_details_popup',["meeting_id" => $meeting_id,
"name" => $name ,"dob" => $dob , "tob" => $tob , "place" => $place,"type"=>
$type])
@include('popup.rating',["meeting_id" => $meeting_id,"url" =>
url('store-rating')])
<script>
    let timer;
        let seconds = "{{ $timer }}";
        let amount = "{{ $amount }}";
        let isStop;
        const userType = "{{ Auth::user()->type }}";
        // console.log(amount);
        if(userType == 'user'){
            function startTimer() {
                document.querySelector('.timer-container').style.display="flex";
                timer = setInterval(() => {
                    if (isStop == 0) {
                            seconds--;
                        }
                    displayTime();
                    saveTime(seconds);
                }, 1000);
            }
        }

        async function stopTimer(showConfirmation,callback) {
            var end = true; // default to true
            if (showConfirmation) {
                end = confirm('Are you sure to Leave Chat Session');
            }
           if(end){
            clearInterval(timer);
            var pathName = window.location.pathname;
            var param = pathName.split('/').pop();
            await startChat(param);
            await callback(end)
           }
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
                    action : "1",
                    complete:"1",

                }),
            })
            .then(response => response.json())
            .then(data => {
              return;
            })
            .catch(error => console.log('Error saving time:', error));
        }

        function displayTime() {
            const minutes = Math.floor(seconds / 60);
            const remainingSeconds = seconds % 60;


            if (seconds == 120 || seconds == 60) {
                if (userType === 'user') {
                    getUserTypeAndRun()
                }
            }else if(seconds == 0){
                if (userType === 'user') {
                    stopTimer(false,function(seconds){
                         var offcanvasElement = document.getElementById('offcanvasBottom');
                        var offcanvasInstance = new bootstrap.Offcanvas(offcanvasElement);
                        offcanvasInstance.show();
                    });
                }
            }

            document.getElementById('timer').innerText = `${minutes}:${remainingSeconds.toString().padStart(2, '0')}`;
        }

        displayTime();
        startTimer();

        async function decreaseAmount(userId) {
        const url = "{{ url('decresed-amount') }}";
            try {
            const response = await fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                body: JSON.stringify({
                    user_id: userId,
                }),
            });

            if (!response.ok) {
                throw new Error('Network response was not ok');
            }

                const data = await response.json();
                return data;

            } catch (error) {
                console.error('Error:', error);
                return null;
            }
        }


        function saveTime(seconds) {
            const url = "{{ url('save-chat-time') }}";
            fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                body: JSON.stringify({
                    time: seconds,
                    meeting_id: '{{ $meeting_id }}',
                }),
            })
            .then(response => response.json())
            .then(data => {
                isStop =  data.is_stop;
            })
            .catch(error => console.log('Error saving time:', error));
        }

        function openPopUp(){
            document.getElementById('timer').style.color = 'red';
            document.querySelector('#instant').style.display = "block";
        }

        function closePopup() {
            document.querySelector('#instant').style.display = "none";

        }
        async function getUserTypeAndRun() {
                openPopUp();
        }

        async function loadPopup(openKundliPopup) {
        let params = new URLSearchParams({
            meeting_id: '{{ $meeting_id }}',
            name: '{{ $name }}',
            dob: '{{ $dob }}',
            tob: '{{ $tob }}',
            place: '{{ $place }}',
            type: '{{ $type }}'
        });

        await fetch(`{{ route("load.kundli_popup") }}?${params.toString()}`)
            .then(response => response.text())
            .then(data => {
                document.getElementById("popupContent").innerHTML = data;
                openKundliPopup();
            })
            .catch(error => console.error('Error:', error));
        }

        function openKundliPopup(){
            document.getElementById('kundaliModal').style.display = 'block';
        }

        function closeKundliPopup() {
            document.getElementById('kundaliModal').style.display = 'none';

        }

</script>

@include('Chatify::layouts.modals')
@include('Chatify::layouts.footerLinks')
@endsection
