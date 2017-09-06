import {OAuth} from '../../resources/oauth';
import LocalStorage from './localStorage';

export default {

    user: {

        set data(value) {

            if(!value) {

                LocalStorage.remove('user');

                this._data = null;

                return;

            }

            this._data = value;

            LocalStorage.setObject('user', value)

        },

        get data() {

            if (!this._data) {

                this._data = LocalStorage.getObject('user');

            }

            return this._data;

        },

        check: !!LocalStorage.getObject('jwt_token'),

        bond() {

                let user = LocalStorage.getObject('user');

                return user !== null ? JSON.parse(user.types) : false;

        }

    },

    login(resource) {

        OAuth.getRequestToken().then((response) => {

            LocalStorage.setObject('oauth_token', response.data.token);

            if (resource) {

                resource.url = response.data.url;

            }

        });

    },

    logout() {

        OAuth.logout().then((response) => {

            LocalStorage.remove('jwt_token');

            Vue.http.$router.go({ name: 'home.index' });

        }).catch((errno) => {

            LocalStorage.remove('user');

            LocalStorage.remove('jwt_token');

        });

    },


    getAuthorizationHeader() {

        return `Bearer ${LocalStorage.getObject('jwt_token', '')}`;

    },


    isAuth() {

        OAuth.isAuthenticated().then((response) => {

            return response.data.authenticated;

        });

    }

}