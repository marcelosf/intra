import {OAuth} from '../../resources/oauth';

export default {

    callbackHandle() {

        OAuth.getResource().then((response) => {

            console.log(response.data);

        });
    }

}