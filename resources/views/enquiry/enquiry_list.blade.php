@extends('master.master') @section('title', 'Enquiry List') @section('content')
<head>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet" />
</head>
<style>
    .enquirylist {
        width: 100%;
    }
    .newenquiry {
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        margin: 20px auto;
    }

    .user-details {
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-between;
    }

    .info-details {
        background-color: white;
        width: 48%;
        display: flex;
        align-items: start;
        justify-content: end;
        border-left: 4px solid #e8bc52;
        border-top: 1px solid #e9ebec;
        border-bottom: 1px solid #e9ebec;
        border-right: 1px solid #e9ebec;
        padding-top: 15px;
        padding-bottom: 20px;
        padding-left: 15px;
        padding-right: 10px;
        border-radius: 0.25rem;
        box-shadow: 2px 2px 5px -3px #c3c4c5;
    }

    .info-details22 {
        background-color: white;
        width: 48%;
        display: flex;
        align-items: start;
        justify-content: end;
        border-left: 4px solid #13c56b;
        border-top: 1px solid #e9ebec;
        border-bottom: 1px solid #e9ebec;
        border-right: 1px solid #e9ebec;
        padding-top: 15px;
        padding-bottom: 20px;
        padding-left: 15px;
        padding-right: 10px;
        border-radius: 0.25rem;
        box-shadow: 1px 1px 4px -2px #c3c4c5;
    }

    .restpartdetails {
        width: calc(100% - 60px);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: end;
    }

    .enquiryimg {

        width: 75px;
        height: 75px;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        border-radius: 5px;
        margin-top: 10px;

    }

    .enquiryimg img {
        width: 100%;
        object-fit: cover;
    }

    .profileenquiry {
        display: flex;
        width: 100%;
        align-items: center;
        justify-content: center;
    }

    .otherenquiry {
        width: 80%;
        display: flex;
        align-items: center;
        justify-content: start;
        padding-left: 5px;
    }

    .specilization {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .remarkbutton {
        width: 20%;
        display: flex;
        align-items: center;
        justify-content: start;
    }

    .otherenquiry h3 {
        color: rgba(33, 37, 41);
        font-size: 14px;
        font-family: "Montserrat", sans-serif;
        font-weight: 600;
        margin: 5px 10px;
        width: 45%;
    }

    .specilization {
        color: rgba(33, 37, 41);
        font-size: 14px;
        font-family: "Montserrat", sans-serif;
        font-weight: 600;
        margin: 5px 10px;
    }

    .remarkbutton button {
        color: rgb(30 31 32);
        font-size: 12.5px;
        font-family: "Montserrat", sans-serif;
        font-weight: 600;
        margin: 5px 10px;
        border: none;
        width: 150px;
        height: 24px;
        background: #f9e9cb;
        border-radius: 4px;
    }

    .remarkbutton22 {
        width: 20%;
        display: flex;
        align-items: center;
        justify-content: start;
    }

    .remarkbutton22 button {
        color: rgb(30 31 32);
        font-size: 12.5px;
        font-family: "Montserrat", sans-serif;
        font-weight: 600;
        margin: 5px 10px;
        border: none;
        width: 150px;
        height: 24px;
        background: #c5efda;
        border-radius: 4px;
    }

    .emailenquiry {
        width: 58%;
        display: flex;
        align-items: center;
        justify-content: start;
    }

    .emailenquiry h3 {
        color: rgba(33, 37, 41);
        font-size: 13px;
        font-family: "Montserrat", sans-serif;
        margin: 5px 10px;
        font-weight: 600;
        width: 100%;
    }

    .emailenquiry h3 span {
        font-weight: 600;

        color: #5c5d5e;
        font-size: 13px;
        font-family: "Montserrat", sans-serif;
        margin: 0px 5px;
    }

    .mobilenumber {
        width: 42%;
    }

    .mobilenumber h3 {
        color: rgba(33, 37, 41);

        font-size: 13px;
        font-family: "Montserrat", sans-serif;
        margin: 5px 10px;
        width: 100%;
        font-weight: 600;

    }

    .mobilenumber h3 span {
        color: #5c5d5e;
        font-weight: 600;
        font-size: 13px;
        font-family: "Montserrat", sans-serif;
        margin: 0px 5px;
    }


</style>

<link href="{{ url('assets/css/alert_style.css') }}" rel="stylesheet">
<div class="content-wrapper">

    <div class="row">
        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show w-100" role="alert">
            <span class="text-black alert-text">{{ $errors->first() }}</span>
            <button type="button" class="close" data-dismiss="alert" style="float: right;">&times;</button>
        </div>
        @endif

        @if (session('success'))
        <div class="alert alert-warning alert-dismissible fade show w-100" role="alert">
            <span class="text-black alert-text">{{ session('success') }}</span>
            <button type="button" class="close" data-dismiss="alert" style="float: right;">&times;</button>
        </div>
        @endif
    </div>

    <div class="row ">
        <div class="mb-3 card col-xl-12 ">
            <div class="mt-3 col-xl-12">

                <div class="card-body d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Astrologer Enquiry List - {{ $enquiriesCount }}</h4>
                    <a href="{{ url('enquiry/enquiry-form') }}" class="btn btn-primary">Add New</a>
                </div>

            </div>
        </div>
    </div>

    <form action="{{ url('enquiry/enquiry-list') }}" method="GET">
        <div class="row ">
            <div class="mb-3 card col-xl-12 d-flex">
                <div class="row ">
                    <div class="mt-4 col-xl-3 ">
                        <input type="text" class="form-control" placeholder="Search via name" name="name" value="{{ $name ?? '' }}">
                    </div>
                    <div class="mt-4 col-xl-3 ">
                        <input type="text" class="form-control" placeholder="Search via phone number" name="phone" value="{{ $phone ?? '' }}">
                    </div>
                    <div class="mt-4 col-xl-3 ">
                        <input type="text" class="form-control" placeholder="Search via email" name="email" value="{{ $email ?? '' }}">
                    </div>

                    <div class="mt-1 mb-3 col-xl-3">
                        <div class="card-body">
                            <button class="py-3 btn btn-primary btn-block" type="submit">Search</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>


    <section class="enquirylist" style="flex-wrap: wrap;">
        <div class="newenquiry">

            <div class="user-details">
                @if(isset($enquiries) && $enquiries->count() !=0 )
                    @foreach ($enquiries as $key => $enquiry)
                    <div class="{{ $key % 2 == 0 ? 'info-details' : 'info-details22' }} mt-3"  style="border-radius: 50px 0 0 50px; ">
                        <div class="enquiryimg">
                            <img src="{{ asset('website/astro_link_icon.png') }}" class="mt-2 mb-2 img-fluid rounded-start" alt="..." style="border-radius: 50%;" />
                        </div>
                        <div class="restpartdetails">
                            <div class="profileenquiry">
                                <div class="otherenquiry">
                                        <h3>{{ ucwords($enquiry['name'] ?? '') }}</h3>
                                </div>
                                <?php $isUserExist = \App\Models\User::where('mobile', $enquiry['mobile'])->exists(); ?>
                            @if(!$isUserExist)
                                <div id="remarkbutton" style="background-color:#f9e9cb;border-radius:50px;">
                                    <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown" style="font-weight:600">Action
                                        <ul class="dropdown-menu" role="menu" aria-labelledby="menu1" style="min-width: 109px !important; position: absolute; transform: translate3d(567px, 427px, 0px);top: 3px;left: 0px; will-change: transform;">
                                            <li role="presentation" style="font-size: 13px; font-weight: 600; text-align: center;">
                                                <a data-toggle="modal" onclick="onBoard('{{ url('onboard-user?id=' . $enquiry['id']) }}')">Onboard</a>
                                            </li>
                                            <li role="presentation" style="font-size: 13px; font-weight: 600; text-align: center;">
                                                <a data-toggle="modal" onclick="deleteEnquiry('{{ url('enquiry/remove-enquiry-user?id=' . $enquiry['id']) }}')">Delete</a>
                                            </li>
                                        </ul>
                                    </button>
                                </div>
                            @else
                            <span class="badge badge-warning">
                                <small style="color: #000,font-weight: 600">Onboarded</small>
                                </span>
                            @endif

                            </div>

                        <div class="mt-1 profileenquiry">
                            <div class="mobilenumber">
                                <h3><span>Mobile :</span> {{ ucwords($enquiry['mobile'] ?? '') }}</h3>
                            </div>
                            <div class="emailenquiry">
                                <h3><span>Email :</span>{{ ucwords($enquiry['email'] ?? '') }}</h3>
                            </div>
                        </div>
                        <div class="profileenquiry">
                            <div class="mobilenumber">
                                <h3><span>Expertise :</span><marquee behavior="" direction="">{{ ucwords($enquiry['expertise'] ?? 'N\A') }}</marquee></h3>
                            </div>
                            <div class="emailenquiry">
                                <h3><span>Education :</span>{{ ucwords($enquiry['education'] ?? 'N\A') }}</h3>
                            </div>
                        </div>
                    </div>
                    </div>
                    @endforeach
                @else
                    @include('master.not_found')
                @endif
        </div>
    </div>
</section>

<div class="row">
    <div class="text-center col-sm-12 col-md-5">
        {{ $enquiries->links() }}
    </div>
    <div class="col-sm-12 col-md-7"></div>
</div>
</div>

<div id="right-sidebar" class="settings-panel">
    <i class="settings-close ti-close"></i>
    <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">
                <h6>Message</h6>
            </a>
        </li>
    </ul>
    <div class="tab-content" id="setting-content">
        <div class="tab-pane fade show active scroll-wrapper ps ps--active-y" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
            <h4 class="px-3 mt-1 mb-0 day"></h4>
            <div class="px-3 pt-3 events">
                <div class="mb-2 wrapper d-flex">
                    <!-- <i class="mr-2 ti-control-record text-primary"></i> -->
                    <span class="message"></span>
                </div>
                <i class="mr-2 ti-control-record text-primary"></i>
                <small class="mb-0 font-weight-thin text-gray address"></small>
                <h6 class="mt-4 mb-0 text-gray created_at"></h6>
            </div>

            <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
            </div>
            <div class="ps__rail-y" style="top: 0px; height: 641px; right: 0px;">
                <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 458px;"></div>
            </div>
        </div>
        <!-- To do section tab ends -->
    </div>
</div>

<div class="modal" id="myModal"></div>
<script>
    const openSidebar = (info) => {
        var sidebar = document.getElementById('right-sidebar');
        if (sidebar.classList.contains('open')) {
            sidebar.classList.remove('open');
        } else {
            sidebar.classList.add('open');
        }
        info = JSON.parse(info)

        var dateString = info.created_at;
        var date = new Date(dateString);
        var year = date.getFullYear();
        var month = ("0" + (date.getMonth() + 1)).slice(-2);
        var day = ("0" + date.getDate()).slice(-2);

        // Get the time component (HH:MM:SS)
        var hours = ("0" + date.getHours()).slice(-2);
        var minutes = ("0" + date.getMinutes()).slice(-2);
        var seconds = ("0" + date.getSeconds()).slice(-2);

        // Format the date and time
        var formattedDate = year + "-" + month + "-" + day;
        var formattedTime = hours + ":" + minutes + ":" + seconds;

        document.querySelector('.message').innerHTML = info.message;
        document.querySelector('.day').innerHTML = info.day_time;
        document.querySelector('.address').innerHTML = info.address;
        document.querySelector('.created_at').innerHTML = "Date: " + formattedDate + " " + "Time: " + formattedTime;

    }

    function wideView() {
        document.querySelector('body').classList.add('sidebar-icon-only');
    }
    wideView();

    function onBoard(url) {
    $.get(url, function(rs) {
        $('#myModal').html(rs);
        $('#myModal').modal('show');
    });
    }
    function deleteEnquiry(url){
        window.location.href = url;
    }
</script>
@endsection
