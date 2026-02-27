@extends('website.dashboard_master')
@section('title', 'Chat')
@section('content')
@include('popup.instant_recharge_popup',['walletInfo' =>
getBalanceAmount(),'packages' => getPackages()])
<style>
    @media screen and (max-width: 500px) {
    .nextmod {
    margin: 0 !important;
    width: 100% !important;
    }

    .midmodd-two{
    margin: 0 !important;
    width: 100% !important;
    }
    .card span {
    color: white !important;
    font-size: 0.7rem !important;
    }
    }
    #sendMessage
    {
    display: flex;
    align-items: baseline;
    justify-content: center;
    }

    .nameastro {
    width: 100%;
    margin: 4px auto;
    display: flex;
    align-items: center;
    justify-content: center;
    }
</style>
<met name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="{{ url('/') }}/website/plugins/astro-appointment/assets/css/chatApp.css">
<div class="body-wrapper"
    style="margin-top: 0; margin-right: 0;margin-left: 0;border: 1px solid #e7e7e7;">
    <div class="card overflow-hidden chat-application">
        <div class="premodal" role="document">
            <div class="nextmod">
                <div class="midmodd-two">
                    <div class="lowmodd" id="login_section">
                        <div class="nameastro">
                            <div class="finalPanditImage">
                                @if(isset($receiverUser->avtar))
                                <img src="{{asset(($receiverUser->avtar)) }}"
                                    alt="user1">
                                @else
                                <img src="{{ url('/') }}/assets/header/pandit2.jpg"
                                    alt="">
                                @endif
                            </div>
                            <div class="astrologinn">
                                <h3> {{ $receiverUser->name }} <i
                                        class="fa-solid fa-circle-check"
                                        aria-hidden="true"></i></h3>
                                <p id="typingIndicator">  </p>
                          
                            </div>
                            @if(Auth::user()->type == 'user')
                                <div class="starttimer">
                                    <div class="timerDisplay2 timer-container">@if(Auth::user()->type ==
                                        'user')<span id="timer"> 00:00</span> @endif</div>
                                </div>
                            @elseif (Auth::user()->type == 'astrologer')
                                <div class="starttimer" style="cursor: pointer;" id="openModalBtn">
                                    <div class="timerDisplay2 timer-container"><span >Kundli</span></div>
                                </div>
                            @endif

                            {{--  <div class="backbutton">
                                <button>Back</button>
                            </div>  --}}
                            <div class="backbutton" style="position: inherit;">
                                @php
                                $UserType = Auth::user()->type ?? 'user';
                                @endphp
                                <button class="textBack" style="cursor: pointer;" onclick="stopTimer(true, function(e) {
                                                                    console.log('Timer stopped');
                                                                }, '{{ $UserType }}')">
                                    Back
                                </button>
                                <button class="xmarkButton" style="cursor: pointer;" onclick="stopTimer(true, function(e) {
                                                                    console.log('Timer stopped');}, '{{ $UserType }}')"><i class="fa-solid fa-xmark" style="color: white;"></i></button>
                            </div>
                        </div>
                        <div class="chat-container">
                            <div class="chat-box" id="chatList">
                                @foreach ($messageResponse as $indax =>
                                $message)
                                @if ($message['sender'] != Auth::user()->id)

                                <div class="message admin">
                                    <div class="admincontent"
                                        style="width: max-content">
                                        <div class="adminsendImage">

                                            <div class="inneradminbox">
                                                <div class="adminimg">
                                                    @if(isset($receiverUser->avtar))
                                                    <img src="{{ asset($receiverUser->avtar()) }}"
                                                        alt="user1">
                                                    @else
                                                    <img src="{{ url('/') }}/assets/header/pandit2.jpg"
                                                        alt="">
                                                    @endif
                                                </div>
                                                <div class="text panditclass">
                                                    @if(!empty($message['message']))
                                                    {{ $message['message'] }}
                                                    @endif
                                                    @if(isset($message['image']))
                                                    <a href="https://astro-buddy.in{{ $message['image'] }}" target="_blank">
                                                        <img src="https://astro-buddy.in{{ $message['image'] }}" alt="Image"
                                                            class="mt-2 rounded-1" width="100">
                                                    </a>
                                                    @endif
                                                </div>
                                            </div>

                                        </div>
                                        <div class='nameOfRishi'>
                                            {{ $receiverUser->name }}
                                            <span>{{
                                                Carbon\Carbon::parse($message['created_at'])->format('h:i
                                                A') }}</span>
                                        </div>
                                    </div>
                                </div>
                                @elseif($message['sender'] ==
                                Auth::user()->id)
                                <div class="message user">
                                    <div class="usercontent"
                                        style="width: max-content">
                                        <div class="innerUserBox">
                                            <div class="adminimg">
                                                @if(isset(Auth::user()->avtar))
                                                <img src="{{asset(Auth::user()->avtar()) }}"
                                                    alt="user1">
                                                @else
                                                <img src="../real_time_chat/assets/images/profile/user-3.jpg"
                                                    alt="user1">
                                                @endif
                                            </div>
                                            <div class="text userSide">
                                                @if(!empty($message['message']))
                                                {{ $message['message'] }}
                                                @endif
                                                @if(isset($message['image']))
                                                <a href="https://astro-buddy.in{{ $message['image'] }}" target="_blank">
                                                    <img src="https://astro-buddy.in{{ $message['image'] }}" alt="Image"
                                                        class="mt-2 rounded-1" width="100">
                                                </a>

                                                @endif
                                            </div>
                                        </div>
                                        <div class='msgofUserName'
                                            style="margin-top: 2%;">
                                            <p><i
                                                    class="fa-solid fa-check-double"></i>
                                            </p><span>{{
                                                Carbon\Carbon::parse($message['created_at'])->format('h:i
                                                A') }}</span>
                                            You
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                            @if($chatMeeting->is_complete != 1)
                                <div class="input-box">
                                    <input type="text" id="messageInput" placeholder="Type your message..."
                                        class="message-input">
                                    <label for="image" class="upload-icon">
                                        <i class="fa-solid fa-upload"></i>
                                    </label>
                                    <input type="file" id="image" accept=".jpg, .jpeg, .png" class="file-input"
                                        style="display: none;">
                                    <button id="sendMessage"><i class="fa-solid fa-paper-plane"></i></button>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('popup.kundli_details_popup',["meeting_id" => $meeting_id,
"name" => $name ,"dob" => $dob , "tob" => $tob , "place" => $place,"type"=>$type])
        @include('popup.rating',["meeting_id" => $meeting_id,"url" =>
        url('store-rating')])
    </div>
</div>
<script>
    let timer;
        let seconds = "{{ $timer }}";
        let amount = "{{ $amount }}";
        let isStop;
        const UserType = "{{ Auth::user()->type }}";
        // console.log(amount);
        if(UserType == 'user'){
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

        async function stopTimer(showConfirmation, callback, UserType) {
        var end = true; // Default to true
        if (showConfirmation) {
        end = confirm('Are you sure to Leave Chat Session');
        }
        if (end) {
        clearInterval(timer);
        var pathName = window.location.pathname;
        var param = pathName.split('/').pop();
        await startChat(param);
        await callback(end);
        if (UserType === 'user') {
        window.location.href = "/chat-list";
        } else if (UserType === 'astrologer') {
        window.location.href = "/chats";
     }
        }
     }

        async function startChat(id) {
        const url = "{{ url('start-chat-time') }}";

        console.log("Starting chat for meeting ID:", id);

        try {
        const response = await fetch(url, {
        method: 'POST',
        headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
        body: JSON.stringify({
        meeting_id: id,
        action: "1",
        complete: "1",
        }),
        });

        if (!response.ok) {
        throw new Error(`HTTP error! Status: ${response.status}`);
        }

        const data = await response.json();
        console.log("Response from startChat:", data);
        return data;
        } catch (error) {
        console.error("Error in startChat:", error);
        }
        }

        function displayTime() {
            const minutes = Math.floor(seconds / 60);
            const remainingSeconds = seconds % 60;


            if (seconds == 120 || seconds == 60) {
                if (UserType === 'user') {
                    getUserTypeAndRun()
                }
            }else if(seconds == 0){
                if (UserType === 'user') {
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
<script src="https://cdn.socket.io/4.0.1/socket.io.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.socket.io/4.0.0/socket.io.min.js"></script>

    {{--  <script>
        const backbutton = document.querySelector('.backbutton')
    const premodal = document.querySelector('.premodal')
    backbutton.addEventListener('click', ()=>{
        premodal.style.display='none';
    })
    </script>  --}}
    <script>
        $(document).ready(function () {
       // let socket = io("https://astro-buddy.in/");
       const currentUserId = "{{ Auth::id() }}";
       let senderId = "{{ Auth::user()->id }}";
        let receiverId = "{{ $receiver }}";
        const socket = io("https://astro-buddy.in/", {
        auth: { id: currentUserId },
        transports: ["websocket"]
        });
      
        socket.on("connect", () => {
        console.log("✅ Socket connected:", socket.id);
        socket.emit("joinRoom", { sender: currentUserId, receiver: receiverId });
        emitOnWindow(true);
        });
        
      {{--  function emitOnWindow(isActive) {
    socket.emit(isActive ? "window" : "offWindow", {
    sender: currentUserId,
    receiver: receiverId,
    },(data) => {
    console.log("Acknowledgment from server:", data);
    });  --}}
        function emitOnWindow(isActive) {
        socket.emit(isActive ? "onWindow" : "offWindow", {
        sender: currentUserId,
        receiver: receiverId,
        });
        console.log(isActive ? "🟢 onWindow sent" : "🔴 offWindow sent");
        setBusyStatus(isActive); 
        }
        
        $(window).on("beforeunload", () => emitOnWindow(false));
        $(window).on("blur", () => emitOnWindow(false));
        $(window).on("focus", () => emitOnWindow(true));
        
        const backBtn = document.querySelector(".textBack");
        const closeBtn = document.querySelector(".xmarkButton");
        [backBtn, closeBtn].forEach((btn) => {
        if (btn) {
        btn.addEventListener("click", function () {
        emitOnWindow(false);
        });
        }
        });
        
        function setBusyStatus(isBusy) {
        socket.emit("onBusy", { id: currentUserId, busy: isBusy });
        console.log(isBusy ? "🟠 User busy (in chat)" : "🟢 User free");
        }
       
         socket.on("gotBusy", (data) => {
        console.log("⚡ Busy status changed:", data);
       
        updateBusyStatus(data.userId, data.busy);
    });
       
       
        function updateBusyStatus(userId, isBusy) {
        const el = document.querySelector(`[data-user-id="${userId}"]
        .user-busy-status`);
        if (!el) return;
        if (isBusy) {
        el.textContent = "⛔ Busy";
        el.style.color = "orange";
        } else {
        el.textContent = "🟢 Free";
        el.style.color = "green";
        }
        }
        

     
        let typingTimer;
        let typingTimeout = 2000;

        socket.emit("joinRoom", { sender: senderId, receiver: receiverId });

        function scrollToBottom() {
        let chatBox = $("#chatList");
        chatBox.scrollTop(chatBox[0].scrollHeight);
        }

        scrollToBottom();

        $("#messageInput").on("input", function () {
        socket.emit("userTyping", { sender: senderId, receiver: receiverId });
        clearTimeout(typingTimer);
        typingTimer = setTimeout(() => {
        socket.emit("stopTyping", { sender: senderId, receiver: receiverId });
        }, typingTimeout);
        });

        socket.on("userTyping", function (data) {
        if (data.sender === receiverId) {
        $("#typingIndicator").text("Typing...");
        clearTimeout(typingTimer);
        typingTimer = setTimeout(() => {
        $("#typingIndicator").text("");
        }, typingTimeout);
        }
        });

        socket.on("userTyping", function (data) {
        if (data.sender === receiverId) {
        $("#typingIndicator").text("");
        }
        });
        $("#sendMessage").click(function () {
        let message = $("#messageInput").val().trim();
        let imageInput = $("#image")[0].files[0];
        if (!message && !imageInput) return;
        let messageData = {
        sender: senderId,
        receiver: receiverId,
        message: message,
        image: null
        };
        if (imageInput) {
        let reader = new FileReader();
        reader.onload = function (e) {
        let base64Image = e.target.result;
        messageData.image = base64Image;
        socket.emit("sendMessage", messageData);
        appendMessage(message, base64Image, true);
        };
        reader.readAsDataURL(imageInput);
        } else {
        socket.emit("sendMessage", messageData);
        appendMessage(message, null, true);
        }
        $("#messageInput").val("");
        $("#image").val("");
        });
        socket.on("receiveMessage", function (data) {
        console.log("New message received:", data);
        if (data.sender === receiverId) {
        appendMessage(data.message, data.image, false);
        }
        scrollToBottom();
        });

        function appendMessage(message, imageSrc, isSender) {
        let chatList = $("#chatList");
        let alignmentClass = isSender ? "message user" : "message admin";
        let bgClass = isSender ? "text userSide" : "text panditclass";
        let timeClass = isSender ? "msgofUserName" : "nameOfRishi";
        let innerBox = isSender ? "inneruserbox" : "inneradminbox";

        if (imageSrc && !imageSrc.startsWith("http") &&
        !imageSrc.startsWith("data:image")) {
        imageSrc = "https://astro-buddy.in" + imageSrc;
        }

        let receiverAvatar = "{{ isset($receiverUser->avtar) ?
        asset($receiverUser->avtar) :
        asset('real_time_chat/assets/images/profile/user-3.jpg') }}";
        let senderAvatar = "{{ isset(Auth::user()->avtar) ? asset(Auth::user()->avtar) :
        asset('real_time_chat/assets/images/profile/user-3.jpg') }}";
        let messageHtml = `
        <div class="${alignmentClass}">
            <div class="admincontent" style="width: max-content">
                <div class="${innerBox}">
                    <div class="adminimg">
                        ${!isSender ? `<img src="${receiverAvatar}" alt="User">` : `<img
                            src="${senderAvatar}" alt="You">`}
                    </div>
                    <div class="${bgClass}">
                        ${message ? message : ""}
                        ${imageSrc ? `<img src="${imageSrc}" alt="Sent Image"
                            class="mt-2 rounded-1" width="100">` : ""}
                    </div>
                </div>
            </div>
            <div class="${timeClass}" style="margin-top: 0.5%;">
                ${isSender ? "You" : "{{ $receiverUser->name }}"}
                <span>${new Date().toLocaleTimeString([], { hour: '2-digit', minute:
                    '2-digit' })}</span>
            </div>
        </div>
        `;
        chatList.append(messageHtml);
        scrollToBottom();
        }
        });
    </script>
    <script>
        $(document).ready(function () {
        let socket = io("https://astro-buddy.in/");
        let senderId = "{{ Auth::user()->id }}";
        let receiverId = "{{ $receiver }}";
        let typingTimer;
        let typingTimeout = 30000;
        socket.emit("joinRoom", { sender: senderId, receiver: receiverId });
        $("#messageInput").on("input", function () {
        let text = $(this).val().trim();
        if (text) {
        socket.emit("typing", { sender: senderId, receiver: receiverId });
        }
        clearTimeout(typingTimer);
        typingTimer = setTimeout(() => {
        socket.emit("stopTyping", { sender: senderId, receiver: receiverId });
        }, typingTimeout);
        });
        socket.on("userTyping", function (data) {
        if (data.sender === receiverId) {
        $("#typingIndicator").text("Typing...");
        clearTimeout(typingTimer);
        typingTimer = setTimeout(() => {
        $("#typingIndicator").text("");
        }, typingTimeout);
        }
        });
        socket.on("stopTyping", function (data) {
        if (data.sender === receiverId) {
        $("#typingIndicator").text("");
        }
        });
     });
    </script>
    <script>
        function handleColorTheme(e) {
                document.documentElement.setAttribute("data-color-theme", e);
            }

            document.addEventListener('DOMContentLoaded', function() {
            const input = document.getElementById('messageInput');
            const imageInput = document.getElementById('image');
            const sendButton = document.getElementById('sendMessage');
            input.addEventListener('keydown', function(event) {
            if (event.key === 'Enter') {
            event.preventDefault();
            sendButton.click();
            }
            });           });

          
    </script>
@endsection
