import {OAuth} from '../../resources/oauth';
import LocalStorage from './localStorage';

export default {

    callbackHandle() {

        OAuth.getResource().then((response) => {

            LocalStorage.setObject('jwt_token', response.data.jwtToken.original.token);

            OAuth.clearOAuthTokens();

            OAuth.getUser().then((response) => {

                LocalStorage.setObject('user', response.data);

            });

        });

    }

}