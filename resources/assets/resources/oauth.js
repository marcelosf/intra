import LocalStorage from '../common/services/localStorage';

export class OAuth {

    static getRequestToken() {

        return Vue.http.get('oauth/get-request-token');

    };

    static getResource() {

        let token = LocalStorage.getObject('oauth_token');

        let verifier = LocalStorage.get('verifier_token');

        let tokenInfo = {

            oauth_token: token.oauth_token,

            oauth_token_secret: token.oauth_token_secret,

            oauth_verifier: verifier

        };


        return Vue.http.post('oauth/get-resource', tokenInfo);

    }

}