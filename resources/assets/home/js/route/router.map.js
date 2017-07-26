import HomeComponent from '../components/Home.vue';
import DirectoryComponent from '../components/Directory.vue';
import CollegiateComponent from '../components/Collegiate.vue';
import EmailComponent from '../components/Email.vue';
import ServicesComponent from '../components/Services.vue';
import ImagesComponent from '../components/Images.vue';
import SupportComponent from '../components/Support.vue';
import CommissionsComponent from '../components/Commisions.vue';
import CommunityComponent from '../components/Community.vue';
import CceComponent from '../components/Cce.vue';
import RolesComponent from '../components/Roles.vue';
import LocalStorage from '../../../common/services/localStorage';
import OAuthCallbackHandle from '../../../common/services/OAuthCallbackHandle';

export default {

    routes: [

        {

            path: '/',
            name: 'home.index',
            component: HomeComponent,
            children: [

                {

                    path: 'directory',
                    name: 'home.directory',
                    component: DirectoryComponent,

                },

                {

                    path: 'collegiate',
                    name: 'home.collegiate',
                    component: CollegiateComponent

                },

                {

                    path: 'email',
                    name: 'home.email',
                    component: EmailComponent

                },

                {

                    path: 'services',
                    name: 'home.services',
                    component: ServicesComponent

                },

                {

                    path: 'support',
                    name: 'home.support',
                    component: SupportComponent

                },

                {

                    path: 'images',
                    name: 'home.images',
                    component: ImagesComponent

                },

                {

                    path: 'commissions',
                    name: 'home.commissions',
                    component: CommissionsComponent

                },

                {

                    path: 'community',
                    name: 'home.community',
                    component: CommunityComponent

                },

                {

                    path: 'cce',
                    name: 'home.cce',
                    component: CceComponent

                },

                {

                    path: 'roles',
                    name: 'home.roles',
                    component: RolesComponent

                },

                {

                    path: 'oauth-callback',
                    name: 'oauth-callback',
                    beforeEnter: (to, from, next) => {

                        LocalStorage.set('verifier_token', to.query.oauth_verifier);

                        OAuthCallbackHandle.callbackHandle();

                        return next();

                    }

                }

            ]

        }

    ]

}