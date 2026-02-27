import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: import.meta.env.VITE_PUSHER_APP_KEY,
    cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
    encrypted: true,
    authEndpoint: "/broadcasting/auth",
});

const astrologerId = window.authUserId; // Pass astrologer's ID from the Blade template

window.Echo.private(`chat-request.${astrologerId}`)
    .listen('.ChatRequestEvent', (event) => {
        console.log("New chat request:", event);

        const acceptUrl = `/real-time-chat/${event.chatMeeting.astro_encrypt}`;
        const declineUrl = `/chat/decline/${event.chatMeeting.id}`;

        toastr.info(`
            <div>
                <strong>${event.sender.name}</strong> wants to start a chat.
                <br>
                <a href="${acceptUrl}" class="btn btn-success">Accept</a>
                <a href="${declineUrl}" class="btn btn-danger">Decline</a>
            </div>
        `, 'New Chat Request', {
            closeButton: true,
            progressBar: true,
            timeOut: 0, 
            extendedTimeOut: 0,
            positionClass: "toast-top-right",
            enableHtml: true,
        });
    });
