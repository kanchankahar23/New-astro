@extends('website.website_master')
@section('title', 'Portfolio')
@section('content')

    <style>
        body {
         background-color: white;
        }
        .fixed-size-image {
            width: 150px;
            /* height: 450px; */
            object-fit: cover;
            border: 1px solid #ccc;
            border-radius: 10px;
        }

        .image-container {
            display: inline-block;
            margin: 10px;
        }
        .main-btn {
    color: #212226 !important;
    font-family: 'Philosopher', sans-serif !important;
    font-weight:600 !important;
    font-size:17px !important;
    transition:all 600ms ease-in-out !important;
        }
        .main-btn:hover {
   transform:scale(1.1);
   background:#232327 !important;
   color:white !important;
   border-radius:10px;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('astrologer_portfolio/second/css/style.css') }}" />
    @include('website.website_header')



    <section id="home" class="banner"
        style=" background-image: url('{{ url('assets/images/globe.jpg') }}');
      "data-stellar-background-ratio=".7"
        data-scroll-index="0">
        <div class="putoverlay"></div>
        <div class="container" style="">
            <!--Banner Content-->
            <div class="banner-caption">
                <h1 style="margin-bottom: 0; line-height: 3.5rem">
                    <span style="font-weight: 600; font-size: 29px; color: #ffcd3a">Namaste,</span>
                    <br />I am Astro {{ ucfirst($user->name ?? '-') }}
                </h1>
                <p class="mt-0 cd-headline clip">
                    <span class="blc">I am an expert in</span>
                    <span class="cd-words-wrapper">
                        <b class="is-visible">{{ ucfirst($user->expertise ?? 'Vadic') }}</b>
                        <b>Vastu</b>
                        <b>Numerologist</b>
                    </span>
                </p>
            </div>

            <div class="pnditimg">
                <img src="{{ url($gallerys->cover_image ?? 'NA') }}" alt="" />
            </div>
        </div>
    </section>

    <section class="about pt-100 pb-100" data-scroll-index="1">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-6">
                    <!--About Image-->
                    <div class="about-img">
                        <img src="{{ url($gallerys->about_image ?? 'NA') ?? 'Na' }}" alt="" />
                    </div>
                </div>
                <div class="col-lg-7 col-md-6" style="padding-left: 8%">
                    <!--About Content-->
                    <div class="about-content" style="margin-top: 10px">
                        <div class="about-heading">
                            <h2 class="smlheading" style="position: relative">About Me</h2>
                            <span>Astrologer &nbsp;{{ ucfirst($user->name ?? 'astrologer') }}</span>
                            <hr class="" style="margin-top: 12px" />
                        </div>
                        <p>
                            I'm <b>{{ ucfirst($user->name ?? 'astrologer') }}</b>
                            {{ ucfirst($user->about ?? 'Astrology, type of divination that involves the forecasting of earthly and human events through the observation and interpretation of the fixed stars, the Sun, the Moon, and the planets.') }}.
                        </p>
                        <p>
                            {{ ucfirst($user->about ?? 'Astrology, type of divination that involves the forecasting of earthly and human events through the observation and interpretation of the fixed stars, the Sun, the Moon, and the planets.') }}
                        </p>
                        <p class="about-button">
                            <a class="main-btn" href="{{ url('appointment/chat',encrypt($user->id)) }}"
                                style="background-color: #FAC617;border: none; colorwhite;">Appointment For Chat</a>
                                &nbsp;&nbsp;
                                <a class="main-btn" href="{{ url('appointment/call',encrypt($user->id)) }}"
                                    style="background-color: #FAC617;border: none; colorwhite;">Appointment For
                                    Call</a>
                                    &nbsp;&nbsp;
                                    <a class="main-btn" href="{{ url('appointment/vcall',encrypt($user->id)) }}"
                                        style="background-color: #FAC617;border: none; colorwhite;">Appointment For
                                        Video Call</a>
                                    </p>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="servicesastro">
        <div class="inerastro">
            <div class="servicesheading">
                <h3>Services</h3>
                <h2>WHAT I CAN DO</h2>
            </div>
            <div class="cando">
                <div class="astrovedic">
                    <!-- id="palmevent" -->
                    <div class="palm">
                        <div class="astroicons">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path
                                    d="M5.32244 5.96559C5.42367 5.85376 5.5282 5.74386 5.63604 5.63602C6.11945 5.15261 6.64417 4.73569 7.19883 4.38526C6.8849 4.29873 6.60274 4.24748 6.35542 4.22882C5.78308 4.18566 5.53243 4.32157 5.42553 4.42847C5.31863 4.53537 5.18272 4.78602 5.22589 5.35835C5.23974 5.54197 5.27156 5.74481 5.32244 5.96559ZM20.7257 14.2107C20.7873 14.3337 20.8463 14.4557 20.9028 14.5766C21.3793 15.5977 21.6941 16.5944 21.7616 17.4903C21.8289 18.3819 21.656 19.3107 20.9819 19.9848C20.3077 20.659 19.379 20.8318 18.4874 20.7646C17.7068 20.7057 16.8497 20.4592 15.9666 20.0815L15.964 20.0827C15.8109 20.0172 15.657 19.9478 15.5025 19.8746C13.4695 18.9123 11.1435 17.2205 8.9599 15.0369C6.77855 12.8556 5.08807 10.5322 4.1252 8.50073C4.05178 8.34582 3.98205 8.19148 3.91629 8.03796L3.91734 8.03582C3.53815 7.15052 3.29057 6.29122 3.23155 5.50877C3.1643 4.61713 3.33717 3.6884 4.01132 3.01425C4.68547 2.34011 5.61419 2.16724 6.50583 2.23449C7.40174 2.30206 8.3984 2.61685 9.41949 3.09335C9.54253 3.15077 9.66667 3.21089 9.79181 3.27366C12.7623 2.52497 16.0404 3.31242 18.364 5.63602C20.6882 7.96029 21.4755 11.2395 20.7257 14.2107ZM19.6128 16.8042C19.2627 17.3578 18.8465 17.8814 18.364 18.3639C18.257 18.4709 18.1479 18.5747 18.037 18.6752C18.2553 18.7252 18.456 18.7565 18.6378 18.7702C19.2101 18.8134 19.4608 18.6775 19.5677 18.5706C19.6746 18.4637 19.8105 18.2131 19.7673 17.6407C19.7488 17.3952 19.6982 17.1154 19.6128 16.8042ZM5.63604 18.3639C3.37241 16.1003 2.56666 12.9309 3.21877 10.0224C4.30105 12.0032 5.92374 14.1221 7.89924 16.0976C9.87632 18.0747 11.9971 19.6985 13.9794 20.7808C11.0705 21.4337 7.90015 20.6281 5.63604 18.3639Z">
                                </path>
                            </svg>
                        </div>
                        <h2>Astrologer</h2>
                        <p>
                            Astrology, type of divination that involves the forecasting of earthly and human events through
                            the observation and interpretation of the fixed stars.
                        </p>
                    </div>

                    <div class="palm">
                        <div class="astroicons">
                            <i class="fa-solid fa-hand" style="color: #0772f1"></i>
                        </div>
                        <h2>Palmasist</h2>
                        <p>
                            A pharmacist is a healthcare provider who gives you your prescriptions. But they're also an
                            important member of your healthcare team.
                        </p>
                    </div>
                    <div class="palm">
                        <div class="astroicons">
                            <i class="fa-solid fa-arrow-up-1-9" style="color: #222529"></i>
                        </div>
                        <h2>Numrology</h2>
                        <p>
                            "Numerology is an ancient mystical science which attributes deeper meaning to numbers,"
                            explained Josh Siegel, a master numerologist.
                        </p>
                    </div>
                </div>

                <div class="astrovedic">
                    <div class="palm">
                        <div class="astroicons">
                            <i class="fa-solid fa-file-signature" style="color: #0cc545"></i>
                        </div>
                        <h2>Signature Reading</h2>
                        <p>
                            Below are widely accepted meanings behind the kinds of signatures people use: Illegible letters
                            = Quick mind, mental agility. Legible = Open and straightforward person.
                        </p>
                    </div>
                    <div class="palm">
                        <div class="astroicons">
                            <i class="fa-solid fa-arrow-up-1-9" style="color: #443060"></i>
                        </div>
                        <h2>Numrology</h2>
                        <p>
                            Numerology is an ancient mystical science which attributes deeper meaning to numbers," explained
                            Josh Siegel, a master numerologist who has practiced for over two decades.
                        </p>
                    </div>
                    <div class="palm">
                        <div class="astroicons">
                            <i class="fa-solid fa-hand" style="color: #ef0913"></i>
                        </div>
                        <h2>Palmasist</h2>
                        <p>
                            A pharmacist is a healthcare provider who gives you your prescriptions. But they're also an
                            important member of your healthcare team. They're the person who knows the most about drugs.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="stats pt-95 pb-95" style="background-image: url('{{ url('assets/images/globe.jpg') }}');">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <!--Stats Item-->
                    <div class="single-stat">
                        <span class="stat-icon">
                            <i class="fa fa-users" aria-hidden="true"></i>
                        </span>
                        <h2 class="counter" data-count="2200">10</h2>
                        <p>Happy Clients</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <!--Stats Item-->
                    <div class="single-stat">
                        <span class="stat-icon">
                            <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                        </span>
                        <h2 class="counter" data-count="89">89%</h2>
                        <p>Prediction accuracy</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <!--Stats Item-->
                    <div class="single-stat">
                        <span class="stat-icon">
                            <i class="fa fa-edit" aria-hidden="true"></i>
                        </span>
                        <h2 class="counter" data-count="1100">10</h2>
                        <p>Lines Of Code</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <!--Stats Item-->
                    <div class="single-stat">
                        <span class="stat-icon">
                            <i class="fa fa-trophy" aria-hidden="true"></i>
                        </span>
                        <h2 class="counter" data-count="160">15</h2>
                        <p>Awards Achieved</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="gallerypage">
        <div class="gallaryheading">
            <h3>Gallary</h3>
            <h2>Moments Captured</h2>
            <!-- <p>Discover the visual journey through Sandeep's work, where each image reflects the memories' influence on our lives.</p> -->
        </div>
         @if ($gallerys->gallary_image ?? '')
            <div class="intgall">
                @php
                    $galleryImages = json_decode($gallerys->gallary_image);
                    $imageData = [['id' => 1], ['id' => 2], ['id' => 3], ['id' => 4], ['id' => 5], ['id' => 6]];
                @endphp

                @foreach ($imageData as $index => $imageInfo)
                    @if (in_array($imageInfo['id'], [1, 2, 3]))
                        <div class="threephotos">
                            <img src="{{ url($galleryImages[$index] ?? 'NA') }}" alt=""
                                class="fixed-size-image" />
                            <div class="colorimg">
                                <div class="hover-text">
                                    <h3>{{ ucfirst($user['type'] ?? 'astrologer') }}</h3>
                                    <h2>{{ ucfirst($user['name'] ?? 'astrologer') }}</h2>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

            <div class="intgall">
                @foreach ($imageData as $index => $imageInfo)
                    @if (in_array($imageInfo['id'], [4, 5, 6]))
                        <div class="threephotos">
                            <img src="{{ url($galleryImages[$index] ?? 'NA') }}" alt=""
                                class="fixed-size-image" />
                            <div class="colorimg">
                                <div class="hover-text">
                                    <h3>{{ ucfirst($user['type'] ?? 'astrologer') }}</h3>
                                    <h2>{{ ucfirst($user['name'] ?? 'astrologer') }}</h2>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        @else
        @endif
    </section>
    <script src="{{ asset('astrologer_portfolio/second/js/jquery.min.js') }}"></script>
    <script src="{{ asset('astrologer_portfolio/second/js/animated.headline.js') }}"></script>
    <script src="{{ asset('astrologer_portfolio/second/js/scrollIt.min.js') }}"></script>
    <script src="{{ asset('astrologer_portfolio/second/js/main.js') }}"></script>
    <script src="https://kit.fontawesome.com/66f2518709.js" crossorigin="anonymous"></script>
@endsection
