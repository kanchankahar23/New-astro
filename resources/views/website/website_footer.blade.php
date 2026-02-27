<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<style>
    .socialIcon{
    width: 140px !important;
    display: flex;
    align-items: center;
    justify-content: space-between;
    }
    .socialIcon a{
    width: 40px !important;
    }
</style>
<footer class="al-footer-wrapper default-footer">
    <div style="margin-top: 30px; margin-bottom:100px;" class="container">
        <div class="row">
            <div style="margin-right: 50px" class="col-5 ResFooter">
                <div class="logo FigmaNewLogo">
                    <a class='lastAstrologo' href="/" style="display: flex; height: 55px">
                        <img src="{{url('/website/uploads/sites/logo23.png')}}" alt="logo">
                        <!-- <img style="height:53px;" src="http://127.0.0.1:8000/website/uploads/sites/22.png"
                            alt="logo"> -->
                            <h3 class='FontOfAstro2'>ASTROBUDDY</h3>
                    </a>
                </div><br>
                <div style="font-size: medium" class="content">
                    "Astrology reveals the will of the gods. Astrology is a language. If you understand this language,
                    the sky speaks to you."
                </div>
            </div>
            <div style="font-size: medium" class="col-3">
                <h3 class="widget-title">Quick Links</h3>
                <ul>
                <li style="display: flex;">

<p>
    <span><i class="fa-solid fa-lock"></i></span><a href="{{url('privacy-policy')}}">&nbsp; Privacy Policy</a>
</p>
</li>
                <li style="display: flex;">

<p>
    <span><i class="fa-solid fa-list-check"></i></span><a href="{{url('terms-condition')}}">&nbsp; Terms & Conditions</a>
</p>
</li>
                    <li id="menu-item-907"
                        class="menu-item menu-item-type-custom menu-item-object-custom menu-item-907">
                        <a href="{{ url('daily/horoscope/1') }}"><span><i class="fa-brands fa-dailymotion"></i> &nbsp; My Daily Horoscope</a>
                    </li>
                    <li id="menu-item-907"
                        class="menu-item menu-item-type-custom menu-item-object-custom menu-item-907">
                        <a href="{{ url('weekly/horoscope/1') }}">
                        <i class="fa-brands fa-weebly"></i> &nbsp; My Weekly Horoscope</a>
                    </li>
                    <li id="menu-item-907"
                        class="menu-item menu-item-type-custom menu-item-object-custom menu-item-907">
                        <a href="{{ url('yearly/horoscope/1') }}"><i class="fa-solid fa-calendar-days"></i>
                        &nbsp;  My Monthly Horoscope</a>
                    </li>
                    <!-- <li id="menu-item-907"
                        class="menu-item menu-item-type-custom menu-item-object-custom menu-item-907">
                        <a href="{{ url('privecy-policy') }}">
                            Privecy-Policy</a>
                    </li>
                    <li id="menu-item-907"
                        class="menu-item menu-item-type-custom menu-item-object-custom menu-item-907">
                        <a href="{{ url('terms-condition') }}">
                            Terms and Conditions</a>
                    </li>
                    <li id="menu-item-907"
                        class="menu-item menu-item-type-custom menu-item-object-custom menu-item-907">
                        <a href="{{ url('refund-policy') }}">
                            Refund Policy</a>
                    </li> -->



                </ul>
            </div>
            <div style="font-size: medium" class="col-3">
                <h3 class="widget-title">Contact Info</h3>
                <ul>
                    <li style="display: flex;">
                        <p>
                            <span><i class="fa-solid fa-phone"></i></span><a href="tel:+(91)9294549294">&nbsp; +(91) 9294-54-9294</a>
                        </p>
                    </li>
                    <li style="display: flex;">
                        <p>
                            <span><i class="fa-solid fa-phone"></i></span><a href="tel:+(91)9294589294">&nbsp; +(91) 9294-58                            -9294</a>
                        </p>
                    </li>
                    <li style="display: flex;">

                        <p class='supporTId'>
                            <span><i class="fa-solid fa-envelope"></i></span><a
                                href="mailto:support@astro-buddy.com">&nbsp;
                                support@astro-buddy.com</a>
                        </p>
                    </li>
                    <li class="socialIcon">
                        <a href="https://www.linkedin.com/company/astrobuddy/posts/?feedView=all"><i
                                class="fa-brands fa-linkedin-in"></i></a>
                        <a href="https://www.instagram.com/astro_.buddy/"><i
                                class="fa-brands fa-instagram"></i></a>
                        <a href="https://www.facebook.com/profile.php?id=61560488164973"><i
                                class="fa-brands fa-facebook"></i></a>
                        <a href="https://x.com/astro_buddyy"><i
                                class="fa-brands fa-x-twitter"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Bottom Footer start -->
    <div class="text-center al-copyright-wrapper">
        <!-- GO To Top -->

        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <p>Copyright © {{ date('Y') }} AstroBuddy (Powered By Rajpal-Group). All Right Reserved.</p>
                </div>
            </div>
        </div>
    </div>
</footer>
