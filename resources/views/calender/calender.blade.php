@extends('website.dashboard_master')
@section('title', 'Schedule')
@section('content')
<script src="{{ asset('astro_calender/index.global.js') }}"></script>
<script>
    let schedule = {!! json_encode($schedule) !!};
        // console.log(typeof schedule);
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var today = new Date();
            var yyyy = today.getFullYear();
            var mm = String(today.getMonth() + 1).padStart(2, '0'); // Months are zero-based
            var dd = String(today.getDate()).padStart(2, '0');
            var todayFormatted = `${yyyy}-${mm}-${dd}`;

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialDate: todayFormatted,
            initialView: 'dayGridMonth',
            nowIndicator: true,
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridDay,listWeek'
            },
            navLinks: true,
            editable: true,
            selectable: true,
            businessHours: true,
            dayMaxEvents: true, // allow "more" link when too many events
            events: schedule,
            // events: [
            //     {
            //         title: 'All Day Event',
            //         start: '2024-10-09T16:00:00'
            //     },

                //     {

            //         title: 'Repeating Event',
            //         start: '2024-10-09T17:00:00'
            //     },
            //     {
            //     title: 'Repeating Event',
            //     start: '2024-10-09T18:00:00'
            //     },

            //     {
            //         groupId: 999,
            //         title: 'Repeating Event ',
            //         start: '2024-10-09T16:00:00'
            //     },
            //     {
            //         title: 'Conference',
            //         start: '2024-10-11',
            //         end: '2024-10-13'
            //     },
            //     {
            //         title: 'Meeting',
            //         start: '2024-07-10T10:30:00',
            //         end: '2024-10-10T12:30:00'
            //     },
            //     {
            //         title: 'Lunch',
            //         start: '2024-10-12T12:00:00'
            //     },
            //     {
            //         title: 'Meeting',
            //         start: '2024-10-12T14:30:00'
            //     },
            //     {
            //         title: 'Happy Hour',
            //         start: '2024-10-12T17:30:00',
            //         textColor: 'red',
            //     },
            //     {
            //         title: 'Dinner',
            //         start: '2024-10-12T20:00:00'
            //     },
            //     {
            //         title: 'Birthday Party',
            //         start: '2024-10-13T07:00:00'
            //     },
            //     {
            //         title: 'Click for Google',
            //         url: '',
            //         start: '2024-10-28'
            //     }
            // ],
            eventContent: function (arg) {
                let img = document.createElement('img');
                img.src = arg.event.extendedProps.image;
                img.style.width = "20px";
                img.style.borderRadius = "50%";
                img.style.marginRight = "10px";
                let title = document.createElement('span');
                title.innerHTML = ` ${arg.event.title}`;
                let arrayOfDomNodes = [img, title];

                    return {
                        domNodes: arrayOfDomNodes
                    };
                },
                dateClick: function(info) {
                    // Open a form when a day is clicked
                    // Example: using a modal
                    openFormModal(info.dateStr);
                }
            });

            calendar.render();
        });
</script>
<style>
    .container-fluid {
        width: 94%;
    }

    #calendar {
        max-width: 100%;
    }

    #fc-dom-1 {
        color: #232427 !important;
        font-size: 22px;
    }

    .fc .fc-daygrid-day-number {
        font-size: large;
    }

    .fc .fc-scrollgrid-liquid {
        border-radius: 15px;
    }

    .scrollable-container {
        overflow-y: auto;
        /* Enable vertical scrolling */
        max-height: 265px;
        /* Set a fixed height */
    }

    .table-responsive {
        display: block;
        width: 100%;
        overflow-x: auto;
        /* Enable horizontal scrolling if needed */
    }

    .conversation h2 {
        font-weight: 400 !important;
    }

    .fc-event-end {
        overflow: hidden;
    }

    .fc-timegrid-event .fc-event-main {
        padding: 12px 11px 0px;
        color: white;
        background: linear-gradient(-13deg, rgb(2 21 76), rgb(221 173 64));
        font-size: medium;

    }

    .row {
        display: flex;

    }

    .lowertransaction {
        /* width: 40%; */
    }

    .imgandname {
        display: flex;
        align-items: center;
        justify-content: end;
        position: relative;
    }

    .topprofile {
        width: 97%;
        margin: 7px auto;
        border-radius: none;
        height: 100px;
        border-top-right-radius: 10px;
        border-top-left-radius: 10px;
        background: linear-gradient(-13deg, rgb(46 46 71), rgb(103 102 70));
        position: relative;
        display: flex;
        align-items: center;
        justify-content: end;
    }

    .topprofile h3 {
        width: 90%;
        margin: 10px auto;
        text-align: end;
        font-size: 20px;
        color: white !important;
        padding-right: 5%;
    }

    .topprofile h3 img {
        width: 32px;
    }

    .panditimg {
        width: 115px;
        height: 115px;
        overflow: hidden;
        border-radius: 50%;
        border: 5px solid white;
        position: absolute;
        left: 8%;
        top: -58%;
    }

    .nameastro {
        width: 33%;
        text-align: left;
        margin-top: 20px;
        margin-bottom: -10px;
    }

    .nameastro h2 {
        font-size: 15px;
        font-weight: 500;
        color: #1f2021 !important;
    }

    .paraastro {
        width: 33%;
        text-align: left;
        margin-top: 20px;
        margin-bottom: -10px;
    }

    .paraastro h2 {
        font-size: 15px;
        font-weight: 500;
        color: #1f2021 !important;
    }

    .textcontent {
        margin-top: 33px;
    }

    .textcontent p {
        font-size: 14px;
        margin-left: 2%;
    }

    .applybtn {
        width: 90%;
        margin: 15px auto;
    }

    .btnapply {
        text-align: center;
        margin-top: 18px
    }

    .btnapply button {
        background: linear-gradient(-13deg, rgb(51 64 70), rgb(113 103 83));
        max-width: 60% !important;
        margin: 5px auto;
        transition: all 600ms ease-in-out;
    }

    .btnapply button:hover {
        text-decoration: none;
        transform: scale(1.05);
        background: #1c272d;
    }

    .headername {
        font-size: 14px;
        font-weight: 500;
        color: #212324;
    }

    .alltransaction {
        width: 96%;
        background: linear-gradient(-13deg, rgb(37 37 72), rgb(105 104 70));
        height: 57px;
        border-top-right-radius: 12px;
        border-top-left-radius: 12px;
        barder-top-right-radius: 10px;
        margin: 11px auto;
        display: flex;
        align-item: center;
    }

    .lowertransaction {
        width: 96%;
    }

    .alltransaction h3 {
        color: white !important;
        width: 90%;
        margin: auto
    }

    .presentation {
        width: 100% !important;
    }

    .fc-scrollgrid-sync-inner a {
        font-size: 15px;
        font-weight: 500;
    }

    .fc .fc-button-primary {
        background-color: #f3f3f3;
        border-color: #d4d6d9;
        color: #000;
    }

    .fc .fc-button-primary:focus {
        box-shadow: none !important;
        background-color: #3e484b !important;
        color: white;
    }

    .fc .fc-button-primary:hover {
        background-color: #3e484b !important;
    }

    .fc .fc-button:disabled {
        background-color: #3e484b;
        opacity: 1;
    }

    .fc .fc-non-business {
        background: hsl(46.39deg 100% 96.09%);
    }

    .fc-event.fc-event-draggable,
    .fc-event[href] {
        cursor: pointer;
        font-size: 14px;
        font-weight: 400;
        color: #212223 !important;
    }

    .fc-daygrid-day-top a {
        columns: black !important;
    }

    .fc-daygrid-day-top {
        align-items: center;
        justify-content: center;
    }

    a {
        color: #555f27;
    }
</style>

</head>

<div class="row flex-column">
    <div class="mb-2 col-12 d-flex justify-content-between">

        <div class="progressbar" style="width:100%;">
            <div class="panditprofilebox">

                <div class="firstpanditprofile">
                    <div class="upperprofile">
                        <div class="topprofile" style="height:140px;">
                            <h3>
                                <!-- <img src="https://astro-buddy.com/website/uploads/sites/23.png" alt=""> -->

                                Astrology , Numerology
                            </h3>
                        </div>
                        <div class="imgandname">
                            <div class="panditimg" style="top:-133px;">
                                <img class="img-fluid "
                                    src="{{ asset($astrologer->avtar) ?? '' }}"
                                    alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" col-12 " style="    background: white;
    padding: 34px 20px;
    border-radius: 23px; box-shadow: 0 3px 20px #1d26260d;">
                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show"
                        role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close"
                            data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <div id='calendar'></div>
                </div>
                <div class="lowerpanditprofile">
                    <div class="btnapply">
                        <button type="button" class="text-white btn col-12"
                            style="" data-bs-toggle="modal"
                            data-bs-target="#exampleModal"
                            onclick="assignId({{ $astrologer->id }})">Make an
                            Appointment</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
<div class="modal fade" id="exampleModal" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Appointment Form</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="appointastrojd">
                    <div class="appform">

                        <form id="appointmentForm" method="POST">
                            @csrf
                            @method('POST')
                            <div class="userform ">
                                <div class="username row">
                                    <div class="fullname makeAppoint col-6">
                                        <label>Name</label>
                                        <input type="text" placeholder="Name"
                                            name="name" required
                                            class="form-control"
                                            value="{{ ucwords(Auth::user()->name) }}" />
                                    </div>
                                    <div class="googleemail makeAppoint col-6">
                                        <label>Email</label>
                                        <input type="text" placeholder="Email"
                                            name="email" required
                                            class="form-control"
                                            value="{{ Auth::user()->email }}" />
                                    </div>
                                </div>

                                <div class="mt-2 username row">
                                    <div class="fullname col-6">
                                        <label>Mobile number</label>
                                        <input type="number"
                                            placeholder="Mobile Number"
                                            name="phone" required
                                            class="form-control"
                                            value="{{ Auth::user()->mobile }}" />
                                    </div>
                                    <div class="googleemail col-6">
                                        <label>Gender</label>
                                        <select name="gender" required
                                            class="form-control">
                                            <option value="" disabled selected>
                                                Select</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mt-2 username row">
                                    <div class="fullname makeAppoint col-6">
                                        <label>Date of Birth & Time </label>
                                        <div class="row">
                                            <div
                                                class="col-lg-12 col-md-12 col-sm-12 col-12">
                                                <input type="datetime-local"
                                                    placeholder="Date of Birth"
                                                    name="dob" id="dob" required
                                                    class="form-control" />
                                            </div>

                                        </div>
                                    </div>
                                    <div class="fullname makeAppoint col-6">
                                        <label>Birth Place</label>
                                        <div class="row">
                                            <div
                                                class="col-lg-12 col-md-12 col-sm-12 col-12">
                                                <input type="text"
                                                    placeholder="Place of Birth"
                                                    name="place" id="place"
                                                    required
                                                    class="form-control" />
                                            </div>

                                        </div>
                                    </div>

                                </div>
                                <div class="mt-2 username row">
                                    <div class="fullname makeAppoint col-6">
                                        <label>Preferred Date & Time</label>
                                        <div class="row">
                                            <div
                                                class="col-lg-12 col-md-12 col-sm-12 col-12">
                                                <input type="datetime-local"
                                                    placeholder="Date"
                                                    name="preferred_date"
                                                    id="date" required
                                                    class="form-control"
                                                    min="{{ date('Y-m-d\TH:i') }}" />
                                            </div>

                                        </div>
                                    </div>
                                    <div class="googleemail makeAppoint col-6">
                                        <label>Appointment Method</label>
                                        <div class="row">
                                            <div
                                                class="col-lg-12 col-md-12 col-sm-12 col-12">
                                                <select name="method" required
                                                    class="form-control">
                                                    <option value="" disabled
                                                        selected>Select</option>
                                                    <option value="video">Video
                                                        Call</option>
                                                    <option value="phone">Phone
                                                        Call</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-2 col-6 makeAppoint">
                                        <label
                                            for="floatingTextarea">Duration</label>
                                        <select name="duration" id="duration"
                                            class="form-control" required>
                                            <option value="15:00">15:00 Min
                                            </option>
                                            <option value="30:00">30:00 Min
                                            </option>
                                            <option value="45:00">45:00 Min
                                            </option>
                                            <option value="60:00">60:00 Min
                                            </option>
                                        </select>

                                    </div>
                                    <div class="mt-2 col-6 makeAppoint">
                                        <label
                                            for="floatingTextarea">Reason</label>
                                        <input type="text" name="reason"
                                            class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="response makeAppoint">
                            </div>
                    </div>
                </div>
                <div class="mt-4 row ApplyandClose">
                    <button type="button"
                        style="background: linear-gradient(-13deg, rgb(19 31 88), rgb(42 209 109));"
                        class="text-white btn col-4 offset-2"
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="text-white btn col-4"
                        style="background: linear-gradient(-13deg, rgb(2 21 76), rgb(221 173 64));">Make
                        an
                        Appointment</button>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
</div>

</div>


</div>
<script>
    function assignId(id) {
            var form = document.querySelector('#appointmentForm');
            var url = "{{ url('enquiry/appointment') }}";
            form.action = url + '/' + id;
        }

        function openFormModal(dateStr) {

            $('#exampleModal').modal('show');
            $('#exampleModal .modal-body #date').val(dateStr);
            assignId({{ $astrologer->id }});
        }
</script>

@endsection