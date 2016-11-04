
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */
//import Echo from "laravel-echo"

//require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the body of the page. From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */

// Vue.component('example', require('./components/Example.vue'));

// const app = new Vue({
//     el: '#app'
// });


import Echo from "laravel-echo"

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: '7e7000abf7ebe81f5887'
});

// window.Echo.channel('chat-room.1')

//  .listen('ChatMessageWasReceived', (e) => {
//         console.log(e.user, e.chatMessage);
//     });
   

