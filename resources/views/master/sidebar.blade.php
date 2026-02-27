<nav class="sidebar sidebar-offcanvas" id="sidebar" style="overflow: auto;">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{url('/dashboard')}}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a
                class="nav-link"
                data-toggle="collapse"
                href="#ui-basic"
                aria-expanded="false"
                aria-controls="ui-basic"
            >
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Astrologer</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="{{url('enquiry/enquiry-list')}}">Astrologer Enquiry</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('onboarded-astrologer') }}">Onboarded </a></li>

                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#astroUser" aria-expanded="false" aria-controls="tables">
                <i class="icon-grid-2 menu-icon"></i>
                <span class="menu-title">Website Users</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="astroUser">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('astro-user') }}">User</a>
                    </li>
                </ul>
            </div>
        </li>


        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
                <i class="icon-columns menu-icon"></i>
                <span class="menu-title">Appointments List</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/enquiry/appointment-list') }}">Appointments</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
                <i class="icon-columns menu-icon"></i>
                <span class="menu-title">Enquiries</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('enquiries/website') }}">Website Enquiries </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('enquiries/internal') }}">Internal
                            Enquiries</a>
                    </li>
                </ul>
            </div>
          
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#kundli" aria-expanded="false" aria-controls="kundli">
                <i class="icon-columns menu-icon"></i>
                <span class="menu-title">Kundli Creators</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="kundli">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('kundli-users') }}">Kundli</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('kundli-matching-users') }}">Kundli Matching</a>
                    </li>
                </ul>
            </div>
        </li>
        @if(Auth::user()->sub_type == 'admin' )
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#earning"
                aria-expanded="false" aria-controls="tables">
                <i class="icon-grid-2 menu-icon"></i>
                <span class="menu-title">Earning</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="earning">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('account-history') }}">Account
                            History</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('wallet-history') }}">Wallet
                            History</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
                <i class="fas fa-rupee-sign"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                <span class="menu-title">Package</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tables">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('package-list') }}">Package</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#tag" aria-expanded="false" aria-controls="tables">
                <i class="fas fa-tags"></i>&nbsp;&nbsp;&nbsp;
                <span class="menu-title">Tag Management</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tag">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('tag-list') }}">Tag List</a>
                    </li>
                </ul>

            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#report" aria-expanded="false" aria-controls="tables">
                <i class="icon-grid-2 menu-icon"></i>
                <span class="menu-title">Report</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="report">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('allover-transection') }}">All Transection</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('user-appointment') }}">All Appointments</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('all-bonus') }}">All Bonus </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <i class="icon-head menu-icon"></i>
                <span class="menu-title">Internal Users</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('users/user-list') }}">
                           Users List
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('users/register') }}">
                            Register
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#tag" aria-expanded="false" aria-controls="tables">
               <i class="fas fa-file-pdf"></i>&nbsp;&nbsp;&nbsp;
                <span class="menu-title">Parasar PDF</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tag">
                <ul class="nav flex-column sub-menu">
                    {{--  <li class="nav-item">
                        <a class="nav-link" href="{{ url('create-parasar-pdf') }}">Create PDF</a>
                    </li>  --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('premium-kundli-users') }}">Premium Kundli Users</a>
                    </li>
                </ul>

            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#withdrow" aria-expanded="false" aria-controls="tables">
              <i class="fas fa-file-image"></i>&nbsp;&nbsp;&nbsp;
                <span class="menu-title">Astrologer Payment</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="withdrow">
                <ul class="nav flex-column sub-menu">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('astrologer-payment-list') }}">
                            Payment List</a>
                    </li>
                </ul>

            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#banner" aria-expanded="false" aria-controls="tables">
              <i class="fas fa-file-image"></i>&nbsp;&nbsp;&nbsp;
                <span class="menu-title">Astro app</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="banner">
                <ul class="nav flex-column sub-menu">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('add-appointment-banner') }}">Add
                            Appointment Banner</a>
                    </li>
                </ul>

            </div>
        </li>
        @endif

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth1"
                aria-expanded="false" aria-controls="auth1">
                <i class="fab fa-whatsapp menu-icon"></i>
                <span class="menu-title">Message Box</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth1">
                <ul class="nav flex-column sub-menu">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('rejected-candidate') }}">
                        Candidate List
                        </a>
                    </li>
                </ul>
            </div>

        </li>
    </ul>
</nav>
