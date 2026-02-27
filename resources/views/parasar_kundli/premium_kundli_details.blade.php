@extends('website.dashboard_master')
@section('title','Premium Kundli')
@section('content')

<style>
    .showkundli {
        background: white;
        width: 100%;
        / box-shadow: 0px 0px 3px #cdcdd3;/ border-radius: 16px;
        padding: 12px 0;
        margin-bottom: 34px;
        display: flex;
        margin-bottom: 34px;
        align-items: center;
        padding-top: 10px;
        padding-bottom: 70px;
        justify-content: center;
    }

    .leftdemo {
        width: 35%;
        align-items: center;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .twoPictures {
        width: 50%;
        overflow: hidden;
        position: relative;
    }

    .twoPictures img {
        width: 100%;
        overflow: hidden;
    }


    .showDetails {
        width: 90%;
        margin: 40px auto;
    }

    .headingFeature {
        width: 90%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .headingFeature h1 {
        font-size: 1.39rem;
        font-weight: 600;
        font-family: "Philosopher", serif;
        text-align: left;
        width: 100%;
        margin: 0 auto;
        color: #1f2235 !important;
    }

    .fa-circle-check {
        font-size: 1.35rem;
        margin-right: 10px;
    }

    .headingFeature p {
        font-size: 14.5px;
        font-family: "Poppins", serif;
        font-weight: 400;
        width: 100%;
        margin: 15px auto;
        text-align: left;
    }

    .headingFeature p span {
        font-size: 14.5px;
        font-family: "Poppins", serif;
        font-weight: 500;
    }

    .paymentFeature {
        margin: 50px auto;
        width: 90%;
        display: flex;
        align-items: start;
        justify-content: center;
        margin-bottom: 25px !important;
    }

    .paymentFeature h2 {
        font-weight: 600;
        font-family: "Philosopher", serif;
        margin: 20px auto;
        margin-top: 0;
        width: 100%;
        font-size: 1.1rem;
        color: #1f2235 !important;
        display: flex;
    }

    .paidPayment {
        font-weight: 600;
        font-family: "Philosopher", serif;
        margin: 20px auto;
        margin-top: 0;
        width: 100%;
        font-size: 1.1rem;
        display: flex;
        align-items: center;
        justify-content: start;
    }

    .midcontainer {
        width: 95%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .parasarpayment p {
        font-weight: 400;
        margin: 10px auto;
        width: 100%;
        font-size: 14.5px;
        font-family: "Poppins", serif;
        color: #1f2235 !important;
        display: flex;
    }

    .parasarpayment p span {
        font-weight: 500;
        width: 163px !important;
    }

    .paidPayment span {
        background: #f58533;
        width: 22px;
        height: 20px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 7px;
    }

    .fa-info {
        color: white;
        font-size: 13px;
        margin: 0 0;
    }

    .paidPersonDeatails {
        width: 46%;
        margin: 0 auto;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        position: absolute;
        z-index: 111111;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .paidPersonDeatails h3 {
        font-weight: 600;
        margin: 7px auto;
        width: 100%;
        font-size: 11.5px;
        font-family: "Poppins", serif;
        color: #19191b !important;
        display: flex;
        width: 100%;
        text-align: left;
    }

    .personName span {
        max-width: 57px !important;
    }

    .paidPersonDeatails h3 span {
        font-weight: 600;
        width: 71px !important;
    }

    .paidPersonDeatails h3 i {
        font-size: 1.05rem;
        margin-right: 10px;
    }

    .fa-download {
        color: white;
        font-size: 1.05rem;
        margin-right: 10px;
    }

    .placeTime {
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: start;
    }

    .placeTime h3 {
        text-align: left;
        margin: 5px 0px;
    }

    .placeTime h3 span {
        width: 44px !important;
    }

    .fa-file-pdf {
        margin-right: 11px;
    }

    .pdfBtn {
        width: 100%;
        text-align: center;
        justify-content: center;
    }

    .pdfBtn button {
        display: flex;
        align-items: center;
        justify-content: center;
        background-image: -webkit-linear-gradient(0deg, rgb(62 32 65) 0%, rgb(69 32 72) 100%);
        width: 82%;
        height: 42px;
        border-radius: 3px;
        box-shadow: 2px 2px 5px #35364378;
        transition: all 500ms ease-in-out;
        cursor: pointer;
        color: white;
        font-size: 14.5px;
        font-family: "Poppins", serif;
        border: none;
        overflow: hidden;
        position: relative;
        margin: 0 auto;
    }

    .pdfBtn button:hover span:nth-child(1) {
        -webkit-transform: rotateX(0deg);
        -moz-transform: rotateX(0deg);
        transform: rotateX(0deg);
    }

    .pdfBtn button:hover span:nth-child(2) {
        color: transparent;
        -webkit-transform: rotateX(-90deg);
        -moz-transform: rotateX(-90deg);
        transform: rotateX(-90deg);
    }



    .pdfBtn button:before {
        position: absolute;
        content: '';
        display: inline-block;
        top: -180px;
        left: 0;
        width: 30px;
        height: 100%;
        background-color: #fff;
        animation: shiny-btn1 3s ease-in-out infinite;
    }

    .pdfBtn button:active {
        box-shadow: 4px 4px 6px 0 rgba(255, 255, 255, .3),
            -4px -4px 6px 0 rgba(116, 125, 136, .2),
            inset -4px -4px 6px 0 rgba(255, 255, 255, .2),
            inset 4px 4px 6px 0 rgba(0, 0, 0, .2);
    }


    @-webkit-keyframes shiny-btn1 {
        0% {
            -webkit-transform: scale(0) rotate(45deg);
            opacity: 0;
        }

        80% {
            -webkit-transform: scale(0) rotate(45deg);
            opacity: 0.5;
        }

        81% {
            -webkit-transform: scale(4) rotate(45deg);
            opacity: 1;
        }

        100% {
            -webkit-transform: scale(50) rotate(45deg);
            opacity: 0;
        }
    }

    .pdfBtn button span {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100%;
        width: 100%;
        position: absolute;
        -webkit-transition: all .3s;
        transition: all .3s;
    }

    .pdfBtn button span:nth-child(1) {
        -webkit-transform: rotateX(90deg);
        -moz-transform: rotateX(90deg);
        transform: rotateX(90deg);
        -webkit-transform-origin: 50% 50% -20px;
        -moz-transform-origin: 50% 50% -20px;
        transform-origin: 50% 50% -20px;
        background-image: -webkit-linear-gradient(0deg, rgb(62 32 65) 0%, rgb(69 32 72) 100%);
        border: none;
    }

    .pdfBtn button span:nth-child(2) {

        -webkit-transform: rotateX(0deg);
        -moz-transform: rotateX(0deg);
        transform: rotateX(0deg);
        -webkit-transform-origin: 50% 50% -20px;
        -moz-transform-origin: 50% 50% -20px;
        transform-origin: 50% 50% -20px;
    }

    .placeTime h3:nth-child(01) {
        min-width: 20%;
    }

    .placeTime h3:nth-child(02) {
        min-width: 30%;
    }

    .placeTime h3:nth-child(03) {
        min-width: 50%;
    }

    .conclusion {
        width: 90%;
        margin: 10px auto;
        margin-left: 1%;
        margin-top: 2%;
    }

    .conclusion p {
        width: 90%;
        font-weight: 400;
        margin: 20px auto;
        font-size: 14.5px;
        font-family: "Poppins", serif;
        color: #1f2235 !important;
        text-align: left;
    }

    .totalAmount {
        border-top: 1px solid #e7e7e7;
        padding-top: 10px;
        margin-top: 13px !important;
        margin-left: 0 !important;
        width: 250px !important;
    }

    .contactFeature {
        width: 90%;
        margin: 0px auto;
        display: flex;
        align-items: center;
        justify-content: start;
    }

    .parasarpayment {
        width: 43%;
    }

    .parasarfeature {
        width: 65%;
        display: flex;
        flex-direction: column;
        align-items: start;
        justify-content: end;
        margin-top: -28px;
    }

    .supporTId {
        font-weight: 400 !important;
        margin-right: 38px !important;
        width: 50% !important;
        margin: 0 0 !important;
        font-size: 14.5px !important;
        font-family: "Poppins", serif;
        color: #1f2235 !important;
        display: flex;
    }

    .supporTId span {
        max-width: 20px;
        margin: auto 0;
    }

    .supporTId span i {
        font-size: 18px;
        color: #f58533 !important;
    }

    .supporTId a {
        color: #1f1f21 !important;
        font-size: 16px;
        font-weight: 400;
        font-family: "Poppins", serif;
    }

    / parasar css start / .modal-header {
        padding: 2px 16px;
        background-color: #f5c30a;
        border-radius: 10px 10px 0 0;
        color: white;
    }

    .btn-open-popup {
        padding: 12px 24px;
        font-size: 18px;
        background-color: green;
        color: #fff;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn-open-popup:hover {
        background-color: #4caf50;
    }

    .overlay-container {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.6);
        justify-content: center;
        align-items: center;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .popup-box {
        background: #fff;
        padding: 24px;
        border-radius: 12px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.4);
        width: 620px;
        text-align: center;
        opacity: 0;
        transform: scale(0.8);
        animation: fadeInUp 0.5s ease-out forwards;
    }

    .form-container {
        display: flex;
        flex-direction: column;
    }

    .form-label {
        margin-bottom: 10px;
        font-size: 16px;
        color: #444;
        text-align: left;
    }

    .form-input {
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-size: 16px;
        width: 100%;
        box-sizing: border-box;
    }

    .btn-submit,
    .btn-close-popup {
        padding: 12px 24px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .btn-submit {
        background-color: #f5c30a;
        color: #000000;
    }

    .btn-close-popup {
        margin-top: 12px;
        background-color: #e74c3c;
        color: #fff;
    }

    .btn-submit:hover,
    .btn-close-popup:hover {
        background-color: #4caf50;
    }

    / Keyframes for fadeInUp animation / @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    {{--  / Animation for popup /  --}}
    .overlay-container.show {
        display: flex;
        opacity: 1;
    }

    {{--  / option in popup.css /   --}}
    .rs-pricing-section {
        background: #fff;
        margin: auto;
        width: 100%;
        text-align: center;
        padding: 5px 20px;
        margin-top: 0px !important;
    }

    .boockedkundli {
        width: 90%;
        overflow: hidden;
        display: flex;
        align-items: center;
    }

    .boockedkundli img {
        width: 97%;
    }

    .rightMatter {
        width: 60%;
        align-items: center;
        display: flex;
        flex-direction: column;
        justify-content: center;
        margin-top: 4%;
    }

    {{--  / parasar css end /  --}}
</style>
<style>
    .slider-container {
    width: 100%;
    overflow: hidden;
    position: relative;
    }

    .slider-wrapper {
    display: flex;
    transition: transform 0.5s ease-in-out;
    }

    .showkundli {
    flex: 0 0 100%;
    padding: 20px;
     {{--  background-color: #f9f9f9;  --}}
    border: 1px solid #ddd;
    }

    .navigation-buttons {
    position: absolute;
    top: 50%;
    width: 100%;
    display: flex;
    justify-content: space-between;
    transform: translateY(-50%);
    }

    .nav-button {
    background-color: #05101c59;
    {{--  / background: transparent; /  --}}
    color: white;
    border: none;
    padding: 13px 17px;
    cursor: pointer;
    font-size: 22px;
    border-radius: 50%;
    {{--  / opacity: 0.8; /  --}}
    margin-left: 11px;
    margin-right: 11px;
    transition:all 400ms ease-in-out;
    }
    .nav-button i{
    color: #ffffff;
    }

    .nav-button:hover {
    background-color: #2e102e;
    }

    {{--  / slider CSS end /  --}}
</style>

<div class="container-fluid">
    @php
    $premiumUser = \App\Models\ParasarKundliDetail::where('user_id',
    Auth::user()->id)->latest()->first();
    @endphp
    {{-- @foreach ($kundliDetails as $premiumUser) --}}
    <div class="slider-container">
        <!-- Slider Wrapper -->
        <div class="slider-wrapper">
            @foreach ($premiumKundli as $premiumUser)
            <section class="showkundli">
                <div class="leftdemo">
                    <div class="boockedkundli">
                        <img src="{{asset('assets/images/kundli.png')}}" alt="">
                    </div>
                    <div class="pdfBtn">
                        <button>
                            <span>Download</span><span><i
                                    class="fa-solid fa-file-pdf"></i>
                                <div class='thankYou'
                                    style='    margin-right: 4px;'>Thank You!
                                </div>
                                Your PDF Will Be Sent in 2-3 Days
                            </span>


                        </button>
                    </div>
                </div>
                <div class="rightMatter">
                    <div class="headingFeature">
                        <h1><i class="fa-solid fa-circle-check"
                                style="color: #f58533;"></i>प्रीमियम कुंडली
                            खरीदने
                            के लिए धन्यवाद!</h1>
                        <p>हम AstroBuddy पर आपके विश्वास की सराहना करते हैं।
                            आपकी
                            विस्तृत कुंडली हमारे विशेषज्ञ ज्योतिषियों द्वारा
                            तैयार
                            की जाएगी, जो आपके जीवन के हर पहलू में गहरी
                            अंतर्दृष्टि
                            प्रदान करेगी।</p>
                    </div>
                    <div class="midContainer">
                        <div class="parasarpayment">
                            <h2 class='paidPayment'> <span><i
                                        class="fa-solid fa-info"></i></span>
                                Transaction Details :</h2>
                          <p><span>Transaction ID : </span>{{ $premiumUser->order_id
                            }}
                        </p>
                        <p><span>Payment to :
                            </span>AstroBuddy</p>
                        <p><span>Base Amount : </span> ₹819</p>
                        <p><span>GST (18%) : </span>₹180</p>
                        <p class='totalAmount'><span>Total Amount Paid : </span>
                            ₹999
                        </p>
                        </div>

                        <div class="twoPictures">
                            <img src="{{asset('assets/images/kundliopen2.png')}}" alt="">
                            <div class="paidPersonDeatails">
                                <h3 class='personName'><span>Name :
                                    </span>{{$premiumUser->name}}
                                </h3>
                                <div class="placeTime">
                                    <h3><span>TOB : </span>{{
                                        \Carbon\Carbon::parse($premiumUser->tob)->format('h:i')
                                        }}</h3>
                                    <h3> <span>DOB : </span>{{
                                        \Carbon\Carbon::parse($premiumUser->dob)->format('d
                                        M, Y') }}</h3>
                                    <h3> <span>POB : </span>{{ $premiumUser->place }}
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="conclusion">
                        <p>आपकी व्यक्तिगत कुंडली 2-3 दिनों के भीतर तैयार हो
                            जाएगी,
                            आप इसे सीधे अपने डैशबोर्ड से डाउनलोड कर सकते हैं।
                            AstroBuddy को चुनने के लिए धन्यवाद! यदि आपके पास कोई
                            प्रश्न हैं, तो हमारी सहायता टीम से संपर्क करें।</p>
                    </div>
                </div>
            </section>
        @endforeach
        </div>
        <div class="navigation-buttons">
            <button class="nav-button" id="prev"><i
                    class="fa-solid fa-chevron-left"></i></button>
            <button class="nav-button" id="next"><i
                    class="fa-solid fa-chevron-right"></i></button>
        </div>
    </div>
      <div class="row card">
        <div class="col-lg-12">
            <br>
            <div class="table-responsive">
                <table class="table mb-0 align-middle table-borderless">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">Kundli</th>
                            <th scope="col">Name</th>
                            <th scope="col">Mobile Number</th>
                            <th scope="col">Amount Paid</th>
                            <th scope="col">Transaction Id</th>
                            <th scope="col">Date of birth</th>
                            <th scope="col">Time of birth</th>
                            <th scope="col">Place of birth</th>

                        </tr>
                    </thead>
                    <tbody class='appoinmentPastPost'>
                        @if(isset($premiumKundli) && $premiumKundli->count()>0)
                        @foreach ($premiumKundli as $premiumUser)
                        <tr>
                            @if(!empty($premiumUser->premium_kundli_pdf))
                            <td>
                                <button class="accept">
                                    <a href="{{ asset($premiumUser->premium_kundli_pdf) }}"
                                        download="{{ preg_replace('/^\d+-/', '', basename($premiumUser->premium_kundli_pdf)) }}"
                                        style="text-decoration: none; color: inherit;">
                                        Download
                                    </a>
                                </button>
                            </td>
                            @else
                            <td class="text-center">
                                <button class="accept"
                                    style="background-color: #eb0f0f;">
                                    On-Process
                                </button>
                            </td>
                            @endif
                            <td>
                                {{
                                ucwords( $premiumUser->name ??
                                '') }}
                            </td>
                            <td>{{ $premiumUser->name ?? '' }}</td>
                            <td style="font-size: 13px; font-weight: 400;"
                                class="text-center">
                                <i class="fa-solid fa-indian-rupee-sign"
                                    style="margin-right: 2px;color: #ff7010;margin-top: 15px "
                                    aria-hidden="true"></i>
                                999
                            </td>
                            <td>{{ $premiumUser->order_id }}</td>
                            {{-- <td
                                style="font-size: 13px;font-weight: 400;margin-top: 15px"
                                class="text-center">
                                <i class="fa-solid fa-{{ $appointment->way_to_reach ?? 'video' }}"
                                    style="margin-right: 2px;color: #ff7010;    margin-top: 15px"
                                    aria-hidden="true"></i>
                                {{ ucwords($appointment->way_to_reach ?? 'Video
                                ')." Call"
                                }}
                            </td> --}}
                            <td style="
                                                                font-size: 13px;
                                                                font-weight: 400;
                                                            "
                                class="text-center">
                                <i class="fa-solid fa-clock" style="
                                                                margin-right: 2px;
                                                                color: #ff7010;margin-top: 15px
                                                                "
                                    aria-hidden="true"></i>
                                {{
                                \Carbon\Carbon::parse($premiumUser->tob)->format('h:i')
                                }}
                            </td>
                            <td class="text-center" style="
                                                                font-size: 13px;
                                                                font-weight: 400;
                                                            ">
                                <i class="fa-solid fa-calendar-days" style="
                                                                margin-right: 5px;
                                                                color: #ff7010;margin-top: 15px
                                                                "
                                    aria-hidden="true"></i>{{
                                \Carbon\Carbon::parse($premiumUser->dob)->format('h:i')
                                }}
                            </td>
                            <td class="text-center"
                                style=" font-size: 13px; font-weight: 400; ">
                                <i style="
                                                                margin-right: 5px;
                                                                color: #ff7010;margin-top: 15px
                                                                "
                                    class="fa-solid fa-location-dot"></i>{{
                                $premiumUser->place }}
                            </td>

                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="7" class="text-center">
                                <h6
                                    style="border:2px solid #ffcd3a;padding:6px;">
                                    Premium User Not Found</h6>
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
    <script>
        const sliderWrapper = document.querySelector('.slider-wrapper');
      const prevButton = document.getElementById('prev');
      const nextButton = document.getElementById('next');
      const sections = document.querySelectorAll('.showkundli');
      const totalSections = sections.length;

      let currentIndex = 0;


      function updateSliderPosition() {
        sliderWrapper.style.transform = `translateX(-${currentIndex * 100}%)`;
      }


      nextButton.addEventListener('click', () => {
        currentIndex = (currentIndex + 1) % totalSections;
        updateSliderPosition();
        resetAutoSlide();
      });


      prevButton.addEventListener('click', () => {
        currentIndex = (currentIndex - 1 + totalSections) % totalSections;
        updateSliderPosition();
        resetAutoSlide();
      });


      let autoSlideInterval = setInterval(() => {
        currentIndex = (currentIndex + 1) % totalSections;
        updateSliderPosition();
      }, 5000);


      function resetAutoSlide() {
        clearInterval(autoSlideInterval);
        autoSlideInterval = setInterval(() => {
          currentIndex = (currentIndex + 1) % totalSections;
          updateSliderPosition();
        }, 5000);
      }
    </script>
{{--  <script src="{{ url('parasar_popup/popup.js') }}"></script>  --}}
@endsection
