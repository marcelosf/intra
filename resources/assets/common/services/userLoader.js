import LocalStorage from './localStorage';
import {OAuth} from '../../resources/oauth';


export default {

    callbackHandle(to, next) {

        LocalStorage.set('verifier_token', to.query.oauth_verifier);

        OAuth.getResource().then((response) => {

            LocalStorage.setObject('jwt_token', response.data.jwtToken.original.token);

            OAuth.clearOAuthTokens();

            this.setUserToLocalStorage();

            return next({ path: '/' });

        });

    },


    setUserToLocalStorage() {

        OAuth.getUser().then((response) => {

            LocalStorage.setObject('user', response.data);

            parent._$store.commit('loginDialog', false);

            this.setUserToStore();

        });

    },


    setUserToStore() {

        parent._$store.commit('user', LocalStorage.getObject('user'));

        parent._$store.commit('check', true);

    }

}