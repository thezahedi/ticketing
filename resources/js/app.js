import VueRouter from "vue-router";

window._ = require('lodash');
window.$ = require('jquery');
window.axios = require('axios');
window.Vue = require('vue');
require('bootstrap');

let token = document.head.querySelector('meta[name="csrf-token"]');
if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

Vue.use(VueRouter);
Vue.config.productionTip = false;
new Vue({
    el: '#app',
    router: new VueRouter({
        routes: require('./routes').default
    }),
});
