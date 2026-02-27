@extends('website.dashboard_master')
@section('title','Chat List')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet"
    href="{{ asset('assets/new_appointment_card/card.css')}}">
<link rel="stylesheet"
    href="{{ asset('assets/new_appointment_card/tabs.css')}}">
    <div class="row">
<div class="tab-pane fade active show " id="activities" role="tabpanel">
   <div class="tabs">
        <input type="radio" id="tab-1" name="tabs" class="tabs__input" checked>
        <input type="radio" id="tab-2" name="tabs" class="tabs__input">
        <input type="radio" id="tab-3" name="tabs" class="tabs__input">
        <div class="tabs__labels">
            <label for="tab-1" class="tabs__label">Pending Appointment</label>
            <label for="tab-2" class="tabs__label">Completed Appointment</label>
        </div>
        <div class="tabs__content">
            <div class="tabs__panel" id="tab-panel-1" style="">
                <div class="tabs__panel-image">
                    <div class="appointments-container">
                        @php
                        use Carbon\Carbon;
                        @endphp
                        @if ($chats->count() > 0)
                        @foreach ($chats as $chat)
                        @if($chat->is_complete != 1)
                        {{--  <div class="appointment-card">
                            <div class="card-header">
                                <div class="user-info">
                                    <img src="{{ asset($chat->astrologerDetails->avtar ?? '' ?? 'https://randomuser.me/api/portraits/men/32.jpg') }}"
                                        alt="user" class="avatar">
                                    <div class="user-details">
                                        <span class="user-name">{{
                                            ucwords($chat->astrologerDetails->name ?? '')
                                            }}</span>
                                        <span class="user-role">
                                            @if(!empty($chat->astrologerDetails->last_seen)>=
                                            now()->subMinutes(5) &&
                                            $chat->astrologerDetails->active_status == 1)
                                            <span class="badge badge-success circle">
                                                Online
                                            </span>
                                            @elseif(!empty($chat->astrologerDetails->active_status) == 2)
                                            <span class="badge badge-warning circle">
                                                Busy</span>
                                            @else
                                            <span class="badge badge-danger circle">
                                                Offline</span>
                                            @endif
                                        </span>
                                    </div>

                                    @if ($chat->is_complete == 1)
                                    <span class="status"
                                    style="background-color: #4ea615;">Completed</span>
                                    @elseif($chat->is_complete == 2)
                                    <span style="cursor: pointer;" class="accept start-chat-btn status approved"
                                        data-astro="{{ $chat->astro_encrypt }}" data-chat-id="{{ $chat->id }}"
                                        style="width: max-content;">Start
                                        Chat</span>
                                    @endif
                                </div>

                            </div>
                            <div class="card-footer">
                                <div class="call-option video-call">
                                    <i class="fa-solid fa-mars-and-venus"></i> {{ ucwords($chat->gender
                                    ??
                                    '') }}

                                </div>
                                <div class="time-info status pending time-badge">
                                    <div class="time-part">
                                        <i class="fa-regular fa-calendar"></i>{{
                                        Carbon::parse($chat->updated_at)->format('d
                                        M, Y') ?? '' }}
                                    </div>
                                    <div class="time-part">
                                        <i class="fa fa-indian-rupee-sign" aria-hidden="true"
                                            style="color: white;"></i>
                                        {{ $chat->wallet ?? '' }}
                                    </div>
                                </div>
                            </div>
                        </div>  --}}
                        <div class="appointment-card">
                            <div class="card-header">
                                <div class="user-info">
                                    <img src="{{ asset($chat->astrologerDetails->avtar ?? '' ?? 'https://randomuser.me/api/portraits/men/32.jpg') }}"
                                        alt="user" class="avatar">
                                    <div class="user-details">
                                        <span class="user-name">{{
                                            ucwords($chat->astrologerDetails->name ?? '')
                                            }}</span>
                                        <span class="user-role">
                                            {{
                                                Carbon::parse($chat->updated_at)->format('d
                                                M, Y') ?? '' }}

                                        </span>
                                    </div>
                                    <span class="status badge badge-dark circle"
                                        style="    padding: 7px 7px;    font-size: 11px;font-weight: 500;cursor: pointer;"
                                        id="user-{{ $chat->astrologer_id }}-status">
                                        Checking...
                                    </span>
                                </div>
                                {{-- <span class="status pending">Pending</span>
                                <span class="status cancelled">Cancelled</span>
                                --}}
                            </div>
                            <div class="card-footer">
                                <div class="call-option video-call">
                                    <i class=" fa-solid fa-message"
                                        style="margin-right: 5px; color: #ff7010"
                                        aria-hidden="true"></i>
                                    Chat
                                    {{-- <i class="fa-solid fa-phone"></i>
                                    Phone Call
                                    <i class="fa-solid fa-message"></i>
                                    Chat --}}
                                </div>
                                <div class="time-info  ">
                                    @if ($chat->is_complete == 1)
                                    <span>Completed</span>
                                    @elseif($chat->is_complete == 2)
                                    <div data-user-id="{{ $chat->astrologer_id }}">
                                        <span class="user-busy-status"></span>
                                    </div>
                                    <div class="start-chat-btn" data-user-id="{{ $chat->astrologer_id }}" >
                                        <span style="cursor: pointer;" class="accept start-chat-btn status approved"
                                            data-astro="{{ $chat->astro_encrypt }}" data-chat-id="{{ $chat->id }}">
                                            Start Chat
                                        </span>
                                    </div>
                                 
                              
                                    @endif
                                    {{--  <div class="time-part">
                                        <i class="fa-regular fa-calendar"></i>{{
                                        Carbon::parse($chat->updated_at)->format('d
                                        M, Y') ?? '' }}
                                    </div>  --}}
                                    {{-- <div class="time-part">
                                        <i class="fa-regular fa-clock"></i>
                                        {{ $appointment->preferred_time ?? '' }}
                                        PM
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                        @else
                        {{-- <a href="{{ url('chat-details-user',$chat->astrologerDetails->id ) }}" </a>
                            --}}
                            <h6
                                style="border:2px solid #ffcd3a;padding:6px;display: flex
                                                                                            ;justify-content: center;">
                                No Appointment
                                Scheduled</h6>  @endif
                    </div>
                </div>
            </div>
            <div class="tabs__panel" id="tab-panel-2" style="">
                <div class="tabs__panel-image">
                    <div class="appointments-container">
                        @if ($chats->count() > 0)
                        @foreach ($chats as $chat)
                        @if($chat->is_complete == 1)
                        <div class="appointment-card">
                            <div class="card-header">
                                <div class="user-info">
                                    <img src="{{ asset($chat->astrologerDetails->avtar ?? '' ?? 'https://randomuser.me/api/portraits/men/32.jpg') }}"
                                        alt="user" class="avatar">
                                    <div class="user-details">
                                        <span class="user-name">{{
                                            ucwords($chat->astrologerDetails->name ?? '')
                                            }}</span>
                                        <span class="user-role">
                                            {{
                                            Carbon::parse($chat->updated_at)->format('d
                                            M, Y') ?? '' }}

                                        </span>
                                    </div>
                                    @if (!empty($chat->astrologerDetails->last_seen)>=
                                    now()->subMinutes(5) &&
                                    $chat->astrologerDetails->active_status == 1)
                                    <span class="status" style="background-color: #4ea615;">
                                        Online
                                    </span>
                                    @elseif(!empty($chat->astrologerDetails->active_status)
                                    == 2)
                                    <span class="status" style="background-color: #4ea615;">
                                        Busy</span>
                                    @else
                                    <span class="status" style="background-color: #4ea615;">
                                        Offline</span>
                                    @endif
                                </div>
                                {{-- <span class="status pending">Pending</span>
                                <span class="status cancelled">Cancelled</span>
                                --}}
                            </div>
                            <div class="card-footer">
                                <div class="call-option video-call">
                                    <i class=" fa-solid fa-message"
                                        style="margin-right: 5px; color: #ff7010"
                                        aria-hidden="true"></i>
                                    Chat
                                    {{-- <i class="fa-solid fa-phone"></i>
                                    Phone Call
                                    <i class="fa-solid fa-message"></i>
                                    Chat --}}
                                </div>
                               <div>
                                    @if ($chat->is_complete == 1)
                                    <span class="status"
                                        style="background-color: #4ea615;border-radius: 7px;">Completed</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        {{--  <div class="appointment-card">
                            <div class="card-header">
                                <div class="user-info">
                                    <img src="{{ asset($chat->astrologerDetails->avtar ?? '' ?? 'https://randomuser.me/api/portraits/men/32.jpg') }}"
                                        alt="user" class="avatar">
                                    <div class="user-details">
                                        <span class="user-name">{{
                                            ucwords($chat->astrologerDetails->name ?? '')
                                            }}</span>
                                        <span class="user-role">
                                            @if (!empty($chat->astrologerDetails->last_seen)>=
                                            now()->subMinutes(5) &&
                                            $chat->astrologerDetails->active_status == 1)
                                            <span class="badge badge-success circle">
                                                Online
                                            </span>
                                            @elseif(!empty($chat->astrologerDetails->active_status)
                                            == 2)
                                            <span class="badge badge-warning circle">
                                                Busy</span>
                                            @else
                                            <span class="badge badge-danger circle">
                                                Offline</span>
                                            @endif
                                        </span>
                                    </div>
                                    @if ($chat->is_complete == 1)
                                    <span class="status"
                                        style="background-color: #4ea615;">Completed</span>
                                    @endif
                                </div>

                            </div>
                            <div class="card-footer">
                                <div class="call-option video-call">
                                    <i class=" fa-solid fa-message"
                                        style="margin-right: 5px; color: #ff7010"
                                        aria-hidden="true"></i>
                                    Chat

                                </div>
                                <div class="time-info status pending time-badge">
                                    <div class="time-part">
                                        <i class="fa-regular fa-calendar"></i>{{
                                        Carbon::parse($chat->updated_at)->format('d
                                        M, Y') ?? '' }}
                                    </div>

                                </div>
                            </div>
                        </div>  --}}
                        @endif
                        @endforeach
                        @else
                        {{-- <a href="{{ url('chat-details-user',$chat->astrologerDetails->id ) }}" </a>
                            --}}
                            <h6
                                style="border:2px solid #ffcd3a;padding:6px;display: flex
                                                                                            ;justify-content: center;">
                                No Appointment
                                Scheduled</h6>  @endif
                    </div>
                </div>
            </div>
        </div>
   </div>
    <br>
</div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
    const chatButtons = document.querySelectorAll('.start-chat-btn');

    chatButtons.forEach(function (btn) {
    // Define the click handler as a named function
    function handleClick() {
    const chatId = btn.getAttribute('data-chat-id');

    if (!chatId) {
    console.error("Chat ID not found on button.");
    return;
    }

    fetch(`/chat/trigger-accept/${chatId}`, {
    method: 'POST',
    headers: {
    'X-CSRF-TOKEN':
    document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
    'Content-Type': 'application/json'
    },
    })
    .then(response => {
    if (!response.ok) {
    throw new Error("Network response was not ok");
    }
    return response.json();
    })
    .then(data => {
    console.log('Trigger sent:', data);
    btn.disabled = true;
    btn.classList.remove('start-chat-btn');
    btn.classList.add('disabled');
    btn.removeEventListener('click', handleClick);
    toastr.info("Waiting for astrologer to accept...", "Please wait", {
    closeButton: true,
    progressBar: true,
    timeOut: 0,
    positionClass: 'toast-top-right'
    });
    })
    .catch(error => {
    console.error('Error triggering event:', error);
    toastr.error("Something went wrong.");
    });
    }
    btn.addEventListener('click', handleClick);
    });
    });

</script>
@endsection
