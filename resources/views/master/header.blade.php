
<link rel="stylesheet" href="url('css/app.css')">
<link rel="stylesheet" href="{{ url('assets/css/all.min.css')}}">
<nav class="flex-row p-0 navbar col-lg-12 col-12 fixed-top d-flex">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="mr-5 navbar-brand brand-logo" href="{{ url('admin/dashboard')}}">
        <img src="{{ asset('website/astro_link_icon.png') }}" class="ml-2" alt="logo"/>
        <!-- <img src="{{ asset('website/astro_icon.jpg') }}" class="mr-2" alt="logo"/> -->
         <h3 class='FontOfAstro' style="display:inline">ASTROBUDDY</h3>
        </a>
        <a class="navbar-brand brand-logo-mini" href="{{ url('admin/dashboard')}}">
        <img src="{{ asset('website/astro_link_icon.png') }}"alt="logo"/></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav mr-lg-2">
            <li class="nav-item nav-search d-none d-lg-block">
                <div class="input-group">
                    <div
                        class="input-group-prepend hover-cursor"
                        id="navbar-search-icon"
                    >
                        <span class="input-group-text" id="search">
                            <i class="icon-search"></i>
                        </span>
                    </div>
                    <input
                        type="text"
                        class="form-control"
                        id="navbar-search-input"
                        placeholder="Search now"
                        aria-label="search"
                        aria-describedby="search"
                    />
                </div>
            </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item dropdown">
                <a
                    class="nav-link count-indicator dropdown-toggle"
                    id="notificationDropdown"
                    href="#"
                    data-toggle="dropdown"
                >
                    <i class="mx-0 icon-bell"></i>
                    <span class="count"></span>
                </a>
                <div
                    class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                    aria-labelledby="notificationDropdown"
                >




                </div>
            </li>
            <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle"
                    href="#"
                    data-toggle="dropdown"
                    id="profileDropdown">
                @php
                     $image = Auth::user();
                     $avtar = $image->avtar() ?? 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png';
                @endphp
                    <img
                    src="{{ url($avtar) }}"
                        alt="profile"
                    />
                </a>
                <div
                    class="dropdown-menu dropdown-menu-right navbar-dropdown"
                    aria-labelledby="profileDropdown"
                >
                    <a class="dropdown-item" onclick="userInfo()">
                        <i class="ti-settings text-primary"></i>
                        Settings
                    </a>
                    <a class="dropdown-item" href="{{ url('/logout') }}">
                        <i class="ti-power-off text-primary"></i>
                        Logout
                    </a>
                </div>
            </li>
            <!-- <li class="nav-item nav-settings d-none d-lg-flex">
                <a class="nav-link" href="#">
                    <i class="icon-ellipsis"></i>
                </a>
            </li> -->
        </ul>
        <button
            class="navbar-toggler navbar-toggler-right d-lg-none align-self-center"
            type="button"
            data-toggle="offcanvas"
        >
            <span class="icon-menu"></span>
        </button>
    </div>
</nav>
<div id="user-details" class="settings-panel">
    <i class="settings-close ti-close" onclick="userInfo()"></i>
    <ul class="nav nav-tabs border-top bgl bgl-dark" id="setting-panel" role="tablist">
      <li class="nav-item bgl-dark">
        <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true"> <h3>User Details</h3></a>
      </li>
    </ul>
    <div class="tab-content" id="setting-content" style="overflow: hidden;">
      <div class="tab-pane fade show active scroll-wrapper ps ps--active-y" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
        <h4 class="px-3 mt-1 mb-0 day" ></h4>
        <div class="px-3 pt-3 events">
          <div class="mb-2 wrapper d-flex">
            <!-- <i class="mr-2 ti-control-record text-primary"></i> -->
            <!-- <span class="message"></span> -->
            <div class="col-6" style="position: relative;">
                <a href="{{ url('users/edit-user',Auth::user()->id) }}"><span class="badge badge-primary" style="position:absolute;
                right:42px;top:10px;"> <i class="fa fa-pen" ></i></span></a>

                <img src="{{ url($avtar) ?? 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png' }}" alt="" class="mt-2 mb-2 img-fluid rounded-start" style="border-radius: 5px; width:90%;">
            </div>
            <div class="mt-2 mb-2 col-6">
                <div>Name : <b>{{ Auth::user()->name ?? '' }}</b></div>
                <hr>
                <div>Email : <b>{{ Auth::user()->email ?? '' }}</b></div>
                <hr>
                <div>Mobile : <b>{{ Auth::user()->mobile ?? '' }}</b></div>
                <hr>
                <div>Role : <b>{{ Auth::user()->sub_type ?? '' }}</b></div>
                <hr>
            </div>

          </div>
          <form action="{{ url('users/reset-password') }}" method="POST">
            @csrf
            @method('POST')
          <div class="mt-4 col-12">
                <small for="">Password</small>
                <input type="text" class="form-control" name="password" id="password" onkeyup="checkPassword()" min="8" required>
          </div>
          <div class="mt-4 col-12">
            <small for="">Confirm Password</small>
            <input type="text" class="form-control"  name="confirm_password" onkeyup="checkPassword()" id="confirm_password" min="8"  required>
          </div>
          <div class="mt-4 col-12">
            <button class="btn btn-primary btn-block" id="setPassword" disabled>Reset Password</button>
        </div>
        </form>
        </div>

      <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 641px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 458px;"></div></div></div>
      <!-- To do section tab ends -->
    </div>
  </div>
<script>
      const userInfo = (info)=>{
        var sidebar = document.getElementById('user-details');
        if (sidebar.classList.contains('open')) {
            sidebar.classList.remove('open');
            sidebar.style.width="0%";
        } else {
            sidebar.classList.add('open');
            sidebar.style.width="45%";
        }
        }

        const checkPassword = () => {
            var pass = document.querySelector('#password').value;
            var confirm_pass = document.querySelector('#confirm_password').value;
            if (pass === confirm_pass) {
                document.querySelector('#setPassword').disabled = false;
            } else {
                document.querySelector('#setPassword').disabled = true;
            }
        }


</script>
