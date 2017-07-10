require('quasar-framework/dist/quasar.mat.css');

import Vue from 'vue';
import Quasar from 'quasar-framework';
import VueRouter from 'vue-router';
import VueResource from 'vue-resource';

/**
 * Vue Configurations
 */
window.Vue = Vue;
Vue.use(Quasar);
Vue.use(VueRouter);
Vue.use(VueResource);