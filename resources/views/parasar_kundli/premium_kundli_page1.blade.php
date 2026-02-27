<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atrologer Profile</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Philosopher:ital,wght@0,400;0,700;1,400;1,700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            /* box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 2px 0px; */
            position: fixed;
            background: #ffffff00;
            width: 100vw;
            z-index: 99;
            padding-left: 4vw;
            padding-right: 5vw;
        }

        .logo img {
            width: 30px;
            height: 30px;
        }

        .logo {
            display: flex;
            padding: 10px;
        }

        .navlinks {
            display: flex;
            width: 60%;
            justify-content: space-between;
            padding: 15px;
            font-size: 15px;
        }

        .navbar.scrolled {
            background: rgb(255, 255, 255);
            transition: background 0.3s ease-in-out;
            box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 2px 0px;
        }

        .navbar.scrolled a,
        .navbar.scrolled li {
            color: black;
        }

        .navbar.scrolled .logo p {
            color: black;
        }


        .links {
            display: flex;
            justify-content: space-between;
            width: 82%;

        }

        .logo p {
            font-size: 25px;
            /* font-family: sans-serif; */
            font-weight: 550;
            margin-top: 2px;
            margin-left: 6px;
            color: white;
        }

        a {
            text-decoration: none;
            list-style: none;
            color: black;
            font-weight: 500;
        }

        li {
            text-decoration: none;
            list-style: none;

        }

        .links li a:hover {
            color: orange;
            border-top: 2px solid orange;
        }

        .links li a {
            color: white;
        }

        .login-btn {
            margin-top: -4px;
        }

        .login-btn button {
            font-size: 15px;
            padding: 3px 24px;
            background: #eacc1d;
            border: 1px solid #eacc1d;
            border-radius: 3px;
            cursor: pointer;
            color: white;
        }

        .astro-logo1,
        .astro-logo2 {
            animation: spin 2s linear infinite;
        }

        @keyframes spin {
            from {
                transform: rotateY(0deg);
            }

            to {
                transform: rotateY(360deg);
            }
        }

        .astro-logo2 {
            display: none;
        }


        .main-container {
            background-image: url('/assets/images/background2.png');
            /* background: url(https://img.freepik.com/free-photo/luxury-plain-green-gradient-abstract-studio-background-empty-room-with-space-your-text-picture_1258-71038.jpg?semt=ais_hybrid&w=740&q=80); */
            width: 98.9vw;
            height: 100vh;
            object-fit: cover;
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
            display: flex;
            /* padding: 0 3vw; */
        }

        .image-container {
            position: absolute;
            width: 450px;
            height: 450px;
            right: 0;
            top: 0;
            transform: translate(-28%, 9%);

        }

        .image-container img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            /* animation: orbit 4s linear infinite; */
        }

        .text-container {
            color: white;
            width: 50%;
            display: flex;
            flex-direction: column;
            margin-left: 9vw;
        }

        .headings {
            margin-top: 28vh;
            color: whitem;

        }

        .headings h1 {
            font-size: 3.5rem;
            font-family: "Philosopher", sans-serif;
            color: #eacc1d;
            letter-spacing: 2px;
        }

        .headings h3 {
            font-family: "Philosopher", sans-serif;
            font-size: 2.1rem;
            font-weight: 600;
        }

        .headings p {
            width: 80%;
            margin-top: 15px;
            line-height: 1.8;
        }

        .links-btns {
            display: flex;
            gap: 20px;
            margin-top: 20px;
        }

        .link-btn button {
            background: #eacc1d;
            border: 1px solid #eacc1d;
            border-radius: 6px;
            cursor: pointer;
            font-size: 15px;
            padding: 13px 40px;
            width: 20vw;
            /* color: white; */
            font-weight: 500;
            margin-top: 10px;
        }

        .link-btn button:hover {
            animation: bounce 0.7s;
            transform: scale(1.05);
            color: #ffffff;
            /* background-color: rgba(255, 255, 255, 0.43);
            border: 1px solid rgba(255, 255, 255, 0.43); */
        }

        @keyframes bounce {
            0% {
                transform: scale(1);
            }

            30% {
                transform: scale(1.1);
            }

            50% {
                transform: scale(0.95);
            }

            70% {
                transform: scale(1.05);
            }

            100% {
                transform: scale(1.05);
            }
        }

        /* @keyframes orbit {
            from {
                transform: rotate(0deg) translateX(150px) rotate(0deg);
            }

            to {
                transform: rotate(360deg) translateX(150px) rotate(-360deg);
            }
        } */

        .image-container2 {
            width: 450px;
            height: 450px;
            object-fit: cover;
        }

        .image-container2 img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .Kundali-discrption {
            display: flex;
            justify-content: center;
            align-items: center;
            /* gap: 50px; */
            margin: 80px 60px;
            padding: 0 5vw;
        }

        .Kundali-discrption-image {
            width: 50%;
            padding-left: 2vw;
        }

        .Kundali-discrption-text {
            width: 50%;
        }

        .discount {
            color: white;
            position: absolute;
            right: 50%;
            top: 50%;
            transform: translate(402%, -160%);
        }

        .discount img {
            width: 140px;
            height: 140px;
            object-fit: contain;
            animation: heartbeat 2s ease-in-out;
        }

        @keyframes heartbeat {
            0% {
                transform: scale(0);
            }

            14% {
                transform: scale(1.3);
            }

            28% {
                transform: scale(1);
            }

            42% {
                transform: scale(1.3);
            }

            70% {
                transform: scale(1);
            }
        }

        .Kundali-discrption-text h2 {
            font-family: "Philosopher", sans-serif;
            font-size: 2.4rem;
            font-weight: 700;
            margin-bottom: 5%;
        }

        .Kundali-discrption-text h3,
        .Kundali-discrption-text span {
            /* font-family: "Philosopher", sans-serif; */
            font-size: 1.2rem;
            font-weight: 600;
            margin: 6px 0px;
            margin-bottom: 3%;
            /* color: #e38f2e; */
        }

        .about-kundali {
            font-size: 1rem;
            color: #e38f2e;
            font-weight: 500;
        }

        .about-kundali-keys,
        .feedback-title {
            font-size: 1rem;
            color: #e38f2e;
            font-weight: 500;
            text-align: center;
        }

        .kundali-keys {
            margin: 150px 0px;
            padding: 0 0vw;
        }

        .keys-container {
            width: 98vw;
            /* show ~3 cards */
            overflow: hidden;
            /* margin: auto; */
        }

        .keys-list {
            display: flex;
            /* flex-wrap: wrap; */
            gap: 20px;
            width: 100%;
            transition: transform 0.5s linear;
            padding: 10px 10px;
        }

        .kundali-keys h2,
        .feedback h2 {
            width: 100%;
            text-align: center;
            font-family: "Philosopher", sans-serif;
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 7vh;
        }

        .key-items {
            text-align: center;

            object-fit: cover;
            padding: 13px 13px;
            width: 23%;
            border-radius: 15px;
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
            min-width: 251px;
            flex-shrink: 0;
            transition: transform 0.5s ease-in-out;
            height: 250px;
            color: white;
        }

         .shiksha:hover {
            background: linear-gradient(rgba(0, 0, 0, 0.591), rgb(0 0 0 / 55%)),
                url("https://img.freepik.com/premium-photo/reach-summit-with-study-concept-school-education_207634-1688.jpg?uid=R186345876&ga=GA1.1.219329638.1739767594&semt=ais_hybrid&w=740&q=80");
            background-repeat: no-repeat;
            background-size: cover;
        }

        .shiksha {
            background: linear-gradient(rgb(0 0 0 / 19%), rgba(0, 0, 0, 0.333)),
                url("https://img.freepik.com/premium-photo/reach-summit-with-study-concept-school-education_207634-1688.jpg?uid=R186345876&ga=GA1.1.219329638.1739767594&semt=ais_hybrid&w=740&q=80");
            background-repeat: no-repeat;
            background-size: cover;
        }

        .swasthya{
            background: linear-gradient(rgb(0 0 0 / 19%), rgb(0 0 0 / 55%)), url("https://img.freepik.com/free-photo/man-woman-practicing-yoga-outdoor_23-2148196902.jpg?uid=R186345876&ga=GA1.1.219329638.1739767594&w=740&q=80");
            background-repeat: no-repeat;
            background-size: cover;
        }

        .swasthya:hover {
            background: linear-gradient(rgba(0, 0, 0, 0.591), rgb(0 0 0 / 55%)),
                url("https://img.freepik.com/free-photo/man-woman-practicing-yoga-outdoor_23-2148196902.jpg?uid=R186345876&ga=GA1.1.219329638.1739767594&w=740&q=80");
            background-repeat: no-repeat;
            background-size: cover;
        }

        .aajivika{
            background: linear-gradient(rgb(0 0 0 / 19%), rgb(0 0 0 / 55%)), url("https://img.freepik.com/free-photo/indian-city-scene_23-2151823041.jpg?uid=R186345876&ga=GA1.1.219329638.1739767594&semt=ais_hybrid&w=740&q=80");
            background-repeat: no-repeat;
            background-size: cover;
        }
        .aajivika:hover {
            background: linear-gradient(rgba(0, 0, 0, 0.591), rgb(0 0 0 / 55%)),
                url("https://img.freepik.com/free-photo/indian-city-scene_23-2151823041.jpg?uid=R186345876&ga=GA1.1.219329638.1739767594&semt=ais_hybrid&w=740&q=80");
            background-repeat: no-repeat;
            background-size: cover;
        }

        .bhavishya{
            background: linear-gradient(rgb(0 0 0 / 19%), rgb(0 0 0 / 55%)), url("https://img.freepik.com/premium-photo/kids-virtual-reality-goggles-mixed-media_641298-17543.jpg?uid=R186345876&ga=GA1.1.219329638.1739767594&semt=ais_hybrid&w=740&q=80");
            background-repeat: no-repeat;
            background-size: cover;
        }
        .bhavishya:hover {
            background: linear-gradient(rgba(0, 0, 0, 0.591), rgb(0 0 0 / 55%)),
                url("https://img.freepik.com/premium-photo/kids-virtual-reality-goggles-mixed-media_641298-17543.jpg?uid=R186345876&ga=GA1.1.219329638.1739767594&semt=ais_hybrid&w=740&q=80");
            background-repeat: no-repeat;
            background-size: cover;
        }


        .grah-sthiti{
            background: linear-gradient(rgb(0 0 0 / 19%), rgb(0 0 0 / 55%)), url("https://img.freepik.com/premium-photo/diagram-planets-our-solar-system-with-planets-names_977617-77210.jpg?uid=R186345876&ga=GA1.1.219329638.1739767594&semt=ais_hybrid&w=740&q=80");
            background-repeat: no-repeat;
            background-size: cover;
        }
        .grah-sthiti:hover {
            background: linear-gradient(rgba(0, 0, 0, 0.591), rgb(0 0 0 / 55%)),
                url("https://img.freepik.com/premium-photo/diagram-planets-our-solar-system-with-planets-names_977617-77210.jpg?uid=R186345876&ga=GA1.1.219329638.1739767594&semt=ais_hybrid&w=740&q=80");
            background-repeat: no-repeat;
            background-size: cover;
        }

        .chart{
            background: linear-gradient(rgb(0 0 0 / 19%), rgb(0 0 0 / 55%)), url("https://img.freepik.com/free-photo/numerology-collage-concept_23-2150061747.jpg?uid=R186345876&ga=GA1.1.219329638.1739767594&semt=ais_hybrid&w=740&q=80");
            background-repeat: no-repeat;
            background-size: cover;
        }
        .chart:hover {
            background: linear-gradient(rgba(0, 0, 0, 0.591), rgb(0 0 0 / 55%)),
                url("https://img.freepik.com/free-photo/numerology-collage-concept_23-2150061747.jpg?uid=R186345876&ga=GA1.1.219329638.1739767594&semt=ais_hybrid&w=740&q=80");
            background-repeat: no-repeat;
            background-size: cover;
        }


        .chakra{
            background: linear-gradient(rgb(0 0 0 / 19%), rgb(0 0 0 / 55%)), url("https://img.freepik.com/free-photo/abstract-numerology-concept-with-woman-beach_23-2150058796.jpg?uid=R186345876&ga=GA1.1.219329638.1739767594&semt=ais_hybrid&w=740&q=80");
            background-repeat: no-repeat;
            background-size: cover;
        }
        .chakra:hover {
            background: linear-gradient(rgba(0, 0, 0, 0.591), rgb(0 0 0 / 55%)),
                url("https://img.freepik.com/free-photo/abstract-numerology-concept-with-woman-beach_23-2150058796.jpg?uid=R186345876&ga=GA1.1.219329638.1739767594&semt=ais_hybrid&w=740&q=80");
            background-repeat: no-repeat;
            background-size: cover;
        }

        .shad-bala{
            background: linear-gradient(rgb(0 0 0 / 19%), rgb(0 0 0 / 55%)), url("https://img.freepik.com/premium-photo/two-people-sitting-table_961875-516314.jpg?uid=R186345876&ga=GA1.1.219329638.1739767594&semt=ais_hybrid&w=740&q=80");
            background-repeat: no-repeat;
            background-size: cover;
        }
        .shad-bala:hover {
            background: linear-gradient(rgba(0, 0, 0, 0.591), rgb(0 0 0 / 55%)),
                url("https://img.freepik.com/premium-photo/two-people-sitting-table_961875-516314.jpg?uid=R186345876&ga=GA1.1.219329638.1739767594&semt=ais_hybrid&w=740&q=80");
            background-repeat: no-repeat;
            background-size: cover;
        }

         .parivar{
            background: linear-gradient(rgb(0 0 0 / 19%), rgb(0 0 0 / 55%)), url("https://img.freepik.com/premium-photo/three-generation-caucasian-family-spending-time-together-home-sitting-couch-using-tablet-laptop-smartphone_13339-317366.jpg?uid=R186345876&ga=GA1.1.219329638.1739767594&semt=ais_hybrid&w=740&q=80");
            background-repeat: no-repeat;
            background-size: cover;
        }
        .parivar:hover {
            background: linear-gradient(rgba(0, 0, 0, 0.591), rgb(0 0 0 / 55%)),
                url("https://img.freepik.com/premium-photo/three-generation-caucasian-family-spending-time-together-home-sitting-couch-using-tablet-laptop-smartphone_13339-317366.jpg?uid=R186345876&ga=GA1.1.219329638.1739767594&semt=ais_hybrid&w=740&q=80");
            background-repeat: no-repeat;
            background-size: cover;
        }

        .love{
            background: linear-gradient(rgb(0 0 0 / 19%), rgb(0 0 0 / 55%)), url("https://img.freepik.com/premium-photo/spring-relax-couple-embrace-with-coffee-cups-table-nature-environment-together-romance-partners-woman-man-with-hand-from-girl-hug-touch-love-marriage-park_590464-324976.jpg?uid=R186345876&ga=GA1.1.219329638.1739767594&w=740&q=80");
            background-repeat: no-repeat;
            background-size: cover;
        }
        .love:hover {
            background: linear-gradient(rgba(0, 0, 0, 0.591), rgb(0 0 0 / 55%)),
                url("https://img.freepik.com/premium-photo/spring-relax-couple-embrace-with-coffee-cups-table-nature-environment-together-romance-partners-woman-man-with-hand-from-girl-hug-touch-love-marriage-park_590464-324976.jpg?uid=R186345876&ga=GA1.1.219329638.1739767594&w=740&q=80");
            background-repeat: no-repeat;
            background-size: cover;
        }

        .dhan{
            background: linear-gradient(rgb(0 0 0 / 19%), rgb(0 0 0 / 55%)), url("https://img.freepik.com/free-photo/make-money-online-angelic-rich-businessman-with-nimbus-head-pointing-dollar-banknotes-encouraging-earn-internet-sitting-laptop-workplace-indoor-studio-shot-isolated-white-background_231208-3660.jpg?uid=R186345876&ga=GA1.1.219329638.1739767594&semt=ais_hybrid&w=740&q=80");
            background-repeat: no-repeat;
            background-size: cover;
        }
        .dhan:hover {
            background: linear-gradient(rgba(0, 0, 0, 0.591), rgb(0 0 0 / 55%)),
                url("https://img.freepik.com/free-photo/make-money-online-angelic-rich-businessman-with-nimbus-head-pointing-dollar-banknotes-encouraging-earn-internet-sitting-laptop-workplace-indoor-studio-shot-isolated-white-background_231208-3660.jpg?uid=R186345876&ga=GA1.1.219329638.1739767594&semt=ais_hybrid&w=740&q=80");
            background-repeat: no-repeat;
            background-size: cover;
        }

        .vyavhar{
            background: linear-gradient(rgb(0 0 0 / 19%), rgb(0 0 0 / 55%)), url("https://img.freepik.com/free-photo/top-view-management-team-sitting-table-came-negotiation-meeting-room-office_140725-106125.jpg?uid=R186345876&ga=GA1.1.219329638.1739767594&w=740&q=80");
            background-repeat: no-repeat;
            background-size: cover;
        }
         .vyavhar:hover {
            background: linear-gradient(rgba(0, 0, 0, 0.591), rgb(0 0 0 / 55%)),
                url("https://img.freepik.com/free-photo/top-view-management-team-sitting-table-came-negotiation-meeting-room-office_140725-106125.jpg?uid=R186345876&ga=GA1.1.219329638.1739767594&w=740&q=80");
            background-repeat: no-repeat;
            background-size: cover;
        }

        .dasa{
            background: linear-gradient(rgb(0 0 0 / 19%), rgb(0 0 0 / 55%)), url("https://img.freepik.com/free-photo/abstract-numerology-concept-with-woman-beach_23-2150058796.jpg?uid=R186345876&ga=GA1.1.219329638.1739767594&w=740&q=80");
            background-repeat: no-repeat;
            background-size: cover;
        }
        .dasa:hover {
            background: linear-gradient(rgba(0, 0, 0, 0.591), rgb(0 0 0 / 55%)),
                url("https://img.freepik.com/free-photo/abstract-numerology-concept-with-woman-beach_23-2150058796.jpg?uid=R186345876&ga=GA1.1.219329638.1739767594&w=740&q=80");
            background-repeat: no-repeat;
            background-size: cover;
        }

        .rajyog{
            background: linear-gradient(rgb(0 0 0 / 19%), rgb(0 0 0 / 55%)), url("https://blog.pocketpandit.com/wp-content/uploads/2025/02/Screenshot-2025-02-17-at-10.41.51%E2%80%AFPM-min.png");
            background-repeat: no-repeat;
            background-size: cover;
        }
        .rajyog:hover {
            background: linear-gradient(rgba(0, 0, 0, 0.591), rgb(0 0 0 / 55%)),
                url("https://blog.pocketpandit.com/wp-content/uploads/2025/02/Screenshot-2025-02-17-at-10.41.51%E2%80%AFPM-min.png");
            background-repeat: no-repeat;
            background-size: cover;
        }


        .varshphal{
            background: linear-gradient(rgb(0 0 0 / 19%), rgb(0 0 0 / 55%)), url("https://img.freepik.com/premium-photo/zodiac-signs-inside-horoscope-circle-astrology-horoscopes-concept-woman-background_488220-60917.jpg?uid=R186345876&ga=GA1.1.219329638.1739767594&semt=ais_hybrid&w=740&q=80");
            background-repeat: no-repeat;
            background-size: cover;
        }
        .varshphal:hover {
            background: linear-gradient(rgba(0, 0, 0, 0.591), rgb(0 0 0 / 55%)),
                url("https://img.freepik.com/premium-photo/zodiac-signs-inside-horoscope-circle-astrology-horoscopes-concept-woman-background_488220-60917.jpg?uid=R186345876&ga=GA1.1.219329638.1739767594&semt=ais_hybrid&w=740&q=80");
            background-repeat: no-repeat;
            background-size: cover;
        }

        .astakavarga{
            background: linear-gradient(rgb(0 0 0 / 19%), rgb(0 0 0 / 55%)), url("https://img.freepik.com/free-photo/planets-solar-system_23-2150042459.jpg?uid=R186345876&ga=GA1.1.219329638.1739767594&semt=ais_hybrid&w=740&q=80");
            background-repeat: no-repeat;
            background-size: cover;
        }
        .astakavarga:hover {
            background: linear-gradient(rgba(0, 0, 0, 0.591), rgb(0 0 0 / 55%)),
                url("https://img.freepik.com/free-photo/planets-solar-system_23-2150042459.jpg?uid=R186345876&ga=GA1.1.219329638.1739767594&semt=ais_hybrid&w=740&q=80");
            background-repeat: no-repeat;
            background-size: cover;
        }

        .key-item:hover {
            /* transform: scale(1.1);*/
            transition: all 0.3s ease-in-out;
            transform: translateY(0px);
            cursor: pointer;
        }

        .key-item {
            transform: translateY(80px);
            border-radius: 15px;
            padding: 30px 13px;
            height: -webkit-fill-available;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            transition: transform 0.5s ease-in-out;
        }

        .container {
            max-width: 1170px;
            padding-right: var(--bs-gutter-x, .75rem);
            padding-left: var(--bs-gutter-x, .75rem);
            margin-right: auto;
            margin-left: auto;
            color: white;
        }

        .al-copyright-wrapper {
            padding: 20px 0 14px;
            position: relative;
            /* margin-top: 33px; */
            margin-bottom: -7px;
            color: #ffffff;
            background: #17384e;
        }

        .text-center {
            text-align: center;
        }

        .al-footer-wrapper .widget-title,
        .al-footer-wrapper,
        .al-footer-wrapper a,
        .al-footer-wrapper .al-widget-post-title {
            font-family: "Poppins", sans-serif;
            /* font-weight: 600; */
        }

        .default-footer {
            padding: 75px 0 0;
        }

        .al-footer-wrapper {
            background: #222222;
            border-top: 1px solid #efefef;
            position: relative;
            padding: 76px 0 8px;
        }

        .row {
            --bs-gutter-x: 1.5rem;
            --bs-gutter-y: 0;
            display: flex;
            flex-wrap: wrap;
            margin-top: calc(var(--bs-gutter-y) * -1);
            margin-right: calc(var(--bs-gutter-x) * -.5);
            margin-left: calc(var(--bs-gutter-x) * -.5);
        }

        footer>div>div {
            margin: 0 auto;
            /* display: flex; */
            align-items: start;
            justify-content: space-between;
        }

        /*
        footer>div>div :nth-child(1) {
            width: 40%;
        } */

        .col-5 {
            flex: 0 0 auto;
            width: 41.66666667%;
        }

        .col-3 {
            flex: 0 0 auto;
            width: 25%;
        }

        footer>div>div :nth-child(1)>div {
            width: 100%;
        }

        .al-footer-wrapper .widget-title,
        .al-footer-wrapper,
        .al-footer-wrapper a,
        .al-footer-wrapper .al-widget-post-title {
            color: #ffffff;
            font-family: "Poppins", sans-serif;
        }

        .al-footer-wrapper a:hover {
            color: yellow;
        }


        .FontOfAstro2 {
            font-size: 22px;
            font-weight: 600;
            color: #ffffff;
            margin: 10px 0px;
            margin-left: 9px !important;
            font-family: "Montserrat", sans-serif;
        }

        .lastAstrologo img {
            width: 34px !important;
            height: 34px !important;
            margin: auto 5px !important;
        }

        .fa-lock:before {
            content: "\f023";
        }

        footer>div>div>div ul li p {
            width: 100% !important;
        }

        p {
            margin: 0px;
            word-break: break-word;
        }

        footer>div>div>div ul li {
            width: 100% !important;
        }

        ol li,
        ul li {
            margin-bottom: 10px;
        }

        /* .widget-title:before {
            content: "";
            position: absolute;
            left: 0;
            bottom: 0;
            height: 2px;
            background: #fbe216;
            width: 85%;
        } */

        .widget-title {
            border-bottom: 2px solid yellow;
            width: 80%;
            padding: 10px 0px;
            margin-bottom: 15px;
        }

        #bookImage {
            width: 100%;
            transform: rotateX(90deg);
            /* initially closed (invisible) */
            transform-origin: left;
            /* open from left side like a book */
            transition: transform 2s ease-in-out;
            /* smooth animation */
            opacity: 0;
            /* hidden initially */
        }

        #bookImage.open {
            transform: rotateX(0deg);
            /* fully open */
            opacity: 1;
        }

        .feedback {
            margin: 150px 60px;
            padding: 0 5vw;
            text-align: center;
            position: relative;
        }

        .carousel {
            /* position: relative; */
            width: 100%;
            overflow: hidden;
            border-radius: 15px;
            background: #fff;
        }

        .carousel-track {
            display: flex;
            transition: transform 0.5s ease-in-out;
            gap: 10px;
            padding: 35px;
        }

        .card {
            min-width: 500px;
            padding: 40px;
            text-align: center;
            box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
            transition: background-color 0.5s ease, color 0.5s ease;
            /* takes 3s */
            cursor: pointer;
            color: black;
        }

        .card h3 {
            margin-bottom: 10px;
            /* color: #333; */
        }

        .card p {
            /* color: #666; */
            font-size: 16px;
        }

        /* .buttons {
            position: absolute;
            top: 50%;
            width: 100%;
            display: flex;
            justify-content: space-between;
            transform: translateY(-50%);
        } */
        #prev {
            position: absolute;
            left: 0;
            top: 50%;
            transform: translate(0%, 62%);
        }

        #next {
            position: absolute;
            right: 0;
            top: 50%;
            transform: translate(0%, 62%);
        }

        .buttons button {
            background: rgba(0, 0, 0, 0.5);
            border: none;
            color: white;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 50%;
        }

        .buttons button:hover {
            background: rgba(0, 0, 0, 0.8);
        }

        .user-img {
            border: 2px solid white;
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
        }

        /* .card-1{
            display: flex;
            align-items: center;
        } */
        .card * {
            /* make all children part of the hoverable area */
            pointer-events: none;
        }

        .card:hover {
            background-color: #151665;
            color: #fff;
            border-radius: 50px 0px;
        }


        .book {
            width: 400px;
            height: 500px;
            perspective: 1000px;
            margin: 50px;
        }

        .book-inner {
            width: 100%;
            height: 100%;
            position: relative;
            transform-style: preserve-3d;
            transition: transform 1s;
        }

        /* Normal hover flip */
        .book:hover .book-inner {
            transform: rotateY(180deg);
        }

        .book img {
            width: 100%;
            height: 100%;
            position: absolute;
            backface-visibility: hidden;
            border-radius: 10px;
            cursor: pointer;
            object-fit: cover;
        }

        .book img.back {
            transform: rotateY(180deg);
        }

        /* 🔹 Auto rotate on load */
        .book-inner.rotate-once {
            animation: spinOnce 2s ease-in-out forwards;
        }

        @keyframes spinOnce {
            from {
                transform: rotateY(0deg);
            }

            to {
                transform: rotateY(360deg);
            }
        }

        .cashback {
            font-size: 15px;
            font-weight: 500;
            font-family: 'philosopher', sans-serif;
        }

        .cashback-p {
            margin-top: 20px;
            /* margin-bottom: -10px; */
            font-weight: 600;
            font-size: 1rem;
            font-family: 'philosopher', sans-serif;
        }

        .menu {
            background-color: #fbe216;
            width: 40px;
            height: 40px;
            margin-top: 10px;
            padding-top: 9px;
            border-radius: 50%;
            padding-left: 7px;
            display: none;
        }

        .menu i {
            font-size: 20px;
            /* background-color: #fbe216; */
        }

        @media (min-width: 992px) and (max-width: 1199.98px) {
            .main-container {
                width: 100vw;
            }

            .keys-container {
                width: 100%;
            }

            .image-container2 {
                width: 43vw;
                height: 60vh;
                object-fit: cover;
            }

            .Kundali-discrption {
                padding: 0;
            }

            .row {
                margin: 0px 35px;
            }
        }

        /* Medium devices (tablets, ≥768px) */
        @media (min-width: 768px) and (max-width: 991.98px) {
            .navlinks {
                display: none;
            }

            .image-container {
                left: 50%;
                top: 50%;
                transform: translate(-50%, -120%);
            }

            .headings {
                margin-top: 50vh;
            }

            /* .Kundali-discrption {
                margin: 80px 0px;
            } */

            .Kundali-discrption-image {
                padding-left: 0px;
            }

            .image-container2 {
                width: 50vw;
                height: 50vh;
                object-fit: cover;
            }

            .Kundali-discrption-text {
                width: 100%;
                text-align: center;
            }

            .Kundali-discrption {
                flex-direction: column;
            }

            .main-container {
                width: 99.9vw;
            }

            .kundali-keys {
                margin: 72px 10px;
                padding: 0 2vw;
            }

            .keys-container {
                width: 100%;
            }

            .feedback {
                margin: 72px 10px;
            }

            .row {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                text-align: center;
            }

            .col-5 {
                flex: 0 0 auto;
                width: 56.666667%;
                margin-right: 23px !important;
                margin-bottom: 20px;
            }

            .col-3 {
                flex: 0 0 auto;
                width: 61%;
            }

            .logo {
                display: flex;
                padding: 10px;
                align-items: center;
                justify-content: center;
            }

            .menu {
                display: block;
            }
              .text-container {
                width: 100%;
                margin-top: 5vh;
            }
            .link-btn button{
                width: auto;
            }
            .headings p{
                width: 90%;
            }
        }

        @media (min-width: 576px) and (max-width: 767.98px) {
            .navlinks {
                display: none;
            }

            .book {
                width: 200px;
                height: 250px;
            }

            /* .book img {
                display: none;
            } */

            .text-container {
                width: 100%;
            }

            .link-btn button {
                padding: 13px 10px;
                width: 32vw;
            }

            .headings {
                margin-top: 50vh;
            }

            .headings p {
                width: 100%;
            }

            .headings h1 {
                font-size: 2.5rem;
            }

            .headings h3 {
                font-size: 1.5rem;
            }

            .book {
                width: 300px;
                height: 370px;
            }

            .image-container {
                left: 50%;
                top: 50%;
                transform: translate(-31%, -70%);
            }

            /* .Kundali-discrption {
                margin: 72px 0px;
            } */

            .image-container2 {
                width: 50vw;
                height: 50vh;
                object-fit: cover;
            }

            .Kundali-discrption-text {
                width: 100%;
            }

            .Kundali-discrption {
                flex-direction: column;
                margin: 72px 10px;
            }

            .kundali-keys h2,
            .feedback h2 {
                font-size: 1.5rem;
            }

            .Kundali-discrption-text h2 {
                font-size: 1.5rem;
            }

            .kundali-keys {
                margin: 72px 10px;
                padding: 0 2vw;
            }

            .keys-container {
                width: 100%;
            }

            .feedback {
                margin: 72px 10px;
            }

            .card {
                min-width: 400px;
                padding: 21px;
            }

            .Kundali-discrption-image {
                padding-left: 0%;
            }

            .row {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                text-align: center;
            }

            .col-5 {
                flex: 0 0 auto;
                width: 56.666667%;
                margin-right: 23px !important;
                margin-bottom: 20px;
            }

            .col-3 {
                flex: 0 0 auto;
                width: 61%;
            }

            .logo {
                display: flex;
                padding: 10px;
                align-items: center;
                justify-content: center;
            }

            .menu {
                display: block;
            }

        }


        @media (max-width: 575.98px) {
            .main-container {
                width: 100vw;
            }

            .navlinks {
                display: none;
            }

            .headings {
                margin-top: 15vh;
            }

            .link-btn button {
                padding: 13px 10px;
                width: 40vw;
                font-size: 11px;
                margin: 0;
            }

            .text-container {
                width: 100%;
                margin-top: 40vh;
            }

            /* .book img {
                display: none;
            } */

            .headings p {
                width: 100%;
                font-size: 14px;
            }

            .headings h1 {
                font-size: 2.5rem;
                margin: 10px 0px;
            }

            .headings h3 {
                font-size: 1.5rem;
            }

            .book {
                width: 300px;
                height: 370px;
            }

            .image-container {
                left: 50%;
                top: 50%;
                transform: translate(-81%, -85%);
            }

            .image-container2 {
                width: 60vw;
                height: 25vh;
                object-fit: cover;

            }

            .image-container {
                width: 231px;
            }

            .Kundali-discrption-text {
                width: 100%;
                text-align: center;
            }

            .Kundali-discrption {
                flex-direction: column;
                margin: 72px 10px;
            }

            .Kundali-discrption-image {
                padding-left: 0%;
                margin-right: 77px;
            }

            .Kundali-discrption-text h2 {
                font-size: 1.5rem;
                margin: 10px 0px;
            }

            .Kundali-discrption-text p {
                font-size: 15px;
            }

            .cashback-p {
                font-size: 16px;
            }

            .Kundali-discrption-text h3,
            .Kundali-discrption-text span {
                font-size: 15px;
            }

            .current-price {
                font-size: 1.4rem !important;
            }

            .kundali-keys h2,
            .feedback h2 {
                font-size: 1.5rem;
                margin: 10px 0px;
            }

            .kundali-keys {
                margin: 72px 10px;
                padding: 0 2vw;
            }

            .keys-container {
                width: 100%;
            }

            .feedback {
                margin: 72px 10px;
            }

            .card {
                min-width: 300px;
                padding: 21px;
            }

            .row {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                text-align: center;
            }

            .col-5 {
                flex: 0 0 auto;
                width: 56.666667%;
                margin-right: 23px !important;
                margin-bottom: 20px;
            }

            .col-3 {
                flex: 0 0 auto;
                width: 61%;
            }

            .logo {
                display: flex;
                padding: 10px;
                align-items: center;
                justify-content: center;
            }

            .menu {
                display: block;
            }
            .key-items {
                min-width: 46%;
                height: 165px;
            }
            .key-item h3{
                font-size: 15px;
            }
            .key-item p{
                font-size: 12px;
            }
            .key-item{
                transform: translateY(0px);
            }

        }

        /* @media (max-height: 700px) {

            .image-container {
                left: 50%;
                top: 50%;
                transform: translate(-61%, -75%);
            }

            .text-container {
                font-size: 14px;
            }

        } */
    </style>
</head>


<body>
    <nav class="navbar">
        <div class="logo" >

                <img src="{{ url('assets/images/logo23.png') }}" alt="logo" class="astro-logo1">
                <img src="https://astro-buddy.com/website/uploads/sites/AstroNewLogo2.png" alt="logo" class="astro-logo2">
              <a href="{{ url('/') }}">   <p> ASTROBUDDY</p> </a>

        </div>
        <div class="navlinks">
            <ul class="links">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('/') }}">About Us</a></li>
                <li><a data-page="{{ url('daily/horoscope/1') }}" href="{{ url('daily/horoscope/1') }}">Horoscrope</a></li>
                <li><a href="{{ url('/#services') }}">Services</a></li>
                <li><a href="{{ url('/#Kundli') }}">Kundli</a></li>
                <li><a href="{{ url('/contact-us') }}">Contact Us</a></li>
            </ul>
            <div class="login-btn">
                <button><a href="{{ url('/login') }}"> Login</a></button>
            </div>
        </div>
        <div class="menu">
            <i class="fa-solid fa-bars" style="color: #ffffff;"></i>
        </div>

    </nav>


    <div class="main-container">
        <div class="text-container">
            <div class="headings">
                <h1>Premium Kundali</h1>
                <h3>
                    <!-- Premium Kundali –  -->
                    Your Personalized Life Blueprint
                </h3>
                <!-- <p>
                    Personalized with precise birth details, it reveals clear insights into Career, Marriage, Finance &
                    Health. Unlock hidden opportunities, overcome challenges, and gain the clarity to shape your future
                    with confidence.
                </p> -->
                <p>Based on precise birth details, it offers insights into career, marriage, finance, and health—helping you uncover opportunities and shape your future with confidence.</p>
                <div class="links-btns">
                    <a style="color: black;"
                        href="{{ url('assets/sampleKundli/sample_kundli.pdf') }}" download>
                        <div class="sample link-btn">
                            <button>Download
                                Sample
                                Kundli</button>
                        </div>
                    </a>
                    <a href="{{ url('kundlipdf-payment') }}">
                        <div class="buyNow link-btn">
                            <button>Buy
                                Now</button>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="image-container">
            <!-- <img src="image (2).png" alt="premiumKundali"> -->
            <div class="book">
                <div class="book-inner">
                    <img src="{{ url('assets/images/image (2).png') }}" alt="Front Cover" class="front">
                    <img src="{{ url('assets/images/kundali2.png') }}" alt="Back Cover" class="back">
                </div>
            </div>
        </div>
        <!-- <div class="discount">
            <h1>50% </h1>
            <p>CashBack in your Wallet</p>
            <img src="cashback1.png" alt="discount">
        </div> -->
    </div>

    <div class="Kundali-discrption">
        <div class="Kundali-discrption-image">
            <div class="image-container2">
                <img src="{{ url('assets/images/image(4).png') }}" alt="Kundali Description" id="bookImage">
            </div>
        </div>
        <div class="Kundali-discrption-text">
            <p class="about-kundali">About Kundali</p>
            <h2>Personalized Kundali - Guidance for Every Step of Life</h2>

            <p style="    margin: 10px 0px;    margin-bottom: 6%;">
                Get your detailed Kundli, prepared by expert astrologers, where you will receive complete predictions
                about your future. Along with that, you will also get effective remedies to overcome life’s challenges
                and achieve positive results.
            </p>
            {{--  <p class="cashback-p">Your Destiny at Half the Price -</p>
            <h3><span
                    style="text-decoration: line-through;text-decoration-thickness: 2px;color: gray;">₹1499/-</span><span
                    style="font-size: 2rem;" class="current-price"> ₹999/- </span> <span class="cashback"> with 50%
                    CashBack.</span> </h3>  --}}
            <!-- with 50% Cashback. -->
            <div style="display: flex">
                <a href="{{ url('kundlipdf-payment') }}">
                    <div class="buyNow link-btn">
                        <button>Buy
                            Now</button>
                    </div>
                </a>
                <a href="https://happiestresume.com/astro/payment" style="margin-left: 10px;">
                    <div class="buyNow link-btn">
                        <button>For Canada</button>
                    </div>
                </a>
            </div>
           
        </div>
    </div>

    <div class="kundali-keys">
        <p class="about-kundali-keys">Revelation</p>
        <!-- <h2>What Your Kundali Reveals About You</h2> -->
        <h2> Explore Your Life Through Your Kundali </h2>
       <div class="keys-container">
        <div class="keys-list">
            <div class="key-items swasthya">
                <div class="key-item ">
                    <h3>Health</h3>
                    <p>Get information related to health.</p>
                </div>
            </div>
            <div class="key-items shiksha">
                <div class="key-item">
                    <h3>Education</h3>
                    <p>Information related to education.</p>
                </div>
            </div>
            <div class="key-items aajivika">
                <div class="key-item">
                    <h3>Livelihood</h3>
                    <p>Means of living and earning opportunities.</p>
                </div>
            </div>
            <div class="key-items bhavishya">
                <div class="key-item">
                    <h3>Future</h3>
                    <p>Know about your future.</p>
                </div>
            </div>
            <div class="key-items grah-sthiti">
                <div class="key-item">
                    <h3>Planetary Positions</h3>
                    <p>Learn about the positions of planets.</p>
                </div>
            </div>
            <div class="key-items chart">
                <div class="key-item">
                    <h3>Chart</h3>
                    <p>Tools for astrological calculations and predictions.</p>
                </div>
            </div>
            <div class="key-items chakra">
                <div class="key-item">
                    <h3>Chakra</h3>
                    <p>Career guidance based on your Kundli.</p>
                </div>
            </div>
            <div class="key-items shad-bala">
                <div class="key-item">
                    <h3>Shad Bala</h3>
                    <p>Comprehensive analysis of planetary strengths.</p>
                </div>
            </div>
        </div>
    
        <div class="keys-list">
            <div class="key-items parivar">
                <div class="key-item">
                    <h3>Family</h3>
                    <p>Get information related to family.</p>
                </div>
            </div>
            <div class="key-items love">
                <div class="key-item">
                    <h3>Love</h3>
                    <p>Know about your love life.</p>
                </div>
            </div>
    
            <div class="key-items dhan">
                <div class="key-item">
                    <h3>Wealth</h3>
                    <p>Get information related to earning money.</p>
                </div>
            </div>
            <div class="key-items vyavhar">
                <div class="key-item">
                    <h3>Behavior</h3>
                    <p>Understand your personality and behavior.</p>
                </div>
            </div>
    
            <div class="key-items dasa">
                <div class="key-item">
                    <h3>Dasha</h3>
                    <p>Detailed information about planetary periods (Dashas).</p>
                </div>
            </div>
            <div class="key-items rajyog">
                <div class="key-item">
                    <h3>Rajyog</h3>
                    <p>Combinations indicating success, prosperity, power, and
                        respect.</p>
                </div>
            </div>
            <div class="key-items varshphal">
                <div class="key-item">
                    <h3>Yearly Horoscope</h3>
                    <p>Astrological analysis of annual predictions.</p>
                </div>
            </div>
            <div class="key-items astakavarga">
                <div class="key-item">
                    <h3>Ashtakavarga</h3>
                    <p>Analysis of planetary strengths and influences.</p>
                </div>
            </div>
        </div>
    </div>


    </div>

    <div class="feedback">
        <p class="feedback-title">FeedBack</p>
        <h2>What Our Users Say About Premium Kundali</h2>
        <div class="kundali-carousel carousel">

            <div class="carousel-track">
                <div class="card">
                    <div class="card-1">
                        <img src="https://images.unsplash.com/photo-1507019403270-cca502add9f8?fm=jpg&q=60&w=3000&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8Z2lybCUyMHByb2ZpbGV8ZW58MHx8MHx8fDA%3D"
                            alt="user" class="user-img">
                        <h3>Ananya Sharma</h3>
                    </div>

                    <p>“Ab andhadhund guesswork khatam – meri life ka asli roadmap sirf Premium Kundali ne diya!”</p>
                </div>
                <div class="card">
                    <div class="card-1">
                        <img src="https://www.shutterstock.com/image-photo/close-head-shot-portrait-preppy-600nw-1433809418.jpg"
                            alt="user" class="user-img">
                        <h3>Kavya Iyer</h3>
                    </div>

                    <p>“Prediction itni accurate thi ki main ab bina soche samajhe koi bada decision nahi leta.”</p>
                </div>
                <div class="card">
                    <div class="card-1">
                        <img src="https://www.catholicsingles.com/wp-content/uploads/2020/06/blog-header-3.png"
                            alt="user" class="user-img">
                        <h3>Rohit Malhotra</h3>
                    </div>
                    <p>“Career, marriage aur finance – sab kuch crystal clear ho gaya ek hi kundali se!”</p>
                </div>
                <div class="card">
                    <div class="card-1">
                        <img src="https://cdn.pixabay.com/photo/2023/02/17/16/25/man-7796384_1280.jpg" alt="user"
                            class="user-img">
                        <h3>Rahul Choudhary</h3>
                    </div>
                    <p>“Mujhe laga astrology bas timepass hai, par Premium Kundali ne meri soch hi badal di.”</p>
                </div>
                <div class="card">
                    <div class="card-1">
                        <img src="https://p3.hippopx.com/preview/275/995/man-model-smile-beard-suit-style-km-nazrul-islam-smart-boy-bd-handsome-boy-bd-most-handsome-boy-bd-thumbnail.jpg"
                            alt="user" class="user-img">
                        <h3>Amit Khanna</h3>
                    </div>
                    <p>“Bina Kundali ke main confuse tha… Premium Kundali ne mujhe confidence diya.”</p>
                </div>
                <div class="card">
                    <div class="card-1">
                        <img src="https://writestylesonline.com/wp-content/uploads/2018/11/Three-Statistics-That-Will-Make-You-Rethink-Your-Professional-Profile-Picture.jpg"
                            alt="user" class="user-img">
                        <h3>Radhika Mehta</h3>
                    </div>
                    <p>“Premium Kundali ne meri zindagi ke sabse bade confusion ko door kiya – ab main decisions
                        confidently leta hoon.”</p>
                </div>
                <div class="card">
                    <div class="card-1">
                        <img src="https://finetoshine.com/wp-content/uploads/facebook-profile-picture-for-girl-and-profile-pic-fb-female-2.jpg"
                            alt="user" class="user-img">
                        <h3>Neha Desai</h3>
                    </div>
                    <p>“Jitna paisa diya usse kai zyada value mili – ekdum detailed aur personal guidance!”</p>
                </div>
                <div class="card">
                    <div class="card-1">
                        <img src="https://storage.pixteller.com/designs/designs-images/2019-01-10/07/profile-phote-avatar-human-girl-yellow-fashion-1-5c3784f592e84.png"
                            alt="user" class="user-img">
                        <h3>Radhika Desai</h3>
                    </div>
                    <p>“Jitna paisa diya usse kai zyada value mili – ekdum detailed aur personal guidance!”</p>
                </div>
            </div>
            <div class="buttons">
                <button id="prev">&#10094;</button>
                <button id="next">&#10095;</button>
            </div>

        </div>
    </div>


    <footer class="al-footer-wrapper default-footer">
        <div style="margin-top: 30px; margin-bottom:100px;" class="container">
            <div class="row">
                <div style="margin-right: 50px" class="col-5 ResFooter">
                    <div class="logo FigmaNewLogo">
                        <a class="lastAstrologo" href="/" style="display: flex; height: 55px">
                            <img src="https://astro-buddy.com/website/uploads/sites/logo23.png" alt="logo">
                            <!-- <img style="height:53px;" src="http://127.0.0.1:8000/website/uploads/sites/22.png"
                            alt="logo"> -->
                            <h3 class="FontOfAstro2">ASTROBUDDY</h3>
                        </a>
                    </div><br>
                    <div style="font-size: medium" class="content">
                        "Astrology reveals the will of the gods. Astrology is a language. If you understand this
                        language,
                        the sky speaks to you."
                    </div>
                </div>
                <div style="font-size: medium" class="col-3">
                    <h3 class="widget-title">Quick Links</h3>
                    <ul>
                        <li style="display: flex;">

                            <p>
                                <span><i class="fa-solid fa-lock"></i></span><a
                                    href="https://astro-buddy.com/privacy-policy">&nbsp; Privacy Policy</a>
                            </p>
                        </li>
                        <li style="display: flex;">

                            <p>
                                <span><i class="fa-solid fa-list-check"></i></span><a
                                    href="https://astro-buddy.com/terms-condition">&nbsp; Terms &amp; Conditions</a>
                            </p>
                        </li>
                        <li id="menu-item-907"
                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-907">
                            <p>
                                <span><i class="fa-brands fa-dailymotion"></i></span><a
                                    href="https://astro-buddy.com/daily/horoscope/1">&nbsp; My Daily Horoscope</a>
                            </p>
                        </li>
                        <li id="menu-item-907"
                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-907">
                            <p>
                                <span><i class="fa-brands fa-weebly"></i></span><a
                                    href="https://astro-buddy.com/weekly/horoscope/1">&nbsp; My Weekly Horoscope</a>
                            </p>
                        </li>
                        <li id="menu-item-907"
                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-907">
                            <p>
                                <span><i class="fa-solid fa-calendar-days"></i></span><a
                                    href="https://astro-buddy.com/monthly/horoscope/1">&nbsp; My Monthly Horoscope</a>
                            </p>
                        </li>
                    </ul>
                </div>
                <div style="font-size: medium" class="col-3">
                    <h3 class="widget-title">Contact Info</h3>
                    <ul>
                        <li style="display: flex;">
                            <p>
                                <span><i class="fa-solid fa-phone"></i></span><a href="tel:+(91)9294549294">&nbsp; +(91)
                                    9294-54-9294</a>
                            </p>
                        </li>
                        <li style="display: flex;">

                            <p class="supporTId">
                                <span><i class="fa-solid fa-envelope"></i></span><a
                                    href="mailto:support@astro-buddy.com">&nbsp;
                                    support@astro-buddy.com</a>
                            </p>
                        </li>
                        <li class="socialIcon">
                            <a href="https://www.linkedin.com/company/astrobuddy/posts/?feedView=all"><i
                                    class="fa-brands fa-linkedin-in"></i></a>
                            <a href="https://www.instagram.com/astro_.buddy/"><i class="fa-brands fa-instagram"></i></a>
                            <a href="https://www.facebook.com/profile.php?id=61560488164973"><i
                                    class="fa-brands fa-facebook"></i></a>
                            <a href="https://x.com/astro_buddyy"><i class="fa-brands fa-x-twitter"></i></a>
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
                        <p>Copyright © 2025 AstroBuddy (Powered By Rajpal-Group). All Right Reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>


</body>
<script>
    // Add your JavaScript code here
    const navbar = document.getElementsByClassName("navbar")[0];

    const logo1 = document.querySelector(".astro-logo1");
    const logo2 = document.querySelector(".astro-logo2");

    window.addEventListener("scroll", () => {
        if (window.scrollY > 150) {
            navbar.classList.add("scrolled");
            logo1.style.display = "none";
            logo2.style.display = "block";
        } else {
            navbar.classList.remove("scrolled");
            logo1.style.display = "block";
            logo2.style.display = "none";
        }
    });


    function makeInfiniteScroller(list, speed = 1) {
        const items = list.querySelectorAll(".key-items");
        if (!items.length) return;

        const cardWidth = items[0].offsetWidth + 15;
        const totalWidth = cardWidth * items.length;

        // Clone items once → so we have original + duplicate
        list.innerHTML += list.innerHTML;

        let position = 0;
        let intervalId;

        function autoScroll() {
            position -= speed;
            list.style.transform = `translateX(${position}px)`;

            // When first set fully scrolled, reset instantly (seamless loop)
            if (Math.abs(position) >= totalWidth) {
                position = 0;
            }
        }

        function startScroll() {
            if (!intervalId) intervalId = setInterval(autoScroll, 16); // ~60fps
        }

        function stopScroll() {
            clearInterval(intervalId);
            intervalId = null;
        }

        // Start auto scrolling
        startScroll();

        // Pause when hovering cards
        list.querySelectorAll(".key-items").forEach(item => {
            item.addEventListener("mouseenter", stopScroll);
            item.addEventListener("mouseleave", startScroll);
        });
    }

    // Apply to all lists
    document.querySelectorAll(".keys-container .keys-list").forEach((list, i) => {
        makeInfiniteScroller(list, 1.5); // change speed if needed
    });


    window.addEventListener("scroll", () => {
        let scrollTop = window.scrollY; // how much we scrolled
        let bookImage = document.getElementById("bookImage");

        if (scrollTop >= 100) {
            bookImage.classList.add("open");  // show + animate
        } else {
            bookImage.classList.remove("open"); // hide again when scrolling up
        }
    });


    const track = document.querySelector('.carousel-track');
    let cards = document.querySelectorAll('.card');
    const prevBtn = document.getElementById('prev');
    const nextBtn = document.getElementById('next');

    const visibleCards = 2;
    const gap = 10;

    let index = visibleCards; // Start from the first "real" card

    // Clone first and last slides
    const firstClones = [...cards].slice(0, visibleCards).map(c => c.cloneNode(true));
    const lastClones = [...cards].slice(-visibleCards).map(c => c.cloneNode(true));

    firstClones.forEach(clone => track.appendChild(clone));
    lastClones.forEach(clone => track.insertBefore(clone, track.firstChild));

    cards = document.querySelectorAll('.card'); // update NodeList
    const total = cards.length;

    function getCardWidth() {
        return cards[0].offsetWidth + gap;
    }

    function showSlide(i, smooth = true) {
        const cardWidth = getCardWidth();
        track.style.transition = smooth ? "transform 0.5s ease" : "none";
        track.style.transform = `translateX(${-(i * cardWidth)}px)`;
    }

    // Next
    function nextSlide() {
        index++;
        showSlide(index);
    }

    // Prev
    function prevSlide() {
        index--;
        showSlide(index);
    }

    // Transition fix for infinite effect
    track.addEventListener("transitionend", () => {
        if (index >= total - visibleCards) {
            index = visibleCards; // reset to start
            showSlide(index, false);
        } else if (index < visibleCards) {
            index = total - visibleCards * 2; // reset to end
            showSlide(index, false);
        }
    });

    nextBtn.addEventListener("click", nextSlide);
    prevBtn.addEventListener("click", prevSlide);

    // Auto-slide
    setInterval(nextSlide, 3000);

    // Initialize at correct position
    window.addEventListener("load", () => {
        showSlide(index, false);
    });


    //     function updateCardStyles() {
    //     // Remove special style from all cards
    //     cards.forEach(card => {
    //         card.style.backgroundColor = "";
    //         card.style.color = "";
    //         card.style.borderRadius = "";
    //     });

    //     // Apply special style to first visible card
    //     const firstVisibleIndex = index;
    //     const firstCard = cards[firstVisibleIndex];
    //     if (firstCard) {
    //         firstCard.style.backgroundColor = "#151665";
    //         firstCard.style.color = "#fff";
    //         firstCard.style.borderRadius = "50px 0px";
    //     }
    // }

    // // Call this whenever slide changes
    // function showSlide(i) {
    //     const card = document.querySelector('.card');
    //     const cardWidth = card.offsetWidth;
    //     const gap = 15; // gap between cards
    //     track.style.transform = `translateX(${-i * (cardWidth + gap)}px)`;

    //     updateCardStyles(); // update first card style
    // }

    // // Initial call
    // updateCardStyles();


    window.addEventListener("load", () => {
        const bookInner = document.querySelector(".book-inner");

        // Add the animation class
        bookInner.classList.add("rotate-once");

        // Remove it after animation ends so hover works normally
        bookInner.addEventListener("animationend", () => {
            bookInner.classList.remove("rotate-once");
        });
    });

</script>

</html>
