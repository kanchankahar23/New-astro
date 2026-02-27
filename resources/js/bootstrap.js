import axios from 'axios';
window.axios = axios;
import './echo';
import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    forceTLS: true,
    encrypted: true,
    authEndpoint: "/broadcasting/auth",
    auth: {
        headers: {
            'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content
        }
    }
});
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';




