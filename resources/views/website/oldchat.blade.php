
<style>
    .chatbot-container {
    width: 400px;
    position: fixed;
    bottom: 0;
    right: 20px;
    border-radius: 15px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    background-color: white;
    display: flex;
    flex-direction: column;
    transition: height 0.3s ease;
}

.chatbot-header {
    background-color: #673ab7;
    color: white;
    padding: 15px;
    text-align: center;
    border-radius: 15px 15px 0 0;
    cursor: pointer;
}

.chatbox {
    padding: 10px;
    height: 432px;
    overflow-y: auto;
    border-top: 1px solid #ddd;
    border-bottom: 1px solid #ddd;
}

.hidden {
    display: none;
}

.chat-message {
    margin-bottom: 10px;
}

.bot-message {
    color: #000;
    background-color: #f1f1f1;
    padding: 10px;
    border-radius: 10px;
    display: inline-block;
}

.user-message {
    color: white;
    background-color: #673ab7;
    padding: 10px;
    border-radius: 10px;
    display: inline-block;
    text-align: right;
    margin-left: auto;
}

.user-input {
    padding: 10px;
    border-radius: 0 0 15px 15px;
    background-color: #f1f1f1;
}

input, select {
    width: 100%;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ddd;
    margin-top: 10px;
}

button {
    padding: 10px;
    background-color: #673ab7;
    color: white;
    border: none;
    width: 100%;
    border-radius: 5px;
    margin-top: 10px;
    cursor: pointer;
}

button:hover {
    background-color: #562ea6;
}
</style>
<div class="chatbot-container">
    <div class="chatbot-header" onclick="toggleChat()">
        <h3>Astro Buddy</h3>
    </div>
    <div id="chatbox" class="chatbox hidden">
        <!-- Chat messages will appear here -->
    </div>
    <div id="userInput" class="user-input hidden">
        <!-- Dynamic input field -->
    </div>
</div>
  @vite('resources/js/app.js')
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const chatbox = document.getElementById('chatbox');
    const userInput = document.getElementById('userInput');

    let userName = '';
    let userPhone = '';

    // Function to create a bot message
    function createBotMessage(message) {
        const msgDiv = document.createElement('div');
        msgDiv.classList.add('chat-message', 'bot-message');
        msgDiv.innerHTML = message;
        chatbox.appendChild(msgDiv);
        chatbox.scrollTop = chatbox.scrollHeight;
    }

    // Function to create a user message
    function createUserMessage(message) {
        const msgDiv = document.createElement('div');
        msgDiv.classList.add('chat-message', 'user-message');
        msgDiv.innerHTML = message;
        chatbox.appendChild(msgDiv);
        chatbox.scrollTop = chatbox.scrollHeight;
    }

    // Function to start the chat
    function startChat() {
        createBotMessage("Namaste! I'm your Astro Buddy. Are you looking for some help?");
        userInput.innerHTML = `
            <select id="helpSelect">
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </select>
            <button onclick="handleHelpResponse()">Submit</button>
        `;
        userInput.classList.remove('hidden');
    }

    // Function to handle help response
    window.handleHelpResponse = function() {
        const helpSelect = document.getElementById('helpSelect').value;
        createUserMessage(helpSelect);

        if (helpSelect === 'yes') {
            createBotMessage("I am happy to help you. Please let me know, are you an Astrologer or a User?");
            userInput.innerHTML = `
                <select id="userType">
                    <option value="astrologer">Astrologer</option>
                    <option value="user">User</option>
                </select>
                <button onclick="handleUserType()">Submit</button>
            `;
        } else {
            createBotMessage("Okay! Have a great day.");
            userInput.innerHTML = '';
        }
    };

    // Function to handle user type selection
    window.handleUserType = function() {
        const userType = document.getElementById('userType').value;
        createUserMessage(userType);

        if (userType === 'user') {
            createBotMessage("Alright! First, please tell me your name.");
            userInput.innerHTML = `
                <input type="text" id="userNameInput" placeholder="Enter your name">
                <button onclick="handleNameInput()">Submit</button>
            `;
        } else {
            createBotMessage("Thank you! We will contact you soon.");
            userInput.innerHTML = '';
        }
    };

    // Function to handle name input
    window.handleNameInput = function() {
        const name = document.getElementById('userNameInput').value;
        userName = name;
        createUserMessage(name);

        createBotMessage(`Hi ${name}, <br> It's a pleasure to meet you. Please provide your contact number.`);
        userInput.innerHTML = `
            <input type="text" id="userPhoneInput" placeholder="Enter your contact number">
            <button onclick="handlePhoneInput()">Submit</button>
        `;
    };

    // Function to handle phone number input
    window.handlePhoneInput = function() {
        const phone = document.getElementById('userPhoneInput').value;
        userPhone = phone;
        createUserMessage(phone);

        createBotMessage("Please select the service you would like to use.");
        userInput.innerHTML = `
            <select id="serviceSelect">
                <option value="chat">Chat With Astrologer</option>
                <option value="horoscope">Daily Horoscope</option>
                <option value="kundali">Kundali</option>
                <option value="kundali_matching">Kundali Matching</option>
            </select>
            <button onclick="handleServiceSelection()">Submit</button>
        `;
    };

    // Function to handle service selection
    window.handleServiceSelection = function() {
        const service = document.getElementById('serviceSelect').value;
        createUserMessage(service);

        createBotMessage("Thank you for selecting the service. We will get back to you soon.");
        userInput.innerHTML = '';
    };

    // Function to toggle chatbox visibility
    window.toggleChat = function() {
        if (chatbox.classList.contains('hidden')) {
            chatbox.classList.remove('hidden');
            userInput.classList.remove('hidden');
            startChat();
        } else {
            chatbox.classList.add('hidden');
            userInput.classList.add('hidden');
        }
    };
});

</script>

