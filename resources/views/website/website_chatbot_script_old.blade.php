<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Astro Buddy Chatbot</title>
        <link rel="stylesheet"
            href="{{ asset('website/plugins/astro-appointment/assets/css/somefooter.css') }}">
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
                    <img src="{{url('images/newLogo.png')}}" alt="">
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
            const chatbotContainer = document.getElementById('chatbotContainer');
            let userName = '';
            let userPhone = '';
            const conversation = [];

            function createBotMessage(message) {
                const msgDiv = document.createElement('div');
                msgDiv.classList.add('chat-message', 'bot-message');
                msgDiv.innerHTML = message;
                chatbox.appendChild(msgDiv);
                chatbox.scrollTop = chatbox.scrollHeight;
                conversation.push({
                    type: 'bot',
                    text: message
                });
            }

            function createUserMessage(message) {
                const msgDiv = document.createElement('div');
                msgDiv.classList.add('chat-message', 'user-message');
                msgDiv.innerHTML = message;
                chatbox.appendChild(msgDiv);
                chatbox.scrollTop = chatbox.scrollHeight;
                conversation.push({
                    type: 'user',
                    text: message
                });
            }

            // Function to start the chat
            function startChat() {
                createBotMessage("Namaste! I'm your Astro Buddy. Are you looking for some help?");
                userInput.innerHTML = `
                <div class="option-buttons">
                    <button class='openyesbutton' onclick="handleHelpResponse('yes')">Yes</button>
                    <button class='opennobutton' onclick="handleHelpResponse('no')">No</button>
                </div>
            `;
            }

            // Function to handle help response
            window.handleHelpResponse = function(response) {
                createUserMessage(response);
                if (response === 'yes') {
                    createBotMessage(
                        "I am happy to help you. Please let me know, are you an Astrologer or a User?");
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

            // Function to handle user type
            window.handleUserType = function(userType) {
                createUserMessage(userType);
                if (userType === 'user') {
                    createBotMessage("Alright! First, please tell me your name.");
                    userInput.innerHTML = `
                    <input class='userNameInput' type="text" id="userNameInput" placeholder="Enter your name">
                    <button class='submituser' onclick="handleUserNameInput('${userType}')">Submit</button>
                `;
                } else if (userType === 'astrologer') {
                    createBotMessage(
                        "Are you looking to onboard with Astrobuddy to provide astrology services?");
                    userInput.innerHTML = `
                <button class='openyesbutton' onclick="handleAstrologerResponse('yes', '${userType}')">Yes</button>
                <button class='opennobutton' onclick="handleAstrologerResponse('no', '${userType}')">No</button>
            `;

                }

            };

            window.handleAstrologerResponse = function(response, userType) {

                createUserMessage(response);

                if (response === 'yes') {
                    createBotMessage("Alright! First, please tell me your name.");
                    userInput.innerHTML = `
                <input class='userNameInput' type="text" id="userNameInput" placeholder="Enter your name">
                <button class='submituser' onclick="handleUserNameInput('${userType}')">Submit</button>
            `;
                } else {
                    createBotMessage("Thank you! Have a great day.");
                    setTimeout(closeChat, 2000);
                }
            };

            // Function to handle user name input..
            window.handleUserNameInput = function(userType) {
                const userNameInput = document.getElementById('userNameInput');
                if (!userNameInput) {
                    console.error("Username input field not found.");
                    return;
                }
                const name = userNameInput.value.trim();
                if (!name) {
                    createBotMessage("Name cannot be empty. Please enter a valid name.");
                    return;
                }
                userName = name;
                createUserMessage(name);
                createBotMessage(`Hi ${name}, please provide your contact number.`);
                // Update user input field for the phone number
                const userInput = document.getElementById('userInput');
                if (!userInput) {
                    console.error("User input container not found.");
                    return;
                }
                userInput.innerHTML = `
                    <input class='userNameInput' type="text" id="userPhoneInput" placeholder="Enter your contact number">
                    <button class='submituser' onclick="handleUserPhoneInput('${userType}')">Submit</button>
                `;
            };

            {{--  window.handleUserNameInput = function(userType) {

                createUserMessage(userType);
                const name = document.getElementById('userNameInput').value;
                userName = name;

                createUserMessage(name);
                createBotMessage(`Hi ${name}, please provide your contact number.`);
                userInput.innerHTML = `
                <input class='userNameInput' type="text" id="userPhoneInput" placeholder="Enter your contact number">
                <button class='submituser' onclick="handleUserPhoneInput(userType)">Submit</button>
            `;
            };  --}}

            // Function to handle phone number input
            {{--  window.handleUserPhoneInput = function(userType) {
                createUserMessage(userType);

                const phone = document.getElementById('userPhoneInput').value;
                userPhone = phone;
                createUserMessage(phone);

                if (userType === 'user') {
                    createBotMessage("Please select the service you would like to use.");
                    userInput.innerHTML = `
                <div class="option-buttons useroptionchat">
                    <button onclick="handleServiceSelection('${userType}', 'Chat With Astrologer')">Chat With Astrologer</button>
                    <button onclick="handleServiceSelection('${userType}', 'Daily Horoscope')">Daily Horoscope</button>
                    <button onclick="handleServiceSelection('${userType}', 'Kundali')">Kundali</button>
                    <button onclick="handleServiceSelection('${userType}', 'Kundali Matching')">Kundali Matching</button>
                </div>
            `;
                } else if (userType === 'astrologer') {
                    createBotMessage(`Sir/Ma'am, please enter your expertise in astrology.`);
                    // Update user input field for the phone number
                    userInput.innerHTML = `
                    <input class='userNameInput' type="text" id="astroExpertise" placeholder="Enter your expertise">
                    <button class='submituser' onclick="handleServiceSelection('${userType}', document.getElementById('astroExpertise').value)">Submit</button>
                `;

                }
            };  --}}
            window.handleUserPhoneInput = function(userType) {
                // Get the phone number input
                const phoneInput = document.getElementById('userPhoneInput');
                if (!phoneInput) {
                    console.error("Phone input field not found.");
                    return;
                }

                const phone = phoneInput.value.trim();

                // Phone number validation
                if (!phone) {
                    createBotMessage("Phone number cannot be empty. Please enter a valid number.");
                    return;
                }

                // Check if the phone number is numeric and of a reasonable length (e.g., 10 digits)
                const phoneRegex = /^[0-9]{10}$/; // Adjust this regex for country-specific rules
                if (!phoneRegex.test(phone)) {
                    createBotMessage("Please enter a valid 10-digit phone number.");
                    return;
                }
                // Save the valid phone number
                userPhone = phone;
                // Show user message with the phone number
                createUserMessage(phone);
                if (userType === 'user') {
                    createBotMessage("Please select the service you would like to use.");
                    userInput.innerHTML = `
            <div class="option-buttons useroptionchat">
                <button onclick="handleServiceSelection('${userType}', 'Chat With Astrologer')">Chat With Astrologer</button>
                <button onclick="handleServiceSelection('${userType}', 'Daily Horoscope')">Daily Horoscope</button>
                <button onclick="handleServiceSelection('${userType}', 'Kundali')">Kundali</button>
                <button onclick="handleServiceSelection('${userType}', 'Kundali Matching')">Kundali Matching</button>
            </div>
        `;
                } else if (userType === 'astrologer') {
                    createBotMessage(`Sir/Ma'am, please enter your expertise in astrology.`);
                    userInput.innerHTML = `
            <input class='userNameInput' type="text" id="astroExpertise" placeholder="Enter your expertise">
            <button class='submituser' onclick="handleServiceSelection('${userType}', document.getElementById('astroExpertise').value)">Submit</button>
        `;
                }
            };

            // Function to handle service selection
            window.handleServiceSelection = function(userType, service) {
                createUserMessage(service);
                if (userType === 'user') {
                    createBotMessage("Thank you for selecting the service. We will get back to you soon.");
                    userInput.innerHTML = '';
                } else if (userType === 'astrologer') {
                    createBotMessage("Thank you for connecting with us, We will get back to you soon.");
                    userInput.innerHTML = '';
                }
                // Call saveChatbotData with all required arguments
                const conversation = Array.from(chatbox.querySelectorAll('.chat-message')).map(msg => ({
                    type: msg.classList.contains('bot-message') ? 'bot' : 'user',
                    text: msg.innerHTML
                }));
                console.log("Service:", service);
                saveChatbotData(userType, userName, userPhone, service,
                    conversation); // Pass service and other necessary data
            };

            // Function to save chatbot data
            function saveChatbotData(userType, userName, userPhone, selectedService, conversation) {
                console.log({
                    userType: userType,
                    user_name: userName,
                    user_phone: userPhone,
                    service_selected: selectedService,
                    conversation: conversation
                });
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
                            user_phone: userPhone,
                            service_selected: selectedService,
                            conversation: conversation
                        })
                    })
                    .then(response => {
                        console.log('Raw Response:', response);
                        return response.json();
                    })
                    .then(data => {
                        if (data.success) {
                            console.log('Chatbot response saved successfully!');
                        } else {
                            console.log('Error saving chatbot response:', data.message);
                        }
                    })
                    .catch(error => console.error('Error:', error));

            }

           window.toggleChat = function() {
                chatbotContainer.classList.toggle('open');
                if (chatbox.style.display === 'flex') {
                chatbox.style.display = 'none';
                userInput.style.display = 'none';
                } else {
                chatbox.innerHTML = '';
                conversation.length = 0;
                chatbox.style.display = 'flex';
                userInput.style.display = 'flex';
                startChat();
                }
                };
                });
        </script>
    </body>

</html>
