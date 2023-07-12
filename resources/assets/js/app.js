
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));
Vue.component('page-manager', require('./components/PageManager.vue'));
Vue.component('nav-menu', require('./components/NavMenu.vue'));
Vue.component('dogs', require('./components/Pages/Dogs.vue'));
Vue.component('breeds', require('./components/Pages/Breeds.vue'));
Vue.component('sizes', require('./components/Pages/Sizes.vue'));
Vue.component('colors', require('./components/Pages/Colors.vue'));

const app = new Vue({
    el: '#app'
});
