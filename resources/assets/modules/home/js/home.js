/**
 * Imports
 */

import VueRouter from 'vue-router';
import routerMap from '../../../common/routes/router.main';
import Auth from '../../../common/services/auth';

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('../../../bootstrap');

require('../../../bootstrap.custom');

const router = new VueRouter(routerMap);

router.beforeEach((to, from, next) => {

    console.log('access: ' + to.meta.requireAuth);
    console.log('auth: ' + Auth.check());

    if(to.meta.requireAuth && !Auth.check()) {

        Auth.login();

    }

    next();

});

new Vue({

    el: '#app',
    router: router,
    template: '<v-app><router-view></router-view></v-app>'

});