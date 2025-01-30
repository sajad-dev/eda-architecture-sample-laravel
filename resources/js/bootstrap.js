import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import Echo from "laravel-echo";
import Pusher from "pusher-js";

window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: "pusher",
    key: "d6kAd89bMqDrLrFh",
    cluster: "mt1",
    wsHost: "127.0.0.1",
    wsPort: 8081,
    forceTLS: false,
    disableStats: true,
});

window.Echo.channel("test").listen(".publish", (data) => {
    console.log("Received message:", data.message);
});