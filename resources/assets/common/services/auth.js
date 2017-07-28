import {OAuth} from '../../resources/oauth';
import LocalStorage from './localStorage';

export default {

    login() {

        OAuth.getRequestToken().then((response) => {

            LocalStorage.setObject('oauth_token', response.data.token);

            window.location.href = response.data.url;

        });

    },

    logout() {

        Vue.http.get('oauth/jwt-logout').then((response) => {

            LocalStorage.remove('user');

            LocalStorage.remove('jwt_token');

            Vue.http.$router.go({ name: 'home.index' });

        });

    },

    user() {

        return LocalStorage.getObject('user');

    },

    getAuthorizationHeader() {

        return `Bearer ${LocalStorage.getObject('jwt_token', '')}`;

    },

    check() {

        return !!LocalStorage.getObject('jwt_token');

    }

}