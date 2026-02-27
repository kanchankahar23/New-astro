@extends('master.master') @section('title', 'Enquiry List') @section('content')

<head>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet" />
    <link href="{{ url('assets/css/astrologer_style.css') }}" rel="stylesheet" />
</head>
<style>
    .tag {
        font-size: 13px;
        font-weight: 600;
        text-align: center;
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
            <div class="mt-3 col-xl-4">
                <div class="card-body">
                    <h4 class="card-title">Onboarded Astrologers</h4>
                </div>
            </div>
        </div>
    </div>
    <form action="{{ url('onboarded-astrologer') }}" method="Post" enctype="multipart/form-data">@csrf
        <div class="row ">
            <div class="mb-3 card col-xl-12 d-flex">
                <div class="row ">
                    <div class="mt-4 col-xl-3 ">
                        <input type="text" class="form-control" placeholder="Search via name" name="name"
                            value="{{ $name ?? '' }}">
                    </div>
                    <div class="mt-4 col-xl-3 ">
                        <input type="text" class="form-control" placeholder="Search via phone number" name="phone"
                            value="{{ $phone ?? '' }}">
                    </div>
                    <div class="mt-4 col-xl-3 ">
                        <input type="text" class="form-control" placeholder="Search via email" name="email"
                            value="{{ $email ?? '' }}">
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
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"
            aria-label="Close"></button>
    </div>
    @endif
    @if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"
            aria-label="Close"></button>
    </div>
    @endif
    <table id="example1"
        class="table display expandable-table dataTable no-footer table-responsive table-striped table-hover"
        style="width: 100%;" role="grid">
        <thead>
            <tr>
                <th>
                    Sr. No.
                </th>
                <th>
                    Astrologer Name
                </th>
                <th>
                    Tag asign
                </th>
                <th>
                    Astrologer Percent
                </th>
                <th>
                    Charge Per Minutes
                </th>
                <th>
                    Mobile
                </th>
                <th>
                    Email
                </th>
                <th>
                    Expertise
                </th>
                <th>
                    Education
                </th>
                <th>
                    Conversation Type
                </th>
                <th>
                    Wallet Amount
                </th>

                <th>
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @if(isset($users) && $users->count() != 0)
            @foreach ($users as $key => $user)
            @php
            $conversationTypes = $user->astrologerDetail->conversation_type;
            @endphp
            <tr>
                <td class="py-1">
                    {{ ++$key }}.
                </td>
                <td class="py-1" style="display: flex;justify-content: start;">
                    <div>
                        <img src="{{ url($user->thumb() ?? 'user_image/dummy.jpg') }}"
                            class="mt-2 mb-2 img-fluid rounded-start" alt="..." style="width: 40px;
                                                    border-radius: 20px;" />
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="p-3">
                            <h6>{{ ucwords($user['name']?? "") }} @if(isset($user->last_seen) && $user->last_seen >= now()->subMinutes(5))
                            <i style="font-size: 10px; color: #4fe005;" class="fas solid fa-circle"></i>
                            @endif</h6>
                        </div>
                    </div>
                </td>
                <td>
                        {{ ucwords($user->astrologerDetail->getTag->name ?? "No Tag Asign") }}
                </td>
                <td class="py-1">
                    {{ ucwords($user->astrologerDetail->agreement_percent ?? '') }}
                    %
                </td>
                <td class="py-1">
                    &#8377; {{ ucwords($user->astrologerDetail->charge_per_min ??
                    '') }}
                </td>
                <td class="py-1">
                    {{ ucwords($user['mobile'] ?? '') }}
                </td>
                <td class="py-1">
                    {{ $user['email'] ?? ''}}
                </td>
                <td class="">
                    {{ ucwords($user->astrologerDetail->expertise ?? '') }}
                </td>
                <td class="">
                    {{ ucwords($user->astrologerDetail->getEnquiryDetails->education
                    ?? '-') }}
                </td>
                <td class="">
                    @if ($conversationTypes)
                    {{ ucfirst($conversationTypes) }},
                    @else
                    Nothing Selected
                    @endif
                </td>
                <td class="">
                    {{ getAstrologerWalletBalance($user->id) }}
                </td>

                <td>
                    <div id="remarkbutton" style="background-color:#f9e9cb;">
                        <button class="btn btn-default dropdown-toggle"
                            type="button" id="menu1" data-toggle="dropdown"
                            style="font-weight:600">Action
                            <ul class="dropdown-menu" role="menu"
                                aria-labelledby="menu1"
                                style="min-width: 109px !important; position: absolute; transform: translate3d(567px, 427px, 0px);top: 3px;left: 0px; will-change: transform;">
                                <li role="presentation" class="tag"><a data-toggle="modal"
                                        onclick="onBoard('{{ url('asign-tag-model?id=' . $user['id']) }}')">Tag</a>
                                </li>
                                <li role="presentation" class="tag"><a
                                        data-toggle="modal"
                                        onclick="onBoard('{{ url('astrologer-gallery?id=' . $user['id']) }}')">Gallery</a>
                                </li>
                                <li role="presentation" class="tag">
                                    <a data-toggle="modal"
                                        onclick="onBoard('{{ url('edit-astrologer?id=' . $user['id']) }}')">Edit
                                        Astrologer</a>
                                    {{-- <a
                                        href="{{ url('edit-astrologer', $user->id )}}">Edit
                                        Atrologer</a> --}}
                                </li>
                                <li role="presentation" class="tag">
                                    <a data-toggle="modal"
                                        onclick="onBoard('{{ url('astrologer-payment-model?id=' . $user['id']) }}')" >Payment
                                        Astrologer</a>

                                </li>
                            </ul>
                        </button>
                    </div>
                </td>
            </tr>
            @endforeach
            @else
            @include('master.not_found')
            @endif
        </tbody>
    </table>
    <div class="row">
        <div class="text-center col-sm-12 col-md-5">
            {{ $users->links() }}
        </div>
        <div class="col-sm-12 col-md-7"></div>
    </div>
</div>

<div id="right-sidebar" class="settings-panel">
    <i class="settings-close ti-close"></i>
    <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab"
                aria-controls="todo-section" aria-expanded="true">
                <h6>Message</h6>
            </a>
        </li>
    </ul>
    <div class="tab-content" id="setting-content">
        <div class="tab-pane fade show active scroll-wrapper ps ps--active-y" id="todo-section" role="tabpanel"
            aria-labelledby="todo-section">
            <h4 class="px-3 mt-1 mb-0 day"></h4>
            <div class="px-3 pt-3 events">
                <div class="mb-2 wrapper d-flex">
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
    function onBoard(url) {
        $.get(url, function(rs) {
            $('#myModal').html(rs);
            $('#myModal').modal('show');
        });
    }

</script>

@endsection
