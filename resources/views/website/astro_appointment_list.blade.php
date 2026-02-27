@extends('website.dashboard_master')
@section('title', 'Appointments')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet"
        href="{{ asset('assets/new_appointment_card/card.css')}}">
    <link rel="stylesheet"
        href="{{ asset('assets/new_appointment_card/tabs.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <section>
        <div class="astroFileList">
            <div class="row">
                <div class="tab-pane fade active show" id="activities" role="tabpanel">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <h6>{{ session('success') }}</h6>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

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
                                                    <img src="{{ asset($appointment->userDetails->avtar ?? 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png') }}"
                                                        alt="user" class="avatar">
                                                    <div class="user-details" style="font-size: 10px;margin-top: -8px;">
                                                        <span class="user-name" style="font-size: 16px;">{{
                                                            ucwords($appointment->userDetails->name ?? '') }}</span>
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
                                                <div style="margin-top: 3px;">
                                                    <span class="user-role">
                                                        <span class="badge badge-dark circle"
                                                            style="line-height: 1.3;font-size: 11px;margin-left: 57px;"
                                                            id="user-{{ $appointment->user_id }}-status">
                                                            Checking.
                                                        </span>
                                                      
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
                                                {{-- <div class="call-option video-call">
                                                    <span
                                                        style="color: #ffffff; border: 1px solid #00aaff; background: #00aaff;padding: 5px 12px; border-radius: 5px;  font-size: 12px;cursor: pointer;">
                                                        Join Again
                                                    </span>
                                                </div> --}}
                                                @if ($appointment->status == '0')
                                                <span class="status pending" data-bs-toggle="modal"
                                                    data-bs-target="#userAppointmentPopup{{ $appointment->id }}" style="width: max-content;padding:
                                                    5px 12px; border-radius: 5px; font-size: 12px;cursor: pointer;">Pending</span>
                                                @elseif($appointment->status == '1')
                                                <div style="font-size: small;font-weight: 500;"
                                                    data-user-id="{{ $appointment->user_id }}">
                                                    <span class="user-busy-status "></span>
                                                
                                                </div>
                                                <span style="background-color: #2ca8f0;width: max-content;padding:
                                                5px 12px; border-radius: 5px; font-size: 12px;cursor: pointer;" class="start-video-call-btn status approved"
                                                    data-meeting-id="{{ $appointment->id }}"
                                                    data-user-id="{{ $appointment->user_id }}">Join
                                                    Call</span>
                                                @elseif($appointment->is_completed == 1)
                                                <span class="status" style="background-color: #4ea615;width: max-content;padding:
                                                5px 12px; border-radius: 5px; font-size: 12px;cursor: pointer;" >Completed</span>
                                                @elseif($appointment->status == 3 && $appointment->duration !=
                                                '00:00')
                                                {{-- <td><button class="accept">Rejected</button>
                                                </td> --}}
                                                <div style="font-size: small;font-weight: 500;"
                                                    data-user-id="{{ $appointment->user_id }}">
                                                    <span class="user-busy-status "></span>
                                                
                                                </div>
                                                <span class="start-video-call-btn status approved"
                                                    data-meeting-id="{{ $appointment->id }}"
                                                    data-user-id="{{ $appointment->user_id }}"
                                                    style="background-color: #2ca8f0;width: max-content;padding:
                                                    5px 12px; border-radius: 5px; font-size: 12px;cursor: pointer;">Join
                                                    Again</span>

                                                @endif

                                            </div>
                                            </div>
                                        @include('user_info.user_info_popup', [
                                        'user' => $appointment,
                                        ])
                                        @endif
                                        @endforeach
                                        @else
                                        <h6
                                            style="border:2px solid #ffcd3a;padding:6px;display: flex;justify-content: center;">
                                            No Appointment
                                            Scheduled</h6>  @endif
                                    </div>
                                </div>
                            </div>
                            <div class="tabs__panel" id="tab-panel-2" style="">
                                <div class="tabs__panel-image">
                                    <div class="appointments-container">

                                        @if ($appointments->count() > 0)
                                        @foreach ($appointments as $appointment)
                                        @if($appointment->is_completed == 1 && $appointment->status == 4)
                                        <div class="appointment-card" style="padding: 10px;">
                                            <div class="card-header"
                                                style="padding: 17px; background-color: white; border: none;">
                                                <div class="user-info">
                                                    <img src="{{ asset($appointment->userDetails->avtar ?? 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png') }}"
                                                        alt="user" class="avatar">
                                                    <div class="user-details" style="font-size: 10px;margin-top: -8px;">
                                                        <span class="user-name" style="font-size: 16px;">{{
                                                            ucwords($appointment->userDetails->name ?? '') }}</span>
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
                                                        @if (!empty($appointment->userDetails->last_seen) >=
                                                        now()->subMinutes(5) &&
                                                        $appointment->userDetails->active_status == 1)
                                                        <span class="badge badge-success circle"
                                                            style="    padding: 7px 7px;    font-size: 11px;
                                                                                                                            font-weight: 500;cursor: pointer;">
                                                            Online
                                                        </span>
                                                        @elseif (!empty($appointment->userDetails->active_status) ==
                                                        2)
                                                        <span class="badge badge-warning circle"
                                                            style="    padding: 7px 7px;    font-size: 11px;
                                                                                                                            font-weight: 500;">
                                                            Busy</span>
                                                        @else
                                                        <span class="badge badge-danger circle"
                                                            style="    padding: 7px 7px;    font-size: 11px;
                                                                                                                            font-weight: 500;">
                                                            Offline</span>
                                                        @endif
                                                    </span>
                                                </div>

                                            </div>
                                            <div class="card-footer" style="padding: 17px;">
                                                <div class="call-option video-call">
                                                    <i class="fa-solid fa-video"></i>
                                                    {{ ucwords($appointment->way_to_reach ?? 'Video') . ' Call' }}
                                                    {{-- <i class="fa-solid fa-phone"></i>
                                                    Phone Call
                                                    <i class="fa-solid fa-message"></i>
                                                    Chat --}}
                                                </div>
                                                {{-- <div class="call-option video-call">
                                                    <span
                                                        style="color: #ffffff; border: 1px solid #00aaff; background: #00aaff;padding: 5px 12px; border-radius: 5px;  font-size: 12px;cursor: pointer;">
                                                        Join Again
                                                    </span>
                                                </div> --}}
                                                <span class="status" style="background-color: #4ea615;width: max-content;padding:
                                                5px 12px; border-radius: 5px; font-size: 12px;cursor: pointer;">Completed</span>

                                            </div>
                                        </div>
                                        {{--  <div class="appointment-card">
                                            <div class="card-header">
                                                <div class="user-info">
                                                    <img src="{{ asset($appointment->userDetails->avtar ?? 'https://randomuser.me/api/portraits/men/32.jpg') }}"
                                                        alt="user" class="avatar">
                                                    <div class="user-details">
                                                        <span class="user-name">{{
                                                            ucwords($appointment->userDetails->name ?? '') }}</span>
                                                        <span class="user-role">
                                                            @if (!empty($appointment->userDetails->last_seen) >=
                                                            now()->subMinutes(5) &&
                                                            $appointment->userDetails->active_status == 1)
                                                            <span class="badge badge-success circle">
                                                                Online
                                                            </span>
                                                            @elseif (!empty($appointment->userDetails->active_status) ==
                                                            2)
                                                            <span class="badge badge-warning circle">
                                                                Busy</span>
                                                            @else
                                                            <span class="badge badge-danger circle">
                                                                Offline</span>
                                                            @endif
                                                        </span>
                                                    </div>
                                                </div>
                                               <span class="status" style="background-color: #4ea615;">Completed</span>

                                            </div>
                                            <div class="card-footer">
                                                <div class="call-option video-call">
                                                    <i class="fa-solid fa-video"></i>
                                                    {{ ucwords($appointment->way_to_reach ?? 'Video ') . ' Call' }}

                                                </div>
                                                <div class="time-info status pending time-badge">
                                                    <div class="time-part">
                                                        <i class="fa-regular fa-calendar"></i>
                                                        {{ Carbon::parse($appointment->preferred_date)->format('d M,
                                                        Y') ?? '' }}
                                                    </div>
                                                    <div class="time-part">
                                                        <i class="fa-regular fa-clock"></i>
                                                        {{ Carbon::parse($appointment->preferred_time)->format('h:i A')
                                                        ?? '' }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>  --}}
                                        @endif
                                        @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                       </div>
                       {{ $appointments->links() }}
                    <br>

                    {{--  <a class="btn btn-warning"
                        href="{{ url('user-transaction-details', $appointment->user_id) }}">View</a>  --}}
                </div>
            </div>
        </div>
    </section>
    <div id="popupContent"></div>
    <script>
        async function loadPopup(data, openKundliPopup) {
            data = JSON.parse(data)
            let params = new URLSearchParams({
                meeting_id: data.id,
                name: data.name,
                dob: data.dob,
                tob: data.tob,
                place: data.place,
                type: data.type
            });

            await fetch(`{{ route('load.kundli_popup') }}?${params.toString()}`)
                .then(response => response.text())
                .then(data => {
                    document.getElementById("popupContent").innerHTML = data;
                    openKundliPopup();
                })
                .catch(error => console.error('Error:', error));
        }

        function openKundliPopup() {
            document.getElementById('kundaliModal').style.display = 'block';
        }

        function closeKundliPopup() {
            document.getElementById('kundaliModal').style.display = 'none';

        }
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
                        console.error(err);
                        toastr.error("Error sending request.");
                    });
            };
            btn.addEventListener('click', handleClick);
        });
    </script>
@endsection
