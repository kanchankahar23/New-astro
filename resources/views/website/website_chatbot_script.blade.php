<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Astro Buddy Chatbot</title>
    <link rel="stylesheet" href="{{ asset('website/plugins/astro-appointment/assets/css/somefooter.css') }}">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <style>
        .botRobot {
            width: 100%;
            display: flex;
        }

        .userRobot {
            width: 100%;
            display: flex;
        }
    </style>
</head>

<body>
    <!-- <div>
    <img src="{{ asset('loader/new_loader.gif') }}" alt="">
    </div> -->
    <div class="chatbot-container" id="chatbotContainer">
        <div class="chatbot-header" onclick="toggleChat()">
            <div class="astrosmlogo">
                <img src="{{ url('images/newLogo.png') }}" alt="">
            </div>
            <h3 class='ChatUsHeading'>Chat with us !</h3>
            <div class="crosstheHeader">
                <i class="fa-solid fa-xmark"></i>
            </div>
        </div>
        <div id="chatbox" class="chatbox">
        </div>
        <div id="userInput" class="user-input usersubmit">

        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const showHeading = () => {
                const chatbotheader = document.querySelector('.chatbot-header');
                const ChatUsHeading = document.querySelector('.ChatUsHeading');
                const crosstheHeader = document.querySelector('.crosstheHeader');
                let isVisible = true; // Toggle state
                chatbotheader.addEventListener('click', () => {
                    if (isVisible) {
                        ChatUsHeading.style.display = 'block';
                        crosstheHeader.style.display = 'block';
                    } else {
                        ChatUsHeading.style.display = 'none';
                        crosstheHeader.style.display = 'none';
                    }
                    isVisible = !isVisible;
                });
            }
            showHeading();
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const chatbox = document.getElementById('chatbox');
            const userInput = document.getElementById('userInput');

            let userName = '';
            let userPhone = '';
            let userCountry = '';
            let userCountryCode = '';
            let conversation = []; // FIXED: Global conversation array

            function createBotMessage(message) {
                const msgDiv = document.createElement('div');
                msgDiv.classList.add('chat-message', 'bot-message');
                msgDiv.innerHTML = message;
                chatbox.appendChild(msgDiv);
                chatbox.scrollTop = chatbox.scrollHeight;
            }

            function createUserMessage(message) {
                const msgDiv = document.createElement('div');
                msgDiv.classList.add('chat-message', 'user-message');
                msgDiv.innerHTML = message;
                chatbox.appendChild(msgDiv);
                chatbox.scrollTop = chatbox.scrollHeight;
            }

            // START CHAT
            function startChat() {
                createBotMessage("Namaste! I'm your Astro Buddy. Are you looking for some help?");
                userInput.innerHTML = `
            <div class="option-buttons">
                <button class='openyesbutton' onclick="handleHelpResponse('yes')">Yes</button>
                <button class='opennobutton' onclick="handleHelpResponse('no')">No</button>
            </div>
        `;
            }

            window.handleHelpResponse = function(response) {
                createUserMessage(response);

                if (response === 'yes') {
                    createBotMessage("I am happy to help you. Are you an Astrologer or a User?");
                    userInput.innerHTML = `
                <div class="option-buttons">
                    <button class='openyesbutton' onclick="handleUserType('astrologer')">Astrologer</button>
                    <button class='opennobutton' onclick="handleUserType('user')">User</button>
                </div>
            `;
                } else {
                    createBotMessage("Okay! Have a great day.");
                }
            };

            // HANDLE USER TYPE
            window.handleUserType = function(userType) {
                createUserMessage(userType);

                createBotMessage("Alright! First, please tell me your name.");
                userInput.innerHTML = `
            <input class='userNameInput' type="text" id="userNameInput" placeholder="Enter your name">
            <button class='submituser' onclick="handleUserNameInput('${userType}')">Submit</button>
        `;
            };

            // HANDLE NAME
            window.handleUserNameInput = function(userType) {
                const name = document.getElementById('userNameInput').value.trim();

                if (!name) {
                    createBotMessage("Name cannot be empty. Please enter a valid name.");
                    return;
                }

                userName = name;
                createUserMessage(name);

                createBotMessage(`Hi ${name}, please select your country.`);
                userInput.innerHTML = `
            <div class="option-buttons">
                <button class='openyesbutton' onclick="handleCountrySelect('india','${userType}')">Indian</button>
                <button class='opennobutton' onclick="handleCountrySelect('other','${userType}')">Other</button>
            </div>
        `;
            };

            // HANDLE COUNTRY
            window.handleCountrySelect = function(country, userType) {
                createUserMessage(country);
                userCountry = country;

                if (country === 'india') {
                    createBotMessage("Please enter your 10-digit mobile number.");
                    userInput.innerHTML = `
                <input class='userNameInput' type="text" id="userPhoneInput" placeholder="Enter mobile number">
                <button class='submituser' onclick="handleUserPhoneInput('${userType}')">Submit</button>
            `;
                } else {
                    createBotMessage("Please enter your country code (example: +1, +44, +971).");
                    userInput.innerHTML = `
                <input class='userNameInput' type="text" id="countryCodeInput" placeholder="Enter country code">
                <button class='submituser' onclick="handleCountryCodeInput('${userType}')">Submit</button>
            `;
                }
            };

            // HANDLE COUNTRY CODE
            window.handleCountryCodeInput = function(userType) {
                const code = document.getElementById('countryCodeInput').value.trim();

                if (!code || !code.startsWith('+')) {
                    createBotMessage("Please enter a valid country code starting with +");
                    return;
                }

                userCountryCode = code;
                createUserMessage(code);

                createBotMessage("Now please enter your mobile number.");
                userInput.innerHTML = `
            <input class='userNameInput' type="text" id="userPhoneInput" placeholder="Enter mobile number">
            <button class='submituser' onclick="handleUserPhoneInput('${userType}')">Submit</button>
        `;
            };

            // HANDLE PHONE NUMBER
            window.handleUserPhoneInput = function(userType) {
                const phone = document.getElementById('userPhoneInput').value.trim();

                if (!phone) {
                    createBotMessage("Phone number cannot be empty.");
                    return;
                }

                if (userCountry === 'india') {
                    const reg = /^[0-9]{10}$/;
                    if (!reg.test(phone)) {
                        createBotMessage("Please enter a valid 10-digit Indian mobile number.");
                        return;
                    }
                    userPhone = phone;
                } else {
                    userPhone = userCountryCode + " " + phone;
                }

                createUserMessage(userPhone);

                // SERVICES
                if (userType === 'user') {
                    createBotMessage("Please select the service you would like to use.");
                    userInput.innerHTML = `
                <div class="option-buttons useroptionchat">
                    <button onclick="finalService('${userType}', 'Chat With Astrologer')">Chat With Astrologer</button>
                    <button onclick="finalService('${userType}', 'Daily Horoscope')">Daily Horoscope</button>
                    <button onclick="finalService('${userType}', 'Kundali')">Kundali</button>
                    <button onclick="finalService('${userType}', 'Kundali Matching')">Kundali Matching</button>
                </div>
            `;
                } else {
                    createBotMessage("Sir/Ma'am, please enter your expertise in astrology.");
                    userInput.innerHTML = `
                <input class='userNameInput' type="text" id="astroExpertise" placeholder="Enter your expertise">
                <button class='submituser' onclick="finalService('${userType}', document.getElementById('astroExpertise').value)">Submit</button>
            `;
                }
            };

            // FINAL SERVICE FUNCTION (Fixed Single Version)
            window.finalService = function(userType, service) {
                createUserMessage(service);

                if (userType === 'user') {
                    createBotMessage("Thank you for selecting the service. We will get back to you soon.");
                } else {
                    createBotMessage("Thank you for connecting with us, We will get back to you soon.");
                }
                userInput.innerHTML = '';

                const conversationData = Array.from(chatbox.querySelectorAll('.chat-message')).map(msg => ({
                    type: msg.classList.contains('bot-message') ? 'bot' : 'user',
                    text: msg.innerHTML
                }));

                saveChatbotData(userType, userName, userPhone, service, conversationData, userCountryCode,
                    userCountry);
            };

            // SAVE DATA
            function saveChatbotData(userType, userName, userPhone, selectedService, conversation, userCountryCode,
                userCountry) {
                fetch('{{ url('/save-chatbot-response') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                            'content')
                    },
                    body: JSON.stringify({
                        user_type: userType,
                        user_name: userName,
                        userCountryCode: userCountryCode,
                        userCountry: userCountry,
                        user_phone: userPhone,
                        service_selected: selectedService,
                        conversation: conversation
                    })
                });
            }

            // FIXED toggleChat function
            window.toggleChat = function() {
                chatbotContainer.classList.toggle('open');

                if (chatbox.style.display === 'flex') {
                    chatbox.style.display = 'none';
                    userInput.style.display = 'none';
                } else {
                    chatbox.innerHTML = '';
                    conversation = [];
                    chatbox.style.display = 'flex';
                    userInput.style.display = 'flex';
                    startChat();
                }
            };

        });
    </script>

</body>

</html>
