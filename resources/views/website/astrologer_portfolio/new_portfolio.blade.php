<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Astrologer</title>
        <link rel="stylesheet" href="{{ url('/assets/new_portfolio/') }}/astroProfile.css">
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css">
        <link rel="stylesheet"
            href="https://unpkg.com/swiper/swiper-bundle.min.css" />
        <link
            href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Philosopher:ital,wght@0,400;0,700;1,400;1,700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
            rel="stylesheet">

        <style>
            .outerheader {
                width: 100%;
                position: fixed;
                top: 0;
                z-index: 10000;
                padding: 6px 0;
                transition: all 0.4s ease-in-out;
            }

            .insideheader {
                width: 90%;
                display: flex;
                align-items: center;
                justify-content: center;
                margin: 12px auto;
            }

            .astrologo {
                width: 25%;
                display: flex;
                align-items: center;
                justify-content: start;
            }

            .smalllogo {
                width: 30px;
                height: 27px;
                overflow: hidden;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .smalllogo img {
                width: 100%;
                height: 100%;
                animation: flipPause 3s infinite ease-in-out;
            }

            @keyframes flipPause {
                0% {
                    transform: rotateY(0deg);
                }

                40% {
                    transform: rotateY(180deg);
                }

                60% {
                    transform: rotateY(180deg);
                    /* pause */
                }

                100% {
                    transform: rotateY(360deg);
                }
            }

            .largelogo {
                width: 190px;
                overflow: hidden;
                display: flex;
                align-items: center;
                justify-content: start;
                margin-left: 10px;
            }

            .largelogo img {
                width: 100%;
            }

            .allitems {
                width: 75%;
                display: flex;
                align-items: center;
                justify-content: end;
            }

            .allitems ul {
                width: 76%;
                display: flex;
                align-items: center;
                justify-content: space-between;
                margin: 0 0;
            }

            .allitems ul a {
                text-decoration: none;
            }

            .allitems ul a li {
                /* color: rgb(0, 0, 0); */
                font-size: 14px;
                font-weight: 500;
                font-family: "Poppins", sans-serif;
            }

            .hidden {
                display: none;
            }

            .logo {
                transition: opacity 0.3s ease;
            }

            .listitems {
                list-style: none;
                text-decoration: none;
            }

            .copylowetfooter {
                width: 100%;
                background-color: #222222;
                /* padding: 60px 0; */
                padding-top: 46px;
                padding-bottom: 0px;
                margin: 0 0;
                margin-top: 113px;
            }

            .copyrights {
                width: 100%;
                background-color: #17384e;
            }

            .copyrights p {
                font-family: "Poppins", sans-serif;
                color: white;
                font-size: 14px;
                font-weight: 400;
                padding: 20px 0;
                text-align: center;
                width: 90%;
            }

            .lowestfoot {
                width: 90%;
                margin: 40px auto;
                display: flex;
                align-items: center;
                justify-content: space-evenly;
            }

            .astrolgfirst {
                width: 40%;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
            }

            .astrolistsecond {
                width: 30%;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
            }

            .astroaddthird {
                width: 30%;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
            }

            .logobuddy {
                width: 100%;
                display: flex;
                align-items: center;
                justify-content: start;
            }

            .astrosmlgone {
                width: 60px;
                height: 60px;
                overflow: hidden;
            }

            .astrosmlgone img {
                width: 100%;
            }

            .imgastro {
                width: 225px;
                overflow: hidden;
            }

            .imgastro img {
                width: 100%;
            }

            .textcontent {
                width: 100%;
                margin-top: 20px;
            }

            .textcontent p {
                font-family: "Poppins", sans-serif;
                color: white;
                font-size: 1rem;
                font-weight: 400;
                width: 90%;
            }

            .quick {
                width: 90%;
            }

            .quick h2 {
                color: white;
                font-size: 22px;
                font-weight: 600;
                font-family: 'Poppins', sans-serif;
            }

            .quick hr {
                height: 4px;
                background: #f3be0a;
                width: 148px;
                margin-left: 0;
            }

            .liitems {
                width: 90%;
            }

            .liitems ul {
                width: 100%;
                margin: 10px 0;
                text-align: left;
                padding: 0 0;
            }

            .liitems ul a {
                text-decoration: none;
            }

            .liitems ul a li {
                text-align: left;
                width: 100%;
                list-style: none;
                text-decoration: none;
                color: white;
                font-size: 1rem;
                font-weight: 400;
                margin: 10px 0;
                font-family: 'Poppins', sans-serif;
            }

            .mailtag {
                width: 90%;
                margin: 15px 0;
            }

            .mailtag p {
                color: white;
                font-size: 1rem;
                font-weight: 400;
                margin: 10px 0;
                font-family: 'Poppins', sans-serif;
            }

            .mailtag p span i {
                color: #f3be0a;
                margin-right: 7px;
                font-size: 16px;
            }
        </style>
    </head>
    <body>
        <header class="outerheader">
            <div class="insideheader">
                <div class="astrologo">
                    <div class="smalllogo">
                        <img src="{{ url('assets/new_portfolio/') }}/proImages/logo23.png" alt="Logo 1"
                            class="logo white-logo" />
                        <img src="{{ url('assets/new_portfolio/') }}/proImages/AstroNewLogo2.png"
                            alt="Logo 1 Dark" class="logo black-logo hidden" />
                    </div>
                    <div class="largelogo">
                        <img src="{{ url('assets/new_portfolio/') }}/proImages/whitelogo.png" alt="Logo 2"
                            class="logo white-logo" />
                        <img src="{{ url('assets/new_portfolio/') }}/proImages/astroblue.png" alt="Logo 2 Dark"
                            class="logo black-logo hidden" />
                    </div>
                </div>
                <div class="allitems">
                    <ul>
                        <a href="">
                            <li class="listitems">Home</li>
                        </a>
                        <a href="">
                            <li class="listitems">About Us</li>
                        </a>
                        <a href="">
                            <li class="listitems">Horoscope</li>
                        </a>
                        <a href="">
                            <li class="listitems">Services</li>
                        </a>
                        <a href="">
                            <li class="listitems">Kundli</li>
                        </a>
                        <a href="">
                            <li class="listitems">Contact Us</li>
                        </a>
                        <a href="">
                            <li class="listitems loginItem">Log In</li>
                        </a>
                    </ul>
                </div>
            </div>
        </header>


        <section class="profile">
            <div class="astroProfile">
                <div class="contentText">
                    <h4>Namaste,</h4>
                    <h1>I am Acharya {{ ucfirst($user->name ?? '-') }}</h1>
                    <p>Expert in Vedic astrology and numerology, offering
                        insightful predictions and effective remedies to bring
                        peace, prosperity, and happiness.</p>
                    <div class="bookAppointment">
                        <a href="#appointment">
                            <button>Book Your Appointment</button>
                        </a>
                    </div>
                </div>

                <div class="AStroImage">
                    <div class="leftImageBox">
                        <h3> <span>9+</span> Years of Trusted Guidance</h3>
                        <i class="fa-solid fa-suitcase"></i>
                    </div>
                    <div class="addAstroImage">
                        <img src="{{ url($gallerys->cover_image ?? 'NA') }}" alt="">
                        {{--  <img src="{{ url('assets/new_portfolio/') }}/proImages/cover1.jpg" alt="">  --}}
                    </div>
                    <div class="rightImageBox">
                        <h3>Expertise in Palm Reading & Numerology
                        </h3>
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div>

                </div>
            </div>
        </section>

        <section class="secondcontainer">
            <div class="aboutAstrologer">
                <div class="astroProfilePic">
                    <div class="imageContainer">
                        <img src="{{ url($gallerys->about_image ?? 'NA') ?? 'Na' }}" alt="">
                        {{--  <img src="{{ url('assets/new_portfolio/') }}/proImages/about.jpg" alt="">  --}}
                    </div>
                    <div class="imglowerBox">
                        <div class="lineDraw"></div>
                        <h2>Compassionate and continuous assistance to help you
                            navigate life’s challenges with confidence.</h2>
                    </div>
                </div>

                <div class="textMatter">
                    <h4>ABOUT ASTROBUDDY</h4>
                    <h1>We Provide The Best Astrological Guidance For Your Peace
                        of Mind</h1>
                    <p class="unlock">Unlock the secrets of your destiny with
                        the guidance of our expert astrologer. With years of
                        experience in Vedic Astrology, Numerology, and Palm
                        Reading, we provide accurate predictions and effective
                        remedies to bring clarity, peace, and prosperity to your
                        life.</p>

                    <div class="twoPoints">
                        <div class="leftPara">
                            <span><i
                                    class="fa-solid fa-book-open-reader"></i></span>
                            <h2>Expert Astrologer</h2>
                            <p>Trusted guidance in Vedic Astrology, Palm Reading
                                & Numerology with proven results.</p>
                        </div>
                        <div class="rightPara" id="appointment">
                            <span><i class="fa-solid fa-hand"></i></span>
                            <h2>Personalized Remedies</h2>
                            <p>Solutions designed exclusively for you to
                                overcome obstacles and invite positivity.</p>
                        </div>
                    </div>

                </div>


            </div>

        </section>

        <section class="callandVideo" >
            <div class="chatServices" >
                <a href="{{ url('appointment/call',encrypt($user->id)) }}" style="text-decoration: none;"><div class="callNow allOneContact">
                    <i class="fa-solid fa-phone"></i>
                    <h2>Call Now</h2>
                </div></a>

                <a href="{{ url('appointment/vcall',encrypt($user->id)) }}" style="text-decoration: none;"><div class="Videocall allOneContact">
                    <i class="fa-solid fa-video"></i>
                    <h2>Video Call</h2>
                </div></a>
               <a href="{{ url('appointment/chat',encrypt($user->id)) }}" style="text-decoration: none;">
                 <div class="ChatUs allOneContact">
                    <i class="fa-solid fa-comment"></i>
                    <h2>Chat Us</h2>
                </div></a>
            </div>
        </section>


        <section class="overAreas">
            <div class="WorlWideServe">
                <div class="ourServiceText">
                    <h4>Divine Vision</h4>
                    <h1>Astrological Journey in Pictures</h1>
                </div>
                <div class="headingOfSect">

                    @if ($gallerys->gallary_image ?? '')
                        @php
                        $galleryImages = json_decode($gallerys->gallary_image);
                        $imageData = [['id' => 1], ['id' => 2], ['id' => 3], ['id' => 4], ['id' =>
                        5], ['id' => 6]];
                        @endphp

                        @foreach ($imageData as $index => $imageInfo)
                        @if (in_array($imageInfo['id'], [1, 2, 3] ) && isset($galleryImages[$index]))
                        <div class="sixCountries">
                            <img src="{{ url($galleryImages[$index] ) }}" alt="">
                            <div class="nameOfCountry">
                                <h2>{{ ucfirst($user['type'] ?? 'astrologer') }} {{ ucfirst($user['name'] ?? 'astrologer') }}</h2>
                            </div>
                            <div class="overlayOnPic"></div>
                        </div>
                        @endif

                        @endforeach


                        @foreach ($imageData as $index => $imageInfo)
                        @if (in_array($imageInfo['id'], [4, 5, 6]) && isset($galleryImages[$index]))
                        <div class="sixCountries">
                            <img src="{{ url($galleryImages[$index] ) }}" alt="">
                            <div class="nameOfCountry">
                              <h2>{{ ucfirst($user['type'] ?? 'astrologer') }} {{ ucfirst($user['name'] ??
                                'astrologer') }}</h2>
                            </div>
                            <div class="overlayOnPic"></div>
                        </div>
                        @endif
                        @endforeach
                    @else

                    @endif
                    {{--  <div class="sixCountries">
                        <img src="{{ url('assets/new_portfolio/') }}/proImages/pandit2.png" alt="">
                        <div class="nameOfCountry">
                            <h2>Kundali Secrets</h2>
                        </div>
                        <div class="overlayOnPic"></div>
                    </div>
                    <div class="sixCountries">
                        <img src="{{ url('assets/new_portfolio/') }}/proImages/cover2.jpg" alt="">
                        <div class="nameOfCountry">
                            <h2>Cosmic Vision </h2>
                        </div>
                        <div class="overlayOnPic"></div>
                    </div>
                    <div class="sixCountries">
                        <img src="{{ url('assets/new_portfolio/') }}/proImages/freepik__the-style-is-candid-image-photography-with-natural__83912.png"
                            alt="">
                        <div class="nameOfCountry">
                            <h2>Mystic Journey</h2>
                        </div>
                        <div class="overlayOnPic"></div>
                    </div>

                    <div class="sixCountries"> <img src="{{ url('assets/new_portfolio/') }}/proImages/cover3.jpg"
                            alt="">
                        <div class="nameOfCountry">
                            <h2>Divine Blessings</h2>
                        </div>
                        <div class="overlayOnPic"></div>
                    </div>
                    <div class="sixCountries">
                        <img src="{{ url('assets/new_portfolio/') }}/proImages/astropic3.png" alt="">
                        <div class="nameOfCountry">
                            <h2>Astro Guide</h2>
                        </div>
                        <div class="overlayOnPic"></div>
                    </div>
                    <div class="sixCountries"><img
                            src="{{ url('assets/new_portfolio/') }}/proImages/changePandit.png" alt="">
                        <div class="nameOfCountry">
                            <h2>Spiritual Light</h2>
                        </div>
                        <div class="overlayOnPic"></div>
                    </div>  --}}
                </div>
            </div>
        </section>



        <section class="servicesShow">
            <div class="uppertextHeading">
                <h2>Our Astrological Services</h2>
                <h1>Your Destiny, Our Guidance</h1>
            </div>

            <div class="cardsViewsection">
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">

                            <div class="multipleServices">
                                <div class="iconofAStro">
                                    <div class="astroicons">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 24 24"
                                            fill="currentColor">
                                            <path
                                                d="M5.32244 5.96559C5.42367 5.85376 5.5282 5.74386 5.63604 5.63602C6.11945 5.15261 6.64417 4.73569 7.19883 4.38526C6.8849 4.29873 6.60274 4.24748 6.35542 4.22882C5.78308 4.18566 5.53243 4.32157 5.42553 4.42847C5.31863 4.53537 5.18272 4.78602 5.22589 5.35835C5.23974 5.54197 5.27156 5.74481 5.32244 5.96559ZM20.7257 14.2107C20.7873 14.3337 20.8463 14.4557 20.9028 14.5766C21.3793 15.5977 21.6941 16.5944 21.7616 17.4903C21.8289 18.3819 21.656 19.3107 20.9819 19.9848C20.3077 20.659 19.379 20.8318 18.4874 20.7646C17.7068 20.7057 16.8497 20.4592 15.9666 20.0815L15.964 20.0827C15.8109 20.0172 15.657 19.9478 15.5025 19.8746C13.4695 18.9123 11.1435 17.2205 8.9599 15.0369C6.77855 12.8556 5.08807 10.5322 4.1252 8.50073C4.05178 8.34582 3.98205 8.19148 3.91629 8.03796L3.91734 8.03582C3.53815 7.15052 3.29057 6.29122 3.23155 5.50877C3.1643 4.61713 3.33717 3.6884 4.01132 3.01425C4.68547 2.34011 5.61419 2.16724 6.50583 2.23449C7.40174 2.30206 8.3984 2.61685 9.41949 3.09335C9.54253 3.15077 9.66667 3.21089 9.79181 3.27366C12.7623 2.52497 16.0404 3.31242 18.364 5.63602C20.6882 7.96029 21.4755 11.2395 20.7257 14.2107ZM19.6128 16.8042C19.2627 17.3578 18.8465 17.8814 18.364 18.3639C18.257 18.4709 18.1479 18.5747 18.037 18.6752C18.2553 18.7252 18.456 18.7565 18.6378 18.7702C19.2101 18.8134 19.4608 18.6775 19.5677 18.5706C19.6746 18.4637 19.8105 18.2131 19.7673 17.6407C19.7488 17.3952 19.6982 17.1154 19.6128 16.8042ZM5.63604 18.3639C3.37241 16.1003 2.56666 12.9309 3.21877 10.0224C4.30105 12.0032 5.92374 14.1221 7.89924 16.0976C9.87632 18.0747 11.9971 19.6985 13.9794 20.7808C11.0705 21.4337 7.90015 20.6281 5.63604 18.3639Z">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="subHeadingPara">
                                    <h3>Star Astrology</h3>
                                    <p>Astrology reveals life’s direction by
                                        interpreting planetary movements,
                                        offering clarity, guidance,
                                        and spiritual solutions for a better
                                        future.</p>
                                </div>
                                <hr>
                                <div class="learnButton">
                                    <a href="">
                                        <button>Learn More <i aria-hidden="true"
                                                class="fas fa-arrow-up"></i></button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="multipleServices">
                                <div class="iconofAStro">
                                    <div class="astroicons">
                                        <i class="fa-solid fa-hand"></i>
                                    </div>
                                </div>
                                <div class="subHeadingPara">
                                    <h3>Hand Palmistry</h3>
                                    <p> Palmistry uncovers destiny through the
                                        lines of your palm, revealing strengths,
                                        challenges, and
                                        hidden patterns shaping your unique
                                        journey.</p>
                                </div>
                                <hr>
                                <div class="learnButton">
                                    <a href="">
                                        <button>Learn More <i aria-hidden="true"
                                                class="fas fa-arrow-up"></i></button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">

                            <div class="multipleServices">
                                <div class="iconofAStro">
                                    <div class="astroicons">
                                        <i class="fa-solid fa-arrow-up-1-9"></i>
                                    </div>
                                </div>
                                <div class="subHeadingPara">
                                    <h3>Number Numerology</h3>
                                    <p>Numerology interprets numbers to reveal
                                        personality, destiny, and opportunities,
                                        guiding your
                                        decisions for growth, balance, and
                                        spiritual success.</p>
                                </div>
                                <hr>
                                <div class="learnButton">
                                    <a href="">
                                        <button>Learn More <i aria-hidden="true"
                                                class="fas fa-arrow-up"></i></button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">

                            <div class="multipleServices">
                                <div class="iconofAStro">
                                    <div class="astroicons">
                                        <i
                                            class="fa-solid fa-file-signature"></i>
                                    </div>
                                </div>
                                <div class="subHeadingPara">
                                    <h3>Signature Reading</h3>
                                    <p>Signature Reading analyzes writing style
                                        and patterns, uncovering mindset,
                                        personality traits, and
                                        inner qualities that influence your
                                        daily life.</p>
                                </div>
                                <hr>
                                <div class="learnButton">
                                    <a href="">
                                        <button>Learn More <i aria-hidden="true"
                                                class="fas fa-arrow-up"></i></button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="multipleServices">
                                <div class="iconofAStro">
                                    <div class="colorIcon">
                                        <i class="fa-solid fa-passport"></i>
                                    </div>
                                </div>
                                <div class="subHeadingPara">
                                    <h3>Tarot Reading</h3>
                                    <p>Tarot Reading provides insight into past,
                                        present, and future, uncovering
                                        guidance, clarity, and
                                        meaningful answers to life’s important
                                        questions.</p>
                                </div>
                                <hr>
                                <div class="learnButton">
                                    <a href="">
                                        <button>Learn More <i aria-hidden="true"
                                                class="fas fa-arrow-up"></i></button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="multipleServices">
                                <div class="iconofAStro">
                                    <div class="colorIcon">
                                        <i
                                            class="fa-solid fa-chalkboard-user"></i>
                                    </div>
                                </div>
                                <div class="subHeadingPara">
                                    <h3>Face Reading</h3>
                                    <p>Face Reading reveals personality traits
                                        and life paths through features,
                                        offering deep insights,
                                        guidance, and self-awareness for
                                        personal growth.</p>
                                </div>
                                <hr>
                                <div class="learnButton">
                                    <a href="">
                                        <button>Learn More <i aria-hidden="true"
                                                class="fas fa-arrow-up"></i></button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                                <!-- <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div> -->

                                <!-- <div class="swiper-pagination"></div> -->
                </div>
            </div>

            <div class="lowerImage">
                <img src="{{ url('assets/new_portfolio/') }}/proImages/whiteLineCurve.svg" alt="">
            </div>

        </section>

        <style>

        </style>

        <section class="whyChoose">
            <div class="newWay"></div>
            <div class="chooseUs">
                <div class="rareClass">
                    <h4>Why choose us</h4>
                    <h1>The Right Guidance, At the Right Time</h1>
                    <p>We provide trusted astrology guidance, accurate
                        predictions, and personalized solutions to help you
                        achieve peace, clarity, and success.</p>
                </div>
                <div class="fiveElement">


                    <div class="firstElement">
                        <div class="millionImg">
                            <i class="fa-solid fa-users"></i>
                        </div>
                        <h3>2.5+ Trusted by Million Clients</h3>
                        <p>Our platform has earned the trust of millions
                            worldwide, offering genuine astrology services with
                            consistent and reliable results.</p>
                    </div>

                    <hr>

                    <div class="firstElement">
                        <div class="millionImg">
                            <i class="fa-solid fa-medal"></i>
                        </div>
                        <h3>8+ Years of Experience</h3>
                        <p>With over eight years of dedicated expertise, we
                            bring deep knowledge and proven methods to guide you
                            toward success.</p>
                    </div>

                    <hr>

                    <!-- <div class="firstElement">
      <div class="millionImg">
        <i class="fa-solid fa-list-check"></i>
      </div>
      <h3>9 Types of Horoscopes</h3>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium, optio! Nemo et culpa maxime cumque.</p>
      </div> -->

                    <div class="firstElement">
                        <div class="millionImg">
                            <i class="fa-solid fa-shield-halved"></i>
                        </div>
                        <h3>86+ Qualified Astrologers</h3>
                        <p>Eighty-six skilled astrologers work passionately to
                            deliver personalized predictions and remedies with
                            proven accuracy.</p>
                    </div>

                    <hr>

                    <div class="firstElement">
                        <div class="millionImg">
                            <i class="fa-solid fa-square-check"></i>
                        </div>
                        <h3>1500+ Success Horoscope</h3>
                        <p>More than 1500 success horoscopes have empowered
                            individuals to achieve clarity, confidence, and
                            lasting happiness.</p>
                    </div>


                </div>

                <hr class="bigLineBG">

                <div class="overView">
                    <div class="globalReach">
                        <h3>7200 +</h3>
                        <p>Chat Consultations</p>
                    </div>
                    <hr class="warriousLine">
                    <div class="globalReach">
                        <h3>2800 +</h3>
                        <p>Video Consultations</p>

                    </div>
                    <hr class="warriousLine mobileHide">

                    <div class="globalReach">
                        <h3>4300 +</h3>
                        <p>Call Sessions</p>
                    </div>
                    <hr class="warriousLine">
                    <div class="globalReach">
                        <h3>9500 +</h3>
                        <p>Daily Horoscopes Delivered</p>
                    </div>
                    <hr class="warriousLine mobileHide">
                    <div class="globalReach">
                        <h3>3700 +</h3>
                        <p>Remedies Suggested</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="astrologerTestimonial">
            <div class="userExperience">

                <!-- Left Heading -->
                <div class="leftUserHeading">
                    <h4>Our Feedbacks</h4>
                    <h1>What they’re talking about Astrobuddy?</h1>
                    <div class="slidesButton">
                        <button class="prev"><i
                                class="fa-solid fa-arrow-left"></i></button>
                        <button class="next"><i
                                class="fa-solid fa-arrow-right"></i></button>
                    </div>
                </div>

                <!-- Right Slider -->
                <div class="slider-container">
                    <div class="slider-wrapper">

                        <div class="whiteReview">
                            <div class="reviewPara">
                                <p>“Astrobuddy has been a guiding light in my
                                    life. The predictions were so accurate and
                                    the remedies suggested truly made a
                                    difference in my career growth.”
                                </p>
                            </div>
                            <div class="starRating">
                                <div class="userName">
                                    <h2>Shreya Kapoor</h2>
                                    <p>Software Engineer</p>
                                </div>
                                <div class="starShow">
                                    <i class="fa fa-star"></i><i
                                        class="fa fa-star"></i>
                                    <i class="fa fa-star"></i><i
                                        class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                            <div class="UserProfileView">
                                <img src="{{ url('assets/new_portfolio/') }}/proImages/freepik__the-style-is-candid-image-photography-with-natural__83913.png"
                                    alt="">
                            </div>
                        </div>

                        <div class="whiteReview">
                            <div class="reviewPara">
                                <p>“I was doubtful at first, but the guidance I
                                    received helped me take the right business
                                    decisions at the right time. I highly
                                    recommend Astrobuddy.”</p>
                            </div>
                            <div class="starRating">
                                <div class="userName">
                                    <h2>Rohan Verma</h2>
                                    <p>Entrepreneur</p>
                                </div>
                                <div class="starShow">
                                    <i class="fa fa-star"></i><i
                                        class="fa fa-star"></i>
                                    <i class="fa fa-star"></i><i
                                        class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                            <div class="UserProfileView">
                                <img src="{{ url('assets/new_portfolio/') }}/proImages/freepik__the-style-is-candid-image-photography-with-natural__83912.png"
                                    alt="">
                            </div>
                        </div>

                        <div class="whiteReview">
                            <div class="reviewPara">
                                <p>“The astrologer’s insights gave me clarity
                                    during a very difficult period. I felt
                                    supported and understood, and things started
                                    falling into place.”</p>
                            </div>
                            <div class="starRating">
                                <div class="userName">
                                    <h2>Meera Joshi</h2>
                                    <p>Teacher</p>
                                </div>
                                <div class="starShow">
                                    <i class="fa fa-star"></i><i
                                        class="fa fa-star"></i>
                                    <i class="fa fa-star"></i><i
                                        class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                            <div class="UserProfileView">
                                <img src="{{ url('assets/new_portfolio/') }}/proImages/freepik__the-style-is-candid-image-photography-with-natural__34137.png"
                                    alt="">
                            </div>
                        </div>

                        <div class="whiteReview">
                            <div class="reviewPara">
                                <p>“Astrobuddy helped me choose the right path
                                    for my studies and career. I’m grateful for
                                    the accurate analysis and kind support.”</p>
                            </div>
                            <div class="starRating">
                                <div class="userName">
                                    <h2> Aniket Sharma</h2>
                                    <p>Student</p>
                                </div>
                                <div class="starShow">
                                    <i class="fa fa-star"></i><i
                                        class="fa fa-star"></i>
                                    <i class="fa fa-star"></i><i
                                        class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                            <div class="UserProfileView">
                                <img src="{{ url('assets/new_portfolio/') }}/proImages/freepik__the-style-is-candid-image-photography-with-natural__34136.png"
                                    alt="">
                            </div>
                        </div>


                        <div class="whiteReview">
                            <div class="reviewPara">
                                <p>“I was facing challenges in my personal life,
                                    and the remedies suggested were simple yet
                                    effective. I’ve felt a positive change ever
                                    since.”</p>
                            </div>
                            <div class="starRating">
                                <div class="userName">
                                    <h2>Priya Malhotra</h2>
                                    <p>Homemaker</p>
                                </div>
                                <div class="starShow">
                                    <i class="fa fa-star"></i><i
                                        class="fa fa-star"></i>
                                    <i class="fa fa-star"></i><i
                                        class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                            <div class="UserProfileView">
                                <img src="{{ url('assets/new_portfolio/') }}/proImages/changePandit.png" alt="">
                            </div>
                        </div>


                        <div class="whiteReview">
                            <div class="reviewPara">
                                <p>“The consultation gave me peace of mind and
                                    confidence. Astrobuddy is truly a
                                    trustworthy platform for genuine astrology
                                    guidance.”</p>
                            </div>
                            <div class="starRating">
                                <div class="userName">
                                    <h2>Avinash Mehra </h2>
                                    <p>Banker</p>
                                </div>
                                <div class="starShow">
                                    <i class="fa fa-star"></i><i
                                        class="fa fa-star"></i>
                                    <i class="fa fa-star"></i><i
                                        class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                            <div class="UserProfileView">
                                <img src="{{ url('assets/new_portfolio/') }}/proImages/9ada7e6e-9222-44bf-9502-802dc866b574.jpg"
                                    alt="">
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </section>

        <style>

        </style>

        <section class="addDivineSection">
            <div class="addNewlyImage">
                <img src="{{ url('assets/new_portfolio/') }}/proImages/whiteLineCurve.svg" alt="">
            </div>
            <div class="showheadingOfDivine">
                <div class="mergeDivine">
                    <h4>Divine Stones</h4>
                    <h1>My Recommended Gemstones</h1>
                </div>
                <div class="slidetheStones">
                    <div class="gemsWarriusSections">
                        <div class="gemsImages">
                            <img src="{{ url('assets/new_portfolio/') }}/proImages/gems1.jpg" alt="">
                        </div>
                        <div class="gemsInfo">
                            <div class="addCurve">
                                <img src="{{ url('assets/new_portfolio/') }}/proImages/whiteLineCurve.svg"
                                    alt="">
                            </div>
                            <h2>Purple Sapphire</h2>
                            <p>Purple Sapphire promotes wisdom, intuition,
                                calmness, and balanced decision-making for inner
                                peace.</p>
                        </div>
                    </div>
                    <div class="gemsWarriusSections">
                        <div class="gemsImages">
                            <img src="{{ url('assets/new_portfolio/') }}/proImages/gems2.webp" alt="">
                        </div>
                        <div class="gemsInfo">
                            <div class="addCurve">
                                <img src="{{ url('assets/new_portfolio/') }}/proImages/whiteLineCurve.svg"
                                    alt="">
                            </div>
                            <h2>Purple Sapphire</h2>
                            <p>Purple Sapphire promotes wisdom, intuition,
                                calmness, and balanced decision-making for inner
                                peace.</p>
                        </div>
                    </div>

                    <div class="gemsWarriusSections">
                        <div class="gemsImages">
                            <img src="{{ url('assets/new_portfolio/') }}/proImages/gems4.jpg" alt="">
                        </div>
                        <div class="gemsInfo">
                            <div class="addCurve">
                                <img src="{{ url('assets/new_portfolio/') }}/proImages/whiteLineCurve.svg"
                                    alt="">
                            </div>
                            <h2>Purple Sapphire</h2>
                            <p>Purple Sapphire promotes wisdom, intuition,
                                calmness, and balanced decision-making for inner
                                peace.</p>
                        </div>
                    </div>
                    <div class="gemsWarriusSections">
                        <div class="gemsImages">
                            <img src="{{ url('assets/new_portfolio/') }}/proImages/gems4.webp" alt="">
                        </div>
                        <div class="gemsInfo">
                            <div class="addCurve">
                                <img src="{{ url('assets/new_portfolio/') }}/proImages/whiteLineCurve.svg"
                                    alt="">
                            </div>
                            <h2>Purple Sapphire</h2>
                            <p>Purple Sapphire promotes wisdom, intuition,
                                calmness, and balanced decision-making for inner
                                peace.</p>
                        </div>
                    </div>
                </div>
                <div class="visitWeb">
                    <a href="http://divinestones.in/">
                        <button>Discover More</button>
                    </a>
                </div>
            </div>
        </section>


        <!-- <section style="height: 100vh;"></section> -->

        <script src="https://kit.fontawesome.com/66f2518709.js"
            crossorigin="anonymous"></script>
        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
        <section class="footerimg">
            <img src="{{ url('assets/new_portfolio/') }}/proImages/footer.png" alt="">
        </section>

        <script src="{{ url('/assets/new_portfolio/') }}/astroportfolio.js"></script>

    </body>

</html>
