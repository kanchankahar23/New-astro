<style>
    /* Style for the image in the left section */
    /* Style for close button */


    .popup-image {
        width: 100%;
        height: auto;
        border-radius: 10px;
        margin-bottom: 20px;
        margin-top: 25px
            /* Adds some space between the image and the text */
    }


    .open-button:hover {
        background-color: #444;
    }

    /* Styles for close button */


    .popup-container {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        /* Modal background */
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 1000;
    }

    .popup-content {
        position: relative;
        background-color: white;
        width: 70%;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        z-index: 1001;
    }

    .popup-container {
        width: 100%;
        background-color: #00000085;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        border-radius: 10px;
        display: flex;
    }

    .popup-content {
        display: flex;
        width: 70%;
    }

    .left-section {
        background-color: #ffff;
        padding: 40px;
        width: 50%;
        border-top-left-radius: 10px;
        border-bottom-left-radius: 10px;
    }

    .left-section h2 {
        font-size: 24px;
        margin-bottom: 20px;
    }

    .left-section p {
        font-size: 16px;
        line-height: 1.6;
        margin-bottom: 20px;
    }

    .contact-us {
        margin-top: 40px;
    }

    .contact-us h3 {
        font-size: 18px;
    }

    .contact-us button {
        margin-top: 10px;
        padding: 10px 20px;
        background-color: black;
        color: white;
        border: none;
        cursor: pointer;
        border-radius: 5px;
    }

    .right-section {
        background-color: #fff3cd;
        padding: 40px;
        width: 50%;
        border-top-right-radius: 10px;
        border-bottom-right-radius: 10px;
    }

    .right-section h3 {
        font-size: 18px;
        margin-bottom: 20px;
    }

    form label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
    }

    form input,
    form select {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border-radius: 5px;
        border: 1px solid #ccc;
    }

    form input[type="email"]:invalid+.error-message {
        display: block;
    }

    .error-message {
        display: none;
        color: red;
        font-size: 12px;
    }

    .get-copy-button {
        padding: 15px 20px;
        background-color: #000;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        width: 46%;
    }
    .subMitPanchang{
        margin-right:3%;
    }

    .get-copy-button:hover {
        background-color: #444;
    }

    .promise {
        font-size: 12px;
        margin-top: 10px;
        color: #888;
        text-align: center;
    }
    .panchangTag{
        margin-bottom:15px;
    }

</style>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

<header class="al-header-wrapper al-header-style1 upperhead">
    <div style="background-color: #ffffff" class="al-header-style-one al-wrapper-sticky astroheader">
        <div class="container" style="width: 100%; margin: 0 auto">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-5">
                    <!-- LOGO-->
                    <div style="white-space: nowrap" class="al-logo">
                        <a href="/">
                        <!-- <img id="" src="{{ asset('website/uploads/sites/AstroNewLogo3.png') }}" alt="logo" /> -->
                            <img id="" src="{{ asset('website/uploads/sites/AstroNewLogo2.png') }}" alt="logo" />
                            <!-- <img style="height: 30px" src="{{ asset('website/uploads/sites/22 (1).png') }}"
                                alt="logo" /> -->
                                <h3 class='FontOfAstro'>ASTROBUDDY</h3>
                        </a>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-7 col-7">
                    <div class="al-main-nav-wrapper">
                        <div class="al-main-navigation">
                            <div class="menu-main_menu-container">
                                <ul id="astrologer-menu" class="astroMoDevice menu">
                                    <li id="menu-item-916"
                                        class="weBiConSelector menu-item menu-item-type-post_type menu-item-object-page menu-item-home page_item page-item-13 menu-item-916" data-page="{{ url('/home') }}">
                                        <a href="{{ url('/') }}" aria-current="page">Home</a>
                                    </li>
                                    <li id="menu-item-913"
                                        class="weBiConSelector menu-item menu-item-type-post_type menu-item-object-page menu-item-913" data-page="about">
                                        <a href="#about" onclick="colorChange()">About Us</a>
                                    </li>
                                    <li id="menu-item-913"
                                        class="weBiConSelector dropdown menu-item menu-item-type-post_type menu-item-object-page menu-item-913" data-page="{{ url('daily/horoscope/1') }}">
                                        <a href="{{ url('#horoscope') }}">Horoscope</a>
                                        <ul class="dropdown-content">
                                            <a class="weBiConSelector" data-page="{{ url('daily/horoscope/1') }}" href="{{ url('daily/horoscope/1') }}">Daily Horoscope</a>
                                            <a class="weBiConSelector" data-page="{{ url('weekly/horoscope/1') }}" href="{{ url('weekly/horoscope/1') }}">Weekly Horoscope</a>
                                            <a class="weBiConSelector" data-page="{{ url('yearly/horoscope/1') }}" href="{{ url('yearly/horoscope/1') }}">Yearly Horoscope</a>
                                        </ul>
                                    </li>

                                    <li id="menu-item-913"
                                        class="weBiConSelector dropdown menu-item menu-item-type-post_type menu-item-object-page menu-item-913" data-page="#services">
                                        <a href="#services">Services</a>
                                        <ul class="dropdown-content">
                                            <a href="{{ url('numerology') }}" data-page="{{ url('numerology') }}">Numerology</a>

                                            <a id="open-modal-button" data-page="#services"> Daily Panchang</a>
                                            <a href="{{ url('get-yogas') }}" data-page="{{ url('get-yogas') }}">Get Yoga's</a>
                                            {{--  <a href="{{ url('#') }}">Shani Sadesati</a>
                        <a href="{{ url('#') }}">Mahadasha</a>  --}}
                                        </ul>
                                    </li>

                                    <li id="menu-item-913"
                                        class="weBiConSelector dropdown menu-item menu-item-type-post_type menu-item-object-page menu-item-913" data-page="#services">
                                        <a href="#Kundli">Kundli</a>
                                        <ul class="dropdown-content">
                                            <a href="{{ url('/kundli') }}" data-page="{{ url('/kundli') }}">Free Kundli</a>

                                            <a href="{{ url('/kundli-matching') }}" data-page="{{ url('/kundli-matching') }}" >Kundli Matching</a>
                                            <a href="{{ url('/premiumKundli') }}"
                                                data-page="{{ url('/premiumKundli') }}">Premium Kundli</a>

                                        </ul>
                                    </li>
                                   
                                    {{--  <li id="menu-item-913"
                                        class="weBiConSelector dropdown menu-item menu-item-type-post_type menu-item-object-page menu-item-913" data-page="#services">
                                        <a href="#Kundli">Divine Stones</a>
                                        <ul class="dropdown-content">
                                            <a href="https://divinestones.in/" data-page="https://divinestones.in/">Free Kundli</a>
                                        </ul>
                                    </li>  --}}
                                    {{--  <li id="menu-item-913"
                                        class="weBiConSelector menu-item menu-item-type-post_type menu-item-object-page menu-item-913"
                                        data-page="about">
                                        <a href="https://divinestones.in/" onclick="colorChange()" target="_blank">Divine Stones</a>
                                    </li>  --}}
                                    {{--  <li id="menu-item-913"
                                        class="weBiConSelector menu-item menu-item-type-post_type menu-item-object-page menu-item-913" >
                                        <a href="{{ url('/divine-stone') }}"
                                            data-page="{{ url('/divine-stone') }}">Divine-Stone</a>
                                    </li>  --}}
                                    <li id="menu-item-912"
                                        class="weBiConSelector menu-item menu-item-type-post_type menu-item-object-page menu-item-912" data-page="{{ url('/contact-us') }}">
                                        <a href="{{ url('/contact-us') }}">Contact US</a>
                                    </li>
                                    <li id="menu-item-912"
                                        class="weBiConSelector menu-item menu-item-type-post_type menu-item-object-page menu-item-912" data-page="{{ url('/login') }}">
                                        <a class="btn btn-warning" style="padding: 10px;line-height: 1;color: #000000d1;text-transform: capitalize;" href="{{ url('/login') }}">{{ substr(Auth::check() ? 'Dashboard' : 'Log In', 0, 15) }}</a>
                                    </li>
                                    {{--  <li>
                        <div id="google_translate_element"></div>
                    </li>  --}}
                                     {{--  <li
                      class="menu-item menu-item-type-post_type menu-item-object-page menu-item-912"
                    >
                      <a href="{{ url('/login') }}" class="loginbtn">
                        <button type="button" class="btn" style="width: 169px;">{{ substr(Auth::check() ? ucwords(Auth::user()->name) : 'Log In', 0, 15) }}
                        </button>
                      </a>
                    </li>  --}}


                                </ul>
                            </div>

                            <div class="al-menu-toggle">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <div id="popup-modal" class="popup-container" style="display: none;">
        <div class="popup-content">
            <div class="left-section">
                <h3>Plan your day with our </h3>
                <h5>comprehensive <span style="color: yellowgreen;">Daily Panchang,</span> including muhurat, yoga, and
                    planetary positions.</h5>
                <img src="https://astroarunpandit.org/wp-content/uploads/2024/03/Designer-5-768x768.png"
                    alt="Description of Image" class="popup-image" />

            </div>
            <div class="right-section">
                {{--  <span class="close-button">&times;</span>  --}}
                <h2 style="    font-size: 25px;text-align: center;margin-bottom: revert;">Get Panchang Details</h2>
                <form method="POST" action="{{ url('get-panchang-details') }}">
                    @csrf
                    <label for="first-name">Date</label>
                    <input class="form-input" type="date" id="name" name="date" required>
                    {{--  @error('date')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror  --}}

                    <label for="first-name">Time</label>
                    <input class="form-input" type="time" name="time" required>
                    {{--  @error('time')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror  --}}

                    <label for="job-position">Language</label>
                    <select class='panchangTag' style="font-size: 0.9rem;font-weight: 600;margin-bottom: 20px;" name="lang">
                        <option style="font-size: 0.9rem;font-weight: 600;" value="hi">Hindi</option>
                        <option style="font-size: 0.9rem;font-weight: 600;" value="en">English</option>
                        <option style="font-size: 0.9rem;font-weight: 600;" value="ml">Malayalam</option>
                        <option style="font-size: 0.9rem;font-weight: 600;" value="ta">Tamil</option>
                        <option style="font-size: 0.9rem;font-weight: 600;" value="ka">Kannada</option>
                        <option style="font-size: 0.9rem;font-weight: 600;" value="te">Telegu</option>
                        <option style="font-size: 0.9rem;font-weight: 600;" value="sp">Spanish</option>
                        <option style="font-size: 0.9rem;font-weight: 600;" value="fr">French</option>
                    </select>
                    {{--  @error('lang')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror  --}}

                    <label for="email">Place</label>
                    {{--  <input class="form-input" type="text" placeholder="Place" name="place" required>  --}}
                    <input type="search" name="place" class="city-input form-input"
                        placeholder="Enter your birth place" autocomplete="off" required>
                    <input type="hidden" class="lat-input form-control" name="lat">
                    <input type="hidden" class="lon-input form-control" name="lon">
                    <div class="suggestions"></div>
                    {{--  @error('place')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror  --}}

                    <button type="submit" class="get-copy-button subMitPanchang">Submit</button>
                    <button class="get-copy-button close-button">Close</button>
                </form>
            </div>
        </div>
    </div>

    {{--  <div id="popupOverlay" class="overlay-container">
        <div class="popup-box">
            <h3 style="text-align: right;" onclick="togglePopup()">X</h3>
            <h2 style="color: green;">Popup Form</h2>
            <br>
            <form class="form-container" method="POST" action="{{ url('get-panchang-details') }}">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <label style="margin-right: 105px;" class="form-label" for="name">
                            Date :
                        </label>
                        <input class="form-input" type="date" id="name" name="date" required>
                        @error('date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                    </div>
                    <div class="col-6">
                        <label style="margin-right: 103px;" class="form-label" for="email">Time :</label>
                        <input class="form-input" type="time"  name="time" required>
                        @error('time')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label style="margin-right: 99px;" class="form-label" for="name">
                            Place :
                        </label>
                        <input class="form-input" type="text" placeholder="Place" name="place" required>
                        @error('place')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                    </div>
                    <div class="col-6">
                        <label style="margin-right: 65px;" class="form-label" for="email">Language :</label>
                        <select style="font-size: 0.9rem;font-weight: 600;margin-bottom: 20px;" name="lang">
                                <option style="font-size: 0.9rem;font-weight: 600;" value="hi">Hindi</option>
                                <option style="font-size: 0.9rem;font-weight: 600;" value="en">English</option>
                                <option style="font-size: 0.9rem;font-weight: 600;" value="ml">Malayalam</option>
                                <option style="font-size: 0.9rem;font-weight: 600;" value="ta">Tamil</option>
                                <option style="font-size: 0.9rem;font-weight: 600;" value="ka">Kannada</option>
                                <option style="font-size: 0.9rem;font-weight: 600;" value="te">Telegu</option>
                                <option style="font-size: 0.9rem;font-weight: 600;" value="sp">Spanish</option>
                                <option style="font-size: 0.9rem;font-weight: 600;" value="fr">French</option>
                            </select>
                            @error('lang')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                    </div>
                </div>
                <button style="margin-top: 10px" class="btn-submit" type="submit">
                    Submit
                </button>
            </form>

        </div>
    </div>  --}}
    {{--  <script>
        function togglePopup() {
            const overlay = document.getElementById('popupOverlay');
            overlay.classList.toggle('show');
        }
    </script>  --}}
    <script>
        // Get elements
        var openButton = document.getElementById("open-modal-button");
        var popupModal = document.getElementById("popup-modal");
        var closeButton = document.querySelector(".close-button");
        openButton.onclick = function() {
            popupModal.style.display = "flex";
        }
        closeButton.onclick = function() {
            popupModal.style.display = "none";
        }
        window.onclick = function(event) {
            if (event.target == popupModal) {
                popupModal.style.display = "none";
            }
        }
        var openButton = document.getElementById("open-modal-button");
        var popupModal = document.getElementById("popup-modal");
        var closeButton = document.querySelector(".close-button");
        openButton.onclick = function() {
            popupModal.style.display = "flex";
        }
        closeButton.onclick = function() {
            popupModal.style.display = "none";
        }
        window.onclick = function(event) {
            if (event.target == popupModal) {
                popupModal.style.display = "none";
            }
        }

        document.getElementById("download-form").addEventListener("submit", function(event) {
            var emailField = document.getElementById("email");
            if (!emailField.checkValidity()) {
                event.preventDefault();
                document.querySelector(".error-message").style.display = "block";
            } else {
                document.querySelector(".error-message").style.display = "none";
            }
        });


        document.addEventListener("DOMContentLoaded", function(event) {
            var menuItems = document.querySelectorAll('li.menu-item-object-page');
            let url = new URL(window.location.href);
            let param = url.pathname;
            let hash = url.hash;

            menuItems.forEach(function(ele) {
                ele.classList.remove('current-menu-item');
            });

            menuItems.forEach(function(ele) {
                let anchorTag = ele.querySelector('a');
                if (anchorTag) {
                    let anchorUrl = new URL(anchorTag.href);
                    if (param + hash == anchorUrl.pathname + anchorUrl.hash) {
                        ele.classList.add('current-menu-item');
                    }
                }
            });
        });
    </script>

</header>
<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'ar',
            includedLanguages: 'hi,en,bn,',
            layout: google.translate.TranslateElement.InlineLayout.SIMPLE
        }, 'google_translate_element');
    }
</script>


<!-- header element select script start  -->
 <script>
    document.addEventListener('DOMContentLoaded', () => {

  const changeTimeColor = document.querySelectorAll('.weBiConSelector');


  const currentURL = window.location.href;
  const currentHash = window.location.hash;
  console.log('Current URL:', currentURL);
  console.log('Current URL:', currentHash);


  changeTimeColor.forEach(element => {

      console.log('Checking <li> with data-page:', element.getAttribute('data-page'));
        let url = currentURL;
        let lastPart = url.split('/').pop();
      if(element.getAttribute('data-page') === lastPart){
        element.classList.add('listChangeColor');
      }else{
        element.classList.remove('listChangeColor');
      }

      if (element.getAttribute('data-page') === currentURL) {

          element.classList.add('listChangeColor');
          console.log('Color applied to <li>:', element);
      }else if(element.getAttribute('data-page') === currentHash){
        element.classList.add('listChangeColor');
      }

  });
});
 </script>



<script>
//    document.addEventListener('DOMContentLoaded', () => {
//     const changeTimeColor = document.querySelectorAll('.weBiConSelector');
//     const currentURL = window.location.href;
//     console.log('Current URL:', currentURL);
//     changeTimeColor.forEach(element => {
//         // element.classList.remove('listChangeColor');
//         console.log('Checking <li> with data-page:', element.getAttribute('data-page'));
//         if (element.getAttribute('data-page') === currentURL) {
//             element.classList.toggle('listChangeColor');
//             console.log('Color applied to <li>:', element);
//         }
//     });
// });

// function colorChange(){
//     const changeTimeColor = document.querySelectorAll('.weBiConSelector');
//     changeTimeColor.forEach(element => {
//         element.classList.remove('listChangeColor');
//         if (element.getAttribute('data-page') === "about") {
//             element.classList.add('listChangeColor');
//             console.log('Color applied to <li>:', element);
//         }
//     });
// }

</script>


 <style>
    .listChangeColor{
        background-color:yellow;
    }

/* header css  */

/* .upperhead {
    transition: top 0.3s ease-in-out;
}

.astroMoDevice {
    transition: transform 0.3s ease-in-out;
    transform: translateX(-100%);
} */


 </style>


    <!-- <script>
    document.addEventListener('DOMContentLoaded', () => {
    const header = document.querySelector('.upperhead');
    let lastScrollPosition = 0;

    window.addEventListener('scroll', () => {
        const currentScrollPosition = window.pageYOffset;

        if (currentScrollPosition > lastScrollPosition) {

            header.style.top = '-100px';
        } else {

            header.style.top = '0';
        }


        lastScrollPosition = currentScrollPosition;
    });
});

</script> -->





<!-- header element select script end  -->

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
</script>
@php
$userIds = \App\Models\User::where('type', 'astrologer')->pluck('id');
@endphp
<script src="https://cdn.socket.io/4.7.2/socket.io.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const userIds = @json($userIds);
        const currentUserId = "{{ Auth::id() }}";

        const socket = io("https://astro-buddy.in", {
            transports: ["websocket"],
            auth: { id: currentUserId },
            reconnection: true,
            reconnectionAttempts: 5,
            reconnectionDelay: 2000,
        });

        socket.on("connect", () => {
            console.log("✅ Socket connected:", socket.id);
            checkOnlineStatus();
        });

        socket.on("disconnect", (reason) => {
            console.warn("⚠️ Socket disconnected:", reason);
        });

        socket.on("gotOnline", (data) => {
            console.log("⚡ User status changed:", data);
            updateUserStatus(data.userId, data.online);
        });

        function checkOnlineStatus() {
            if (socket.connected) {
                socket.emit("checkOnline", { users: userIds }, (response) => {
                    console.log("🧩 Online list:", response);
                    response.forEach((user) => {
                        updateUserStatus(user.userId, user.online);
                    });
                });
            } else {
                console.warn("❌ Socket not connected yet, retrying...");
                setTimeout(checkOnlineStatus, 2000);
            }
        }

        // ✅ Update all elements with same astrologer_id
        function updateUserStatus(userId, isOnline) {
            const elements = document.querySelectorAll(`[id='user-${userId}-status']`);
            elements.forEach(el => {
                el.textContent = isOnline ? "🟢 Online" : "🔴 Offline";
                el.style.color = isOnline ? "green" : "red";
            });
        }
    });
</script>