<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="images/favicon.png" rel="icon">
    <title>Astro-Buddy Portfolio</title>
    <meta name="description" content="Simone is responsive bootstrap 5 one page personal portfolio html template.">
    <meta name="author" content="harnishdesign.net">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/astro.css') }}">
</head>

<body class="side-header" data-bs-spy="scroll" data-bs-target="#header-nav" data-bs-offset="1">
    <!-- Preloader -->
    <div class="preloader" style="display: none;">
        <div class="lds-ellipsis" style="display: none;">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- Document Wrapper
    =============================== -->
    <div id="main-wrapper">
        <!-- Header
      ============================ -->
        <header id="header" class="sticky-top">
            <!-- Navbar -->
            <nav class="primary-menu navbar navbar-expand-lg navbar-dark bg-dark border-bottom-0">
                <div class="container-fluid position-relative h-100 flex-lg-column ps-3 px-lg-3 pt-lg-3 pb-lg-2">

                    <!-- Logo -->
                    <a href="index.html" class="mb-lg-auto mt-lg-4">
                        <span class="bg-dark-2 rounded-pill p-2 mb-lg-1 d-none d-lg-inline-block">
                            <img class="img-fluid rounded-pill d-block"
                                src="https://i.playboard.app/p/AAUvwnhiSTdHihNuAe7ToxfQMxnVBkz5FmDPc8XRv8zfmw/default.jpg "
                                title="I'm Simone" alt="">
                        </span>
                        <h1 class="text-5 text-white text-center mb-0 d-lg-block">{{ ucfirst($astrologer->name) }}</h1>
                    </a>
                    <!-- Logo End -->

                    <div id="header-nav" class="collapse navbar-collapse w-100 my-lg-auto">
                        <ul class="navbar-nav text-lg-center my-lg-auto py-lg-3">
                            <li class="nav-item"><a class="nav-link smooth-scroll active" href="#home">Home</a>
                            </li>
                            <li class="nav-item"><a class="nav-link smooth-scroll" href="#about">About Me</a></li>
                            <li class="nav-item"><a class="nav-link smooth-scroll" href="#services">What I Do</a>
                            </li>
                            <li class="nav-item"><a class="nav-link smooth-scroll" href="#resume">Expertise</a></li>
                            <li class="nav-item"><a class="nav-link smooth-scroll" href="#portfolio">Portfolio</a>
                            </li>
                            <li class="nav-item"><a class="nav-link smooth-scroll"
                                    href="#testimonial">Testimonial</a>
                            </li>
                            <li class="nav-item"><a class="nav-link smooth-scroll" href="#contact">Contact</a></li>
                        </ul>
                    </div>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#header-nav"><span></span><span></span><span></span></button>
                </div>
            </nav>
            <!-- Navbar End -->
        </header>
        <!-- Header End -->

        <!-- Content
      ============================================= -->
        <div id="content" role="main">

            <!-- Intro
        ============================================= -->
            <section id="home">
                <div class="hero-wrap">
                    <div class="hero-mask opacity-8 bg-dark"></div>
                    <div class="hero-bg parallax"
                        style="background-image: url(https://img.etimg.com/thumb/msid-93827549,width-1200,height-900,imgsize-45932,resizemode-8,quality-100/news/india/the-humble-astrologer-has-gone-online-and-is-thriving.jpg); background-size: cover; background-repeat: no-repeat; background-attachment: fixed; background-position: center 0px;">
                    </div>
                    <div class="hero-content section d-flex min-vh-100">
                        <div class="container my-auto">
                            <div class="row">
                                <div class="col-12 text-center">
                                    <div class="typed-strings" style="display: none;">
                                        <p>I'm Shiva</p>
                                        <p>I'm a Astrologer.</p>
                                        <p>I'm a Numrologer.</p>
                                        <p>I'm a Signature Reader.</p>
                                    </div>
                                    <p class="text-7 fw-500 text-white mb-2 mb-md-3">Welcome</p>
                                    <h2 class="text-16 fw-600 text-white mb-2 mb-md-3"><span class="typed">I'm a
                                            Astrologer.</span><span class="typed-cursor typed-cursor--blink">|</span>
                                    </h2>
                                    <p class="text-5 text-light mb-4">based in Varanasi, India.</p>
                                    <a href="#contact"
                                        class="btn btn-outline-primary rounded-pill shadow-none smooth-scroll mt-2"><i
                                            class="fa-solid fa-phone"></i> Call Now</a>
                                    <a href="#contact"
                                        class="btn btn-outline-primary rounded-pill shadow-none smooth-scroll mt-2"><i
                                            class="fa-regular fa-comments"></i> Chat Now</a>
                                </div>
                            </div>
                        </div>
                        <a href="#about" class="scroll-down-arrow text-white smooth-scroll"><span
                                class="animated"><i class="fa fa-chevron-down"></i></span></a>
                    </div>
                </div>
            </section>
            <!-- Intro end -->

            <!-- About
        ============================================= -->
            <section id="about" class="section">
                <div class="container px-lg-5">
                    <!-- Heading -->
                    <div class="position-relative d-flex text-center mb-5">
                        <h2 class="text-24 text-light opacity-4 text-uppercase fw-600 w-100 mb-0">About Me</h2>
                        <p class="text-9 text-dark fw-600 position-absolute w-100 align-self-center lh-base mb-0">Know
                            Me More<span
                                class="heading-separator-line border-bottom border-3 border-primary d-block mx-auto"></span>
                        </p>
                    </div>
                    <!-- Heading end-->

                    <div class="row gy-5">
                        <div class="col-lg-7 col-xl-8 text-center text-lg-start">
                            <h2 class="text-7 fw-600 mb-3">I'm <span class="text-primary">{{ ucfirst($astrologer->name) }}</span> a Astro
                                Experty</h2>
                            <p>Agastyar is a Vedic Astrologer in India. He loves to help his clients when they are in
                                need. His readings are spirit-guided and he works according to Astrology ethics to bring
                                stability in the lives of the people. However, his main motive is to give you clarity
                                and insight regarding your life and also to empower you with the spiritual knowledge of
                                different energies that are revolving around us. Apart from this, you can also contact
                                him regarding Marriage Consultation, Career and Business, Love and Relationship, Wealth
                                and Property, Career issues and much more. </p>
                            <p>The remedies he provides are very easy and
                                effective and are proven to be accurate most of the time. Moreover, his customers are
                                always satisfied with his solutions and remedies. He treats all his customers on a
                                personal level and tries to build a relationship with them.</p>
                        </div>
                        <div class="col-lg-5 col-xl-4">
                            <div class="ps-lg-4">
                                <ul class="list-style-2">
                                    <li class=""><span class="fw-600 me-2">Name:</span>{{ ucfirst($astrologer->name) }}</li>
                                    <li class=""><span class="fw-600 me-2">Email:</span><a
                                            href="mailto:chat@simone.com">{{ $astrologer->email }}</a></li>
                                    <li class=""><span class="fw-600 me-2">Age:</span>{{ $astrologer->age ?? '30' }}</li>
                                    <li class="border-0"><span class="fw-600 me-2">From:</span>{{ $astrologer->address ?? 'Jabalpur' }}
                                    </li>
                                </ul>
                                <a href="#" class="btn btn-primary rounded-pill"><i
                                        class="fa-regular fa-comments"></i>
                                    Chat Now</a>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
            <!-- About end -->

            <!-- Services
        ============================================= -->
            <section id="services" class="section bg-light">
                <div class="container px-lg-5">
                    <!-- Heading -->
                    <div class="position-relative d-flex text-center mb-5">
                        <h2 class="text-24 text-light opacity-4 text-uppercase fw-600 w-100 mb-0">Services</h2>
                        <p class="text-9 text-dark fw-600 position-absolute w-100 align-self-center lh-base mb-0">What
                            I
                            Do?<span
                                class="heading-separator-line border-bottom border-3 border-primary d-block mx-auto"></span>
                        </p>
                    </div>
                    <!-- Heading end-->

                    <div class="row">
                        <div class="col-lg-11 mx-auto">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="featured-box style-3 mb-5">
                                        <div class="featured-box-icon text-primary bg-white shadow-sm rounded"> <i
                                                class="fa-regular fa-moon"></i> </div>
                                        <h3>Astrologer</h3>
                                        <p class="mb-0">Lisque persius interesset his et, in quot quidam persequeris
                                            vim, ad mea essent possim iriure.</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="featured-box style-3 mb-5">
                                        <div class="featured-box-icon text-primary bg-white shadow-sm rounded"> <i
                                                class="fa-regular fa-hand"></i></div>
                                        <h3>Palmasist</h3>
                                        <p class="mb-0">Lisque persius interesset his et, in quot quidam persequeris
                                            vim, ad mea essent possim iriure.</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="featured-box style-3 mb-5">
                                        <div class="featured-box-icon text-primary bg-white shadow-sm rounded"> <i
                                                class="fa-solid fa-arrow-up-9-1"></i> </div>
                                        <h3>Numrology</h3>
                                        <p class="mb-0">Lisque persius interesset his et, in quot quidam persequeris
                                            vim, ad mea essent possim iriure.</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="featured-box style-3 mb-5">
                                        <div class="featured-box-icon text-primary bg-white shadow-sm rounded"> <i
                                                class="fa-solid fa-signature"></i> </div>
                                        <h3>Signature Reading</h3>
                                        <p class="mb-0">Lisque persius interesset his et, in quot quidam persequeris
                                            vim, ad mea essent possim iriure.</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Services end -->

            <!-- Resume
        ============================================= -->
            <section id="resume" class="section">
                <div class="container px-lg-5">
                    <!-- Heading -->
                    <div class="position-relative d-flex text-center mb-5">
                        <h2 class="text-24 text-light opacity-4 text-uppercase fw-600 w-100 mb-0">Summary</h2>
                        <p class="text-9 text-dark fw-600 position-absolute w-100 align-self-center lh-base mb-0">
                            Expertise<span
                                class="heading-separator-line border-bottom border-3 border-primary d-block mx-auto"></span>
                        </p>
                    </div>
                    <!-- Heading end-->


                    <!-- My Skills -->
                    <h2 class="text-6 fw-600 mt-4 mb-4">My Skills</h2>
                    <div class="row gx-5">
                        <div class="col-md-6">
                            <p class="text-dark fw-500 text-start mb-2">Astrologer <span class="float-end">85%</span>
                            </p>
                            <div class="progress progress-sm mb-4">
                                <div class="progress-bar" role="progressbar" style="width: 65%" aria-valuenow="65"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p class="text-dark fw-500 text-start mb-2">Numrologer <span class="float-end">95%</span>
                            </p>
                            <div class="progress progress-sm mb-4">
                                <div class="progress-bar" role="progressbar" style="width: 95%" aria-valuenow="95"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <p class="text-dark fw-500 text-start mb-2">Signature Reading <span
                                    class="float-end">70%</span></p>
                            <div class="progress progress-sm mb-4">
                                <div class="progress-bar" role="progressbar" style="width: 70%" aria-valuenow="70"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p class="text-dark fw-500 text-start mb-2">Palmasist <span class="float-end">60%</span>
                            </p>
                            <div class="progress progress-sm mb-4">
                                <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>

                        </div>
                    </div>
                    <div class="text-center mt-5"><a href="#"
                            class="btn btn-outline-secondary rounded-pill shadow-none">Download Kundali <span
                                class="ms-1"><i class="fas fa-download"></i></span></a></div>
                </div>
            </section>
            <!-- Resume end -->

            <!-- Portfolio
        ============================================= -->
            <section id="portfolio" class="section bg-light">
                <div class="container px-lg-5">
                    <!-- Heading -->
                    <div class="position-relative d-flex text-center mb-5">
                        <h2 class="text-24 text-light opacity-4 text-uppercase fw-600 w-100 mb-0">Portfolio</h2>
                        <p class="text-9 text-dark fw-600 position-absolute w-100 align-self-center lh-base mb-0">My
                            Work<span
                                class="heading-separator-line border-bottom border-3 border-primary d-block mx-auto"></span>
                        </p>
                    </div>
                    <!-- Heading end-->

                    <!-- Filter Menu -->
                    <ul class="portfolio-menu nav nav-tabs justify-content-center border-bottom-0 mb-5">
                        <li class="nav-item"> <a data-filter="*" class="nav-link active" href="">All</a></li>
                        <li class="nav-item"> <a data-filter=".design" href="" class="nav-link">Event</a>
                        </li>
                        <li class="nav-item"> <a data-filter=".brand" href="" class="nav-link">Achivement</a>
                        </li>
                        <li class="nav-item"> <a data-filter=".photos" href="" class="nav-link">Photos</a>
                        </li>
                    </ul>
                    <!-- Filter Menu end -->
                    <div class="portfolio popup-ajax-gallery">
                        <div class="row portfolio-filter g-4" style="position: relative; height: 889.047px;">
                            <div class="col-sm-6 col-lg-4 brand" style="position: absolute; left: 0px; top: 0px;">
                                <div class="portfolio-box rounded">
                                    <div class="portfolio-img rounded"> <img class="img-fluid d-block"
                                            src="https://images.hindustantimes.com/rf/image_size_630x354/HT/p2/2020/09/27/Pictures/_d24720d2-00e7-11eb-ac80-07fcacbe9f14.jpg"
                                            alt="">
                                        <div class="portfolio-overlay"> <a class="popup-ajax stretched-link"
                                                href="ajax/portfolio-ajax-project-1.html"></a>
                                            <div class="portfolio-overlay-details">
                                                <h5 class="text-white fw-400">Project Title</h5>
                                                <span class="text-light">Category</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4 design" style="position: absolute; left: 339px; top: 0px;">
                                <div class="portfolio-box rounded">
                                    <div class="portfolio-img rounded"> <img class="img-fluid d-block"
                                            src="https://content3.jdmagicbox.com/comp/jabalpur/i2/9999px761.x761.110714135532.u3i2/catalogue/poddar-jyotishaly-jabalpur-jabalpur-astrologers-9twfq2g.jpg"
                                            alt="">
                                        <div class="portfolio-overlay"> <a class="popup-ajax stretched-link"
                                                href="ajax/portfolio-ajax-project-2.html"></a>
                                            <div class="portfolio-overlay-details">
                                                <h5 class="text-white fw-400">Project Title</h5>
                                                <span class="text-light">Category</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4 artwork photos"
                                style="position: absolute; left: 678px; top: 0px;">
                                <div class="portfolio-box rounded">
                                    <div class="portfolio-img rounded"> <img class="img-fluid d-block"
                                            src="https://5.imimg.com/data5/SELLER/Default/2022/7/QY/SH/IE/155467857/astrology-consultants-puja-havan-maha-yag-services-500x500.jpg"
                                            alt="">
                                        <div class="portfolio-overlay"> <a class="popup-ajax stretched-link"
                                                href="ajax/portfolio-ajax-project-3.html"></a>
                                            <div class="portfolio-overlay-details">
                                                <h5 class="text-white fw-400">Project Title</h5>
                                                <span class="text-light">Category</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4 artwork brand photos"
                                style="position: absolute; left: 0px; top: 233.859px;">
                                <div class="portfolio-box rounded">
                                    <div class="portfolio-img rounded"> <img class="img-fluid d-block"
                                            src="https://content3.jdmagicbox.com/comp/jabalpur/i2/9999px761.x761.110714135532.u3i2/catalogue/poddar-jyotishaly-jabalpur-jabalpur-astrologers-9twfq2g.jpg"
                                            alt="">
                                        <div class="portfolio-overlay"> <a class="popup-ajax stretched-link"
                                                href="ajax/portfolio-ajax-project-4.html"></a>
                                            <div class="portfolio-overlay-details">
                                                <h5 class="text-white fw-400">Project Title</h5>
                                                <span class="text-light">Category</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4 design"
                                style="position: absolute; left: 678px; top: 233.859px;">
                                <div class="portfolio-box rounded">
                                    <div class="portfolio-img rounded"> <img class="img-fluid d-block"
                                            src="https://www.instyle.com/thmb/psfP2A1Tt5wfzmS13ETYaOHKOg8=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/IS_PalmReading_Mounts_Final-2000-0e6aa8590a3b4bf18857e1a6f276d53a.jpg"
                                            alt="">
                                        <div class="portfolio-overlay"> <a class="popup-ajax stretched-link"
                                                href="ajax/portfolio-ajax-project-5.html"></a>
                                            <div class="portfolio-overlay-details">
                                                <h5 class="text-white fw-400">Project Title</h5>
                                                <span class="text-light">Category</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4 brand"
                                style="position: absolute; left: 678px; top: 467.718px;">
                                <div class="portfolio-box rounded">
                                    <div class="portfolio-img rounded"> <img class="img-fluid d-block"
                                            src="https://writechoice.files.wordpress.com/2013/06/cut-through.jpg"
                                            alt="">
                                        <div class="portfolio-overlay"> <a class="popup-ajax stretched-link"
                                                href="ajax/portfolio-ajax-project-6.html"></a>
                                            <div class="portfolio-overlay-details">
                                                <h5 class="text-white fw-400">Project Title</h5>
                                                <span class="text-light">Category</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4 design photos"
                                style="position: absolute; left: 339px; top: 550.047px;">
                                <div class="portfolio-box rounded">
                                    <div class="portfolio-img rounded"> <img class="img-fluid d-block"
                                            src="https://images.tv9hindi.com/wp-content/uploads/2021/08/Numerology.jpg?w=1280&enlarge=true"
                                            alt="">
                                        <div class="portfolio-overlay"> <a class="popup-ajax stretched-link"
                                                href="ajax/portfolio-ajax-project-7.html"></a>
                                            <div class="portfolio-overlay-details">
                                                <h5 class="text-white fw-400">Project Title</h5>
                                                <span class="text-light">Category</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Portfolio end -->

            <!-- Testimonial
        ============================================= -->


        <section id="testimonial" class="section">
                <div class="container px-lg-5">
                    <!-- Heading -->
                    <div class="position-relative d-flex text-center mb-5">
                        <h2 class="text-24 text-light opacity-4 text-uppercase fw-600 w-100 mb-0">Testimonial</h2>
                        <p class="text-9 text-dark fw-600 position-absolute w-100 align-self-center lh-base mb-0">
                            Client
                            Speak<span
                                class="heading-separator-line border-bottom border-3 border-primary d-block mx-auto"></span>
                        </p>
                    </div>
                    <!-- Heading end-->

                    <div class="owl-carousel owl-theme owl-loaded owl-drag" data-loop="true" data-nav="false"
                        data-autoplay="false" data-margin="25" data-stagepadding="0" data-slideby="1"
                        data-items-xs="1" data-items-sm="1" data-items-md="1" data-items-lg="2">




                        <div class="owl-stage-outer">
                            <div class="owl-stage"
                                style="transform: translate3d(-1018px, 0px, 0px); transition: all 0s ease 0s; width: 4072px;">
                                <div class="owl-item cloned" style="width: 484px; margin-right: 25px;">
                                    <div class="item">
                                        <div class="bg-light rounded p-5">
                                            <div class="d-flex align-items-center mt-auto mb-4"> <img
                                                    class="img-fluid rounded-circle border d-inline-block w-auto"
                                                    src="images/testimonial/client-sm-2.jpg" alt="">
                                                <p class="ms-3 mb-0"><strong class="d-block text-dark fw-600">Patrick
                                                        Cary</strong> <span class="text-muted fw-500">Freelancer from
                                                        USA</span></p>
                                            </div>
                                            <p class="text-dark fw-500 mb-4">“I am happy Working with printing and
                                                typesetting industry. Quidam lisque persius interesset his et, in quot
                                                quidam persequeris essent possim iriure.”</p>
                                            <span class="text-2"> <i class="fas fa-star text-warning"></i> <i
                                                    class="fas fa-star text-warning"></i> <i
                                                    class="fas fa-star text-warning"></i> <i
                                                    class="fas fa-star text-warning"></i> <i
                                                    class="fas fa-star text-warning"></i> </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item cloned" style="width: 484px; margin-right: 25px;">
                                    <div class="item">
                                        <div class="bg-light rounded p-5">
                                            <div class="d-flex align-items-center mt-auto mb-4"> <img
                                                    class="img-fluid rounded-circle border d-inline-block w-auto"
                                                    src="images/testimonial/client-sm-4.jpg" alt="">
                                                <p class="ms-3 mb-0"><strong class="d-block text-dark fw-600">Chris
                                                        Tom</strong> <span class="text-muted fw-500">User from
                                                        UK</span>
                                                </p>
                                            </div>
                                            <p class="text-dark fw-500 mb-4">“I have used them twice now. Good rates,
                                                very efficient service and priced simply dummy text of the printing and
                                                typesetting industry quidam interesset his et. Excellent.”</p>
                                            <span class="text-2"> <i class="fas fa-star text-warning"></i> <i
                                                    class="fas fa-star text-warning"></i> <i
                                                    class="fas fa-star text-warning"></i> <i
                                                    class="fas fa-star text-warning"></i> <i
                                                    class="fas fa-star text-warning"></i> </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item active" style="width: 484px; margin-right: 25px;">
                                    <div class="item">
                                        <div class="bg-light rounded p-5">
                                            <div class="d-flex align-items-center mt-auto mb-4"> <img
                                                    class="img-fluid rounded-circle border d-inline-block w-auto"
                                                    src="" alt="">
                                                <p class="ms-3 mb-0"><strong class="d-block text-dark fw-600">Dennis
                                                        Jacques</strong> <span class="text-muted fw-500">User from
                                                        USA</span></p>
                                            </div>
                                            <p class="text-dark fw-500 mb-4">“Only trying it out since a few days. But
                                                up to now excellent. Seems to work flawlessly. priced simply dummy text
                                                of the printing and typesetting industry.”</p>
                                            <span class="text-2"> <i class="fas fa-star text-warning"></i> <i
                                                    class="fas fa-star text-warning"></i> <i
                                                    class="fas fa-star text-warning"></i> <i
                                                    class="fas fa-star text-warning"></i> <i
                                                    class="fas fa-star text-warning"></i> </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item active" style="width: 484px; margin-right: 25px;">
                                    <div class="item">
                                        <div class="bg-light rounded p-5">
                                            <div class="d-flex align-items-center mt-auto mb-4"> <img
                                                    class="img-fluid rounded-circle border d-inline-block w-auto"
                                                    src="images/testimonial/client-sm-1.jpg" alt="">
                                                <p class="ms-3 mb-0"><strong class="d-block text-dark fw-600">Jay
                                                        Shah</strong> <span class="text-muted fw-500">Founder at
                                                        Icomatic Pvt Ltd</span></p>
                                            </div>
                                            <p class="text-dark fw-500 mb-4">"Easy to use, reasonably priced simply
                                                dummy text of the printing and typesetting industry. Quidam lisque
                                                persius interesset his et, in quot quidam possim iriure.”</p>
                                            <span class="text-2"> <i class="fas fa-star text-warning"></i> <i
                                                    class="fas fa-star text-warning"></i> <i
                                                    class="fas fa-star text-warning"></i> <i
                                                    class="fas fa-star text-warning"></i> <i
                                                    class="fas fa-star text-warning"></i> </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item" style="width: 484px; margin-right: 25px;">
                                    <div class="item">
                                        <div class="bg-light rounded p-5">
                                            <div class="d-flex align-items-center mt-auto mb-4"> <img
                                                    class="img-fluid rounded-circle border d-inline-block w-auto"
                                                    src="images/testimonial/client-sm-2.jpg" alt="">
                                                <p class="ms-3 mb-0"><strong class="d-block text-dark fw-600">Patrick
                                                        Cary</strong> <span class="text-muted fw-500">Freelancer from
                                                        USA</span></p>
                                            </div>
                                            <p class="text-dark fw-500 mb-4">“I am happy Working with printing and
                                                typesetting industry. Quidam lisque persius interesset his et, in quot
                                                quidam persequeris essent possim iriure.”</p>
                                            <span class="text-2"> <i class="fas fa-star text-warning"></i> <i
                                                    class="fas fa-star text-warning"></i> <i
                                                    class="fas fa-star text-warning"></i> <i
                                                    class="fas fa-star text-warning"></i> <i
                                                    class="fas fa-star text-warning"></i> </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item" style="width: 484px; margin-right: 25px;">
                                    <div class="item">
                                        <div class="bg-light rounded p-5">
                                            <div class="d-flex align-items-center mt-auto mb-4"> <img
                                                    class="img-fluid rounded-circle border d-inline-block w-auto"
                                                    src="images/testimonial/client-sm-4.jpg" alt="">
                                                <p class="ms-3 mb-0"><strong class="d-block text-dark fw-600">Chris
                                                        Tom</strong> <span class="text-muted fw-500">User from
                                                        UK</span>
                                                </p>
                                            </div>
                                            <p class="text-dark fw-500 mb-4">“I have used them twice now. Good rates,
                                                very efficient service and priced simply dummy text of the printing and
                                                typesetting industry quidam interesset his et. Excellent.”</p>
                                            <span class="text-2"> <i class="fas fa-star text-warning"></i> <i
                                                    class="fas fa-star text-warning"></i> <i
                                                    class="fas fa-star text-warning"></i> <i
                                                    class="fas fa-star text-warning"></i> <i
                                                    class="fas fa-star text-warning"></i> </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item cloned" style="width: 484px; margin-right: 25px;">
                                    <div class="item">
                                        <div class="bg-light rounded p-5">
                                            <div class="d-flex align-items-center mt-auto mb-4"> <img
                                                    class="img-fluid rounded-circle border d-inline-block w-auto"
                                                    src="images/testimonial/client-sm-3.jpg" alt="">
                                                <p class="ms-3 mb-0"><strong class="d-block text-dark fw-600">Dennis
                                                        Jacques</strong> <span class="text-muted fw-500">User from
                                                        USA</span></p>
                                            </div>
                                            <p class="text-dark fw-500 mb-4">“Only trying it out since a few days. But
                                                up to now excellent. Seems to work flawlessly. priced simply dummy text
                                                of the printing and typesetting industry.”</p>
                                            <span class="text-2"> <i class="fas fa-star text-warning"></i> <i
                                                    class="fas fa-star text-warning"></i> <i
                                                    class="fas fa-star text-warning"></i> <i
                                                    class="fas fa-star text-warning"></i> <i
                                                    class="fas fa-star text-warning"></i> </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item cloned" style="width: 484px; margin-right: 25px;">
                                    <div class="item">
                                        <div class="bg-light rounded p-5">
                                            <div class="d-flex align-items-center mt-auto mb-4"> <img
                                                    class="img-fluid rounded-circle border d-inline-block w-auto"
                                                    src="images/testimonial/client-sm-1.jpg" alt="">
                                                <p class="ms-3 mb-0"><strong class="d-block text-dark fw-600">Jay
                                                        Shah</strong> <span class="text-muted fw-500">Founder at
                                                        Icomatic Pvt Ltd</span></p>
                                            </div>
                                            <p class="text-dark fw-500 mb-4">"Easy to use, reasonably priced simply
                                                dummy text of the printing and typesetting industry. Quidam lisque
                                                persius interesset his et, in quot quidam possim iriure.”</p>
                                            <span class="text-2"> <i class="fas fa-star text-warning"></i> <i
                                                    class="fas fa-star text-warning"></i> <i
                                                    class="fas fa-star text-warning"></i> <i
                                                    class="fas fa-star text-warning"></i> <i
                                                    class="fas fa-star text-warning"></i> </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><i
                                    class="fa fa-chevron-left"></i></button><button type="button"
                                role="presentation" class="owl-next"><i class="fa fa-chevron-right"></i></button>
                        </div>
                        <div class="owl-dots"><button role="button"
                                class="owl-dot active"><span></span></button><button role="button"
                                class="owl-dot"><span></span></button></div>
                    </div>
                </div>
            </section>
            <!-- Testimonial end -->



        </div>
        <!-- Content end -->

        <!-- Footer
      ============================================= -->
        <footer id="footer" class="section">
            <div class="container px-lg-5">
                <div class="row">
                    <div class="col-lg-6 text-center text-lg-start">
                        <p class="mb-3 mb-lg-0">Copyright © 2024 <a href="#" class="fw-500">Astro-Buddy</a>.
                            All Rights
                            Reserved.</p>
                    </div>
                    <div class="col-lg-6">
                        <ul class="nav nav-separator justify-content-center justify-content-lg-end">
                            <li class="nav-item"> <a class="nav-link" data-bs-toggle="modal"
                                    data-bs-target="#terms-policy" href="#">Terms &amp; Policy</a></li>
                            <li class="nav-item"> <a class="nav-link" data-bs-toggle="modal"
                                    data-bs-target="#disclaimer" href="#">Disclaimer</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer end -->

    </div>
    <!-- Document Wrapper end -->

    <!-- Back to Top
    ============================================= -->
    <a id="back-to-top" class="rounded-circle" data-bs-toggle="tooltip" href="javascript:void(0)"
        aria-label="Back to Top" style="display: none;"><i class="fa fa-chevron-up"></i></a>

    <!-- Terms & Policy Modal
    ================================== -->
    <div id="terms-policy" class="modal fade" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Terms &amp; Policy</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <p>Simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
                        standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
                        scrambled it to make a type specimen book. It has survived not only five centuries, but also the
                        leap into electronic typesetting, remaining essentially unchanged.</p>
                    <h3 class="mb-3 mt-4 mt-4">Terms of Use</h3>
                    <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining
                        essentially unchanged. Simply dummy text of the printing and typesetting industry.</p>
                    <h5 class="text-4 mt-4">Part I – Information Simone collects and controls</h5>
                    <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown
                        printer took a galley of type and scrambled it to make a type specimen book.</p>
                    <h5 class="text-4 mt-4">Part II – Information that Simone processes on your behalf</h5>
                    <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown
                        printer took a galley of type and scrambled it to make a type specimen book.</p>
                    <h5 class="text-4 mt-4">Part III – General</h5>
                    <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining
                        essentially unchanged. Lorem Ipsum has been the industry's standard dummy text ever since the
                        1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen
                        book.</p>
                    <h3 class="mb-3 mt-4">Privacy Policy</h3>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                        of type and scrambled it to make a type specimen book. </p>
                    <ol class="lh-lg">
                        <li>Lisque persius interesset his et, in quot quidam persequeris vim, ad mea essent possim
                            iriure.</li>
                        <li>Quidam lisque persius interesset his et, Lisque persius interesset his et, in quot quidam
                            persequeris vim, ad mea essent possim iriure.</li>
                        <li>In quot quidam persequeris vim, ad mea essent possim iriure. Quidam lisque persius
                            interesset his et.</li>
                        <li>Quidam lisque persius interesset his et, Lisque persius interesset his et.</li>
                        <li>Interesset his et, Lisque persius interesset his et, in quot quidam persequeris vim, ad mea
                            essent possim iriure.</li>
                        <li>Persius interesset his et, Lisque persius interesset his et, in quot quidam persequeris vim,
                            ad mea essent possim iriure.</li>
                        <li>Quot quidam persequeris vim Quidam lisque persius interesset his et, Lisque persius
                            interesset his et, in quot quidam persequeris vim, ad mea essent possim iriure.</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Terms & Policy Modal End -->

    <!-- Disclaimer Modal
    ================================== -->
    <div id="disclaimer" class="modal fade" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Copyright &amp; Disclaimer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <p>Simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
                        standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
                        scrambled it to make a type specimen book. </p>
                    <ul class="lh-lg">
                        <li>Lisque persius interesset his et, in quot quidam persequeris vim, ad mea essent possim
                            iriure.</li>
                        <li>Quidam lisque persius interesset his et, Lisque persius interesset his et, in quot quidam
                            persequeris vim, ad mea essent possim iriure.</li>
                        <li>In quot quidam persequeris vim, ad mea essent possim iriure. Quidam lisque persius
                            interesset his et.</li>
                        <li>Quidam lisque persius interesset his et, Lisque persius interesset his et.</li>
                        <li>Interesset his et, Lisque persius interesset his et, in quot quidam persequeris vim, ad mea
                            essent possim iriure.</li>
                        <li>Persius interesset his et, Lisque persius interesset his et, in quot quidam persequeris vim,
                            ad mea essent possim iriure.</li>
                        <li>Quot quidam persequeris vim Quidam lisque persius interesset his et, Lisque persius
                            interesset his et, in quot quidam persequeris vim, ad mea essent possim iriure.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Disclaimer Modal End -->

    <!-- Styles Switcher -->
    <div id="styles-switcher" class="right">
        <h2 class="text-3">Color Switcher</h2>
        <hr>
        <ul>
            <li class="indigo" data-bs-toggle="tooltip" data-path="css/color-indigo.css" aria-label="Indigo"></li>
            <li class="blue" data-bs-toggle="tooltip" data-path="css/color-blue.css" aria-label="Blue"></li>
            <li class="purple" data-bs-toggle="tooltip" data-path="css/color-purple.css" aria-label="Purple"></li>
            <li class="cyan" data-bs-toggle="tooltip" data-path="css/color-cyan.css" aria-label="Cyan"></li>
            <li class="red" data-bs-toggle="tooltip" data-path="css/color-red.css" aria-label="Red"></li>
            <li class="pink" data-bs-toggle="tooltip" data-path="css/color-pink.css" aria-label="Pink"></li>
            <li class="green" data-bs-toggle="tooltip" data-path="css/color-green.css" aria-label="Green"></li>
            <li class="yellow" data-bs-toggle="tooltip" data-path="css/color-yellow.css" aria-label="Yellow"></li>
            <li class="orange" data-bs-toggle="tooltip" data-path="css/color-orange.css" aria-label="Orange"></li>
            <li class="brown" data-bs-toggle="tooltip" data-path="css/color-brown.css" aria-label="Brown"></li>
        </ul>
        <button class="btn btn-dark btn-sm w-100 border-0 fw-400 rounded-0 shadow-none" id="reset-color">Reset Default
            Teal</button>

    </div>
    <!-- Styles Switcher End -->

    <!-- JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Easing -->
    <script src="vendor/jquery.easing/jquery.easing.min.js"></script>
    <!-- Appear -->
    <script src="vendor/jquery.appear/jquery.appear.min.js"></script>
    <!-- Images Loaded -->
    <script src="vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <!-- Counter -->
    <script src="vendor/jquery.countTo/jquery.countTo.min.js"></script>
    <!-- Parallax Bg -->
    <script src="vendor/parallaxie/parallaxie.min.js"></script>
    <!-- Typed -->
    <script src="typed/typed.min.js"></script>
    <!-- Owl Carousel -->
    <script src="owl.carousel/owl.carousel.min.js"></script>
    <!-- isotope Portfolio Filter -->
    <script src="vendor/isotope/isotope.pkgd.min.js"></script>
    <!-- Magnific Popup -->
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
    <!-- Style Switcher -->
    <script src="js/switcher.min.js"></script>
    <!-- Custom Script -->
    <script src="js/theme.js"></script>
    <style type="text/css" data-typed-js-css="true">
        .typed-cursor {
            opacity: 1;
        }

        .typed-cursor.typed-cursor--blink {
            animation: typedjsBlink 0.7s infinite;
            -webkit-animation: typedjsBlink 0.7s infinite;
            animation: typedjsBlink 0.7s infinite;
        }

        @keyframes typedjsBlink {
            50% {
                opacity: 0.0;
            }
        }

        @-webkit-keyframes typedjsBlink {
            0% {
                opacity: 1;
            }

            50% {
                opacity: 0.0;
            }

            100% {
                opacity: 1;
            }
        }
    </style>
</body>



<script src="https://kit.fontawesome.com/d31220f8d2.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

</html>
