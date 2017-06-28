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

window.Vue = require('vue');
let VueMaterial = require('vue-material');
let VueResource = require('vue-resource');

Vue.use(VueRouter);
Vue.use(VueMaterial);
Vue.use(VueResource);

const router = new VueRouter(routerMap);

new Vue({

    el: '#app',
    router: router,
    template: '<router-view></router-view>'

});