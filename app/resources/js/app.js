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
 * Eg. ./components/PropComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
//const DashbordPayments=()=> import App from './components/DashboardPayments.vue';
Vue.component('laravel-component', require('./components/LaravelComponent.vue').default);
Vue.component('prop-component', require('./components/PropComponent.vue').default);
Vue.component('ajax-component', require('./components/AjaxComponent.vue').default);
Vue.component('chart-component', require('./components/ChartComponent.vue').default);
Vue.component('pie-component', require('./components/PieComponent.vue').default);
Vue.component('charline-component', require('./components/ChartlineComponent.vue').default);
Vue.component('socket-component', require('./components/SocketComponent.vue').default);
Vue.component('chat-component', require('./components/ChatComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
//;
Vue.use(
    new VueSocketIO({
        debug:true,
        connection:SocketInstance
    })
)
const app = new Vue({
    el: '#app',

});
$('.owl-carousel').owlCarousel({
    items: 1,
    loop: false,
    center: true,
    callbacks: true,
    URLhashListener: true,
    startPosition: 'URLHash'
});
