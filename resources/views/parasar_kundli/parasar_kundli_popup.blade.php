<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pricing Plans Popup</title>
    <link rel="stylesheet" href="{{ url('parasar_popup/popup.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .modal-header {
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

        /* Keyframes for fadeInUp animation */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Animation for popup */
        .overlay-container.show {
            display: flex;
            opacity: 1;
        }
    </style>
</head>

<body>
    <div id="rs-popupContainer" class="rs-popup-container">
        <div class="rs-popup-content">
            <span class="rs-close-popup" id="rs-closePopupBtn">&times;</span>
            <main style="margin-top: 50px; ">
                <section class="rs-pricing-section">
                    <h1>Get Your Premium <span>Kundli </span></h1>
                    <p> अपनी विस्तृत कुंडली प्राप्त करें, जो विशेषज्ञ
                        ज्योतिषियों द्वारा तैयार की जाती है, जहां आपको
                        अपने भविष्य की पूरी भविष्यवाणी मिलेगी।
                        <span class="premiumDescription">
                        साथ ही जीवन में बुरी समस्याओं से निकलने और अच्छे
                        परिणाम पाने के लिए प्रभावी उपाय भी मिलेंगे।
                        </span>
                       </p>
                    <div class="rs-button-container">
                        <a href="#" class="btn yellow-btn"
                            style="
                            border-radius: 0 50px 50px 0;
                            left: -20px;
                            position: relative;color:white;text-transform: uppercase;
                            "><i
                                class="fa-solid fa-tag"></i> Price: <strike class='PriceStar' style="color: #d5d2a5; ">
                                ₹1499</strike>
                            <span id="price-color"> ₹999</span>
                        </a>

                        <a href="#" class="btn red-btn"
                            style="
                            border-radius: 50px 0 0 50px;
                            left: 20px;
                            position: relative;text-transform: uppercase;color:white;
                            ">Page:
                            170 <i class="fa-solid fa-file-pdf"></i>
                        </a>
                    </div>
                    <div class="rs-slider-container">
                        <div class="rs-pricing-cards">
                            <div class="rs-card1">
                                <div class="rs-card" style="background-color: #ffdfe4">
                                    <h2>स्वास्थ्य </h2>
                                    <p>स्वास्थ्य संबंधी जानकारी प्राप्त करें।
                                    </p>
                                </div>
                            </div>
                            <div class="rs-card1">
                                <div class="rs-card" style="background-color: #d5fbd5">
                                    <h2>शिक्षा</h2>
                                    <p>शिक्षा से संबंधित जानकारी।
                                    </p>
                                </div>
                            </div>
                            <div class="rs-card1">
                                <div class="rs-card" style="background-color: #e1dcfb">
                                    <h2>आजीविका
                                    </h2>
                                    <p>भविष्य के बारे में जाने।

                                    </p>
                                </div>
                            </div>
                            <div class="rs-card1">
                                <div class="rs-card" style="background-color: #c0ffdd">
                                    <h2>भविष्य
                                    </h2>
                                    <p>भविष्य के बारे में जाने।
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="rs-pricing-cards">
                            <div class="rs-card1">
                                <div class="rs-card" style="background-color: #ffdfe4">
                                    <h2>ग्रह स्थिति
                                    </h2>
                                    <p>ग्रहों की स्थिति के बारे में जाने।
                                    </p>
                                </div>
                            </div>
                            <div class="rs-card1">
                                <div class="rs-card" style="background-color: #d5fbd5">
                                    <h2>चार्ट</h2>
                                    <p>ज्योतिषीय गणना और भविष्यवाणी के उपकरण।</p>
                                </div>
                            </div>
                            <div class="rs-card1">
                                <div class="rs-card" style="background-color: #e1dcfb">
                                    <h2>चक्र </h2>
                                    <p>करियर गाइडेंस बेस्ड ऑन योर कुंडली</p>
                                </div>
                            </div>
                            <div class="rs-card1">
                                <div class="rs-card" style="background-color: #c0ffdd">
                                    <h2>शाद बाला</h2>
                                    <p> ग्रहों की शक्ति का संपूर्ण विश्लेषण।
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="rs-slider-container">
                        <div class="rs-pricing-cards">
                            <div class="rs-card1">
                                <div class="rs-card" style="background-color: #ccfdf8">
                                    <h2>परिवार </h2>
                                    <p>फैमिली से संबंधित जानकारी प्राप्त करें।
                                    </p>
                                </div>
                            </div>
                            <div class="rs-card1">
                                <div class="rs-card" style="background-color: #eeffbf">
                                    <h2>लव</h2>
                                    <p>प्यार के बारे में जाने।

                                    </p>
                                </div>
                            </div>
                            <div class="rs-card1">
                                <div class="rs-card" style="background-color: #ffc8f6">
                                    <h2>धन</h2>
                                    <p>धन कमाने से रिलेटेड जानकारी प्राप्त करें।
                                    </p>
                                </div>
                            </div>
                            <div class="rs-card1">
                                <div class="rs-card" style="background-color: #d4ebff">
                                    <h2>व्यवहार</h2>
                                    <p>अपने स्वभाव के बारे में जाने।
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="rs-pricing-cards">
                            <div class="rs-card1">
                                <div class="rs-card" style="background-color: #ccfdf8">
                                    <h2>दशा</h2>
                                    <p>दशाओं की संपूर्ण जानकारी।

                                    </p>
                                </div>
                            </div>
                            <div class="rs-card1">
                                <div class="rs-card" style="background-color: #eeffbf">
                                    <h2>राजयोग </h2>
                                    <p>सफलता, समृद्धि, सत्ता और सम्मान का योग।
                                    </p>
                                </div>
                            </div>
                            <div class="rs-card1">
                                <div class="rs-card" style="background-color: #ffc8f6">
                                    <h2>वर्षफल</h2>
                                    <p> वार्षिक भविष्यवाणी का ज्योतिषीय विश्लेषण।

                                    </p>
                                </div>
                            </div>
                            <div class="rs-card1">
                                <div class="rs-card" style="background-color: #d4ebff">
                                    <h2>अष्टकावर्गा </h2>
                                    <p> ग्रहों की शक्ति और प्रभाव का विश्लेषण।

                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button style="background: linear-gradient(45deg, #ff6c04, #65f5e8);" class="rs-recharge-btn" id="rs-recharge-btn"><a style="color: black;"
                            href="{{ url('assets/sampleKundli/sample_kundli.pdf') }}" download >Download Sample
                            Kundli</a></button>
                    <button style="width: 288px;" class="rs-recharge-btn" id="rs-recharge-btn" ><a href="{{ url('kundlipdf-payment') }}">Buy
                        Now</a></button>
                </section>
            </main>
        </div>
    </div>
    {{--  <div id="popupOverlay" class="overlay-container" style="z-index: 99999;">
        <div class="popup-box">
            <div class="modal-header">
                <h2 style="    font-size: 1.3rem;font-weight: 600;">User
                    Details</h2>
                <span style="margin-bottom: 4px;" onclick="togglePopup()" class="close">&times;</span>
            </div>
            <br>
            <div>
                <form class="form-container" method="POST" action="">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <label class="form-label" for="name">
                                Name:
                            </label>
                            <input class="form-input" type="text" placeholder="Enter Your Name" id="name"
                                name="name" value="{{ old('name') }}" required>
                        </div>
                        <div class="col-6">
                            <label class="form-label" for="name">
                                Phone Number:
                            </label>
                            <input class="form-input" type="number" placeholder="Enter Your Number" id="mobile" value="{{ old('mobile') }}"
                                name="mobile" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label class="form-label" for="name">
                                Date of Birth:
                            </label>
                            <input class="form-input" type="date" name="dob" value="{{ old('dob') }}" required>
                        </div>
                        <div class="col-6">
                            <label class="form-label" for="name">
                                Time of Birth:
                            </label>
                            <input class="form-input" type="time" value="{{ old('tob') }}" name="tob" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label class="form-label" for="name">
                                Place:
                            </label>
                            <input  class="form-input" type="text" name="place" value="{{ old('place') }}" placeholder="Enter Your Place" required>
                        </div>
                        <div class="col-6">
                            <label class="form-label" for="name">
                                Language:
                            </label>
                            <select class="form-select" style="font-size: 0.9rem;font-weight: 600;" name="lang"
                                required>
                                <option style="font-size: 0.9rem;font-weight: 600;" value="hi">Hindi</option>
                                <option style="font-size: 0.9rem;font-weight: 600;" value="en">English</option>
                                <option style="font-size: 0.9rem;font-weight: 600;" value="ml">Malayalam</option>
                                <option style="font-size: 0.9rem;font-weight: 600;" value="ta">Tamil</option>
                                <option style="font-size: 0.9rem;font-weight: 600;" value="ka">Kannada</option>
                                <option style="font-size: 0.9rem;font-weight: 600;" value="te">Telegu</option>
                                <option style="font-size: 0.9rem;font-weight: 600;" value="sp">Spanish</option>
                                <option style="font-size: 0.9rem;font-weight: 600;" value="fr">French</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label class="form-label" for="email">Amount:</label>
                            <input style="font-weight: 700;" class="form-input" type="text" value="999" name="payble_amount" required
                                readonly>
                        </div>
                    </div>
                    <button class="btn-submit" type="submit">
                        Initiate Payment
                    </button>
                </form>
            </div>
        </div>
    </div>  --}}
    {{--  <script>
        function togglePopup() {
            const overlay = document.getElementById('popupOverlay');
            overlay.classList.toggle('show');
        }
    </script>  --}}
    <script src="{{ url('parasar_popup/popup.js') }}"></script>



</body>

</html>
