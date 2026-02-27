@extends('website.dashboard_master')
@section('title', 'Dashboard')
@section('content')

    

    <body>


        <div class="death-calculator-mob">
          <section class="welcome"><div class="welcome__container container"><h1>Flip Image Online</h1><h2>Flip Image Online for Free! Quickly &amp; Easily!</h2><div class="service"><div class="service__dropzone" tabindex="0" style="display: none;"><div class="service__dropzone-content"><label><input type="file" class="dropzone-input" accept=".JPEG,.JPG,.PNG" style="display:none" autocomplete="off" tabindex="-1"></label><i class="icon__dropzone"></i><span class="">Drag &amp; drop image here or</span><button class="service__dropzone-btn btn btn__primary">Upload Image</button><button style="display:none"></button></div></div><div class="service__preview"><div class="service__clear"><button class="service__action"><i class="icon__remove icon__remove_white"></i></button></div><div class="service__preview-background" style="background-image: url(&quot;blob:https://retoucher.online/61895547-6a34-4a19-ba3f-76a0d9b31308&quot;);"></div><div class="service__preview-image"><canvas width="500" height="500"></canvas></div></div><ul class="service__tools"><li class="service__tool"><a title="Resize Image" href="/image-resizer"><i class="icon__resizer"></i></a></li><li class="service__tool"><a title="Rotate Image" href="/image-rotator"><i class="icon__rotator"></i></a></li><li class="service__tool"><a title="Flip Image" href="/image-flipper"><i class="icon__flipper_active"></i></a></li><li class="service__tool"><a title="Crop Image" href="/image-cropper"><i class="icon__cropper"></i></a></li></ul><div class="service__control"><div class="service__clear"><div class="service__clear-help"><p>Remove your image from all image formats below</p></div><button class="service__action"><i class="icon__remove "></i></button></div><span class="service__control-title">Flip image</span><form class="service__control-form service__control-form form form__flip"><div class="form__group_btn"><button type="button" style="font-size:0">Flip Horizontal<i class="icon__flip_horizontal"></i></button><span>Flip Horizontal</span></div><div class="form__group_btn top"><button style="font-size:0" type="button">Flip Vertical<i class="icon__flip_vertical"></i></button><span>Flip Vertical</span></div></form><div class="service__actions"><button class="service__control-download_btn btn btn__primary">Download</button></div></div></div></div></section>
     <br>
            <section class="deah-calculator-order-head">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="section-heading mb-1">Predictions and Analysis In Kundli</h2>
                            <p class="content text-justify">The free online Kundli available on InstaAstro has been created
                                after consulting with many professional astrologers.Our free Kundli online tool gives you
                                effective astrology predictions and is important in horoscope making.</p>
                        </div>
                    </div>
                </div>
            </section>
            <section class="death-calculator-form-section section-padding-10 deah-calculator-order-tool">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9 col-12 text-center">
                            <!-- <h2 class="section-heading order-head">Get Your free Janam Kundli</h2> -->

                        <div class="chart">
                            <img src="https://5.imimg.com/data5/ED/OP/DQ/SELLER-74022158/online-birth-chart-500x500.png" alt="">
                        </div>
                        </div>
                        <div class="col-md-3 col-12"><a href=" /talktoastrologer/ "><img alt="kundli image CTA"
                                    class="img-fluid cta_kundi"
                                    src="https://ia-prod-static-files.s3.amazonaws.com/static/img/CTA/kundli/Kundli_cta_eng.jpg"
                                    style="border-radius: 15px;"></a></div>
                    </div>
                </div>
            </section>
            <style>
                .img_container {
                    text-align: center;
                }

                .img_container p {
                    font-weight: 500;
                    color: black;
                }

                .kubdli_icon_section a {
                    text-decoration: none;
                }
            </style>
            <section class="pb-0">
                <div class="container mt-4" >
                    <div class="row">
                        <div class="col-md-12 para_just">

                            <section class="kubdli_icon_section">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-2 col-6"><a href="/horoscope/today-horoscope/ ">
                                                <div class="img_container"><img alt="Daily Horoscope" class="img-fluid"
                                                        src="https://ia-prod-static-files.s3.amazonaws.com/static/img/CTA/kundli/Daily%20Horosope_icons.png">
                                                    <p class="content text-center">Daily Horoscope</p>
                                                </div>
                                            </a></div>
                                        <div class="col-md-2 col-6"><a href="/relationship/love-calculator/">
                                                <div class="img_container"><img alt="Love Calculator" class="img-fluid"
                                                        src="https://ia-prod-static-files.s3.amazonaws.com/static/img/CTA/kundli/Love%20Calculater_icon.png">
                                                    <p class="content text-center">Love Calculator</p>
                                                </div>
                                            </a></div>
                                        <div class="col-md-2 col-6"><a href=" /match-making/ ">
                                                <div class="img_container"><img alt="Matchmaking" class="img-fluid"
                                                        src="https://ia-prod-static-files.s3.amazonaws.com/static/img/CTA/kundli/Match%20Making_icons.png">
                                                    <p class="content text-center">Match Making</p>
                                                </div>
                                            </a></div>
                                        <div class="col-md-2 col-6"><a href="/numerology/ ">
                                                <div class="img_container"><img alt="Numerology" class="img-fluid"
                                                        src="https://ia-prod-static-files.s3.amazonaws.com/static/img/CTA/kundli/Numerology_icons.png">
                                                    <p class="content text-center">Numerology</p>
                                                </div>
                                            </a></div>
                                        <div class="col-md-2 col-6"><a href=" /panchang/ ">
                                                <div class="img_container"><img alt="Daily Panchang" class="img-fluid"
                                                        src="https://ia-prod-static-files.s3.amazonaws.com/static/img/CTA/kundli/Panchang_icons.png">
                                                    <p class="content text-center">Panchang</p>
                                                </div>
                                            </a></div>
                                        <div class="col-md-2 col-6"><a href="/zodiac-compatibility/ ">
                                                <div class="img_container"><img alt="Zodiac Compatibility"
                                                        class="img-fluid"
                                                        src="https://ia-prod-static-files.s3.amazonaws.com/static/img/CTA/kundli/Zodiac%20compatibility_icons.png">
                                                    <p class="content text-center">Zodiac</p>
                                                </div>
                                            </a></div>
                                    </div>
                                </div><br>
                            </section>
                            <h2 class="section-heading">What is a Kundali or Janma Kundli?</h2>
                            <p class="content">A Kundli or Janmapatri is the details about an individual. This unique
                                Kundali chart in Astrology consists of elements regarding the placement of heavenly bodies,
                                that is, the planets or Navagrahas and constellations or Nakshatras. An accurate Kundali is
                                made after considering these elements, and accordingly, insights are produced. These Janam
                                Kundali predictions or insights are based on various aspects of the new born baby Kundali,
                                including the Houses, the placement of Nakshatras, the influence of planets, and the
                                associated Rashis.</p>
                            <p class="content">Each element has its distinct role, and varied combinations of planets
                                affect individuals differently. Astrologers create astrology Kundli by thoroughly reading
                                the crucial aspects of a person's birth details, such as their date, time and place of
                                birth, along with the position of planets and Nakshatras when they are born. For example,
                                favourable combinations of planets in your Janm Kundali will result in promising results.
                                Unfavourable conjunctions of planets will result in inauspicious results. However, in modern
                                times, there are also free Kundli software that can help you get your Kundli in a fraction
                                of a second.</p>
                            <p class="content">Although a Janam Kundali by date of birth, made by an astrologer, is often
                                the first choice of people, an online Kundli is no different compared to it. Head over to
                                InstaAstro’s website, contact any of our professional astrologers and get your Janam Kundali
                                by date of birth and time. In addition, you can also get in touch with our professionals to
                                generate online jataka or check jataka without any hassle.</p>
                            <h2 class="section-heading">Features of Online Janam Kundli Software</h2>
                            <p class="content">Understanding Kundli is not just for reading future insights but also for
                                planning a roadmap for your life. The free online Kundali is a software carefully made to
                                assist you in various areas of your journey as an individual. But trust us, creating it
                                online is pretty easy. All you have to do is go to our Kundali software and fill in the
                                required information, and there you are, with all the necessary details of your life right
                                in front of you.</p>
                            <p class="content">By discussing the results with the best astrologers, you can further have a
                                deep understanding of the free online Kundali that you just created. Right from your
                                physical features and educational interests to your career preferences, everything is being
                                looked at with care. When you click on different options present - Basis, Kundli, Divisional
                                Chart and Free Reports, you get a thorough idea about your past, present and likely future.
                                Have a Kundli free download today.</p>
                            <p class="content">Get a rough idea of each of these options below, present in our Online
                                Kundli software or online Kundali maker. Also, check out our <a
                                    href="https://instaastro.com/match-making/"
                                    style="color:black; font-weight: bold;">Free Kundli Matchmaking</a> to check
                                compatibilities between two individuals further.</p>
                            <h3 class="section-heading">Basis</h3>
                            <p class="content">This is the first button that you will see when you give the required
                                details about your birth. Under this, you will find your Birth details and Panchang details
                                added to your already given information. There is a reason we call this section - basis.
                                This is because these details will form the basis of all the upcoming insights and
                                predictions that you will find as you go on to the next sections.</p>
                            <h3 class="section-heading">Kundli</h3>
                            <p class="content">The next section is called Kundli. Here, you will find necessary charts and
                                tables that will be used to give you further insights. This section comprises the Ascendant/
                                D1 Chart/Lagna Kundali chart, the Navamsa Chart, the detailed position of the planets, and a
                                Dasha table. All these charts and tables reveal deep insights into different aspects of your
                                life, be it love, luck, marriage, career or finance.</p>
                            <h3 class="section-heading">Divisional Chart</h3>
                            <p class="content">The next section is the divisional chart. Here, further analysis of your
                                kundli is done by dividing it into several separate Kundli charts based on various planetary
                                factors. The charts presented here are - Chalit Chart, Sun Chart, Moon chart, Hora (D-2),
                                Drekkana (D-3), Chaturthamsa (D-4), Saptamsa (D-7), Dasamsa (D-10), Shodasamsa (D-16),
                                Vimsamsa (D-20), D30 Chart, D40 Chart, D45 Chart and D60 Chart.</p>
                            <h3 class="section-heading">Free Reports</h3>
                            <p class="content">The free Reports section contains detailed information, astrological
                                insights, predictions and physical traits of the native based on different astrology charts
                                related to their birth. Following are the columns that the ‘free reports’ section shows.</p>
                            <ul>
                                <li><strong>Ascendant:</strong> This talks about ‘the self’ or your lagna kundali chart,
                                    which is your rising sign. It reveals your personality traits, behavioural patterns,
                                    attitude and various other characteristics.</li>
                                <li><strong>Nakshatra:</strong> Based on the Nakshatra present in your horoscope,
                                    astrological insights and predictions on general day-to-day events, education,
                                    profession, family life and physical features are revealed. Then, a brief on your
                                    characteristics depending on the nakshatra you belong to is stated.</li>
                                <li><strong>Planetary:</strong> The planetary column contains a detailed description of each
                                    planet’s position in your birth chart. It has information about each of the nine
                                    planets' influence on your life stated in order.</li>
                                <li><strong>Manglik:</strong> The Manglik column tells you if you have a Manglik dosha in
                                    your kundli or not. To check manglik by date of birth is necessary to take astrological
                                    remedies in advance against the malefic effects of planet Mars.</li>
                            </ul>
                            <h2 class="section-heading">How To Create Kundali Online?</h2>
                            <p class="content">To create Kundli according to your birth details, you must go to
                                InstaAstro’s Online Kundali Tool and feed in your necessary information. Professional
                                astrologers or Kundli Jyotish have specially prepared our online free Kundli tool after
                                serious analysis, discussion, and brainstorming. Let us know the details one by one:</p>
                            <ul>
                                <li>The aim of online kundali maker is to give you your online Kundli, your free Kundli
                                    reading, and online access to your Janam Kundali in English.</li>
                                <li>Kundli or Bhavishya Kundali predictions are mainly based on the transits (forward
                                    movement) and retrogrades (backward movement) of planets during your time of birth.</li>
                                <li>When the activities of planets are watched, the constellations or Nakshatras’ positions
                                    are also noticed along the way.</li>
                                <li>You can use our tool even to get your free Hindu Kundali analysis for marriage, career,
                                    relationship, education, family life, or health. These calculations are made based on
                                    the analysis of the Kundli software.</li>
                                <li>Furthermore, if you already have a Kundali but are looking to create your new born baby
                                    Kundali by date of birth and time, then our Kundali finder or Kundali calculator tool
                                    will do that for you without any hassle.</li>
                                <li>All you have to do is enter your child's birth details and let us create magic for you
                                    using our Kundli software.</li>
                                <li>Moreover, most of us don't know many details surrounding our birth. So, if you find
                                    yourself looking for a tool that will calculate your Kundali by date of birth only, then
                                    the InstaAstro FREE online Janam Kundali Calculator will help you in this regard.</li>
                            </ul>
                            <h2 class="section-heading">What Are The Different Types Of Janam Kundali?</h2>
                            <p class="content">In a Hindu Kundali, there are nine planets, twelve houses, and twelve
                                astrological signs or Rashis. While these elements are constant, various other systems of
                                Kundli by date of birth are followed in India. Here are the three main types of Janma Kundli
                                by date of birth:</p>
                            <h3 class="section-heading">North Indian System</h3>
                            <p class="content">The North Indian System of Birth Kundali also called the diamond birth
                                chart, believes that the Houses in a Kundli are constant or fixed. This means the Twelve
                                Houses available in astrology do not change their positions. However, the astrological signs
                                or Rashis change depending on the Rising Ascendant Sign or Lagna. Therefore, the Lagna or
                                Rising Ascendant is present in the First House in a Janm Kundli, and all other Rashis are
                                positioned according to their order in the Zodiac. Here, the Astrological signs are present
                                on the left-hand side of the Kundli.</p>
                            <h3 class="section-heading">South Indian System</h3>
                            <p class="content">Unlike the North Indian System of Kundali, the South Indian System of birth
                                Kundali or birth chart believes that the Astrological signs are constant. In this, the
                                Houses keep changing their positions, and the Ascendant can be placed anywhere in the Janam
                                Kundali. This birth chart is drawn in the shape of a square divided into twelve different
                                boxes. The House in which the Lagna is present is dissected into parts with two diagonal
                                lines. Astrological Houses are present on the right side of the Ascendant, and the number of
                                signs is not mentioned.</p>
                            <h3 class="section-heading">East Indian System</h3>
                            <p class="content">Lastly, the East Indian System of Janam Kundli, by date of birth and time,
                                is a mix of both the North Indian System and the South Indian System of Janam Kundali by
                                date of birth. However, the look of the East Indian Kundali is entirely different from the
                                Kundli prepared by the former two systems. While the Astrological Signs are fixed in this
                                system of Kundali like the South Indian System, the Signs are written from the left-hand
                                side like the North Indian System. Also, the Houses change according to the Ascendant.</p>
                            <h2 class="section-heading">What is the significance of a Kundali by date of birth?</h2>
                            <p class="content">A Janam Kundli is necessary to help you be aware of the aspects of your
                                existence. Be it Kundali dosh by date of birth, favourable Yogas, the presence of malefic or
                                promising planets, or a combination of confusing constellations. You can know everything
                                imaginable through a Janam Kundali and its predictions. Moreover, an online Kundali is
                                accessible within moments and can be downloaded. This can be further shown to astrologers to
                                receive their professional analysis, which will also clarify that it is original.</p>
                            <p class="content">Nowadays, online Kundali making has become one of the most popular branches
                                of astrology and is quite sought-after. People like you and us regularly explore an array of
                                websites in search of the right tool that will not only provide us with our free Kundli but
                                also give us a free Kundli reading. Thus, a free Janam Kundli or Bhavishya Kundali becomes
                                necessary. This is a Rashi chart that helps in matchmaking, strengthening your relationship,
                                working on your career or profession, aiding your academics and education, and enabling you
                                to live your best life possible. Thus, online kundali making becomes easy to approach.</p>  
                        </div>
                    </div>
                </div>
            </section>
            <link href="https://ia-prod-static-files.s3.amazonaws.com/static/css/kundli_style.css" rel="stylesheet">

            <script src="https://ia-prod-static-files.s3.amazonaws.com/static/js/tools.js"></script>
        </div>



        <footer class="pt-0 mt-5 footer mt-md-5">
            <div class="footer-bottom" style="background-color: white;">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 d-flex">
                            <div class="d-flex align-items-start justify-content-center" style="padding-left: 2%;">
                                <div class="sm">
                                    <img src="{{ asset('website_dashboard_assets/assets/images/astro-sm.png') }}"
                                        alt="">
                                </div>
                                <div class="mx-1 mt-1 smlg">
                                    <img src="{{ asset('website_dashboard_assets/assets/images/astro-lg.png') }}"
                                        alt="">
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 text-center col-md-6 text-md-end mt-md-0" style="padding-right: 2%;">
                            <p class="mb-0"> &copy;Copyright <span id="copyright">
                                    <script>
                                        document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
                                    </script>
                                </span> <a href="#"> Astro-Buddy </a> All Rights Reserved </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!--=================================
            footer -->

        <!--=================================
            Back To Top-->
        <div id="back-to-top" class="back-to-top">
            <i class="fas fa-angle-up"></i>
        </div>
        <!--=================================
            Back To Top-->



        <!--=================================
            Javascript -->

        <!-- JS Global Compulsory (Do not remove)-->
        <script src="js/jquery-3.6.0.min.js"></script>
        <script src="js/popper/popper.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>

        <!-- Page JS Implementing Plugins (Remove the plugin script here if site does not use that feature)-->
        <script src="js/select2/select2.full.js"></script>
        <script src="js/datetimepicker/moment.min.js"></script>
        <script src="js/datetimepicker/datetimepicker.min.js"></script>

        <!-- Template Scripts (Do not remove)-->
        <script src="js/custom.js"></script>
        <script src="https://kit.fontawesome.com/66f2518709.js" crossorigin="anonymous"></script>
    </body>

    </html>
@endsection
