/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('pengaduan', require('./components/PengaduanNotification.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
const app = new Vue({
    el: '#app',
    data: {
        pengaduans: '',
    },
    created() {
        if (window.Laravel.userId) {
            axios.post('/notification/pengaduan/notification').then(response => {
                this.pengaduans = response.data;
                timeAgo();
                if (this.pengaduans.toString() == "true") {
                    playSound();
                }
                console.log(response.data);
            });

            Echo.private('App.Admin.' + window.Laravel.userId).notification((response) => {

               data = {
                    "data": response,
                    'created_at': response.pengaduan.created_at
                };
                this.pengaduans.push(data);
                timeAgo();
                playSound('http://soundbible.com/mp3/Open_Soda_Can-KP-1219969174.mp3');
                console.log(response);
            });
        };

        function timeAgo() {

            Vue.filter('myOwnTime', function(value) {
                return moment(value).fromNow();
            });

        };

        function playSound() {
            var audio = new Audio('http://soundbible.com/mp3/Open_Soda_Can-KP-1219969174.mp3');
            audio.play();
        };

    }
});
