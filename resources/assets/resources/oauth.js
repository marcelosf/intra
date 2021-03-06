import LocalStorage from '../common/services/localStorage';

const TOKEN = 'oauth_token';
const VERIFY = 'verifier_token';
const REQUEST_TOKEN = 'request_token';

export class OAuth {

    static getRequestToken() {

        return Vue.http.get('oauth/get-request-token');

    };

    static getResource() {

        let token = LocalStorage.getObject(TOKEN);

        let verifier = LocalStorage.get(VERIFY);

        let tokenInfo = {

            oauth_token: token.oauth_token,

            oauth_token_secret: token.oauth_token_secret,

            oauth_verifier: verifier

        };


        return Vue.http.post('oauth/get-resource', tokenInfo);

    };

    static clearOAuthTokens() {

        LocalStorage.remove(TOKEN);

        LocalStorage.remove(VERIFY);

        LocalStorage.remove(REQUEST_TOKEN);

    };

    static getUser() {

        return Vue.http.get('oauth/jwt-user');

    };

    static isAuthenticated() {

        return Vue.http.get('oauth/check-user-auth');

    };

    static logout() {

        return Vue.http.get('oauth/jwt-logout');

    }

}