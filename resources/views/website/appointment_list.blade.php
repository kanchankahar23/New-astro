@extends('website.dashboard_master')
@section('title', 'Appointments')
@section('content')
<link rel="stylesheet"
    href="{{ asset('assets/new_appointment_card/card.css')}}">
    <link rel="stylesheet"
        href="{{ asset('assets/new_appointment_card/tabs.css')}}">
<meta name="csrf-token" content="{{ csrf_token() }}">
<section>
    <div class=" allUserAppointment">
        <div class="row">
            <div class="tab-pane fade active show" id="activities"
                role="tabpanel">

                <br>
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
                                    
                                    @if ($appointments->count() > 0)
                                    @foreach ($appointments as $appointment)
                                    @if($appointment->is_completed != 1 && $appointment->status != 4)
                                   
                                    <div class="appointment-card" style="padding: 10px;">
                                        <div class="card-header"
                                            style="padding: 17px; background-color: white; border: none;">
                                            <div class="user-info">
                                                <img src="{{ asset($appointment->astroDetails->avtar ?? 'https://randomuser.me/api/portraits/men/32.jpg') }}"
                                                    alt="user" class="avatar">
                                                <div class="user-details" style="font-size: 10px;margin-top: -8px;">
                                                    <span class="user-name" style="font-size: 16px;">{{
                                                        ucwords($appointment->astroDetails->name ?? '') }}</span>
                                                    <div class="time-part">
                                                        <span>
                                                            <i class="fa-regular fa-calendar"></i>
                                                            {{
                                                            Carbon::parse($appointment->preferred_date)->format('d
                                                            M,
                                                            Y') ?? '' }}
                                                        </span>
                                                        <span>
                                                            <i class="fa-regular fa-clock"></i>
                                                            {{
                                                            Carbon::parse($appointment->preferred_time)->format('h:i
                                                            A')
                                                            ?? '' }}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div style="    margin-top: 3px;">
                                                <span class="user-role">
                                                   
                                                         <span class="badge badge-dark circle" style="    padding: 7px 7px;    font-size: 11px;
                                        font-weight: 500;cursor: pointer;" id="user-{{ $appointment->astrologer_id }}-status">
                                                        Checking...
                                                    </span>
                                                    {{--  @if (!empty($appointment->astroDetails->last_seen) >=
                                                    now()->subMinutes(5) &&
                                                    $appointment->astroDetails->active_status == 1)
                                                    <span class="badge badge-success circle" style="    padding: 7px 7px;    font-size: 11px;
                                        font-weight: 500;cursor: pointer;">
                                                        Online
                                                    </span>
                                                    @elseif (!empty($appointment->astroDetails->active_status) ==
                                                    2)
                                                    <span class="badge badge-warning circle" style="    padding: 7px 7px;    font-size: 11px;
                                        font-weight: 500;">
                                                        Busy</span>
                                                    @else
                                                    <span class="badge badge-danger circle" style="    padding: 7px 7px;    font-size: 11px;
                                        font-weight: 500;">
                                                        Offline</span>
                                                    @endif  --}}
                                                </span>
                                            </div>

                                        </div>
                                        <div class="card-footer" style="padding: 17px;">
                                            <div class="call-option video-call">
                                                <i class="fa-solid fa-video"></i>
                                                {{ ucwords($appointment->way_to_reach ?? 'Video ') . ' Call' }}
                                                {{-- <i class="fa-solid fa-phone"></i>
                                                Phone Call
                                                <i class="fa-solid fa-message"></i>
                                                Chat --}}
                                            </div>
                                            {{--  <div class="call-option video-call">
                                                <span
                                                    style="color: #ffffff; border: 1px solid #00aaff; background: #00aaff;padding: 5px 12px; border-radius: 5px;  font-size: 12px;cursor: pointer;">
                                                    Join Again
                                                </span>
                                            </div>  --}}
                                            @if ($appointment->status == '0' && empty($appointment->url))
                                            <span class="status pending">Pending</span>
                                            @elseif(!empty($appointment->url) && $appointment->status == 1)
                                            <div style="font-size: small;font-weight: 500;"
                                                data-user-id="{{ $appointment->astrologer_id }}">
                                                <span class="user-busy-status "></span>
                                             
                                            </div>
                                            <span style="color: #ffffff; border: 1px solid #3db66b; background: #3db66b;padding: 5px 12px; border-radius: 5px;  font-size: 12px;cursor: pointer;" class="start-video-call-btn status approved"
                                                data-meeting-id="{{ $appointment->id }}"
                                                data-user-id="{{ $appointment->astrologer_id }}"
                                                style="width: max-content;">Join
                                                Call</span>
                                            @elseif ($appointment->status == 1)
                                            <span class="status" style="color: #ffffff; border: 1px solid #ffee00; background: #ffee00;padding: 5px 12px; border-radius: 5px;  font-size: 12px;cursor: pointer;">Approved</span>
                                            @elseif($appointment->status == '2')
                                            <span class="status cancelled" style="color: #ffffff; border: 1px solid #ff0037; background: #ff0037;padding: 5px 12px; border-radius: 5px;  font-size: 12px;cursor: pointer;">Rejected</span>
                                            @elseif($appointment->status == 3 && $appointment->duration !=
                                            '00:00')
                                            <div style="font-size: small;font-weight: 500;" data-user-id="{{ $appointment->astrologer_id }}">
                                                <span class="user-busy-status " ></span>
                                                {{-- <span class="user-busy-status">🟢 Free</span> --}}
                                            </div>
                                            
                                            <span class="start-video-call-btn status approved"
                                                data-meeting-id="{{ $appointment->id }}"
                                                data-user-id="{{ $appointment->astrologer_id }}"
                                                style="color: #ffffff; border: 1px solid #00aaff; background: #00ccff;padding:
                                                5px 12px; border-radius: 5px; font-size: 12px;cursor: pointer;">Join
                                                Again</span>

                                            @endif
                                           
                                        </div>
                                    </div>
                                    @endif
                                    @include('user_info.user_info_popup', [
                                    'user' => $appointment,
                                    ])
                                    @endforeach
                                    @else
                                    <h6 style="border:2px solid #ffcd3a;padding:6px;display: flex
                                                                                ;justify-content: center;">
                                        No Appointment
                                        Scheduled</h6>
                                    @endif
                                </div>
                             </div>
                        </div>
                        <div class="tabs__panel" id="tab-panel-2">
                            <div class="tabs__panel-image">
                                <div class="appointments-container">
                                    @foreach ($appointments as $appointment)
                                    @if($appointment->is_completed == 1 && $appointment->status == 4)
                                    <div class="appointment-card" style="padding: 10px;">
                                        <div class="card-header"
                                            style="padding: 17px; background-color: white; border: none;">
                                            <div class="user-info">
                                                <img src="{{ asset($appointment->astroDetails->avtar ?? 'https://randomuser.me/api/portraits/men/32.jpg') }}"
                                                    alt="user" class="avatar">
                                                <div class="user-details" style="font-size: 10px;margin-top: -8px;">
                                                    <span class="user-name" style="font-size: 16px;">{{
                                                        ucwords($appointment->astroDetails->name ?? '') }}</span>
                                                    <div class="time-part">
                                                        <span>
                                                            <i class="fa-regular fa-calendar"></i>
                                                            {{
                                                            Carbon::parse($appointment->preferred_date)->format('d
                                                            M,
                                                            Y') ?? '' }}
                                                        </span>
                                                        <span>
                                                            <i class="fa-regular fa-clock"></i>
                                                            {{
                                                            Carbon::parse($appointment->preferred_time)->format('h:i
                                                            A')
                                                            ?? '' }}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div style="    margin-top: 3px;">
                                                <span class="user-role">
                                                    @if (!empty($appointment->astroDetails->last_seen) >=
                                                    now()->subMinutes(5) &&
                                                    $appointment->astroDetails->active_status == 1)
                                                    <span class="badge badge-success circle" style="    padding: 7px 7px;    font-size: 11px;
                                                                            font-weight: 500;cursor: pointer;">
                                                        Online
                                                    </span>
                                                    @elseif (!empty($appointment->astroDetails->active_status) ==
                                                    2)
                                                    <span class="badge badge-warning circle" style="    padding: 7px 7px;    font-size: 11px;
                                                                            font-weight: 500;">
                                                        Busy</span>
                                                    @else
                                                    <span class="badge badge-danger circle" style="    padding: 7px 7px;    font-size: 11px;
                                                                            font-weight: 500;">
                                                        Offline</span>
                                                    @endif
                                                </span>
                                            </div>

                                        </div>
                                        <div class="card-footer" style="padding: 17px;">
                                            <div class="call-option video-call">
                                                <i class="fa-solid fa-video"></i>
                                                {{ ucwords($appointment->way_to_reach ?? 'Video ') . ' Call' }}
                                                {{-- <i class="fa-solid fa-phone"></i>
                                                Phone Call
                                                <i class="fa-solid fa-message"></i>
                                                Chat --}}
                                                
                                            </div>
                                            <div class="call-option video-call">.
                                                <span class="status" style="color: #ffffff; border: 1px solid #2fc534; background: #2fc534;padding: 5px 12px; border-radius: 5px;  font-size: 12px;cursor: pointer;">Completed</span>
                                            </div>
                                        </div>
                                    </div>
                                    {{--  <div class="appointment-card">
                                        <div class="card-header">
                                            <div class="user-info">
                                                <img src="{{ asset($appointment->astroDetails->avtar ?? 'https://randomuser.me/api/portraits/men/32.jpg') }}"
                                                    alt="user" class="avatar">
                                                <div class="user-details">
                                                    <span class="user-name">{{
                                                        ucwords($appointment->astroDetails->name ?? '')
                                                        }}</span>
                                                    <span class="user-role">
                                                        @if (!empty($appointment->astroDetails->last_seen) >=
                                                        now()->subMinutes(5) &&
                                                        $appointment->astroDetails->active_status == 1)
                                                        <span class="badge badge-success circle">
                                                            Online
                                                        </span>
                                                        @elseif(!empty($appointment->astroDetails->active_status) ==
                                                        2)
                                                        <span class="badge badge-warning circle">
                                                            Busy</span>
                                                        @else
                                                        <span class="badge badge-danger circle">
                                                            Offline</span>
                                                        @endif
                                                    </span>
                                                </div>
                                            <span class="status" style="background-color: #4ea615;">Completed</span>
                                            </div>

                                        </div>
                                        <div class="card-footer">
                                            <div class="call-option video-call">
                                                <i class="fa-solid fa-video"></i>
                                                {{ ucwords($appointment->way_to_reach ?? 'Video ') . ' Call' }}

                                            </div>
                                            <div class="time-info status pending time-badge">
                                                <div class="time-part">
                                                    <i class="fa-regular fa-calendar"></i>{{
                                                    Carbon::parse($appointment->preferred_date)->format('d M,
                                                    Y') ?? '' }}
                                                </div>
                                                <div class="time-part">
                                                    <i class="fa-regular fa-clock"></i>
                                                    {{ $appointment->preferred_time ?? '' }}
                                                    PM
                                                </div>
                                            </div>
                                        </div>
                                    </div>  --}}
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <br>
        {{ $appointments->links() }}
    </div>

    <div class="modal" id="astrologerModel"></div>

    <script
        src="{{ asset('website/plugins/astro-appointment/assets/js/astro.js') }}">
    </script>
    <script>
        document.querySelectorAll('.start-video-call-btn').forEach(function(btn) {
            function handleClick() {
                    const meetingId = btn.getAttribute('data-meeting-id');
                    const userId = btn.getAttribute('data-user-id');
                    fetch(`/video-call/request/${meetingId}`, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                    .getAttribute('content'),
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({
                                user_id: userId
                            })
                        })
                        .then(res => res.json())
                        .then(data => {
                        btn.disabled = true;
                        btn.classList.remove('start-chat-btn');
                        btn.classList.add('disabled');
                        btn.removeEventListener('click', handleClick);
                            toastr.success("Video call request sent!");
                        })
                        .catch(err => {
                            console.log(err);
                            toastr.error("Error sending request.");
                        });
                };
                btn.addEventListener('click', handleClick);
            });
    </script>
  
</section>
@endsection
