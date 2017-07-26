require('vuetify/dist/vuetify.min.css');

import Vue from 'vue';
import Vuetify from 'vuetify';
import VueRouter from 'vue-router';
import VueResource from 'vue-resource';

/**
 * Vue Configurations
 */
window.Vue = Vue;
Vue.use(Vuetify);
Vue.use(VueRouter);
Vue.use(VueResource);

Vue.http.options.root = 'http://192.168.10.10:8000/api';

require('./resources/interceptors');