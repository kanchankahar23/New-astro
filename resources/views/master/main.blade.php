@extends('master.master')
@section('title', 'Dashboard')
@section('content')
<style>
    .ag-format-container {
    margin: 0 auto;
    }


    body {
    background-color: #000;
    }
    .ag-courses_box {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: start;
    -ms-flex-align: start;
    align-items: flex-start;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;

    }
    .ag-courses_item {
    -ms-flex-preferred-size: calc(33.33333% - 30px);
    flex-basis: calc(33.33333% - 30px);

    margin: 0 15px 30px;

    overflow: hidden;

    border-radius: 28px;
    }
    .ag-courses-item_link {
    display: block;
    padding: 30px 20px;
    background-color: #ffffff;

    overflow: hidden;

    position: relative;
    }
    .ag-courses-item_link:hover,
    .ag-courses-item_link:hover .ag-courses-item_date {
    text-decoration: none;
    color: #FFF;
    }
    .ag-courses-item_link:hover .ag-courses-item_bg {
    -webkit-transform: scale(10);
    -ms-transform: scale(10);
    transform: scale(10);
    }
    .ag-courses-item_title {
    min-height: 30px;
    margin: 0 0 25px;

    overflow: hidden;

    font-weight: bold;
    font-size: 21px;
    color: #000000;

    z-index: 2;
    position: relative;
    }
    .ag-courses-item_date-box {
    font-size: 18px;
    color: #000000;

    z-index: 2;
    position: relative;
    }
    .ag-courses-item_date {
    font-weight: bold;
    color: #f9b234;

    -webkit-transition: color .5s ease;
    -o-transition: color .5s ease;
    transition: color .5s ease
    }
    .ag-courses-item_bg {
    height: 128px;
    width: 128px;
    background-color: #f9b234;

    z-index: 1;
    position: absolute;
    top: -75px;
    right: -75px;

    border-radius: 50%;

    -webkit-transition: all .5s ease;
    -o-transition: all .5s ease;
    transition: all .5s ease;
    }
    .ag-courses_item:nth-child(2n) .ag-courses-item_bg {
    background-color: #3ecd5e;
    }
    .ag-courses_item:nth-child(3n) .ag-courses-item_bg {
    background-color: #e44002;
    }
    .ag-courses_item:nth-child(4n) .ag-courses-item_bg {
    background-color: #952aff;
    }
    .ag-courses_item:nth-child(5n) .ag-courses-item_bg {
    background-color: #cd3e94;
    }
    .ag-courses_item:nth-child(6n) .ag-courses-item_bg {
    background-color: #4c49ea;
    }



    @media only screen and (max-width: 979px) {
    .ag-courses_item {
    -ms-flex-preferred-size: calc(50% - 30px);
    flex-basis: calc(50% - 30px);
    }
    .ag-courses-item_title {
    font-size: 24px;
    }
    }

    @media only screen and (max-width: 767px) {
    .ag-format-container {
    width: 96%;
    }

    }
    @media only screen and (max-width: 639px) {
    .ag-courses_item {
    -ms-flex-preferred-size: 100%;
    flex-basis: 100%;
    }
    .ag-courses-item_title {
    min-height: 72px;
    line-height: 1;

    font-size: 24px;
    }
    .ag-courses-item_link {
    padding: 22px 40px;
    }
    .ag-courses-item_date-box {
    font-size: 16px;
    }
    }
</style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Welcome {{ Auth::user()->name
                            }}</h3>
                        <h6 class="font-weight-normal mb-0">
                            Wel come to Astro buddy dashboard.
                            <span class="text-primary"></span>
                        </h6>
                    </div>
                    <div class="col-12 col-xl-4">
                        <div class="justify-content-end d-flex">
                            <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                                <button
                                    class="btn btn-sm btn-light bg-white dropdown-toggle"
                                    type="button" id="dropdownMenuDate2"
                                    data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="true">
                                    <i class="mdi mdi-calendar"></i>
                                    Today ({{ \Carbon\Carbon::now()->format('d M,
                                    Y') }})
                                </button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card tale-bg">
                    <div class="card-people mt-auto">
                        <img src="{{ asset('assets/images/dashboard/people.svg') }}"
                            alt="people" />
                        <div class="weather-info">
                            <div class="d-flex">
                                <div>
                                    <h2 class="mb-0 font-weight-normal">
                                        <i class="icon-sun mr-2"></i>31<sup>C</sup>
                                    </h2>
                                </div>
                                <div class="ml-2">
                                    <h4 class="location font-weight-normal">
                                        Jabalpur
                                    </h4>
                                    <h6 class="font-weight-normal">India</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin transparent">
                <div class="row">
                    <div class="col-md-6 mb-4 stretch-card transparent">
                        <div class="card card-tale">
                            <div class="card-body">
                                <p class="mb-4">Onboarded Astrologer's</p>
                                <p class="fs-30 mb-2">{{ $astrologers->total() }}
                                </p>
                                <a href="{{ url('all-astrologer') }}"
                                    style="color:#fff">View All</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4 stretch-card transparent">
                        <div class="card card-dark-blue">
                            <div class="card-body">
                                <p class="mb-4">Total User's</p>
                                <p class="fs-30 mb-2">{{ $users->total() }}</p>
                                <a href="{{ url('all-user') }}"
                                    style="color:#fff">View All</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                        <div class="card card-light-blue">
                            <div class="card-body">
                                <p class="mb-4">Today's Appoiment's</p>
                                <p class="fs-30 mb-2">{{ $appointments->total() }}
                                </p>
                                <a href="{{ url('all-appointment') }}"
                                    style="color:#fff">View All</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 stretch-card transparent">
                        <div class="card card-light-danger">
                            <div class="card-body">
                                <p class="mb-4">Recieved Appoiment's</p>
                                <p class="fs-30 mb-2">{{ $appointments->total() }}
                                </p>
                                <a href="{{ url('not-today-appointment') }}"
                                    style="color:#fff">View All</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ag-format-container">
            <div class="ag-courses_box">

                <div class="ag-courses_item">
                    <a href="{{ url('website-enquiry/user') }}" class="ag-courses-item_link">
                        <div class="ag-courses-item_bg"></div>
                        <div class="ag-courses-item_title">
                             User Enquiry
                        </div>
                        <div class="ag-courses-item_date-box">
                            Total :-
                            <span class="ag-courses-item_date">
                                {{ $totalUserEnquiry }}
                            </span>
                        </div>
                    </a>
                </div>
                <div class="ag-courses_item">
                    <a href="{{ url('website-enquiry/astrologer') }}" class="ag-courses-item_link">
                        <div class="ag-courses-item_bg"></div>

                        <div class="ag-courses-item_title">
                            Astrologer Enquiry
                        </div>

                        <div class="ag-courses-item_date-box">
                            Total :-
                            <span class="ag-courses-item_date">
                                {{ $totalAstrologerEnquiry }}
                            </span>
                        </div>
                    </a>
                </div>
                <div class="ag-courses_item">
                    <a href="{{ url('/website-enquiry') }}" class="ag-courses-item_link">
                        <div class="ag-courses-item_bg"></div>

                        <div class="ag-courses-item_title">
                            Website Enquiry
                        </div>

                        <div class="ag-courses-item_date-box">
                            Total :-
                            <span class="ag-courses-item_date">
                                {{ $totalWebsiteEnquiry }}
                            </span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="ag-format-container">
            <div class="ag-courses_box">

                <div class="ag-courses_item">
                    <a href="{{ url('wallet-history') }}" class="ag-courses-item_link">
                        <div class="ag-courses-item_bg"></div>

                        <div class="ag-courses-item_title">
                            Wallet Amount
                        </div>

                        <div class="ag-courses-item_date-box">
                            Total :-
                            <span class="ag-courses-item_date">
                              &#8377; {{ $walletAmount }}
                            </span>
                        </div>
                    </a>
                </div>
                <div class="ag-courses_item">
                    <a href="{{ url('kundli-users') }}" class="ag-courses-item_link">
                        <div class="ag-courses-item_bg"></div>

                        <div class="ag-courses-item_title">
                           Kundli Users
                        </div>

                        <div class="ag-courses-item_date-box">
                            Total :-
                            <span class="ag-courses-item_date">
                                {{ $kundliUsers }}
                            </span>
                        </div>
                    </a>
                </div>
                <div class="ag-courses_item">
                    <a href="{{ url('kundli-matching-users') }}" class="ag-courses-item_link">
                        <div class="ag-courses-item_bg"></div>

                        <div class="ag-courses-item_title">
                           Total Kundli Matching
                        </div>

                        <div class="ag-courses-item_date-box">
                            Total :-
                            <span class="ag-courses-item_date">
                                {{ $kundliMatchingUsers }}
                            </span>
                        </div>
                    </a>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                        <p class="card-title">User Details</p>
                        <p class="font-weight-500">
                            The total number of user, astrologer, success
                            apointments , onboarded astrologer etc.
                        </p>
                        <div class="d-flex flex-wrap mb-5">
                            <div class="mr-3 mt-3">
                                <p class="text-muted">Astrologer's</p>
                                <h3 class="text-primary fs-30 font-weight-medium">
                                    {{ $astrologers->total() }}
                                </h3>
                            </div>
                            <div class="mr-3 mt-3">
                                <p class="text-muted">User</p>
                                <h3 class="text-primary fs-30 font-weight-medium">{{
                                    $users->total() }}</h3>
                            </div>
                            <div class="mr-3 mt-3">
                                <p class="text-muted">Appoiment</p>
                                <h3 class="text-primary fs-30 font-weight-medium">{{
                                    $appointments->total() }}</h3>
                            </div>
                            <div class="mt-3">
                                <p class="text-muted">Satisfied Users</p>
                                <h3 class="text-primary fs-30 font-weight-medium">
                                    {{ $appointments->total() }}
                                </h3>
                            </div>
                        </div>
                        <canvas id="lineChart" width="1074" height="536"
                            style="display: block; width: 537px; height: 268px"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="card-title">Astrologer Report</p>
                            <a href="#" class="text-info">View all</a>
                        </div>
                        <p class="font-weight-500">
                            The total number of user, astrologer, success
                            apointments , onboarded astrologer etc.
                        </p>
                        <div id="sales-legend" class="chartjs-legend mt-4 mb-2">
                            <ul class="1-legend">
                                <li>
                                    <span style="
                                                background-color: rgb(
                                                    152,
                                                    189,
                                                    255
                                                );
                                            "></span>Astrologer
                                </li>
                                <li>
                                    <span style="
                                                background-color: rgb(75, 73, 172);
                                            "></span>User
                                </li>
                            </ul>
                        </div>
                        <canvas id="barChart" width="1074" height="536"
                            style="display: block; width: 537px; height: 268px"
                            class="chartjs-render-monitor"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card position-relative">
                    <div class="card-body">
                        <div id="detailedReports"
                            class="carousel slide detailed-report-carousel position-static pt-2"
                            data-ride="carousel">
                            <div class="carousel-inner">
                                <div
                                    class="carousel-item active carousel-item-left">
                                    <div class="row">
                                        <div
                                            class="col-md-12 col-xl-3 d-flex flex-column justify-content-start">
                                            <div class="ml-xl-4 mt-3">
                                                <p class="card-title">
                                                    Detailed Reports
                                                </p>
                                                <h1 class="text-primary">
                                                    34040
                                                </h1>
                                                <h3
                                                    class="font-weight-500 mb-xl-4 text-primary">
                                                    India
                                                </h3>
                                                <p class="mb-2 mb-xl-0">
                                                    The total number of user,
                                                    astrologer, success apointments
                                                    ,
                                                    onboarded astrologer etc.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-xl-9">
                                            <div class="row">
                                                <div class="col-md-6 border-right">
                                                    <div
                                                        class="table-responsive mb-3 mb-md-0 mt-3">
                                                        <table
                                                            class="table table-borderless report-table">
                                                            <tbody>
                                                                <tr>
                                                                    <td
                                                                        class="text-muted">
                                                                        Indore
                                                                    </td>
                                                                    <td
                                                                        class="w-100 px-0">
                                                                        <div
                                                                            class="progress progress-md mx-4">
                                                                            <div class="progress-bar bg-primary"
                                                                                role="progressbar"
                                                                                style="
                                                                                        width: 70%;
                                                                                    "
                                                                                aria-valuenow="70"
                                                                                aria-valuemin="0"
                                                                                aria-valuemax="100">
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <h5
                                                                            class="font-weight-bold mb-0">
                                                                            713
                                                                        </h5>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td
                                                                        class="text-muted">
                                                                        Bhopal
                                                                    </td>
                                                                    <td
                                                                        class="w-100 px-0">
                                                                        <div
                                                                            class="progress progress-md mx-4">
                                                                            <div class="progress-bar bg-warning"
                                                                                role="progressbar"
                                                                                style="
                                                                                        width: 30%;
                                                                                    "
                                                                                aria-valuenow="30"
                                                                                aria-valuemin="0"
                                                                                aria-valuemax="100">
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <h5
                                                                            class="font-weight-bold mb-0">
                                                                            583
                                                                        </h5>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td
                                                                        class="text-muted">
                                                                        Jabalpur
                                                                    </td>
                                                                    <td
                                                                        class="w-100 px-0">
                                                                        <div
                                                                            class="progress progress-md mx-4">
                                                                            <div class="progress-bar bg-danger"
                                                                                role="progressbar"
                                                                                style="
                                                                                        width: 95%;
                                                                                    "
                                                                                aria-valuenow="95"
                                                                                aria-valuemin="0"
                                                                                aria-valuemax="100">
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <h5
                                                                            class="font-weight-bold mb-0">
                                                                            924
                                                                        </h5>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td
                                                                        class="text-muted">
                                                                        Balaghat
                                                                    </td>
                                                                    <td
                                                                        class="w-100 px-0">
                                                                        <div
                                                                            class="progress progress-md mx-4">
                                                                            <div class="progress-bar bg-info"
                                                                                role="progressbar"
                                                                                style="
                                                                                        width: 60%;
                                                                                    "
                                                                                aria-valuenow="60"
                                                                                aria-valuemin="0"
                                                                                aria-valuemax="100">
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <h5
                                                                            class="font-weight-bold mb-0">
                                                                            664
                                                                        </h5>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td
                                                                        class="text-muted">
                                                                        Mandla
                                                                    </td>
                                                                    <td
                                                                        class="w-100 px-0">
                                                                        <div
                                                                            class="progress progress-md mx-4">
                                                                            <div class="progress-bar bg-primary"
                                                                                role="progressbar"
                                                                                style="
                                                                                        width: 40%;
                                                                                    "
                                                                                aria-valuenow="40"
                                                                                aria-valuemin="0"
                                                                                aria-valuemax="100">
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <h5
                                                                            class="font-weight-bold mb-0">
                                                                            560
                                                                        </h5>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td
                                                                        class="text-muted">
                                                                        Chhatarpur
                                                                    </td>
                                                                    <td
                                                                        class="w-100 px-0">
                                                                        <div
                                                                            class="progress progress-md mx-4">
                                                                            <div class="progress-bar bg-danger"
                                                                                role="progressbar"
                                                                                style="
                                                                                        width: 75%;
                                                                                    "
                                                                                aria-valuenow="75"
                                                                                aria-valuemin="0"
                                                                                aria-valuemax="100">
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <h5
                                                                            class="font-weight-bold mb-0">
                                                                            793
                                                                        </h5>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mt-3">
                                                    <div
                                                        class="chartjs-size-monitor">
                                                        <div
                                                            class="chartjs-size-monitor-expand">
                                                            <div class=""></div>
                                                        </div>
                                                        <div
                                                            class="chartjs-size-monitor-shrink">
                                                            <div class=""></div>
                                                        </div>
                                                    </div>
                                                    <canvas id="doughnutChart"
                                                        width="820" height="410"
                                                        style="
                                                                display: block;
                                                                width: 410px;
                                                                height: 205px;
                                                            "
                                                        class="chartjs-render-monitor"></canvas>
                                                    <div id="north-america-legend">
                                                        <div class="report-chart">
                                                            <div
                                                                class="d-flex justify-content-between mx-4 mx-xl-5 mt-3">
                                                                <div
                                                                    class="d-flex align-items-center">
                                                                    <div class="mr-3"
                                                                        style="
                                                                                width: 20px;
                                                                                height: 20px;
                                                                                border-radius: 50%;
                                                                                background-color: #4b49ac;
                                                                            ">
                                                                    </div>
                                                                    <p class="mb-0">
                                                                        Users
                                                                    </p>
                                                                </div>
                                                                <p class="mb-0">
                                                                    {{
                                                                    $users->total()
                                                                    }}
                                                                </p>
                                                            </div>
                                                            <div
                                                                class="d-flex justify-content-between mx-4 mx-xl-5 mt-3">
                                                                <div
                                                                    class="d-flex align-items-center">
                                                                    <div class="mr-3"
                                                                        style="
                                                                                width: 20px;
                                                                                height: 20px;
                                                                                border-radius: 50%;
                                                                                background-color: #ffc100;
                                                                            ">
                                                                    </div>
                                                                    <p class="mb-0">
                                                                        Astrologer

                                                                    </p>
                                                                </div>
                                                                <p class="mb-0">
                                                                    {{
                                                                    $astrologers->total()
                                                                    }}
                                                                </p>
                                                            </div>
                                                            <div
                                                                class="d-flex justify-content-between mx-4 mx-xl-5 mt-3">
                                                                <div
                                                                    class="d-flex align-items-center">
                                                                    <div class="mr-3"
                                                                        style="
                                                                                width: 20px;
                                                                                height: 20px;
                                                                                border-radius: 50%;
                                                                                background-color: #248afd;
                                                                            ">
                                                                    </div>
                                                                    <p class="mb-0">
                                                                        Appointment
                                                                    </p>
                                                                </div>
                                                                <p class="mb-0">
                                                                    {{
                                                                    $appointments->total()
                                                                    }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="carousel-item carousel-item-next carousel-item-left">
                                    <div class="row">
                                        <div
                                            class="col-md-12 col-xl-3 d-flex flex-column justify-content-start">
                                            <div class="ml-xl-4 mt-3">
                                                <p class="card-title">
                                                    Detailed Reports
                                                </p>
                                                <h1 class="text-primary">
                                                    34040
                                                </h1>
                                                <h3
                                                    class="font-weight-500 mb-xl-4 text-primary">
                                                    India
                                                </h3>
                                                <p class="mb-2 mb-xl-0">
                                                    The total number of user,
                                                    astrologer, success apointments
                                                    ,
                                                    onboarded astrologer etc.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-xl-9">
                                            <div class="row">
                                                <div class="col-md-6 border-right">
                                                    <div
                                                        class="table-responsive mb-3 mb-md-0 mt-3">
                                                        <table
                                                            class="table table-borderless report-table">
                                                            <tbody>
                                                                <tr>
                                                                    <td
                                                                        class="text-muted">
                                                                        Indore
                                                                    </td>
                                                                    <td
                                                                        class="w-100 px-0">
                                                                        <div
                                                                            class="progress progress-md mx-4">
                                                                            <div class="progress-bar bg-primary"
                                                                                role="progressbar"
                                                                                style="
                                                                                        width: 70%;
                                                                                    "
                                                                                aria-valuenow="70"
                                                                                aria-valuemin="0"
                                                                                aria-valuemax="100">
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <h5
                                                                            class="font-weight-bold mb-0">
                                                                            713
                                                                        </h5>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td
                                                                        class="text-muted">
                                                                        Bhopal
                                                                    </td>
                                                                    <td
                                                                        class="w-100 px-0">
                                                                        <div
                                                                            class="progress progress-md mx-4">
                                                                            <div class="progress-bar bg-warning"
                                                                                role="progressbar"
                                                                                style="
                                                                                        width: 30%;
                                                                                    "
                                                                                aria-valuenow="30"
                                                                                aria-valuemin="0"
                                                                                aria-valuemax="100">
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <h5
                                                                            class="font-weight-bold mb-0">
                                                                            583
                                                                        </h5>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td
                                                                        class="text-muted">
                                                                        Jabalpur
                                                                    </td>
                                                                    <td
                                                                        class="w-100 px-0">
                                                                        <div
                                                                            class="progress progress-md mx-4">
                                                                            <div class="progress-bar bg-danger"
                                                                                role="progressbar"
                                                                                style="
                                                                                        width: 95%;
                                                                                    "
                                                                                aria-valuenow="95"
                                                                                aria-valuemin="0"
                                                                                aria-valuemax="100">
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <h5
                                                                            class="font-weight-bold mb-0">
                                                                            924
                                                                        </h5>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td
                                                                        class="text-muted">
                                                                        Balaghat
                                                                    </td>
                                                                    <td
                                                                        class="w-100 px-0">
                                                                        <div
                                                                            class="progress progress-md mx-4">
                                                                            <div class="progress-bar bg-info"
                                                                                role="progressbar"
                                                                                style="
                                                                                        width: 60%;
                                                                                    "
                                                                                aria-valuenow="60"
                                                                                aria-valuemin="0"
                                                                                aria-valuemax="100">
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <h5
                                                                            class="font-weight-bold mb-0">
                                                                            664
                                                                        </h5>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td
                                                                        class="text-muted">
                                                                        Mandla
                                                                    </td>
                                                                    <td
                                                                        class="w-100 px-0">
                                                                        <div
                                                                            class="progress progress-md mx-4">
                                                                            <div class="progress-bar bg-primary"
                                                                                role="progressbar"
                                                                                style="
                                                                                        width: 40%;
                                                                                    "
                                                                                aria-valuenow="40"
                                                                                aria-valuemin="0"
                                                                                aria-valuemax="100">
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <h5
                                                                            class="font-weight-bold mb-0">
                                                                            560
                                                                        </h5>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td
                                                                        class="text-muted">
                                                                        Chhatarpur
                                                                    </td>
                                                                    <td
                                                                        class="w-100 px-0">
                                                                        <div
                                                                            class="progress progress-md mx-4">
                                                                            <div class="progress-bar bg-danger"
                                                                                role="progressbar"
                                                                                style="
                                                                                        width: 75%;
                                                                                    "
                                                                                aria-valuenow="75"
                                                                                aria-valuemin="0"
                                                                                aria-valuemax="100">
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <h5
                                                                            class="font-weight-bold mb-0">
                                                                            793
                                                                        </h5>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mt-3">
                                                    <div
                                                        class="chartjs-size-monitor">
                                                        <div
                                                            class="chartjs-size-monitor-expand">
                                                            <div class=""></div>
                                                        </div>
                                                        <div
                                                            class="chartjs-size-monitor-shrink">
                                                            <div class=""></div>
                                                        </div>
                                                    </div>
                                                    <canvas id="south-america-chart"
                                                        height="410"
                                                        class="chartjs-render-monitor"
                                                        style="
                                                                display: block;
                                                                width: 410px;
                                                                height: 205px;
                                                            " width="820"></canvas>
                                                    <div id="south-america-legend">
                                                        <div class="report-chart">
                                                            <div
                                                                class="d-flex justify-content-between mx-4 mx-xl-5 mt-3">
                                                                <div
                                                                    class="d-flex align-items-center">
                                                                    <div class="mr-3"
                                                                        style="
                                                                                width: 20px;
                                                                                height: 20px;
                                                                                border-radius: 50%;
                                                                                background-color: #4b49ac;
                                                                            ">
                                                                    </div>
                                                                    <p class="mb-0">
                                                                        Anually
                                                                        Calling
                                                                    </p>
                                                                </div>
                                                                <p class="mb-0">
                                                                    495343
                                                                </p>
                                                            </div>
                                                            <div
                                                                class="d-flex justify-content-between mx-4 mx-xl-5 mt-3">
                                                                <div
                                                                    class="d-flex align-items-center">
                                                                    <div class="mr-3"
                                                                        style="
                                                                                width: 20px;
                                                                                height: 20px;
                                                                                border-radius: 50%;
                                                                                background-color: #ffc100;
                                                                            ">
                                                                    </div>
                                                                    <p class="mb-0">
                                                                        Online
                                                                        sales
                                                                    </p>
                                                                </div>
                                                                <p class="mb-0">
                                                                    630983
                                                                </p>
                                                            </div>
                                                            <div
                                                                class="d-flex justify-content-between mx-4 mx-xl-5 mt-3">
                                                                <div
                                                                    class="d-flex align-items-center">
                                                                    <div class="mr-3"
                                                                        style="width: 20px;height: 20px; border-radius: 50%; background-color: #248afd;">
                                                                    </div>
                                                                    <p class="mb-0">
                                                                        Three Month
                                                                        Calling</p>
                                                                </div>
                                                                <p class="mb-0">
                                                                    290831
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#detailedReports"
                                role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon"
                                    aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#detailedReports"
                                role="button" data-slide="next">
                                <span class="carousel-control-next-icon"
                                    aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span
                class="text-muted text-center text-sm-left d-block d-sm-inline-block">
                <p>Copyright © {{ now()->year }}. Premium</p>
                <a href="{{ url('admin/dashboard') }}" target="_blank">Astro Buddy
                    Dashboard</a>
                from Astro-buddy. All rights reserved.
            </span>
            <span
                class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Astro-Buddy
                &amp; made with
                <i class="ti-heart text-danger ml-1"></i></span>
        </div>

    </footer>

    <script>
        // Data passed from the Laravel Controller
        var months = @json(array_values($months)); // Month labels
        var usersCount = @json(array_values($monthlyUsers));
        var appointmentsCount = @json(array_values($monthlyAppointments));
        var astrologersCount = @json(array_values($monthlyAstrologers));

        // Fill in missing months with 0 if data is not available for that month
        function fillMissingMonths(data) {
            let filledData = [];
            for (let i = 1; i <= 12; i++) {
                filledData.push(data[i] ? data[i] : 0);
            }
            return filledData;
        }

        usersCount = fillMissingMonths(usersCount);
        appointmentsCount = fillMissingMonths(appointmentsCount);
        astrologersCount = fillMissingMonths(astrologersCount);

        // Line Chart (Monthly Data)
        var lineCtx = document.getElementById('lineChart').getContext('2d');
        new Chart(lineCtx, {
            type: 'line',
            data: {
                labels: months, // Month names
                datasets: [{
                        label: 'Users',
                        data: usersCount,
                        borderColor: 'blue',
                        backgroundColor: 'rgba(0, 0, 255, 0.2)',
                        fill: true,
                        tension: 0.4
                    },
                    {
                        label: 'Appointments',
                        data: appointmentsCount,
                        borderColor: 'red',
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        fill: true,
                        tension: 0.4
                    }
                ]
            }
        });

        // Bar Chart (Monthly Data for users and appointments)
        var barCtx = document.getElementById('barChart').getContext('2d');
        new Chart(barCtx, {
            type: 'bar',
            data: {
                labels: months, // Month names
                datasets: [{
                        label: 'Users',
                        data: usersCount,
                        backgroundColor: 'blue',
                        borderColor: 'blue',
                        borderWidth: 1
                    },
                    {
                        label: 'Appointments',
                        data: appointmentsCount,
                        backgroundColor: 'lightblue',
                        borderColor: 'lightblue',
                        borderWidth: 1
                    }
                ]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Doughnut Chart (Users, Appointments, Astrologers)
        var doughnutCtx = document.getElementById('doughnutChart').getContext('2d');
        new Chart(doughnutCtx, {
            type: 'doughnut',
            data: {
                labels: ['Users', 'Appointments', 'Astrologers'],
                datasets: [{
                    data: [usersCount.reduce((a, b) => a + b, 0), appointmentsCount.reduce((a, b) => a + b,
                        0), astrologersCount.reduce((a, b) => a + b, 0)],
                    backgroundColor: ['blue', 'yellow', 'red'],
                    hoverOffset: 4
                }]
            }
        });
    </script>

@endsection
