/**
 * Imports
 */

import VueRouter from 'vue-router';
import routerMap from './route/router.map';
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('../../bootstrap');

require('../../bootstrap.custom');

const router = new VueRouter(routerMap);

new Vue({

    el: '#app',
    router: router,
    template: '<v-app><router-view></router-view></v-app>'

});