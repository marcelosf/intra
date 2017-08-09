import Vue from 'vue';
import Vuex from 'vuex';
import {user} from '../common/user.store';
import {home} from '../modules/home/home.store';

Vue.use(Vuex);

export const store = new Vuex.Store({

    modules: {

        user: user,

        home: home

    }

});

window._$store = store;