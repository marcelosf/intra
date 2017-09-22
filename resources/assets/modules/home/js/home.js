/**
 * Imports
 */

import Vue from 'vue';
import VueRouter from 'vue-router';
import routerMap from '../../../common/routes/router.main';
import Auth from '../../../common/services/auth';
import {store} from '../../../store/store';
import AsyncComputed from 'vue-async-computed';
import Filter from '../../../common/filters';


/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('../../../bootstrap');
require('../../../bootstrap.custom');

Vue.use(AsyncComputed);

const router = new VueRouter(routerMap);

router.beforeEach((to, from, next) => {

    if(to.meta.requireAuth && !Auth.check()) {

        Auth.login();

    }

    next();

});


new Vue({

    el: '#app',
    router: router,
    filters: Filter,
    store,
    template: '<v-app><router-view></router-view></v-app>'

});