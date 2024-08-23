import Echo from 'laravel-echo';

import Pusher from 'pusher-js';
window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: import.meta.env.VITE_PUSHER_APP_KEY,
    cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
    forceTLS: true
});


// window.Echo.private(`App.Models.User.1`)
//     .listen('UserEvents', (e) => {
//         console.log(e);
// 	});
	


	
// window.Echo.join('App.Models.User.1')
//     .here((users) => {
//         console.log("here => ",users); // O an mevcut kullanıcılar
//     })
//     .joining((user) => {
//         console.log("joining => ", user.name + ' joined the room.');
//     })
//     .leaving((user) => {
//         console.log("leaving => ", user.name + ' left the room.');
//     })
//     .listen('MessageSent', (e) => {
//         console.log("listen => ",e.message);
//     });