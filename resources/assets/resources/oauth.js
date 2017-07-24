import {HTTP} from './resources';

export class OAuth {

    static getRequestToken() {

        return HTTP.get('oauth/request-token');

    };

}