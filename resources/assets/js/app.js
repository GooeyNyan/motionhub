
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('videoItem', require('./components/VideoItem.vue'));
Vue.component('videoPlayer', require('./components/VideoPlayer.vue'));
Vue.component('videos', require('./components/Videos.vue'));
Vue.component('hotVideos', require('./components/HotVideos.vue'));
Vue.component('categoryVideos', require('./components/CategoryVideos.vue'));
Vue.component('search', require('./components/Search.vue'));
Vue.component('subMenu', require('./components/SubMenu.vue'));

const app = new Vue({
    el: '#app'
});
