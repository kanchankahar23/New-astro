@extends('website.website_master')
@section('title', 'Home')
@section('content')
<style>
    .buyNow button{
    background-image: linear-gradient(0deg, rgb(231, 143, 5) 0%, rgb(203, 74, 12)
    100%);
    color: white;
    padding: 15px;
    width: 30%;
    border-radius: 22px;
    font-weight: 500;
    border: 1px solid #ffffff;
    }
    .premium-kundali-section{
    position: relative;
    padding-top: 20%;
    padding-bottom: 23%;
    margin-bottom: 10%;
    margin-top: 10%;
    }
    .premium-kundali-section img{
    width: 100%;
    height: auto;
    /* border-radius: 15px; */
    }
    .discription-image{
    box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
    border-radius: 7px;
    background: white;
    padding-bottom: 11px;
    overflow: hidden;
    z-index: 9;
    }
    .discription-image1{
    position: absolute;
    top: 15%;
    width: 160px;
    animation: hero-thumb-animation2 2s linear infinite alternate;
    }
    .discription-image2{
    position: absolute;
    top: 4%;
    width: 160px;
    left: 30%;
    animation: hero-thumb-animation 2s linear infinite alternate;
    }
    .discription-image3{
    position: absolute;
    top: 4%;
    width: 160px;
    left: 60%;
    animation: hero-thumb-animation2 2s linear infinite alternate;
    }
    .discription-image4{
    position: absolute;
    top: 14%;
    width: 160px;
    left: 83%;
    animation: hero-thumb-animation 2s linear infinite alternate;
    }
    .discription-image5{
    position: absolute;
    bottom: 15%;
    width: 160px;
    left: 83%;
    animation: hero-thumb-animation2 2s linear infinite alternate;
    }
    .discription-image6{
    position: absolute;
    bottom: 0%;
    width: 160px;
    left: 54%;
    animation: hero-thumb-animation 2s linear infinite alternate;
    }
    .discription-image7{
    position: absolute;
    bottom: 0%;
    width: 160px;
    left: 25%;
    animation: hero-thumb-animation2 2s linear infinite alternate;
    }
    .discription-image8{
    position: absolute;
    bottom: 17%;
    width: 160px;
    left: 0%;
    animation: hero-thumb-animation 2s linear infinite alternate;
    }
    .discription-image9{
    width: 610px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    opacity: 0.1;
    
    }
    .premium-kundali-discription p{
    color: #262626;
    font-weight: 500;
    font-family: poppins;
    font-size: 14px;
    text-align: center;
    margin-top: 10px;
    }
    .kundali-heading{
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    width: 100%;
    margin: auto;
    text-align: center;
    }
    .about-kundali{
    font-size: 2rem;
    color: black;
    font-weight: 600;
    }
    @media (max-width: 1024px) and (min-width: 992px){
    .discription-image9{
    width: 400px;
    }
    
    .discription-image8 , .discription-image7 , .discription-image6 ,
    .discription-image5 , .discription-image4 , .discription-image3 ,
    .discription-image2 , .discription-image1{
    width: 150px ;
    }
    .premium-kundali-discription p{
    font-size: 8px;
    }
    .kundali-heading{
    width: 100%;
    }
    .premium-kundali-section{
    padding-top: 25%;
    padding-bottom: 25%;
    margin-bottom: 25%;
    }
    .discription-image1{
    top: 5%;
    }
    .discription-image3{
    top: 5%;
    left: 56%;
    }
    .discription-image2{
    top: -12%;
    }
    .discription-image4{
    left: auto;
    right: 0%;
    top: -12%;
    }
    .discription-image8{
    bottom: 4%;
    }
    .discription-image5{
    bottom: -12%;
    left: auto;
    right: 0%;
    }
    .discription-image7{
    bottom: -12%;
    }
    .buyNow button{
    margin-top: 15px;
    }
    }
    @media (max-width: 992px) and (min-width: 768px){
    .discription-image9{
    width: 400px;
    }
    
    .discription-image8 , .discription-image7 , .discription-image6 ,
    .discription-image5 , .discription-image4 , .discription-image3 ,
    .discription-image2 , .discription-image1{
    width: 140px ;
    }
    .premium-kundali-discription p{
    font-size: 8px;
    }
    .kundali-heading{
    width: 100%;
    }
    .premium-kundali-section{
    padding-top: 30%;
    padding-bottom: 30%;
    margin-bottom: 25%;
    }
    .discription-image1{
    top: 5%;
    }
    .discription-image3{
    top: 5%;
    left: 56%;
    }
    .discription-image2{
    top: -12%;
    }
    .discription-image4{
    left: auto;
    right: 0%;
    top: -12%;
    }
    .discription-image8{
    bottom: 4%;
    }
    .discription-image5{
    bottom: -12%;
    left: auto;
    right: 0%;
    }
    .discription-image7{
    bottom: -12%;
    }
    .buyNow button{
    margin-top: 15px;
    }
    }
    @media (max-width: 768px) and (min-width: 552px){
    .discription-image9{
    width: 400px;
    }
    
    .discription-image8 , .discription-image7 , .discription-image6 ,
    .discription-image5 , .discription-image4 , .discription-image3 ,
    .discription-image2 , .discription-image1{
    width: 140px ;
    }
    .premium-kundali-discription p{
    font-size: 8px;
    }
    .kundali-heading{
    width: 100%;
    }
    .premium-kundali-section{
    padding-top: 40%;
    padding-bottom: 40%;
    margin-bottom: 25%;
    }
    .discription-image1{
    top: 5%;
    }
    .discription-image3{
    top: 5%;
    left: 56%;
    }
    .discription-image2{
    top: -12%;
    }
    .discription-image4{
    left: auto;
    right: 0%;
    top: -12%;
    }
    .discription-image8{
    bottom: 4%;
    }
    .discription-image5{
    bottom: -12%;
    left: auto;
    right: 0%;
    }
    .discription-image7{
    bottom: -12%;
    }
    .buyNow button{
    margin-top: 15px;
    }
    }
    @media (max-width: 552px) and (min-width: 480px){
    .discription-image9{
    width: 400px;
    }
    
    .discription-image8 , .discription-image7 , .discription-image6 ,
    .discription-image5 , .discription-image4 , .discription-image3 ,
    .discription-image2 , .discription-image1{
    width: 100px ;
    }
    .premium-kundali-discription p{
    font-size: 8px;
    }
    .kundali-heading{
    width: 100%;
    }
    .premium-kundali-section{
    padding-top: 40%;
    padding-bottom: 40%;
    margin-bottom: 25%;
    }
    .discription-image1{
    top: 5%;
    }
    .discription-image3{
    top: 5%;
    left: 56%;
    }
    .discription-image2{
    top: -12%;
    }
    .discription-image4{
    left: auto;
    right: 0%;
    top: -12%;
    }
    .discription-image8{
    bottom: 4%;
    }
    .discription-image5{
    bottom: -12%;
    left: auto;
    right: 0%;
    }
    .discription-image7{
    bottom: -12%;
    }
    .buyNow button{
    margin-top: 15px;
    }
    }
    @media (max-width: 480px) and (min-width: 320px) {
    
    .discription-image9{
    width: 100%;
    }
    
    .discription-image8 , .discription-image7 , .discription-image6 ,
    .discription-image5 , .discription-image4 , .discription-image3 ,
    .discription-image2 , .discription-image1{
    width: 80px;
    }
    .premium-kundali-discription p{
    font-size: 10px;
    }
    .kundali-heading{
    width: 100%;
    }
    .premium-kundali-section{
    padding-top: 50%;
    padding-bottom: 50%;
    margin-bottom: 25%;
    margin-top: 20%;
    }
    .discription-image1{
    top: 5%;
    }
    .discription-image3{
    top: 5%;
    left: 56%;
    }
    .discription-image2{
    top: -12%;
    }
    .discription-image4{
    left: auto;
    top: -12%;
    right: 0%;
    }
    .discription-image8{
    bottom: 4%;
    }
    .discription-image5{
    bottom: -12%;
    right: 0%;
    left: auto;
    }
    .discription-image7{
    bottom: -12%;
    }
    .discription-image6{
    left: 49%;
    }
    .discription-heading {
    margin-bottom: 15px;
    }
    .buyNow button{
    margin-top: 15px;
    }
    }
    
    @keyframes hero-thumb-animation{
    0% {
    transform: translateY(-20px);
    }
    
    100% {
    transform: translateY(0px);
    }
    }
    
    @keyframes hero-thumb-animation2{
    0% {
    transform: translateY(0px);
    }
    
    100% {
    transform: translateY(-20px);
    }
    }
</style>
<style>
    .emoji{
        width:10px;
        margin-bottom: 2px !important;
    }
    .cardsofGems {
    display: flex;
    gap: 15px;
    overflow-x: auto;
    scroll-snap-type: x mandatory;
    white-space: nowrap;
    -webkit-overflow-scrolling: touch;
    }

    .newAddCards {
    flex: 0 0 auto;
    width: 250px; /* Adjust based on your design */
    /* scroll-snap-align: start; */
    }

    @media (max-width: 768px) {
    .cardsofGems {
    scroll-behavior: smooth; /* Smooth scrolling effect */
    overflow-x: scroll;
    scrollbar-width: none; /* Hide scrollbar in Firefox */
    -ms-overflow-style: none; /* Hide scrollbar in IE/Edge */
    }

    .cardsofGems::-webkit-scrollbar {
    display: none; /* Hide scrollbar in Chrome/Safari */
    }
    }
</style>
<style>
    .starrating i {
    font-size: 0.7rem;
    color: #ff9800;
    margin: 8px 2px;
    }

    .starrating{
    display: flex;
    align-items: center;
    justify-content: center;
    }
    .pandittagLine{
    background-color: #ccc;
    border: 0;
    height: 1px;
    margin-bottom: 1em;
    margin-top: 10px;
    }
</style>

<!-- gems section css start -->
<style>
    .gems {
        {{--  margin: 77px auto;  --}}
    margin-left: -11%;
    margin-right: -11%;
    padding-bottom: 31px;
    padding-top: 1px;
    background-blend-mode: lighten;
    position: relative;
    background: linear-gradient(180deg, #ffffff, #f5f5f5);
    }

    /* .gems::after {
        position: absolute;
        content: '';
        background-image: url(http://127.0.0.1:8000/website/assets/shape.svg);
        background-repeat: no-repeat;
        width: 100%;
        height: 190px;
        left: 0;
        right: 0;
        transform: scaleY(-1);
        bottom: 0;
        z-index: 1;
    } */

    .stoneGems {
        width: 80%;
        display: flex;
        flex-direction: column;
        align-items: center;
        margin: 40px auto;
        justify-content: center;
    }

    .headingofGems {
        width: 100%;
        margin-bottom: 54px;
    }

    .headingofGems h2 {
        text-align: center;
        position: relative;
    }

    .headingofGems h2 img {
        position: absolute;
        bottom: 0;
    }

    .headingofGems p {
        font-size: 1rem;
        color: black;
        margin: 10px auto;
    }

    .headingofGems h2 img {
        position: absolute;
        bottom: -78%;
        width: 269px;
        left: 50%;
        transform: translate(-50%, 0);
    }

    .headingofGems p {
        font-size: 0.9rem;
        color: black;
        margin: 10px auto;
        margin-top: 52px;
        width: 80%;
        text-align: center;
    }

    .cardsofGems {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .newAddCards {
        width: 250px;
        border-radius: 10px;
        overflow: hidden;
        / background-color: rgb(255, 255, 255);/ box-shadow: 0px 0px 28px 0px rgb(238 238 238);
        border: 1px solid rgb(231 231 231 / 47%);
        cursor: pointer;
        position: relative;
        background-color: white;
    }

    .newAddCards:hover .hidden-content {
        transform: translateY(0);
        opacity: 1;
    }

    .visitWeb {}

    .hidden-content {
        position: absolute;
        bottom: 30%;
        height: 70%;
        left: 0;
        right: 0;
        / background-color: #ffffffed;/ backdrop-filter: blur(15px);
        color: #000000;
        padding: 5px 0;
        text-align: center;
        opacity: 0;
        font-weight: 500 !important;
        font-size: 0.9rem !important;
        font-family: "Poppins", serif;
        transform: translateY(100%);
        transition: transform 0.3s ease, opacity 0.3s ease;
        z-index: 1;
        border-radius: 0px;
        display: flex;
        align-items: center;
        justify-content: center !important;
    }

    .hidden-content a {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .stonePayment {
        color: #000000;
        font-weight: 500 !important;
        text-align: center;
        font-size: 0.9rem !important;
        width: 100% !important;
        padding: 5px 0 !important;
        background: white;
        margin-bottom: 0 !important;
        font-family: "Poppins", serif !important;
        display: flex;
        align-items: center;
        justify-content: center !important;
    }

    .addImages {
        width: 100%;
        overflow: hidden;
        height: 250px;
        object-fit: cover;
    }

    .addImages img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .describethegoods {
        / height: 89px;/ padding: 1px 10px;
        / border: 1px solid blue;/ background: white;
    }

    .starofGems {
        display: flex;
        align-items: center;
        justify-content: start;
        margin: 10px 10px;
    }

    .starofGems i {
        font-size: 13px;
        margin-right: 3px;
        color: #f4aa36;
    }


    .describethegoods h3 {
        font-size: 20px;
        width: 93%;
        margin: 0 auto;
        color: #0b0b0b;
        font-weight: 400;
        font-family: 'Philosopher', sans-serif;
    }

    .describethegoods p {
        font-size: 15px;
        width: 93%;
        font-weight: 600;
        margin: 5px auto;
        margin-bottom: 13px !important;
        font-size: 17px;
        font-family: "Lato", serif;
        display: flex;
        align-items: center;
        justify-content: start;
    }

    .usesObject {
        font-family: "Poppins", serif;
        color: #0000;
        font-size: 0.85rem;
    }

    .describethegoods p span:nth-child(1) {
        width: 70px;
        color: #000000;
        font-family: 'Philosopher', sans-serif;
    }

    .describethegoods p span:nth-child(2) {
        color: #797979;
        text-decoration: line-through;
        font-family: 'Philosopher', sans-serif;
    }

    .describethegoods p span i {
        font-size: 14px;
        margin-right: 2px;
    }

    .actualvalue {
        / color: #f18f22;/ color: #f4aa36;
    }
</style>
<style>
    /* Media Queries for Responsive Design */
    /* @media (max-width: 768px) {
            .ss-container {
              flex-direction: column;
              height: auto;
            }

            .ss-left,
            .ss-right {
              flex: none;
              width: 100%;

            .ss-left h1 {
              font-size: 1.5rem;
            }

            .ss-left p {
              font-size: 0.9rem;
            }

            .ss-circle {
              width: 80vw;
              height: 80vw;
            }
          }

          @media (max-width: 480px) {
            .ss-left h1 {
              font-size: 1.2rem;
            }

            .ss-left p {
              font-size: 0.8rem;
            } */
    /* } */
</style>
</style>
<style>
    .increesnum {
        background: url({{ url('assets/images/mobileNumberBg.jpg')}}) !important;
    }

    .first-section {
        position: relative;
        background-color: #333;
        /* Ensure background is visible */
        padding: 2rem 0;
    }



    .pandit-profil {
        display: flex;
        flex-wrap: wrap;
    }

    .contain {
        position: relative;
    }

    .chakra,
    .panditjii {
        margin-bottom: 1rem;
    }

    .rr-chakra {

        animation: rotate360 6s linear infinite;
    }

    @keyframes rotate360 {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);
        }
    }
    .label {
    background: rgb(121, 24, 120) !important;
    rotate: 307deg !important;
    position: absolute !important;
    left: -30px !important;
    top: 7% !important;
    align-items: center !important;
    justify-content: center !important;
    display: flex!important;
    height: 26px !important;
    width: 101px !important;
    }
</style>

<main id="primary" class="site-main">
    <section class="al-main-page-container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12"
                    style='padding-right: 0;  padding-left: 0;'>
                    <div class="al-page-columns">
                        <article id="post-13"
                            class="post-13 page type-page status-publish hentry">
                            <div class="al-details-wrapper">
                                <!-- entry-content -->
                                <div class="ss-container">
                                    <div class="ss-left ss-left-1">
                                        <div class="ss-content ss-content-1">
                                            <h1 class="your-sign your-sign-1">
                                                Trust Our Astrologer</h1>
                                            <h1
                                                class="professional professional-1">
                                                Start Control Your Professional
                                                Destiny</h1>
                                            <p class="luck luck-1" style="">
                                                Don't believe in luck. Get the
                                                right
                                                guidance according to
                                                your sign. Your sign says a lot
                                                about you. </p>

                                        </div>
                                    </div>
                                    <div class="ss-right">
                                        <div class="ss-circle">
                                            <img src="https://astro-buddy.com/website/uploads/sites/3/2021/08/astro-banner-hand.png"
                                                alt="Chakra"
                                                class="ss-chakra-image" />
                                            <img src="https://astro-buddy.com/website/uploads/sites/3/2021/08/pandit.png     "
                                                alt="Pandit Image"
                                                class="ss-pandit-image" />
                                        </div>
                                    </div>
                                </div>



                                <div class="container">
                                    <div class="row">
                                        <div
                                            class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="al-page-columns">
                                                <article id="post-13"
                                                    class="post-13 page type-page status-publish hentry">
                                                    <div
                                                        class="al-details-wrapper">
                                                        <!-- entry-content -->
                                                        <div
                                                            class="entry-content al-single-data">

                                                            <div
                                                                class="vc_row-full-width vc_clearfix">
                                                            </div>
                                                            <div data-vc-full-width="true"
                                                                data-vc-full-width-init="false"
                                                                class="vc_row wpb_row vc_row-fluid vc_custom_1631103438264 vc_row-has-fill">
                                                                <div
                                                                    class="wpb_column vc_column_container vc_col-sm-12">
                                                                    <div
                                                                        class="vc_column-inner">
                                                                        <div
                                                                            class="wpb_wrapper">
                                                                            <div class="vc_empty_space"
                                                                                style="height: 36px">
                                                                                <span
                                                                                    class="vc_empty_space_inner"></span>
                                                                            </div>
                                                                            <div
                                                                                class="text-center al-heading-wrap al-heading-img">
                                                                                <h1 class="text-center al-heading"
                                                                                    style="color: #222222">
                                                                                    Our
                                                                                    Astrologers
                                                                                </h1>
                                                                                <img src="{{ asset('website/uploads/sites/3/2021/09/1.png') }}"
                                                                                    alt="Heaing"
                                                                                    class="img-responsive" />
                                                                                <div class="al-sub"
                                                                                    style="color: #222222">
                                                                                    Meet
                                                                                    our
                                                                                    top
                                                                                    Astrologers
                                                                                    having
                                                                                    great
                                                                                    experience
                                                                                    and
                                                                                    diverse
                                                                                    knwoledge
                                                                                    in
                                                                                    their
                                                                                    respective
                                                                                    fields
                                                                                </div>
                                                                            </div>
                                                                            <div class="vc_empty_space"
                                                                                style="height: 46px">
                                                                                <span
                                                                                    class="vc_empty_space_inner"></span>
                                                                            </div>
                                                                            <div
                                                                                class="al-testimonial-wrapper al-team-sldr-wrapper">
                                                                                <div
                                                                                    class="container">
                                                                                    <div
                                                                                        class="al-testimonial-slider-wrapper">
                                                                                        <div
                                                                                            class="swiper-container">
                                                                                            <div
                                                                                                class="swiper-wrapper">
                                                                                                @foreach($astrologers  as $astrologer)
                                                                                                <div
                                                                                                    class="swiper-slide">

                                                                                                    <div
                                                                                                        class="rr-container">
                                                                                                        <div
                                                                                                            class="rr-appointment-card">
                @if(!empty($astrologer->astrologerDetail->getTag->name))
                        <div class="label"
                            style="background:{{ $astrologer->astrologerDetail->getTag->color ?? 'rgb(121, 24, 120)' }}">
                            <h3 class='PremiumCards' style="font-size: 0.7rem !important;
                            font-weight: 500 !important;">{{
                                $astrologer->astrologerDetail->getTag->name ?? '' }}
                            </h3>
                        </div>
                @endif
                                                                                                            <img src="{{ url($astrologer->avtar) ?? 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png' }}"
                                                                                                                alt="Astrologer Photo"
                                                                                                                class="rr-astrologer-photo" />
                                                                                                                <span class="status badge badge-dark circle"
                                                                                                                    id="user-{{ $astrologer->id }}-status">
                                                                                                                    Checking.
                                                                                                                </span>
                                                                                                            <h2 onclick='portfolio("{{ $astrologer->slug }}")'
                                                                                                                class="rr-astrologer-name">
                                                                                                                {{
                                                                                                               Str::limit(
                                                                                                                $astrologer->name
                                                                                                                ??
                                                                                                                ''
                                                                                                                ,
                                                                                                                15)}}
                                                                                                                {{--  @if(isset($astrologer->last_seen) && $astrologer->last_seen >= now()->subMinutes(5))
                                                                                                                <i style="font-size: 10px; color: #4fe005;" class="fas solid fa-circle"></i>
                                                                                                                @endif  --}}
                                                                                                            </h2>
                    @php
                    $totalRatings = $astrologer->GetRating->count();
                    $rating = $totalRatings > 0
                    ? $astrologer->GetRating->sum('rating') / $totalRatings
                    : 3;

                    $fullStars = floor($rating);
                    $halfStar = ($rating - $fullStars) >= 0.5 ? 1 : 0;
                    $emptyStars = 5 - $fullStars - $halfStar;
                    @endphp

                    <div class="starrating">
                        @for ($i = 0; $i < $fullStars; $i++) <i class="fa-solid fa-star"></i>
                            @endfor
                            @if ($halfStar)
                            <i class="fa-solid fa-star-half-stroke"></i>
                            @endif
                            @for ($i = 0; $i < $emptyStars; $i++) <i class="fa-regular fa-star"></i>
                                @endfor
                    </div>
                                                                                                            <hr class="pandittagLine" />
                                                                                                            <div
                                                                                                                class="rr-appointment-details">
                                                                                                                <p
                                                                                                                    class="rr-payment">
                                                                                                                    <a
                                                                                                                        href="{{ url('appointment/call', encrypt($astrologer->id)) }}"><span><i
                                                                                                                                class="fa-solid fa-phone"></i></span></a>
                                                                                                                    <a
                                                                                                                        href="{{ url('appointment/vcall', encrypt($astrologer->id)) }}"><span><i
                                                                                                                                class="fa-solid fa-video"></i></span>
                                                                                                                    </a>
                                                                                                                    <a
                                                                                                                        href="{{ url('appointment/chat', encrypt($astrologer->id)) }}"><span><i
                                                                                                                                class="fa-brands fa-rocketchat"></i></span></a>

                                                                                                                </p>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                @endforeach
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="swiper-button-prev"
                                                                                            tabindex="0"
                                                                                            role="button"
                                                                                            aria-label="Previous slide"
                                                                                            aria-controls="swiper-wrapper-f6593c349f5cafdf">
                                                                                        </div>
                                                                                        <div class="swiper-button-next"
                                                                                            tabindex="0"
                                                                                            role="button"
                                                                                            aria-label="Next slide"
                                                                                            aria-controls="swiper-wrapper-f6593c349f5cafdf">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div
                                                                                        class="al-slidr-btn">
                                                                                        <a href="{{ url('/astrologers') }}"
                                                                                            class="al-btn">See
                                                                                            All</a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="vc_empty_space"
                                                                                style="height: 80px">
                                                                                <span
                                                                                    class="vc_empty_space_inner"></span>
                                                                            </div>
                                                                        </div>


                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="vc_row-full-width vc_clearfix"
                                                                id="about">
                                                            </div>
                                                            <div data-vc-full-width="true"
                                                                data-vc-full-width-init="false"
                                                                class="vc_row wpb_row vc_row-fluid vc_custom_1632907904450 vc_r
                                            ow-has-fill">
                                                                <div
                                                                    class="wpb_column vc_column_container vc_col-sm-12">
                                                                    <div
                                                                        class="vc_column-inner">
                                                                        <div
                                                                            class="wpb_wrapper">
                                                                            <div class="vc_empty_space"
                                                                                style="height: 36px">
                                                                                <span
                                                                                    class="vc_empty_space_inner"></span>
                                                                            </div>
                                                                            <div
                                                                                class="text-center al-heading-wrap al-heading-img">
                                                                                <h1 class="text-center al-heading"
                                                                                    style="color: #222222">
                                                                                    About
                                                                                    AstroBuddy
                                                                                </h1>
                                                                                <img src="{{ asset('website/uploads/sites/3/2021/09/1.png') }}"
                                                                                    alt="Heaing"
                                                                                    class="img-responsive" />
                                                                                <div class="al-sub"
                                                                                    style="color: #222222">
                                                                                    AstroBuddy
                                                                                    provides
                                                                                    its
                                                                                    user
                                                                                    a
                                                                                    chance
                                                                                    to
                                                                                    meet
                                                                                    Experienced
                                                                                    Astrologers.
                                                                                    The
                                                                                    one
                                                                                    who
                                                                                    actually
                                                                                    reads
                                                                                    user's
                                                                                    Kundli.
                                                                                </div>
                                                                            </div>
                                                                            <div class="vc_empty_space"
                                                                                style="height: 41px">
                                                                                <span
                                                                                    class="vc_empty_space_inner"></span>
                                                                            </div>
                                                                            <div
                                                                                class="container">
                                                                                <div
                                                                                    class="row align-items-center">
                                                                                    <div
                                                                                        class="col-lg-5 col-md-5">
                                                                                        <div
                                                                                            class="as-aboutimg">
                                                                                            <img src="{{ asset('website/assets/indian-pandit-culture.png') }}"
                                                                                                alt="video-image"
                                                                                                class="img-responsive responsive-img"
                                                                                                height="300" />

                                                                                        </div>
                                                                                    </div>
                                                                                    <div
                                                                                        class="col-lg-1 col-md-1">
                                                                                    </div>

                                                                                    <div
                                                                                        class="col-lg-6 col-md-6">
                                                                                        <div
                                                                                            class="as-about-detail">
                                                                                            <h1
                                                                                                class="as-heading">
                                                                                                We
                                                                                                believe
                                                                                                on
                                                                                                understanding
                                                                                                problem
                                                                                                rather
                                                                                                than
                                                                                                solutions
                                                                                            </h1>
                                                                                            <div
                                                                                                class="as-paragraph-wrapper">
                                                                                                <p>
                                                                                                    There
                                                                                                    can
                                                                                                    be
                                                                                                    many
                                                                                                    ways
                                                                                                    by
                                                                                                    which
                                                                                                    people's
                                                                                                    history
                                                                                                    can
                                                                                                    be
                                                                                                    told,
                                                                                                    understood
                                                                                                    and
                                                                                                    realized.
                                                                                                    But
                                                                                                    there
                                                                                                    is
                                                                                                    only
                                                                                                    one
                                                                                                    way
                                                                                                    to
                                                                                                    predict
                                                                                                    their
                                                                                                    future
                                                                                                    or
                                                                                                    to
                                                                                                    provide
                                                                                                    solutions
                                                                                                    to
                                                                                                    their
                                                                                                    problems.
                                                                                                </p>
                                                                                            </div>
                                                                                            <div
                                                                                                class="as-contact-expert">
                                                                                                <div
                                                                                                    class="as-icon">
                                                                                                    <img src="{{ asset('website/uploads/sites/3/2021/08/download.svg') }}"
                                                                                                        alt="About-video"
                                                                                                        class="img-responsive" />
                                                                                                </div>
                                                                                                <div
                                                                                                    class="infoo">
                                                                                                    <span
                                                                                                        class="as-year-ex">
                                                                                                        30
                                                                                                    </span>
                                                                                                    <div>
                                                                                                        <h5>That
                                                                                                            is
                                                                                                            what
                                                                                                            makes
                                                                                                            us
                                                                                                        </h5>
                                                                                                        <h1>&nbsp;Astro
                                                                                                            Buddy
                                                                                                        </h1>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <!-- <a href="/about-us/" class="al-btn"
                                                                                            >Read More</a
                                                                                          > -->
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="vc_empty_space"
                                                                                style="height: 78px">
                                                                                <span
                                                                                    class="vc_empty_space_inner"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="vc_row-full-width vc_clearfix">
                                                            </div>
                                                           
                                                                <div class="premium-kundali-section">
                                                                    <div class="premium-kundaliiheading">
                                                                        <div class="kundali-heading">
                                                                            <div class="discription-heading">
                                                                                <p class="about-kundali">Premium Kundali</p>
                                                                                <img src="{{ url('/') }}/website/uploads/sites/3/2021/09/1.png"
                                                                                    alt="Heaing" class="img-responsive">
                                                                            </div>
                                                                            <p style="color: black; font-weight: 500;">Premium Kundali offers a
                                                                                personalized Kundli reading by seasoned astrologers who study
                                                                                every detail of your birth chart to guide your future with
                                                                                clarity.</p>
                                                                            <div class="buyNow link-btn" style="z-index: 999;">
                                                                              <a href="{{ url('/premiumKundli') }}" style="color:white"><button style="width: auto; padding: 15px 40px;">Buy
                                                                                        Now</button></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="premium-kundali-discription">
                                                                        <div class="discription-images">
                                                                            <div class="discription-image1 discription-image">
                                                                                <img src="assets/images/premium1.png">
                                                                                <p>Customized Kundli</p>
                                                                            </div>
                                                                            <div class="discription-image2 discription-image">
                                                                                <img src="assets/images/premium2.png">
                                                                                <p> Experts Mentorship</p>
                                                                            </div>
                                                                            <div class="discription-image3 discription-image">
                                                                                <img src="assets/images/premium.png">
                                                                                <p>Birth Chart Analysis </p>
                                                                            </div>
                                                                            <div class="discription-image4 discription-image">
                                                                                <img src="assets/images/premium3.png">
                                                                                <p>Career Insights</p>
                                                                            </div>
                                                                            <div class="discription-image5 discription-image">
                                                                                <img src="assets/images/premium6.png">
                                                                                <p>Future Predictions
                                                                                </p>
                                                                            </div>
                                                                            <div class="discription-image6 discription-image">
                                                                                <img src="assets/images/premium7.png">
                                                                                <p>Remedy Guidance</p>
                                                                            </div>
                                                                            <div class="discription-image7 discription-image">
                                                                                <img src="assets/images/premium5.png">
                                                                                <p>Dasha Analysis</p>
                                                                            </div>
                                                                            <div class="discription-image8 discription-image">
                                                                                <img src="assets/images/premium4.png">
                                                                                <p>Marriage Analysis</p>
                                                                            </div>
                                                                            <div class="discription-image9">
                                                                                <img src="assets/images/image(4).png">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <div
                                                                class="vc_row-full-width vc_clearfix">
                                                            </div>
                                                            <div data-vc-full-width="true"
                                                                data-vc-full-width-init="false"
                                                                class="vc_row wpb_row vc_row-fluid vc_custom_1632906626587 vc_row-has-fill">
                                                                <div
                                                                    class="wpb_column vc_column_container vc_col-sm-12">
                                                                    <div
                                                                        class="vc_column-inner">
                                                                        <div
                                                                            class="wpb_wrapper">



                                                                            <div class="vc_empty_space"
                                                                                style="height: 36px">
                                                                                <span
                                                                                    class="vc_empty_space_inner"></span>
                                                                            </div>
                                                                            <div
                                                                                class="text-center al-heading-wrap al-heading-img">
                                                                                <h1 class="text-center al-heading"
                                                                                    style="color: #222222">
                                                                                    Horoscope
                                                                                    Forecasts
                                                                                </h1>
                                                                                <img src="{{ asset('website/uploads/sites/3/2021/09/1.png') }}"
                                                                                    alt="Heaing"
                                                                                    class="img-responsive" />
                                                                                <div class="al-sub"
                                                                                    style="color: #222222">
                                                                                    It
                                                                                    is
                                                                                    a
                                                                                    long
                                                                                    established
                                                                                    fact
                                                                                    that
                                                                                    a
                                                                                    reader
                                                                                    will
                                                                                    be
                                                                                    distracted
                                                                                    by
                                                                                    the
                                                                                    readable
                                                                                    content
                                                                                    of
                                                                                    a
                                                                                    page
                                                                                    when
                                                                                    looking
                                                                                    at
                                                                                    its
                                                                                    layout.
                                                                                    The
                                                                                    point
                                                                                    of
                                                                                    using
                                                                                    Lorem
                                                                                    Ipsum
                                                                                    .
                                                                                </div>
                                                                            </div>
                                                                            <div class="vc_empty_space"
                                                                                style="height: 12px">
                                                                                <span
                                                                                    class="vc_empty_space_inner"></span>
                                                                            </div>
                                                                            <div
                                                                                class="vc_row wpb_row vc_inner vc_row-fluid homehoropage">
                                                                                <div
                                                                                    class="wpb_column inHoroBoxes vc_column_container vc_col-sm-6 vc_col-md-2">
                                                                                    <div class="vc_column-inner"
                                                                                        onclick="window.location='{{ url('daily/horoscope/1') }}'">
                                                                                        <div
                                                                                            class="wpb_wrapper">
                                                                                            <div
                                                                                                class="col-12">
                                                                                                <div
                                                                                                    class="text-center as-sign-box raShiOfFrontPage">
                                                                                                    <span
                                                                                                        class="as-sign">
                                                                                                        <img src="{{ asset('website/uploads/sites/3/2021/09/download-1.svg') }}"
                                                                                                            alt="horoscope_img"
                                                                                                            class="img-responsive" />
                                                                                                    </span>
                                                                                                    <div
                                                                                                        class="al-expert-content">
                                                                                                        <a
                                                                                                            href="#">
                                                                                                            <h5>Aries
                                                                                                            </h5>
                                                                                                        </a>
                                                                                                        <p>{{
                                                                                                            date('M
                                                                                                            d')
                                                                                                            }}
                                                                                                        </p>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="wpb_column inHoroBoxes vc_column_container vc_col-sm-6 vc_col-md-2">
                                                                                    <div class="vc_column-inner"
                                                                                        onclick="window.location='{{ url('daily/horoscope/2') }}'">
                                                                                        <div
                                                                                            class="wpb_wrapper">
                                                                                            <div
                                                                                                class="col-12">
                                                                                                <div
                                                                                                    class="text-center as-sign-box raShiOfFrontPage">
                                                                                                    <span
                                                                                                        class="as-sign">
                                                                                                        <img src="{{ asset('website/uploads/sites/3/2021/09/taurus.svg') }}"
                                                                                                            alt="horoscope_img"
                                                                                                            class="img-responsive" />
                                                                                                    </span>
                                                                                                    <div
                                                                                                        class="al-expert-content">
                                                                                                        <a
                                                                                                            href="#">
                                                                                                            <h5>Taurus
                                                                                                            </h5>
                                                                                                        </a>
                                                                                                        <p>{{
                                                                                                            date('M
                                                                                                            d')
                                                                                                            }}
                                                                                                        </p>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="wpb_column inHoroBoxes vc_column_container vc_col-sm-6 vc_col-md-2">
                                                                                    <div class="vc_column-inner"
                                                                                        onclick="window.location='{{ url('daily/horoscope/3') }}'">
                                                                                        <div
                                                                                            class="wpb_wrapper">
                                                                                            <div
                                                                                                class="col-12">
                                                                                                <div
                                                                                                    class="text-center as-sign-box raShiOfFrontPage">
                                                                                                    <span
                                                                                                        class="as-sign">
                                                                                                        <img src="{{ asset('website/uploads/sites/3/2021/12/Gemini1.svg') }}"
                                                                                                            alt="horoscope_img"
                                                                                                            class="img-responsive" />
                                                                                                    </span>
                                                                                                    <div
                                                                                                        class="al-expert-content">
                                                                                                        <a
                                                                                                            href="#">
                                                                                                            <h5>Gemini
                                                                                                            </h5>
                                                                                                        </a>
                                                                                                        <p>{{
                                                                                                            date('M
                                                                                                            d')
                                                                                                            }}
                                                                                                        </p>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="wpb_column inHoroBoxes vc_column_container vc_col-sm-6 vc_col-md-2">
                                                                                    <div class="vc_column-inner"
                                                                                        onclick="window.location='{{ url('daily/horoscope/4') }}'">
                                                                                        <div
                                                                                            class="wpb_wrapper">
                                                                                            <div
                                                                                                class="col-12">
                                                                                                <div
                                                                                                    class="text-center as-sign-box raShiOfFrontPage">
                                                                                                    <span
                                                                                                        class="as-sign">
                                                                                                        <img src="{{ asset('website/uploads/sites/3/2021/09/cancer.svg') }}"
                                                                                                            alt="horoscope_img"
                                                                                                            class="img-responsive" />
                                                                                                    </span>
                                                                                                    <div
                                                                                                        class="al-expert-content">
                                                                                                        <a
                                                                                                            href="#">
                                                                                                            <h5>Cancer
                                                                                                            </h5>
                                                                                                        </a>
                                                                                                        <p>{{
                                                                                                            date('M
                                                                                                            d')
                                                                                                            }}
                                                                                                        </p>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="wpb_column inHoroBoxes vc_column_container vc_col-sm-6 vc_col-md-2">
                                                                                    <div class="vc_column-inner"
                                                                                        onclick="window.location='{{ url('daily/horoscope/5') }}'">
                                                                                        <div
                                                                                            class="wpb_wrapper">
                                                                                            <div
                                                                                                class="col-12">
                                                                                                <div
                                                                                                    class="text-center as-sign-box raShiOfFrontPage">
                                                                                                    <span
                                                                                                        class="as-sign">
                                                                                                        <img src="{{ asset('website/uploads/sites/3/2021/09/leo.svg') }}"
                                                                                                            alt="horoscope_img"
                                                                                                            class="img-responsive" />
                                                                                                    </span>
                                                                                                    <div
                                                                                                        class="al-expert-content">
                                                                                                        <a
                                                                                                            href="#">
                                                                                                            <h5>Leo
                                                                                                            </h5>
                                                                                                        </a>
                                                                                                        <p>{{
                                                                                                            date('M
                                                                                                            d')
                                                                                                            }}
                                                                                                        </p>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="wpb_column inHoroBoxes vc_column_container vc_col-sm-6 vc_col-md-2">
                                                                                    <div class="vc_column-inner"
                                                                                        onclick="window.location='{{ url('daily/horoscope/6') }}'">
                                                                                        <div
                                                                                            class="wpb_wrapper">
                                                                                            <div
                                                                                                class="col-12">
                                                                                                <div
                                                                                                    class="text-center as-sign-box raShiOfFrontPage">
                                                                                                    <span
                                                                                                        class="as-sign">
                                                                                                        <img src="{{ asset('website/uploads/sites/3/2021/09/virgo.svg') }}"
                                                                                                            alt="horoscope_img"
                                                                                                            class="img-responsive" />
                                                                                                    </span>
                                                                                                    <div
                                                                                                        class="al-expert-content">
                                                                                                        <a
                                                                                                            href="#">
                                                                                                            <h5>Virgo
                                                                                                            </h5>
                                                                                                        </a>
                                                                                                        <p>{{
                                                                                                            date('M
                                                                                                            d')
                                                                                                            }}
                                                                                                        </p>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="vc_row wpb_row vc_inner vc_row-fluid homehoropage">
                                                                                <div
                                                                                    class="wpb_column inHoroBoxes vc_column_container vc_col-sm-6 vc_col-md-2">
                                                                                    <div class="vc_column-inner"
                                                                                        onclick="window.location='{{ url('daily/horoscope/7') }}'">
                                                                                        <div
                                                                                            class="wpb_wrapper">
                                                                                            <div
                                                                                                class="col-12">
                                                                                                <div
                                                                                                    class="text-center as-sign-box raShiOfFrontPage">
                                                                                                    <span
                                                                                                        class="as-sign">
                                                                                                        <img src="{{ asset('website/uploads/sites/3/2021/09/libra.svg') }}"
                                                                                                            alt="horoscope_img"
                                                                                                            class="img-responsive" />
                                                                                                    </span>
                                                                                                    <div
                                                                                                        class="al-expert-content">
                                                                                                        <a
                                                                                                            href="#">
                                                                                                            <h5>Libra
                                                                                                            </h5>
                                                                                                        </a>
                                                                                                        <p>{{
                                                                                                            date('M
                                                                                                            d')
                                                                                                            }}
                                                                                                        </p>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="wpb_column inHoroBoxes vc_column_container vc_col-sm-6 vc_col-md-2">
                                                                                    <div class="vc_column-inner"
                                                                                        onclick="window.location='{{ url('daily/horoscope/8') }}'">
                                                                                        <div
                                                                                            class="wpb_wrapper">
                                                                                            <div
                                                                                                class="col-12">
                                                                                                <div
                                                                                                    class="text-center as-sign-box raShiOfFrontPage">
                                                                                                    <span
                                                                                                        class="as-sign">
                                                                                                        <img src="{{ asset('website/uploads/sites/3/2021/09/scorpio.svg') }}"
                                                                                                            alt="horoscope_img"
                                                                                                            class="img-responsive" />
                                                                                                    </span>
                                                                                                    <div
                                                                                                        class="al-expert-content">
                                                                                                        <a
                                                                                                            href="#">
                                                                                                            <h5>Scorpio
                                                                                                            </h5>
                                                                                                        </a>
                                                                                                        <p>{{
                                                                                                            date('M
                                                                                                            d')
                                                                                                            }}
                                                                                                        </p>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="wpb_column inHoroBoxes vc_column_container vc_col-sm-6 vc_col-md-2">
                                                                                    <div class="vc_column-inner"
                                                                                        onclick="window.location='{{ url('daily/horoscope/9') }}'">
                                                                                        <div
                                                                                            class="wpb_wrapper">
                                                                                            <div
                                                                                                class="col-12">
                                                                                                <div
                                                                                                    class="text-center as-sign-box raShiOfFrontPage">
                                                                                                    <span
                                                                                                        class="as-sign">
                                                                                                        <img src="{{ asset('website/uploads/sites/3/2021/09/sagittairus.svg') }}"
                                                                                                            alt="horoscope_img"
                                                                                                            class="img-responsive" />
                                                                                                    </span>
                                                                                                    <div
                                                                                                        class="al-expert-content">
                                                                                                        <a
                                                                                                            href="#">
                                                                                                            <h5>Sagittairus
                                                                                                            </h5>
                                                                                                        </a>
                                                                                                        <p>{{
                                                                                                            date('M
                                                                                                            d')
                                                                                                            }}
                                                                                                        </p>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="wpb_column inHoroBoxes vc_column_container vc_col-sm-6 vc_col-md-2">
                                                                                    <div class="vc_column-inner"
                                                                                        onclick="window.location='{{ url('daily/horoscope/10') }}'">
                                                                                        <div
                                                                                            class="wpb_wrapper">
                                                                                            <div
                                                                                                class="col-12">
                                                                                                <div
                                                                                                    class="text-center as-sign-box raShiOfFrontPage">
                                                                                                    <span
                                                                                                        class="as-sign">
                                                                                                        <img src="{{ asset('website/uploads/sites/3/2021/09/capricorn.svg') }}"
                                                                                                            alt="horoscope_img"
                                                                                                            class="img-responsive" />
                                                                                                    </span>
                                                                                                    <div
                                                                                                        class="al-expert-content">
                                                                                                        <a
                                                                                                            href="#">
                                                                                                            <h5>Capricorn
                                                                                                            </h5>
                                                                                                        </a>
                                                                                                        <p>{{
                                                                                                            date('M
                                                                                                            d')
                                                                                                            }}
                                                                                                        </p>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="wpb_column inHoroBoxes vc_column_container vc_col-sm-6 vc_col-md-2">
                                                                                    <div class="vc_column-inner"
                                                                                        onclick="window.location='{{ url('daily/horoscope/11') }}'">
                                                                                        <div
                                                                                            class="wpb_wrapper">
                                                                                            <div
                                                                                                class="col-12">
                                                                                                <div
                                                                                                    class="text-center as-sign-box raShiOfFrontPage">
                                                                                                    <span
                                                                                                        class="as-sign">
                                                                                                        <img src="{{ asset('website/uploads/sites/3/2021/09/aquarius.svg') }}"
                                                                                                            alt="horoscope_img"
                                                                                                            class="img-responsive" />
                                                                                                    </span>
                                                                                                    <div
                                                                                                        class="al-expert-content">
                                                                                                        <a
                                                                                                            href="#">
                                                                                                            <h5>Aquarius
                                                                                                            </h5>
                                                                                                        </a>
                                                                                                        <p>{{
                                                                                                            date('M
                                                                                                            d')
                                                                                                            }}
                                                                                                        </p>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="wpb_column inHoroBoxes vc_column_container vc_col-sm-6 vc_col-md-2">
                                                                                    <div class="vc_column-inner"
                                                                                        onclick="window.location='{{ url('daily/horoscope/12') }}'">
                                                                                        <div
                                                                                            class="wpb_wrapper">
                                                                                            <div
                                                                                                class="col-12">
                                                                                                <div
                                                                                                    class="text-center as-sign-box raShiOfFrontPage">
                                                                                                    <span
                                                                                                        class="as-sign">
                                                                                                        <img src="{{ asset('website/uploads/sites/3/2021/09/pisces.svg') }}"
                                                                                                            alt="horoscope_img"
                                                                                                            class="img-responsive" />
                                                                                                    </span>
                                                                                                    <div
                                                                                                        class="al-expert-content">
                                                                                                        <a
                                                                                                            href="#">
                                                                                                            <h5>Pisces
                                                                                                            </h5>
                                                                                                        </a>
                                                                                                        <p>{{
                                                                                                            date('M
                                                                                                            d')
                                                                                                            }}
                                                                                                        </p>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="vc_empty_space"
                                                                                style="height: 79px">
                                                                                <span
                                                                                    class="vc_empty_space_inner"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>





                                                            <div
                                                                class="vc_row-full-width vc_clearfix">
                                                            </div>
                                                            <div class="vc_row wpb_row vc_row-fluid"
                                                                id="services">
                                                                <div
                                                                    class="wpb_column vc_column_container vc_col-sm-12">
                                                                    <div
                                                                        class="vc_column-inner">
                                                                        <div
                                                                            class="wpb_wrapper">
                                                                            <div class="vc_empty_space"
                                                                                style="height: 37px">
                                                                                <span
                                                                                    class="vc_empty_space_inner"></span>
                                                                            </div>
                                                                            <div
                                                                                class="text-center al-heading-wrap al-heading-img">
                                                                                <h1 class="text-center al-heading"
                                                                                    style="color: #222222">
                                                                                    Our
                                                                                    Services
                                                                                </h1>
                                                                                <img src="{{ asset('website/uploads/sites/3/2021/09/1.png') }}"
                                                                                    alt="Heaing"
                                                                                    class="img-responsive" />
                                                                                <div class="al-sub"
                                                                                    style="color: #222222">
                                                                                    Harmony
                                                                                    Homes
                                                                                    crafts
                                                                                    spaces
                                                                                    aligning
                                                                                    Vastu,
                                                                                    Astrology,
                                                                                    and
                                                                                    Numerology,
                                                                                    fostering
                                                                                    positive
                                                                                    energy
                                                                                    and
                                                                                    well-being
                                                                                    in
                                                                                    every
                                                                                    design.
                                                                                </div>
                                                                            </div>
                                                                            <div class="vc_empty_space"
                                                                                style="height: 12px">
                                                                                <span
                                                                                    class="vc_empty_space_inner"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="vc_row wpb_row vc_row-fluid">
                                                                <div
                                                                    class="wpb_column vc_column_container vc_col-sm-6 vc_col-lg-6 vc_hidden-md vc_hidden-sm vc_hidden-xs">
                                                                    <div
                                                                        class="vc_column-inner">
                                                                        <div
                                                                            class="wpb_wrapper">
                                                                            <div
                                                                                class="vc_row wpb_row vc_inner vc_row-fluid">
                                                                                <div
                                                                                    class="wpb_column vc_column_container vc_col-sm-12">
                                                                                    <div
                                                                                        class="vc_column-inner">
                                                                                        <div
                                                                                            class="wpb_wrapper">
                                                                                            <div class="vc_empty_space"
                                                                                                style="height: 50px">
                                                                                                <span
                                                                                                    class="vc_empty_space_inner"></span>
                                                                                            </div>
                                                                                            <div
                                                                                                class="text-center al-single-img al-animation">
                                                                                                <img src="{{ asset('website/uploads/sites/3/2021/08/download.png') }}"
                                                                                                    alt="astrology image"
                                                                                                    class="img-responsive" />
                                                                                            </div>
                                                                                            <div
                                                                                                class="as-service-img">
                                                                                                <img src="{{ asset('website/assets/indian-old-pandit-culture.png') }}"
                                                                                                    alt="astrology image"
                                                                                                    class="as-service-img img-responsive" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="wpb_column vc_column_container vc_col-sm-12 vc_col-lg-6 vc_col-md-12">
                                                                    <div
                                                                        class="vc_column-inner">
                                                                        <div
                                                                            class="wpb_wrapper">
                                                                            <div
                                                                                class="vc_row wpb_row vc_inner vc_row-fluid">
                                                                                <div
                                                                                    class="wpb_column vc_column_container vc_col-sm-6">
                                                                                    <a
                                                                                        href="{{ url('astrologers') }}">
                                                                                        <div
                                                                                            class="vc_column-inner">
                                                                                            <div
                                                                                                class="wpb_wrapper">
                                                                                                <div class="text-center as-service-box"
                                                                                                    id="astro-65c4b59cbc462">
                                                                                                    <h1
                                                                                                        class="as-icon">
                                                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                                            preserveAspectRatio="xMidYMid"
                                                                                                            width="85"
                                                                                                            height="70"
                                                                                                            viewBox="0 0 85 70">
                                                                                                            <path
                                                                                                                d="M83.340,66.666 L70.391,66.666 C69.474,66.666 68.730,65.920 68.730,65.000 C68.730,64.079 69.474,63.333 70.391,63.333 L81.680,63.333 L81.680,20.000 L78.359,20.000 L78.359,58.333 C78.359,59.254 77.616,60.000 76.699,60.000 L49.119,60.000 C46.979,60.000 45.116,61.389 44.425,63.333 L55.449,63.333 C56.366,63.333 57.109,64.079 57.109,65.000 C57.109,65.920 56.366,66.666 55.449,66.666 L30.381,66.666 L30.381,68.333 C30.381,69.254 29.637,70.000 28.721,70.000 L22.080,70.000 C21.163,70.000 20.420,69.254 20.420,68.333 L20.420,66.666 L1.660,66.666 C0.743,66.666 -0.000,65.920 -0.000,65.000 L-0.000,18.333 C-0.000,17.413 0.743,16.667 1.660,16.667 L6.641,16.667 L6.641,11.667 C6.641,10.746 7.384,10.000 8.301,10.000 L17.871,10.000 L24.019,0.742 C24.327,0.278 24.845,-0.000 25.400,-0.000 C25.956,-0.000 26.474,0.278 26.782,0.742 L32.929,10.000 L35.859,10.000 C38.572,10.000 40.984,11.313 42.500,13.339 C44.016,11.313 46.428,10.000 49.141,10.000 L76.699,10.000 C77.616,10.000 78.359,10.746 78.359,11.667 L78.359,16.667 L83.340,16.667 C84.257,16.667 85.000,17.413 85.000,18.333 L85.000,65.000 C85.000,65.920 84.257,66.666 83.340,66.666 ZM20.420,52.725 C16.342,51.670 13.779,49.374 13.779,46.666 C13.779,45.746 14.523,45.000 15.439,45.000 C16.356,45.000 17.100,45.746 17.100,46.666 C17.100,47.466 18.238,48.488 20.231,49.188 L17.233,13.333 L9.961,13.333 L9.961,56.666 L20.420,56.666 L20.420,52.725 ZM20.420,60.000 L8.301,60.000 C7.384,60.000 6.641,59.254 6.641,58.333 L6.641,20.000 L3.320,20.000 L3.320,63.333 L20.420,63.333 L20.420,60.000 ZM30.381,63.333 L40.533,63.333 C39.847,61.393 38.002,60.000 35.838,60.000 L30.381,60.000 L30.381,63.333 ZM23.740,66.666 L27.060,66.666 L27.060,53.268 C26.514,53.310 25.960,53.333 25.400,53.333 C24.841,53.333 24.287,53.310 23.740,53.268 L23.740,66.666 ZM25.400,4.671 L20.462,12.107 L23.623,49.909 C24.205,49.967 24.797,50.000 25.400,50.000 C26.003,50.000 26.596,49.967 27.178,49.909 L30.338,12.107 L25.400,4.671 ZM40.840,18.333 C40.840,15.576 38.606,13.333 35.859,13.333 L33.568,13.333 L30.570,49.188 C32.563,48.487 33.701,47.466 33.701,46.666 C33.701,45.746 34.445,45.000 35.361,45.000 C36.278,45.000 37.021,45.746 37.021,46.666 C37.021,49.374 34.459,51.670 30.381,52.725 L30.381,56.666 L35.838,56.666 C37.715,56.666 39.448,57.296 40.840,58.354 L40.840,18.333 ZM75.039,13.333 L49.141,13.333 C46.394,13.333 44.160,15.576 44.160,18.333 L44.160,58.332 C45.552,57.286 47.274,56.666 49.119,56.666 L75.039,56.666 L75.039,13.333 ZM47.978,25.000 C47.978,24.079 48.722,23.333 49.639,23.333 L51.584,23.333 C54.169,23.333 56.598,22.323 58.426,20.488 C58.737,20.176 59.159,20.000 59.600,20.000 C60.040,20.000 60.462,20.176 60.773,20.488 C62.601,22.323 65.031,23.333 67.615,23.333 L69.560,23.333 C70.477,23.333 71.221,24.079 71.221,25.000 L71.221,29.648 C71.221,37.731 67.221,45.235 60.521,49.720 C60.242,49.907 59.921,50.000 59.600,50.000 C59.279,50.000 58.957,49.907 58.679,49.720 C51.979,45.235 47.978,37.731 47.978,29.648 L47.978,25.000 ZM51.299,29.648 C51.299,36.235 54.382,42.377 59.600,46.293 C64.817,42.377 67.900,36.235 67.900,29.648 L67.900,26.667 L67.615,26.667 C64.672,26.667 61.878,25.691 59.600,23.891 C57.321,25.691 54.528,26.667 51.584,26.667 L51.299,26.667 L51.299,29.648 ZM59.600,30.000 C62.346,30.000 64.580,32.243 64.580,35.000 C64.580,37.757 62.346,40.000 59.600,40.000 C56.853,40.000 54.619,37.757 54.619,35.000 C54.619,32.243 56.853,30.000 59.600,30.000 ZM59.600,36.667 C60.515,36.667 61.260,35.919 61.260,35.000 C61.260,34.081 60.515,33.333 59.600,33.333 C58.684,33.333 57.939,34.081 57.939,35.000 C57.939,35.919 58.684,36.667 59.600,36.667 ZM62.920,63.333 C63.837,63.333 64.580,64.079 64.580,65.000 C64.580,65.920 63.837,66.666 62.920,66.666 C62.003,66.666 61.260,65.920 61.260,65.000 C61.260,64.079 62.003,63.333 62.920,63.333 Z"
                                                                                                                class="cls-1">
                                                                                                            </path>
                                                                                                        </svg>
                                                                                                    </h1>
                                                                                                    <h4
                                                                                                        class="as-subheading">
                                                                                                        Astrology
                                                                                                    </h4>
                                                                                                    <p>
                                                                                                        Know
                                                                                                        effect
                                                                                                        of
                                                                                                        Zodiac
                                                                                                        signs,
                                                                                                        Planetary
                                                                                                        influences.
                                                                                                    </p>
                                                                                                    <a href="/"
                                                                                                        class="al-link">Read
                                                                                                        More</a>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </a>

                                                                                </div>
                                                                                <div
                                                                                    class="wpb_column vc_column_container vc_col-sm-6">
                                                                                    <a
                                                                                        href="{{ url('numerology') }}">
                                                                                        <div
                                                                                            class="vc_column-inner">
                                                                                            <div
                                                                                                class="wpb_wrapper">
                                                                                                <div class="text-center as-service-box"
                                                                                                    id="astro-65c4b59cbc780">
                                                                                                    <h1
                                                                                                        class="as-icon">
                                                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                            width="58"
                                                                                                            height="69"
                                                                                                            fill="currentColor"
                                                                                                            class="bi bi-123"
                                                                                                            viewBox="0 0 16 16"
                                                                                                            preserveAspectRatio="xMidYMid">
                                                                                                            <path
                                                                                                                d="M2.873 11.297V4.142H1.699L0 5.379v1.137l1.64-1.18h.06v5.961zm3.213-5.09v-.063c0-.618.44-1.169 1.196-1.169.676 0 1.174.44 1.174 1.106 0 .624-.42 1.101-.807 1.526L4.99 10.553v.744h4.78v-.99H6.643v-.069L8.41 8.252c.65-.724 1.237-1.332 1.237-2.27C9.646 4.849 8.723 4 7.308 4c-1.573 0-2.36 1.064-2.36 2.15v.057zm6.559 1.883h.786c.823 0 1.374.481 1.379 1.179.01.707-.55 1.216-1.421 1.21-.77-.005-1.326-.419-1.379-.953h-1.095c.042 1.053.938 1.918 2.464 1.918 1.478 0 2.642-.839 2.62-2.144-.02-1.143-.922-1.651-1.551-1.714v-.063c.535-.09 1.347-.66 1.326-1.678-.026-1.053-.933-1.855-2.359-1.845-1.5.005-2.317.88-2.348 1.898h1.116c.032-.498.498-.944 1.206-.944.703 0 1.206.435 1.206 1.07.005.64-.504 1.106-1.2 1.106h-.75z" />
                                                                                                        </svg>
                                                                                                    </h1>
                                                                                                    <h4
                                                                                                        class="as-subheading">
                                                                                                        Numerology
                                                                                                    </h4>
                                                                                                    <p>
                                                                                                        Get
                                                                                                        life
                                                                                                        path
                                                                                                        insights
                                                                                                        with
                                                                                                        Number
                                                                                                        symbolism,
                                                                                                        patterns.
                                                                                                    </p>
                                                                                                    <a href="/"
                                                                                                        class="al-link">Read
                                                                                                        More</a>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="vc_row wpb_row vc_inner vc_row-fluid">
                                                                                <div
                                                                                    class="wpb_column vc_column_container vc_col-sm-6">
                                                                                    <a
                                                                                        href="{{ url('astrologers') }}">
                                                                                        <div
                                                                                            class="vc_column-inner">
                                                                                            <div
                                                                                                class="wpb_wrapper">
                                                                                                <div class="text-center as-service-box"
                                                                                                    id="astro-65c4b59cbccc2">
                                                                                                    <h1
                                                                                                        class="as-icon">
                                                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                                            preserveAspectRatio="xMidYMid"
                                                                                                            width="71"
                                                                                                            height="71"
                                                                                                            viewBox="0 0 71 71">
                                                                                                            <path
                                                                                                                d="M60.602,60.602 C53.897,67.307 44.982,71.000 35.500,71.000 C28.999,71.000 22.640,69.226 17.111,65.871 C16.265,65.358 15.429,64.802 14.626,64.218 C14.153,63.873 14.049,63.209 14.393,62.736 C14.738,62.262 15.402,62.158 15.875,62.503 C16.630,63.052 17.416,63.575 18.211,64.058 C23.409,67.211 29.387,68.878 35.500,68.878 C44.416,68.878 52.798,65.406 59.102,59.102 C65.407,52.798 68.878,44.416 68.878,35.500 C68.878,26.584 65.407,18.202 59.102,11.898 C52.798,5.593 44.416,2.121 35.500,2.121 C26.584,2.121 18.202,5.593 11.898,11.898 C5.593,18.202 2.121,26.584 2.121,35.500 C2.121,44.187 5.441,52.414 11.469,58.665 C11.876,59.087 11.864,59.759 11.442,60.165 C11.020,60.572 10.349,60.560 9.942,60.138 C3.531,53.489 -0.000,44.739 -0.000,35.500 C-0.000,26.017 3.693,17.103 10.398,10.398 C17.103,3.693 26.018,-0.000 35.500,-0.000 C44.982,-0.000 53.897,3.693 60.602,10.398 C67.307,17.103 71.000,26.017 71.000,35.500 C71.000,44.982 67.307,53.897 60.602,60.602 ZM27.588,8.676 C27.440,8.109 27.780,7.530 28.347,7.382 C32.783,6.227 37.443,6.129 41.922,7.090 C55.258,9.953 65.084,22.126 65.084,35.761 C65.084,51.930 51.930,65.084 35.760,65.084 C32.479,65.084 29.202,64.534 26.104,63.450 C20.792,61.592 16.067,58.180 12.613,53.740 C11.753,52.635 11.028,51.463 10.291,50.277 C9.858,49.580 9.529,49.050 9.243,48.273 C8.954,47.485 8.554,46.733 8.260,45.943 C7.053,42.691 6.437,39.229 6.437,35.761 C6.437,30.049 8.124,24.405 11.254,19.652 C14.116,15.305 18.131,11.754 22.798,9.450 C23.324,9.191 23.960,9.407 24.219,9.932 C24.478,10.457 24.263,11.094 23.738,11.353 C19.362,13.512 15.651,16.809 12.979,20.897 L25.467,20.897 L32.871,8.713 C31.523,8.856 30.188,9.095 28.882,9.435 C28.314,9.583 27.736,9.243 27.588,8.676 ZM38.344,8.681 L45.767,20.897 L58.532,20.897 C54.114,14.153 46.785,9.481 38.344,8.681 ZM59.662,23.139 C59.631,23.084 59.570,23.019 59.456,23.019 L47.056,23.019 L53.462,33.560 L59.658,23.378 C59.717,23.280 59.693,23.194 59.662,23.139 ZM62.963,35.761 C62.963,32.094 62.232,28.595 60.911,25.400 L54.703,35.602 L60.985,45.939 C62.259,42.793 62.963,39.358 62.963,35.761 ZM59.779,48.271 C59.809,48.216 59.834,48.130 59.774,48.033 L53.461,37.643 L46.920,48.391 L59.573,48.391 C59.687,48.391 59.748,48.326 59.779,48.271 ZM35.617,62.667 C35.678,62.667 35.762,62.647 35.819,62.553 L41.687,52.910 C41.991,52.410 42.644,52.251 43.144,52.556 C43.645,52.860 43.804,53.513 43.499,54.013 L38.116,62.859 C46.699,62.120 54.156,57.378 58.605,50.513 L28.089,50.513 L35.416,62.553 C35.473,62.647 35.557,62.667 35.617,62.667 ZM33.102,62.832 L25.605,50.513 L12.917,50.513 C17.313,57.297 24.646,62.008 33.102,62.832 ZM11.675,48.391 L24.314,48.391 L17.774,37.643 L11.476,48.007 C11.541,48.136 11.608,48.264 11.675,48.391 ZM10.491,25.676 C9.219,28.863 8.558,32.279 8.558,35.761 C8.558,39.250 9.220,42.587 10.422,45.655 L16.531,35.602 L10.491,25.676 ZM11.778,23.019 C11.756,23.019 11.736,23.023 11.718,23.028 C11.664,23.129 11.610,23.231 11.557,23.333 C11.563,23.348 11.567,23.362 11.577,23.378 L17.772,33.559 L24.178,23.019 L11.778,23.019 ZM19.014,35.601 L26.798,48.391 L44.477,48.391 L52.220,35.601 L44.574,23.019 L26.660,23.019 L19.014,35.601 ZM27.950,20.897 L43.285,20.897 L35.819,8.612 C35.806,8.590 35.791,8.573 35.775,8.559 C35.770,8.559 35.765,8.558 35.760,8.558 C35.659,8.558 35.557,8.562 35.455,8.563 C35.441,8.577 35.427,8.592 35.415,8.612 L27.950,20.897 ZM45.214,37.193 L37.193,45.214 C36.726,45.681 36.113,45.914 35.500,45.914 C34.887,45.914 34.274,45.681 33.807,45.214 L25.786,37.193 C24.852,36.259 24.852,34.740 25.786,33.806 L33.807,25.785 C34.740,24.852 36.259,24.852 37.193,25.785 L45.214,33.806 C46.148,34.740 46.148,36.259 45.214,37.193 ZM43.714,35.307 L35.693,27.285 C35.640,27.232 35.570,27.206 35.500,27.206 C35.430,27.206 35.360,27.232 35.307,27.285 L27.286,35.307 C27.179,35.413 27.179,35.586 27.286,35.693 L35.307,43.714 C35.413,43.821 35.587,43.821 35.693,43.714 L43.714,35.693 C43.821,35.586 43.821,35.413 43.714,35.307 ZM35.500,39.262 C33.426,39.262 31.738,37.574 31.738,35.500 C31.738,33.425 33.426,31.737 35.500,31.737 C37.574,31.737 39.262,33.425 39.262,35.500 C39.262,37.574 37.574,39.262 35.500,39.262 ZM35.500,33.859 C34.595,33.859 33.859,34.595 33.859,35.500 C33.859,36.404 34.595,37.140 35.500,37.140 C36.405,37.140 37.141,36.404 37.141,35.500 C37.141,34.595 36.405,33.859 35.500,33.859 Z"
                                                                                                                class="cls-1">
                                                                                                            </path>
                                                                                                        </svg>
                                                                                                    </h1>
                                                                                                    <h4
                                                                                                        class="as-subheading">
                                                                                                        Palmistry
                                                                                                    </h4>
                                                                                                    <p>
                                                                                                        Indian
                                                                                                        architecture,
                                                                                                        spatial
                                                                                                        harmony,
                                                                                                        energy
                                                                                                        flow.
                                                                                                    </p>
                                                                                                    <a href="/"
                                                                                                        class="al-link">Read
                                                                                                        More</a>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </a>
                                                                                </div>
                                                                                <div
                                                                                    class="wpb_column vc_column_container vc_col-sm-6">
                                                                                    <a
                                                                                        href="{{ url('astrologers') }}">
                                                                                        <div
                                                                                            class="vc_column-inner">
                                                                                            <div
                                                                                                class="wpb_wrapper">
                                                                                                <div class="text-center as-service-box"
                                                                                                    id="astro-65c4b59cbcf7b">
                                                                                                    <h1
                                                                                                        class="as-icon">
                                                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                                            preserveAspectRatio="xMidYMid"
                                                                                                            width="70"
                                                                                                            height="70"
                                                                                                            viewBox="0 0 70 70">
                                                                                                            <path
                                                                                                                d="M70.000,67.742 L70.000,70.000 L-0.000,70.000 L-0.000,67.742 L10.161,67.742 L10.161,49.677 L7.903,49.677 L7.903,42.903 L12.419,42.903 L12.419,38.684 C12.419,36.677 13.766,34.891 15.695,34.341 L20.322,33.021 L20.322,31.003 C18.941,29.761 18.064,27.967 18.064,25.967 L18.064,23.710 C18.064,19.973 21.103,16.935 24.839,16.935 C28.575,16.935 31.613,19.973 31.613,23.710 L31.613,25.967 C31.613,27.968 30.737,29.762 29.355,31.003 L29.355,33.020 L33.983,34.341 C35.814,34.864 37.107,36.505 37.233,38.387 L43.565,38.387 L49.624,32.327 C47.025,31.379 45.161,28.890 45.161,25.967 L45.161,23.710 C45.161,19.973 48.199,16.935 51.935,16.935 C55.671,16.935 58.710,19.973 58.710,23.710 L58.710,25.967 C58.710,27.939 57.858,29.710 56.510,30.949 C57.866,31.656 58.710,33.034 58.710,34.569 L58.710,36.129 L63.226,36.129 L63.226,50.806 C63.226,54.742 60.330,58.006 56.560,58.602 L57.473,67.742 L70.000,67.742 ZM52.957,67.742 L55.204,67.742 L54.301,58.709 L52.054,58.709 L52.957,67.742 ZM44.032,67.742 L50.688,67.742 L49.785,58.709 L44.032,58.709 L44.032,67.742 ZM36.560,67.742 L35.431,65.484 L18.762,65.484 L17.633,67.742 L36.560,67.742 ZM12.419,51.935 L15.806,51.935 L15.806,54.193 L12.419,54.193 L12.419,67.742 L15.108,67.742 L17.366,63.225 L36.827,63.225 L39.085,67.742 L41.774,67.742 L41.774,54.193 L18.064,54.193 L18.064,51.935 L41.774,51.935 L41.774,49.677 L12.419,49.677 L12.419,51.935 ZM10.161,45.161 L10.161,47.419 L45.161,47.419 L45.161,45.161 L10.161,45.161 ZM29.355,23.710 C29.355,21.219 27.329,19.193 24.839,19.193 C22.348,19.193 20.322,21.219 20.322,23.710 L20.322,25.967 C20.322,28.458 22.348,30.484 24.839,30.484 C27.329,30.484 29.355,28.458 29.355,25.967 L29.355,23.710 ZM22.581,32.347 L22.581,33.559 C22.861,33.991 23.639,35.000 24.839,35.000 C26.039,35.000 26.817,33.991 27.097,33.559 L27.097,32.347 C26.389,32.597 25.631,32.742 24.839,32.742 C24.046,32.742 23.288,32.597 22.581,32.347 ZM33.363,36.512 L28.711,35.183 C28.057,36.037 26.782,37.258 24.839,37.258 C22.895,37.258 21.621,36.037 20.966,35.184 L16.315,36.513 C15.352,36.788 14.677,37.680 14.677,38.684 L14.677,42.902 L30.692,42.902 C30.565,42.547 30.484,42.170 30.484,41.773 C30.484,39.906 32.004,38.386 33.871,38.386 L34.951,38.386 C34.831,37.511 34.228,36.759 33.363,36.512 ZM44.500,40.645 L33.871,40.645 C33.248,40.645 32.742,41.151 32.742,41.774 C32.742,42.397 33.248,42.903 33.871,42.903 L45.823,42.903 L53.823,34.903 C54.059,34.667 54.193,34.341 54.193,34.008 C54.193,33.309 53.626,32.742 52.928,32.742 C52.595,32.742 52.268,32.876 52.032,33.112 L44.500,40.645 ZM56.452,23.710 C56.452,21.219 54.426,19.193 51.935,19.193 C49.445,19.193 47.419,21.219 47.419,23.710 L47.419,25.967 C47.419,28.458 49.445,30.484 51.935,30.484 C54.426,30.484 56.452,28.458 56.452,25.967 L56.452,23.710 ZM56.452,34.569 C56.452,34.487 56.429,34.413 56.419,34.334 C56.342,35.144 55.998,35.921 55.420,36.499 L47.419,44.500 L47.419,49.677 L44.032,49.677 L44.032,51.935 L53.064,51.935 C54.932,51.935 56.452,50.416 56.452,48.548 L56.452,34.569 ZM60.968,50.806 L60.968,38.387 L58.710,38.387 L58.710,48.548 C58.710,51.661 56.177,54.193 53.064,54.193 L44.032,54.193 L44.032,56.451 L55.323,56.451 C58.435,56.451 60.968,53.919 60.968,50.806 ZM35.000,18.216 L35.000,11.290 L27.097,11.290 L27.097,-0.000 L54.193,-0.000 L54.193,11.290 L43.312,11.290 L35.000,18.216 ZM51.935,2.258 L29.355,2.258 L29.355,9.032 L37.258,9.032 L37.258,13.396 L42.495,9.032 L51.935,9.032 L51.935,2.258 ZM36.129,4.516 L45.161,4.516 L45.161,6.774 L36.129,6.774 L36.129,4.516 ZM49.677,6.774 L47.419,6.774 L47.419,4.516 L49.677,4.516 L49.677,6.774 ZM31.613,4.516 L33.871,4.516 L33.871,6.774 L31.613,6.774 L31.613,4.516 Z"
                                                                                                                class="cls-1">
                                                                                                            </path>
                                                                                                        </svg>
                                                                                                    </h1>
                                                                                                    <h4
                                                                                                        class="as-subheading">
                                                                                                        Signature
                                                                                                        Reading
                                                                                                    </h4>
                                                                                                    <p>
                                                                                                        Signature
                                                                                                        Anaylysis
                                                                                                        Personality
                                                                                                        Test
                                                                                                    </p>
                                                                                                    <a href="/"
                                                                                                        class="al-link">Read
                                                                                                        More</a>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                            <div class="vc_empty_space"
                                                                                style="height: 80px">
                                                                                <span
                                                                                    class="vc_empty_space_inner"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div data-vc-full-width="true"
                                                                data-vc-full-width-init="false"
                                                                data-vc-stretch-content="true"
                                                                class="vc_row wpb_row vc_row-fluid vc_custom_1631078063483 vc_row-has-fill increesnum">
                                                                <div
                                                                    class="wpb_column vc_column_container vc_col-sm-12">
                                                                    <div
                                                                        class="vc_column-inner">
                                                                        <div
                                                                            class="wpb_wrapper">
                                                                            <div class="vc_empty_space"
                                                                                style="height: 37px">
                                                                                <span
                                                                                    class="vc_empty_space_inner"></span>
                                                                            </div>
                                                                            <div
                                                                                class="text-center al-heading-wrap al-heading-img">
                                                                                <h1 class="text-center al-heading"
                                                                                    style="color: #ffffff">
                                                                                    Why
                                                                                    Choose
                                                                                    Us
                                                                                </h1>
                                                                                <img src="{{ asset('website/uploads/sites/3/2021/09/1.png') }}"
                                                                                    alt="Heaing"
                                                                                    class="img-responsive" />
                                                                                <div class="al-sub"
                                                                                    style="color: #ffffff">
                                                                                    Embrace
                                                                                    the
                                                                                    transformative
                                                                                    power
                                                                                    of
                                                                                    our
                                                                                    comprehensive
                                                                                    services,
                                                                                    where
                                                                                    Vastu,
                                                                                    Astrology,
                                                                                    and
                                                                                    Numerology
                                                                                    converge
                                                                                    to
                                                                                    shape
                                                                                    spaces
                                                                                    that
                                                                                    resonate
                                                                                    with
                                                                                    positive
                                                                                    energy.
                                                                                </div>
                                                                            </div>
                                                                            <div class="vc_empty_space"
                                                                                style="height: 40px">
                                                                                <span
                                                                                    class="vc_empty_space_inner"></span>
                                                                            </div>
                                                                            <div
                                                                                class="vc_row wpb_row vc_inner vc_row-fluid">
                                                                                <div
                                                                                    class="wpb_column vc_column_container vc_col-sm-1/5">
                                                                                    <div
                                                                                        class="vc_column-inner">
                                                                                        <div
                                                                                            class="wpb_wrapper">
                                                                                            <div
                                                                                                class="as-choose-ul counter-holder">
                                                                                                <div
                                                                                                    class="text-center as-whychoose-box">
                                                                                                    <span
                                                                                                        class="as-number counter-item"
                                                                                                        style="
                                              min-height: 100px;
                                              border-radius: 8px;
                                              border: 1px solid #ffffff35;
                                              background: #ffffff23;
                                            ">
                                                                                                        <span><span
                                                                                                                class="count-no"
                                                                                                                data-count="100">0</span>+</span></span>
                                                                                                    <h4>
                                                                                                        Trusted
                                                                                                        by
                                                                                                        thousend
                                                                                                        of
                                                                                                        Clients
                                                                                                    </h4>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="wpb_column vc_column_container vc_col-sm-1/5">
                                                                                    <div
                                                                                        class="vc_column-inner">
                                                                                        <div
                                                                                            class="wpb_wrapper">
                                                                                            <div
                                                                                                class="as-choose-ul counter-holder">
                                                                                                <div
                                                                                                    class="text-center as-whychoose-box">
                                                                                                    <span
                                                                                                        class="as-number counter-item"
                                                                                                        style="
                                              min-height: 100px;
                                              border-radius: 8px;
                                              border: 1px solid #ffffff35;
                                              background: #ffffff23;
                                            "><span><span class="count-no" data-count="55">0</span>+</span></span>
                                                                                                    <h4>Year&#039;s
                                                                                                        experience
                                                                                                    </h4>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="wpb_column vc_column_container vc_col-sm-1/5">
                                                                                    <div
                                                                                        class="vc_column-inner">
                                                                                        <div
                                                                                            class="wpb_wrapper">
                                                                                            <div
                                                                                                class="as-choose-ul counter-holder">
                                                                                                <div
                                                                                                    class="text-center as-whychoose-box">
                                                                                                    <span
                                                                                                        class="as-number counter-item"
                                                                                                        style="
                                              min-height: 100px;
                                              border-radius: 8px;
                                              border: 1px solid #ffffff35;
                                              background: #ffffff23;
                                            "><span><span class="count-no" data-count="65">0</span>+</span></span>
                                                                                                    <h4>Types
                                                                                                        of
                                                                                                        Horoscopes
                                                                                                    </h4>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="wpb_column vc_column_container vc_col-sm-1/5">
                                                                                    <div
                                                                                        class="vc_column-inner">
                                                                                        <div
                                                                                            class="wpb_wrapper">
                                                                                            <div
                                                                                                class="as-choose-ul counter-holder">
                                                                                                <div
                                                                                                    class="text-center as-whychoose-box">
                                                                                                    <span
                                                                                                        class="as-number counter-item"
                                                                                                        style="
                                              min-height: 100px;
                                              border-radius: 8px;
                                              border: 1px solid #ffffff35;
                                              background: #ffffff23;
                                            "><span><span class="count-no" data-count="90">0</span>+</span></span>
                                                                                                    <h4>Qualified
                                                                                                        Astrologers
                                                                                                    </h4>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="wpb_column vc_column_container vc_col-sm-1/5">
                                                                                    <div
                                                                                        class="vc_column-inner">
                                                                                        <div
                                                                                            class="wpb_wrapper">
                                                                                            <div
                                                                                                class="as-choose-ul counter-holder">
                                                                                                <div
                                                                                                    class="text-center as-whychoose-box">
                                                                                                    <span
                                                                                                        class="as-number counter-item"
                                                                                                        style="
                                              min-height: 100px;
                                              border-radius: 8px;
                                              border: 1px solid #ffffff35;
                                              background: #ffffff23;
                                            "><span><span class="count-no" data-count="95">0</span>+</span></span>
                                                                                                    <h4>Success
                                                                                                        Horoscope
                                                                                                    </h4>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="vc_empty_space"
                                                                                style="height: 40px">
                                                                                <span
                                                                                    class="vc_empty_space_inner"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div
                                                                class="mt-4 vc_row-full-width vc_clearfix">
                                                            </div><!-- Gems Section Start  -->
                                                            <div class="mt-4 vc_row-full-width vc_clearfix">
                                                            </div>
                                                            {{--  <section class="gems">
                                                                <div class="stoneGems">
                                                                    <div class="headingofGems">
                                                                        <h2>DivineStones
                                                                            <img src="{{ asset('website/assets/througline.png') }}" alt="">
                                                                        </h2>
                                                                        <p>At DivineStone, we bring you 100% authentic and energized
                                                                            gemstones to enhance
                                                                            your spiritual well-being. Each stone is carefully selected to
                                                                            align with your
                                                                            zodiac sign, planetary influence, and personal energy.
                                                                        </p>
                                                                    </div>
                                                                    <div class="cardsofGems">
                                                                        <div class="newAddCards">
                                                                            <div class="addImages">
                                                                                <img src="https://minerals-stones.com/14199-large_default/amethyst-cut-399-ct-sri-lanka.jpg"
                                                                                    alt="">
                                                                                <img src="" alt="">
                                                                            </div>
                                                                            <div class="describethegoods">
                                                                                <div class="starofGems">
                                                                                    <i class="fa-solid fa-star"></i>
                                                                                    <i class="fa-solid fa-star"></i>
                                                                                    <i class="fa-solid fa-star"></i>
                                                                                    <i class="fa-solid fa-star"></i>
                                                                                    <i class="fa-regular fa-star"></i>
                                                                                </div>
                                                                                <p>Amethyst Gemstone
                                                                                </p>
                                                                                <p><span><i
                                                                                            class="actualvalue fa-solid fa-indian-rupee-sign"></i>
                                                                                        800</span>
                                                                                    <span><i class="fa-solid fa-indian-rupee-sign"></i>
                                                                                        1,155</span>
                                                                                </p>
                                                                            </div>
                                                                            <div class="visitWeb hidden-content">
                                                                                <a href="http://divinestones.in/">
                                                                                    <p class="stonePayment"
                                                                                        style='margin-bottom: 0 !important;
                                                                                                                                                                                                                                                                    margin-top: 0 !important;'>
                                                                                        Visit
                                                                                        to
                                                                                        Our
                                                                                        Website
                                                                                    </p>
                                                                                </a>
                                                            
                                                                            </div>
                                                                        </div>
                                                                        <div class="newAddCards">
                                                                            <div class="addImages">
                                                                                <img src="https://rukminim3.flixcart.com/image/850/1000/ksru0sw0/showpiece-figurine/j/3/a/18-18-reiki-crystal-products-7-chakra-crystal-tree-300-beads-original-imag69gymjwgpdhz.jpeg?q=90&crop=false"
                                                                                    alt="">
                                                                            </div>
                                                                            <div class="describethegoods">
                                                                                <div class="starofGems">
                                                                                    <i class="fa-solid fa-star"></i>
                                                                                    <i class="fa-solid fa-star"></i>
                                                                                    <i class="fa-solid fa-star"></i>
                                                                                    <i class="fa-solid fa-star"></i>
                                                                                    <i class="fa-regular fa-star"></i>
                                                                                </div>
                                                                                <p>Crystal
                                                                                    Tree
                                                                                </p>
                                                                                <!-- <p class='usesObject'>For Courage & Willpower</p> -->
                                                                                <p><span><i
                                                                                            class="actualvalue fa-solid fa-indian-rupee-sign"></i>
                                                                                        599</span>
                                                                                    <span><i class="fa-solid fa-indian-rupee-sign"></i>
                                                                                        899</span>
                                                                                </p>
                                                                            </div>
                                                                            <div class="visitWeb hidden-content">
                                                                                <a href="http://divinestones.in/">
                                                                                    <p class="stonePayment"
                                                                                        style='margin-bottom: 0 !important;
                                                                                                                                                                                                                                                                    margin-top: 0 !important;'>
                                                                                        Visit
                                                                                        to
                                                                                        Our
                                                                                        Website
                                                                                    </p>
                                                                                </a>
                                                            
                                                                            </div>
                                                                        </div>
                                                                        <div class="newAddCards">
                                                                            <div class="addImages">
                                                                                <img src="https://injewels.net/cdn/shop/products/mindful-eating-mini-170152.jpg?v=1699126087&width=360"
                                                                                    alt="">
                                                                            </div>
                                                                            <div class="describethegoods">
                                                                                <div class="starofGems">
                                                                                    <i class="fa-solid fa-star"></i>
                                                                                    <i class="fa-solid fa-star"></i>
                                                                                    <i class="fa-solid fa-star"></i>
                                                                                    <i class="fa-solid fa-star"></i>
                                                                                    <i class="fa-regular fa-star"></i>
                                                                                </div>
                                                                                <p>Healing Bracelet
                                                                                </p>
                                                                                <p><span><i
                                                                                            class="actualvalue fa-solid fa-indian-rupee-sign"></i>
                                                                                        499</span>
                                                                                    <span><i class="fa-solid fa-indian-rupee-sign"></i>
                                                                                        699</span>
                                                                                </p>
                                                                                <div class="visitWeb hidden-content">
                                                                                    <a href="http://divinestones.in/">
                                                                                        <p class="stonePayment"
                                                                                            style='margin-bottom: 0 !important;
                                                                                                                                                                                                                                                                    margin-top: 0 !important;'>
                                                                                            Visit
                                                                                            to
                                                                                            Our
                                                                                            Website
                                                                                        </p>
                                                                                    </a>
                                                            
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="newAddCards">
                                                                            <div class="addImages">
                                                                                <img src="https://m.media-amazon.com/images/I/71P9FXHM4SL._AC_UF894,1000_QL80_.jpg"
                                                                                    alt="">
                                                                            </div>
                                                                            <div class="describethegoods">
                                                                                <div class="starofGems">
                                                                                    <i class="fa-solid fa-star"></i>
                                                                                    <i class="fa-solid fa-star"></i>
                                                                                    <i class="fa-solid fa-star"></i>
                                                                                    <i class="fa-solid fa-star"></i>
                                                                                    <i class="fa-regular fa-star"></i>
                                                                                </div>
                                                                                <p>Rudraksha Mala
                                                                                </p>
                                                                                <p><span><i
                                                                                            class="actualvalue fa-solid fa-indian-rupee-sign"></i>
                                                                                        3,499</span>
                                                                                    <span><i class="fa-solid fa-indian-rupee-sign"></i>
                                                                                        3,999</span>
                                                                                </p>
                                                                                <div class="visitWeb hidden-content">
                                                                                    <a href="http://divinestones.in/">
                                                                                        <p class="stonePayment"
                                                                                            style='margin-bottom: 0 !important;
                                                                                                                                                                                                                                                                    margin-top: 0 !important;'>
                                                                                            Visit
                                                                                            to
                                                                                            Our
                                                                                            Website
                                                                                        </p>
                                                                                    </a>
                                                            
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </section>  --}}

                                                            <!-- Gems Section End  --><br>
                                                            <div
                                                                class="text-center al-heading-wrap al-heading-img ">
                                                                <h1 class="text-center al-heading"
                                                                    style="color: #222222">
                                                                    What Our
                                                                    Clients Says
                                                                </h1>
                                                                <img src="https://astro-buddy.com/website/uploads/sites/3/2021/09/1.png"
                                                                    alt="Heaing"
                                                                    class="img-responsive">
                                                                <div class="al-sub"
                                                                    style="color: #222222">
                                                                    Consectetur
                                                                    adipiscing
                                                                    elit, sed do
                                                                    eiusmod
                                                                    tempor
                                                                    incididuesdeentiut
                                                                    labore
                                                                    etesde
                                                                    dolore
                                                                    magna
                                                                    aliquapspendisse
                                                                    and the
                                                                    gravida.
                                                                </div>
                                                            </div> <br><br><br>

                                                            <div
                                                                class="testimonial123-carousel-container">
                                                                <!-- Carousel items -->
                                                                <div
                                                                    class="testimonial123-carousel">
                                                                    <div
                                                                        class="testimonial123-carousel-item active">
                                                                        <div
                                                                            class="testimonial123-content">
                                                                            <div
                                                                                class="testimonial123-img-area">
                                                                                <img
                                                                                    src="https://d2phdgmkbm5x8b.cloudfront.net/img/us-passport-photo6.jpg">
                                                                            </div>
                                                                            <p>"AstroBuddy
                                                                                gave
                                                                                me
                                                                                clarity
                                                                                like
                                                                                never
                                                                                before!
                                                                                Their
                                                                                astrology
                                                                                readings
                                                                                helped
                                                                                me
                                                                                understand
                                                                                my
                                                                                life
                                                                                path
                                                                                and
                                                                                make
                                                                                informed
                                                                                decisions.
                                                                                It’s
                                                                                like
                                                                                having
                                                                                a
                                                                                personal
                                                                                guide
                                                                                through
                                                                                life’s
                                                                                ups
                                                                                and
                                                                                downs."
                                                                            </p>
                                                                            <h4>Sneha
                                                                                Kapoor
                                                                            </h4>
                                                                            <h5>Designer
                                                                                |
                                                                                Fashon
                                                                            </h5>
                                                                            <div
                                                                                class="testimonial123-stars">
                                                                                <i
                                                                                    class="fa-solid fa-star"></i>
                                                                                <i
                                                                                    class="fa-solid fa-star"></i>
                                                                                <i
                                                                                    class="fa-regular fa-star"></i>
                                                                                <i
                                                                                    class="fa-regular fa-star"></i>
                                                                                <i
                                                                                    class="fa-regular fa-star"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div
                                                                        class="testimonial123-carousel-item right">
                                                                        <div
                                                                            class="testimonial123-content">
                                                                            <div
                                                                                class="testimonial123-img-area">
                                                                                <img
                                                                                    src="https://media.licdn.com/dms/image/C4E03AQFOjAE2IiSvXw/profile-displayphoto-shrink_800_800/0/1662640766606?e=2147483647&v=beta&t=2B-Zmd3nXoXoXy5GNB2TaER96Ao0dFwCcLyc-gtC5is">
                                                                            </div>
                                                                            <p>"AstroBuddy’s
                                                                                daily
                                                                                horoscopes
                                                                                have
                                                                                become
                                                                                a
                                                                                part
                                                                                of
                                                                                my
                                                                                morning
                                                                                routine.
                                                                                They
                                                                                are
                                                                                insightful,
                                                                                empowering,
                                                                                and
                                                                                often
                                                                                eerily
                                                                                accurate.
                                                                                It’s
                                                                                like
                                                                                a
                                                                                little
                                                                                guide
                                                                                to
                                                                                help
                                                                                me
                                                                                through
                                                                                the
                                                                                day."
                                                                            </p>
                                                                            <h4>Krisha
                                                                                Kumar
                                                                            </h4>
                                                                            <h5>Reporter
                                                                                |
                                                                                Aaj
                                                                                Tak
                                                                            </h5>
                                                                            <div
                                                                                class="testimonial123-stars">
                                                                                <i
                                                                                    class="fa-solid fa-star"></i>
                                                                                <i
                                                                                    class="fa-solid fa-star"></i>
                                                                                <i
                                                                                    class="fa-solid fa-star"></i>
                                                                                <i
                                                                                    class="fa-regular fa-star"></i>
                                                                                <i
                                                                                    class="fa-regular fa-star"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div
                                                                        class="testimonial123-carousel-item left">
                                                                        <div
                                                                            class="testimonial123-content">
                                                                            <div
                                                                                class="testimonial123-img-area">
                                                                                <img
                                                                                    src="https://imgcdn.stablediffusionweb.com/2024/11/1/f9199f4e-2f29-4b5c-8b51-5a3633edb18b.jpg">
                                                                            </div>
                                                                            <p>"The
                                                                                birth
                                                                                chart
                                                                                reading
                                                                                I
                                                                                got
                                                                                from
                                                                                AstroBuddy
                                                                                was
                                                                                incredibly
                                                                                detailed.
                                                                                It
                                                                                opened
                                                                                my
                                                                                eyes
                                                                                to
                                                                                strengths
                                                                                I
                                                                                didn’t
                                                                                even
                                                                                know
                                                                                I
                                                                                had!
                                                                                It
                                                                                has
                                                                                helped
                                                                                me
                                                                                navigate
                                                                                my
                                                                                career
                                                                                choices
                                                                                with
                                                                                confidence."
                                                                            </p>
                                                                            <h4>Rahul
                                                                                Sharma
                                                                            </h4>
                                                                            <h5>DMD
                                                                                |
                                                                                Dentist
                                                                            </h5>
                                                                            <div
                                                                                class="testimonial123-stars">
                                                                                <i
                                                                                    class="fa-solid fa-star"></i>
                                                                                <i
                                                                                    class="fa-solid fa-star"></i>
                                                                                <i
                                                                                    class="fa-solid fa-star"></i>
                                                                                <i
                                                                                    class="fa-solid fa-star"></i>
                                                                                <i
                                                                                    class="fa-regular fa-star"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="testimonial123-carousel-item left">
                                                                        <div class="testimonial123-content">
                                                                            <div class="testimonial123-img-area">
                                                                                <img
                                                                                    src="https://t4.ftcdn.net/jpg/04/73/68/63/360_F_473686355_dtDCviaJtOSrVsKX51JRc1GcowOKeuJq.jpg">
                                                                            </div>
                                                                            <p>"I was skeptical at first, but AstroBuddy’s guidance really helped me
                                                                                overcome
                                                                                personal struggles. It felt like a friend guiding me with wisdom."
                                                                            </p>
                                                                            <h4>Arjun Verma
                                                                            </h4>
                                                                            <h5>Student | Aspiring Writer
                                                                            </h5>
                                                                            <div class="testimonial123-stars">
                                                                                <i class="fa-solid fa-star"></i>
                                                                                <i class="fa-solid fa-star"></i>
                                                                                <i class="fa-solid fa-star"></i>
                                                                                <i class="fa-solid fa-star"></i>
                                                                                <i class="fa-regular fa-star"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="testimonial123-carousel-item left">
                                                                        <div class="testimonial123-content">
                                                                            <div class="testimonial123-img-area">
                                                                                <img
                                                                                    src="https://www.microsave.net/wp-content/uploads/2024/11/Ayushi-Misra@MSC.jpg">
                                                                            </div>
                                                                            <p>"AstroBuddy’s Kundli analysis was eye-opening! It gave me peace of
                                                                                mind and
                                                                                helped me understand my strengths and challenges better. Highly
                                                                                recommended!"
                                                                            </p>
                                                                            <h4>Priya Mehta
                                                                            </h4>
                                                                            <h5>Entrepreneur | Business Consultant
                                                                            </h5>
                                                                            <div class="testimonial123-stars">
                                                                                <i class="fa-solid fa-star"></i>
                                                                                <i class="fa-solid fa-star"></i>
                                                                                <i class="fa-solid fa-star"></i>
                                                                                <i class="fa-solid fa-star"></i>
                                                                                <i class="fa-regular fa-star"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="testimonial123-carousel-item left">
                                                                        <div class="testimonial123-content">
                                                                            <div class="testimonial123-img-area">
                                                                                <img
                                                                                    src="https://www.imilap.com/profileimages/profile_11%20SDN_01553%20copy.jpg">
                                                                            </div>
                                                                            <p>"The predictions were so accurate! I finally feel more confident
                                                                                about my career
                                                                                choices. AstroBuddy is like a mentor who helps me stay aligned with
                                                                                my goals."
                                                                            </p>
                                                                            <h4>Abhishek Singh
                                                                            </h4>
                                                                            <h5>Software Engineer | IT Professional
                                                                            </h5>
                                                                            <div class="testimonial123-stars">
                                                                                <i class="fa-solid fa-star"></i>
                                                                                <i class="fa-solid fa-star"></i>
                                                                                <i class="fa-solid fa-star"></i>
                                                                                <i class="fa-solid fa-star"></i>
                                                                                <i class="fa-regular fa-star"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <!-- Previous and Next buttons -->
                                                                <div
                                                                    class="test-btn">
                                                                    <button
                                                                        class="testimonial123-carousel-button testimonial123-prev-button">❮</button>
                                                                    <button
                                                                        class="testimonial123-carousel-button testimonial123-next-button">❯</button>
                                                                </div>

                                                            </div>



                                                        </div>

                                                    </div>
                                                    <!-- .entry-content -->
                                                    <!-- .entry-footer -->
                                            </div>
                        </article>
                        <!-- #post-13 -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<!-- #main -->
<script>
    function portfolio(e) {

            window.location.href = "{{ url('/shri-') }}" + e;
        }
        document.addEventListener("DOMContentLoaded", function() {
            const astrologerPhoto = document.querySelector(".rr-astrologer-photo");
            const astrologerName = document.querySelector(".rr-astrologer-name");

            // Example of updating the content dynamically
            astrologerPhoto.src = "./image/arunji.jpg";
            astrologerName.textContent = "Dr. Astro Sandeep";

        });
</script>

<script>
    // JavaScript for carousel functionality
        let testimonial123Items = document.querySelectorAll('.testimonial123-carousel-item');
        let testimonial123CurrentIndex = 0;
        const testimonial123TotalItems = testimonial123Items.length;

        // Function to update carousel based on the currentIndex
        function updateTestimonial123Carousel() {
            // Reset all items
            testimonial123Items.forEach(item => {
                item.classList.remove('active', 'left', 'right');
            });

            // Set positions
            testimonial123Items[testimonial123CurrentIndex].classList.add('active');
            const testimonial123NextIndex = (testimonial123CurrentIndex + 1) % testimonial123TotalItems;
            const testimonial123PrevIndex = (testimonial123CurrentIndex - 1 + testimonial123TotalItems) %
                testimonial123TotalItems;
            testimonial123Items[testimonial123NextIndex].classList.add('right');
            testimonial123Items[testimonial123PrevIndex].classList.add('left');
        }

        // Function to show the next slide
        function showNextTestimonial123() {
            testimonial123CurrentIndex = (testimonial123CurrentIndex + 1) % testimonial123TotalItems;
            updateTestimonial123Carousel();
        }

        // Function to show the previous slide
        function showPrevTestimonial123() {
            testimonial123CurrentIndex = (testimonial123CurrentIndex - 1 + testimonial123TotalItems) %
                testimonial123TotalItems;
            updateTestimonial123Carousel();
        }

        // Autoplay function
        function testimonial123Autoplay() {
            setInterval(showNextTestimonial123, 3000);
        }

        // Event listeners for buttons
        document.querySelector('.testimonial123-next-button').addEventListener('click', showNextTestimonial123);
        document.querySelector('.testimonial123-prev-button').addEventListener('click', showPrevTestimonial123);

        // Initialize carousel
        updateTestimonial123Carousel();
        testimonial123Autoplay();
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
    let container = document.querySelector(".cardsofGems");
    let scrollAmount = 250; // Adjust based on card width
    let scrollSpeed = 4000; // Auto-scroll every 4 seconds
    let scrollInterval;

    function autoScroll() {
        if (container.scrollLeft + container.clientWidth >= container.scrollWidth) {
            container.scrollLeft = 0; // Reset scroll if at end
        } else {
            container.scrollLeft += scrollAmount;
        }
    }

    function startAutoScroll() {
        clearInterval(scrollInterval); // Clear any existing interval
        scrollInterval = setInterval(autoScroll, scrollSpeed);
    }

    function stopAutoScroll() {
        clearInterval(scrollInterval);
    }

    // Start auto-scroll
    startAutoScroll();

    // Stop auto-scroll when user interacts
    container.addEventListener("touchstart", stopAutoScroll);
    container.addEventListener("mouseover", stopAutoScroll);

    // Resume auto-scroll after 5 seconds of inactivity
    container.addEventListener("touchend", () => setTimeout(startAutoScroll, 5000));
    container.addEventListener("mouseleave", () => setTimeout(startAutoScroll, 5000));
});


</script>
@endsection
