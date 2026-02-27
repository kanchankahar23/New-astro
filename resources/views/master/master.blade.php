<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->

        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />
        <title>@yield('title')</title>
        <!-- plugins:css -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="{{url('assets/css/materialdesignicons.min.css')}}">
        <link rel="icon" href="{{asset('website/astro_link_icon.ico')}}"  />

        <link
            rel="stylesheet"
            href="{{ asset('assets/vendors/feather/feather.css') }}"
        />
        <link
            rel="stylesheet"
            href="{{ asset('assets/vendors/ti-icons/css/themify-icons.css') }}"
        />
        <link
            rel="stylesheet"
            href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}"
        />
        <!-- endinject -->
        <!-- Plugin css for this page -->
        <link
            rel="stylesheet"
            href="{{
                asset(
                    'assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css'
                )
            }}"
        />
        <link
            rel="stylesheet"
            href="{{ asset('assets/vendors/ti-icons/css/themify-icons.css') }}"
        />
        <link
            rel="stylesheet"
            type="text/css"
            href="{{ asset('assets/js/select.dataTables.min.css') }}"
        />
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <link
            rel="stylesheet"
            href="{{ asset('assets/css/vertical-layout-light/style.css') }}"
        />


        <!-- endinject -->
        <link rel="icon" href="{{asset('website/astro_link_icon.png')}}" sizes="32x32" />
        <style>
            ::-webkit-scrollbar {

            width: 5px;

            }

            ::-webkit-scrollbar-thumb {

            background-color: #888;

            border-radius: 5px;

            }
        </style>
    </head>
    <body>
        <div class="container-scroller">
            @include('master.header')
            <div class="container-fluid page-body-wrapper" style="height: 604px;">
                @include('master.sidebar')
                <div style="overflow: auto;height: 580px;" class="main-panel">
                @yield('content')
                </div>
            </div>
        </div>
        <script src="{{
                asset('assets/vendors/js/vendor.bundle.base.js')
            }}"></script>
        <!-- endinject -->
        <!-- Plugin js for this page -->
        <script src="{{
                asset('assets/vendors/chart.js/Chart.min.js')
            }}"></script>
        <!-- <script src="{{
                asset('assets/vendors/datatables.net/jquery.dataTables.js')
            }}"></script> -->
        <script src="{{
                asset(
                    'assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js'
                )
            }}"></script>
        <script src="{{
                asset('assets/js/dataTables.select.min.js')
            }}"></script>
        <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
        <script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>
        <script src="{{ asset('assets/js/template.js') }}"></script>
        <script src="{{ asset('assets/js/settings.js') }}"></script>
        <script src="{{ asset('assets/js/todolist.js') }}"></script>

        <script src="{{ asset('assets/js/dashboard.js') }}"></script>
        <script src="{{
                asset('assets/js/Chart.roundedBarCharts.js')
            }}"></script>    </body>
</html>
