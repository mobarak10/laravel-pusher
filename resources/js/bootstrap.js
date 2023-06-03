import "./plugin";

// Add scss
import "../scss/app.scss";

import Echo from 'laravel-echo';
// window.Pusher = require('pusher-js');
import Pusher from "pusher-js";
window.Pusher = Pusher;
window.Echo = new Echo({
     broadcaster: 'pusher',
     key: '8ed7cb09ce50f946100d',
     cluster: 'ap2',
     forceTLS: true
 });
